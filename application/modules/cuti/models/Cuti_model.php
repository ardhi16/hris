<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cuti_model extends CI_Model
{

    function get($arr = null, $limit = null, $offset = null)
    {
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
