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

	        $kd = generateKodeItem('kdquo','quotation');
			$data = [
				'kdquo' 	=> $kd,
                'id_customer'=> $this->input->post('id_customer',TRUE),
                'reference' => $this->input->post('reference',TRUE),
                'quodate' 	=> $quodate,
                'expdate' 	=> $expdate,
                'subtotal' 	=> $this->input->post('invoice_subtotal',TRUE),
                'discount' 	=> $this->input->post('invoice_discount',TRUE),
                'shipprice' => $this->input->post('invoice_shipping',TRUE),
                'tax' 		=> $this->input->post('invoice_vat',TRUE),
                'grdtotal' 	=> $this->input->post('invoice_total',TRUE),
                'custnotes' => $this->input->post('custnotes',TRUE),
                'remark' 	=> $this->input->post('remark',TRUE),
                'status' 	=> 0,
			];

			$this->db->insert('quotation',$data);

			$counts = $this->input->post('invoice_product');

			$i=0;
            foreach ($counts as $c):
                $datadetail[$i] = array(
                        'kdquo' 		=> $kd,
                        'itemkd' 		=> $this->input->post('invoice_product')[$i],
                        'itemname' 		=> $this->input->post('invoice_product')[$i],
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
}