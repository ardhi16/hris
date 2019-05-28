<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employee_model extends CI_Model {

	public function get($arr=null, $limit=null, $offset=null){
		$this->db->join('position', 'position.position_id = employee.position_id', 'left');
		$this->db->join('store', 'store.store_id = employee.store_id', 'left');
		$this->db->join('grade', 'grade.grade_id = position.grade_id', 'left');
		$this->db->join('division', 'division.division_id = position.division_id', 'left');
		$this->db->join('users', 'users.user_id = employee.user_id', 'left');
		return $this->db->get_where('employee', $arr, $limit, $offset);
	}

	public function get_school($arr=null, $limit=null, $offset=null){
		$this->db->join('employee', 'employee.employee_id = school.employee_id', 'left');
		return $this->db->get_where('school', $arr, $limit, $offset);
	}

	public function get_family($arr=null, $limit=null, $offset=null){
		$this->db->join('employee', 'employee.employee_id = family.employee_id', 'left');
		return $this->db->get_where('family', $arr, $limit, $offset);
	}

	public function get_contract($arr=null, $limit=null, $offset=null){
		$this->db->join('employee', 'employee.employee_id = contract.employee_id', 'left');
		return $this->db->get_where('contract', $arr, $limit, $offset);
	}

	public function insert($data){
		$this->db->insert('employee', $data);
		$id = $this->db->insert_id();
		$status = $this->db->affected_rows();
		return ($status == 0) ? FALSE : $id; 
	}

	public function update($data, $condition){
		return $this->db->update('employee', $data, $condition);
	}

	

}

/* End of file Employee_model.php */
/* Location: ./application/modules/employee/models/Employee_model.php */