<div class="box" style="margin-top: -15px;">
  <div class="box-header with-border" data-widget="collapse" style="cursor: pointer;">
    <h3 class="box-title" data-widget="collapse" style="cursor: pointer;font-size: 15px;">Filter Tanggal</h3>

    <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
      </button>
    </div>
  </div>
  <div class="box-body">
    <div class="col">

     <form role="form" action="<?php echo site_url('beranda/filter') ?>" method="post" id="filterform">
      <div class="row" style="margin-right: 10px;margin-left: 10px;">
        <div class="col-lg-6 col-md-6 col-xs-6">
          <div class="form-group">
            <label>mulai tanggal </label>

            <div class="input-group date">
              <div class="input-group-addon">
                <i class="fa fa-calendar"></i>
              </div>
              <input required="true" type="text" name="startdate" class="form-control pull-right" id="datepicker" value="">
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
              <input required="true" type="text" name="enddate" class="form-control pull-right" id="dateend" value="" >
            </div>
            <!-- /.input group -->
          </div>
        </div>
      </div>
      <div class="row" style="margin-right: 10px;">
        <div class="col-lg-12 col-md-12 col-xs-12" style="margin-top: -5px">
          <div class="btn-group" style="margin-left: 20px;">
            <a target="_blank" type="button" href="" class="btn btn-default"><i class="fa fa-print"></i> Cetak</a> 
          </div>
          <button type="submit" class="btn btn-success pull-right" ><i class="fa fa-filter"></i> filter</a>
      </div>
      </div>
    </form>

  </div>
</div>
</div>

<div class="box"  style="margin-top: -20px;">
  <div class="box-header">
</div>
<!-- /.box-header -->
<div class="box-body">
  <div class="table-responsive" style="margin: 10px;">
    <table id="example1" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>ID Kunjungan</th>
          <th class="text-center">No-POL</th>
          <th class="text-center">Jenis Kunjungan</th>
          <th class="text-center">Tanggal Kunjungan</th>
          <th class="text-center">Jam Masuk</th>
          <th class="text-center">Jam Keluar</th>
          <th class="text-center">#</th>
        </tr>
      </thead>
      <tbody>
          <tr>
           <td>a</td>
           <td>a</td>
           <td>a</td>
           <td>a</td>
           <td>a</td>
           <td>a</td>
           <td>a</td>
          </tr>
      </tbody>
    </table>
  </div>
</div>
<!-- /.box-body -->
</div>

<script type="text/javascript">
  document.getElementById('menu_surat').setAttribute("style", "display : block");
</script>