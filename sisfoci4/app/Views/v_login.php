<div class="login-box">
  <div class="login-logo">
    <a href="<?= base_url() ?>"><b>Login</b>SIAKAD</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Silakan Login</p>
    <?php 
    $errors = session()->getFlashdata('errors');
    if (!empty($errors)) { ?>
        <div class="alert alert-danger" role="alert">
            <ul>
                <?php foreach ($errors as $key => $value) { ?>
                    <li><?= esc($value) ?></li>
                <?php }?>
            </ul>
        </div>
    <?php } ?>
    <?php
        if(session()->getFlashdata('pesan')){
            echo '<div class="alert alert-warning" role="alert">';
            echo session()->getFlashdata('pesan');
            echo '</div>';
        }
        if(session()->getFlashdata('success')){
            echo '<div class="alert alert-success" role="alert">';
            echo session()->getFlashdata('success');
            echo '</div>';
        }
    ?>
    <?php echo form_open('auth/cek_login'); ?>
      <div class="form-group has-feedback">
        <input name="username" class="form-control" placeholder="Username">
        <span class="fa fa-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <select name="level"class="form-control">
            <option value="">-- Level --</option>
            <option value="1">Admin</option>
            <option value="2">Mahasiswa</option>
            <option value="3">Dosen</option>
        </select>
      </div>
      <div class="form-group has-feedback">
        <input name="password" type="password" class="form-control" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <!-- /.col -->
        <div class="col-xs-12">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    <?php echo form_close() ?>
    <h3>Admin-> uname: admin; pass: admin</h3>
    <h3>Mahasiswa-> uname: 1906200; pass: hikaganteng</h3>
    <h3>Dosen-> uname: 298767; pass: sumiati</h3>
    <!-- <a href="register.html" class="text-center">Register a new membership</a> -->

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box --