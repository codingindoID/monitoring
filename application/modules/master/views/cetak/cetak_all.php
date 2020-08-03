<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="shortcut icon" href="<?php echo base_url('assets/img/pp.jpeg') ?>">
	<title>Cetak Laporan</title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<!-- Bootstrap 3.3.7 -->
	<link rel="stylesheet" href="<?php echo base_url().'assets/'?>bower_components/bootstrap/dist/css/bootstrap.min.css">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="<?php echo base_url().'assets/'?>bower_components/font-awesome/css/font-awesome.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="<?php echo base_url().'assets/'?>bower_components/Ionicons/css/ionicons.min.css">  
	<!-- DataTables -->
	<link rel="stylesheet" href="<?php echo base_url().'assets/'?>bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="<?php echo base_url().'assets/'?>dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
  	folder instead of downloading all of them to reduce the load. -->
  	<link rel="stylesheet" href="<?php echo base_url().'assets/'?>dist/css/skins/_all-skins.min.css">
  	<!-- Morris chart -->
  	<link rel="stylesheet" href="<?php echo base_url().'assets/'?>bower_components/morris.js/morris.css">
  	<!-- jvectormap -->
  	<link rel="stylesheet" href="<?php echo base_url().'assets/'?>bower_components/jvectormap/jquery-jvectormap.css">
  	<!-- Date Picker -->
  	<link rel="stylesheet" href="<?php echo base_url().'assets/'?>bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">

  	<!-- Google Font -->
  	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  </head>
  <body class="hold-transition skin-red-light sidebar-mini" onload="window.print();">
  	<style type="text/css" media="screen">
  		.center {
  			display: block;
  			margin-left: auto;
  			margin-right: auto;
  			width: 70%;
  		}
  		.border{
  			margin-bottom: 5px !important;
  		}
  	</style>

  	<?php foreach ($kendaraan as $k): ?>
  		<div style="border-style: solid; " class="border col-lg-2 col-md-2 col-xs-3">
  			<div class="card" style="align-content: center; padding: 10px;">
  				<img class="card-img-top center" src="<?php echo base_url().'assets/image/qr_code/'.$k->qr_code ?>" alt="Card image cap">
  				<div class="card-body">
  					<center><h5 class="card-title"><?php echo $k->no_pol ?></h5></center>
  				</div>
  			</div>
  		</div>
  	<?php endforeach ?>

  </body>
  </html>