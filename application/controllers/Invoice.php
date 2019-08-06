<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Invoice extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->library(array('form_validation'));
	}
	public function index()
	{

		$this->db->order_by('id','DESC');
		$data['invoices'] = $this->db->get('invoice')->result();
		$this->template->load('template','invoice/index',$data);
	}


	public function create() 
	{
		if($this->form_validation->run('quotation/create') == FALSE) {

			$this->template->load('template','invoice/create');

		} else {
			$date = explode("-", $this->input->post('quodate',TRUE));
	        $quodate = $date[2]."-".$date[1]."-".$date[0];

	        $date1 = explode("-", $this->input->post('expdate',TRUE));
	        $expdate = $date1[2]."-".$date1[1]."-".$date1[0];

	        $kd = generateKodeItem('kdinv','invoice','INV');
			$data = [
				'kdinv' 	=> $kd, 
                'id_customer'=> $this->input->post('id_customer'),
                'invdate' 	=> $quodate,
                'duedate' 	=> $expdate,
                'subtotal' 	=> $this->input->post('invoice_subtotal'),
                'discount' 	=> $this->input->post('invoice_discount'),
                'tax' 		=> $this->input->post('invoice_vat'),
                'grdtotal' 	=> $this->input->post('invoice_total'),
                'balance'		=> $this->input->post('invoice_total'),
                'custnotes' => $this->input->post('custnotes'),
                'status' 	=> $this->input->post('status'),
			];

			$this->db->insert('invoice',$data);

			$counts = $this->input->post('invoice_product');

			$i=0;
            foreach ($counts as $c):
            	$dt = explode('-', $this->input->post('invoice_product')[$i]);
                $datadetail[$i] = array(
                        'kdinv' 		=> $kd,
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
            alertsuccess('message','Data invoice berhasil ditambahkan');
            redirect('invoice');

		}
	}

	public function detail($id)
	{
		$data['invoice'] = $this->db->get_where('invoice',array('kdinv' => $id))->row();
		$data['details'] = $this->db->get_where('invoice_details',array('kdinv' => $id))->result();

		$this->template->load('template','invoice/detail',$data);
	}

	public function record_payment($id)
	{
		if($this->form_validation->run('record_payment') == FALSE) {

			$data['invoice'] = $this->db->get_where('invoice',array('kdinv' => $id))->row();
			$data['details'] = $this->db->get_where('invoice_details',array('kdinv' => $id))->result();

			$this->template->load('template','invoice/record_payment',$data);
		
		} else {
			$date = explode("-", $this->input->post('paydate'));
        	$paydate = $date[2]."-".$date[1]."-".$date[0];

        	$this->db->update('invoice',array('status' => 14),array('kdinv' => $id));

        	$genkdPayRec = generateKodeItem('kdpayrec','payment_received','PYM');
        	$data = [
        		'kdpayrec' 	=> $genkdPayRec,
                'id_customer'=> $this->input->post('id_customer'),
                'bankcharge'=> $this->input->post('bankcharge'),
                'paydate' 	=> $paydate,
                'kdinv' 	=> $this->input->post('kdinv'),
                'invdate' 	=> $this->input->post('invdate'),
                'invamount' => $this->input->post('invamount'),
                'dueamount' => $this->input->post('dueamount'),
                'amount' 	=> $this->input->post('amount'),
        	];

        	$this->db->insert('payment_received',$data);

        	alertsuccess('message','Record Payment Success');
        	redirect('invoice');
		}

	}

	public function print($id)
	{
		$invoice = $this->db->get_where('invoice',array('kdinv' => $id))->row();
		$details = $this->db->get_where('invoice_details',array('kdinv' => $id))->result();
		$data['invoice'] = $invoice;
		$data['details'] = $details;
		$mpdfConfig = array(
				'format' => 'A4',
				'orientation' => 'P'  	
			);
		$m_pdf = new \Mpdf\Mpdf($mpdfConfig);
		$m_pdf->SetMargins(0, 0, 4);
		$m_pdf->showImageErrors = true;

 		$pdfFilePath = strtolower(str_replace(' ','_','invoice '.$invoice->kdquo)).".pdf";

		$html = $this->load->view('invoice/cetak_invoice',$data,TRUE);
		$m_pdf->WriteHTML($html);
		$m_pdf->Output($pdfFilePath, 'I');
	}

}