<div class="container-fluid">
  <div class="card-box">
    <a href="<?php echo site_url('user/add') ?>" class="btn btn-primary btn-xs mb-2"><i class="fa fa-plus"></i> Tambah</a>
    <div class="table-responsive">
      <table class="table dataTable table-hover mb-0">
        <thead>
          <tr>
            <th>No</th>
            <th>Username</th>
            <th>Email</th>
            <th>Fullname</th>
            <th>Status</th>
            <th>Opsi</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $i = 1;
          foreach ($user as $row) :
            ?>
            <tr>
              <td><?php echo $i++; ?></td>
              <td><?php echo $row->user_name ?></td>
              <td><?php echo $row->user_fullname ?></td>
              <td><?php echo $row->user_email ?></td>
              <td><?php echo ($row->user_status) ? 'Aktif' : 'Non Aktif' ?></td>
              <td>
                <a href="<?php echo site_url('user/edit/' . $row->user_id) ?>" class="btn btn-info btn-xs "><i class="fa fa-edit"></i> Ubah</a>
                <a href="<?php echo site_url('user/rpw/' . $row->user_id) ?>" class="btn btn-warning btn-xs "><i class="fa fa-unlock"></i> Reset Password</a>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>