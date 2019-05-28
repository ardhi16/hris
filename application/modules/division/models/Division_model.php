<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Division_model extends CI_Model {

	public function get($arr=null, $limit=null, $offset=null){
		return $this->db->get_where('division', $arr, $limit, $offset);
	}

	public function insert($data){
		$this->db->insert('division', $data);
		$id = $this->db->insert_id();
		$status = $this->db->affected_rows();
		return ($status == 0) ? FALSE : $id; 
	}

	public function update($data, $condition){
		return $this->db->update('division', $data, $condition);
	}

	

}

/* End of file Division_model.php */
/* Location: ./application/modules/division/models/Division_model.php */