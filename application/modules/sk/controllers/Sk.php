<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sk extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('sk/Sk_model', 'sk');
    }

    public function index()
    {
        $this->load->library('pagination');
        $page = $this->input->get('per_page');

        $limit = 5;

        if (!$page) :
            $offset = 0;
        else :
            $offset = $page;
        endif;

        $config['page_query_string'] = TRUE;
        $config['enable_query_strings'] = TRUE;
        $config['query_string_segment'] = 'per_page';
        $config['base_url'] = site_url('sk');
        $config['per_page'] = $limit;
        $config['total_rows'] = $this->sk->get()->num_rows();
        $this->pagination->initialize($config);

        $data['jlhpage'] = $page;
        $data['sk'] = $this->sk->get(null, $limit, $offset)->result();

        $data['title'] = 'Daftar SK';
        $data['main'] = 'sk/index';
        $this->load->view('layout', $data);
    }

    function add()
    {
        $this->form_validation->set_rules('sk_memo', 'No Memo', 'trim|required|xss_clean');
        $this->form_validation->set_rules('sk_memo_date', 'Tanggal Memo', 'trim|required|xss_clean');
        $this->form_validation->set_rules('employee_id', 'Karyawan', 'trim|required|xss_clean');
        $this->form_validation->set_rules('sk_store_id', 'Kas Tujuan', 'trim|required|xss_clean');
        $this->form_validation->set_rules('sk_position_id', 'Jabatan Tujuan', 'trim|required|xss_clean');
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger"><button position="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>', '</div>');

        if ($_POST and $this->form_validation->run() == TRUE) {

            $lastno = $this->sk->get_last(null, 1)->row_array();

            if (pretty_date($lastno['letter_created_at'], 'Y', false) < date('Y') or count($lastno) == 0) {
                $nomor = sprintf('%04d', '0001');
                $no_trx = $nomor . '/SK-DIR' . '/' . konversiBulan(date('m')) . '/' . date('Y');
            } else {
                $no = substr($lastno['sk_no'], 0, 4);
                $nomor = sprintf('%04d', $no + 0001);
                $no_trx = $nomor . '/SK-DIR' . '/' . konversiBulan(date('m')) . '/' . date('Y');
            }

            $params['sk_no'] = $no_trx;
            $params['employee_id'] = $this->input->post('employee_id');
            $params['sk_type'] = $this->input->post('sk_type');
            $params['sk_memo'] = $this->input->post('sk_memo');
            $params['sk_memo_date'] = $this->input->post('sk_memo_date');
            $params['sk_store_id'] = $this->input->post('sk_store_id');
            $params['sk_position_id'] = $this->input->post('sk_position_id');

            $this->sk->insert($params);
            $this->session->set_flashdata('success', 'Data berhasil ditambahkan');
            redirect('sk');
        } else {
            
            $data['title'] = 'Tambah Surat Keputusan';
            $data['main'] = 'sk/add';
            $this->load->view('layout', $data);
        }
    }
}

/* End of file Sk.php */
