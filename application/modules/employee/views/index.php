<style>
  input,
  textarea {
    text-transform: uppercase;
  }
</style>
<div class="container-fluid">
  <div class="card-box">

    <form action="" method="post" id="formData" onsubmit="event.preventDefault()">
      <input type="hidden" name="employee_id" id="employee_id">
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label for="">NIK</label>
            <input type="text" name="employee_nik" class="form-control" placeholder="Masukan NIK Karyawan" id="employee_nik" autofocus="" autocomplete="off">
            <button type="button" class="btn btn-xs btn-warning mt-1" data-toggle="modal" data-target="#listKaryawan">Daftar Karyawan</button>
          </div>
          <div class="form-group">
            <label for="">Nama Lengkap</label>
            <input type="text" name="employee_name" class="form-control" placeholder="Nama Karyawan" id="employee_name">
          </div>
          <div class="form-group">
            <div class="row">
              <div class="col-md-6">
                <label for="">Tempat Lahir</label>
                <input type="text" class="form-control" name="employee_pob" id="employee_pob" placeholder="Tempat Lahir">
              </div>
              <div class="col-md-6">
                <label for="">Tanggal Lahir</label>
                <input type="text" class="form-control datepicker" name="employee_bdate" id="employee_bdate" placeholder="Tanggal Lahir" readonly="">
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="row">
              <div class="col-md-6">
                <label for="" class="mb-2">Jenis Kelamin</label><br>
                <label for="genderl">
                  <input type="radio" id="genderl" class="employee_gender" name="employee_gender" value="L"> Laki-laki
                </label>
                <label for="genderp">
                  <input type="radio" class="employee_gender ml-3" id="genderp" name="employee_gender" value="P"> Perempuan
                </label>
              </div>
              <div class="col-md-6">
                <label for="">Status Pernikahan</label>
                <select name="employee_married" class="form-control" id="employee_married">
                  <?php foreach ($married as $row) : ?>
                    <option value="<?php echo $row ?>"><?php echo ucwords($row) ?></option>
                  <?php endforeach ?>
                </select>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="row">
              <div class="col-md-6">
                <label for="">Nama Ibu Kandung</label>
                <input type="text" name="employee_mother" id="employee_mother" class="form-control" placeholder="Nama Ibu Kandung">
              </div>
              <div class="col-md-6">
                <label for="">Nomor KTP</label>
                <input type="text" maxlength="16" id="employee_ktp" name="employee_ktp" class="form-control" placeholder="No KTP">
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="row">
              <div class="col-md-6">
                <label for="">No Handphone</label>
                <input type="text" class="form-control" name="employee_phone" id="employee_phone" placeholder="Nomor Handphone">
              </div>
              <div class="col-md-6">
                <label for="">Email</label>
                <input type="email" class="form-control" name="employee_email" id="employee_email" placeholder="Email Aktif">
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="">Alamat Sekarang</label>
            <textarea id="employee_current_address" name="employee_current_address" class="form-control"></textarea>
          </div>
          <div class="form-group">
            <div class="row">
              <div class="col-md-4">
                <label for="">Kode Pos</label>
                <input type="text" name="employee_current_postcode" class="form-control" id="employee_current_postcode">
              </div>
              <div class="col-md-4">
                <label for="">Kecamatan</label>
                <input type="text" name="employee_current_village" class="form-control" id="employee_current_village">
              </div>
              <div class="col-md-4">
                <label for="">Kabupaten/Kota</label>
                <input type="text" name="employee_current_district" class="form-control" id="employee_current_district">
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="">Alamat KTP</label>
            <textarea id="employee_id_address" name="employee_id_address" class="form-control"></textarea>
          </div>
          <div class="form-group">
            <div class="row">
              <div class="col-md-4">
                <label for="">Kode Pos</label>
                <input type="text" name="employee_id_postcode" class="form-control" id="employee_id_postcode">
              </div>
              <div class="col-md-4">
                <label for="">Kecamatan</label>
                <input type="text" name="employee_id_village" class="form-control" id="employee_id_village">
              </div>
              <div class="col-md-4">
                <label for="">Kabupaten/Kota</label>
                <input type="text" name="employee_id_district" class="form-control" id="employee_id_district">
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <div class="row">
              <div class="col-md-6">
                <label for="">Tanggal Masuk</label>
                <input type="text" class="form-control datepicker" name="employee_join_date" id="employee_join_date" readonly="" placeholder="Tanggal Masuk">
              </div>
              <div class="col-md-6">
                <label for="">Tanggal Keluar</label>
                <input type="text" class="form-control" id="employee_exit_date" readonly="" placeholder="Tanggal Keluar">
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="">Penempatan</label>
            <div class="row">
              <div class="col-md-6">
                <input type="hidden" name="store_id" id="stId">
                <input type="text" class="form-control" id="store_code" placeholder="Masukan Kode Kas" autocomplete="off">
                <button type="button" class="btn btn-xs btn-warning mt-1 btnlistkas" data-toggle="modal" data-target="#listKas">Daftar Kode Kas</button>
              </div>
              <div class="col-md-6">
                <input type="text" class="form-control" id="store_name" placeholder="Nama Kas" readonly="">
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="">Status Karyawan</label>
            <select name="employee_status" id="employee_status" class="form-control">
              <option value="KONTRAK">Kontrak</option>
              <option value="TETAP">Tetap</option>
            </select>
          </div>
          <div class="form-group">
            <div class="row">
              <div class="col-md-4">
                <label for="">Jabatan</label>
                <input type="hidden" id="posId" name="position_id">
                <input type="text" class="form-control" id="position_code" placeholder="Masukan Kode Jabatan" autocomplete="off">
                <button type="button" class="btn btn-xs btn-warning mt-1 btnlistpos" data-toggle="modal" data-target="#listPos">Daftar Kode Jabatan</button>
              </div>
              <div class="col-md-4">
                <label for="">&nbsp;</label>
                <input type="text" class="form-control" id="position_name" placeholder="Nama Jabatan" readonly="">
              </div>
              <div class="col-md-4">
                <label for="">Grade</label>
                <input type="text" class="form-control" id="grade_name" placeholder="Grade" readonly="">
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="">Divisi</label>
            <div class="row">
              <div class="col-md-6">
                <input type="text" class="form-control" id="division_code" placeholder="Kode Divisi" readonly="">
              </div>
              <div class="col-md-6">
                <input type="text" class="form-control" id="division_name" placeholder="Nama Divisi" readonly="">
              </div>
            </div>
          </div>
          <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" id="ins-tab" data-toggle="tab" href="#ins" role="tab" aria-controls="ins" aria-selected="true">Asuransi & Pajak</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="school-tab" data-toggle="tab" href="#school" role="tab" aria-controls="school" aria-selected="false">Pendidikan</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="family-tab" data-toggle="tab" href="#family" role="tab" aria-controls="family" aria-selected="false">Keluarga</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="contract-tab" data-toggle="tab" href="#contract" role="tab" aria-controls="contract" aria-selected="false">Kontrak</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="file-tab" data-toggle="tab" href="#file" role="tab" aria-controls="file" aria-selected="false">File</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="salary-tab" data-toggle="tab" href="#salary" role="tab" aria-controls="salary" aria-selected="false">Salary</a>
            </li>
          </ul>
          <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="ins" role="tabpanel" aria-labelledby="ins-tab">
              <div class="form-group">
                <div class="row">
                  <div class="col-md-6">
                    <label for="">No. Rekening</label>
                    <input type="text" class="form-control" name="employee_acc_bank" id="employee_acc_bank">
                  </div>
                  <div class="col-md-6">
                    <label for="">NPWP</label>
                    <input type="text" class="form-control" name="employee_npwp" id="employee_npwp">
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="row">
                  <div class="col-md-6">
                    <label for="">Nomor BPJS Kesehatan</label>
                    <input type="text" class="form-control" name="employee_no_bpjskes" id="employee_no_bpjskes">
                  </div>
                  <div class="col-md-6">
                    <label for="">Nomor BPJS Ketenagakerjaan</label>
                    <input type="text" class="form-control" name="employee_no_bpjstk" id="employee_no_bpjstk">
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="row">
                  <div class="col-md-6">
                    <label for="">Status Pajak</label>
                    <select name="employee_tax_status" id="employee_tax_status" class="form-control">
                      <option value="TIDAK MENIKAH">TIDAK MENIKAH</option>
                      <option value="MENIKAH">MENIKAH</option>
                    </select>
                  </div>
                  <div class="col-md-6">
                    <label for="">Jumlah Anak</label>
                    <input type="number" class="form-control" name="employee_children" id="employee_children" placeholder="Jumlah Anak" value="0">
                  </div>
                </div>
              </div>
            </div>
            <div class="tab-pane fade show" id="school" role="tabpanel" aria-labelledby="school-tab">
              <div id="divSchool">
                <div class="prSch"></div>
              </div>
              <a href="#" class="btn btn-xs btn-success" id="addSchool"><i class="fa fa-plus"></i><b> Tambah Pendidikan</b></a>
            </div>
            <div class="tab-pane fade show" id="family" role="tabpanel" aria-labelledby="family-tab">
              <div class="form-group">
                <label for="">Nomor Kartu Keluarga</label>
                <input type="text" class="form-control" name="employee_family_card" id="employee_family_card">
              </div>
              <div id="divFamily">
                <div class="prFam"></div>
              </div>
              <a href="#" class="btn btn-xs btn-success" id="addfamily"><i class="fa fa-plus"></i><b> Tambah Anggota Keluarga</b></a>
            </div>
            <div class="tab-pane fade show" id="contract" role="tabpanel" aria-labelledby="contract-tab">
              <div id="divContract">
                <div class="prCon"></div>
              </div>
              <a href="#" class="btn btn-xs btn-success" id="addContract"><i class="fa fa-plus"></i><b> Tambah Periode Kontrak</b></a>
            </div>
            <div class="tab-pane fade show" id="file" role="tabpanel" aria-labelledby="file-tab">
              <div class="form-group">
                <label for="">Ordner</label>
                <input type="text" class="form-control" name="employee_ordner" id="employee_ordner">
              </div>
            </div>
            <div class="tab-pane fade show" id="salary" role="tabpanel" aria-labelledby="salary-tab">
              <div class="form-group">
                <label for="">Gaji Pokok</label>
                <input type="number" class="form-control" name="employee_salary" id="employee_salary">
              </div>
            </div>
          </div>
          <button type="submit" class="btn btn-success mt-3" id="btnSave">Simpan</button>
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

<div id="listKas" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="titleModal" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="titleModal">Daftar Kas</h4>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
      </div>
      <div class="modal-body">
        <form class="mb-2" onsubmit="event.preventDefault()" method="post">
          <div class="input-group">
            <input type="text" autocomplete="off" id="search-inputkas" class="form-control" placeholder="Pencarian" style="max-width: 100%;" autofocus="">
            <div class="input-group-append">
              <button class="btn btn-outline-secondary" type="button" id="search-buttonkas"><i class="fa fa-search"></i></button>
            </div>
          </div>
        </form>
        <div class="table-responsive table-scroll tblKas" style="display: none">
          <table id="" class="table table-sm table-hover">
            <thead>
              <tr>
                <th>No</th>
                <th>Kode Kas</th>
                <th>Nama Kas</th>
                <th></th>
              </tr>
            </thead>
            <tbody id="dataKas">
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

<div id="listPos" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="titleModal" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="titleModal">Daftar Jabatan</h4>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
      </div>
      <div class="modal-body">
        <form class="mb-2" onsubmit="event.preventDefault()" method="post">
          <div class="input-group">
            <input type="text" autocomplete="off" id="search-inputpos" class="form-control" placeholder="Pencarian" style="max-width: 100%;" autofocus="">
            <div class="input-group-append">
              <button class="btn btn-outline-secondary" type="button" id="search-buttonpos"><i class="fa fa-search"></i></button>
            </div>
          </div>
        </form>
        <div class="table-responsive table-scroll tblPos" style="display: none">
          <table id="" class="table table-sm table-hover">
            <thead>
              <tr>
                <th>No</th>
                <th>Kode Jabatan</th>
                <th>Nama Jabatan</th>
                <th>Divisi</th>
                <th></th>
              </tr>
            </thead>
            <tbody id="dataPosition">
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
  $(function() {

    var divSchool = $('#divSchool');
    var i = $('#divSchool').length + 1;

    $("#addSchool").click(function() {
      $(`<div class="form-group">
        <div class="row">
        <div class="col-md-4">
        <label for="">Tingkat</label>
        <select name="school_level[]" class="form-control" id="school_level">
        <?php foreach ($level as $row) : ?>
          <option value="<?php echo $row ?>"><?php echo ucwords($row) ?></option>
        <?php endforeach ?>
        </select>
        <a href="#" class="btn btn-xs btn-danger mt-1 removeSchool"><i class="fa fa-times"></i> Hapus Baris</a>
        </div>
        <div class="col-md-4">
        <label for="">Jurusan</label>
        <input type="text" class="form-control" name="school_major[]" id="school_major">
        </div>
        <div class="col-md-4">
        <label for="">Nama Sekolah</label>
        <input type="text" class="form-control" name="school_name[]" id="school_name">
        </div>
        </div>
        </div>`).appendTo(divSchool);
      i++;
      return false;
    });

    $(document).on("click", ".removeSchool", function() {
      if (i > 2) {
        $(this).parents('.form-group').remove();
        i--;
      }
      return false;
    });

    var divFamily = $('#divFamily');
    var i = $('#divFamily').length + 1;

    $("#addfamily").click(function() {
      $(`<div class="form-group">
        <div class="row">
        <div class="col-md-3">
        <label for="">Nama</label>
        <input type="text" class="form-control" name="family_name[]">
        <a href="#" class="btn btn-xs btn-danger mt-1 removeFamily"><i class="fa fa-times"></i> Hapus Baris</a>
        </div>
        <div class="col-md-3"> 
        <label for="">Hubungan</label>
        <select name="family_relation[]" class="form-control" id="">
        <?php foreach ($relation as $row) : ?>
          <option value="<?php echo $row ?>"><?php echo ucwords($row) ?></option>
        <?php endforeach ?>
        </select>
        </div>
        <div class="col-md-3">
        <label for="">Tanggal Lahir</label>
        <input type="text" placeholder="YYYY-MM-DD" class="form-control datepicker" name="family_bdate[]">
        </div>
        <div class="col-md-3">
        <label for="">Jenis Kelamin</label>
        <select name="family_gender[]" class="form-control">
        <option value="L">Laki-laki</option>
        <option value="P">Perempuan</option>
        </select>
        </div>
        </div>
        </div>`).appendTo(divFamily);
      i++;
      return false;
    });
    $(document).on("click", ".removeFamily", function() {
      if (i > 2) {
        $(this).parents('.form-group').remove();
        i--;
      }
      return false;
    });

    var divContract = $('#divContract');
    var i = $('#divContract').length + 1;

    $("#addContract").click(function() {
      $(`<div class="form-group">
        <div class="row">
        <div class="col-md-6">
        <label for="">Periode Kontrak</label>
        <input type="number" class="form-control" name="contract_period[]">
        <a href="#" class="btn btn-xs btn-danger mt-1 removeContract"><i class="fa fa-times"></i> Hapus Baris</a>
        </div>
        <div class="col-md-6">
        <label for="">Lama Kontrak</label>
        <input type="number" class="form-control" name="contract_length[]">
        </div>
        </div>
        </div>`).appendTo(divContract);
      i++;
      return false;
    });

    $(document).on("click", ".removeContract", function() {
      if (i > 2) {
        $(this).parents('.form-group').remove();
        i--;
      }
      return false;
    });

  });
</script>
<script type="text/javascript" src="<?php echo media_url('js/script.js') ?>"></script>