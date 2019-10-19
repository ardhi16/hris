<div class="container-fluid">
    <div class="card-box">
        <form action="" method="post">
            <input type="hidden" name="employee_id" id="employee_id">
            <div class="row">
                <div class="col-md-9">
                    <?php echo validation_errors(); ?>
                    <div class="form-group">
                        <label for="">NIK</label>
                        <input type="text" class="form-control" placeholder="Masukan NIK Karyawan" id="employee_nik" autofocus="" autocomplete="off">
                        <button type="button" class="btn btn-xs btn-warning mt-1" data-toggle="modal" data-target="#listKaryawan">Daftar Karyawan</button>
                    </div>
                    <div class="form-group">
                        <label for="">Nama</label>
                        <input type="text" id="name" class="form-control" readonly="">
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="">Jabatan</label>
                                <input type="text" id="position" class="form-control" readonly="">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="">Grade</label>
                                <input type="text" id="grade" class="form-control" readonly="">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="">KAS</label>
                                <input type="text" id="kas" class="form-control" readonly="">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="">Divisi</label>
                                <input type="text" id="division" class="form-control" readonly="">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Jenis SK <span class="text-danger">*</span></label>
                        <select id="sk_type" name="sk_type" class="form-control sk_type">
                            <option value="">--- Pilih Jenis SK ---</option>
                            <?php foreach ($type as $row) : ?>
                                <option value="<?php echo $row ?>"><?php echo $row ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="row memo" style="display:none">
                        <div class="col">
                            <div class="form-group">
                                <label for="">No Memo</label>
                                <input type="text" name="sk_memo" id="memoNo" class="form-control">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="">Tanggal Memo</label>
                                <input type="text" name="sk_memo_date" id="memoDate" class="form-control datepicker" readonly="" autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="">KAS Tujuan</label>
                                <select name="sk_store_id" id="sk_store_id" class="form-control select2">
                                    <option value="">--- Pilih Kas Tujuan ---</option>
                                    <?php foreach ($kas as $row) : ?>
                                        <option value="<?php echo $row->store_id ?>"><?php echo $row->store_name ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="">Jabatan Tujuan</label>
                                <select name="sk_position_id" id="sk_position_id" class="form-control select2">
                                    <option value="">--- Pilih Jabatan Tujuan ---</option>
                                    <?php foreach ($position as $row) : ?>
                                        <option value="<?php echo $row->position_id ?>"><?php echo $row->position_name ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Tanggal Efektif</label>
                        <input type="text" name="sk_efective_date" id="memoDate" class="form-control datepicker" readonly="" autocomplete="off">
                    </div>
                </div>
                <div class="col-md-3">
                    <button type="submit" class="btn btn-success btn-block mt-3">Simpan</button>
                    <a class="btn btn-secondary btn-block" href="<?php echo site_url('sk') ?>">Batal</a>
                </div>
            </div>
        </form>
    </div>
</div>

<div id="listKaryawan" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="titleModal" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="titleModal">Daftar Karyawan</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <form class="mb-2" onsubmit="event.preventDefault()" method="post">
                    <div class="input-group">
                        <input type="text" autocomplete="off" id="search-input" class="form-control" placeholder="Pencarian Karyawan" style="max-width: 100%;" autofocus="">
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="button" id="search-button"><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                </form>
                <div class="table-responsive table-scroll tblKaryawan" style="display: none">
                    <table id="" class="table table-sm table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>NIK</th>
                                <th>Nama</th>
                                <th>Jabatan</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody id="dataKaryawan">
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn btn-secondary waves-effect waves-light">Tutup</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).on("click", ".btnSelect", function() {
        const id = $(this).data('id');
        var selNik = $('.selectNik' + id).text();
        $('#employee_nik').val(selNik);
        showEmployee();
    })

    $(document).on("click", "#search-button", function() {
        $('.tblKaryawan').show();
        listEmployee();
    });

    $(document).on("input", "#search-input", function() {
        $('.tblKaryawan').show();
        listEmployee();
    });

    $('.sk_type').change(function() {
        var type = $(this).val();
        if (type != 'PENGANGKATAN') {
            $('.memo').show();
        } else {
            $('.memo').hide();
        }
    });

    function listEmployee() {
        var search = $('#search-input').val();
        $.ajax({
            url: "<?php echo site_url('api/getEmployeeAll') ?>",
            data: {
                search: search
            },
            method: 'post',
            dataType: 'html',
            success: function(response) {
                $('#dataKaryawan').html(response);
            }
        })
    }

    function showEmployee() {
        const employee_nik = $('#employee_nik').val();
        $.ajax({
            url: "<?php echo site_url('api/getEmployee') ?>",
            data: {
                nik: employee_nik
            },
            method: 'post',
            dataType: 'json',
            success: function(data) {
                if (data != null) {
                    $('#employee_id').val(data.employee_id);
                    $('#name').val(data.employee_name);
                    $('#position').val(data.position_name);
                    $('#kas').val(data.store_name);
                    $('#division').val(data.division_name);
                    $('#grade').val(data.grade_name);
                } else {
                    alert('NIK Karyawan tidak ditemukan');
                }
            }
        });
    }
</script>