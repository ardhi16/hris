<main class="main">
  <!-- Breadcrumb -->
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?php echo site_url('merchant') ?>"> Home</a></li>
    <li class="breadcrumb-item active"><?php echo isset($title) ? '' . $title : null; ?></li>
  </ol>

  <div class="container-fluid"> 
    <div class="animated fadeIn">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <?php echo $title ?>
              <a href="<?php echo site_url('merchant/user/add') ?>" class="btn btn-danger btn-sm float-right"><i class="icon-plus"></i> Users</a>
            </div>
            <table class="table table-hover table-responsive-sm">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Branch Code</th>
                  <th>Branch Name</th>
                  <th>Email</th>
                  <th>Full Name</th>
                  <th>Role</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                if (!empty($user)) {
                  $i = $jlhpage+1;
                  foreach ($user as $row):
                    ?>
                    <tr>
                      <td><?php echo $i++; ?></td>
                      <td><?php echo $row->branch_code ?></td>
                      <td><?php echo $row->branch_name ?></td>
                      <td><?php echo $row->user_email ?></td>
                      <td><?php echo $row->user_full_name ?></td>
                      <td><?php echo $row->role_name ?></td>
                      <td>
                        <?php if($this->uid_merchant != $row->user_id) { ?>
                          <a href="<?php echo site_url('merchant/user/edit/'.$row->merchant_code.'/'.$row->branch_code.'/'. $row->user_id); ?>" class="btn btn-sm btn-info"><i class="icon-pencil"></i> Edit</a>
                        <a href="<?php echo site_url('merchant/user/rpw/'.$row->merchant_code.'/'.$row->branch_code.'/'. $row->user_id); ?>" class="btn btn-sm btn-warning"><i class="icon-eye"></i> Reset Password</a>
                      <?php } else { ?>
                        <a href="<?php echo site_url('merchant/profile/edit/'); ?>" class="btn btn-sm btn-info"><i class="icon-pencil"></i> Edit</a>
                        <a href="<?php echo site_url('merchant/profile/cpw/'); ?>" class="btn btn-sm btn-warning"><i class="icon-eye"></i> Change Password</a>
                      <?php } ?>

                      </td>
                    </tr>
                    <?php
                  endforeach;
                } else {
                  ?>
                  <tr id="row">
                    <td colspan="6" align="center">Empty</td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
          <ul class="pagination">
              <?php echo $this->pagination->create_links(); ?>
            </ul>
        </div>
      </div>
    </div>
  </div>
</div>
</main>