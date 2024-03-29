<div class="container-fluid">
    <div class="card-box">
        <a href="<?php echo site_url('sk/add') ?>" class="btn btn-primary btn-xs mb-2"><i class="fa fa-plus"></i> Tambah</a>
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nomor SK</th>
                        <th>Nama Karyawan</th>
                        <th>Jenis SK</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (!empty($sk)) {
                        $i = $jlhpage + 1;
                        foreach ($sk as $row) :
                            ?>
                            <tr>
                                <td><?php echo $i++; ?></td>
                                <td><?php echo $row->sk_no ?></td>
                                <td><?php echo $row->employee_name ?></td>
                                <td><?php echo $row->sk_type ?></td>
                                <td>
                                <a href="<?php echo site_url('sk/print/'.$row->sk_id) ?>" target="_blank" class="btn btn-success btn-xs"><i class="fa fa-print"></i> Cetak SK</a>
                                </td>
                            </tr>
                        <?php endforeach;
                        } else {
                            ?>
                        <tr id="row">
                            <td colspan="5" align="center">Data Kosong</td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <?php echo $this->pagination->create_links(); ?>
    </div>
</div>