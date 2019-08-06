<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->model('Mdl_Reports');
	}
	public function index()
	{

	}

	public function sales_by_customer()
	{
		if($this->input->post('btn_submit')) {
			$data = array(
				'results'	=> $this->Mdl_Reports->sales_by_client($this->input->post('from_date'), $this->input->post('to_date')),
				'from_date'	=> $this->input->post('from_date'),
				'to_date'	=> $this->input->post('to_date'),
			);

			$mpdfConfig = array(
					'format' => 'A4',
					'orientation' => 'P'  	
				);
			$m_pdf = new \Mpdf\Mpdf($mpdfConfig);
			$m_pdf->SetMargins(0, 0, 4);
			$m_pdf->showImageErrors = true;


			$html = $this->load->view('report/sales_by_customer_cetak',$data,true);

			$m_pdf->WriteHTML($html);
			$m_pdf->Output();

		}
		else {
			
		$data['customer'] = $this->db->get('customer')->result();
		$this->template->load('template','report/sales_by_customer',$data);
		}
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