<div class="box">
  <div class="box-header with-border" data-widget="collapse" style="cursor: pointer;">
    <h3 class="box-title" data-widget="collapse" style="cursor: pointer;font-size: 15px;">Filter Tanggal</h3>

    <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
      </button>
    </div>
  </div>
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

<!-- data -->
<div class="row">
  <div class="col">
    <!-- chart -->
    <div class="col-lg-6 col-md-6 col-xs-12">
      <div class="box" style="padding: 5px;">
        <figure class="highcharts-figure">
          <div id="container"></div>
          <p class="highcharts-description" style="padding: 10px;">
            Basis data terdiri dari kunjungan kendaraan Rutin dan Non rutin yang di hitung berdasarkan data inputan dari sistem 
          </p>
        </figure>
      </div>
    </div>

  <!-- count -->
  <div class="col-lg-6 col-md-6 col-xs-12">
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

    title: {
      text: 'Monitoring Keluar Masuk Kendaraan '
    },

    subtitle: {
      text: 'Data diambil dari rata-rata keluar masuk kendaraan setiap bulan'
    },

    yAxis: {
      title: {
        text: 'total kendaraan'
      }
    },

    xAxis: {
      accessibility: {
        rangeDescription: 'Range: Januari - Desember'
      }
    },

    legend: {
      layout: 'vertical',
      align: 'right',
      verticalAlign: 'middle'
    },

    plotOptions: {
      series: {
        label: {
          connectorAllowed: false
        },
        pointStart: 1
      }
    },

    series: [{
      name: 'Rutin',
      data: [12,85,34,2,13,45,65,12,11,12,13,34]
    }, {
      name: 'Non Rutin',
      data: [15,0,34,56,12,3,45,12,34,89,12,11]
    }],

    responsive: {
      rules: [{
        condition: {
          maxWidth: 500
        },
        chartOptions: {
          legend: {
            layout: 'horizontal',
            align: 'center',
            verticalAlign: 'bottom'
          }
        }
      }]
    }

  });
</script>