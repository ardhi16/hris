<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pay extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('pay/Pay_model', 'pay');
        $this->load->model('angsuran/Angsuran_model', 'angsuran');
        $this->doc_path = 'media';
    }

    public function index()
    {
        $params = [];
        $data['pay'] = $this->pay->get($params)->result();
        $data['title'] = 'Daftar Gaji';
        $data['main'] = 'pay/index';
        $this->load->view('layout', $data);
    }

    function add()
    {
        if ($_POST) {
            $data['employee_id'] = $this->input->post('employee_id');
            $data['pay_salary'] = $this->input->post('salary');
            $data['pay_statis'] = $this->input->post('statis');
            $data['pay_dinamis'] = $this->input->post('dinamis');
            $data['pay_struktural'] = $this->input->post('struktural');
            $data['pay_rumah'] = $this->input->post('rumah');
            $data['pay_kemahalan'] = $this->input->post('kemahalan');
            $data['pay_family'] = $this->input->post('family');
            $data['pay_kinerja'] = $this->input->post('kinerja');
            $data['pay_produktif'] = $this->input->post('produktif');
            $data['pay_teller'] = $this->input->post('tunj_teller');
            $data['pay_beban'] = $this->input->post('beban');
            $data['pay_masa_kerja'] = $this->input->post('masa_kerja');
            $data['pay_total_day'] = $this->input->post('pay_total_day');
            $data['pay_total_eat'] = str_replace(',', '', $this->input->post('pay_total_eat'));
            $data['pay_total_transport'] = str_replace(',', '', $this->input->post('pay_total_transport'));
            $data['pay_dplk'] = $this->input->post('dplk');
            $data['pay_tuj_bpjstk'] = str_replace(',', '', $this->input->post('tk'));
            $data['pay_tuj_bpjspn'] = str_replace(',', '', $this->input->post('pensiun'));
            $data['pay_tuj_bpjsks'] = str_replace(',', '', $this->input->post('kesehatan'));
            $data['pay_tuj_pph21'] = str_replace(',', '', $this->input->post('pph21'));
            $data['pay_tuj_subsidi'] = $this->input->post('pay_subsidi');
            $data['pay_overtime'] = $this->input->post('pay_overtime');
            $data['pay_insentive'] = $this->input->post('pay_insentive');
            $data['pay_med_mar'] = $this->input->post('pay_med_mar');
            $data['pay_gross'] = str_replace(',', '', $this->input->post('gross'));
            $data['pay_day_late'] = $this->input->post('telat');
            $data['pay_pot_late'] = str_replace(',', '', $this->input->post('pot_trans'));
            $data['pay_pokok'] = $this->input->post('pokok');
            $data['pay_wajib'] = $this->input->post('wajib');
            $data['pay_zis'] = $this->input->post('zis');
            $data['pay_takasi'] = $this->input->post('takasi');
            $data['pay_dll'] = $this->input->post('dll');
            $data['pay_pot_bpjstk'] = str_replace(',', '', $this->input->post('pot_tk'));
            $data['pay_pot_bpjspn'] = str_replace(',', '', $this->input->post('pot_pensiun'));
            $data['pay_pot_bpjsks'] = str_replace(',', '', $this->input->post('pot_kesehatan'));
            $data['pay_thp'] = str_replace(',', '', $this->input->post('thp'));
            $data['pay_bprs'] = str_replace(',', '', $this->input->post('bprs'));
            $data['pay_bsm'] = str_replace(',', '', $this->input->post('bsm'));
            $data['pay_total_cicilan'] = $this->input->post('total_cicilan');
            $data['pay_period_month'] = date('m');
            $data['pay_period_year'] = date('Y');

            $cek = $this->pay->get_check(['employee_id' => $data['employee_id'], 'pay_period_month' => $data['pay_period_month'], 'pay_period_year' => $data['pay_period_year']])->row();
            
            if (!isset($cek)) {
                $id_pay = $this->pay->insert($data);
                $cicilan = $this->input->post('bayar');
                $current = $this->input->post('current');
                $length = $this->input->post('length');
                $amount = $this->input->post('amount');
                if (isset($cicilan)) {
                    for ($i = 0; $i < count($cicilan); $i++) {
                        $this->pay->insert_detail([
                            'pay_id' => $id_pay,
                            'angsuran_id' => $cicilan[$i],
                            'angsuran_ke' => $current[$i],
                            'angsuran_length' => $length[$i],
                            'angsuran_amount' => $amount[$i]
                        ]);
                        $this->angsuran->update_current($cicilan[$i], 1, '+');
                        $cek = $this->angsuran->get(['angsuran_id' => $cicilan[$i]])->row();
                        if ($cek->angsuran_current == $cek->angsuran_length) {
                            $this->angsuran->update(['angsuran_status' => 1], ['angsuran_id' => $cicilan[$i]]);
                        }
                    }
                }
                $this->session->set_flashdata('success', 'Berhasil Disimpan');
                redirect('pay');
            } else {
                $this->session->set_flashdata('failed', 'Data sudah dibuat');
                redirect('pay');
            }
        } else {
            $data['employee'] = $this->pay->get_employee()->result();
            $data['title'] = 'Tambah Gaji';
            $data['main'] = 'pay/add';
            $this->load->view('layout', $data);
        }
    }

    function edit($id = null)
    {
        if($_POST) {
            $data['pay_salary'] = $this->input->post('salary');
            $data['pay_statis'] = $this->input->post('statis');
            $data['pay_dinamis'] = $this->input->post('dinamis');
            $data['pay_struktural'] = $this->input->post('struktural');
            $data['pay_rumah'] = $this->input->post('rumah');
            $data['pay_kemahalan'] = $this->input->post('kemahalan');
            $data['pay_family'] = $this->input->post('family');
            $data['pay_kinerja'] = $this->input->post('kinerja');
            $data['pay_produktif'] = $this->input->post('produktif');
            $data['pay_teller'] = $this->input->post('tunj_teller');
            $data['pay_beban'] = $this->input->post('beban');
            $data['pay_masa_kerja'] = $this->input->post('masa_kerja');
            $data['pay_total_day'] = $this->input->post('pay_total_day');
            $data['pay_total_eat'] = str_replace(',', '', $this->input->post('pay_total_eat'));
            $data['pay_total_transport'] = str_replace(',', '', $this->input->post('pay_total_transport'));
            $data['pay_dplk'] = $this->input->post('dplk');
            $data['pay_tuj_bpjstk'] = str_replace(',', '', $this->input->post('tk'));
            $data['pay_tuj_bpjspn'] = str_replace(',', '', $this->input->post('pensiun'));
            $data['pay_tuj_bpjsks'] = str_replace(',', '', $this->input->post('kesehatan'));
            $data['pay_tuj_pph21'] = str_replace(',', '', $this->input->post('pph21'));
            $data['pay_tuj_subsidi'] = $this->input->post('pay_subsidi');
            $data['pay_overtime'] = $this->input->post('pay_overtime');
            $data['pay_insentive'] = $this->input->post('pay_insentive');
            $data['pay_med_mar'] = $this->input->post('pay_med_mar');
            $data['pay_gross'] = str_replace(',', '', $this->input->post('gross'));
            $data['pay_day_late'] = $this->input->post('telat');
            $data['pay_pot_late'] = str_replace(',', '', $this->input->post('pot_trans'));
            $data['pay_pokok'] = $this->input->post('pokok');
            $data['pay_wajib'] = $this->input->post('wajib');
            $data['pay_zis'] = $this->input->post('zis');
            $data['pay_takasi'] = $this->input->post('takasi');
            $data['pay_dll'] = $this->input->post('dll');
            $data['pay_pot_bpjstk'] = str_replace(',', '', $this->input->post('pot_tk'));
            $data['pay_pot_bpjspn'] = str_replace(',', '', $this->input->post('pot_pensiun'));
            $data['pay_pot_bpjsks'] = str_replace(',', '', $this->input->post('pot_kesehatan'));
            $data['pay_thp'] = str_replace(',', '', $this->input->post('thp'));
            $data['pay_bprs'] = str_replace(',', '', $this->input->post('bprs'));
            $data['pay_bsm'] = str_replace(',', '', $this->input->post('bsm'));
            $this->pay->update($data, ['pay_id' => $id]);
            $this->session->set_flashdata('success', 'Berhasil Diubah');
            redirect('pay');
        } else {
            $data['pay'] = $this->pay->get(['pay_id' => $id])->row();
            $data['title'] = 'Edit Gaji';
            $data['main'] = 'pay/add';
            $this->load->view('layout', $data);
        }
    }

    function preview($id = null)
    {
        $data['pay'] = $this->pay->get(['pay_id' => $id])->row();
        $data['angs'] = $this->angsuran->get_type()->result();
        $data['detail'] = $this->pay->get_detail(['pay_id' => $id])->result();
        
        if (isset($data['pay'])) {
            $mpdf = new \Mpdf\Mpdf(['format' => array(210, 130)]);
            $fileName = 'pay_' . date('Ymdhis');
            $html = $this->load->view('pay/print_pdf', $data, TRUE);
            $mpdf->WriteHTML(utf8_encode($html));
            $mpdf->Output($fileName . ".pdf", 'I'); // I for stream F for save
        } else {
            redirect('pay');
        }
    }

    function send($id = null)
    {
        $this->load->config('email');
        $this->load->library('email');
        
        $data['pay'] = $this->pay->get(['pay_id' => $id])->row();
        $data['angs'] = $this->angsuran->get_type()->result();
        $data['detail'] = $this->pay->get_detail(['pay_id' => $id])->result();

        if (isset($data['pay'])) {
            $mpdf = new \Mpdf\Mpdf(['format' => array(210, 130)]);
            $fileName = 'pay_' . date('Ymdhis');
            $html = $this->load->view('pay/print_pdf', $data, TRUE);
            $mpdf->WriteHTML(utf8_encode($html));
            $mpdf->Output('media/' . $fileName . ".pdf", 'F'); // I for stream F for save

            $dest = $this->doc_path . "/" . $fileName . ".pdf";
            if ($this->config->item('email')) {
                ob_start();
                $this->email->from($this->config->item('from'), $this->config->item('from_name'));
                $this->email->to($data['pay']->employee_email);
                $this->email->subject('Payslip_'.date('F Y'));
                $this->email->message($this->load->view('pay/email', $data['pay'], true));
                if (file_exists($dest)) $this->email->attach($dest);
                if ($this->email->send()) {
                    $result = 'Email Terkirim';
                } else {
                    $result = 'Error in sending email';
                }
                ob_end_clean();
            }
            unlink('media/' . $fileName . ".pdf");
            $this->pay->update(['pay_send' => 1], ['pay_id' => $id]);
            $this->session->set_flashdata('success', $result);
            redirect('pay');
        } else {
            redirect('pay');
        }
    }
}

/* End of file Pay.php */
