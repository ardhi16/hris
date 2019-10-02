<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sp_model extends CI_Model
{

    function get_last($arr = null, $limit = null, $offset = null)
    {
        $this->db->order_by('sp_id', 'desc');
        $this->db->select('sp_no, sp_created_at');
        return $this->db->get_where('sp', $arr, $limit, $offset);
    }

    function get($arr = null, $limit = null, $offset = null)
    {
        $this->db->order_by('sp_id', 'desc');
        $this->db->select('sp.*, employee.employee_name');
        $this->db->join('employee', 'employee.employee_id = sp.employee_id', 'left');
        return $this->db->get_where('sp', $arr, $limit, $offset);
    }
    function get_sp2($arr = null, $limit = null, $offset = null)
    {
        return $this->db->get_where('sp2', $arr, $limit, $offset);
    }

    function insert($data)
    {
        return $this->db->insert('sp', $data);
    }

    function update($data, $cond)
    {
        return $this->db->update('sp', $data, $cond);
    }
}

/* End of file Sp_model.php */
