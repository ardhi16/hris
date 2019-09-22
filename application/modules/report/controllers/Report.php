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
            $sheet->setCellValue('C3', 'Pengunduh: ' . $this->session->userdata('ufullname'));


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
                $sheet->setCellValue('B' . $cell, $row->employee_nik);
                $sheet->setCellValue('C' . $cell, $row->employee_name);
                $sheet->setCellValue('D' . $cell, ($row->employee_gender == 'L') ? 'Laki-laki' : 'Perempuan');
                $sheet->setCellValue('E' . $cell, $row->employee_pob);
                $sheet->setCellValue('F' . $cell, $row->employee_bdate);
                $sheet->setCellValue('G' . $cell, $row->employee_ktp);
                $sheet->setCellValue('H' . $cell, $row->employee_current_address);
                $sheet->setCellValue('I' . $cell, $row->employee_current_district);
                $sheet->setCellValue('J' . $cell, $row->employee_current_village);
                $sheet->setCellValue('K' . $cell, $row->employee_current_postcode);
                $sheet->setCellValue('L' . $cell, $row->employee_id_address);
                $sheet->setCellValue('M' . $cell, $row->employee_id_district);
                $sheet->setCellValue('N' . $cell, $row->employee_id_village);
                $sheet->setCellValue('O' . $cell, $row->employee_id_postcode);
                $sheet->setCellValue('P' . $cell, $row->employee_phone);
                $sheet->setCellValue('Q' . $cell, $row->employee_email);
                $sheet->setCellValue('R' . $cell, $row->employee_mother);
                $sheet->setCellValue('S' . $cell, $row->employee_married);
                $sheet->setCellValue('T' . $cell, $row->store_code);
                $sheet->setCellValue('U' . $cell, $row->store_name);
                $sheet->setCellValue('V' . $cell, $row->position_code);
                $sheet->setCellValue('W' . $cell, $row->position_name);
                $sheet->setCellValue('X' . $cell, $row->grade_name);
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
}

/* End of file Report.php */