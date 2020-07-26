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
          <div class="btn-group" style="margin-left: 20px;">
            <?php if ($start != null && $end != null): ?>
              <a target="_blank" type="button" href="<?php echo site_url('beranda/cetak_filter/').$start."/".$end ?>" class="btn btn-default"><i class="fa fa-print"></i> Cetak</a> 
            <?php endif ?>
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
            <th class="text-center">NO-POL</th>
            <th class="text-center">Driver</th>
            <th class="text-center">Jenis Kunjungan</th>
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
             <td><?php echo $k->jenis_kunjungan ?></td>
             <td><?php echo date('d-m-Y', strtotime($k->tgl_kunjungan)) ?></td>
             <td><?php echo $k->jam_masuk ?></td>
             <td><?php echo $k->tgl_keluar==null ? '-' : date('d-m-Y', strtotime($k->tgl_keluar))  ?></td>
             <td><?php echo $k->jam_keluar==null ? '-' : $k->jam_keluar ?></td>
             <td>
              <?php if ($k->jam_keluar==null){ ?>
                <a  data-toggle="modal" data-target="#modalkeluar" onclick="edit('<?php echo $k->id_kunjungan ?>')" class="btn-sm btn-warning"><i class="fa fa-power-off"></i></a>
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

<!-- modal keluar -->
<div class="modal fade" id="modalkeluar">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">ID Kunjungan : <span id="id_kunjungan_keluar"></span></h4>
        </div>
        <div class="modal-body">
          <form action="<?php echo site_url('beranda/aksi_keluar_from_filter') ?>" method="post">
            <div id="non" style="margin-top: 5px;">
              <input type="text" name="id_kunjungan" id="id_form_kunjungan" hidden>
              <div class="form-group">
                <label for="exampleInputEmail1">Nomor Polisi</label>
                <input class="form-control"  type="text" disabled id="no_pol_keluar">

              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Driver</label>
                <input class="form-control" type="text" disabled id="driver_keluar">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Tanggal Kunjungan</label>
                <input class="form-control" type="text" disabled id="tgl_keluar">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Jam Masuk</label>
                <input class="form-control" type="text" disabled id="masuk_keluar">
              </div>
            </div>
            <input type="date" hidden name="startdate" value="<?php echo $start ?>">
            <input type="date" hidden name="enddate" value="<?php echo $end ?>">
          </div>
          <div class="modal-footer">
            <input type="submit" class="col-lg-12 btn btn-danger" value="selesai kunjungan">
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  document.getElementById('menu_surat').setAttribute("style", "display : block");
  
  function edit(id){
    $.ajax({
      url : "<?php echo base_url()."beranda/detil_modal/" ?>"+ id,
      type: "GET",
      dataType: "JSON",
      success: function(data)
      { 
        document.getElementById('id_kunjungan_keluar').textContent=id;
        document.getElementById('id_form_kunjungan').value=id;
        document.getElementById('no_pol_keluar').value=data.no_pol;
        document.getElementById('driver_keluar').value=data.driver;
        document.getElementById('tgl_keluar').value=data.tgl_kunjungan;
        document.getElementById('masuk_keluar').value=data.jam_masuk;

        console.log(data);
      }
    });
  }
</script>