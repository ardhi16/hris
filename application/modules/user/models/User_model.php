<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

	function __construct() {
        parent::__construct();
    }

    function get($arr=null, $limit=null, $offset=null){
        $this->db->join('roles', 'roles.role_id = users.role_id', 'left');
        return $this->db->get_where('users', $arr, $limit, $offset);
    }

    function insert($data){
        return $this->db->insert('users', $data);
    }

    function update($data, $condition){
        return $this->db->update('users', $data, $condition);
    }

    function delete($id) {
        $this->db->where('user_id', $id);
        $this->db->delete('users');
    }

    function change_password($id, $params) {
        $this->db->where('user_id', $id);
        $this->db->update('users', $params);
    }

}

/* End of file User_model.php */
/* Location: ./application/modules/user/models/User_model.php */