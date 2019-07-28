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
		$this->db->order_by('kdinv','DESC');
		$data['invoices'] = $this->db->get('invoice')->result();
		$this->template->load('template','invoice/index',$data);
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

        	$genkdPayRec = generateKodeItem('kdpayrec','payment_received');
        	$data = [
        		'kdpayrec' 	=> $genkdPayRec,
                'ctpay' 	=> $this->input->post('ctpay'),
                'id_customer'=> $this->input->post('id_customer'),
                'bankcharge'=> $this->input->post('bankcharge'),
                'paydate' 	=> $paydate,
                'paymode' 	=> $this->input->post('paymode'),
                'reference' => $this->input->post('reference'),
                'kdinv' 	=> $this->input->post('kdinv'),
                'invdate' 	=> $this->input->post('invdate'),
                'invamount' => $this->input->post('invamount'),
                'dueamount' => $this->input->post('dueamount'),
                'amount' 	=> $this->input->post('amount'),
                'remark' 	=> $this->input->post('remark'),
                'upload' 	=> $this->input->post('upload'),
        	];

        	$this->db->insert('payment_received',$data);

        	alertsuccess('message','Record Payment Success');
        	redirect('invoice');
		}

	}

}