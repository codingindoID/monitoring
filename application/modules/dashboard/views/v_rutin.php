<div class="box" >
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
            <th class="text-center">No ID</th>
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
             <td></td>
           </tr>
         <?php }else{ ?>
          <?php 
          $pesan_hapus = "'apakah anda akan menghapus data ini?'";
          foreach ($kunjungan as $k): ?>
           <tr>
             <td><?php echo $k->id_kunjungan ?></td>
             <td><?php echo $k->no_pol ?></td>
             <td><?php echo $k->driver ?></td>
             <td><?php echo $k->sim ?></td>
             <td><?php echo $k->perusahaan ?></td>
             <td><?php echo date('d-m-Y', strtotime($k->tgl_kunjungan)) ?></td>
             <td><?php echo $k->jam_masuk ?></td>
             <td><?php echo $k->tgl_keluar==null ? '-' : date('d-m-Y', strtotime($k->tgl_keluar))  ?></td>
             <td><?php echo $k->jam_keluar==null ? '-' : $k->jam_keluar ?></td>
             <td>
              <?php if ($k->jam_keluar==null){ ?>
                <a style="cursor: pointer;" class="btn-sm btn-warning" data-toggle="modal" data-target="#modalkeluar" onclick="edit('<?php echo $k->id_kunjungan ?>')" ><i class="fa fa-power-off"></i></a>
              <?php }else{ ?>
               <a class="btn-sm btn-success"><i class="fa fa-check"></i></a>
             <?php } ?> 
             <?php echo $this->session->userdata('ses_level')=='2' ? '<a onclick="return confirm('.$pesan_hapus.')" class="btn-sm btn-danger" href="dashboard/hapus_kunjungan/'.$k->id_kunjungan.'/rutin"><i class="fa fa-trash"></i></a>' : '';?> 
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
          <form action="<?php echo site_url('dashboard/aksi_keluar') ?>" method="post">
            <div id="non" style="margin-top: 5px;">
              <input type="text" name="id_kunjungan" id="id_form_kunjungan" hidden>
              <input type="text" hidden value="1" name="jenis">
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