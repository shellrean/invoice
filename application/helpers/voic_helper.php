<?php
defined('BASEPATH') or exit('No direct script access allowed');

/* 
| -------------------------------------------------------------------
| Herlper Voice Bisma application
| -------------------------------------------------------------------
| @package   Voic Helper
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
  function generateKodeItem($id,$tabel,$prefix = null)
  {
    $ci = get_instance();
    // $chars = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    // $res = "";
    // for ($i = 0; $i < 10; $i++) {
    //     $res .= $chars[mt_rand(0, strlen($chars)-1)];
    // }
    // $qid = strtoupper(uniqid());
    // $kode = trim(preg_replace('/\s+/', ' ', $prefix.$res.$qid));
    $ci->db->order_by($id,'DESC');
    $d = $ci->db->get($tabel)->row();
    
    $order_num = sprintf($prefix."%05d", $d->id+1);
    return $order_num;
  }
 
  /**
   * Helper untuk format rupiah
   * @return string
   * @author Kuswandi <wandinak17@gmail.com>
   */
  function rupiah($angka){
  
    $hasil_rupiah = "Rp" . number_format($angka,2,',','.');
    return $hasil_rupiah;
 
  }

  /**
   * Helper untuk membuat select 
   * @return string
   * @author Kuswandi <wandinak17@gmail.com>
   */
  function cmb_dinamis($name,$table,$field,$pk,$selected){
    $ci = get_instance();
    $cmb = "<select name='$name' class='js-example-basic-single js-states form-control select2'>";
    $data = $ci->db->get($table)->result();
    foreach ($data as $d){
        $cmb .="<option value='".$d->$pk."'";
        $cmb .= $selected==$d->$pk?" selected='selected'":'';
        $cmb .=">".  strtoupper($d->$field)."</option>";
    }
    $cmb .="</select>";
    return $cmb;  
  }

  /**
   * Helper untuk mengambil data dari selector
   * @return object
   * @author Kuswandi <wandinak17@gmail.com>
   */
  function getData($tabel,$selector,$field,$select = '*') {
    $CI =& get_instance();

    $CI->db->select($select);

    $result = $CI->db->get_where($tabel,[$selector => $field])->row();
    return $result;
  }

  /**
   * Helper untuk mengambil data dari selector
   * @return string
   * @author Kuswandi <wandinak17@gmail.com>
   */
  function getStatus($id){
    $CI =& get_instance();

    $data = $CI->db->get_where('master_status',['id' => $id])->row();

    return $data->status_name;
  }

  /**
   * Helper untuk mengambil data dari selector
   * @return string
   * @author Kuswandi <wandinak17@gmail.com>
   */
  function toDateInd($date){
    $dat = explode('-',$date);

    $y = $dat[0];
    $m = $dat[1];
    $d = $dat[2];

    $res = $d.'/'.$m.'/'.$y;

    return $res;
  }

  /**
   * Helper untuk membuat nomor order berurutan dengan prefix
   * @return string
   * @author Kuswandi <wandinak17@gmail.com>
   */
  function orderNumberGenerate(){
    $CI =&get_instance();

    $CI->db->order_by('id','DESC');
    $id_num = $CI->db->get('order_tabel')->row()->id+1;
    $order_num = sprintf("BCS-%010d", $id_num);

    $CI->db->insert('order_tabel',array('dd' => 'oke'));
    return $order_num;
  }


  /**
     * @return array
     */
    function statusesQuote()
    {
        return array(
            '1' => '<span class="label label-default">Naskah</span>',
            '2' => '<span class="label label-primary">Terkirim</span>',
            '3' => '<span class="label label-info">Terlihat</span>',
            '4' => '<span class="label label-success">Disetujui</span>',
            '5' => '<span class="label label-danger">Tertolak</span>',
            '6' => '<span class="label label-warning">Dibatalkan</span>',
        );
    }
    function statusesInv()
    {
        return array(
            '1' => '<span class="label label-default">Naskah</span>',
            '2' => '<span class="label label-primary">Terkirim</span>',
            '3' => '<span class="label label-info">Terlihat</span>',
            '4' => '<span class="label label-success">Lunas</span>',
            '5' => '<span class="label label-warning">Belum lunas</span>',
        );
    }

    /**
 * @param $date
 * @return string
 */
function date_to_mysql($date)
{
    $CI = &get_instance();

    // $date = DateTime::createFromFormat('m/d/Y', $date);
    // return $date->format('Y-m-d');

    $date =  date_create_from_format('m/d/Y',$date);
    return $date->format('Y-m-d');
}

function _htmlsc($output)
{
    echo htmlspecialchars($output, ENT_QUOTES);
}

/**
 * @param object $client
 * @return string
 */
function format_client($client)
{
    if ($client->client_surname != "") {
        return $client->client_name . " " . $client->client_surname;
    }

    return $client->client_name;
}