<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Report extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('report/Report_model');
    }

    public function index()
    { 

    }

    function employee()
    {
        if($_POST) {
            $params = array();
            $params['employee_active'] = 1;
            $employees = $this->Report_model->get_employee($params)->result();            
            $spreadsheet = new Spreadsheet();
            $sheet = $spreadsheet->getActiveSheet();
            $cell     = 6;
            $no       = 1;

            $sheet->setCellValue('A1', 'Laporan Data Karyawan Aktif');
            $sheet->setCellValue('A2', 'Bank Syariah Patriot');
            $sheet->setCellValue('A3', 'Tanggal Unduh: ' . pretty_date(date('Y-m-d h:i:s'), 'd F Y, h:i', false));
            $sheet->setCellValue('C3', 'Pengunduh: ' . $this->fullname);


            $sheet->setCellValue('A5', 'NO');
            $sheet->setCellValue('B5', 'NIK');
            $sheet->setCellValue('C5', 'NAMA');
            $sheet->setCellValue('D5', 'JENIS KELAMIN');
            $sheet->setCellValue('E5', 'TEMPAT LAHIR');
            $sheet->setCellValue('F5', 'TANGGAL LAHIR');
            $sheet->setCellValue('G5', 'NO. KTP');
            $sheet->setCellValue('H5', 'ALAMAT SEKARANG');
            $sheet->setCellValue('I5', 'KECAMATAN');
            $sheet->setCellValue('J5', 'KOTA/KAB');
            $sheet->setCellValue('K5', 'KODE POS');
            $sheet->setCellValue('L5', 'ALAMAT KTP');
            $sheet->setCellValue('M5', 'KECAMATAN');
            $sheet->setCellValue('N5', 'KOTA/KAB');
            $sheet->setCellValue('O5', 'KODE POS');
            $sheet->setCellValue('P5', 'NO TELEPON');
            $sheet->setCellValue('Q5', 'EMAIL');
            $sheet->setCellValue('R5', 'NAMA IBU KANDUNG');
            $sheet->setCellValue('S5', 'STATUS PERNIKAHAN');
            $sheet->setCellValue('T5', 'KODE KAS');
            $sheet->setCellValue('U5', 'NAMA KAS');
            $sheet->setCellValue('V5', 'KODE JABATAN');
            $sheet->setCellValue('W5', 'NAMA JABATAN');
            $sheet->setCellValue('X5', 'GRADE');
            $sheet->setCellValue('Y5', 'KODE DIVISI');
            $sheet->setCellValue('Z5', 'NAMA DIVISI');

            foreach ($employees as $row) {
                $sheet->setCellValue('A' . $cell, $no);
                $sheet->setCellValueExplicit('B' . $cell, $row->employee_nik, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
                $sheet->setCellValue('C' . $cell, $row->employee_name);
                $sheet->setCellValue('D' . $cell, ($row->employee_gender == 'L') ? 'Laki-laki' : 'Perempuan');
                $sheet->setCellValue('E' . $cell, $row->employee_pob);
                $sheet->setCellValue('F' . $cell, $row->employee_bdate);
                $sheet->getStyle('F' . $cell)->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_DATE_YYYYMMDDSLASH);
                $sheet->setCellValueExplicit('G' . $cell, $row->employee_ktp, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
                $sheet->setCellValue('H' . $cell, $row->employee_current_address);
                $sheet->setCellValue('I' . $cell, $row->employee_current_district);
                $sheet->setCellValue('J' . $cell, $row->employee_current_village);
                $sheet->setCellValue('K' . $cell, $row->employee_current_postcode);
                $sheet->setCellValue('L' . $cell, $row->employee_id_address);
                $sheet->setCellValue('M' . $cell, $row->employee_id_district);
                $sheet->setCellValue('N' . $cell, $row->employee_id_village);
                $sheet->setCellValue('O' . $cell, $row->employee_id_postcode);
                $sheet->setCellValueExplicit('P' . $cell, $row->employee_phone, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
                $sheet->setCellValue('Q' . $cell, $row->employee_email);
                $sheet->setCellValue('R' . $cell, $row->employee_mother);
                $sheet->setCellValue('S' . $cell, $row->employee_married);
                $sheet->setCellValue('T' . $cell, $row->store_code);
                $sheet->setCellValue('U' . $cell, $row->store_name);
                $sheet->setCellValue('V' . $cell, $row->position_code);
                $sheet->setCellValue('W' . $cell, $row->position_name);
                $sheet->setCellValueExplicit('X' . $cell, $row->grade_name, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
                $sheet->setCellValue('Y' . $cell, $row->division_code);
                $sheet->setCellValue('Z' . $cell, $row->division_name);
               
                $cell++;
                $no++;
            }

            $spreadsheet->getActiveSheet()->getColumnDimension('A')->setWidth(5);
            $spreadsheet->getActiveSheet()->getColumnDimension('B')->setWidth(10);
            $spreadsheet->getActiveSheet()->getColumnDimension('C')->setWidth(30);

            foreach (range('D', 'Z') as $alphabet) {
                $spreadsheet->getActiveSheet()->getColumnDimension($alphabet)->setWidth(20);
            }

            $font = array('font' => array('bold' => true, 'color' => array(
                'rgb'  => 'FFFFFF'
            )));
            $spreadsheet->getActiveSheet()
                ->getStyle('A5:Z5')
                ->applyFromArray($font);

            $spreadsheet->getActiveSheet()
                ->getStyle('A5:Z5')
                ->getFill()
                ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                ->getStartColor()
                ->setARGB('000');
            $spreadsheet->getActiveSheet()->getStyle('A1')->getFont()->setBold(true);

            $writer = new Xlsx($spreadsheet);

            $filename = 'Laporan_' . date('Ymdhis');
            header('Content-Type: application/vnd.ms-excel');
            header('Content-Disposition: attachment;filename="' . $filename . '.xlsx"');
            header('Cache-Control: max-age=0');
            $writer->save('php://output');
            
        } else {
            $data['title'] = 'Laporan Data Karyawan';
            $data['main'] = 'report/employee';
            $this->load->view('layout', $data);
        }
    }

    function sk()
    {
        if($_POST) {

            $ds = $this->input->post('ds');
            $de = $this->input->post('de');

            $params = [];
            $params['DATE(sk_created_at) >='] = $ds;
            $params['DATE(sk_created_at) <='] = $de;
            $data = $this->Report_model->get_sk($params)->result();

            $arr = [];
            foreach ($data as $key) {
                $store = $this->Report_model->get_store(['store_id' => $key->sk_store_id])->row();
                $pos = $this->Report_model->get_pos(['position_id' => $key->sk_position_id])->row();

                $arr[] = $key;
                $key->sk_store_name = $store->store_name;
                $key->sk_position_name = $pos->position_name;
                $key->sk_grade_name = $pos->grade_name;

            }

            $spreadsheet = new Spreadsheet();
            $sheet = $spreadsheet->getActiveSheet();
            $cell     = 6;
            $no       = 1;

            $sheet->setCellValue('A1', 'Laporan Data Surat Keputusan');
            $sheet->setCellValue('A2', 'Bank Syariah Patriot');
            $sheet->setCellValue('A3', 'Tanggal Unduh: ' . pretty_date(date('Y-m-d h:i:s'), 'd F Y, h:i', false));
            $sheet->setCellValue('C3', 'Pengunduh: ' . $this->fullname);


            $sheet->setCellValue('A5', 'NO');
            $sheet->setCellValue('B5', 'NIK');
            $sheet->setCellValue('C5', 'NAMA');
            $sheet->setCellValue('D5', 'NO SURAT KEPUTUSAN');
            $sheet->setCellValue('E5', 'JENIS SK');
            $sheet->setCellValue('F5', 'KAS LAMA');
            $sheet->setCellValue('G5', 'JABATAN LAMA');
            $sheet->setCellValue('H5', 'GRADE LAMA');
            $sheet->setCellValue('I5', 'KAS BARU');
            $sheet->setCellValue('J5', 'JABATAN BARU');
            $sheet->setCellValue('K5', 'GRADE BARU');
            $sheet->setCellValue('L5', 'TANGGAL EFEKTIF');
            $sheet->setCellValue('M5', 'TANGGAL BUAT');
            

            foreach ($arr as $row) {
                $sheet->setCellValue('A' . $cell, $no);
                $sheet->setCellValueExplicit('B' . $cell, $row->employee_nik, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
                $sheet->setCellValue('C' . $cell, $row->employee_name);
                $sheet->setCellValue('D' . $cell, $row->sk_no);
                $sheet->setCellValue('E' . $cell, $row->sk_type);
                $sheet->setCellValue('F' . $cell, $row->store_name);
                $sheet->setCellValue('G' . $cell, $row->position_name);
                $sheet->setCellValue('H' . $cell, $row->grade_name);
                $sheet->setCellValue('I' . $cell, $row->sk_store_name);
                $sheet->setCellValue('J' . $cell, $row->sk_position_name);
                $sheet->setCellValue('K' . $cell, $row->sk_grade_name);
                $sheet->setCellValue('L' . $cell, $row->sk_efective_date);
                $sheet->getStyle('L' . $cell)->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_DATE_YYYYMMDDSLASH);
                $sheet->setCellValue('M' . $cell, $row->sk_created_at);

                $cell++;
                $no++;
            }

            $spreadsheet->getActiveSheet()->getColumnDimension('A')->setWidth(5);
            $spreadsheet->getActiveSheet()->getColumnDimension('B')->setWidth(10);
            $spreadsheet->getActiveSheet()->getColumnDimension('C')->setWidth(30);

            foreach (range('D', 'Z') as $alphabet) {
                $spreadsheet->getActiveSheet()->getColumnDimension($alphabet)->setWidth(20);
            }

            $font = array('font' => array('bold' => true, 'color' => array(
                'rgb'  => 'FFFFFF'
            )));
            $spreadsheet->getActiveSheet()
                ->getStyle('A5:M5')
                ->applyFromArray($font);

            $spreadsheet->getActiveSheet()
                ->getStyle('A5:M5')
                ->getFill()
                ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                ->getStartColor()
                ->setARGB('000');
            $spreadsheet->getActiveSheet()->getStyle('A1')->getFont()->setBold(true);

            $writer = new Xlsx($spreadsheet);

            $filename = 'Laporan_SK_' . date('Ymdhis');
            header('Content-Type: application/vnd.ms-excel');
            header('Content-Disposition: attachment;filename="' . $filename . '.xlsx"');
            header('Cache-Control: max-age=0');
            $writer->save('php://output');

        } else {
            $data['title'] = 'Laporan Surat Keputusan';
            $data['main'] = 'report/sk';
            $this->load->view('layout', $data);
        }
    }

    function sp()
    {
        if($_POST) {

            $ds = $this->input->post('ds');
            $de = $this->input->post('de');

            $params = [];
            $params['DATE(sp_created_at) >='] = $ds;
            $params['DATE(sp_created_at) <='] = $de;
            $data = $this->Report_model->get_sp($params)->result();

            $spreadsheet = new Spreadsheet();
            $sheet = $spreadsheet->getActiveSheet();
            $cell     = 6;
            $no       = 1;

            $sheet->setCellValue('A1', 'Laporan Data Surat Peringatan');
            $sheet->setCellValue('A2', 'Bank Syariah Patriot');
            $sheet->setCellValue('A3', 'Tanggal Unduh: ' . pretty_date(date('Y-m-d h:i:s'), 'd F Y, h:i', false));
            $sheet->setCellValue('C3', 'Pengunduh: ' . $this->fullname);


            $sheet->setCellValue('A5', 'NO');
            $sheet->setCellValue('B5', 'NIK');
            $sheet->setCellValue('C5', 'NAMA');
            $sheet->setCellValue('D5', 'JABATAN');
            $sheet->setCellValue('E5', 'GRADE');
            $sheet->setCellValue('F5', 'KAS');
            $sheet->setCellValue('G5', 'NO SURAT PERINGATAN');
            $sheet->setCellValue('H5', 'JENIS SP');
            $sheet->setCellValue('I5', 'TANGGAL MULAI');
            $sheet->setCellValue('J5', 'TANGGAL AKHIR');
            $sheet->setCellValue('K5', 'DESKRIPSI');
            $sheet->setCellValue('L5', 'TANGGAL BUAT');


            foreach ($data as $row) {
                $sheet->setCellValue('A' . $cell, $no);
                $sheet->setCellValueExplicit('B' . $cell, $row->employee_nik, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
                $sheet->setCellValue('C' . $cell, $row->employee_name);
                $sheet->setCellValue('D' . $cell, $row->position_name);
                $sheet->setCellValue('E' . $cell, $row->grade_name);
                $sheet->setCellValue('F' . $cell, $row->store_name);
                $sheet->setCellValue('G' . $cell, $row->sp_no);
                $sheet->setCellValue('H' . $cell, 'SP '. $row->sp_type);
                $sheet->setCellValue('I' . $cell, $row->sp_date_start);
                $sheet->getStyle('I' . $cell)->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_DATE_YYYYMMDDSLASH);
                $sheet->setCellValue('J' . $cell, $row->sp_date_end);
                $sheet->getStyle('J' . $cell)->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_DATE_YYYYMMDDSLASH);
                $sheet->setCellValue('K' . $cell, $row->sp_desc);
                $sheet->setCellValue('L' . $cell, $row->sp_created_at);

                $cell++;
                $no++;
            }

            $spreadsheet->getActiveSheet()->getColumnDimension('A')->setWidth(5);
            $spreadsheet->getActiveSheet()->getColumnDimension('B')->setWidth(10);
            $spreadsheet->getActiveSheet()->getColumnDimension('C')->setWidth(30);

            foreach (range('D', 'Z') as $alphabet) {
                $spreadsheet->getActiveSheet()->getColumnDimension($alphabet)->setWidth(20);
            }

            $font = array('font' => array('bold' => true, 'color' => array(
                'rgb'  => 'FFFFFF'
            )));
            $spreadsheet->getActiveSheet()
                ->getStyle('A5:L5')
                ->applyFromArray($font);

            $spreadsheet->getActiveSheet()
                ->getStyle('A5:L5')
                ->getFill()
                ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                ->getStartColor()
                ->setARGB('000');
            $spreadsheet->getActiveSheet()->getStyle('A1')->getFont()->setBold(true);

            $writer = new Xlsx($spreadsheet);

            $filename = 'Laporan_SP_' . date('Ymdhis');
            header('Content-Type: application/vnd.ms-excel');
            header('Content-Disposition: attachment;filename="' . $filename . '.xlsx"');
            header('Cache-Control: max-age=0');
            $writer->save('php://output');

        } else {
            $data['title'] = 'Laporan Surat Peringatan';
            $data['main'] = 'report/sp';
            $this->load->view('layout', $data);
        }
    }

    function kkout()
    {
        if ($_POST) {

            $ds = $this->input->post('ds');
            $de = $this->input->post('de');

            $params = [];
            $params['DATE(kkout_created_at) >='] = $ds;
            $params['DATE(kkout_created_at) <='] = $de;
            $data = $this->Report_model->get_kkout($params)->result();

            $spreadsheet = new Spreadsheet();
            $sheet = $spreadsheet->getActiveSheet();
            $cell     = 6;
            $no       = 1;

            $sheet->setCellValue('A1', 'Laporan Data Karyawan Keluar');
            $sheet->setCellValue('A2', 'Bank Syariah Patriot');
            $sheet->setCellValue('A3', 'Tanggal Unduh: ' . pretty_date(date('Y-m-d h:i:s'), 'd F Y, h:i', false));
            $sheet->setCellValue('C3', 'Pengunduh: ' . $this->fullname);


            $sheet->setCellValue('A5', 'NO');
            $sheet->setCellValue('B5', 'NIK');
            $sheet->setCellValue('C5', 'NAMA');
            $sheet->setCellValue('D5', 'JABATAN');
            $sheet->setCellValue('E5', 'GRADE');
            $sheet->setCellValue('F5', 'KAS');
            $sheet->setCellValue('G5', 'NO SURAT KETERANGAN');
            $sheet->setCellValue('H5', 'JENIS OUT');
            $sheet->setCellValue('I5', 'TANGGAL EFEKTIF');
            $sheet->setCellValue('J5', 'TANGGAL BUAT');


            foreach ($data as $row) {
                $sheet->setCellValue('A' . $cell, $no);
                $sheet->setCellValueExplicit('B' . $cell, $row->employee_nik, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
                $sheet->setCellValue('C' . $cell, $row->employee_name);
                $sheet->setCellValue('D' . $cell, $row->position_name);
                $sheet->setCellValue('E' . $cell, $row->grade_name);
                $sheet->setCellValue('F' . $cell, $row->store_name);
                $sheet->setCellValue('G' . $cell, $row->kkout_no);
                $sheet->setCellValue('H' . $cell, ($row->kkout_type == 0) ? 'HABIS KONTRAK' : (($row->kkout_type == 1) ? 'BAIK' : 'MENINGGAL DUNIA'));
                $sheet->setCellValue('I' . $cell, $row->kkout_date);
                $sheet->getStyle('I' . $cell)->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_DATE_YYYYMMDDSLASH);
                $sheet->setCellValue('J' . $cell, $row->kkout_created_at);

                $cell++;
                $no++;
            }

            $spreadsheet->getActiveSheet()->getColumnDimension('A')->setWidth(5);
            $spreadsheet->getActiveSheet()->getColumnDimension('B')->setWidth(10);
            $spreadsheet->getActiveSheet()->getColumnDimension('C')->setWidth(30);

            foreach (range('D', 'Z') as $alphabet) {
                $spreadsheet->getActiveSheet()->getColumnDimension($alphabet)->setWidth(20);
            }

            $font = array('font' => array('bold' => true, 'color' => array(
                'rgb'  => 'FFFFFF'
            )));
            $spreadsheet->getActiveSheet()
                ->getStyle('A5:J5')
                ->applyFromArray($font);

            $spreadsheet->getActiveSheet()
                ->getStyle('A5:J5')
                ->getFill()
                ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                ->getStartColor()
                ->setARGB('000');
            $spreadsheet->getActiveSheet()->getStyle('A1')->getFont()->setBold(true);

            $writer = new Xlsx($spreadsheet);

            $filename = 'Laporan_KKOUT_' . date('Ymdhis');
            header('Content-Type: application/vnd.ms-excel');
            header('Content-Disposition: attachment;filename="' . $filename . '.xlsx"');
            header('Cache-Control: max-age=0');
            $writer->save('php://output');
        } else {
            $data['title'] = 'Laporan Karyawan Keluar';
            $data['main'] = 'report/kkout';
            $this->load->view('layout', $data);
        }
    }

    function cuti()
    {
        if ($_POST) {

            $ds = $this->input->post('ds');
            $de = $this->input->post('de');

            $params = [];
            $params['DATE(cuti_created_at) >='] = $ds;
            $params['DATE(cuti_created_at) <='] = $de;
            $data = $this->Report_model->get_cuti($params)->result();

            $spreadsheet = new Spreadsheet();
            $sheet = $spreadsheet->getActiveSheet();
            $cell     = 6;
            $no       = 1;

            $sheet->setCellValue('A1', 'Laporan Data Cuti Karyawan');
            $sheet->setCellValue('A2', 'Bank Syariah Patriot');
            $sheet->setCellValue('A3', 'Tanggal Unduh: ' . pretty_date(date('Y-m-d h:i:s'), 'd F Y, h:i', false));
            $sheet->setCellValue('C3', 'Pengunduh: ' . $this->fullname);

            $sheet->setCellValue('A5', 'NO');
            $sheet->setCellValue('B5', 'NIK');
            $sheet->setCellValue('C5', 'NAMA');
            $sheet->setCellValue('D5', 'JABATAN');
            $sheet->setCellValue('E5', 'GRADE');
            $sheet->setCellValue('F5', 'KAS');
            $sheet->setCellValue('G5', 'TANGGAL MULAI');
            $sheet->setCellValue('H5', 'TANGGAL AKHIR');
            $sheet->setCellValue('I5', 'JUMLAH CUTI');
            $sheet->setCellValue('J5', 'TAHUN CUTI');
            $sheet->setCellValue('K5', 'DESKRIPSI');
            $sheet->setCellValue('L5', 'TANGGAL BUAT');


            foreach ($data as $row) {
                $sheet->setCellValue('A' . $cell, $no);
                $sheet->setCellValueExplicit('B' . $cell, $row->employee_nik, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
                $sheet->setCellValue('C' . $cell, $row->employee_name);
                $sheet->setCellValue('D' . $cell, $row->position_name);
                $sheet->setCellValue('E' . $cell, $row->grade_name);
                $sheet->setCellValue('F' . $cell, $row->store_name);
                $sheet->setCellValue('G' . $cell, $row->cuti_start);
                $sheet->getStyle('G' . $cell)->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_DATE_YYYYMMDDSLASH);
                $sheet->setCellValue('H' . $cell, $row->cuti_end);
                $sheet->getStyle('H' . $cell)->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_DATE_YYYYMMDDSLASH);
                $sheet->setCellValue('I' . $cell, $row->cuti_total);
                $sheet->setCellValue('J' . $cell, $row->cuti_year);
                $sheet->setCellValue('K' . $cell, $row->cuti_desc);
                $sheet->setCellValue('L' . $cell, $row->cuti_created_at);

                $cell++;
                $no++;
            }

            $spreadsheet->getActiveSheet()->getColumnDimension('A')->setWidth(5);
            $spreadsheet->getActiveSheet()->getColumnDimension('B')->setWidth(10);
            $spreadsheet->getActiveSheet()->getColumnDimension('C')->setWidth(30);

            foreach (range('D', 'Z') as $alphabet) {
                $spreadsheet->getActiveSheet()->getColumnDimension($alphabet)->setWidth(20);
            }

            $font = array('font' => array('bold' => true, 'color' => array(
                'rgb'  => 'FFFFFF'
            )));
            $spreadsheet->getActiveSheet()
                ->getStyle('A5:L5')
                ->applyFromArray($font);

            $spreadsheet->getActiveSheet()
                ->getStyle('A5:L5')
                ->getFill()
                ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                ->getStartColor()
                ->setARGB('000');
            $spreadsheet->getActiveSheet()->getStyle('A1')->getFont()->setBold(true);

            $writer = new Xlsx($spreadsheet);

            $filename = 'Laporan_Cuti_' . date('Ymdhis');
            header('Content-Type: application/vnd.ms-excel');
            header('Content-Disposition: attachment;filename="' . $filename . '.xlsx"');
            header('Cache-Control: max-age=0');
            $writer->save('php://output');
        } else {
            $data['title'] = 'Laporan Cuti Karyawan';
            $data['main'] = 'report/cuti';
            $this->load->view('layout', $data);
        }
    }

    function contract()
    {
        if($_POST) {

            $month = $this->input->post('month');
            $year = $this->input->post('year');
            $select = "$year-$month";
            
            $params = [];
            $params['employee_status'] = 'KONTRAK';
            $res = $this->Report_model->get_contract($params)->result();

            $arr = [];
            foreach ($res as $key) {
                $contract = $this->Report_model->get_con(['employee_id' => $key->employee_id])->row();

                if(isset($contract)) {
                    $due = $key->employee_join_date;
                    $due = date('Y-m-d', strtotime($due));
                    $key->end_contract = date('Y-m-d', strtotime('+' . $contract->contract_length . ' month', strtotime($due)));

                    if (date('Y-m', strtotime($key->end_contract)) == $select) {
                        array_push($arr, [
                            'employee_nik' => $key->employee_nik,
                            'employee_name' => $key->employee_name,
                            'division_name' => $key->division_name,
                            'store_name' => $key->store_name,
                            'position_name' => $key->position_name,
                            'employee_status' => $key->employee_status,
                            'employee_join_date' => $key->employee_join_date,
                            'contract_length' => $contract->contract_length,
                            'end_contract' => $key->end_contract
                        ]);
                    }
                } 
            }
            

            $spreadsheet = new Spreadsheet();
            $sheet = $spreadsheet->getActiveSheet();
            $cell     = 6;
            $no       = 1;

            $sheet->setCellValue('A1', 'Reminder Kontrak Karyawan');
            $sheet->setCellValue('A2', 'Bank Syariah Patriot');
            $sheet->setCellValue('A3', 'Periode: ' . pretty_date("$select-01", 'F Y', false));

            $sheet->setCellValue('A5', 'NO');
            $sheet->setCellValue('B5', 'NIK');
            $sheet->setCellValue('C5', 'NAMA');
            $sheet->setCellValue('D5', 'JABATAN');
            $sheet->setCellValue('E5', 'DIVISI');
            $sheet->setCellValue('F5', 'KAS');
            $sheet->setCellValue('G5', 'TANGGAL MASUK');
            $sheet->setCellValue('H5', 'TANGGAL HABIS');
            $sheet->setCellValue('I5', 'LAMA KONTRAK (BULAN)');

            
            foreach ($arr as $row) {
                $sheet->setCellValue('A' . $cell, $no);
                $sheet->setCellValueExplicit('B' . $cell, $row['employee_nik'], \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
                $sheet->setCellValue('C' . $cell, $row['employee_name']);
                $sheet->setCellValue('D' . $cell, $row['position_name']);
                $sheet->setCellValue('E' . $cell, $row['division_name']);
                $sheet->setCellValue('F' . $cell, $row['store_name']);
                $sheet->setCellValue('G' . $cell, $row['employee_join_date']);
                $sheet->getStyle('G' . $cell)->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_DATE_YYYYMMDDSLASH);
                $sheet->setCellValue('H' . $cell, $row['end_contract']);
                $sheet->getStyle('H' . $cell)->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_DATE_YYYYMMDDSLASH);
                $sheet->setCellValue('I' . $cell, $row['contract_length']);

                $cell++;
                $no++;
            }

            $spreadsheet->getActiveSheet()->getColumnDimension('A')->setWidth(5);
            $spreadsheet->getActiveSheet()->getColumnDimension('B')->setWidth(10);
            $spreadsheet->getActiveSheet()->getColumnDimension('C')->setWidth(30);

            foreach (range('D', 'Z') as $alphabet) {
                $spreadsheet->getActiveSheet()->getColumnDimension($alphabet)->setWidth(20);
            }

            $font = array('font' => array('bold' => true, 'color' => array(
                'rgb'  => 'FFFFFF'
            )));
            $spreadsheet->getActiveSheet()
                ->getStyle('A5:I5')
                ->applyFromArray($font);

            $spreadsheet->getActiveSheet()
                ->getStyle('A5:I5')
                ->getFill()
                ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                ->getStartColor()
                ->setARGB('000');
            $spreadsheet->getActiveSheet()->getStyle('A1')->getFont()->setBold(true);

            $writer = new Xlsx($spreadsheet);

            $filename = 'Laporan_Reminder_' . date('Ymdhis');
            header('Content-Type: application/vnd.ms-excel');
            header('Content-Disposition: attachment;filename="' . $filename . '.xlsx"');
            header('Cache-Control: max-age=0');
            $writer->save('php://output');    
        } else {
            
            $data['title'] = 'Reminder Kontrak Karyawan';
            $data['main'] = 'report/contract';
            $this->load->view('layout', $data);
        }
    }
}

/* End of file Report.php */
