<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Item extends CI_Controller {


	public function __construct()
	{
		parent::__construct();

		$this->load->library(array('form_validation'));

		is_login();
	}

	public function index()
	{
		$this->db->order_by('kditem', 'DESC');
		$items = $this->db->get('items')->result();

        $data = [
        	'items' => $items
        ];

		$this->template->load('template','item/index',$data);
	}

	public function create()
	{
		if($this->form_validation->run('item/create') == FALSE) {

			$this->template->load('template','item/create');

		} else {
			$data = [
				'kditem'		=> generateKodeItem(),
				'nama'			=> $this->input->post('nama'),
				'unit'			=> $this->input->post('unit'),
				'harga_beli'	=> $this->input->post('harga_beli'),
				'harga_jual'	=> $this->input->post('harga_jual'),
				'tax'			=> $this->input->post('tax'),
				'remark'		=> $this->input->post('remark'),
			];

			$this->db->insert('items',$data);

			alertsuccess('message','Data item berhasil ditambah');
			redirect('item');
		}
	} 
	public function detail($kditem) 
	{
    	$data['item'] = $this->db->get_where('items',['kditem' => $kditem])->row();
	    $this->template->set('modal_title','Detail item');
	    $this->template->set('modal_s','modal-lg');
	    $this->template->load('modal','item/view',$data);

    }
}