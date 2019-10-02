<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Holiday_model extends CI_Model
{

    function get($arr = null, $limit = null, $offset = null)
    {
        return $this->db->get_where('holiday', $arr, $limit, $offset);
    }

    function insert($data)
    {
        return $this->db->insert('holiday', $data);
    }

    function update($data, $cond)
    {
        return $this->db->update('holiday', $data, $cond);
    }

    function delete($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('holiday');
    }
}

/* End of file Holiday_model.php */
