<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
        if(expired()) redirect('client/subscription');
        $this->load->model('clientuser/Clientuser_model');
    }

    public function index()
    {
        $data['user'] = $this->Clientuser_model->get_client_user(array('client_user_id'=>$this->id_client))->row(); 
        $data['title'] = 'Profil';
        $data['main'] = 'profile/profile_client';
        $this->load->view('client/layout', $data);
    }

    public function edit() {
        $id = $this->input->post('id');
        $params['client_user_full_name'] = $this->input->post('full_name');
        $this->Clientuser_model->update_client_user($params, ['client_user_uid'=>$id]);

        $this->session->set_flashdata('success', 'Edit profil berhasil, silahkan login kembali');
        redirect('client/profile');
    }

    function cpw() {
        $params['client_user_password'] = password_hash($this->input->post('new_password'), PASSWORD_DEFAULT);
        $this->Clientuser_model->change_password($this->input->post('id'), $params);

        $this->session->set_flashdata('success', 'Ubah password pengguna berhasil');
        redirect('client/profile');
    }

}

/* End of file Profile_client.php */
/* Location: ./application/modules/profile/controllers/Profile_client.php */