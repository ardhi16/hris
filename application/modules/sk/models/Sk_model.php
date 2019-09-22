<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sk_model extends CI_Model
{

    function get_last($arr = null, $limit = null, $offset = null)
    {
        $this->db->order_by('sk_id', 'desc');
        $this->db->select('sk_no, sk_created_at');
        return $this->db->get_where('sk', $arr, $limit, $offset);
    }

    function get($arr = null, $limit = null, $offset = null)
    {
        $this->db->order_by('sk_id', 'desc');
        $this->db->select('sk.*, employee.employee_name, employee.employee_gender, store.store_name, position.position_name');
        $this->db->join('employee', 'employee.employee_id = sk.employee_id', 'left');
        $this->db->join('store', 'store.store_id = sk.sk_store_id', 'left');
        $this->db->join('position', 'position.position_id = sk.sk_position_id', 'left');
        return $this->db->get_where('sk', $arr, $limit, $offset);
    }

    function insert($data)
    {
        return $this->db->insert('sk', $data);
    }

    function update($data, $cond)
    {
        return $this->db->update('sk', $data, $cond);
    }
}

/* End of file Sk_model.php */
