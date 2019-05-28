<?php

if (isset($user)) {
  $id = $user['user_id'];
  $EmailValue = $user['user_email'];
  $BranchValue = $user['branch_code'];
  $NameValue = $user['user_full_name'];
  $RoleValue = $user['role_id'];
  $StatusValue = $user['user_status'];

} else {
  $EmailValue = set_value('user_email');
  $BranchValue = set_value('branch_code');
  $NameValue = set_value('user_full_name');
  $RoleValue = set_value('role_id');
  $StatusValue = set_value('user_status');

}
?>

<main class="main">

  <!-- Breadcrumb -->
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?php echo site_url('merchant') ?>"> Home</a></li>
    <li class="breadcrumb-item"><a href="<?php echo site_url('merchant/user') ?>"> User</a></li>
    <li class="breadcrumb-item active"><?php echo isset($title) ? '' . $title : null; ?></li>
  </ol>

  <div class="container-fluid">  
    <div class="animated fadeIn">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <strong><?php echo isset($title) ? '' . $title : null; ?></strong>
              Form
            </div>
            <div class="card-body">
              <?php echo form_open_multipart(current_url()); ?>
              <?php echo validation_errors(); ?>

              <?php if($this->all_branch == 'YES'){ ?>
                <div class="form-group">
                  <label>Branch <span class="text-danger">*</span></label>
                  <select name="branch_code" class="form-control">
                    <?php foreach($branch as $row): ?>
                      <option value="<?php echo $row['branch_code'] ?>" <?php echo ($row['branch_code'] == $BranchValue) ? 'selected' : '' ?>><?php echo $row['branch_name'] ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
              <?php } ?>

              <div class="form-group">
                <label>Full Name <span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="user_full_name" value="<?php echo $NameValue ?>" placeholder="Full Name">
              </div>

              <?php if(!isset($user)) { ?>
                <div class="form-group">
                  <label>Email <span class="text-danger">*</span></label>
                  <input type="email" class="form-control" name="user_email" value="<?php echo $EmailValue ?>" placeholder="Email">
                </div>

                <div class="form-group">
                  <label>Password <span class="text-danger">*</span></label>
                  <input type="password" class="form-control" name="user_password" placeholder="Password">
                </div>
                <div class="form-group">
                  <label>Password Confirmation<span class="text-danger">*</span></label>
                  <input type="password" class="form-control" name="passconf" placeholder="Password Confirmation">
                </div>
              <?php } ?>

              <div class="form-group">
                <label>Role <span class="text-danger">*</span></label>
                <select name="role_id" class="form-control">
                  <option value="1">Manager</option>
                  <option value="2">Cashier</option>
                </select>
              </div>

              <div class="form-group">
                <label>Status <span class="text-danger">*</span></label><br>
                <input type="radio" value="1" name="user_status" <?php echo ($StatusValue == 1) ? 'checked' : '' ?> > Active &nbsp;&nbsp;
                <input type="radio" value="0" name="user_status" <?php echo ($StatusValue == 0) ? 'checked' : '' ?> > Not Active
              </div>

            </div>

            <div class="card-footer">
              <button type="submit" class="btn btn-md btn-success"><i class="icon-check"></i> Save</button>
              <a href="<?php echo site_url('merchant/user') ?>" class="btn btn-md btn-primary"><i class="icon-close"></i> Cancel</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>