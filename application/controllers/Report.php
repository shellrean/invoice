<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends CI_Controller {

	public function index()
	{

	}

	public function sales_by_customer()
	{
		// $this->db->from('customer');
		// $this->db->leftJoin('invoice','invoice.id_customer = customer.id');
		// $data['sales_by_customer'] = $this->db->get()->result();
		// var_dump($data)
		$data['customer'] = $this->db->get('customer')->result();
		$this->template->load('template','report/sales_by_customer',$data);
	}
}