<div class="container-fluid">
    <div class="card-box">
        <a href="<?php echo site_url('sp/add') ?>" class="btn btn-primary btn-xs mb-2"><i class="fa fa-plus"></i> Tambah</a>
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nomor SP</th>
                        <th>Nama Karyawan</th>
                        <th>Jenis SP</th>
                        <th>Tanggal Efektif</th>
                        <th>Tanggal Selesai</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (!empty($sp)) {
                        $i = $jlhpage + 1;
                        foreach ($sp as $row) :
                            ?>
                            <tr>
                                <td><?php echo $i++; ?></td>
                                <td><?php echo $row->sp_no ?></td>
                                <td><?php echo $row->employee_name ?></td>
                                <td>SP <?php echo $row->sp_type ?></td>
                                <td><?php echo pretty_date($row->sp_date_start, 'd F Y', false) ?></td>
                                <td><?php echo pretty_date($row->sp_date_end, 'd F Y', false) ?></td>
                                <td>
                                    <a href="<?php echo site_url('sp/print/' . $row->sp_id) ?>" target="_blank" class="btn btn-success btn-xs"><i class="fa fa-print"></i> Cetak</a>
                                </td>
                            </tr>
                        <?php endforeach;
                        } else {
                            ?>
                        <tr id="row">
                            <td colspan="4" align="center">Data Kosong</td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <?php echo $this->pagination->create_links(); ?>
    </div>
</div>