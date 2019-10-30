<div class="container-fluid">
    <div class="card-box">
        <a href="<?php echo site_url('pay/add') ?>" class="btn btn-primary btn-xs mb-2"><i class="fa fa-plus"></i> Tambah</a>
        <a href="#collapseExample" role="button" data-toggle="collapse" aria-expanded="false" aria-controls="collapseExample" class="btn btn-warning btn-sm float-right"><i class="fa fa-filter"></i> Filter</a>
        <div class="collapse <?php echo ($q == null) ? '' : 'show' ?>" id="collapseExample">
            <?php echo form_open(current_url(), array('method' => 'get')) ?>
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <input class="form-control months" type="text" name="month" <?php echo (isset($q['month'])) ? 'value="' . $q['month'] . '"' : '' ?> placeholder="Bulan" autocomplete="off" required readonly>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <input class="form-control years" type="text" name="year" <?php echo (isset($q['year'])) ? 'value="' . $q['year'] . '"' : '' ?> placeholder="Tahun" autocomplete="off" required readonly>
                    </div>
                </div>
                <div class="col-md-3">
                    <button type="submit" class="btn btn-success btn-sm">Submit</button>
                </div>
            </div>
            <?php echo form_close(); ?>
        </div>
        <div class="table-responsive">
            <table class="table table-hover mb-0 dataTable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NIK</th>
                        <th>Nama Karyawan</th>
                        <th>Periode Gaji</th>
                        <th>Status Kirim</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    foreach ($pay as $row) :
                        ?>
                        <tr>
                            <td><?php echo $i++; ?></td>
                            <td><?php echo $row->employee_nik ?></td>
                            <td><?php echo $row->employee_name ?></td>
                            <td><?php echo date('F Y', strtotime("$row->pay_period_year-$row->pay_period_month-01")) ?></td>
                            <td><?php echo ($row->pay_send) ? 'Terkirim' : 'Belum'; ?></td>
                            <td width="200px">
                                <a href="<?php echo site_url('pay/edit/' . $row->pay_id) ?>" class="btn btn-success btn-xs"><i class="fa fa-edit"></i> Edit</a>
                                <a href="<?php echo site_url('pay/preview/' . $row->pay_id) ?>" target="_blank" class="btn btn-info btn-xs"><i class="fa fa-print"></i> Cetak</a>
                                <a href="<?php echo site_url('pay/send/' . $row->pay_id) ?>" class="btn btn-danger btn-xs"><i class="fa fa-envelope"></i> Kirim</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>