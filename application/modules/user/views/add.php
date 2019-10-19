<?php

if (isset($user)) {

    $id = $user->user_id;
    $username = $user->user_name;
    $email = $user->user_email;
    $fullname = $user->user_fullname;
    $role_id = $user->role_id;
    $status = $user->user_status;
} else {
    $username = set_value('username');
    $email = set_value('email');
    $fullname = set_value('fullname');
    $role_id = set_value('role_id');
    $status = set_value('status');
}

?>

<div class="container-fluid">
    <div class="card-box">
        <form action="<?php echo current_url() ?>" method="post">
            <div class="row">
                <div class="col-md-9">
                    <?php echo validation_errors(); ?>
                    <div class="form-group">
                        <label for="username">Username <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="username" name="username" placeholder="Masukan username" autocomplete="off" required value="<?php echo $username ?>">
                    </div>
                    <div class="form-group">
                        <label for="fullname">Nama Lengkap <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Masukan Nama" autocomplete="off" required value="<?php echo $fullname ?>">
                    </div>
                    <?php if (!isset($id)) : ?>
                        <div class="form-group">
                            <label for="password">Password <span class="text-danger">*</span></label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Masukan password" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Konfirmasi Password <span class="text-danger">*</span></label>
                            <input type="password" class="form-control" id="passconf" name="passconf" placeholder="Masukan Konfirmasi Password" required>
                        </div>
                    <?php endif ?>
                    <div class="form-group">
                        <label for="email">Email <span class="text-danger">*</span></label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Masukan email" autocomplete="off" required value="<?php echo $email ?>">
                    </div>
                    <div class="form-group">
                        <label for="role">Role <span class="text-danger">*</span></label>
                        <select name="role_id" id="role_id" class="form-control">
                            <?php foreach ($role as $row) : ?>
                                <option value="<?php echo $row->role_id ?>" <?php echo ($row->role_id == $role_id) ? 'selected' : '' ?>><?php echo $row->role_name ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group mt-1">
                        <label>Status <span class="text-danger">*</span></label><br>
                        <label><input type="radio" name="status" value="1" <?php echo ($status) ? 'checked' : '' ?>> Aktif</label>
                        <label class="ml-2"><input type="radio" name="status" value="0" <?php echo (!$status) ? 'checked' : '' ?>> Non Aktif</label>
                    </div>
                    <button type="submit" class="btn btn-success btn-block">Simpan</button>
                    <a class="btn btn-secondary btn-block" href="<?php echo site_url('user') ?>">Batal</a>
                </div>
            </div>
        </form>
    </div>
</div>