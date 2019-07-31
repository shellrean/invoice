<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends CI_Controller {

	public function index()
	{

	}

	public function sales_by_customer()
	{
		$data['customer'] = $this->db->get('customer')->result();
		$this->template->load('template','report/sales_by_customer',$data);
	}

	public function sales_by_item()
	{
		$data['item'] = $this->db->get('items')->result();
		$this->template->load('template','report/sales_by_item',$data);
	}

	public function time_to_get_paid()
	{
		$data['invoice'] = $this->db->get('invoice')->result();
		$this->template->load('template','report/time_to_get_paid',$data);
	}
}