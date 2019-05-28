<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Grade extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('grade/Grade_model');
	}

	public function index()
	{

		$this->load->library('pagination');
		$page = $this->input->get('per_page');

		$limit=5; 

		if(!$page):
			$offset = 0;
		else:
			$offset = $page;
		endif;

		$config['page_query_string'] = TRUE;
		$config['enable_query_strings'] = TRUE;
		$config['query_string_segment'] = 'per_page';
		$config['base_url'] = site_url('grade');
		$config['per_page'] = $limit;
		$config['total_rows'] = $this->Grade_model->get()->num_rows();
		$this->pagination->initialize($config);

		$data['jlhpage']= $page;
		$data['grade'] = $this->Grade_model->get(null,$limit,$offset)->result();

		$data['title'] = 'Daftar Grade';
		$data['main'] = 'grade/index';
		$this->load->view('layout', $data);
	}

	function add(){
		$data['grade_name'] = htmlspecialchars($this->input->post('grade_name'));

		$status = $this->Grade_model->insert($data);

		if($status){
			$this->session->set_flashdata('success', 'Data berhasil ditambahkan');
			redirect('grade');
		} else {
			$this->session->set_flashdata('failed', 'Data gagal disimpan');
			redirect('grade');
		}
	}

	function edit(){
		$id = $this->input->post('id');
		$data['grade_name'] = htmlspecialchars($this->input->post('grade_name'));

		$status = $this->Grade_model->update($data, ['grade_id'=>$id]);

		if($status){
			$this->session->set_flashdata('success', 'Update berhasil');
			redirect('grade');
		} else {
			$this->session->set_flashdata('failed', 'Update gagal');
			redirect('grade');
		}
	}

}

/* End of file grade_grade.php */
/* Location: ./application/modules/grade/controllers/grade_grade.php */