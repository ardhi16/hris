<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cuti_model extends CI_Model
{

    function get($arr = null, $limit = null, $offset = null)
    {
        $this->db->select('cuti.*, cuti.employee_id, employee_name');
        $this->db->join('employee', 'employee.employee_id = cuti.employee_id', 'left');
        return $this->db->get_where('cuti', $arr, $limit, $offset);
    }

    function insert($data)
    {
        return $this->db->insert('cuti', $data);
    }

    function update($data, $cond)
    {
        return $this->db->update('cuti', $data, $cond);
    }
}

/* End of file Cuti_model.php */
