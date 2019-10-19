<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home_model extends CI_Model
{

    function get_contract($arr = null, $limit = null, $offset = null)
    {
        $this->db->select('employee_id, employee_join_date');
        return $this->db->get_where('employee', $arr, $limit, $offset);
    }

    function get_con($arr = null, $limit = null, $offset = null)
    {
        $this->db->order_by('contract_id', 'desc');
        return $this->db->get_where('contract', $arr, $limit, $offset);
    }
}

/* End of file Home_model.php */
