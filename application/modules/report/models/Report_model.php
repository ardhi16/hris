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

    function get_contract($arr = null, $limit = null, $offset = null)
    {
        $this->db->select('employee_id, employee_nik, employee_name, division_name, store_name, position_name, grade_name, employee_status, employee_join_date');
        $this->db->join('store', 'store.store_id = employee.store_id', 'left');
        $this->db->join('position', 'position.position_id = employee.position_id', 'left');
        $this->db->join('grade', 'grade.grade_id = position.grade_id', 'left');
        $this->db->join('division', 'division.division_id = position.division_id', 'left');
        return $this->db->get_where('employee', $arr, $limit, $offset);
    }

    function get_con($arr = null, $limit = null, $offset = null)
    {
        $this->db->order_by('contract_id', 'desc');
        return $this->db->get_where('contract', $arr, $limit, $offset);
    }

    function get_sk($arr = null, $limit = null, $offset = null)
    {
        $this->db->select('sk.*, employee_name, employee_nik, store_name, position_name, grade_name');
        $this->db->join('employee', 'employee.employee_id = sk.employee_id', 'left');
        $this->db->join('store', 'store.store_id = employee.store_id', 'left');
        $this->db->join('position', 'position.position_id = employee.position_id', 'left');
        $this->db->join('grade', 'grade.grade_id = position.grade_id', 'left');
        return $this->db->get_where('sk', $arr, $limit, $offset);
    }

    function get_sp($arr = null, $limit = null, $offset = null)
    {
        $this->db->select('sp.*, employee_name, employee_nik, store_name, position_name, grade_name');
        $this->db->join('employee', 'employee.employee_id = sp.employee_id', 'left');
        $this->db->join('store', 'store.store_id = employee.store_id', 'left');
        $this->db->join('position', 'position.position_id = employee.position_id', 'left');
        $this->db->join('grade', 'grade.grade_id = position.grade_id', 'left');
        return $this->db->get_where('sp', $arr, $limit, $offset);
    }

    function get_kkout($arr = null, $limit = null, $offset = null)
    {
        $this->db->select('kkout.*, employee_name, employee_nik, store_name, position_name, grade_name');
        $this->db->join('employee', 'employee.employee_id = kkout.employee_id', 'left');
        $this->db->join('store', 'store.store_id = employee.store_id', 'left');
        $this->db->join('position', 'position.position_id = employee.position_id', 'left');
        $this->db->join('grade', 'grade.grade_id = position.grade_id', 'left');
        return $this->db->get_where('kkout', $arr, $limit, $offset);
    }

    function get_cuti($arr = null, $limit = null, $offset = null)
    {
        $this->db->select('cuti.*, employee_name, employee_nik, store_name, position_name, grade_name');
        $this->db->join('employee', 'employee.employee_id = cuti.employee_id', 'left');
        $this->db->join('store', 'store.store_id = employee.store_id', 'left');
        $this->db->join('position', 'position.position_id = employee.position_id', 'left');
        $this->db->join('grade', 'grade.grade_id = position.grade_id', 'left');
        return $this->db->get_where('cuti', $arr, $limit, $offset);
    }

    function get_store($arr = null, $limit = null, $offset = null)
    {
        return $this->db->get_where('store', $arr, $limit, $offset);
    }

    function get_pos($arr = null, $limit = null, $offset = null)
    {
        $this->db->join('grade', 'grade.grade_id = position.grade_id', 'left');
        return $this->db->get_where('position', $arr, $limit, $offset);
    }
}

/* End of file Report_model.php */
