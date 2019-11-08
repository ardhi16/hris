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
    { }

    function employee()
    {
        if ($_POST) {
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
        if ($_POST) {

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
        if ($_POST) {

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
                $sheet->setCellValue('H' . $cell, 'SP ' . $row->sp_type);
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
        if ($_POST) {

            $month = $this->input->post('month');
            $year = $this->input->post('year');
            $select = "$year-$month";

            $params = [];
            $params['employee_status'] = 'KONTRAK';
            $res = $this->Report_model->get_contract($params)->result();

            $arr = [];
            foreach ($res as $key) {
                $contract = $this->Report_model->get_con(['employee_id' => $key->employee_id])->result();

                $total_contract = 0;
                foreach ($contract as $row) {
                    $total_contract += $row->contract_length;
                }

                if (count($contract) > 0) {
                    $due = $key->employee_join_date;
                    $due = date('Y-m-d', strtotime($due));
                    $key->end_contract = date('Y-m-d', strtotime('+' . $total_contract . ' month', strtotime($due)));

                    if (date('Y-m', strtotime($key->end_contract)) == $select) {
                        array_push($arr, [
                            'employee_nik' => $key->employee_nik,
                            'employee_name' => $key->employee_name,
                            'division_name' => $key->division_name,
                            'store_name' => $key->store_name,
                            'position_name' => $key->position_name,
                            'employee_status' => $key->employee_status,
                            'employee_join_date' => $key->employee_join_date,
                            'contract_length' => $contract[0]->contract_length,
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

    function pay()
    {
        if ($_POST) {

            $month = $this->input->post('month');
            $year = $this->input->post('year');

            $params = [];
            $params['pay_period_month'] = $month;
            $params['pay_period_year'] = $year;
            $res = $this->Report_model->get_pay($params)->result_array();

            $spreadsheet = new Spreadsheet();
            $styleArray = [
                'borders' => [
                    'outline' => [
                        'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                        'color' => ['argb' => '000'],
                    ],
                ],
            ];
            $sheet = $spreadsheet->getActiveSheet(0);
            $sheet->setTitle('Laporan BSM');
            $cell     = 6;
            $no       = 1;

            $sheet->setCellValue('A1', 'Laporan Gaji');
            $sheet->setCellValue('A2', 'Bank Syariah Patriot');
            $sheet->setCellValue('A3', 'Periode: ' . pretty_date("$year-$month-01", 'F Y', false));

            $sheet->setCellValue('A5', 'NO');
            $sheet->setCellValue('B5', 'NAMA');
            $sheet->setCellValue('C5', 'NO REKENING');
            $sheet->setCellValue('D5', 'GAJI');
            $sheet->setCellValue('E5', 'SUBSIDI GAJI');
            $sheet->setCellValue('F5', 'TOTAL');

            $adm = 1000;
            $total_adm = 0;
            $total_gaji = 0;
            $grand_total = 0;
            foreach ($res as $row) {
                $sheet->setCellValue('A' . $cell, $no);
                $sheet->setCellValueExplicit('B' . $cell, $row['employee_name'], \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
                $sheet->setCellValueExplicit('C' . $cell, $row['employee_acc_bank'], \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
                $sheet->setCellValueExplicit('D' . $cell, $row['pay_bsm'], \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_NUMERIC);
                $sheet->setCellValueExplicit('E' . $cell, $adm, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_NUMERIC);
                $sheet->setCellValueExplicit('F' . $cell, $row['pay_bsm'] + $adm, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_NUMERIC);
                $sheet->getStyle("A$cell:F$cell")->applyFromArray($styleArray);

                $total_adm += $adm;
                $total_gaji += $row['pay_bsm'];
                $grand_total += $row['pay_bsm'] + $adm;
                $cell++;
                $no++;
            }
            $sheet->mergeCells("A$cell:C$cell");
            $sheet->setCellValue('A' . $cell, 'JUMLAH');
            $sheet->setCellValueExplicit('D' . $cell, $total_gaji, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_NUMERIC);
            $sheet->setCellValueExplicit('E' . $cell, $total_adm, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_NUMERIC);
            $sheet->setCellValueExplicit('F' . $cell, $grand_total, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_NUMERIC);
            $sheet->getStyle("A$cell:F$cell")->applyFromArray($styleArray);

            $spreadsheet->getActiveSheet()->getColumnDimension('A')->setWidth(5);
            $spreadsheet->getActiveSheet()->getColumnDimension('B')->setWidth(30);
            $spreadsheet->getActiveSheet()->getColumnDimension('C')->setWidth(20);

            foreach (range('D', 'Z') as $alphabet) {
                $spreadsheet->getActiveSheet()->getColumnDimension($alphabet)->setWidth(20);
            }

            $font = array('font' => array('bold' => true, 'color' => array(
                'rgb'  => 'FFFFFF'
            )));

            $style = array(
                'font' => array('bold' => true)
            );

            $spreadsheet->getActiveSheet()->getStyle('A' . $cell . ':F' . $cell)->applyFromArray($style);
            $spreadsheet->getActiveSheet()->getStyle('A5:F5')->applyFromArray($font);

            $spreadsheet->getActiveSheet()
                ->getStyle('A5:F5')
                ->getFill()
                ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                ->getStartColor()
                ->setARGB('000');
            $spreadsheet->getActiveSheet()->getStyle('A1')->getFont()->setBold(true);

            $objWorkSheet = $spreadsheet->createSheet(1);
            $objWorkSheet->setTitle('Laporan Gross');
            $objWorkSheet->setCellValue('A1', 'Gross');
            $objWorkSheet->setCellValue('A2', 'Bank Syariah Patriot');
            $objWorkSheet->setCellValue('A3', 'Periode: ' . pretty_date("$year-$month-01", 'F Y', false));
            $i = 1;
            $header = ['No', 'Nama', 'Jabatan', 'Gaji Pokok', 'Tunj. Statis', 'Tunj. Dinamis', 'Tunj. Struktural', 'Tunj. Perumahan', 'Tunj. Kemahalan', 'Tunj. Keluarga', 'Tunj. Kinerja', 'Tunj. Produktifitas', 'Tunj. Selisih Teller', 'Tunj. Beban', 'Tunj Masa Kerja', 'DPLK', 'Jumlah Hari Masuk', 'Total Tunj. Makan', 'Total Tunj. Transport', 'Lembur', 'Insentif', 'Obat/Tunj. Nikah', 'BPJS TK', 'BPJS Pensiun', 'BPJS Kesehatan', 'Tunj. PPh 21', 'Subsidi Adm', 'Total Setelah Pajak'];

            $arr = [];
            foreach ($res as $key) {
                array_push($arr, [
                    $i++,
                    $key['employee_name'],
                    $key['position_name'],
                    $key['pay_salary'],
                    $key['pay_statis'],
                    $key['pay_dinamis'],
                    $key['pay_struktural'],
                    $key['pay_rumah'],
                    $key['pay_kemahalan'],
                    $key['pay_family'],
                    $key['pay_kinerja'],
                    $key['pay_produktif'],
                    $key['pay_teller'],
                    $key['pay_beban'],
                    $key['pay_masa_kerja'],
                    $key['pay_dplk'],
                    $key['pay_total_day'],
                    $key['pay_total_eat'],
                    $key['pay_total_transport'],
                    $key['pay_overtime'],
                    $key['pay_insentive'],
                    $key['pay_med_mar'],
                    $key['pay_tuj_bpjstk'],
                    $key['pay_tuj_bpjspn'],
                    $key['pay_tuj_bpjsks'],
                    $key['pay_tuj_pph21'],
                    $key['pay_tuj_subsidi'],
                    $key['pay_gross']
                ]);
            }

            $index = 0;
            $range = $this->getcolumnrange('A', 'AB');
            foreach ($range as $huruf) {
                $objWorkSheet->setCellValue($huruf . '5', $header[$index]);
                $objWorkSheet->getStyle($huruf . '5:' . $huruf . '5')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('000');
                $objWorkSheet->getStyle($huruf . '5:' . $huruf . '5')->applyFromArray($font);

                $objWorkSheet->getColumnDimension($huruf)->setWidth(20);

                $cells = 6;
                for ($x = 0; $x < count($arr); $x++) {
                    $objWorkSheet->setCellValue($huruf . $cells, $arr[$x][$index]);
                    $objWorkSheet->getStyle($huruf . $cells)->applyFromArray($styleArray);
                    $cells++;
                }
                $index++;
            }

            $objWorkSheet2 = $spreadsheet->createSheet(2);
            $objWorkSheet2->setTitle('Laporan Potongan');
            $objWorkSheet2->setCellValue('A1', 'Potongan');
            $objWorkSheet2->setCellValue('A2', 'Bank Syariah Patriot');
            $objWorkSheet2->setCellValue('A3', 'Periode: ' . pretty_date("$year-$month-01", 'F Y', false));
            $j = 1;
            $header2 = ['No', 'Nama', 'Jabatan', 'Jumlah Telat', 'Potongan Tunj. Transport', 'BPJS TK', ' BPJS Pensiun', 'BPJS Kesehatan', 'PPh 21', 'Adm BSM', 'Simpanan Pokok', 'Simpanan Wajib', 'ZIS', 'Tabungan Takasi', 'Lain-lain', 'Total Angsuran', 'THP', 'Masuk Rekening BPRS', 'Payroll BSM'];
            $arr2 = [];
            foreach ($res as $key) {
                array_push($arr2, [
                    $j++,
                    $key['employee_name'],
                    $key['position_name'],
                    $key['pay_day_late'],
                    $key['pay_pot_late'],
                    $key['pay_pot_bpjstk'],
                    $key['pay_pot_bpjspn'],
                    $key['pay_pot_bpjsks'],
                    $key['pay_tuj_pph21'],
                    $key['pay_tuj_subsidi'],
                    $key['pay_pokok'],
                    $key['pay_wajib'],
                    $key['pay_zis'],
                    $key['pay_takasi'],
                    $key['pay_dll'],
                    $key['pay_total_cicilan'],
                    $key['pay_thp'],
                    $key['pay_bprs'],
                    $key['pay_bsm']
                ]);
            }
            $index2 = 0;
            $range2 = $this->getcolumnrange('A', 'S');
            foreach ($range2 as $huruf) {
                $objWorkSheet2->setCellValue($huruf . '5', $header2[$index2]);
                $objWorkSheet2->getStyle($huruf . '5:' . $huruf . '5')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('000');
                $objWorkSheet2->getStyle($huruf . '5:' . $huruf . '5')->applyFromArray($font);

                $objWorkSheet2->getColumnDimension($huruf)->setWidth(20);

                $cells2 = 6;
                for ($x = 0; $x < count($arr2); $x++) {
                    $objWorkSheet2->setCellValue($huruf . $cells2, $arr2[$x][$index2]);
                    $objWorkSheet2->getStyle($huruf . $cells2)->applyFromArray($styleArray);
                    $cells2++;
                }
                $index2++;
            }

            $writer = new Xlsx($spreadsheet);
            $filename = 'Laporan_Gaji_' . date('Ymdhis');
            header('Content-Type: application/vnd.ms-excel');
            header('Content-Disposition: attachment;filename="' . $filename . '.xlsx"');
            header('Cache-Control: max-age=0');
            $writer->save('php://output');
        } else {
            $data['title'] = 'Laporan Gaji PT. BPRS Patriot Bekasi';
            $data['main'] = 'report/pay';
            $this->load->view('layout', $data);
        }
    }


    function getcolumnrange($min, $max)
    {
        $pointer = strtoupper($min);
        $output = array();
        while ($this->positionalcomparison($pointer, strtoupper($max)) <= 0) {
            array_push($output, $pointer);
            $pointer++;
        }
        return $output;
    }

    function positionalcomparison($a, $b)
    {
        $a1 = $this->stringtointvalue($a);
        $b1 = $this->stringtointvalue($b);
        if ($a1 > $b1) return 1;
        else if ($a1 < $b1) return -1;
        else return 0;
    }

    function stringtointvalue($str)
    {
        $amount = 0;
        $strarra = array_reverse(str_split($str));

        for ($i = 0; $i < strlen($str); $i++) {
            $amount += (ord($strarra[$i]) - 64) * pow(26, $i);
        }
        return $amount;
    }
}

/* End of file Report.php */
