<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('user/User_model');
		$this->load->model('saldo/Saldo_model');
		$this->load->library('form_validation');
		if($this->role_id == 2){
			redirect('merchant');
		}
	}

	public function index($offset = NULL) {
		$this->load->library('pagination');
		$page = $this->input->get('per_page');
		$limit=5;

		if(!$page):
			$offset = 0;
		else:
			$offset = $page;
		endif;

		if($this->all_branch == 'YES'){
			$params['users.merchant_code'] = $this->merchant_code;
		} else {
			$params['users.merchant_code'] = $this->merchant_code;
			$params['users.branch_code'] = $this->branch_code;
			$params['users.role_id !='] = 3;
		}

		$config['page_query_string'] = TRUE;
		$config['enable_query_strings'] = TRUE;
		$config['query_string_segment'] = 'per_page';
		$config['base_url'] = site_url('merchant/user');
		$config['per_page'] = $limit;
		$config['total_rows'] = $this->User_model->get_user($params)->num_rows();
		$this->pagination->initialize($config);

		$data['jlhpage']= $page;
		$data['user'] = $this->User_model->get_user($params,$limit,$offset)->result();
		
		$data['title'] 	 = 'User List';   
		$data['main']      = 'user/user_list_merchant';
		$this->load->view('merchant/layout', $data);
	}

	function add(){
		$this->form_validation->set_rules('user_email', 'Email', 'trim|required|is_unique[users.user_email]|xss_clean');
		$this->form_validation->set_rules('user_full_name', 'Name', 'trim|required|xss_clean');
		$this->form_validation->set_rules('user_password', 'Password', 'required|matches[passconf]|min_length[6]');
		$this->form_validation->set_rules('passconf', 'Password Confirmation', 'required|min_length[6]');
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger"><button position="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>', '</div>');

		if ($_POST AND $this->form_validation->run() == TRUE) {

			$user = $this->User_model->get_user(array('users.branch_code'=>$this->branch_code))->result_array();
			$saldo = $this->Saldo_model->get_saldo(array('merchant_code'=>$this->merchant_code,'branch_code'=>$this->branch_code))->row_array();
			$token = random_string('alnum',32);
			$params['merchant_code'] = $this->merchant_code;

			if($this->all_branch == 'YES'){
				$params['branch_code'] = $this->input->post('branch_code');
			} else {
				$params['branch_code'] = $this->branch_code;
			}

			$params['user_email'] = $this->input->post('user_email'); 
			$params['user_password'] = md5($this->input->post('user_password')); 
			$params['user_full_name'] = $this->input->post('user_full_name'); 
			$params['role_id'] = $this->input->post('role_id'); 
			$params['user_status'] = $this->input->post('user_status'); 
			$params['user_token'] = $token; 
			
			if(count($user) == $saldo['saldo_max_users']){
				$this->session->set_flashdata('failed', 'User already '.$saldo['saldo_max_users'].' (max)');
				redirect('merchant/user');
			} else {
				$status = $this->User_model->insert($params);
				$this->Saldo_model->update_saldo(array(
				'branch_code' => $params['branch_code'],
				'increase_saldo_users' => 1
			));
				$this->session->set_flashdata('success','Data saved');
				redirect('merchant/user');
			}
		} else {
			$data['branch'] = $this->User_model->get_branch(array('merchant_code'=>$this->merchant_code))->result_array();

			$data['title'] 	 	= 'User Add';   
			$data['main']     = 'user/user_add_merchant';
			$this->load->view('merchant/layout', $data);
		}
	}

	function edit($merchant_code=NULL, $branch_code=NULL, $id=NULL){

		if($merchant_code == NULL OR $branch_code == NULL OR $id == NULL) {
			redirect('merchant/user');
		}
		$user = $this->User_model->get_user(array('users.merchant_code'=>$merchant_code, 'users.branch_code'=>$branch_code, 'user_id'=>$id))->row_array();

		if(count($user)==0){
			redirect('merchant/user');
		}

		$this->form_validation->set_rules('user_full_name', 'Name', 'trim|required|xss_clean');
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger"><button position="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>', '</div>');

		if ($_POST AND $this->form_validation->run() == TRUE) {

			$params['merchant_code'] = $this->merchant_code;
			$params['branch_code'] = $this->input->post('branch_code'); 
			$params['user_full_name'] = $this->input->post('user_full_name'); 
			$params['role_id'] = $this->input->post('role_id'); 
			$params['user_status'] = $this->input->post('user_status'); 
			
			$status = $this->User_model->update($params, array('user_id'=>$id));
			$this->session->set_flashdata('success','Data saved');
			redirect('merchant/user');
		} else {

			$data['user'] =  $this->User_model->get_user(array('user_id'=>$id))->row_array();
			$data['branch'] = $this->User_model->get_branch(array('merchant_code'=>$this->merchant_code))->result_array();

			$data['title'] 	 	= 'User Edit';   
			$data['main']     = 'user/user_add_merchant';
			$this->load->view('merchant/layout', $data);
		}
	}

	function rpw($merchant_code=NULL, $branch_code=NULL, $id=NULL) {

		if($merchant_code == NULL OR $branch_code == NULL OR $id == NULL) {
			redirect('merchant/user');
		}
		$user = $this->User_model->get_user(array('users.merchant_code'=>$merchant_code, 'users.branch_code'=>$branch_code, 'user_id'=>$id))->row_array();

		if(count($user)==0){
			redirect('merchant/user');
		}

		$this->load->library('form_validation');
		$this->form_validation->set_rules('user_password', 'Password', 'required|matches[passconf]|min_length[6]');
		$this->form_validation->set_rules('passconf', 'Password Confirmation', 'required|min_length[6]');
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>', '</div>');
		if ($_POST AND $this->form_validation->run() == TRUE) {

			$params['user_password'] = md5($this->input->post('user_password'));
			$status = $this->User_model->change_password($id, $params);

			$this->session->set_flashdata('success', 'Reset password saved');
			redirect('merchant/user');
		} else {
			if ($this->User_model->get(array('id' => $id)) == NULL) {
				redirect('merchant');
			}
			$data['title'] = 'Change Password User';
			$data['main'] = 'user/user_rpw_merchant';
			$this->load->view('merchant/layout', $data);
		}
	}

}

/* End of file User_merchant.php */
/* Location: ./application/modules/user/controllers/User_merchant.php */