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
			$h_j =  str_replace('.', '', $this->input->post('harga_jual'));
			$h_b =  str_replace('.', '', $this->input->post('harga_beli'));
			
			$kode = generateKodeItem('kditem','items','ITM');
			$data = [
				'kditem'			=> $kode,
				'nama'			=> $this->input->post('nama'),
				'harga_beli'	=> (int)$h_b,
				'harga_jual'	=> (int)$h_j,
				'deskripsi'		=> $this->input->post('deskripsi'),
			];

			$this->db->insert('items',$data);

			alertsuccess('message','Data item berhasil ditambah');
			redirect('item');
		}
	}

	public function edit($kditem)
	{
		if($this->form_validation->run('item/create') == FALSE) {

			$data['item'] = $this->db->get_where('items',['kditem' => $kditem])->row();
			$this->template->load('template','item/edit',$data);

		} else {
			$h_j =  str_replace('.', '', $this->input->post('harga_jual'));
			$h_b =  str_replace('.', '', $this->input->post('harga_beli'));

			$data = [
				'nama'			=> $this->input->post('nama'),
				'harga_beli'	=> (int)$h_b,
				'harga_jual'	=> (int)$h_j,
				'deskripsi'		=> $this->input->post('deskripsi'),
			];

			$this->db->update('items',$data,['kditem' => $kditem]);

			alertsuccess('message','Data item berhasil diubah');
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