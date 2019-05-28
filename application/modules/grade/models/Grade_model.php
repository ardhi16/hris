<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Grade_model extends CI_Model {

	public function get($arr=null, $limit=null, $offset=null){
		return $this->db->get_where('grade', $arr, $limit, $offset);
	}

	public function insert($data){
		$this->db->insert('grade', $data);
		$id = $this->db->insert_id();
		$status = $this->db->affected_rows();
		return ($status == 0) ? FALSE : $id; 
	}

	public function update($data, $condition){
		return $this->db->update('grade', $data, $condition);
	}

	

}

/* End of file Grade_model.php */
/* Location: ./application/modules/grade/models/Grade_model.php */