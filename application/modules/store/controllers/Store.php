<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Store extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('store/Store_model');
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
		$config['base_url'] = site_url('store');
		$config['per_page'] = $limit;
		$config['total_rows'] = $this->Store_model->get()->num_rows();
		$this->pagination->initialize($config);

		$data['jlhpage']= $page;
		$data['store'] = $this->Store_model->get(null,$limit,$offset)->result();

		$data['title'] = 'Daftar Kas';
		$data['main'] = 'store/index';
		$this->load->view('layout', $data);
	}

	function add(){
		$data['store_name'] = htmlspecialchars($this->input->post('store_name'));

		$status = $this->Store_model->insert($data);

		if($status){
			$this->session->set_flashdata('success', 'Data berhasil ditambahkan');
			redirect('store');
		} else {
			$this->session->set_flashdata('failed', 'Data gagal disimpan');
			redirect('store');
		}
	}

	function edit(){
		$id = $this->input->post('id');
		$data['store_name'] = htmlspecialchars($this->input->post('store_name'));

		$status = $this->Store_model->update($data, ['store_id'=>$id]);

		if($status){
			$this->session->set_flashdata('success', 'Update berhasil');
			redirect('store');
		} else {
			$this->session->set_flashdata('failed', 'Update gagal');
			redirect('store');
		}
	}

}

/* End of file store_store.php */
/* Location: ./application/modules/store/controllers/store_store.php */