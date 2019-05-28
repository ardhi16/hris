<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Position extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('division/Division_model');
		$this->load->model('position/Position_model');
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
		$config['base_url'] = site_url('position');
		$config['per_page'] = $limit;
		$config['total_rows'] = $this->Position_model->get()->num_rows();
		$this->pagination->initialize($config);

		$data['jlhpage']= $page;
		$data['grade'] = $this->Grade_model->get()->result();
		$data['division'] = $this->Division_model->get()->result();
		$data['position'] = $this->Position_model->get(null,$limit,$offset)->result();

		$data['title'] = 'Daftar Jabatan';
		$data['main'] = 'position/index';
		$this->load->view('layout', $data);
	}

	function add(){
		$data['division_id'] = htmlspecialchars($this->input->post('division_id'));
		$data['grade_id'] = htmlspecialchars($this->input->post('grade_id'));
		$data['position_code'] = htmlspecialchars($this->input->post('position_code'));
		$data['position_name'] = htmlspecialchars($this->input->post('position_name'));

		$status = $this->Position_model->insert($data);

		if($status){
			$this->session->set_flashdata('success', 'Data berhasil ditambahkan');
			redirect('position');
		} else {
			$this->session->set_flashdata('failed', 'Data gagal disimpan');
			redirect('position');
		}
	}

	function edit(){
		$id = $this->input->post('id');
		$data['division_id'] = htmlspecialchars($this->input->post('division_id'));
		$data['grade_id'] = htmlspecialchars($this->input->post('grade_id'));
		$data['position_name'] = htmlspecialchars($this->input->post('position_name'));

		$status = $this->Position_model->update($data, ['position_id'=>$id]);

		if($status){
			$this->session->set_flashdata('success', 'Update berhasil');
			redirect('position');
		} else {
			$this->session->set_flashdata('failed', 'Update gagal');
			redirect('position');
		}
	}

}

/* End of file position_position.php */
/* Location: ./application/modules/position/controllers/position_position.php */