<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Angsuran extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('angsuran/Angsuran_model', 'angsuran');
        $this->load->model('employee/Employee_model', 'employee');
    }

    public function index()
    {
        $data['angsuran'] = $this->angsuran->get()->result();
        $data['title'] = 'Daftar Angsuran';
        $data['main'] = 'angsuran/index';
        $this->load->view('layout', $data);
    }

    function add()
    {
        if ($_POST) {

            $data['employee_id'] = $this->input->post('employee_id');
            $data['type_id'] = $this->input->post('type_id');
            $data['angsuran_length'] = $this->input->post('angsuran_length');
            $data['angsuran_total'] = $this->input->post('angsuran_total');
            $data['angsuran_amount'] = str_replace(',', '', $this->input->post('angsuran_amount'));

            $angsuran = $this->angsuran->get(['angsuran.employee_id' => $data['employee_id'], 'type_id' => $data['type_id'], 'angsuran_status' => 0])->row();
            if (isset($angsuran)) {
                $this->session->set_flashdata('failed', 'Angsuran Sudah Ada Belum Lunas');
                redirect('angsuran');
            } else {
                $this->angsuran->insert($data);
                $this->session->set_flashdata('success', 'Data Saved');
                redirect('angsuran');
            }
        } else {
            $data['employee'] = $this->employee->get()->result();
            $data['tipe'] = $this->angsuran->get_type()->result();
            $data['title'] = 'Tambah Angsuran';
            $data['main'] = 'angsuran/add';
            $this->load->view('layout', $data);
        }
    }
}

/* End of file Angsuran.php */
