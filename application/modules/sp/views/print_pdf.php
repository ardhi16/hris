<!DOCTYPE html>
<html lang="en">

<head>
    <title>Surat Peringatan</title>
    <style>
        @page {
            margin-top: 4cm;
            margin-bottom: 4cm;
            margin-left: 2cm;
            margin-right: 2cm;
        }

        .center {
            margin-left: 180px;
            height: 50px;
        }

        .cap {
            text-transform: capitalize;
        }

        .low {
            text-transform: lowercase;
        }
    </style>

</head>

<body>
    <p style="text-align:center">SURAT KEPUTUSAN DIREKSI & KADIV. SDI & UMUM<br>
        PT. BANK PEMBIAYAAN RAKYAT SYARIAH PATRIOT BEKASI <br>
        NOMOR : <?php echo $sp->sp_no ?></p>
    <p style="text-align:center">TENTANG</p>
    <p style="text-align:center">SURAT PERINGATAN (SP) II TERHADAP SDR. FAISAL</p>
        <hr>
    <p><i>Menimbang :</i></p>
    <div style="text-align:justify">
        <ol>
            <li>Bahwa dalam menerapkan pelaksanaan Good Corporate Governace ( GCG ) di BPR Syariah Patriot Bekasi </li>
            <li>Bahwa dalam rangka menerapkan prinsip-prinsip kehati-hatian di BPR Syariah Patriot Bekasi.</li>
            <li>Bahwa dalam rangka menerapkan prinsip-prinsip risk manajemen di BPR Syariah Patriot Bekasi</li>
            <li>Bahwa dalam rangka melaksanakan hal-hal pada point 1, 2 dan 3 maka diperlukan mutasi dan rotasi karyawan untuk meningkatkan kinerja dan produktivitas Bank.</li>
        </ol>
        <p><i>Menimbang :</i></p>
        <ol>
            <li>Akta Notaris Nomor : 16 Tahun 2009 Tentang Akta Pendirian PT. Bank Pembiayaan Rakyat Syariah Patriot Bekasi.</li>
            <li>Keputusan Menteri Kehakiman dan Hak Asasi Manusia RI Nomor : AHU-03036.AH.01.01 Tahun 2010 Tentang Pengesahan Badan Hukum PT. Bank Pembiayaan Rakyat Syariah Patriot Bekasi.</li>
            <li>Akta Notaris Nomor : 18 Tahun 2013 Tentang Perubahan Nama Perusahaan menjadi PT. Bank Pembiayaan Rakyat Syariah Patriot Bekasi.</li>
            <li>0166866 Tahun 2019 Tentang Perubahan Data Perseroan PT. Bank Pembiayaan Rakyat Syariah Patriot Bekasi.</li>
            <li>Keputusan Kepala Departemen Perbankan Syariah Bank Indonesia Nomor: 15/2/KEP.Dir.PbS/2013 Tentang Penetapan Penggunaan Izin Usaha Atas Nama PT. Bank Pembiayaan Rakyat Syariah Pemerintah Kota Bekasi menjadi Izin Usaha Atas Nama PT. Bank Pembiayaan Rakyat Syariah Patriot Bekasi.
            </li>
            <li>Rencana Bisnis BPR Syariah Patriot Bekasi Tahun 2019.</li>
        </ol>
        <br>
        <p><i>Memperhatikan :</i></p>
        <ol>
            <li>Undang-undang Nomor 21 Tahun 2008 Tentang Perbankan Syariah</li>
            <li>Peraturan Bank Indonesia Nomor: 11/23/PBI/2009 jo Surat Edaran Bank Indonesia Nomor: 11/34/DPBs</li>
        </ol>

        <p style="text-align:center; font-weight:bold; letter-spacing:3px">MEMUTUSKAN</p>
        <p><i>Menetapkan :</i></p>
        <ol>
            <li><?php echo $jenis ?> <?php echo ($sp->employee_gender == 'L') ? 'Sdr' : 'Sdri' ?>. <span class="cap" style="font-weight:bold;font-style:italic"><?php echo $sp->employee_name; ?></span> sebagai <span class="cap"><?php echo $sp->position_name; ?></span> di Kantor <span class="cap" style="font-weight:bold;font-style:italic"><?php echo $sp->store_name; ?></span> Bank Pembiayaan Rakyat Syariah Patriot Bekasi dengan ruang lingkup pekerjaan sesuai Memo Internal No. <?php echo $sp->sp_memo; ?> Tanggal <?php echo pretty_date($sp->sp_memo_date, 'd F Y', false); ?>.</li>
            <li>Atas <span class="low"><?php echo $sp->sp_type; ?></span> ini Saudara di gaji dan tunjangan sebagaimana terlampir pada lampiran B.</li>
            <li>Apabila dikemudian hari terdapat kekeliruan dalam surat keputusan ini, akan diadakan perbaikan sebagaimana mestinya.</li>
            <li>Surat keputusan ini berlaku effektif mulai pada tanggal ditetapkan.</li>
        </ol>
        <br><br>
        <p>Ditetapkan di : Bekasi <br>
            Pada Tanggal : <?php echo pretty_date($sp->sp_created_at, 'd F Y', false); ?>
        </p>
        <p>BANK PEMBIAYAAN RAKYAT SYARIAH PATRIOT BEKASI</p>
        <table style="margin-top:100px">
            <tr>
                <td width="300px"><u>Moh. Asmawi</u></td>
                <td><u>Ima Rachmayanty</u></td>
            </tr>
            <tr>
                <td>Direktur</td>
                <td>Kadiv. SDI & Umum</td>
            </tr>
        </table>
        <p>Tembusan :</p>
        <ol>
            <li>Kepada Yth. Kadiv. Bisnis</li>
            <li>Kepada Yth. Kepala KPO.</li>
            <li>Karyawan yang bersangkutan.</li>
        </ol>
    </div>

</body>

</html>