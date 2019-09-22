<html>

<head>
    <title>Surat Keterangan Bekerja</title>
    <style>
        .upper {
            text-transform: uppercase;
        }

        .lower {
            text-transform: lowercase;
        }

        .cap {
            text-transform: capitalize;
        }

        @page {
            margin-top: 4cm;
            margin-bottom: 0.2cm;
            margin-left: 2.5cm;
            margin-right: 3cm;
        }

        .style12 {
            font-size: 10px
        }

        .style13 {
            font-size: 14pt;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <p align="center"><span class="style13"><u>SURAT KETERANGAN KERJA</u></span><br>
        No : <?php echo $kkout->kkout_no ?></p>
    </br></br><br>
    <p align="left">Yang bertanda tangan dibawah ini:</p>
    <table width="100%" border="0">
        <tr>
            <td width="130">Nama</td>
            <td width="5">:</td>
            <td width=""><strong>Moh. Asmawi</strong></td>
        </tr>
        <tr>
            <td>Jabatan</td>
            <td>:</td>
            <td><span class="">Direktur</span></td>
        </tr>
        <tr>
            <td>Perusahaan</td>
            <td>:</td>
            <td>PT. BPR Syariah Patriot Bekasi</td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td>:</td>
            <td><span class="cap">Komplek Ruko Sentra Niaga Kalimalang Blok C1 No.3 Kel. Kayuringin Jaya, Kec. Bekasi Selatan, Kota Bekasi</td>
        </tr>
    </table><br>
    <p align="left">Menerangkan dengan sesungguhnya, bahwa :
        <table width="100%" border="0">
            <tr>
                <td width="130">Nama</td>
                <td width="5">:</td>
                <td width=""><strong><?php echo $kkout->employee_name; ?></strong></td>
            </tr>
            <tr>
                <td width="130">NIK</td>
                <td width="5">:</td>
                <td width=""><?php echo $kkout->employee_nik; ?></td>
            </tr>
            <tr>
                <td width="130">Jabatan</td>
                <td width="5">:</td>
                <td width=""><?php echo $kkout->position_name; ?></td>
            </tr>
        </table>
        <br>
        <?php if ($kkout->kkout_type == 2) : ?>
            <p align="justify">Adalah benar karyawan di PT. BPR Patriot Bekasi, sejak <?php echo pretty_date($kkout->employee_join_date, 'd F Y', false); ?> sampai dengan tanggal <?php echo pretty_date($kkout->kkout_date, 'd F Y', false); ?>. Yang Bersangkutan sudah Non Aktif bekerja dikarenakan Meninggal Dunia.</p>
        <?php else : ?>
            <p align="justify">Telah bekerja di PT. BPR Patriot Bekasi, sejak <?php echo pretty_date($kkout->employee_join_date, 'd F Y', false); ?> sampai dengan tanggal <?php echo pretty_date($kkout->kkout_date, 'd F Y', false); ?>.</p>
            <?php if ($kkout->kkout_type == 1) : ?>
                <p align="justify">Selama bekerja, yang bersangkutan telah menunjukan prestasi dan dedikasi yang baik, Manajemen mengucapkan terima kasih atas partisipasinya selama bergabung dengan perusahaan.</p>
            <?php endif ?>
        <?php endif ?>

        <p align="justify">Demikian surat keterangan ini dibuat dengan sebenarnya, untuk dipergunakan seperlunya.</p><br>

        <table width="100%">
            <tr>
                <td><span class="cap"></span>Bekasi, <?php echo pretty_date($kkout->kkout_date, 'd F Y', false); ?></td>
            </tr>
            <tr>
                <td><strong>PT. BPR SYARIAH PATRIOT BEKASI</strong></td>
            </tr>
        </table>
        <br><br><br><br>
        <table width="100%">
            <tr>
                <td><strong><u><span class="upper">MOH. ASMAWI</span></u></strong></td>
            </tr>
            <tr>
                <td><strong><i><span class="">Direktur</span></i></strong></td>
            </tr>
        </table>
</body>

</html>