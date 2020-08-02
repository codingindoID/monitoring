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

     <form role="form" action="<?php echo site_url('beranda/filter_on') ?>" method="post" id="filterform">
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
    <div class="table-responsive" style="margin-top: -20px;">
      <table id="example3" class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>ID Kunjungan</th>
            <th class="text-center">NO-POL</th>
            <th class="text-center">Driver</th>
            <th class="text-center">Perusahaan</th>
            <th class="text-center">Tanggal Kunjungan</th>
            <th class="text-center">Jam Masuk</th>
            <th class="text-center">Tanggal Keluar</th>
            <th class="text-center">Jam Keluar</th>
            <th class="text-center">#</th>
          </tr>
        </thead>
        <tbody>
          <?php if ($kunjungan==null){ ?>
           <tr>
             <td></td>
             <td></td>
             <td></td>
             <td></td>
             <td></td>
             <td></td>
             <td></td>
             <td></td>
             <td></td>
           </tr>
         <?php }else{ ?>
          <?php foreach ($kunjungan as $k): ?>
           <tr>
             <td><?php echo $k->id_kunjungan ?></td>
             <td><?php echo $k->no_pol ?></td>
             <td><?php echo $k->driver ?></td>
             <td><?php echo $k->perusahaan ?></td>
             <td><?php echo date('d-m-Y', strtotime($k->tgl_kunjungan)) ?></td>
             <td><?php echo $k->jam_masuk ?></td>
             <td><?php echo $k->tgl_keluar==null ? '-' : date('d-m-Y', strtotime($k->tgl_keluar))  ?></td>
             <td><?php echo $k->jam_keluar==null ? '-' : $k->jam_keluar ?></td>
             <td>
              <?php if ($k->jam_keluar==null){ ?>
                <a class="btn-sm btn-warning"><i class="fa fa-power-off"></i></a>
              <?php }else{ ?>
               <a class="btn-sm btn-success"><i class="fa fa-check"></i></a>
             <?php } ?> 
           </td>
         <?php endforeach ?>
       <?php } ?>

     </tbody>
   </table>
 </div>
</div>
<!-- /.box-body -->
</div>