<div class="container-fluid">
    <div class="card-box">
        <form action="" method="post">
            <div class="row">
                <div class="col-md-10">
                    <div class="form-group">
                        <input type="hidden" name="salary" id="salary">
                        <input type="hidden" name="total_tetap" id="total_tetap">
                        <input type="hidden" name="tujab_variabel" id="tujab_variabel">
                        <input type="hidden" name="tunj_teller" id="tunj_teller">
                        <label for="">Karyawan</label>
                        <select name="employee_id" id="employee_id" class="form-control select2" required>
                            <option value="">-- Pilih Karyawan --</option>
                            <?php foreach ($employee as $row) : ?>
                                <option value="<?php echo $row->employee_id ?>"><?php echo $row->employee_nik ?> - <?php echo $row->employee_name ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="row">
                        <div class="col" id="income">
                            <h5>Pendapatan</h5>
                            <hr>
                            <div class="form-group">
                                <label for="">Jumlah Hari Masuk</label>
                                <input type="text" class="form-control" name="pay_total_day" id="pay_total_day">
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="">Lembur</label>
                                        <input type="text" class="form-control" id="pay_overtime" name="pay_overtime" value="0">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="">Insentif</label>
                                        <input type="text" class="form-control" name="pay_insentive" id="pay_insentive" value="0">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="">Obat/Tunj. Nikah</label>
                                        <input type="text" class="form-control" id="pay_med_mar" name="pay_med_mar" value="0">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="">Subs. Adm</label>
                                        <input type="text" class="form-control" name="pay_subsidi" id="pay_subsidi" value="10000">
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
                            <div class="row" style="display:none">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="">DPLK</label>
                                        <input type="text" class="form-control" id="dplk" value="0" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="display:none">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="">Tunj. Jamsostek</label>
                                        <input type="text" class="form-control" id="tunj_jamsostek" value="0" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group" style="display:none">
                                <label for="">Penghasilan Bruto</label>
                                <input type="text" class="form-control" name="bruto" id="bruto" value="0" readonly>
                            </div>
                            <div class="row" style="display:none">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="">Biaya Jabatan</label>
                                        <input type="text" class="form-control" id="tujab" name="tujab" value="0" readonly>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="">Jamsostek</label>
                                        <input type="text" class="form-control" name="jamsos" id="jamsos" value="0" readonly>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="">BPJS</label>
                                        <input type="text" class="form-control" name="bpjs" id="bpjs" value="0" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="display:none">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="">Netto</label>
                                        <input type="text" class="form-control" id="netto" name="netto" value="0" readonly>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="">Netto Setahun</label>
                                        <input type="text" class="form-control" name="nettos" id="nettos" value="0" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="display:none">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="">PTKP</label>
                                        <input type="text" class="form-control" id="ptkp" name="ptkp" value="0" readonly>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="">Hasil PTKP</label>
                                        <input type="text" class="form-control" name="hptkp" id="hptkp" value="0" readonly>
                                    </div>
                                </div>
                            </div>
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
                                <input type="text" class="form-control" name="telat" id="telat">
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="">Simpanan Pokok</label>
                                        <input type="text" class="form-control" name="pokok" id="pokok" value="0">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="">Simpanan Wajib</label>
                                        <input type="text" class="form-control" name="wajib" id="wajib" value="10000">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="">ZIS</label>
                                        <input type="text" class="form-control" name="zis" id="zis" value="0">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="">Tabungan Takasi</label>
                                        <input type="text" class="form-control" name="takasi" id="takasi" value="0">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="">Lain-lain</label>
                                        <input type="text" class="form-control" name="dll" id="dll" value="0">
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="form-group">
                                <label for="">Masuk Rekening BPRS</label>
                                <input type="text" class="form-control" name="bprs" id="bprs" value="0">
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
                                        <label for="">Pot. BPJS Kesehatan</label>
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
                                <input type="hidden" name="total_cicilan" id="total_cicilan">
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
                    <button type="submit" class="btn btn-success btn-block mt-3">Simpan</button>
                    <a class="btn btn-secondary btn-block" href="<?php echo site_url('benefit') ?>">Batal</a>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    $(document).ready(function() {

        $(".select2").change(function() {
            var employee_id = $(this).val();
            $.ajax({
                type: "POST",
                dataType: "json",
                url: "<?php echo site_url('api/getBenefit') ?>",
                data: "employee_id=" + employee_id,
                success: function(res) {
                    if (res.status) {
                        $('#salary').val(res.result.employee_salary)
                        $('#total_tetap').val(res.result.total_tetap)
                        $('#makan').val(res.result.makan)
                        $('#transport').val(res.result.transport)
                        $('#dplk').val(res.result.dplk)
                        $('#tunj_jamsostek').val(res.result.tunj_jamsostek)
                        $('#tunj_teller').val(res.result.teller)
                    } else {
                        $('#salary').val(0)
                        $('#total_tetap').val(0)
                        $('#makan').val(0)
                        $('#transport').val(0)
                        $('#dplk').val(0)
                        $('#tunj_jamsostek').val(0)
                        $('#tunj_teller').val(0)
                    }
                    $.ajax({
                        type: "POST",
                        dataType: "json",
                        url: "<?php echo site_url('api/ptkp') ?>",
                        data: "code=" + res.result.tax_status,
                        success: function(response) {
                            $('#ptkp').val(response.value);
                        }
                    });

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
                                    cicil += `<tr>
                                    <td><input type="hidden" name="bayar[]" value="${c.angsuran_id}">${no++}</td>
                                    <td>${c.name_ang}</td>
                                    <td>${parseInt(c.angsuran_current)+1}/${c.angsuran_length}</td>
                                    <td>${number(c.angsuran_amount)}</td>
                                    </tr>`
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
                            }
                        }
                    });
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
                    bruto();
                    potong();
                }
            });
        });

        $('#income').on('input', function() {
            var day = $('#pay_total_day').val() || 0;
            var makan = parseInt($('#makan').val());
            var transport = parseInt($('#transport').val());
            $('#pay_total_eat').val(day * makan);
            $('#pay_total_transport').val(day * transport);
            bruto();
        });

        $('#potongan').on('input', function() {
            let total_telat = $('#telat').val() || 0;
            let trans = parseInt($('#transport').val());
            $('#pot_trans').val((trans / 2) * total_telat);
            potong();
            bruto();
        });

        function potong() {
            let salary = parseInt($('#salary').val()) || 0;
            let total_tetap = parseInt($('#total_tetap').val()) || 0;
            let dplk = parseInt($('#dplk').val()) || 0;
            let tuj_tetap = salary + total_tetap - dplk;
            let pot_tk = tuj_tetap * 2 / 100;
            let pot_pensiun = (tuj_tetap >= 8512400) ? 8512400 * 1 / 100 : tuj_tetap * 1 / 100;
            let pot_kesehatan = (tuj_tetap >= 8000000) ? 8000000 * 1 / 100 : tuj_tetap * 1 / 100;
            $('#pot_tk').val(pot_tk);
            $('#pot_pensiun').val(pot_pensiun);
            $('#pot_kesehatan').val(pot_kesehatan);

        }

        function bruto() {
            let salary = parseInt($('#salary').val()) || 0;
            let total_tetap = parseInt($('#total_tetap').val()) || 0;
            let makan = parseInt($('#pay_total_eat').val()) || 0;
            let transport = parseInt($('#pay_total_transport').val()) || 0;
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
            let pot_trans = parseInt($('#pot_trans').val()) || 0;
            let total_cicilan = parseInt($('#total_cicilan').val()) || 0;
            let zis = parseInt($('#zis').val()) || 0;
            let takasi = parseInt($('#takasi').val()) || 0;
            let dll = parseInt($('#dll').val()) || 0;
            let bprs = parseInt($('#bprs').val()) || 0;

            let total = salary + total_tetap + makan + transport + tunj_jamsostek + lembur + insentif + obat;
            let jab = total * 5 / 100;
            let jamsostek = total * 2 / 100;
            let bpjs = salary * 1 / 100;
            let biaya_jab = (jab >= 500000) ? 500000 : jab;
            let biaya_jamsostek = (jamsostek >= 200000) ? 200000 : jamsostek;
            let netto = total - bpjs - biaya_jab - biaya_jamsostek;
            let nettos = netto * 12;
            let str = nettos - ptkp;
            let res = str.toString().slice(0, -3);
            let hptkp = parseInt(res + '000');
            let pph21 = 0;
            let tuj_tetap = salary + total_tetap - dplk;
            let tuj_variabel = makan + transport + dplk;

            if (hptkp <= 50000000) {
                pph21 = hptkp * 5 / 100;
            } else if (hptkp <= 250000000) {
                pph21 = 2500000 + (hptkp - 50000000) * 15 / 100;
            } else if (hptkp <= 500000000) {
                pph21 = 32500000 + (hptkp - 250000000) * 25 / 100;
            } else {
                pph21 = 95000000 + (hptkp - 500000000) * 30 / 100;
            }
            let pph = Math.round(pph21 / 12);

            let tk = tuj_tetap * 4.24 / 100;
            let pensiun = (tuj_tetap >= 8512400) ? 8512400 * 2 / 100 : tuj_tetap * 2 / 100;
            let kesehatan = (tuj_tetap >= 8000000) ? 8000000 * 4 / 100 : tuj_tetap * 4 / 100;
            let pot_tk = tuj_tetap * 2 / 100;
            let pot_pensiun = (tuj_tetap >= 8512400) ? 8512400 * 1 / 100 : tuj_tetap * 1 / 100;
            let pot_kesehatan = (tuj_tetap >= 8000000) ? 8000000 * 1 / 100 : tuj_tetap * 1 / 100;

            let tuj_lain = tk + pensiun + kesehatan + pph + sub;
            let gross = tuj_tetap + tuj_variabel + tuj_lain;
            let nett = gross - ((tk + pot_tk) + (pensiun + pot_pensiun) + (kesehatan + pot_kesehatan) + pph + dplk + teller + sub + pokok + wajib + pot_trans);
            let thp = nett - (total_cicilan + zis + takasi + dll) + (obat + insentif + lembur);


            $('#gross').val(gross + obat + insentif + lembur);
            $('#tujab').val(biaya_jab);
            $('#jamsos').val(biaya_jamsostek);
            $('#bpjs').val(bpjs);
            $('#netto').val(netto);
            $('#nettos').val(nettos);
            $('#hptkp').val(hptkp);
            $('#pph21').val(pph);
            $('#tk').val(tk);
            $('#pensiun').val(pensiun);
            $('#kesehatan').val(kesehatan);
            $('#tujab_variabel').val(tuj_variabel);
            $('#thp').val(thp);
            $('#bsm').val(thp + sub - bprs);

        }

        function number(x) {
            return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        }

    });
</script>