  <!-- high chart -->
    <link rel="stylesheet" href="<?php echo base_url().'assets/highchart/high.css' ?>"/>
  <script src="<?php echo base_url('assets/highchart/') ?>highcharts.js"></script>
  <script src="<?php echo base_url('assets/highchart/') ?>series-label.js"></script>
  <script src="<?php echo base_url('assets/highchart/') ?>exporting.js"></script>
  <script src="<?php echo base_url('assets/highchart/') ?>export-data.js"></script>
  <script src="<?php echo base_url('assets/highchart/') ?>accessibility.js"></script>
  <!-- high chart -->

<div class="box">
  <div class="box-header with-border" data-widget="collapse" style="cursor: pointer;">
    <h3 class="box-title" data-widget="collapse" style="cursor: pointer;font-size: 15px;">Filter Tanggal</h3>

    <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
      </button>
    </div>
  </div>
  <div class="box-body">
    <form role="form" action="<?php echo site_url('dashboard/filter') ?>" method="post" id="filterform">
      <div class="box-body">
        <div class="col">

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
              <button type="submit" class="btn btn-success pull-right" ><i class="fa fa-filter"></i> filter</button>
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>
</div>

<!-- data -->
<div class="row">
  <div class="col">
    <!-- chart -->
    <div class="col-lg-9 col-md-9 col-xs-12">

      <div class="box" style="padding: 5px;">
<!--         <span style="margin-left: 10px;">Filter</span>
        <select class="form-group" style="width:100px;margin-left: 10px;" onchange="alert('ok')">
         <?php foreach ($tahun as $tahun): ?>
            <option value="<?php echo $tahun->tahun ?>"><?php echo $tahun->tahun ?></option>
          <?php endforeach ?> 
        </select> -->
        <figure class="highcharts-figure">
          <div id="container"></div>
          <p class="highcharts-description" style="padding: 10px;">
            Basis data terdiri dari kunjungan kendaraan Rutin dan Non rutin yang di hitung berdasarkan data inputan dari sistem 
          </p>
        </figure>
      </div>  
    </div>

    <!-- count -->
    <div class="col-lg-3 col-md-3 col-xs-12">
      <!-- total -->
      <div class="small-box bg-purple">
       <div class="inner">
        <center><h3><?php echo $total ?></h3></center>

        <center><p>Total Kunjungan</p></center>
      </div>
      <div class="icon">
        <i class="ion ion-person"></i>
      </div>
      <a href="#" class="small-box-footer">Detil info <i class="fa fa-arrow-circle-right"></i></a>
    </div>

    <!-- rutin -->
    <div class="small-box bg-green">
     <div class="inner">
      <center><h3><?php echo $rutin ?></h3></center>

      <center><p>Pengunjung Rutin</p></center>
    </div>
    <div class="icon">
      <i class="ion ion-pie-graph"></i>
    </div>
    <a href="#" class="small-box-footer">Detil info <i class="fa fa-arrow-circle-right"></i></a>
  </div>

  <!-- non rutin -->
  <div class="small-box bg-blue">
   <div class="inner">
    <center><h3><?php echo $non ?></h3></center>

    <center><p>Pengunjung Tidak Rutin</p></center>
  </div>
  <div class="icon">
    <i class="ion ion-stats-bars"></i>
  </div>
  <a href="#" class="small-box-footer">Detil info <i class="fa fa-arrow-circle-right"></i></a>
</div>
</div>
<!--end count -->
</div>
</div>
<!-- end data -->

<!-- js chart -->
<script type="text/javascript">
  Highcharts.chart('container', {
    chart: {
      type: 'column'
    },
    title: {
      text: 'Monitoring Keluar Masuk Kendaraan tahun :  '+<?php echo date('Y') ?>
    },
    subtitle: {
      text: 'Data diambil dari rata-rata keluar masuk kendaraan setiap bulan'
    },
    xAxis: {
      categories: [
      'Jan',
      'Feb',
      'Mar',
      'Apr',
      'May',
      'Jun',
      'Jul',
      'Aug',
      'Sep',
      'Oct',
      'Nov',
      'Dec'
      ],
      crosshair: true
    },
    yAxis: {
      min: 0,
      title: {
        text: 'Total Pengunjung'
      }
    },
    tooltip: {
      headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
      pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
      '<td style="padding:0"><b>{point.y:.1f} pengunjung</b></td></tr>',
      footerFormat: '</table>',
      shared: true,
      useHTML: true
    },
    plotOptions: {
      column: {
        pointPadding: 0.2,
        borderWidth: 0
      }
    },
    series: [
    {
      name: 'Rutin',
      data : <?php echo json_encode($chart_rutin) ?>
      /*data: [50, 120, 106.4, 129.2, 144.0, 176.0, 135.6, 148.5, 216.4, 194.1, 95.6, 54.4]*/

    }, 
    {
      name: 'Non Rutin',
      data : <?php echo json_encode($chart_non_rutin) ?>
     /* data: [48.9, 38.8, 39.3, 41.4, 47.0, 48.3, 59.0, 59.6, 52.4, 65.2, 59.3, 51.2]*/

    }
    ]
  });
</script>