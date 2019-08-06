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

	public function profile()
	{
		if($this->input->post('submit')) {
			$data = [
				'username' => $this->input->post('username'),
				'name'	   => $this->input->post("name")
			];

			if($this->input->post('password')) {
				$data['password'] = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
			}

			$this->db->update('user',$data,array('username' => $this->session->userdata('username')));
			alertsuccess('message','Profile berhasil diubah anda akan logout bila username diganti');
			if($this->session->userdata('username') != $data['username']) {
				redirect('auth/logout');
			}
			else {
				redirect('panel/profile');
			}
		}
		else {
		$data['profile'] = $this->db->get_where('user',['username' => $this->session->userdata('username')])->row();
		$this->template->load('template','panel/profile',$data);
		}
	}
}