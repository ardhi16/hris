<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sp extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('sp/Sp_model', 'sp');
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
        $config['base_url'] = site_url('sp');
        $config['per_page'] = $limit;
        $config['total_rows'] = $this->sp->get()->num_rows();
        $this->pagination->initialize($config);

        $data['jlhpage'] = $page;
        $data['sp'] = $this->sp->get(null, $limit, $offset)->result();

        $data['title'] = 'Daftar Surat Peringatan';
        $data['main'] = 'sp/index';
        $this->load->view('layout', $data);
    }

    function add()
    {
        if ($_POST) {

            $lastno = $this->sp->get_last(null, 1)->row_array();

            if (pretty_date($lastno['sp_created_at'], 'Y', false) < date('Y') or count($lastno) == 0) {
                $nomor = sprintf('%03d', '001');
                $no_trx = $nomor . '/SP' . '/D-SDI' . '/' . konversiBulan(date('m')) . '/' . date('Y');
            } else {
                $no = substr($lastno['sp_no'], 0, 3);
                $nomor = sprintf('%03d', $no + 001);
                $no_trx = $nomor . '/SP' . '/D-SDI' . '/' . konversiBulan(date('m')) . '/' . date('Y');
            }

            $params['sp_no'] = $no_trx;
            $params['employee_id'] = $this->input->post('employee_id');
            $params['sp_type'] = $this->input->post('sp_type');
            $params['sp_desc'] = $this->input->post('sp_desc');
            $params['sp_date_start'] = $this->input->post('sp_date_start');
            $params['sp_date_end'] = date('Y-m-d', strtotime('+6 months', strtotime($params['sp_date_start'])));;
            
            $this->sp->insert($params);
            $this->session->set_flashdata('success', 'Data berhasil ditambahkan');
            redirect('sp');
        } else {
            $data['title'] = 'Tambah Surat Peringatan';
            $data['main'] = 'sp/add';
            $this->load->view('layout', $data);
        }
    }

    function checkSp()
    {
        $id = $this->input->post('employee_id');
        $cek = $this->sp->get(['sp.employee_id' =>$id, 'sp_type' => 1])->row();
        $cek_tgl = strtotime($cek->sp_date_end);
        $now = strtotime(date('Y-m-d'));
        if($cek_tgl >= $now) {
            echo json_encode(['status' => TRUE]);
        } else {
            echo json_encode(['status' => FALSE]);
        }
    }

    function print($id = null)
    {
        $data['sp'] = $this->sp->get(['sp_id' => $id])->row();

        if (isset($data['sp'])) {
            $mpdf = new \Mpdf\Mpdf(['format' => 'A4']);
            $fileName = 'SP_' . date('Ymdhis');
            $html = $this->load->view('sp/print_pdf', $data, TRUE);
            $mpdf->WriteHTML(utf8_encode($html));
            $mpdf->Output($fileName . ".pdf", 'I');
        } else {
            redirect('sp');
        }
    }
}

/* End of file Sp.php */
