<div class="container-fluid">
    <div class="card-box">
        <a href="<?php echo site_url('cuti/add') ?>" class="btn btn-primary btn-xs mb-2"><i class="fa fa-plus"></i> Tambah</a>
        </h4>

        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Karyawan</th>
                        <th>Tanggal Mulai</th>
                        <th>Tanggal Akhir</th>
                        <th>Total Cuti</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (!empty($cuti)) {
                        $i = $jlhpage + 1;
                        foreach ($cuti as $row) :
                            ?>
                            <tr>
                                <td><?php echo $i++; ?></td>
                                <td><?php echo $row->employee_name ?></td>
                                <td><?php echo pretty_date($row->cuti_start, 'd F Y', false) ?></td>
                                <td><?php echo pretty_date($row->cuti_end, 'd F Y', false) ?></td>
                                <td><?php echo $row->cuti_total ?></td>
                                <td>
                                    <a href="#" class="btn btn-info btn-xs btnDetil mb-1" data-toggle="modal" data-target="#detail" data-id="<?php echo $row->cuti_id ?>"><i class="fas fa-eye"></i> Detail</a>
                                </td>
                            </tr>
                        <?php endforeach;
                        } else {
                            ?>
                        <tr id="row">
                            <td colspan="6" align="center">Data Kosong</td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <?php echo $this->pagination->create_links(); ?>
    </div>
</div>