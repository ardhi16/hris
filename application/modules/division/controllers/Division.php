<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Division extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('division/Division_model');
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
		$config['base_url'] = site_url('division');
		$config['per_page'] = $limit;
		$config['total_rows'] = $this->Division_model->get()->num_rows();
		$this->pagination->initialize($config);

		$data['jlhpage']= $page;
		$data['division'] = $this->Division_model->get(null,$limit,$offset)->result();

		$data['title'] = 'Daftar Divisi';
		$data['main'] = 'division/index';
		$this->load->view('layout', $data);
	}

	function add(){
		$data['division_code'] = htmlspecialchars($this->input->post('division_code'));
		$data['division_name'] = htmlspecialchars($this->input->post('division_name'));

		$status = $this->Division_model->insert($data);

		if($status){
			$this->session->set_flashdata('success', 'Data berhasil ditambahkan');
			redirect('division');
		} else {
			$this->session->set_flashdata('failed', 'Data gagal disimpan');
			redirect('division');
		}
	}

	function edit(){
		$id = $this->input->post('id');
		$data['division_code'] = htmlspecialchars($this->input->post('division_code'));
		$data['division_name'] = htmlspecialchars($this->input->post('division_name'));

		$status = $this->Division_model->update($data, ['division_id'=>$id]);

		if($status){
			$this->session->set_flashdata('success', 'Update berhasil');
			redirect('division');
		} else {
			$this->session->set_flashdata('failed', 'Update gagal');
			redirect('division');
		}
	}

}

/* End of file division_division.php */
/* Location: ./application/modules/division/controllers/division_division.php */