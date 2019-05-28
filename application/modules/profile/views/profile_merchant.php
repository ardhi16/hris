<main class="main">
  <!-- Breadcrumb -->
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?php echo site_url('merchant') ?>"> Home</a></li>
    <li class="breadcrumb-item"><a href="<?php echo site_url('merchant/profile') ?>"> Profile</a></li>
    <li class="breadcrumb-item active"><?php echo isset($title) ? '' . $title : null; ?></li>
  </ol>

  <div class="container-fluid"> 
    <div class="animated fadeIn">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <i class="fa fa-align-justify"></i> <?php echo isset($title) ? '' . $title : null; ?>
            </div>
            <div class="card-body">
              <table class="table table-responsive-sm table-striped">
                <tr>
                  <td>Email</td>
                  <td>:</td>
                  <td><?php echo $user['user_email'] ?></td>
                </tr>
                <tr>
                  <td>Full Name</td>
                  <td>:</td>
                  <td><?php echo $user['user_full_name'] ?></td>
                </tr>
              </table>
              <a href="<?php echo site_url('merchant/profile/edit/')?>" class="btn btn-primary">Edit</a>

              <a href="<?php echo site_url('merchant/profile/cpw')?>" class="btn btn-success">Change Password</a>
            </div>
          </div>
        </div>
        <!--/.col-->
      </div>
      <!--/.row-->
    </div>
  </div>
</main>