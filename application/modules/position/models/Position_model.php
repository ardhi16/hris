<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Position_model extends CI_Model {

	public function get($arr=null, $limit=null, $offset=null){
		$this->db->join('division', 'division.division_id = position.division_id', 'left');
		$this->db->join('grade', 'grade.grade_id = position.grade_id', 'left');
		return $this->db->get_where('position', $arr, $limit, $offset);
	}

	public function insert($data){
		$this->db->insert('position', $data);
		$id = $this->db->insert_id();
		$status = $this->db->affected_rows();
		return ($status == 0) ? FALSE : $id; 
	}

	public function update($data, $condition){
		return $this->db->update('position', $data, $condition);
	}

	

}

/* End of file Position_model.php */
/* Location: ./application/modules/position/models/Position_model.php */