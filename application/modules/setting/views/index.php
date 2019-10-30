<div class="container-fluid">
    <div class="card-box">
        <form action="" method="post">
            <div class="row">
                <div class="col-md-9">
                    <div class="form-group">
                        <label for="">Nama Pejabat 1</label>
                        <input type="text" class="form-control" name="name1" value="<?php echo $setting->setting_name_1 ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="">Jabatan Pejabat 1</label>
                        <input type="text" class="form-control" name="pos1" value="<?php echo $setting->setting_pos_1 ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="">Nama Pejabat 2</label>
                        <input type="text" class="form-control" name="name2" value="<?php echo $setting->setting_name_2 ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="">Jabatan Pejabat 2</label>
                        <input type="text" class="form-control" name="pos2" value="<?php echo $setting->setting_pos_2 ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="">UMP</label>
                        <input type="text" class="form-control numeric" name="ump" value="<?php echo $setting->setting_ump ?>" required>
                    </div>
                </div>
                <div class="col-md-3">
                    <button type="submit" class="btn btn-success btn-block mt-3">Simpan</button>
                    <a class="btn btn-secondary btn-block" href="<?php echo site_url('home') ?>">Batal</a>
                </div>
            </div>
        </form>
    </div>
</div>