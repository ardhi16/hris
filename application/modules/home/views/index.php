<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<div class="card-box">
				<p>Selamat datang <strong><?php echo ucfirst($this->fullname) ?></strong>,</p>
				<p>Login Terakhir: <?php echo ($user->user_last_login != NULL) ? pretty_date($user->user_last_login, 'd F Y, H:i:s', false) : '-' ?></p>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-3">
			<div class="card-box bg-info">
				<h4 class="header-title mt-0 mb-3 text-white">Total Karyawan</h4>
				<div class="widget-box-2">
					<div class="widget-detail-2 text-right">
						<h2 class="font-weight-normal mb-1 text-white"> <?php echo $total_employee ?> </h2>
						<p class="text-white">Karyawan Aktif</p>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-3">
			<div class="card-box bg-success">
				<h4 class="header-title mt-0 mb-3 text-white">Total Kantor Kas</h4>
				<div class="widget-box-2">
					<div class="widget-detail-2 text-right">
						<h2 class="font-weight-normal mb-1 text-white"> <?php echo $total_store ?> </h2>
						<p class="text-white">Kantor Kas</p>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-3">
			<div class="card-box bg-danger">
				<h4 class="header-title mt-0 mb-3 text-white">Total Karyawan Out</h4>
				<div class="widget-box-2">
					<div class="widget-detail-2 text-right">
						<h2 class="font-weight-normal mb-1 text-white"> <?php echo $total_out ?> </h2>
						<p class="text-white">Per <?php echo pretty_date(date('Y-m'), 'F Y', false) ?></p>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-3">
			<div class="card-box bg-warning">
				<h4 class="header-title mt-0 mb-3 text-white">Total Reminder Kontrak</h4>
				<div class="widget-box-2">
					<div class="widget-detail-2 text-right">
						<h2 class="font-weight-normal mb-1 text-white"> <?php echo $total_contract ?> </h2>
						<p class="text-white">Per <?php echo pretty_date(date('Y-m'), 'F Y', false) ?></p>
					</div>
				</div>
			</div>
		</div>
	</div>