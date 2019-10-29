<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pay_model extends CI_Model
{

    function get($arr = null, $limit = null, $offset = null)
    {
        $this->db->select('pay.*, employee_nik, employee_name');
        $this->db->join('employee', 'employee.employee_id = pay.employee_id', 'left');
        return $this->db->get_where('pay', $arr, $limit, $offset);
    }

    function get_check($arr = null, $limit = null, $offset = null)
    {
        $this->db->select('employee_id, pay_period_month, pay_period_year');
        return $this->db->get_where('pay', $arr, $limit, $offset);
    }

    function get_employee($arr = null, $limit = null, $offset = null)
    {
        $this->db->order_by('employee_name', 'asc');
        $this->db->select('employee_id, employee_nik, employee_name');
        return $this->db->get_where('employee', $arr, $limit, $offset);
    }

    function insert($data)
    {
        return $this->db->insert('pay', $data);
    }

    function update($data, $cond)
    {
        return $this->db->update('pay', $data, $cond);
    }
}

/* End of file Pay_model.php */
