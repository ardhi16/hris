<!DOCTYPE html>
<html lang="en">

<head>
    <title>Surat Peringatan I</title>
    <style>
        @page {
            margin-top: 4cm;
            margin-bottom: 4cm;
            margin-left: 2cm;
            margin-right: 2cm;
        }

        .bold {
            font-weight: bold;
        }

        .center {
            margin-left: 180px;
            height: 50px;
        }

        .cap {
            text-transform: capitalize;
        }

        .upper {
            text-transform: uppercase;
        }

        .low {
            text-transform: lowercase;
        }
    </style>

</head>

<body>
    <img class="center" src="<?php echo media_url('images/bismillah.jpg') ?>">
    <p style="text-align:center">SURAT KEPUTUSAN DIREKSI & KADIV. SDI & UMUM<br>
        PT. BANK PEMBIAYAAN RAKYAT SYARIAH PATRIOT BEKASI <br>
        NOMOR : <?php echo $sp->sp_no ?></p>
    <p style="text-align:center">TENTANG</p>
    <p style="text-align:center">SURAT PERINGATAN (SP) I TERHADAP <span class="upper bold"><?php echo ($sp->employee_gender == 'L') ? 'SDR' : 'SDRI' ?>. <?php echo $sp->employee_name ?></span></p>
    <hr>
    <p class="bold"><i>Menimbang :</i></p>
    <div style="text-align:justify">
        <ol type="a">
            <li>Bahwa PT. BPRS Patriot Bekasi sebagai sebuah Bank wajib menjaga disiplin kerja.</li>
            <li>Bahwa <?php echo ($sp->employee_gender == 'L') ? 'Saudara' : 'Saudari' ?> <span class="cap bold"><?php echo $sp->employee_name ?></span> berdasarkan memo internal 024/IM/D-SDI/II/2019 tanggal 27 Februari 2019 perihal <i>"Usulan pemberian SP"</i> untuk diberikan <strong>Surat Peringatan (SP) I</strong></li>
            <li>Bahwa <?php echo ($sp->employee_gender == 'L') ? 'Saudara' : 'Saudari' ?> <span class="cap bold"><?php echo $sp->employee_name ?></span> telah bertindak melakukan pelanggaran terhadap ketentuan-ketentuan disiplin pegawai yaitu melanggar Peraturan Perusahaan : <br>
                <ul>
                    <li><?php echo $sp->sp_desc; ?></li>
                </ul>
            </li>
        </ol>
        <p class="bold"><i>Mengingat :</i></p>
        <ol>
            <li>Undang-Undang Nomor 23 Tahun 1999 tentang Bank Indonesia (LN RI Tahun 1999 Nomor 66, Tambahan LN Nomor 3843 sebagaimana telah diubah terakhir dengan Undang-undang Nomor 6 Tahun 2009 tentang Penetapan Peraturan Pemerintah Pengganti Undang-Undang No.2 Tahun 2008 tentang Perubahan Kedua atas Undang-Undang Nomor 23 Tahun 1999 Tentang Bank Indonesia menjadi Undang-Undang (LN RI Tahun 2009 Nomor 7, Tambahan LN Nomor 4962).</li>
            <li>Undang-Undang Nomor 40 Tahun 2007 tentang Perseroan Terbatas (LN R.I tahun 2007 Nomor 106, Tambahan LN R.I Nomor 4756).</li>
            <li>Undang-Undang Nomor 21 Tahun 2008 tentang Perbankan Syariah (LN R.I Tahun 2008 Nomor 94, Tambahan LN R.I Nomor 4867).</li>
            <li>Peraturan Bank Indonesia Nomor 11/23/PBI/2009 tanggal 01 Juli 2009 tentang Bank Pembiayaan Rakyat Syariah (LN RI Tahun 2009 Nomor 101, Tambahan LN RI Nomor 5027).</li>
            <li>Akta Notaris Nomor : 18 Tahun 2013 Tanggal 30 Agustus 2013 Tentang Perubahan Nama Perusahaan menjadi PT. Bank Pembiayaan Rakyat Syariah Patriot Bekasi.
            </li>
            <li>Keputusan Menteri Kehakiman dan Hak Asasi Manusia RI Nomor : AHU-60797.AH.01.02 Tahun 2013 Tanggal 22 Nopember 2013 Tentang Perubahan Anggaran Dasar PT. Bank Pembiayaan Rakyat Syariah Patriot Bekasi.</li>
            <li>Keputusan Kepala Departemen Perbankan Syariah Bank Indonesia Nomor: 15/2/KEP.Dir.PbS/2013 Tanggal 27 Desember 2013 Tentang Penetapan Penggunaan Izin Usaha Atas Nama PT. Bank Pembiayaan Rakyat Syariah Pemerintah Kota Bekasi menjadi Izin Usaha Atas Nama PT. Bank Pembiayaan Rakyat Syariah Patriot Bekasi.</li>
            <li>Keputusan Kepala Dinas Tenaga Kerja Kota Bekasi NO: 560/Kept. 203-DISNAKER.HIJAMSOSTEK tentang Pengesahan Peraturan Perusahaan PT. BPR SYARIAH PATRIOT BEKASI </li>
            <li>Peraturan Perusahaan, Hubungan Kerja Karyawan, Syarat-syarat Kerja dan Tata Tertib Perusahaan PT. BANK PEMBIAYAAN RAKYAT SYARIAH PATRIOT BEKASI NOMOR:<span class="bold"> 01/KOM/PP/PERSEROANKB/I/2018</span>.</li>
        </ol>
        <br>
        <p style="text-align:center; font-weight:bold; letter-spacing:3px">MEMUTUSKAN</p>
        <p class="bold"><i>Menetapkan :</i></p>
        <table>
            <tr>
                <td valign="top">Pertama</td>
                <td valign="top" width="30px">:</td>
                <td style="text-align:justify">Menjatuhkan sanksi berupa <strong>Surat Peringatan (SP) I kepada <?php echo ($sp->employee_gender == 'L') ? 'Sdr' : 'Sdri' ?>. <span class="cap bold"><?php echo $sp->employee_name ?></span></strong> yang berlaku selama 6 (enam) bulan terhitung mulai tanggal ditetapkannya Surat Keputusan ini.</td>
            </tr>
            <tr>
                <td valign="top">Kedua</td>
                <td valign="top" width="30px">:</td>
                <td style="text-align:justify">Bila dalam waktu 6 (enam) bulan tidak ada progress dan perubahan sikap, maka akan dievaluasi untuk diberikan sanksi berikutnya. </td>
            </tr>
            <tr>
                <td valign="top">Ketiga</td>
                <td valign="top" width="30px">:</td>
                <td style="text-align:justify">Demikian, keputusan ini dibuat untuk dilaksanakan dan bila terdapat hal-hal kekeliruan di dalamnya, akan diperbaiki sebagaimana mestinya.</td>
            </tr>
        </table>
        <br>
        <p>Ditetapkan di : Bekasi <br>
            Pada Tanggal : <?php echo pretty_date($sp->sp_date_start, 'd F Y', false); ?>
        </p>
        <p>BANK PEMBIAYAAN RAKYAT SYARIAH PATRIOT BEKASI</p>
        <table style="margin-top:100px">
            <tr>
                <td width="300px"><u><?php echo $setting->setting_name_1; ?></u></td>
                <td><u><?php echo $setting->setting_name_2; ?></u></td>
            </tr>
            <tr>
                <td><?php echo $setting->setting_pos_1; ?></td>
                <td><?php echo $setting->setting_pos_2; ?></td>
            </tr>
        </table>
    </div>

</body>

</html>