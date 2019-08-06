<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Absensi extends CI_Controller {

	public function index()
	{
		$this->db->select("id,nama");        
        $this->db->where(array('deleted'=>'N'));
		$data['divisi'] = $this->db->get("divisi");

		$this->template->load('template','absensi/index');
	}

}