<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Setting extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('setting/Setting_model', 'setting');
    }


    public function index()
    {
        if ($_POST) {

            $data['setting_name_1'] = $this->input->post('name1');
            $data['setting_pos_1'] = $this->input->post('pos1');
            $data['setting_name_2'] = $this->input->post('name2');
            $data['setting_pos_2'] = $this->input->post('pos2');
            $this->setting->update($data, ['setting_id' => 1]);
            $this->session->set_flashdata('success', 'Perubahan disimpan');
            redirect('setting');
        } else {
            $data['setting'] = $this->setting->get(['setting_id' => 1])->row();
            $data['title'] = 'Pengaturan';
            $data['main'] = 'setting/index';
            $this->load->view('layout', $data);
        }
    }
}

/* End of file Setting.php */
