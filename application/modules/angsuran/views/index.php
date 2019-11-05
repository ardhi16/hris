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
                        <th>Total Angsuran</th>
                        <th>Per Bulan</th>
                        <th>Opsi</th>
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
                            <td><?php echo number_format($row->angsuran_total); ?></td>
                            <td><?php echo number_format($row->angsuran_amount); ?></td>
                            <td>
                                <a href="#" data-toggle="modal" data-target="#edit" class="badge badge-success edit" data-id="<?php echo $row->angsuran_id ?>" data-angs="<?php echo $row->angsuran_current ?>">Edit</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div id="edit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="titleModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="titleModal">Edit <?php echo $title ?></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <form id="form" action="" method="post">
                <div class="modal-body">
                    <input type="hidden" name="angsuran_id" id="id">
                    <div class="form-group">
                        <label for="">Angsuran Ke</label>
                        <input type="number" name="angsuran_ke" class="form-control" id="angsuran_ke" required="">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success waves-effect waves-light">Ubah</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $(function() {

        $('.edit').on('click', function() {
            var id = $(this).data('id');
            var angs = $(this).data('angs');
            $('#id').val(id);
            $('#angsuran_ke').val(angs);
        })


    });
</script>