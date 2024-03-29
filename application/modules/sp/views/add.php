<div class="container-fluid">
    <div class="card-box">
        <form action="" method="post">
            <input type="hidden" name="employee_id" id="employee_id">
            <input type="hidden" name="no_sp1" id="no_sp1">
            <input type="hidden" name="date_end_sp1" id="date_end_sp1">
            <div class="row">
                <div class="col-md-9">
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
                    <div id="box">
                        <div class="form-group">
                            <label for="">Jenis SP</label>
                            <select name="sp_type" id="sp_type" class="form-control">
                                <option value="">--- Pilih Jenis SP ---</option>
                                <option value="1">SP I</option>
                                <option value="2">SP II</option>
                                <option value="3">SP III</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="">Tanggal Efektif</label>
                        <input type="text" name="sp_date_start" id="sp1_date_start" class="form-control datepicker" readonly="">
                    </div>
                    <div class="form-group">
                        <label for="">Deskripsi</label>
                        <textarea name="sp_desc" id="sp_desc" rows="5" class="form-control"></textarea>
                    </div>

                </div>
                <div class="col-md-3">
                    <button type="submit" class="btn btn-success btn-block mt-3">Simpan</button>
                    <a class="btn btn-secondary btn-block" href="<?php echo site_url('sp') ?>">Batal</a>
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
        $.ajax({
            url: "<?php echo site_url('sp/checkSp') ?>",
            data: {
                employee_id: id
            },
            method: 'post',
            dataType: 'json',
            success: function(response) {
                if (response.status) {
                    alert('Karyawan ybs masih sedang dalam masa SP I, maka otomatis akan naik tingkat ke SP II')
                    $('#sp_type').val('2');
                    $('#no_sp1').val(response.result.no_sp1);
                    $('#date_end_sp1').val(response.result.date_end_sp1);
                    $("#box *").off('click');
                } else {
                    $('#sp_type').val('');
                    $('#no_sp1').val('');
                    $('#date_end_sp1').val('');
                    $("#box *").attr("disabled", false);
                }
            }
        });
    })

    $(document).on("click", "#search-button", function() {
        $('.tblKaryawan').show();
        listEmployee();
    });

    $(document).on("input", "#search-input", function() {
        $('.tblKaryawan').show();
        listEmployee();
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