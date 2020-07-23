<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="icon" href="<?php echo base_url('assets/dist/img/app.jpg') ?>">
  <title>E-Monitoring || <?php echo $title.' - '.$sub ?></title>
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

    <!-- Select2 -->
    <link rel="stylesheet" href="<?php echo base_url().'assets/'?>bower_components/select2/dist/css/select2.min.css">

    <!-- high chart -->
    <script src="<?php echo base_url('assets/highchart/') ?>highcharts.js"></script>
    <script src="<?php echo base_url('assets/highchart/') ?>series-label.js"></script>
    <script src="<?php echo base_url('assets/highchart/') ?>exporting.js"></script>
    <script src="<?php echo base_url('assets/highchart/') ?>export-data.js"></script>
    <script src="<?php echo base_url('assets/highchart/') ?>accessibility.js"></script>

    <link rel="stylesheet" href="<?php echo base_url().'assets/highchart/'?>high.css">


    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  </head>
  <body class="hold-transition skin-purple-light sidebar-mini">
    <div class="wrapper">

     <?php $this->load->view('navbar'); ?>