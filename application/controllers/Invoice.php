<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Invoice extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->library(array('form_validation'));
	}
	public function index()
	{
		$this->db->order_by('kdinv','DESC');
		$data['invoices'] = $this->db->get('invoice')->result();
		$this->template->load('template','invoice/index',$data);
	}

	public function detail($id)
	{
		$data['invoice'] = $this->db->get_where('invoice',array('kdinv' => $id))->row();
		$data['details'] = $this->db->get_where('invoice_details',array('kdinv' => $id))->result();

		$this->template->load('template','invoice/detail',$data);
	}

	public function record_payment($id)
	{
		if($this->form_validation->run('record_payment') == FALSE) {

			$data['invoice'] = $this->db->get_where('invoice',array('kdinv' => $id))->row();
			$data['details'] = $this->db->get_where('invoice_details',array('kdinv' => $id))->result();

			$this->template->load('template','invoice/record_payment',$data);
		
		} else {
			$date = explode("-", $this->input->post('paydate'));
        	$paydate = $date[2]."-".$date[1]."-".$date[0];

        	$this->db->update('invoice',array('status' => 14),array('kdinv' => $id));

        	$genkdPayRec = generateKodeItem('kdpayrec','payment_received','PYM');
        	$data = [
        		'kdpayrec' 	=> $genkdPayRec,
                'id_customer'=> $this->input->post('id_customer'),
                'bankcharge'=> $this->input->post('bankcharge'),
                'paydate' 	=> $paydate,
                'kdinv' 	=> $this->input->post('kdinv'),
                'invdate' 	=> $this->input->post('invdate'),
                'invamount' => $this->input->post('invamount'),
                'dueamount' => $this->input->post('dueamount'),
                'amount' 	=> $this->input->post('amount'),
        	];

        	$this->db->insert('payment_received',$data);

        	alertsuccess('message','Record Payment Success');
        	redirect('invoice');
		}

	}

	public function print($id)
	{
		$invoice = $this->db->get_where('invoice',array('kdinv' => $id))->row();
		$details = $this->db->get_where('invoice_details',array('kdinv' => $id))->result();
		$data['invoice'] = $invoice;
		$data['details'] = $details;
		$mpdfConfig = array(
				'format' => 'A4',
				'orientation' => 'P'  	
			);
		$m_pdf = new \Mpdf\Mpdf($mpdfConfig);
		$m_pdf->SetMargins(0, 0, 4);
		$m_pdf->showImageErrors = true;

 		$pdfFilePath = strtolower(str_replace(' ','_','invoice '.$invoice->kdquo)).".pdf";

		$html = $this->load->view('invoice/cetak_invoice',$data,TRUE);
		$m_pdf->WriteHTML($html);
		$m_pdf->Output($pdfFilePath, 'I');
	}

}