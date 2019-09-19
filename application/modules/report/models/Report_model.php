<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Report_model extends CI_Model
{

    function get_employee($arr = null, $limit = null, $offset = null)
    {
        $this->db->join('store', 'store.store_id = employee.store_id', 'left');
        $this->db->join('position', 'position.position_id = employee.position_id', 'left');
        $this->db->join('grade', 'grade.grade_id = position.grade_id', 'left');
        $this->db->join('division', 'division.division_id = position.division_id', 'left');
        return $this->db->get_where('employee', $arr, $limit, $offset);
    }
}

/* End of file Report_model.php */
