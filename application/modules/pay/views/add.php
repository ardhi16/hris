<div class="container-fluid">
    <div class="card-box">
        <form action="" method="post">
            <div class="row">
                <div class="col-md-10">
                    <div class="form-group">
                        <label for="">Karyawan</label>
                        <select name="employee_id" id="employee_id" class="form-control select2" required>
                            <option value="">-- Pilih Karyawan --</option>
                            <?php foreach ($employee as $row) : ?>
                                <option value="<?php echo $row->employee_id ?>"><?php echo $row->employee_nik ?> - <?php echo $row->employee_name ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="row">
                        <div class="col">
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
                                        <input type="text" class="form-control" name="pay_total_eat" id="pay_total_eat" value="0">
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
                                        <input type="text" class="form-control" name="pay_total_transport" id="pay_total_transport" value="0">
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
                            <div class="form-group">
                                <label for="">Tunjangan PPh 21</label>
                                <input type="text" class="form-control" name="pph21" id="pph21" value="0">
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
                        $('#makan').val(res.result.makan)
                        $('#transport').val(res.result.transport)
                    } else {
                        $('#makan').val(0)
                        $('#transport').val(0)
                    }
                }
            });
        });

        $('#pay_total_day').on('input', function() {
            var day = this.value || 0;
            var makan = parseInt($('#makan').val());
            var transport = parseInt($('#transport').val());
            $('#pay_total_eat').val(day * makan);
            $('#pay_total_transport').val(day * transport);
        });

    });
</script>