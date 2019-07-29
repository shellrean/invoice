<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payment_Received extends CI_Controller {

	public function index()
	{
		$data['pays'] = $this->db->get('payment_received')->result();
		$this->template->load('template','pay/index',$data);
	}

	public function detail($id)
	{
		$data['p'] = $this->db->get_where('payment_received',array('kdpayrec' => $id))->row();
		$this->template->set('modal_title','Detail Payment');
		$this->template->set('modal_s','modal-lg');
		$this->template->load('modal','pay/view',$data);
	}

}