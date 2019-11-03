<div class="container-fluid">
    <div class="card-box">
        <button type="button" class="btn btn-primary btn-xs mb-2 btnAdd" data-toggle="modal" data-target="#add"><i class="fa fa-plus"></i> Tambah</button>
        <a href="#collapseExample" role="button" data-toggle="collapse" aria-expanded="false" aria-controls="collapseExample" class="btn btn-warning btn-sm float-right"><i class="fa fa-filter"></i> Filter</a>
        <div class="collapse <?php echo ($q == null) ? '' : 'show' ?>" id="collapseExample">
            <?php echo form_open(current_url(), array('method' => 'get')) ?>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <input class="form-control years" type="text" name="period" <?php echo (isset($q['period'])) ? 'value="' . $q['period'] . '"' : '' ?> placeholder="Tahun" autocomplete="off" required readonly>
                    </div>
                </div>
                <div class="col-md-6">
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
                        <th>Periode Cuti</th>
                        <th>Sisa Cuti</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    foreach ($sisa as $row) :
                        ?>
                        <tr>
                            <td><?php echo $i++; ?></td>
                            <td><?php echo $row->employee_nik ?></td>
                            <td><?php echo $row->employee_name ?></td>
                            <td><?php echo $row->period ?></td>
                            <td><?php echo $row->remain ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div id="add" class="modal fade" role="dialog" aria-labelledby="titleModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="titleModal">Tambah <?php echo $title ?></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <form id="form" action="" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Nama Karyawan</label>
                        <select name="employee_id" id="employee_id" class="form-control select2">
                            <?php foreach ($employee as $key) : ?>
                                <option value="<?php echo $key->employee_id ?>"><?php echo $key->employee_name ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Periode</label>
                        <input type="text" class="form-control years" name="period" readonly>
                    </div>
                    <div class="form-group">
                        <label for="">Total Cuti</label>
                        <input type="number" class="form-control" name="remain">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success waves-effect waves-light">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>