<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employee extends MY_Controller {

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

		$data['employee_nik'] = $this->input->post('employee_nik');
		$data['employee_name'] = $this->input->post('employee_name');
		$data['employee_pob'] = $this->input->post('employee_pob');
		$data['employee_bdate'] = $this->input->post('employee_bdate');
		$data['employee_gender'] = $this->input->post('employee_gender');
		$data['employee_married'] = $this->input->post('employee_married');
		$data['employee_mother'] = $this->input->post('employee_mother');
		$data['employee_ktp'] = $this->input->post('employee_ktp');
		$data['employee_phone'] = $this->input->post('employee_phone');
		$data['employee_email'] = $this->input->post('employee_email');
		$data['employee_current_address'] = $this->input->post('employee_current_address');
		$data['employee_current_postcode'] = $this->input->post('employee_current_postcode');
		$data['employee_current_village'] = $this->input->post('employee_current_village');
		$data['employee_current_district'] = $this->input->post('employee_current_district');
		$data['employee_id_address'] = $this->input->post('employee_id_address');
		$data['employee_id_postcode'] = $this->input->post('employee_id_postcode');
		$data['employee_id_village'] = $this->input->post('employee_id_village');
		$data['employee_id_district'] = $this->input->post('employee_id_district');
		$data['employee_join_date'] = $this->input->post('employee_join_date');
		$data['store_id'] = $this->input->post('store_id');
		$data['employee_status'] = $this->input->post('employee_status');
		$data['position_id'] = $this->input->post('position_id');
		$data['employee_acc_bank'] = $this->input->post('employee_acc_bank');
		$data['employee_npwp'] = $this->input->post('employee_npwp');
		$data['employee_no_bpjskes'] = $this->input->post('employee_no_bpjskes');
		$data['employee_no_bpjstk'] = $this->input->post('employee_no_bpjstk');
		$data['employee_tax_status'] = $this->input->post('employee_tax_status');
		$data['employee_children'] = $this->input->post('employee_children');
		$data['employee_ordner'] = $this->input->post('employee_ordner');
		$data['user_id'] = $this->uid;

		$status = $this->Employee_model->insert($data);

		$school = $this->input->post('school_level');
		$family = $this->input->post('family_name');
		$kontrak = $this->input->post('contract_period');

		$detail_school = array();
		for ($i = 0; $i < count($school); $i++) {
			array_push($detail_school, [
				'employee_id' => $status,
				'school_level' => $school[$i],
				'school_major' => $this->input->post('school_major')[$i],
				'school_name' => $this->input->post('school_name')[$i]
			]);
		}
		$this->db->insert_batch('school', $detail_school);

		$detail_family = array();
		for ($i = 0; $i < count($family); $i++) {
			array_push($detail_family, [
				'employee_id' => $status,
				'family_card' => $this->input->post('family_card'),
				'family_name' => $this->input->post('family_name')[$i],
				'family_relation' => $this->input->post('family_relation')[$i],
				'family_bdate' => $this->input->post('family_bdate')[$i],
				'family_gender' => $this->input->post('family_gender')[$i]
			]);
		}
		$this->db->insert_batch('family', $detail_family);

		$detail_contract = array();
		for ($i = 0; $i < count($kontrak); $i++) {
			array_push($detail_contract, [
				'employee_id' => $status,
				'contract_period' => $kontrak[$i],
				'contract_length' => $this->input->post('contract_length')[$i]
			]);
		}
		$this->db->insert_batch('contract', $detail_contract);

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