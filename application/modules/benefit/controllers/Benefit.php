<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Benefit extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('benefit/Benefit_model', 'benefit');
        $this->load->model('employee/Employee_model', 'employee');
    }

    public function index()
    {
        $data['benefit'] = $this->benefit->get()->result();
        $data['title'] = 'Daftar Tunjangan';
        $data['main'] = 'benefit/index';
        $this->load->view('layout', $data);
    }

    function add()
    {
        if ($_POST) {
            $data['employee_id'] = $this->input->post('employee_id');
            $data['statis'] = $this->input->post('statis');
            $data['dinamis'] = $this->input->post('dinamis');
            $data['struktural'] = $this->input->post('struktural');
            $data['rumah'] = $this->input->post('rumah');
            $data['kemahalan'] = $this->input->post('kemahalan');
            $data['family'] = $this->input->post('family');
            $data['kinerja'] = $this->input->post('kinerja');
            $data['produktif'] = $this->input->post('produktif');
            $data['teller'] = $this->input->post('teller');
            $data['beban'] = $this->input->post('beban');
            $data['masa_kerja'] = $this->input->post('masa_kerja');
            $data['makan'] = $this->input->post('makan');
            $data['transport'] = $this->input->post('transport');
            $data['dplk'] = $this->input->post('dplk');
            $data['total_tetap'] = $data['statis'] + $data['dinamis'] + $data['struktural'] + $data['rumah'] + $data['kemahalan'] + $data['family'] + $data['kinerja'] + $data['produktif'] + $data['teller'] + $data['beban'] + $data['masa_kerja'] + $data['dplk'];

            $benefit = $this->benefit->get(['benefit.employee_id' => $data['employee_id']])->row();

            if (!isset($benefit)) {
                $this->benefit->insert($data);
                $this->session->set_flashdata('success', 'Data Saved');
                redirect('benefit');
            } else {
                $this->session->set_flashdata('failed', 'Data Sudah ada');
                redirect('benefit');
            }
        } else {
            $data['employee'] = $this->employee->get()->result();
            $data['title'] = 'Tambah Tunjangan';
            $data['main'] = 'benefit/add';
            $this->load->view('layout', $data);
        }
    }

    function edit($id = null)
    {
        if ($_POST) {
            $data['statis'] = $this->input->post('statis');
            $data['dinamis'] = $this->input->post('dinamis');
            $data['struktural'] = $this->input->post('struktural');
            $data['rumah'] = $this->input->post('rumah');
            $data['kemahalan'] = $this->input->post('kemahalan');
            $data['family'] = $this->input->post('family');
            $data['kinerja'] = $this->input->post('kinerja');
            $data['produktif'] = $this->input->post('produktif');
            $data['teller'] = $this->input->post('teller');
            $data['beban'] = $this->input->post('beban');
            $data['masa_kerja'] = $this->input->post('masa_kerja');
            $data['makan'] = $this->input->post('makan');
            $data['transport'] = $this->input->post('transport');
            $data['dplk'] = $this->input->post('dplk');
            $data['total_tetap'] = $data['statis'] + $data['dinamis'] + $data['struktural'] + $data['rumah'] + $data['kemahalan'] + $data['family'] + $data['kinerja'] + $data['produktif'] + $data['teller'] + $data['beban'] + $data['masa_kerja'] + $data['dplk'];
            $this->benefit->update($data, ['benefit_id' => $id]);
            $this->session->set_flashdata('success', 'Data Saved');
            redirect('benefit');
        } else {
            $data['benefit'] = $this->benefit->get(['benefit_id' => $id])->row();
            $data['title'] = 'Tambah Tunjangan';
            $data['main'] = 'benefit/add';
            $this->load->view('layout', $data);
        }
    }
}

/* End of file Benefit.php */
