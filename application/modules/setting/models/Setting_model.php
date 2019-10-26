<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Setting_model extends CI_Model
{

    function get($arr = null, $limit = null, $offset = null)
    {
        return $this->db->get_where('setting', $arr, $limit, $offset);
    }

    function insert($data)
    {
        return $this->db->insert('setting', $data);
    }

    function update($data, $cond)
    {
        return $this->db->update('setting', $data, $cond);
    }
}

/* End of file Setting.php */
