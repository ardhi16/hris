<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cuti_model extends CI_Model
{

    function get($arr = null, $limit = null, $offset = null)
    {
        $this->db->order_by('cuti_id', 'desc');
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

    // sisa cuti model

    function get_sisa($arr = null, $limit = null, $offset = null)
    {
        $this->db->order_by('id', 'desc');
        $this->db->select('sisa_cuti.*, sisa_cuti.employee_id, employee_nik, employee_name');
        $this->db->join('employee', 'employee.employee_id = sisa_cuti.employee_id', 'left');
        return $this->db->get_where('sisa_cuti', $arr, $limit, $offset);
    }

    function insert_sisa($data)
    {
        return $this->db->insert('sisa_cuti', $data);
    }

    function update_sisa($employee_id, $year, $value, $op = '-')
    {
        $this->db->set('remain', "remain$op$value", FALSE);
        $this->db->where('employee_id', $employee_id);
        $this->db->where('period', $year);
        return $this->db->update('sisa_cuti');
    }
}

/* End of file Cuti_model.php */
