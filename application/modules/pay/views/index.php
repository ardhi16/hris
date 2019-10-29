<div class="container-fluid">
    <div class="card-box">
        <a href="<?php echo site_url('pay/add') ?>" class="btn btn-primary btn-xs mb-2"><i class="fa fa-plus"></i> Tambah</a>
        <div class="table-responsive">
            <table class="table table-hover mb-0 dataTable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NIK</th>
                        <th>Nama Karyawan</th>
                        <th>Periode Gaji</th>
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
                            <td>
                                <a href="<?php echo site_url('pay/edit/' . $row->pay_id) ?>" class="btn btn-success btn-xs"><i class="fa fa-edit"></i> Edit</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>