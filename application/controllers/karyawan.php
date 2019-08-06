<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Karyawan extends CI_Controller {

  public function index()
  {
    $this->template->load('template','absensi/karyawan');
  }

}