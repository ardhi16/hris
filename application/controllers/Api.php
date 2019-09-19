<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('employee/Employee_model', 'employee');
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

}

/* End of file Api.php */
