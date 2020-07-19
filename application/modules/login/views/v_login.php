
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Send Express APP | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/'?>bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/'?>bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/'?>bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/'?>dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/'?>plugins/iCheck/square/blue.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">
  <div class="login-box">
    <div class="login-logo">

      <!-- <a href="#"><b>LOGO</b> </br>E-SURAT</a> -->
    </div>
    <!-- /.login-logo -->
    <style type="text/css">
      .logo-img{
        max-height: 60% !important;
        max-width: 60% !important;
      }
    </style>

    <div class="login-box-body">
      <center><img src="<?php echo base_url().'assets/'?>dist/img/app.jpg" class="logo-img"></center>
      <?php if($this->session->flashdata('success')){ ?>  
      <div class="alert alert-success">  
        <strong>Success!</strong> <?php echo $this->session->flashdata('success'); ?>  
      </div><?php } else if($this->session->flashdata('error')){ ?>  
      <div class="alert alert-danger">  
        <strong>Error!</strong> <?php echo $this->session->flashdata('error'); ?>  
      </div>  
      <?php } ?>
      <p class="login-box-msg">Sign in to start your session</p>

      <form action="<?php echo site_url('login/aksi_login')?>" method="post">
        <div class="form-group has-feedback">
          <input type="text" class="form-control" placeholder="username" name="username">
          <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
          <input type="password" class="form-control" placeholder="Password" name="password">
          <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>
        <div class="row">
          <!-- /.col -->
          <div class="col-xs-4  pull-right">
            <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
    </div>
    <!-- /.login-box-body -->
  </div>
  <!-- /.login-box -->

  <!-- jQuery 3 -->
  <script src="<?php echo base_url().'assets/'?>bower_components/jquery/dist/jquery.min.js"></script>
  <!-- Bootstrap 3.3.7 -->
  <script src="<?php echo base_url().'assets/'?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <!-- iCheck -->
  <script src="<?php echo base_url().'assets/'?>plugins/iCheck/icheck.min.js"></script>
</body>
</html>
