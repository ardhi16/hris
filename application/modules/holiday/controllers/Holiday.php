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
            $id = $this->input->post('id');
            $params['date'] = $this->input->post('date');
            $params['year'] = date('Y', strtotime($params['date']));
            $params['info'] = $this->input->post('info');
            if(isset($id)) {
                $this->holiday->update($params, ['id' => $id]);
            } else {
                $this->holiday->insert($params);
            }

            $this->session->set_flashdata('success', 'Tambah hari libur berhasil');
            redirect('holiday');
        } else {
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
            $config['base_url'] = site_url('grade');
            $config['per_page'] = $limit;
            $config['total_rows'] = $this->holiday->get()->num_rows();
            $this->pagination->initialize($config);

            $data['jlhpage'] = $page;
            $data['holiday'] = $this->holiday->get(null, $limit, $offset)->result();
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
