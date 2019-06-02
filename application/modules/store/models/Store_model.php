<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Store_model extends CI_Model {

	public function get($arr=null, $limit=null, $offset=null, $params=array()){
		if(isset($params['search']))  {
			$this->db->like('employee_nik', $params['search']);
			$this->db->or_like('employee_name', $params['search']);
		}
		return $this->db->get_where('store', $arr, $limit, $offset);
	}

	public function insert($data){
		$this->db->insert('store', $data);
		$id = $this->db->insert_id();
		$status = $this->db->affected_rows();
		return ($status == 0) ? FALSE : $id; 
	}

	public function update($data, $condition){
		return $this->db->update('store', $data, $condition);
	}

	

}

/* End of file Store_model.php */
/* Location: ./application/modules/store/models/Store_model.php */