<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kkout extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('kkout/Kkout_model', 'kkout');
        $this->load->model('store/Store_model', 'kas');
        $this->load->model('position/Position_model', 'position');
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
        $config['base_url'] = site_url('kkout');
        $config['per_page'] = $limit;
        $config['total_rows'] = $this->kkout->get()->num_rows();
        $this->pagination->initialize($config);

        $data['jlhpage'] = $page;
        $data['kkout'] = $this->kkout->get(null, $limit, $offset)->result();

        $data['title'] = 'Daftar KKOUT';
        $data['main'] = 'kkout/index';
        $this->load->view('layout', $data);
    }

    function add()
    {
        $this->form_validation->set_rules('employee_id', 'Karyawan', 'trim|required|xss_clean');
        $this->form_validation->set_rules('kkout_type', 'Jenis Out', 'trim|required|xss_clean');
        $this->form_validation->set_rules('kkout_date', 'Tanggal Keluar', 'trim|required|xss_clean');
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger"><button position="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>', '</div>');

        if ($_POST and $this->form_validation->run() == TRUE) {

            $lastno = $this->kkout->get_last(null, 1)->row_array();

            if (pretty_date($lastno['kkout_created_at'], 'Y', false) < date('Y') or count($lastno) == 0) {
                $nomor = sprintf('%03d', '001');
                $no_trx = $nomor . '/BPRS' . '/D-SDI' . '/' . konversiBulan(date('m')) . '/' . date('Y');
            } else {
                $no = substr($lastno['kkout_no'], 0, 3);
                $nomor = sprintf('%03d', $no + 001);
                $no_trx = $nomor . '/BPRS' . '/D-SDI' . '/' . konversiBulan(date('m')) . '/' . date('Y');
            }

            $params['kkout_no'] = $no_trx;
            $params['employee_id'] = $this->input->post('employee_id');
            $params['kkout_type'] = $this->input->post('kkout_type');
            $params['kkout_date'] = $this->input->post('kkout_date');
            $this->kkout->insert($params);
            $this->session->set_flashdata('success', 'Data berhasil ditambahkan');
            redirect('kkout');
        } else {
            $data['title'] = 'Tambah Surat Keterangan Kerja';
            $data['main'] = 'kkout/add';
            $this->load->view('layout', $data);
        }
    }

    function print($id = null)
    {
        $data['kkout'] = $this->kkout->get(['kkout_id' => $id])->row();
        if (isset($data['kkout'])) {
            $mpdf = new \Mpdf\Mpdf(['format' => 'A4']);
            $fileName = 'kkout_' . date('Ymdhis');
            $html = $this->load->view('kkout/print_pdf', $data, TRUE);
            $mpdf->WriteHTML(utf8_encode($html));
            $mpdf->Output($fileName . ".pdf", 'I');
        } else {
            redirect('kkout');
        }
    }
}

/* End of file Kkout.php */
