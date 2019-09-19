<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sp_model extends CI_Model
{

    function get_sp1($arr = null, $limit = null, $offset = null)
    {
        return $this->db->get_where('sp1', $arr, $limit, $offset);
    }
    function get_sp2($arr = null, $limit = null, $offset = null)
    {
        return $this->db->get_where('sp2', $arr, $limit, $offset);
    }

    function insert_sp1($data)
    {
        return $this->db->insert('sp1', $data);
    }

    function insert_sp2($data)
    {
        return $this->db->insert('sp2', $data);
    }

    function update_sp1($data, $cond)
    {
        return $this->db->update('sp1', $data, $cond);
    }

    function update_sp2($data, $cond)
    {
        return $this->db->update('sp2', $data, $cond);
    }
}

/* End of file Sp_model.php */
