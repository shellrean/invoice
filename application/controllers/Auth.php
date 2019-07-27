<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->library(array('form_validation'));
	}
	
	public function index()
	{
		$this->_cekLogin();

		if ($this->form_validation->run('auth') == FALSE) {

			$this->load->view('auth/login');
		
		}
		else {
			
			$this->_login();

		}
		
	}

	private function _login()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$user = $this->db->get_where('user',[
			'username'		=> $username
		])->row();

		# if the user is find in database
		if($user) {

			if (password_verify($password, $user->password)) {
				
				$identifer = uniqid();

				$data = [
					'username'	=> $user->username,
					'role_id'	=> $user->role_id,
					'user_voic_identifer' => $identifer,
				];	

				$this->session->set_userdata($data);

				redirect('panel');
			}
			else {
				alerterror('message','Login Incorrect');
				redirect('auth');
			}
		} else {
			alerterror('message','Login incorrect');
			redirect('auth');
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('user_voic_identifer');

		alertsuccess('message','You have been logout');
		redirect('auth');
	}

	private function _cekLogin()
	{
		if ( $this->session->has_userdata('user_voic_identifer')) {
			redirect('panel');
		}
	}


}