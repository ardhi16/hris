<div class="container-fluid">
    <div class="card-box">
        <form action="" method="post">
            <div class="row">
                <div class="col-md-9">
                    <div class="form-group">
                        <label for="">Karyawan</label>
                        <select name="employee_id" id="employee_id" class="form-control select2" required>
                            <option value="">-- Pilih Karyawan --</option>
                            <?php foreach ($employee as $row) : ?>
                                <option value="<?php echo $row->employee_id ?>"><?php echo $row->employee_nik ?> - <?php echo $row->employee_name ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="">Jenis Angsuran</label>
                        <select name="type_id" id="type_id" class="form-control" required>
                            <option value="">-- Pilih Jenis --</option>
                            <?php foreach ($tipe as $row) : ?>
                                <option value="<?php echo $row->id ?>"><?php echo $row->name_ang ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="cicilan">
                        <div class="form-group">
                            <label for="">Total Pinjaman</label>
                            <input type="text" id="angsuran_total" name="angsuran_total" class="form-control rupiah" autocomplete="off" value="0">
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="">Lama Pinjaman (Bulan)</label>
                                    <input type="text" id="angsuran_length" name="angsuran_length" class="form-control" autocomplete="off" value="1">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="">Angsuran Per Bulan</label>
                                    <input type="text" id="angsuran_amount" name="angsuran_amount" class="form-control" value="0" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <button type="submit" class="btn btn-success btn-block mt-3">Simpan</button>
                    <a class="btn btn-secondary btn-block" href="<?php echo site_url('angsuran') ?>">Batal</a>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    $(document).ready(function() {

        $('.cicilan').on('input', function() {
            gTotal();
        });

        function gTotal() {
            let angsuran_total = parseInt(removeNumber($('#angsuran_total').val())) || 0;
            let angsuran_length = parseInt($('#angsuran_length').val()) || 0;
            let grandTotal = Math.round(angsuran_total / angsuran_length);
            $('#angsuran_amount').val(number(grandTotal) || 0);
        }

        function number(x) {
            return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        }

        function removeNumber(x) {
            return x.replace(/,/g, '');
        }

    });
</script>