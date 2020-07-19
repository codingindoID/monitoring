<div class="box">
  <div class="box-header with-border" data-widget="collapse" style="cursor: pointer;">
    <h3 class="box-title" data-widget="collapse" style="cursor: pointer;font-size: 15px;">Filter Tanggal</h3>

    <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
      </button>
    </div>
  </div>
  <div class="box-body">
    <div class="col">

     <form role="form" action="<?php echo site_url('dashboard/filter') ?>" method="post" id="filterform">
      <div class="row" style="margin-right: 10px;margin-left: 10px;">
        <div class="col-lg-6 col-md-6 col-xs-6">
          <div class="form-group">
            <label>mulai tanggal </label>

            <div class="input-group date">
              <div class="input-group-addon">
                <i class="fa fa-calendar"></i>
              </div>
              <input  required="true" name="startdate"  type="text" class="form-control pull-right" id="datepicker" value="<?php echo $start != null ? date('d-m-Y',strtotime($start)) :'' ?>">
            </div>
            <!-- /.input group -->
          </div>

        </div>

        <div class="col-lg-6 col-md-6 col-xs-6">
          <div class="form-group">
            <label>sampai dengan</label>

            <div class="input-group date">
              <div class="input-group-addon">
                <i class="fa fa-calendar"></i>
              </div>
              <input required="true" type="text" name="enddate" class="form-control pull-right" id="dateend" value="<?php echo $end != null ? date('d-m-Y',strtotime($end)) :'' ?>" >
            </div>
          </div>
        </div>
      </div>
      <div class="row" style="margin-right: 10px;">
        <div class="col-lg-12 col-md-12 col-xs-12" style="margin-top: -5px">
          <div class="btn-group" style="margin-left: 20px;">
          </div>
          <button type="submit" class="btn btn-success pull-right" ><i class="fa fa-filter"></i> filter</a>
          </div>
        </div>
      </form>

    </div>
  </div>
</div>
<!-- DATA -->
 <div class="row">
 	<div class="col">
 		<div class="col-lg-12 col-md-12 col-xs-12">
 			<div class="row">
 				<div class="col-lg-12 col-xs-12">
 					<!-- small box -->
 					<div class="small-box bg-purple">
 						<div class="inner">
 							<center><h3><?php echo $total ?></h3></center>

 							<center><p>Total Kunjungan</p></center>
 						</div>
 						<div class="icon">
 							<i class="ion ion-person"></i>
 						</div>
 						<a href="<?php echo site_url('srt_all') ?>" class="small-box-footer">Detil info <i class="fa fa-arrow-circle-right"></i></a>
 					</div>
 				</div>
 				<!-- ./col -->
 				<div class="col-lg-6 col-xs-6">
 					<!-- small box -->
 					<div class="small-box bg-green">
 						<div class="inner">
 							<center><h3><?php echo $rutin ?></h3></center>

 							<p>Pengunjung Rutin</p>
 						</div>
 						<div class="icon">
 							<i class="ion ion-pie-graph"></i>
 						</div>
 						<a href="<?php echo site_url('inwarehouse') ?>" class="small-box-footer">Detil info <i class="fa fa-arrow-circle-right"></i></a>
 					</div>
 				</div>
 				<!-- ./col -->
 				<div class="col-lg-6 col-xs-6">
 					<!-- small box -->
 					<div class="small-box bg-blue">
 						<div class="inner">
 							<center><h3><?php echo $non ?></h3></center>

 							<p>Pengunjung Tidak Rutin</p>
 						</div>
 						<div class="icon">
 							<i class="ion ion-stats-bars"></i>
 						</div>
 						<a href="<?php echo site_url('onproses') ?>" class="small-box-footer">Detil info <i class="fa fa-arrow-circle-right"></i></a>
 					</div>
 				</div> 				
 			</div>
 		</div>