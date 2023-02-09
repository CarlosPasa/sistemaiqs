<?php include 'includes/header.php' ?>

<div class="login-box">
  <!-- /.login-logo -->
  <div class="login-box-body">
  <div class="login-logo">
    <a href="<?php echo url('/') ?>"><b>Admin</b> Panel</a>
  </div>
    <p class="login-box-msg">Sign in to start your session</p>

    <?php if(isset($message)): ?>
      <div class="alert alert-<?php echo $message_type ?>">
        <p><?php echo $message ?></p>
      </div>
    <?php endif; ?>

    <?php if(!empty($this->session->flashdata('message'))): ?>
      <div class="alert alert-<?php echo $this->session->flashdata('message_type'); ?>">
        <p><?php echo $this->session->flashdata('message') ?></p>
      </div>
    <?php endif; ?>


    <form action="<?php echo url('/login/check') ?>" method="post" autocomplete="off">
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Enter Username or Email..." value="<?php echo post('username') ?>" name="username" autofocus />
        <span class="fa fa-user form-control-feedback"></span>
        <?php echo form_error('username', '<div class="error" style="color: red;">', '</div>'); ?>
      </div>

      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Password" name="password">
        <span class="fa fa-lock form-control-feedback"></span>
        <?php echo form_error('password', '<div class="error" style="color: red;">', '</div>'); ?>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox" <?php echo post('remember_me')?'checked':'' ?> name="remember_me" /> Remember Me
            </label>
          </div>
        </div>
        <!-- /.col -->
        <?php // echo md5('admin') ?>
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

    <a href="<?php echo url('login/forget?username='.post('username')) ?>">Forgot your password ?</a><br>
    <!-- <a href="register.html" class="text-center">Register a new membership</a> -->

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<?php include 'includes/footer.php' ?>
