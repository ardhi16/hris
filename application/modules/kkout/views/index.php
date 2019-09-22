<div class="container-fluid">
    <div class="card-box">
        <a href="<?php echo site_url('kkout/add') ?>" class="btn btn-primary btn-xs mb-2"><i class="fa fa-plus"></i> Tambah</a>
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nomor SK</th>
                        <th>Nama Karyawan</th>
                        <th>Jenis Out</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (!empty($kkout)) {
                        $i = $jlhpage + 1;
                        foreach ($kkout as $row) :
                            ?>
                            <tr>
                                <td><?php echo $i++; ?></td>
                                <td><?php echo $row->kkout_no ?></td>
                                <td><?php echo $row->employee_name ?></td>
                                <td><?php echo ($row->kkout_type == 0) ? 'Habis Kontrak' : (($row->kkout_type == 1) ? 'Baik' : 'Meninggal Dunia') ?></td>
                                <td>
                                <a href="<?php echo site_url('kkout/print/'.$row->kkout_id) ?>" target="_blank" class="btn btn-success btn-xs"><i class="fa fa-print"></i> Cetak</a>
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