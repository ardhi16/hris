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
							<strong><?php echo isset($title) ? '' . $title : null; ?></strong>
							Form
						</div>
						<div class="card-body">
							<?php echo form_open_multipart(current_url()); ?>
							<?php echo validation_errors(); ?>
							<div class="form-group">
								<label >Current Password *</label>
								<input type="password" name="user_current_password" class="form-control" placeholder="Enter current password...">
							</div>

							<div class="form-group">
								<label >New Password *</label>
								<input type="password" name="user_password" class="form-control" placeholder="Enter new password...">
							</div>
							<div class="form-group">
								<label > Confirm New Password *</label>
								<input type="password" name="passconf" class="form-control" placeholder="Enter confirm password..." >
							</div>
						</div>
						
						<div class="card-footer">
							<button type="submit" class="btn btn-md btn-success"><i class="icon-check"></i> Save</button>
							<a href="<?php echo site_url('merchant/profile') ?>" class="btn btn-md btn-primary"><i class="icon-close"></i> Cancel</a>
						</div>
						<?php echo form_close(); ?>

					</div>

				</div>

			</div>
		</div>
	</div>
</main>





