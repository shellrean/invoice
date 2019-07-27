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

		}
	}
}