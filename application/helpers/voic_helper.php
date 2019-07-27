<?php
defined('BASEPATH') or exit('No direct script access allowed');

/* 
| -------------------------------------------------------------------
| Herlper crapor
| -------------------------------------------------------------------
| @package   crapor
| @author    Kuswandi <wandinak17@gmail.com>
| @copyright Copyright (c) 2018 - 2019
| @since     1.0
| 
| -------------------------------------------------------------------
*/

  /**
   * Helper untuk membuat flash message sukses
   * @param  string $name
   * @param  string $text
   * @return string
   * @author Kuswandi <wandinak17@gmail.com>
   */
  function alertsuccess($name,$text) {
    $CI =& get_instance();
    $alert = ' 
    <div class="alert alert-success alert-dismissible" role="alert">
    '.$text.'
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    </div>
    ';
    return $CI->session->set_flashdata($name,$alert);
  }

  /**
   * Helper untuk membuat flash message error
   * @param  string $name
   * @param  string $text
   * @return string
   * @author Kuswandi <wandinak17@gmail.com>
   */
  function alerterror($name,$text) {
    $CI =& get_instance();
    $alert = ' 
    <div class="alert alert-danger alert-dismissible" role="alert">
    '.$text.'
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    </div>
    ';
    return $CI->session->set_flashdata($name,$alert);
  }

  /**
   * Helper untuk mengecek apakah user sudah login
   * @return boolean
   * @author Kuswandi <wandinak17@gmail.com>
   */ 
  function is_login()
  {
    $CI =& get_instance();
    if (!$CI->session->has_userdata('user_voic_identifer') && !$CI->session->has_userdata('username') ) {
      redirect('auth');
    }
  }

  /**
   * Helper untuk mengecek apakah user yang login adalah admin
   * @return boolean
   * @author Kuswandi <wandinak17@gmail.com>
   */
  function is_admin()
  {
    $CI =& get_instance();
    if( $CI->session->userdata('role_id') != 1) {
      redirect('errors/denied');
    }
  }

  /**
   * Helper untuk generate kode item
   * @return string
   * @author Kuswandi <wandinak17@gmail.com>
   */
  function generateKodeItem()
  {
    $year = date('y');
    $month = date('m');

    $CI =& get_instance();
    $CI->db->select_max('kditem');
    $query = $CI->db->get('items');

    if ($query->num_rows() > 0)
    {
       foreach ($query->result() as $row)
        {
            $kdmax = $row->kditem;
            $kode = (int) substr($kdmax, 4,4);
            $kode++;
            $nourut = sprintf("%'.04d\n", $kode);
        }
    }
    
    $genkditem = $year.''.$month.''.$nourut;

    return $genkditem;
  }

  /**
   * Helper untuk format rupiah
   * @return string
   * @author Kuswandi <wandinak17@gmail.com>
   */
  function rupiah($angka){
  
    $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
    return $hasil_rupiah;
 
  }