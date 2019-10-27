<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pay extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('pay/Pay_model', 'pay');
    }

    public function index()
    {
        $data['pay'] = $this->pay->get()->result();
        $data['title'] = 'Daftar Gaji';
        $data['main'] = 'pay/index';
        $this->load->view('layout', $data);
    }

    function add()
    {
        if ($_POST) { } else {
            $data['employee'] = $this->pay->get_employee()->result();
            $data['title'] = 'Tambah Gaji';
            $data['main'] = 'pay/add';
            $this->load->view('layout', $data);
        }
    }
}

/* End of file Pay.php */
