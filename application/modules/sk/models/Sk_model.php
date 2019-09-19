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
