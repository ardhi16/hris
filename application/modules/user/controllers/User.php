<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends MY_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('user/User_model');
		$this->load->library('form_validation');
	}

	public function index()
	{

		$data['user'] = $this->User_model->get()->result();
		$data['title'] = 'Daftar Pengguna';
		$data['main'] = 'user/index';
		$this->load->view('layout', $data);
	}

	function add()
	{
		$this->form_validation->set_rules('username', 'Username', 'trim|required|is_unique[users.user_name]|xss_clean');
		$this->form_validation->set_rules('fullname', 'Name', 'trim|required|xss_clean');
		$this->form_validation->set_rules('status', 'Status', 'trim|required|xss_clean');
		$this->form_validation->set_rules('password', 'Password', 'required|matches[passconf]|min_length[6]');
		$this->form_validation->set_rules('passconf', 'Password Confirmation', 'required|min_length[6]');
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger"><button position="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>', '</div>');

		if ($_POST and $this->form_validation->run() == TRUE) {

			$params['user_name'] = $this->input->post('username');
			$params['user_password'] = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
			$params['user_fullname'] = $this->input->post('fullname');
			$params['user_email'] = $this->input->post('email');
			$params['user_status'] = $this->input->post('status');
			$params['role_id'] = $this->input->post('role_id');
			$this->User_model->insert($params);
			$this->session->set_flashdata('success', 'Data saved');
			redirect('user');
		} else {
			$data['role'] = $this->db->get('roles')->result();
			$data['title'] = 'Tambah Pengguna';
			$data['main'] = 'user/add';
			$this->load->view('layout', $data);
		}
	}

	function edit($id = null)
	{
		if (!isset($id)) redirect('user');

		$this->form_validation->set_rules('fullname', 'Name', 'trim|required|xss_clean');
		$this->form_validation->set_rules('status', 'Status', 'trim|required|xss_clean');
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger"><button position="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>', '</div>');

		if ($_POST and $this->form_validation->run() == TRUE) {

			$params['user_name'] = $this->input->post('fullname');
			$params['user_email'] = $this->input->post('email');
			$params['user_status'] = $this->input->post('status');
			$params['role_id'] = $this->input->post('role_id');
			$this->User_model->update($params, ['user_id' => $id]);
			$this->session->set_flashdata('success', 'Update saved');
			redirect('user');
		} else {
			$data['role'] = $this->db->get('roles')->result();
			$data['user'] = $this->User_model->get(['user_id' => $id])->row();
			$data['title'] = 'Edit Pengguna';
			$data['main'] = 'user/add';
			$this->load->view('layout', $data);
		}
	}

	function rpw($id = NULL)
	{
		if (!isset($id)) redirect('user');

		$this->form_validation->set_rules('password', 'Password', 'required|matches[passconf]|min_length[6]');
		$this->form_validation->set_rules('passconf', 'Password Confirmation', 'required|min_length[6]');
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>', '</div>');
		if ($_POST and $this->form_validation->run() == TRUE) {

			$params['user_password'] = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
			$this->User_model->update($params, ['user_id' => $id]);

			$this->session->set_flashdata('success', 'Reset password berhasil');
			redirect('user');
		} else {
			$data['title'] = 'Reset Password';
			$data['main'] = 'user/rpw';
			$this->load->view('layout', $data);
		}
	}
}

/* End of file User_merchant.php */
/* Location: ./application/modules/user/controllers/User_merchant.php */
