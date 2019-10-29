<div class="container-fluid">
    <div class="card-box">
        <a href="<?php echo site_url('angsuran/add') ?>" class="btn btn-primary btn-xs mb-2"><i class="fa fa-plus"></i> Tambah</a>
        <div class="table-responsive">
            <table class="table table-hover mb-0 dataTable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NIK</th>
                        <th>Nama Karyawan</th>
                        <th>Tipe Angsuran</th>
                        <th>Angsuran Ke</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    foreach ($angsuran as $row) :
                        ?>
                        <tr>
                            <td><?php echo $i++; ?></td>
                            <td><?php echo $row->employee_nik ?></td>
                            <td><?php echo $row->employee_name ?></td>
                            <td><?php echo $row->name_ang ?></td>
                            <td><?php echo $row->angsuran_current . '/' . $row->angsuran_length ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>