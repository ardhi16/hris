<div class="container-fluid">
    <div class="card-box">
        <form action="" method="post">
            <div class="row">
                <div class="col-md-10">
                    <div class="form-group">
                        <input type="hidden" name="salary" id="salary">
                        <input type="hidden" name="total_tetap" id="total_tetap">
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
                                <div class="col">
                                    <div class="form-group">
                                        <label for="">DPLK</label>
                                        <input type="text" class="form-control" id="dplk" value="0" readonly>
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
                                <div class="col">
                                    <div class="form-group">
                                        <label for="">Tunj. Jamsostek</label>
                                        <input type="text" class="form-control" id="tunj_jamsostek" value="0" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="">Penghasilan Bruto</label>
                                <input type="text" class="form-control" name="bruto" id="bruto" value="0" readonly>
                            </div>
                            <div class="row">
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
                            <div class="row">
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
                            <div class="row">
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
                            <div class="form-group">
                                <label for="">Tunjangan PPh 21</label>
                                <input type="text" class="form-control" name="pph21" id="pph21" value="0" readonly>
                            </div>
                        </div>
                        <div class="col">
                            <h5>Potongan</h5>
                            <hr>
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
                    } else {
                        $('#salary').val(0)
                        $('#total_tetap').val(0)
                        $('#makan').val(0)
                        $('#transport').val(0)
                        $('#dplk').val(0)
                        $('#tunj_jamsostek').val(0)
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

            if (hptkp <= 50000000) {
                pph21 = hptkp * 5 / 100;
            } else if (hptkp <= 250000000) {
                pph21 = 2500000 + (hptkp - 50000000) * 15 / 100;
            } else if (hptkp <= 500000000) {
                pph21 = 32500000 + (hptkp - 250000000) * 25 / 100;
            } else {
                pph21 = 95000000 + (hptkp - 500000000) * 30 / 100;
            }

            $('#bruto').val(total);
            $('#tujab').val(biaya_jab);
            $('#jamsos').val(biaya_jamsostek);
            $('#bpjs').val(bpjs);
            $('#netto').val(netto);
            $('#nettos').val(nettos);
            $('#hptkp').val(hptkp);
            $('#pph21').val(Math.round(pph21 / 12));
        }

        function number(x) {
            return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        }

    });
</script>