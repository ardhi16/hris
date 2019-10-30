<?php

$total_income = $pay->pay_salary + $pay->pay_struktural + $pay->pay_rumah + $pay->pay_kemahalan + $pay->pay_family + $pay->pay_kinerja + $pay->pay_produktif + $pay->pay_teller + $pay->pay_beban + $pay->pay_masa_kerja + $pay->pay_total_eat + $pay->pay_total_transport + $pay->pay_dplk + $pay->pay_tuj_bpjstk + $pay->pay_tuj_bpjspn + $pay->pay_tuj_bpjsks + $pay->pay_tuj_pph21 + $pay->pay_tuj_subsidi;

$total_potongan = $pay->pay_dplk + ($pay->pay_pot_bpjstk + $pay->pay_tuj_bpjstk) + ($pay->pay_pot_bpjspn + $pay->pay_tuj_bpjspn) + ($pay->pay_pot_bpjsks + $pay->pay_tuj_bpjsks) + $pay->pay_tuj_pph21 + $pay->pay_teller + $pay->pay_pot_late + $pay->pay_pokok + $pay->pay_wajib + $pay->pay_tuj_subsidi + $pay->pay_total_cicilan + $pay->pay_zis + $pay->pay_takasi + $pay->pay_dll + $pay->pay_bprs;

?>
<html>

<head>
    <title>Slip Gaji</title>
    <style>
        body {
            font-size: 8.5pt;
        }

        table {
            border-collapse: collapse;
        }

        .upper {
            text-transform: uppercase;
        }

        .lower {
            text-transform: lowercase;
        }

        .cap {
            text-transform: capitalize;
        }

        .bold {
            font-weight: bold;
        }

        .side {
            border-left: 1px solid #000;
        }

        @page {
            margin-top: 0.5cm;
            margin-bottom: 0.2cm;
            margin-left: 0.5cm;
            margin-right: 0.5cm;
        }

        .column {
            float: left;
            width: 50%;
        }

        .col-1 {
            float: left;
            width: 74%;
        }

        .col-2 {
            /* float: left; */
            width: 25%;
        }

        .row:after {
            content: "";
            display: table;
            clear: both;
        }

        .wrap {
            white-space: nowrap;
        }

        .right {
            border-right: 1px solid #000;
        }

        .top {
            border-top: 1px solid #000;
        }

        .left {
            border-left: 1px solid #000;
        }

        .bottom {
            border-bottom: 1px solid #000;
        }
    </style>
</head>

<body>

    <div class="row">
        <div class="column">
            <span class="bold">PT. BPRS PATRIOT BEKASI</span>
            <table>
                <tr>
                    <td>Nama</td>
                    <td>:</td>
                    <td><span class="cap"><?php echo $pay->employee_name; ?></span></td>
                </tr>
                <tr>
                    <td>Jabatan</td>
                    <td>:</td>
                    <td><span class="cap"><?php echo $pay->position_name; ?></span></td>
                </tr>
            </table>
        </div>
        <div class="column">
            <span>&nbsp;</span>
            <table>
                <tr>
                    <td>Grade</td>
                    <td>:</td>
                    <td><span class="cap"><?php echo $pay->grade_name; ?></span></td>
                </tr>
                <tr>
                    <td>Slip Gaji Bln</td>
                    <td>:</td>
                    <td><?php echo pretty_date("$pay->pay_period_year-$pay->pay_period_month-01", 'F Y', false); ?></td>
                </tr>

            </table>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-1">
            <table width="" style="white-space:nowrap">
                <tr>
                    <td class="bold">No</td>
                    <td class="bold" colspan="4">Keterangan</td>
                    <td class="bold">No</td>
                    <td class="bold" colspan="3">Potongan</td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Gaji Pokok</td>
                    <td>: Rp</td>
                    <td align="right"><?php echo number_format($pay->pay_salary, 0, ',', '.'); ?></td>
                    <td class="side">&nbsp;</td>
                    <td>1</td>
                    <td>DPLK</td>
                    <td>: Rp</td>
                    <td align="right"><?php echo number_format($pay->pay_dplk, 0, ',', '.'); ?></td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Tunjangan Struktural/Jabatan</td>
                    <td>: Rp</td>
                    <td align="right"><?php echo number_format($pay->pay_struktural, 0, ',', '.'); ?></td>
                    <td class="side">&nbsp;</td>
                    <td>2</td>
                    <td>BPJS TK (JKK, JK, JHT)</td>
                    <td>: Rp</td>
                    <td align="right"><?php echo number_format(($pay->pay_tuj_bpjstk + $pay->pay_pot_bpjstk), 0, ',', '.'); ?></td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Tunjangan Perumahan</td>
                    <td>: Rp</td>
                    <td align="right"><?php echo number_format($pay->pay_rumah, 0, ',', '.'); ?></td>
                    <td class="side">&nbsp;</td>
                    <td>3</td>
                    <td>BPJS Pensiun</td>
                    <td>: Rp</td>
                    <td align="right"><?php echo number_format(($pay->pay_tuj_bpjspn + $pay->pay_pot_bpjspn), 0, ',', '.'); ?></td>
                </tr>
                <tr>
                    <td>4</td>
                    <td>Tunjangan Kemahalan</td>
                    <td>: Rp</td>
                    <td align="right"><?php echo number_format($pay->pay_kemahalan, 0, ',', '.'); ?></td>
                    <td class="side">&nbsp;</td>
                    <td>4</td>
                    <td>BPJS Kesehatan</td>
                    <td>: Rp</td>
                    <td align="right"><?php echo number_format(($pay->pay_tuj_bpjsks + $pay->pay_pot_bpjsks), 0, ',', '.'); ?></td>
                </tr>
                <tr>
                    <td>5</td>
                    <td>Tunjangan Keluarga</td>
                    <td>: Rp</td>
                    <td align="right"><?php echo number_format($pay->pay_family, 0, ',', '.'); ?></td>
                    <td class="side">&nbsp;</td>
                    <td>5</td>
                    <td>PPh 21</td>
                    <td>: Rp</td>
                    <td align="right"><?php echo number_format($pay->pay_tuj_pph21, 0, ',', '.'); ?></td>
                </tr>
                <tr>
                    <td>6</td>
                    <td>Tunjangan Kinerja</td>
                    <td>: Rp</td>
                    <td align="right"><?php echo number_format($pay->pay_kinerja, 0, ',', '.'); ?></td>
                    <td class="side">&nbsp;</td>
                    <td>6</td>
                    <td>Tunjangan Teller</td>
                    <td>: Rp</td>
                    <td align="right"><?php echo number_format($pay->pay_teller, 0, ',', '.'); ?></td>
                </tr>
                <tr>
                    <td>7</td>
                    <td>Tunjangan Produktivitas</td>
                    <td>: Rp</td>
                    <td align="right"><?php echo number_format($pay->pay_produktif, 0, ',', '.'); ?></td>
                    <td class="side">&nbsp;</td>
                    <td>7</td>
                    <td>Potongan Absensi</td>
                    <td>: Rp</td>
                    <td align="right"><?php echo number_format($pay->pay_pot_late, 0, ',', '.'); ?></td>
                </tr>
                <tr>
                    <td>8</td>
                    <td>Tunjangan Selisih Teller</td>
                    <td>: Rp</td>
                    <td align="right"><?php echo number_format($pay->pay_teller, 0, ',', '.'); ?></td>
                    <td class="side">&nbsp;</td>
                    <td>8</td>
                    <td>Simp. Pokok Kopsyah</td>
                    <td>: Rp</td>
                    <td align="right"><?php echo number_format($pay->pay_pokok, 0, ',', '.'); ?></td>
                </tr>
                <tr>
                    <td>9</td>
                    <td>Tunjangan Beban</td>
                    <td>: Rp</td>
                    <td align="right"><?php echo number_format($pay->pay_beban, 0, ',', '.'); ?></td>
                    <td class="side">&nbsp;</td>
                    <td>9</td>
                    <td>Simp. Wajib Kopsyah</td>
                    <td>: Rp</td>
                    <td align="right"><?php echo number_format($pay->pay_wajib, 0, ',', '.'); ?></td>
                </tr>
                <tr>
                    <td>10</td>
                    <td>Tunjangan Masa Kerja</td>
                    <td>: Rp</td>
                    <td align="right"><?php echo number_format($pay->pay_masa_kerja, 0, ',', '.'); ?></td>
                    <td class="side">&nbsp;</td>
                    <td>10</td>
                    <td>Adm BSM</td>
                    <td>: Rp</td>
                    <td align="right"><?php echo number_format($pay->pay_tuj_subsidi, 0, ',', '.'); ?></td>
                </tr>
                <tr>
                    <td>11</td>
                    <td>Tunjangan Makan</td>
                    <td>: Rp</td>
                    <td align="right"><?php echo number_format($pay->pay_total_eat, 0, ',', '.'); ?></td>
                    <td class="side">&nbsp;</td>
                    <td>11</td>
                    <td>Angsuran Pembiayaan</td>
                    <td>: Rp</td>
                    <td align="right"><?php echo number_format($pay->pay_total_cicilan, 0, ',', '.'); ?></td>
                </tr>
                <tr>
                    <td>12</td>
                    <td>Tunjangan Transport</td>
                    <td>: Rp</td>
                    <td align="right"><?php echo number_format($pay->pay_total_transport, 0, ',', '.'); ?></td>
                    <td class="side">&nbsp;</td>
                    <td>12</td>
                    <td>Zakat Penghasilan</td>
                    <td>: Rp</td>
                    <td align="right"><?php echo number_format($pay->pay_zis, 0, ',', '.'); ?></td>
                </tr>
                <tr>
                    <td>13</td>
                    <td>DPLK</td>
                    <td>: Rp</td>
                    <td align="right"><?php echo number_format($pay->pay_dplk, 0, ',', '.'); ?></td>
                    <td class="side">&nbsp;</td>
                    <td>13</td>
                    <td>Takasi Pribadi</td>
                    <td>: Rp</td>
                    <td align="right"><?php echo number_format($pay->pay_takasi, 0, ',', '.'); ?></td>
                </tr>
                <tr>
                    <td>14</td>
                    <td>Tunjangan BPJS TK</td>
                    <td>: Rp</td>
                    <td align="right"><?php echo number_format($pay->pay_tuj_bpjstk, 0, ',', '.'); ?></td>
                    <td class="side">&nbsp;</td>
                    <td>14</td>
                    <td>Tabungan Lain</td>
                    <td>: Rp</td>
                    <td align="right"><?php echo number_format($pay->pay_dll, 0, ',', '.'); ?></td>
                </tr>
                <tr>
                    <td>15</td>
                    <td>Tunjangan BPJS Pensiun</td>
                    <td>: Rp</td>
                    <td align="right"><?php echo number_format($pay->pay_tuj_bpjspn, 0, ',', '.'); ?></td>
                    <td class="side">&nbsp;</td>
                    <td>15</td>
                    <td>Rekening BPRS</td>
                    <td>: Rp</td>
                    <td align="right"><?php echo number_format($pay->pay_bprs, 0, ',', '.'); ?></td>
                </tr>
                <tr>
                    <td>16</td>
                    <td>Tunjangan BPJS Kesehatan</td>
                    <td>: Rp</td>
                    <td align="right"><?php echo number_format($pay->pay_tuj_bpjsks, 0, ',', '.'); ?></td>
                    <td class="side">&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td>17</td>
                    <td>PPh 21</td>
                    <td>: Rp</td>
                    <td align="right"><?php echo number_format($pay->pay_tuj_pph21, 0, ',', '.'); ?></td>
                    <td class="side">&nbsp;</td>
                    <td>&nbsp;</td>
                    <td class="bold">TOTAL POTONGAN</td>
                    <td class="bold" style="border-top:1px solid #000">: Rp</td>
                    <td class="bold" align="right" style="border-top:1px solid #000"><?php echo number_format($total_potongan, 0, ',', '.'); ?></td>
                </tr>
                <tr>
                    <td>18</td>
                    <td>Subsidi BSM</td>
                    <td>: Rp</td>
                    <td align="right"><?php echo number_format($pay->pay_tuj_subsidi, 0, ',', '.'); ?></td>
                    <td class="side">&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td class="bold">TOTAL</td>
                    <td class="bold" style="border-top:1px solid #000">: Rp</td>
                    <td class="bold" align="right" style="border-top:1px solid #000"><?php echo number_format($total_income, 0, ',', '.'); ?></td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
            </table>
            <br>
            <span style="font-size:6pt;">Slip Gaji ini dibuat otomatis menggunakan aplikasi HRIS, <br>
                sehingga tidak membutuhkan tanda tangan.</span>
        </div>
        <div class="col-2">
            <table width="100%" style="white-space:nowrap">
                <tr>
                    <td colspan="4">&nbsp;</td>
                </tr>
                <tr>
                    <td colspan="4" class="top right left">&nbsp;</td>
                </tr>
                <tr>
                    <td class="left">A. </td>
                    <td class="wrap">TOTAL GAJI (THP)</td>
                    <td class="wrap">: Rp</td>
                    <td class="wrap right" align="right"><?php echo number_format($total_income - $total_potongan, 0, ',', '.'); ?></td>
                </tr>
                <tr>
                    <td class="left">B. </td>
                    <td class="wrap">INSENTIF/BONUS</td>
                    <td class="wrap">: Rp</td>
                    <td class="wrap right" align="right"><?php echo number_format($pay->pay_overtime + $pay->pay_insentive, 0, ',', '.'); ?></td>
                </tr>
                <tr>
                    <td class="left">C. </td>
                    <td class="wrap">OBAT</td>
                    <td class="wrap" style="border-bottom:1px solid #000">: Rp</td>
                    <td class="wrap right" style="border-bottom:1px solid #000" align="right"><?php echo number_format($pay->pay_med_mar, 0, ',', '.'); ?></td>
                </tr>
                <tr>
                    <td class="left right" colspan="4">&nbsp;</td>
                </tr>
                <?php
                $total_terima = ($total_income - $total_potongan) + $pay->pay_med_mar + $pay->pay_overtime + $pay->pay_insentive;
                ?>
                <tr>
                    <td class="left">&nbsp;</td>
                    <td class="bold wrap">TOTAL DITERIMA</td>
                    <td class="bold wrap">: Rp</td>
                    <td class="bold wrap right" align="right"><?php echo number_format($total_terima, 0, ',', '.'); ?></td>
                </tr>
                <tr>
                    <td class="left right bottom" colspan="4">&nbsp;</td>
                </tr>
            </table>
            <br>
            <table width="100%" style="white-space:nowrap">
                <tr>
                    <td class="top right left" colspan="4"></td>
                </tr>
                <tr>
                    <td class="bold wrap right left" colspan="4">Rincian Angsuran :</td>
                </tr>
                <?php foreach ($angs as $row) : ?>
                    <?php
                        $amount = 0;
                        $length = 0;
                        $ke = 0;
                        ?>
                    <?php foreach ($detail as $key) : ?>
                        <?php if ($row->id == $key->type_id) {
                                    $amount = $key->angsuran_amount;
                                    $ke = $key->angsuran_ke;
                                    $length = $key->angsuran_length;
                                } ?>
                    <?php endforeach; ?>
                    <tr>
                        <td class="wrap left">Angs. <?php echo $row->alias_ang ?></td>
                        <td class="wrap"><?php echo "$ke/$length"; ?></td>
                        <td class="wrap">: Rp</td>
                        <td class="wrap right" align="right"><?php echo number_format($amount, 0, ',', '.'); ?></td>
                    </tr>
                <?php endforeach; ?>
                <tr>
                    <td class="wrap left">&nbsp;</td>
                    <td class="wrap top">&nbsp;</td>
                    <td class="wrap top">&nbsp;</td>
                    <td class="bold wrap top right" align="right"><?php echo number_format($pay->pay_total_cicilan, 0, ',', '.'); ?></td>
                </tr>
                <tr>
                    <td colspan="4" class="bottom right left"></td>
                </tr>
            </table>
        </div>
    </div>


</body>

</html>