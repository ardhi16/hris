<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Angsuran_model extends CI_Model
{

    function get($arr = null, $limit = null, $offset = null)
    {
        $this->db->order_by('angsuran_id', 'desc');
        $this->db->select('angsuran.*, name_ang, employee_nik, employee_name');
        $this->db->join('type_angsuran', 'type_angsuran.id = angsuran.type_id');
        $this->db->join('employee', 'employee.employee_id = angsuran.employee_id', 'left');
        return $this->db->get_where('angsuran', $arr, $limit, $offset);
    }

    function get_type($arr = null, $limit = null, $offset = null)
    {
        return $this->db->get_where('type_angsuran', $arr, $limit, $offset);
    }

    function insert($data)
    {
        return $this->db->insert('angsuran', $data);
    }

    function update($data, $cond)
    {
        return $this->db->update('angsuran', $data, $cond);
    }

    function update_current($id, $value, $op = '+')
    {
        $this->db->set('angsuran_current', "angsuran_current$op$value", FALSE);
        $this->db->where('angsuran_id', $id);
        return $this->db->update('angsuran');
    }
}

/* End of file Angsuran.php */
