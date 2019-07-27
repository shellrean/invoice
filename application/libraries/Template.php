<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Template
{
  /**
   * Propery menampung data array dari default view
   * @return array
   */
  var $template_data = array();

  /**
  * Methodu untuk menambahkan variable yang di pakai di dalam view
  * @param string $name
  * @param string $value
  */
  function set($name, $value)
  {
    $this->template_data[$name] = $value;
  }

  /**
   * Method untuk meload template
   * @param string $template
   * @param string $view
   * @param array $view_data
   */
  function load($template = '', $view = '', $view_data = array(), $return = false)
  {
    $this->CI = &get_instance();
    $this->set('content_view', $this->CI->load->view($view, $view_data, true));
    return $this->CI->load->view($template, $this->template_data, $return);
  }
}
