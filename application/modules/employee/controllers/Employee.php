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

		$date = str_replace('-', '', $data['employee_bdate']);
		$pass = date('dmy', strtotime($date));
		$data['employee_pin'] = password_hash($pass, PASSWORD_DEFAULT);

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
		$data['employee_family_card'] = $this->input->post('employee_family_card');
		$data['employee_ordner'] = $this->input->post('employee_ordner');
		$data['employee_salary'] = $this->input->post('employee_salary');
		$data['user_id'] = $this->uid;

		$check = $this->Employee_model->get(['employee.employee_nik'=>$data['employee_nik']])->row();

		if(isset($check)){
			exit(json_encode(array('status' => false, 'result' => 'NIK sudah terdaftar')));
		}

		if($data['store_id'] == NULL){
			exit(json_encode(array('status' => false, 'result' => 'Penempatan tidak ditemukan')));
		}

		if($data['position_id'] == NULL){
			exit(json_encode(array('status' => false, 'result' => 'Jabatan tidak ditemukan')));
		}

		$status = $this->Employee_model->insert($data);

		$school = $this->input->post('school_level');
		$family = $this->input->post('family_name');
		$kontrak = $this->input->post('contract_period');

		if(isset($school)){
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
		}
		
		if(isset($family)){
			$detail_family = array();
			for ($i = 0; $i < count($family); $i++) {
				array_push($detail_family, [
					'employee_id' => $status,
					'family_name' => $this->input->post('family_name')[$i],
					'family_relation' => $this->input->post('family_relation')[$i],
					'family_bdate' => $this->input->post('family_bdate')[$i],
					'family_gender' => $this->input->post('family_gender')[$i]
				]);
			}
			$this->db->insert_batch('family', $detail_family);
		}
		
		if(isset($kontrak)){
			$detail_contract = array();
			for ($i = 0; $i < count($kontrak); $i++) {
				array_push($detail_contract, [
					'employee_id' => $status,
					'contract_period' => $kontrak[$i],
					'contract_length' => $this->input->post('contract_length')[$i]
				]);
			}
			$this->db->insert_batch('contract', $detail_contract);
		}
		

		if($status){
			exit(json_encode(array('status' => true, 'result' => 'Data berhasil ditambahkan')));
		} else {
			exit(json_encode(array('status' => false, 'result' => 'Data gagal ditambahkan')));
		}
	}

	function edit(){

		$data['employee_id'] = $this->input->post('employee_id');
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
		$data['employee_status'] = $this->input->post('employee_status');
		$data['employee_acc_bank'] = $this->input->post('employee_acc_bank');
		$data['employee_npwp'] = $this->input->post('employee_npwp');
		$data['employee_no_bpjskes'] = $this->input->post('employee_no_bpjskes');
		$data['employee_no_bpjstk'] = $this->input->post('employee_no_bpjstk');
		$data['employee_tax_status'] = $this->input->post('employee_tax_status');
		$data['employee_children'] = $this->input->post('employee_children');
		$data['employee_family_card'] = $this->input->post('employee_family_card');
		$data['employee_ordner'] = $this->input->post('employee_ordner');
		$data['employee_salary'] = $this->input->post('employee_salary');

		$status = $this->Employee_model->update($data, ['employee_id'=>$data['employee_id']]);

		$sid = $this->input->post('sid');
		$fid = $this->input->post('fid');
		$cid = $this->input->post('cid');
		$school = $this->input->post('school_level');
		$family = $this->input->post('family_name');
		$kontrak = $this->input->post('contract_period');

		$school_edit = array();
		for ($i=0; $i < count($sid); $i++) {  
			array_push($school_edit, [
				'school_id' => $sid[$i],
				'school_level' => $this->input->post('slevel')[$i],
				'school_major' => $this->input->post('smajor')[$i],
				'school_name' => $this->input->post('sname')[$i]
			]);
		}
		$this->db->update_batch('school', $school_edit, 'school_id');

		$family_edit = array(); 
		for ($i=0; $i < count($fid); $i++) { 
			array_push($family_edit, [
				'family_id' => $fid[$i],
				'family_name' => $this->input->post('fname')[$i],
				'family_relation' => $this->input->post('frelation')[$i],
				'family_bdate' => $this->input->post('fbdate')[$i],
				'family_gender' => $this->input->post('fgender')[$i]
			]);
		}
		$this->db->update_batch('family', $family_edit, 'family_id');

		if(isset($school)){
			$detail_school = array();
			for ($i = 0; $i < count($school); $i++) {
				array_push($detail_school, [
					'employee_id' => $data['employee_id'],
					'school_level' => $school[$i],
					'school_major' => $this->input->post('school_major')[$i],
					'school_name' => $this->input->post('school_name')[$i]
				]);
			}
			$this->db->insert_batch('school', $detail_school);
		}

		if(isset($family)){
			$detail_family = array();
			for ($i = 0; $i < count($family); $i++) {
				array_push($detail_family, [
					'employee_id' => $data['employee_id'],
					'family_name' => $this->input->post('family_name')[$i],
					'family_relation' => $this->input->post('family_relation')[$i],
					'family_bdate' => $this->input->post('family_bdate')[$i],
					'family_gender' => $this->input->post('family_gender')[$i]
				]);
			}
			$this->db->insert_batch('family', $detail_family);
		}
		
		if(isset($kontrak)){
			$detail_contract = array();
			for ($i = 0; $i < count($kontrak); $i++) {
				array_push($detail_contract, [
					'employee_id' => $data['employee_id'],
					'contract_period' => $kontrak[$i],
					'contract_length' => $this->input->post('contract_length')[$i]
				]);
			}
			$this->db->insert_batch('contract', $detail_contract);
		}

		if($status){
			exit(json_encode(array('status' => true, 'result' => 'Data berhasil diubah')));
		} else {
			exit(json_encode(array('status' => false, 'result' => 'Data gagal diubah')));
		}

	}

	function getEmployee(){
		$nik = $this->input->post('employee_nik');

		$employee = $this->Employee_model->get(['employee_nik'=>$nik])->row();
		echo json_encode($employee);
	}

	function getSchool(){
		$id = $this->input->post('employee_id');
		$school = $this->Employee_model->get_school(['school.employee_id'=>$id])->result();
		if(count($school) > 0){
			foreach ($school as $row) {
				echo '<div class="form-group">
				<div class="row">
				<div class="col-md-4">
				<label for="">Tingkat</label>
				<input type="hidden" name="sid[]" value="'.$row->school_id.'">
				<input type="text" class="form-control" name="slevel[]" id="school_level" value="'.$row->school_level.'" readonly="">
				</div>
				<div class="col-md-4">
				<label for="">Jurusan</label>
				<input type="text" class="form-control" name="smajor[]" id="school_major" value="'.$row->school_major.'">
				</div>
				<div class="col-md-4">
				<label for="">Nama Sekolah</label>
				<input type="text" class="form-control" name="sname[]" id="school_name" value="'.$row->school_name.'">
				</div>
				</div>
				</div>';
			}
		} else {
			echo null;
		}
	}

	function getContract(){
		$id = $this->input->post('employee_id');
		$contract = $this->Employee_model->get_contract(['contract.employee_id'=>$id])->result();
		if(count($contract) > 0){
			foreach ($contract as $row) {
				echo '<div class="form-group">
				<div class="row">
				<div class="col-md-6">
				<label for="">Periode Kontrak</label>
				<input type="hidden" name="cid[]" value="'.$row->contract_id.'">
				<input type="number" class="form-control" name="cperiod[]" value="'.$row->contract_period.'" readonly="">
				</div>
				<div class="col-md-6">
				<label for="">Lama Kontrak</label>
				<input type="number" class="form-control" name="clength[]" value="'.$row->contract_length.'" readonly="">
				</div>
				</div>
				</div>';
			}
		} else {
			echo null;
		}
	}

	function getFamily(){
		$id = $this->input->post('employee_id');
		$family = $this->Employee_model->get_family(['family.employee_id'=>$id])->result();

		if(count($family) > 0){
			foreach ($family as $row) {
				$gender = ($row->family_gender == 'L') ? 'Laki-laki' : 'Perempuan';
				echo '<div class="form-group">
				<div class="row">
				<div class="col-md-3">
				<label for="">Nama</label>
				<input type="hidden" name="fid[]" value="'.$row->family_id.'">
				<input type="text" class="form-control" name="fname[]" value="'.$row->family_name.'">
				</div>
				<div class="col-md-3">
				<label for="">Hubungan</label>
				<input type="text" class="form-control" name="frelation[]" value="'.$row->family_relation.'" readonly="">
				</div>
				<div class="col-md-3">
				<label for="">Tanggal Lahir</label>
				<input type="text" class="form-control datepicker" name="fbdate[]" value="'.$row->family_bdate.'" readonly="">
				</div>
				<div class="col-md-3">
				<label for="">Jenis Kelamin</label>
				<input type="text" class="form-control" name="fgender[]" value="'.$gender.'" readonly="">
				</div>
				</div>
				</div>';
			}
		} else {
			echo null;
		}
		
	}

	function getEmployeeAll(){
		$params = array();
		$search = $this->input->post('search');
		if(isset($search) && !empty($search) && $search != '') { 
			$params['search'] = $search;
		}
		$employee = $this->Employee_model->get(null,null,null,$params)->result();
		if(count($employee) > 0){
			$i = 1;
			foreach ($employee as $row) {
				echo '<tr><td>'.$i.'</td><td class="selectNik'.$row->employee_id.'">'.$row->employee_nik.'</td><td>'.$row->employee_name.'</td><td>'.$row->position_name.'</td><td><button data-id="'.$row->employee_id.'" type="button" data-dismiss="modal" class="btn btn-danger btn-xs btnSelect">Pilih</button></td></tr>';
				$i++;
			} 
		} else {
			echo '<tr><td colspan="5" align="center">Data Kosong</td></tr>';
		}
	}

	function getKasAll(){
		$params = array();
		$search = $this->input->post('searchKas');
		if(isset($search) && !empty($search) && $search != '') { 
			$params['search'] = $search;
		}
		$store = $this->Store_model->get(null,null,null,$params)->result();
		if(count($store) > 0){
			$i = 1;
			foreach ($store as $row) {
				echo '<tr><td>'.$i.'</td><td class="selectKas'.$row->store_id.'">'.$row->store_code.'</td><td>'.$row->store_name.'</td><td><button data-id="'.$row->store_id.'" type="button" data-dismiss="modal" class="btn btn-danger btn-xs btnSelectKas">Pilih</button></td></tr>';
				$i++;
			} 
		} else {
			echo '<tr><td colspan="4" align="center">Data Kosong</td></tr>';
		}
	}

	function getKas(){
		$store_code = $this->input->post('store_code');
		$store = $this->Store_model->get(['store.store_code'=>$store_code])->row();
		echo json_encode($store);
	}

	function getPosAll(){
		$params = array();
		$search = $this->input->post('searchPos');
		if(isset($search) && !empty($search) && $search != '') { 
			$params['search'] = $search;
		}
		$position = $this->Position_model->get(null,null,null,$params)->result();
		if(count($position) > 0){
			$i = 1;
			foreach ($position as $row) {
				echo '<tr><td>'.$i.'</td><td class="selectPos'.$row->position_id.'">'.$row->position_code.'</td><td>'.$row->position_name.'</td>><td>'.$row->division_name.'</td><td><button data-id="'.$row->position_id.'" type="button" data-dismiss="modal" class="btn btn-danger btn-xs btnSelectPos">Pilih</button></td></tr>';
				$i++;
			} 
		} else {
			echo '<tr><td colspan="5" align="center">Data Kosong</td></tr>';
		}
	}

	function getPos(){
		$position_code = $this->input->post('position_code');
		$position = $this->Position_model->get(['position.position_code'=>$position_code])->row();
		echo json_encode($position);
	}

}

/* End of file employee_employee.php */
/* Location: ./application/modules/employee/controllers/employee_employee.php */