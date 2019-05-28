<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class employee extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('position/Position_model');
		$this->load->model('store/Store_model');
		$this->load->model('grade/Grade_model');
		$this->load->model('employee/Employee_model');
	}

	public function index()
	{
		$data['married'] = ['TIDAK MENIKAH','MENIKAH','DUDA','JANDA'];
		$data['level'] = ['SMA','S1','S2','S3'];
		$data['relation'] = ['AYAH','IBU','ANAK','SUAMI','ISTRI'];
		$data['title'] = 'Data Karyawan';
		$data['main'] = 'employee/index';
		$this->load->view('layout', $data);
	}

	function add(){
		$data['division_id'] = htmlspecialchars($this->input->post('division_id'));
		$data['employee_code'] = htmlspecialchars($this->input->post('employee_code'));
		$data['employee_name'] = htmlspecialchars($this->input->post('employee_name'));

		$status = $this->Employee_model->insert($data);

		if($status){
			$this->session->set_flashdata('success', 'Data berhasil ditambahkan');
			redirect('employee');
		} else {
			$this->session->set_flashdata('failed', 'Data gagal disimpan');
			redirect('employee');
		}
	}

	function edit(){
		$id = $this->input->post('id');
		$data['division_id'] = htmlspecialchars($this->input->post('division_id'));
		$data['employee_name'] = htmlspecialchars($this->input->post('employee_name'));

		$status = $this->Employee_model->update($data, ['employee_id'=>$id]);

		if($status){
			$this->session->set_flashdata('success', 'Update berhasil');
			redirect('employee');
		} else {
			$this->session->set_flashdata('failed', 'Update gagal');
			redirect('employee');
		}
	}

}

/* End of file employee_employee.php */
/* Location: ./application/modules/employee/controllers/employee_employee.php */