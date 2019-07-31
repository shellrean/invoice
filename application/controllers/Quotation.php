<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Quotation extends CI_Controller {


	public function __construct()
	{
		parent::__construct();

		$this->load->library(array('form_validation'));

		is_login();
	}

	public function index()
	{
		$this->db->order_by('id','DESC');
		$data['satuses'] = statusesQuote();
		$data['quotations'] = $this->db->get('quotation')->result();
		$this->template->load('template','quotation/index',$data);
	}

	public function create() 
	{
		if($this->form_validation->run('quotation/create') == FALSE) {

			$this->template->load('template','quotation/create');

		} else {
			$date = explode("-", $this->input->post('quodate',TRUE));
	        $quodate = $date[2]."-".$date[1]."-".$date[0];

	        $date1 = explode("-", $this->input->post('expdate',TRUE));
	        $expdate = $date1[2]."-".$date1[1]."-".$date1[0];

	        $kd = generateKodeItem('kdquo','quotation','QUO');
			$data = [
				'kdquo' 	=> $kd, 
                'id_customer'=> $this->input->post('id_customer'),
                'quodate' 	=> $quodate,
                'expdate' 	=> $expdate,
                'subtotal' 	=> $this->input->post('invoice_subtotal'),
                'discount' 	=> $this->input->post('invoice_discount'),
                'tax' 		=> $this->input->post('invoice_vat'),
                'grdtotal' 	=> $this->input->post('invoice_total'),
                'custnotes' => $this->input->post('custnotes'),
                'status' 	=> $this->input->post('status'),
			];

			$this->db->insert('quotation',$data);

			$counts = $this->input->post('invoice_product');

			$i=0;
            foreach ($counts as $c):
            	$dt = explode('-', $this->input->post('invoice_product')[$i]);
                $datadetail[$i] = array(
                        'kdquo' 		=> $kd,
                        'itemname' 		=> $dt[0],
                        'itemdesc'		=> $dt[1],
                        'qty' 			=> $this->input->post('invoice_product_qty')[$i],
                        'priceperitem' 	=> $this->input->post('invoice_product_price')[$i],
                        'discount' 		=> $this->input->post('invoice_product_discount')[$i],
                        'totalprice' 	=> $this->input->post('invoice_product_sub')[$i],
                );

            $i++;
            endforeach;
            $this->db->insert_batch('quotation_details',$datadetail);
            alertsuccess('message','Data quotation berhasil ditambahkan');
            redirect('quotation');

		}
	}

	public function edit($id)
	{
		if($this->form_validation->run('quotation/create') == FALSE) {

			$data['quo'] = $this->db->get_where('quotation',['kdquo' => $id])->row();
			$date = explode("-", $data['quo']->quodate);
	        $data['quodate'] = $date[2]."-".$date[1]."-".$date[0];

	        $date1 = explode("-", $data['quo']->expdate);
	        $data['expdate'] = $date1[2]."-".$date1[1]."-".$date1[0];

			$this->template->load('template','quotation/edit',$data);

		} else {
			$date = explode("-", $this->input->post('quodate',TRUE));
	        $quodate = $date[2]."-".$date[1]."-".$date[0];

	        $date1 = explode("-", $this->input->post('expdate',TRUE));
	        $expdate = $date1[2]."-".$date1[1]."-".$date1[0];

			$data = [
                'id_customer'=> $this->input->post('id_customer'),
                'quodate' 	=> $quodate,
                'expdate' 	=> $expdate,
                'subtotal' 	=> $this->input->post('invoice_subtotal'),
                'discount' 	=> $this->input->post('invoice_discount'),
                'tax' 		=> $this->input->post('invoice_vat'),
                'grdtotal' 	=> $this->input->post('invoice_total'),
                'custnotes' => $this->input->post('custnotes'),
                'status' 	=> $this->input->post('status'),
			];

			$this->db->update('quotation',$data,array('kdquo' => $id));

			$counts = $this->input->post('invoice_product');

			$i=0;
            foreach ($counts as $c):
            	$dt = explode('-', $this->input->post('invoice_product')[$i]);
                $datadetail = array(
                        'itemname' 		=> $dt[0],
                        'itemdesc'		=> $dt[1],
                        'qty' 			=> $this->input->post('invoice_product_qty')[$i],
                        'priceperitem' 	=> $this->input->post('invoice_product_price')[$i],
                        'discount' 		=> $this->input->post('invoice_product_discount')[$i],
                        'totalprice' 	=> $this->input->post('invoice_product_sub')[$i],
                );

                $this->db->update('quotation_details',$datadetail,array('id' => $id));

            $i++;
            endforeach;
            // $this->db->update_batch('quotation_details',$datadetail,'kdquo');
            alertsuccess('message','Data quotation berhasil diubah');
            redirect('quotation');

		}
	}

	public function detail($id)
	{
		$data['quotation'] = $this->db->get_where('quotation',array('kdquo' => $id))->row();
		$data['details'] = $this->db->get_where('quotation_details',array('kdquo' => $id))->result();

		$this->template->load('template','quotation/detail',$data);
	}

	public function convert_invoice($id)
	{
		$data['quotation'] = $this->db->get_where('quotation',array('kdquo' => $id))->row();
		$data['details'] = $this->db->get_where('quotation_details',array('kdquo' => $id))->result();

		if($this->form_validation->run('quotation/invoice_convert') == FALSE) {
			
			$this->template->load('template','quotation/convert_invoice',$data);

		} else {
			
			$date = explode("-", $this->input->post('invdate'));
	        $invdate = $date[2]."-".$date[1]."-".$date[0];

	        $date1 = explode("-", $this->input->post('duedate'));
	        $duedate = $date1[2]."-".$date1[1]."-".$date1[0];

			$genkdInv = generateKodeItem('kdinv','invoice','INV');
			$data = [
				'kdinv' 		=> $genkdInv,
				'kdquo' 		=> $this->input->post('kdquo'),
                'id_customer' 	=> $this->input->post('id_customer'),
                'ordernumber' 	=> $this->input->post('ordernumber'),
                'invdate' 		=> $invdate,
                'duedate' 		=> $duedate,
                'subtotal' 		=> $this->input->post('subtotal'),
                'discount' 		=> $this->input->post('discount'),
                'discount' 		=> $this->input->post('invoice_shipping'),
                'tax' 			=> $this->input->post('invoice_vat'),
                'grdtotal' 		=> $this->input->post('grdtotal'),
                'balance'		=> $this->input->post('grdtotal'),
                'payopt' 		=> $this->input->post('payopt'),
                'custnotes' 	=> $this->input->post('custnotes'),
                'status'		=> 1
			];
			$this->db->insert('invoice',$data);

			$counts = $this->input->post('invoice_product');

			$i=0;
            foreach ($counts as $c):
            	$dt = explode('-', $this->input->post('invoice_product')[$i]);
                $datadetail[$i] = array(
                        'kdinv' 		=> $genkdInv,
                        'itemname' 		=> $dt[0],
                        'itemdesc'		=> $dt[1],
                        'qty' 			=> $this->input->post('invoice_product_qty')[$i],
                        'priceperitem' 	=> $this->input->post('invoice_product_price')[$i],
                        'discount' 		=> $this->input->post('invoice_product_discount')[$i],
                        'totalprice' 	=> $this->input->post('invoice_product_sub')[$i],
                );

            $i++;
            endforeach;
            $this->db->insert_batch('invoice_details',$datadetail);

            alertsuccess('message','Data quotation berhasil di convert kedalam invoice');
            redirect('quotation');
		}

	}

	public function print($id)
	{
		$quotation = $this->db->get_where('quotation',array('kdquo' => $id))->row();
		$details = $this->db->get_where('quotation_details',array('kdquo' => $id))->result();
		$data['quotation'] = $quotation;
		$data['details'] = $details;
		$mpdfConfig = array(
				'format' => 'A4',
				'orientation' => 'P'  	
			);
		$m_pdf = new \Mpdf\Mpdf($mpdfConfig);
		$m_pdf->SetMargins(0, 0, 4);
		$m_pdf->showImageErrors = true;

 		$pdfFilePath = strtolower(str_replace(' ','_','quotation '.$quotation->kdquo)).".pdf";

		$html = $this->load->view('quotation/Quotation_cetak',$data,TRUE);
		$m_pdf->WriteHTML($html);
		$m_pdf->Output($pdfFilePath, 'I');
	}

	public function modal_create_quote()
	{
		$this->template->set('modal_title','Buat penawaran');
		$this->template->set('modal_s','modal-lg');
		$this->template->load('modal','quotation/modal_create'); 
	}
} 