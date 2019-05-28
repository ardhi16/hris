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

                    </ul>
                </li>
                
            </ul>
        </div>
        <div class="clearfix"></div>
    </div>
</div>