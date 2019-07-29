<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Panel extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		is_login();
	}
	public function index()
	{
		$this->template->load('template','panel/index');
	}
}