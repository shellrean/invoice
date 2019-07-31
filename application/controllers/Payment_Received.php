<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payment_Received extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->library('form_validation');
	}

	public function index()
	{
		$data['pays'] = $this->db->get('payments')->result();
		$this->template->load('template','pay/index',$data);
	}

	public function detail($id)
	{
		$data['p'] = $this->db->get_where('payment_received',array('kdpayrec' => $id))->row();
		$this->template->set('modal_title','Detail Payment');
		$this->template->set('modal_s','modal-lg');
		$this->template->load('modal','pay/view',$data);
	}

	public function create()
	{
		if($this->form_validation->run('pay/create') == FALSE) {
			$this->db->where('balance >', 0);
			$data['open_invoices'] = $this->db->get('invoice')->result();
			$this->template->load('template','pay/record',$data);
		}
		else {
			$date = explode("-", $this->input->post('paydate'));
        	$paydate = $date[2]."-".$date[1]."-".$date[0];
			
			$invoice_id = $this->input->post('invoice_id');
			$inv = $this->db->get_where('invoice',array('id' => $invoice_id))->row();
			$paid =  str_replace('.', '', $this->input->post('amount'));
			$balance = $inv->balance-$paid;

			$datainv = [
				'balance' => $balance,
				'paid'	  => $inv->paid+$paid,
			];

			$datapay = [
				'invoice_id'	=> $invoice_id,
				'payment_date'	=> $paydate,
				'payment_amount'=> $paid,
			];

			if($balance == 0) {
				$datainv['status'] = 4;
			} else {
				$datainv['status'] = 5;
			}

			$this->db->update('invoice',$datainv,array('id' => $invoice_id));
			$this->db->insert('payments',$datapay);

			alertsuccess('message','Pembayaran berhasil dilakukan');
			redirect('payment_received');
		}
		
	}


}