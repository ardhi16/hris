<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kkout_model extends CI_Model
{

    function get($arr = null, $limit = null, $offset = null)
    {
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
