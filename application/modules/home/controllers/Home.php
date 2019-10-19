<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('user/User_model', 'user');
		$this->load->model('employee/Employee_model', 'employee');
		$this->load->model('store/Store_model', 'store');
		$this->load->model('kkout/Kkout_model', 'kkout');
		$this->load->model('home/Home_model', 'home');
	}

	public function index()
	{
		$data['user'] = $this->user->get(['user_id' => $this->uid])->row();
		$data['total_employee'] = $this->employee->get(['employee_active' => 1])->num_rows();
		$data['total_store'] = $this->store->get()->num_rows();

		$fil_out = [];
		$fil_out['MONTH(kkout_date)'] = date('m');
		$fil_out['YEAR(kkout_date)'] = date('Y');
		$data['total_out'] = $this->kkout->get($fil_out)->num_rows();

		$fill_contract = [];
		$fill_contract['employee_status'] = 'KONTRAK';
		$select = date('Y-m');
		$res = $this->home->get_contract($fill_contract)->result();
		$arr = [];
		foreach ($res as $key) {
			$contract = $this->home->get_con(['employee_id' => $key->employee_id])->result();

			$total_contract = 0;
			foreach ($contract as $row) {
				$total_contract += $row->contract_length;
			}

			if (count($contract) > 0) {
				$due = $key->employee_join_date;
				$due = date('Y-m-d', strtotime($due));
				$key->end_contract = date('Y-m-d', strtotime('+' . $total_contract . ' month', strtotime($due)));

				if (date('Y-m', strtotime($key->end_contract)) == $select) {
					array_push($arr, [
						'employee_id' => $key->employee_id,
					]);
				}
			}
		}
		
		$data['total_contract'] = count($arr);
		$data['title'] = 'Beranda';
		$data['main'] = 'home/index';
		$this->load->view('layout', $data);
	}

}

/* End of file Home.php */
/* Location: ./application/modules/home/Home.php */