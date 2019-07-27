<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->library(array('form_validation'));

		is_login();
	}

	public function index()
	{
		$data['customers'] = $this->db->get('customer')->result();
		$this->template->load('template','customer/index',$data);
	}


	public function create()
	{
		if($this->form_validation->run('customer/create') == FALSE) {
			$this->template->load('template','customer/create');
		} else {
			$data = [
            	'salutation' 	=> $this->input->post('salutation'),
            	'first_name' 	=> $this->input->post('first_name'),
            	'last_name' 	=> $this->input->post('last_name'),
            	'display_name' 	=> $this->input->post('display_name'),
            	'email' 		=> $this->input->post('email'),
            	'phone' 		=> $this->input->post('phone'),
            	'website' 		=> $this->input->post('website'),
            	'company_name' 	=> $this->input->post('company_name'),
            	'currency' 		=> $this->input->post('currency'),
            	'payment_terms' => $this->input->post('payment_terms'),
			];

			$this->db->insert('customer',$data);

			$insert_id = $this->db->insert_id();

			$datadetail = [
				'id_customer'		=> $insert_id,
				'bill_addr_street' 	=> $this->input->post('bill_addr_street',TRUE),
	            'bill_addr_city' 	=> $this->input->post('bill_addr_city',TRUE),
	            'bill_addr_state' 	=> $this->input->post('bill_addr_state',TRUE),
	            'bill_addr_zip_code'=> $this->input->post('bill_addr_zip_code',TRUE),
	            'bill_addr_country' => $this->input->post('bill_addr_country',TRUE),
	            'bill_addr_phone' 	=> $this->input->post('bill_addr_phone',TRUE),
	            'bill_addr_fax' 	=> $this->input->post('bill_addr_fax',TRUE),
	            'ship_addr_street' 	=> $this->input->post('ship_addr_street',TRUE),
	            'ship_addr_city' 	=> $this->input->post('ship_addr_city',TRUE),
	            'ship_addr_state' 	=> $this->input->post('ship_addr_state',TRUE),
	            'ship_addr_zip_code'=> $this->input->post('ship_addr_zip_code',TRUE),
	            'ship_addr_country'	=> $this->input->post('ship_addr_country',TRUE),
	            'ship_addr_phone' 	=> $this->input->post('ship_addr_phone',TRUE),
	            'ship_addr_fax' 	=> $this->input->post('ship_addr_fax',TRUE),
	            'notes' 			=> $this->input->post('notes',TRUE),
			];

			$this->db->insert('customer_details',$datadetail);

			alertsuccess('message','Berhasil menambah data customer');
			redirect('customer');
		}
	}

	public function edit($id)
	{
		if($this->form_validation->run('customer/create') == FALSE) {

			$this->db->select('*');
			$this->db->from('customer');
			$this->db->join('customer_details','customer_details.id_customer = customer.id');
			$this->db->where('customer.id', $id);
			$data['customer'] = $this->db->get()->row();

			$this->template->load('template','customer/edit',$data);
		} else {
			$data = [
            	'salutation' 	=> $this->input->post('salutation'),
            	'first_name' 	=> $this->input->post('first_name'),
            	'last_name' 	=> $this->input->post('last_name'),
            	'display_name' 	=> $this->input->post('display_name'),
            	'email' 		=> $this->input->post('email'),
            	'phone' 		=> $this->input->post('phone'),
            	'website' 		=> $this->input->post('website'),
            	'company_name' 	=> $this->input->post('company_name'),
            	'currency' 		=> $this->input->post('currency'),
            	'payment_terms' => $this->input->post('payment_terms'),
			];
			$this->db->update('customer',$data,"id = $id");

			$datadetail = [
				'bill_addr_street' 	=> $this->input->post('bill_addr_street'),
	            'bill_addr_city' 	=> $this->input->post('bill_addr_city'),
	            'bill_addr_state' 	=> $this->input->post('bill_addr_state'),
	            'bill_addr_zip_code'=> $this->input->post('bill_addr_zip_code'),
	            'bill_addr_country' => $this->input->post('bill_addr_country'),
	            'bill_addr_phone' 	=> $this->input->post('bill_addr_phone'),
	            'bill_addr_fax' 	=> $this->input->post('bill_addr_fax'),
	            'ship_addr_street' 	=> $this->input->post('ship_addr_street'),
	            'ship_addr_city' 	=> $this->input->post('ship_addr_city'),
	            'ship_addr_state' 	=> $this->input->post('ship_addr_state'),
	            'ship_addr_zip_code'=> $this->input->post('ship_addr_zip_code'),
	            'ship_addr_country'	=> $this->input->post('ship_addr_country'),
	            'ship_addr_phone' 	=> $this->input->post('ship_addr_phone'),
	            'ship_addr_fax' 	=> $this->input->post('ship_addr_fax'),
	            'notes' 			=> $this->input->post('notes'),
			];
			
			$this->db->update('customer_details',$datadetail,"id_customer = $id");


			alertsuccess('message','Berhasil mengubah data customer');
			redirect('customer');
		}
	}

	public function detail($id)
	{
		$this->db->from('customer');
		$this->db->join('customer_details','customer_details.id_customer = customer.id');
		$this->db->where('customer.id', $id);
		$data['customer'] = $this->db->get()->row();
	    
	    $this->template->load('template','customer/view',$data);
	}




}