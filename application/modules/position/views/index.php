<div class="container-fluid">
  <div class="card-box">
    <button type="button" class="btn btn-primary btn-xs mb-2 btnAdd" data-toggle="modal" data-target="#add"><i class="fa fa-plus"></i> Tambah</button>
  </h4>

  <div class="table-responsive">
    <table class="table table-hover mb-0">
      <thead>
        <tr>
          <th>No</th>
          <th>Divisi</th>
          <th>Kode Jabatan</th>
          <th>Nama Jabatan</th>
          <th>Grade</th>
          <th>Opsi</th>
        </tr>
      </thead>
      <tbody>
        <?php 
        if (!empty($position)) {
          $i = $jlhpage+1;
          foreach ($position as $row): 
            ?>
            <tr>
              <td><?php echo $i++; ?></td>
              <td><?php echo $row->division_name ?></td>
              <td><?php echo $row->position_code ?></td>
              <td><?php echo $row->position_name ?></td>
              <td><?php echo $row->grade_name ?></td>
              <td>
                <a href="#" class="btn btn-info btn-xs btnEdit mb-1" data-toggle="modal" data-target="#add" data-id="<?php echo $row->position_id ?>" data-div="<?php echo $row->division_id ?>" data-grade="<?php echo $row->grade_id ?>" data-code="<?php echo $row->position_code ?>" data-name="<?php echo $row->position_name ?>"><i class="fas fa-edit"></i> Ubah</a>
              </td>
            </tr>
          <?php endforeach; 
        } else {
          ?>
          <tr id="row">
            <td colspan="3" align="center">Data Kosong</td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
  <?php echo $this->pagination->create_links(); ?>
</div>
</div>

<div id="add" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="titleModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="titleModal">Tambah <?php echo $title ?></h4>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
      </div>
      <form id="form" action="<?php echo site_url('position/add') ?>" method="post">
        <div class="modal-body">
          <input type="hidden" name="id" id="_id">
          <div class="form-group">
            <label for="">Divisi</label>
            <select name="division_id" id="division_id" class="form-control">
              <option value="">--Pilih Divisi--</option>
              <?php foreach ($division as $row): ?>
                <option value="<?php echo $row->division_id ?>"><?php echo $row->division_name ?></option>
              <?php endforeach ?>
            </select>
          </div>
          <div class="form-group">
            <label for="">Grade</label>
            <select name="grade_id" id="grade_id" class="form-control">
              <option value="">--Pilih Grade--</option>
              <?php foreach ($grade as $row): ?>
                <option value="<?php echo $row->grade_id ?>"><?php echo $row->grade_name ?></option>
              <?php endforeach ?>
            </select>
          </div>
          <div class="form-group">
            <label for="">Kode Jabatan</label>
            <input type="text" name="position_code" class="form-control" id="position_code" required="">
          </div>
          <div class="form-group">
            <label for="">Nama Jabatan</label>
            <input type="text" name="position_name" class="form-control" id="position_name" required="">
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success waves-effect waves-light">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script>

  $(function(){

    $('.btnAdd').on('click', function(){
      $('#titleModal').html('Tambah <?php echo $title ?>');
      $('.modal-footer button[type=submit]').html('Simpan');
      $('#form').attr('action', '<?php echo site_url('position/add') ?>');
      $('#division_id').val('');
      $('#grade_id').val('');
      $('#position_code').val('');
      $('#position_name').val('');
      $('#_id').val('');
      // $('#position_code').attr('readonly', false);

    })

    $('.btnEdit').on('click', function(){
      var id = $(this).data('id');
      var code = $(this).attr('data-code');
      var div = $(this).attr('data-div');
      var position = $(this).attr('data-name');
      var grade = $(this).attr('data-grade');
      $('#titleModal').html('Ubah <?php echo $title ?>');
      $('.modal-footer button[type=submit]').html('Ubah');
      $('#form').attr('action', '<?php echo site_url('position/edit') ?>');
      $('#division_id').val(div);
      $('#grade_id').val(grade);
      $('#position_code').val(code);
      // $('#position_code').attr('readonly', true);
      $('#position_name').val(position);
      $('#_id').val(id);
    })


  });

</script>
