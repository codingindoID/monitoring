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

  	<div class="box"  style="margin-top: -10px;">
  		<div class="box-header" style="margin-left: 5px;margin-right: 5px;">
  			<center><h3>Laporan Kunjungan</h3></center>
  		</div>
  		<!-- /.box-header -->
  		<div class="box-body" style="margin-left: 5px;margin-right: 5px;">
  			<div class="table-responsive" style="margin: 10px;">
  				<table id="example1" class="table table-bordered table-striped">
  					<thead>
  						<tr>
  							<th>ID Kunjungan</th>
  							<th class="text-center">NO-POL</th>
  							<th class="text-center">Driver</th>
                <th class="text-center">Nomor ID</th>
                <th class="text-center">Perusahaan</th>
  							<th class="text-center">Jenis Kunjungan</th>
  							<th class="text-center">Tanggal Kunjungan</th>
  							<th class="text-center">Jam Masuk</th>
  							<th class="text-center">Tanggal Keluar</th>
  							<th class="text-center">Jam Keluar</th>
  						</tr>
  					</thead>
  					<tbody>
  						<?php foreach ($kunjungan as $k): ?>
  							<tr>
  								<td><?php echo $k->id_kunjungan ?></td>
  								<td><?php echo $k->no_pol ?></td>
  								<td><?php echo $k->driver ?></td>
                  <td><?php echo $k->sim ?></td>
                  <td><?php echo $k->perusahaan ?></td>
  								<td><?php echo $k->jenis_kunjungan ?></td>
  								<td><?php echo date('d-m-Y', strtotime($k->tgl_kunjungan)) ?></td>
  								<td><?php echo $k->jam_masuk ?></td>
  								<td><?php echo $k->tgl_keluar==null ? '-' : date('d-m-Y', strtotime($k->tgl_keluar))  ?></td>
  								<td><?php echo $k->jam_keluar==null ? '-' : $k->jam_keluar?></td>
  							</tr>
  						<?php endforeach ?>
  					</tbody>
  				</table>
  			</div>
  		</div>
  		<!-- /.box-body -->
  	</div>

  </body>
  </html>