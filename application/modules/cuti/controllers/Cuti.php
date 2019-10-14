<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Cuti extends MY_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('cuti/Cuti_model', 'cuti');
        $this->load->model('holiday/Holiday_model', 'holiday');
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
        $config['base_url'] = site_url('cuti');
        $config['per_page'] = $limit;
        $config['total_rows'] = $this->cuti->get()->num_rows();
        $this->pagination->initialize($config);

        $data['jlhpage'] = $page;
        $data['cuti'] = $this->cuti->get(null, $limit, $offset)->result();

        $data['title'] = 'Daftar Cuti';
        $data['main'] = 'cuti/index';
        $this->load->view('layout', $data);
    }

    function add()
    {
        $this->form_validation->set_rules('employee_id', 'Karyawan', 'trim|required|xss_clean');
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger"><button position="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>', '</div>');

        if ($_POST and $this->form_validation->run() == TRUE) {

            $params['employee_id'] = $this->input->post('employee_id');
            $params['cuti_start'] = $this->input->post('cuti_start');
            $params['cuti_end'] = $this->input->post('cuti_end');
            $params['cuti_desc'] = $this->input->post('cuti_desc');
            $params['cuti_year'] = date('Y');

            $satu_hari = 60 * 60 * 24;
            $tanggal_mulai = strtotime($this->input->post('cuti_start'));
            $tanggal_akhir = strtotime($this->input->post('cuti_end'));

            $hari_libur = $this->holiday->get()->result_array();

            $no = 0;
            for ($i = $tanggal_mulai; $i <= $tanggal_akhir; $i = $i + $satu_hari) {

                $arr_sabtu_minggu = array('Sat', 'Sun');

                $tanggal = date('D', $i);

                if (!in_array($tanggal, $arr_sabtu_minggu) && !in_array(date('Y-m-d', $i), $hari_libur)) {
                    $no++;
                }
            }

            $params['cuti_total'] = $no;

            $this->cuti->insert($params);
            $this->session->set_flashdata('success', 'Data berhasil ditambahkan');
            redirect('cuti');
        } else {
            $data['title'] = 'Tambah Cuti Karyawan';
            $data['main'] = 'cuti/add';
            $this->load->view('layout', $data);
        }
    }

}

/* End of file Cuti.php */
