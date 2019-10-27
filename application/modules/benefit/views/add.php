<?php

if (isset($benefit)) {
    $employee_id = $benefit->employee_id;
    $statis = $benefit->statis;
    $dinamis = $benefit->dinamis;
    $struktural = $benefit->struktural;
    $rumah = $benefit->rumah;
    $kemahalan = $benefit->kemahalan;
    $kinerja = $benefit->kinerja;
    $family = $benefit->family;
    $produktif = $benefit->produktif;
    $teller = $benefit->teller;
    $beban = $benefit->beban;
    $masa_kerja = $benefit->masa_kerja;
    $makan = $benefit->makan;
    $transport = $benefit->transport;
    $dplk = $benefit->dplk;
    $total_tetap = $benefit->total_tetap;
} else {
    $employee_id = set_value('employee_id');
    $statis = 0;
    $dinamis = 0;
    $struktural = 0;
    $kinerja = 0;
    $rumah = 0;
    $kemahalan = 0;
    $family = 0;
    $produktif = 0;
    $teller = 0;
    $beban = 0;
    $masa_kerja = 0;
    $makan = 0;
    $transport = 0;
    $dplk = 0;
    $total_tetap = 0;
}

?>

<div class="container-fluid">
    <div class="card-box">
        <form action="" method="post">
            <div class="row">
                <div class="col-md-9">
                    <?php if (!isset($benefit->benefit_id)) : ?>
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
                            <input type="text" class="form-control" value="<?php echo $benefit->employee_nik ?> - <?php echo $benefit->employee_name ?>" readonly>
                        </div>
                    <?php endif ?>
                    <br>
                    <div class="tunj">
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="">Tunjangan Statis</label>
                                    <input type="text" class="form-control " id="statis" name="statis" value="<?php echo $statis ?>">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="">Tunjangan Dinamis</label>
                                    <input type="text" class="form-control " id="dinamis" name="dinamis" value="<?php echo $dinamis ?>">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="">Tunjangan Struktural</label>
                                    <input type="text" class="form-control " id="struktural" name="struktural" value="<?php echo $struktural ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="">Tunjangan Perumahan</label>
                                    <input type="text" class="form-control " id="rumah" name="rumah" value="<?php echo $rumah ?>">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="">Tunjangan Kemahalan</label>
                                    <input type="text" class="form-control " id="kemahalan" name="kemahalan" value="<?php echo $kemahalan ?>">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="">Tunjangan Keluarga</label>
                                    <input type="text" class="form-control " id="family" name="family" value="<?php echo $family ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="">Tunjangan Kinerja</label>
                                    <input type="text" class="form-control " id="kinerja" name="kinerja" value="<?php echo $kinerja ?>">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="">Tunjangan Produktifitas</label>
                                    <input type="text" class="form-control " id="produktif" name="produktif" value="<?php echo $produktif ?>">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="">Tunjangan Selisih Teller</label>
                                    <input type="text" class="form-control " id="teller" name="teller" value="<?php echo $teller ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="">Tunjangan Beban</label>
                                    <input type="text" class="form-control " id="beban" name="beban" value="<?php echo $beban ?>">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="">Tunjangan Masa Kerja</label>
                                    <input type="text" class="form-control " id="masa_kerja" name="masa_kerja" value="<?php echo $masa_kerja ?>">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="">Tunjangan DPLK</label>
                                    <input type="text" class="form-control " id="dplk" name="dplk" value="<?php echo $dplk ?>">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="">Tunjangan Makan</label>
                                <input type="text" class="form-control " id="makan" name="makan" value="<?php echo $makan ?>">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="">Tunjangan Transportasi</label>
                                <input type="text" class="form-control " id="transport" name="transport" value="<?php echo $transport ?>">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Total Tunjangan Tetap</label>
                        <input type="text" class="form-control " id="total" value="<?php echo $total_tetap ?>" readonly>
                    </div>
                </div>
                <div class="col-md-3">
                    <button type="submit" class="btn btn-success btn-block mt-3">Simpan</button>
                    <a class="btn btn-secondary btn-block" href="<?php echo site_url('benefit') ?>">Batal</a>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    $(document).ready(function() {

        $('.tunj').on('input', function() {
            gTotal();
        });

        function gTotal() {
            let statis = parseInt($('#statis').val()) || 0;
            let dinamis = parseInt($('#dinamis').val()) || 0;
            let struktural = parseInt($('#struktural').val()) || 0;
            let rumah = parseInt($('#rumah').val()) || 0;
            let kemahalan = parseInt($('#kemahalan').val()) || 0;
            let family = parseInt($('#family').val()) || 0;
            let kinerja = parseInt($('#kinerja').val()) || 0;
            let produktif = parseInt($('#produktif').val()) || 0;
            let teller = parseInt($('#teller').val()) || 0;
            let beban = parseInt($('#beban').val()) || 0;
            let masa_kerja = parseInt($('#masa_kerja').val()) || 0;
            let dplk = parseInt($('#dplk').val()) || 0;
            let grandTotal = statis + dinamis + struktural + rumah + kemahalan + family + kinerja + produktif + teller + beban + masa_kerja + dplk;
            $('#total').val(number(grandTotal));
        }

        function number(x) {
            return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        }

    });
</script>