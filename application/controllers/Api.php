<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('employee/Employee_model', 'employee');
        $this->load->model('benefit/Benefit_model', 'benefit');
    }
    
    public function index()
    {
        $this->output->set_content_type('application/json')
        ->set_output(json_encode(['status' => false, 'message' => 'Nothing']));
    }

    function getEmployee()
    {
        $nik = $this->input->post('nik');
        $employee = $this->employee->get(['employee_nik' => $nik])->row();
        if(isset($employee)) {
            echo json_encode($employee);
        }
    }

    function getBenefit()
    {
        $id = $this->input->post('employee_id');
        $benefit = $this->benefit->get_benefit(['employee_id' => $id])->row();
        if (isset($benefit)) {
            echo json_encode($benefit);
        }
    }

    function getEmployeeAll()
    {
        $params = array();
        $search = $this->input->post('search');
        if (isset($search) && !empty($search) && $search != '') {
            $params['search'] = $search;
        }
        $employee = $this->employee->get(null, null, null, $params)->result();
        if (count($employee) > 0) {
            $i = 1;
            foreach ($employee as $row) {
                echo '<tr><td>' . $i . '</td><td class="selectNik' . $row->employee_id . '">' . $row->employee_nik . '</td><td>' . $row->employee_name . '</td><td>' . $row->position_name . '</td><td><button data-id="' . $row->employee_id . '" type="button" data-dismiss="modal" class="btn btn-danger btn-xs btnSelect">Pilih</button></td></tr>';
                $i++;
            }
        } else {
            echo '<tr><td colspan="5" align="center">Data Kosong</td></tr>';
        }
    }

}

/* End of file Api.php */
