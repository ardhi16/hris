<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kkout_model extends CI_Model
{

    function get_last($arr = null, $limit = null, $offset = null)
    {
        $this->db->order_by('kkout_id', 'desc');
        $this->db->select('kkout_no, kkout_created_at');
        return $this->db->get_where('kkout', $arr, $limit, $offset);
    }

    function get($arr = null, $limit = null, $offset = null)
    {
        $this->db->order_by('kkout_id', 'desc');
        $this->db->select('kkout.*, employee.employee_name, employee.employee_nik, employee.employee_join_date, position.position_name');
        $this->db->join('employee', 'employee.employee_id = kkout.employee_id', 'left');
        $this->db->join('position', 'position.position_id = employee.position_id', 'left');
        return $this->db->get_where('kkout', $arr, $limit, $offset);
    }

    function insert($data)
    {
        return $this->db->insert('kkout', $data);
    }

    function update($data, $cond)
    {
        return $this->db->update('kkout', $data, $cond);
    }
}

/* End of file Kkout_model.php */
