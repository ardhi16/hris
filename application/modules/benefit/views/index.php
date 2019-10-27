<div class="container-fluid">
    <div class="card-box">
        <a href="<?php echo site_url('benefit/add') ?>" class="btn btn-primary btn-xs mb-2"><i class="fa fa-plus"></i> Tambah</a>
        <div class="table-responsive">
            <table class="table table-hover mb-0 dataTable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NIK</th>
                        <th>Nama Karyawan</th>
                        <th>Total Tunj. Tetap</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $i = 1;
                        foreach ($benefit as $row) :
                            ?>
                            <tr>
                                <td><?php echo $i++; ?></td>
                                <td><?php echo $row->employee_nik ?></td>
                                <td><?php echo $row->employee_name ?></td>
                                <td><?php echo number_format($row->total_tetap) ?></td>
                                <td>
                                    <a href="<?php echo site_url('benefit/edit/' . $row->benefit_id) ?>" class="btn btn-success btn-xs"><i class="fa fa-edit"></i> Edit</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>