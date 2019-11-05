<?php

if (isset($pay)) {
    $id = $pay->pay_id;
    $total_day = $pay->pay_total_day;
    $insentive = $pay->pay_insentive;
    $overtime = $pay->pay_overtime;
    $med_mar = $pay->pay_med_mar;
    $subsidi = $pay->pay_tuj_subsidi;
    $day_late = $pay->pay_day_late;
    $pokok = $pay->pay_pokok;
    $wajib = $pay->pay_wajib;
    $zis = $pay->pay_zis;
    $takasi = $pay->pay_takasi;
    $dll = $pay->pay_dll;
    $bprs = $pay->pay_bprs;
    $cicil = $pay->pay_total_cicilan;
} else {
    $total_day = 0;
    $insentive = 0;
    $overtime = 0;
    $med_mar = 0;
    $subsidi = 10000;
    $day_late = 0;
    $pokok = 0;
    $wajib = 10000;
    $zis = 0;
    $takasi = 0;
    $dll = 0;
    $bprs = 0;
    $cicil = 0;
}

?>

<div class="container-fluid">
    <div class="card-box">
        <form action="" method="post">
            <div class="row">
                <div class="col-md-10">
                    <input type="hidden" name="salary" id="salary">
                    <input type="hidden" name="total_tetap" id="total_tetap">
                    <input type="hidden" name="tujab_variabel" id="tujab_variabel">
                    <input type="hidden" name="tunj_teller" id="tunj_teller">
                    <input type="hidden" name="statis" id="statis">
                    <input type="hidden" name="dinamis" id="dinamis">
                    <input type="hidden" name="struktural" id="struktural">
                    <input type="hidden" name="rumah" id="rumah">
                    <input type="hidden" name="kemahalan" id="kemahalan">
                    <input type="hidden" name="family" id="family">
                    <input type="hidden" name="kinerja" id="kinerja">
                    <input type="hidden" name="produktif" id="produktif">
                    <input type="hidden" name="beban" id="beban">
                    <input type="hidden" name="masa_kerja" id="masa_kerja">
                    <input type="hidden" name="dplk" id="dplk">
                    <input type="hidden" name="ump" id="ump">
                    <input type="hidden" name="status" id="status">
                    <input type="hidden" name="bpjs_kes_status" id="bpjs_kes_status">
                    <input type="hidden" name="cicil" id="cicil">
                    <?php if (!isset($pay->pay_id)) : ?>
                        <div class="form-group">
                            <label for="">Karyawan</label>
                            <select name="employee_id" id="employee_id" class="form-control select2" required>
                                <option value="">-- Pilih Karyawan --</option>
                                <?php foreach ($employee as $row) : ?>
                                    <option value="<?php echo $row->employee_id ?>"><?php echo $row->employee_nik ?> - <?php echo $row->employee_name ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    <?php else : ?>
                        <div class="form-group">
                            <label for="">Karyawan</label>
                            <input type="hidden" id="employee_id" value="<?php echo $pay->employee_id ?>">
                            <input type="text" class="form-control" value="<?php echo $pay->employee_nik ?> - <?php echo $pay->employee_name ?>" readonly>
                        </div>
                    <?php endif ?>
                    <div class="row">
                        <div class="col" id="income">
                            <h5>Pendapatan</h5>
                            <hr>
                            <div class="form-group">
                                <label for="">Jumlah Hari Masuk</label>
                                <input type="text" class="form-control" name="pay_total_day" id="pay_total_day" value="<?php echo $total_day ?>" autocomplete="off">
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="">Lembur</label>
                                        <input type="text" class="form-control" id="pay_overtime" name="pay_overtime" value="<?php echo $overtime ?>" autocomplete="off">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="">Insentif</label>
                                        <input type="text" class="form-control" name="pay_insentive" id="pay_insentive" value="<?php echo $insentive ?>" autocomplete="off">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="">Obat/Tunj. Nikah</label>
                                        <input type="text" class="form-control" id="pay_med_mar" name="pay_med_mar" value="<?php echo $med_mar ?>" autocomplete="off">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="">Subs. Adm</label>
                                        <input type="text" class="form-control" name="pay_subsidi" id="pay_subsidi" value="<?php echo $subsidi ?>" autocomplete="off">
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="">Tunjangan Makan</label>
                                        <input type="text" class="form-control" id="makan" value="0" readonly>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="">Total Tunj. Makan</label>
                                        <input type="text" class="form-control" name="pay_total_eat" id="pay_total_eat" value="0" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="">Tunjangan Transportasi</label>
                                        <input type="text" class="form-control" id="transport" value="0" readonly>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="">Total Tunj. Transportasi</label>
                                        <input type="text" class="form-control" name="pay_total_transport" id="pay_total_transport" value="0" readonly>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" id="tunj_jamsostek" value="0">
                            <input type="hidden" id="bruto" value="0">
                            <input type="hidden" id="tujab" name="tujab" value="0">
                            <input type="hidden" id="jamsos" value="0">
                            <input type="hidden" id="bpjs" value="0">
                            <input type="hidden" id="netto" value="0">
                            <input type="hidden" id="nettos" value="0">
                            <input type="hidden" id="ptkp" value="0">
                            <input type="hidden" id="hptkp" value="0">

                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="">BPJS TK</label>
                                        <input type="text" class="form-control" id="tk" name="tk" value="0" readonly>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="">BPJS Pensiun</label>
                                        <input type="text" class="form-control" name="pensiun" id="pensiun" value="0" readonly>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="">BPJS Kesehatan</label>
                                        <input type="text" class="form-control" name="kesehatan" id="kesehatan" value="0" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="">Tunjangan PPh 21</label>
                                <input type="text" class="form-control" name="pph21" id="pph21" value="0" readonly>
                            </div>
                            <div class="form-group">
                                <label for="">Gross</label>
                                <input type="text" class="form-control" name="gross" id="gross" value="0" readonly>
                            </div>
                        </div>
                        <div class="col" id="potongan">
                            <h5>Potongan</h5>
                            <hr>
                            <div class="form-group">
                                <label for="">Jumlah Telat Masuk</label>
                                <input type="text" class="form-control" name="telat" id="telat" value="<?php echo $day_late ?>" autocomplete="off">
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="">Simpanan Pokok</label>
                                        <input type="text" class="form-control" name="pokok" id="pokok" value="<?php echo $pokok ?>" autocomplete="off">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="">Simpanan Wajib</label>
                                        <input type="text" class="form-control" name="wajib" id="wajib" value="<?php echo $wajib ?>" autocomplete="off">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="">ZIS</label>
                                        <input type="text" class="form-control" name="zis" id="zis" value="<?php echo $zis ?>" autocomplete="off">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="">Tabungan Takasi</label>
                                        <input type="text" class="form-control" name="takasi" id="takasi" value="<?php echo $takasi ?>" autocomplete="off">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="">Lain-lain</label>
                                        <input type="text" class="form-control" name="dll" id="dll" value="<?php echo $dll ?>" autocomplete="off">
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="form-group">
                                <label for="">Masuk Rekening BPRS</label>
                                <input type="text" class="form-control" name="bprs" id="bprs" value="<?php echo $bprs ?>" autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label for="">Potongan Tunj. Transportasi</label>
                                <input type="text" class="form-control" name="pot_trans" id="pot_trans" value="0" readonly>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="">Pot. BPJS TK</label>
                                        <input type="text" class="form-control" id="pot_tk" name="pot_tk" value="0" readonly>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="">Pot. BPJS Pensiun</label>
                                        <input type="text" class="form-control" name="pot_pensiun" id="pot_pensiun" value="0" readonly>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="">Pot. BPJS Kes</label>
                                        <input type="text" class="form-control" name="pot_kesehatan" id="pot_kesehatan" value="0" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="">THP</label>
                                        <input type="text" class="form-control" name="thp" id="thp" value="0" readonly>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="">Payroll BSM</label>
                                        <input type="text" class="form-control" name="bsm" id="bsm" value="0" readonly>
                                    </div>
                                </div>
                            </div>
                            <div id="cicilan" style="display:none">
                                <h5>Angsuran</h5>
                                <input type="hidden" name="total_cicilan" id="total_cicilan" value="<?php echo $cicil ?>">
                                <table class="table table-hover table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Angsuran</th>
                                            <th>Angsuran Ke</th>
                                            <th>Nominal</th>
                                        </tr>
                                    </thead>
                                    <tbody id="angs"></tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-success btn-block mt-3" id="btn-save">Simpan</button>
                    <a class="btn btn-secondary btn-block" href="<?php echo site_url('pay') ?>">Batal</a>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    $(document).ready(function() {

        <?php if (isset($pay->pay_id)) : ?>
            let employee_id = $('#employee_id').val();
            $('#btn-save').text('Ubah');
            showEmployee(employee_id);
        <?php else : ?>
            $(".select2").change(function() {
                var employee_id = $(this).val();
                showEmployee(employee_id);
            });
        <?php endif ?>

        $('#income').on('input', function() {
            inputGaji();
        });

        $('#potongan').on('input', function() {
            inputGaji();
        });

        function inputGaji() {
            var day = $('#pay_total_day').val() || 0;
            let total_telat = $('#telat').val() || 0;
            var makan = parseInt(removeNumber($('#makan').val()));
            var transport = parseInt(removeNumber($('#transport').val()));
            $('#pay_total_eat').val(number(day * makan));
            $('#pay_total_transport').val(number(day * transport));
            $('#pot_trans').val(number((transport / 2) * total_telat));
            bruto();
        }

        function showEmployee(employee_id) {
            $.ajax({
                type: "POST",
                dataType: "json",
                url: "<?php echo site_url('api/getBenefit') ?>",
                data: "employee_id=" + employee_id,
                success: function(res) {
                    if (res.status) {
                        $('#salary').val(res.result.employee_salary)
                        $('#statis').val(res.result.statis)
                        $('#dinamis').val(res.result.dinamis)
                        $('#struktural').val(res.result.struktural)
                        $('#rumah').val(res.result.rumah)
                        $('#kemahalan').val(res.result.kemahalan)
                        $('#family').val(res.result.family)
                        $('#kinerja').val(res.result.kinerja)
                        $('#produktif').val(res.result.produktif)
                        $('#beban').val(res.result.beban)
                        $('#masa_kerja').val(res.result.masa_kerja)
                        $('#total_tetap').val(res.result.total_tetap)
                        $('#makan').val(number(res.result.makan))
                        $('#transport').val(number(res.result.transport))
                        $('#dplk').val(res.result.dplk)
                        $('#tunj_jamsostek').val(res.result.tunj_jamsostek)
                        $('#ump').val(res.result.ump)
                        $('#status').val(res.result.employee_status)
                        $('#bpjs_kes_status').val(res.result.bpjs_kes_status)
                        $('#ptkp').val(res.result.ptkp)
                    } else {
                        $('#salary').val(0)
                        $('#statis').val(0)
                        $('#dinamis').val(0)
                        $('#struktural').val(0)
                        $('#rumah').val(0)
                        $('#kemahalan').val(0)
                        $('#family').val(0)
                        $('#kinerja').val(0)
                        $('#produktif').val(0)
                        $('#beban').val(0)
                        $('#masa_kerja').val(0)
                        $('#total_tetap').val(0)
                        $('#makan').val(0)
                        $('#transport').val(0)
                        $('#dplk').val(0)
                        $('#tunj_jamsostek').val(0)
                        $('#tunj_teller').val(0)
                        $('#ump').val(0)
                        $('#status').val('')
                        $('#bpjs_kes_status').val(1)
                        $('#ptkp').val(0)
                    }

                    $.ajax({
                        type: "POST",
                        dataType: "json",
                        url: "<?php echo site_url('api/angsuran') ?>",
                        data: "employee_id=" + employee_id,
                        success: function(ok) {
                            if (ok.length > 0) {
                                $('#cicilan').show();
                                let cicil = '';
                                let no = 1;
                                let total_cicilan = 0;
                                ok.forEach(function(c) {
                                    <?php if (isset($pay->pay_id)) : ?>
                                        cicil += `<tr>
                                    <td><input type="hidden" name="bayar[]" value="${c.angsuran_id}">${no++}</td>
                                    <td>${c.name_ang}</td>
                                    <td>${parseInt(c.angsuran_current)}/${c.angsuran_length}</td>
                                    <td>${number(c.angsuran_amount)}</td>
                                    </tr>`
                                    <?php else : ?>
                                        cicil += `<tr>
                                    <td><input type="hidden" name="bayar[]" value="${c.angsuran_id}">${no++}</td>
                                    <input type="hidden" name="current[]" value="${parseInt(c.angsuran_current)+1}">
                                    <input type="hidden" name="length[]" value="${c.angsuran_length}">
                                    <input type="hidden" name="amount[]" value="${c.angsuran_amount}">
                                    <td>${c.name_ang}</td>
                                    <td>${parseInt(c.angsuran_current)+1}/${c.angsuran_length}</td>
                                    <td>${number(c.angsuran_amount)}</td>
                                    </tr>`
                                    <?php endif ?>
                                    total_cicilan += parseInt(c.angsuran_amount);
                                });
                                cicil += `<tr>
                                    <td colspan="3" style="font-weight:bold">Total Angsuran</td>
                                    <td style="font-weight:bold">${number(total_cicilan)}</td>
                                    </tr>`
                                $('#angs').html(cicil)
                                $('#total_cicilan').val(total_cicilan)
                            } else {
                                $('#cicilan').hide();
                                $('#angs').html('')
                                $('#total_cicilan').val(0)
                            }
                        }
                    });
                    <?php if (!isset($pay->pay_id)) : ?>
                        $('#pay_total_day').val(0)
                        $('#telat').val(0)
                        $('#pay_overtime').val(0)
                        $('#pay_insentive').val(0)
                        $('#pay_med_mar').val(0)
                        $('#pay_subsidi').val(10000)
                        $('#wajib').val(10000)
                        $('#pokok').val(0)
                        $('#zis').val(0)
                        $('#dll').val(0)
                        $('#bprs').val(0)
                        $('#takasi').val(0)
                        $('#pay_total_eat').val(0);
                        $('#pay_total_transport').val(0);
                    <?php endif ?>
                    inputGaji();
                }
            });
        }

        function bruto() {
            let salary = parseInt($('#salary').val()) || 0;
            let total_tetap = parseInt($('#total_tetap').val()) || 0;
            let makan = parseInt(removeNumber($('#pay_total_eat').val())) || 0;
            let transport = parseInt(removeNumber($('#pay_total_transport').val())) || 0;
            let tunj_jamsostek = parseInt($('#tunj_jamsostek').val()) || 0;
            let lembur = parseInt($('#pay_overtime').val()) || 0;
            let insentif = parseInt($('#pay_insentive').val()) || 0;
            let obat = parseInt($('#pay_med_mar').val()) || 0;
            let ptkp = parseInt($('#ptkp').val()) || 0;
            let dplk = parseInt($('#dplk').val()) || 0;
            let sub = parseInt($('#pay_subsidi').val()) || 0;
            let pokok = parseInt($('#pokok').val()) || 0;
            let wajib = parseInt($('#wajib').val()) || 0;
            let teller = parseInt($('#tunj_teller').val()) || 0;
            let pot_trans = parseInt(removeNumber($('#pot_trans').val())) || 0;
            let total_cicilan = parseInt($('#total_cicilan').val()) || 0;
            let zis = parseInt($('#zis').val()) || 0;
            let takasi = parseInt($('#takasi').val()) || 0;
            let dll = parseInt($('#dll').val()) || 0;
            let bprs = parseInt($('#bprs').val()) || 0;
            let ump = parseInt($('#ump').val()) || 0;
            let status = $('#status').val();
            let kes_status = $('#bpjs_kes_status').val();

            // hitung PPH21
            let total = salary + total_tetap + makan + transport + tunj_jamsostek + lembur + insentif + obat;
            let jab = Math.round(total * 5 / 100);
            let jamsostek = 0;
            if (status === 'TETAP') {
                jamsostek = Math.round(salary * 2 / 100);
            }
            let bpjs = 0;
            if (kes_status == '1') {
                bpjs = Math.round(salary * 1 / 100);
            }
            let biaya_jab = (jab >= 500000) ? 500000 : jab;
            let biaya_jamsostek = (jamsostek >= 200000) ? 200000 : jamsostek;
            let netto = total - bpjs - biaya_jab - biaya_jamsostek;
            let nettos = netto * 12;
            let str = nettos - ptkp;
            let res = str.toString().slice(0, -3);
            let hptkp = parseInt(res + '000');
            // let hptkp = parseInt(str/1000) * 1000;
            let pph21 = 0;
            let pph = 0;
            let tuj_tetap = salary + total_tetap - dplk;
            let tuj_variabel = makan + transport + dplk;

            if (nettos > ptkp) {
                if (hptkp <= 50000000) {
                    pph21 = hptkp * 5 / 100;
                } else if (hptkp <= 250000000) {
                    pph21 = 2500000 + (hptkp - 50000000) * 15 / 100;
                } else if (hptkp <= 500000000) {
                    pph21 = 32500000 + (hptkp - 250000000) * 25 / 100;
                } else {
                    pph21 = 95000000 + (hptkp - 500000000) * 30 / 100;
                }
                pph = Math.round(pph21 / 12);
            } else {
                pph = 0;
            }
            let tk = 0;
            let pensiun = 0;
            let pot_tk = 0;
            let pot_pensiun = 0;
            if (status === 'TETAP') {
                tk = Math.round(tuj_tetap * 4.24 / 100);
                pensiun = Math.round((tuj_tetap >= 8512400) ? 8512400 * 2 / 100 : tuj_tetap * 2 / 100);
                pot_tk = Math.round(tuj_tetap * 2 / 100);
                pot_pensiun = Math.round((tuj_tetap >= 8512400) ? 8512400 * 1 / 100 : tuj_tetap * 1 / 100);
            }
            let kesehatan = 0;
            let pot_kesehatan = 0;
            if (kes_status == '1') {
                kesehatan = Math.round((tuj_tetap >= 8000000) ? 8000000 * 4 / 100 : ((tuj_tetap <= ump) ? ump * 4 / 100 : tuj_tetap * 4 / 100));
                pot_kesehatan = Math.round((tuj_tetap >= 8000000) ? 8000000 * 1 / 100 : ((tuj_tetap <= ump) ? ump * 1 / 100 : tuj_tetap * 1 / 100));
            }
            let tuj_lain = tk + pensiun + kesehatan + pph + sub;
            let gross = Math.round(tuj_tetap + tuj_variabel + tuj_lain);
            let nett = gross - ((tk + pot_tk) + (pensiun + pot_pensiun) + (kesehatan + pot_kesehatan) + pph + dplk + teller + sub + pokok + wajib + pot_trans);
            let thp = nett - (total_cicilan + zis + takasi + dll) + (obat + insentif + lembur);

            $('#gross').val(number(gross + obat + insentif + lembur));
            $('#tujab').val(biaya_jab);
            $('#jamsos').val(biaya_jamsostek);
            $('#bpjs').val(bpjs);
            $('#netto').val(netto);
            $('#nettos').val(nettos);
            $('#hptkp').val(hptkp);
            $('#pph21').val(number(pph));
            $('#tk').val(number(tk));
            $('#pensiun').val(number(pensiun));
            $('#kesehatan').val(number(kesehatan));
            $('#tujab_variabel').val(tuj_variabel);
            $('#thp').val(number(thp));
            $('#bsm').val(number(thp + sub - bprs));
            $('#pot_tk').val(number(pot_tk));
            $('#pot_pensiun').val(number(pot_pensiun));
            $('#pot_kesehatan').val(number(pot_kesehatan));
        }

        function number(x) {
            return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        }

        function removeNumber(x) {
            return x.replace(/,/g, '');
        }

    });
</script>