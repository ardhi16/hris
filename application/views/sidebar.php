<div class="left-side-menu">
    <div class="slimscroll-menu">
        <div class="user-box text-center">
            <img src="<?php echo media_url() ?>images/default.jpeg" alt="user-img" title="Mat Helme" class="rounded-circle img-thumbnail avatar-lg">
            <div class="dropdown">
                <a href="#" class="text-dark dropdown-toggle h5 mt-2 mb-1 d-block" data-toggle="dropdown"><?php echo ucfirst($this->fullname) ?></a>
            </div>
        </div>

        <div id="sidebar-menu">
            <ul class="metismenu" id="side-menu">
                <li class="menu-title">Menu</li>
                <li>
                    <a href="<?php echo site_url('home') ?>">
                        <i class="mdi mdi-view-dashboard"></i>
                        <span> Beranda </span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo site_url('employee') ?>">
                        <i class="mdi mdi-account-card-details"></i>
                        <span> Karyawan </span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo site_url('sk') ?>">
                        <i class="mdi mdi-file-document"></i>
                        <span> Surat Keputusan </span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo site_url('sp') ?>">
                        <i class="mdi mdi-email-open"></i>
                        <span> Surat Peringatan </span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo site_url('kkout') ?>">
                        <i class="mdi mdi-exit-to-app"></i>
                        <span> KKOUT </span>
                    </a>
                </li>
                <li>
                    <a href="javascript: void(0);">
                        <i class="mdi mdi-file-document-box"></i>
                        <span> Salary </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li><a href="<?php echo site_url('pay') ?>">Daftar Salary</a></li>
                        <li><a href="<?php echo site_url('benefit') ?>">Master Tunjangan</a></li>
                        <li><a href="<?php echo site_url('angsuran') ?>">Angsuran</a></li>
                    </ul>
                </li>
                <li>
                    <a href="<?php echo site_url('cuti') ?>">
                        <i class="mdi mdi-beach"></i>
                        <span> Cuti </span>
                    </a>
                </li>
                <li>
                    <a href="javascript: void(0);">
                        <i class="mdi mdi-file-document-box"></i>
                        <span> Laporan </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li><a href="<?php echo site_url('report/employee') ?>">Karyawan Aktif</a></li>
                        <li><a href="<?php echo site_url('report/sk') ?>">Surat Keputusan</a></li>
                        <li><a href="<?php echo site_url('report/sp') ?>">Surat Peringatan</a></li>
                        <li><a href="<?php echo site_url('report/kkout') ?>">KKOUT</a></li>
                        <li><a href="<?php echo site_url('report/cuti') ?>">Cuti</a></li>
                        <li><a href="<?php echo site_url('report/contract') ?>">Reminder Kontrak</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);">
                        <i class="mdi mdi-folder-multiple"></i>
                        <span> Master Data </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li><a href="<?php echo site_url('store') ?>">KAS</a></li>
                        <li><a href="<?php echo site_url('grade') ?>">Grade</a></li>
                        <li><a href="<?php echo site_url('division') ?>">Divisi</a></li>
                        <li><a href="<?php echo site_url('position') ?>">Jabatan</a></li>
                        <li><a href="<?php echo site_url('holiday') ?>">Libur Nasional</a></li>
                    </ul>
                </li>

                <li>
                    <a href="<?php echo site_url('user') ?>">
                        <i class="mdi mdi-account-multiple"></i>
                        <span> Pengguna </span>
                    </a>
                </li>

                <li>
                    <a href="<?php echo site_url('setting') ?>">
                        <i class="mdi mdi-settings"></i>
                        <span> Pengaturan </span>
                    </a>
                </li>

            </ul>
        </div>
        <div class="clearfix"></div>
    </div>
</div>