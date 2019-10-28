<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Benefit_model extends CI_Model
{

    function get($arr = null, $limit = null, $offset = null)
    {
        $this->db->select('benefit.*, employee_nik, employee_name');
        $this->db->join('employee', 'employee.employee_id = benefit.employee_id', 'left');
        return $this->db->get_where('benefit', $arr, $limit, $offset);
    }

    function get_benefit($arr = null, $limit = null, $offset = null)
    {
        $this->db->select('benefit.*, employee_nik, employee_name, employee_salary, employee_tax_status, employee_children, employee_gender');
        $this->db->join('employee', 'employee.employee_id = benefit.employee_id', 'left');
        return $this->db->get_where('benefit', $arr, $limit, $offset);
    }

    function insert($data)
    {
        return $this->db->insert('benefit', $data);
    }

    function update($data, $cond)
    {
        return $this->db->update('benefit', $data, $cond);
    }
}

/* End of file Benefit_model.php */
