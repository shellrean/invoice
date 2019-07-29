<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payment_Received extends CI_Controller {

	public function index()
	{
		$data['pays'] = $this->db->get('payment_received')->result();
		$this->template->load('template','pay/index',$data);
	}

}