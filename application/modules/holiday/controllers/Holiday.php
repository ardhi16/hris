<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Holiday extends MY_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('holiday/Holiday_model', 'holiday');
    }
    
    public function index()
    {
        if($_POST) {
            list($tahun, $bulan, $tanggal) = explode('-', $this->input->post('date', TRUE));

            $params['year'] = $tahun;
            $params['date'] = $this->input->post('date');
            $params['info'] = $this->input->post('info');

            $this->holiday->insert($params);

            $this->session->set_flashdata('success', 'Tambah hari libur berhasil');
            redirect('holiday');
        } elseif($this->input->post('delete')) {


        } else {

            $data['title'] = 'Hari Libur Nasional';
            $data['main'] = 'holiday/index';
            $this->load->view('layout', $data); 
        }
        
    }

    public function get()
    {
        $data = [];
        $events = $this->holiday->get()->result_array();
        foreach ($events as $i => $row) {
            $data[$i] = array(
                'id' => $row['id'],
                'title' => strip_tags($row['info']),
                'start' => $row['date'],
                'end' => $row['date'],
                'year' => $row['year']
            );
        }
        echo json_encode($data, TRUE);
    }

    public function delete($id = NULL)
    {
        $this->holiday->delete($id);
        $this->session->set_flashdata('success', 'Hapus hari libur berhasil');
        redirect('holiday');
    }



}

/* End of file Holiday.php */
