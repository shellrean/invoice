<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mdl_Reports extends CI_Model {

	public function sales_by_client($from_date = null, $to_date = null)
    {
        $this->db->select('first_name, last_name, CONCAT(first_name," ", last_name) AS client_namesurname');

        if ($from_date and $to_date) {

            $from_date = date_to_mysql($from_date);
            $to_date = date_to_mysql($to_date);

            $this->db->select("
            (
                SELECT COUNT(*) FROM invoice
                    WHERE invoice.id_customer = customer.id 
                        AND invdate >= " . $this->db->escape($from_date) . "
                        AND invdate <= " . $this->db->escape($to_date) . "
            ) AS invoice_count");

            $this->db->select("
            (
                SELECT SUM(subtotal) FROM invoice
                    WHERE invoice.id IN
                    (
                        SELECT id FROM invoice
                            WHERE invoice.id_customer = customer.id
                                AND invdate >= " . $this->db->escape($from_date) . "
                                AND invdate <= " . $this->db->escape($to_date) . "
                    )
            ) AS sales");

            $this->db->select("
            (
                SELECT SUM(grdtotal) FROM invoice
                    WHERE invoice.id IN
                    (
                        SELECT id FROM invoice
                            WHERE invoice.id_customer = customer.id
                                AND invdate >= " . $this->db->escape($from_date) . "
                                AND invdate <= " . $this->db->escape($to_date) . "
                    )
            ) AS sales_with_tax");

            $this->db->where('
                id IN
                (
                    SELECT id_customer FROM invoice
                        WHERE invdate >=' . $this->db->escape($from_date) . '
                            AND invdate <= ' . $this->db->escape($to_date) . '
                )');

        } 
        $this->db->order_by('client_namesurname');

        return $this->db->get('customer')->result();
    }

}