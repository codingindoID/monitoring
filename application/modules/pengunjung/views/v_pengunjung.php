<div class="box"  style="margin-top: -10px;">
  <div class="box-header" style="margin-left: 5px;margin-right: 5px;">
    <div class="btn-group" style="margin-right: 10px;margin-bottom: -10px;">
      <a data-toggle="modal" data-target="#modalinput" class="btn-sm btn-success" href="#"><i class="fa fa-plus"></i> Pengunjung</a>
      <!--  <a href="" class="btn btn-success"><i class="fa fa-print"></i> cetak</a> -->
    </div>
  </div>
  <!-- /.box-header -->
  <div class="box-body" style="margin-left: 5px;margin-right: 5px;">
    <div class="table-responsive" style="margin: 10px;">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>No</th>
            <th class="text-center">NO-POL</th>
            <th class="text-center">Driver</th>
            <th class="text-center">Tgl Terdaftar</th>
            <th class="text-center">Tgl Update</th>
            <th class="text-center">Total Kunjungan</th>
            <th class="text-center">#</th>
          </tr>
        </thead>
        <tbody>
          <?php 
          $no = 1;
          foreach ($kunjungan as $k): ?>
            <tr>
             <td><?php echo $no++ ?></td>
             <td><?php echo $k['no_pol'] ?></td>
             <td><?php echo $k['driver'] ?></td>
             <td><?php echo date('d-m-Y', strtotime($k['tgl_terdaftar']))  ?></td>
             <td><?php echo date('d-m-Y', strtotime($k['tgl_update'])) ?></td>
             <td class="text-center"><?php  echo $k['total_kunjungan']." kali" ?></td>
             <td class="text-center">
               <a href="#" data-toggle="modal" data-target="#modalupdate"  onclick="update('<?php echo $k["no_pol"] ?>')" class="btn-sm btn-success"><i class="fa fa-pencil"></i>edit</a>
               <a onclick="return confirm('Anda akan menghapus data ?')" href="<?= site_url('pengunjung/hapus/').$k['no_pol'] ?>"class="btn-sm btn-danger"><i class="fa fa-trash"></i>hapus</a>
             </td>
           </tr>
         <?php endforeach ?>
       </tbody>
     </table>
   </div>
 </div>
 <!-- /.box-body -->
</div>

<!-- modal keluar -->
<div class="modal fade" id="modalinput">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Tambah Pengunjung Baru</span></h4>
        </div>
        <div class="modal-body">
          <form action="<?php echo site_url('pengunjung/tambah_pengunjung') ?>" method="post">
            <div id="non" style="margin-top: 5px;">
              <div class="form-group">
                <label for="exampleInputEmail1">Nomor Polisi</label>
                <input class="form-control"  type="text" id="no_pol" name="no_pol" required>

              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Driver</label>
                <input class="form-control" type="text" id="driver" name="driver" required>
              </div>
            </div>
            <div class="modal-footer">
              <input type="submit" class="col-lg-12 btn bg-purple" value="Simpan Data"></input>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- modal update -->
  <div class="modal fade" id="modalupdate">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Edit Pengunjung </span></h4>
          </div>
          <div class="modal-body">
            <form action="<?php echo site_url('pengunjung/update_pengunjung') ?>" method="post">
              <div id="non" style="margin-top: 5px;">
               <input hidden type="text" id="no_pol_update" name="no_pol_update">
               <div class="form-group">
                <label for="exampleInputEmail1">Nomor Polisi</label>
                <input class="form-control"  type="text" id="no_pol_display" disabled>
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Driver</label>
                <input class="form-control" type="text" id="driver_update" name="driver_update" required>
              </div>
            </div>
            <div class="modal-footer">
              <input type="submit" class="col-lg-12 btn bg-purple" value="Simpan Data"></input>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>


  <script type="text/javascript">
    function update(id){
      $.ajax({
        url : "<?php echo base_url()."pengunjung/detil_modal/" ?>"+ id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        { 
          document.getElementById('no_pol_display').value=id;
          document.getElementById('no_pol_update').value=id;
          document.getElementById('driver_update').value=data.driver;
          document.getElementById('tgl_keluar').value=data.tgl_kunjungan;
          document.getElementById('masuk_keluar').value=data.jam_masuk;

          console.log(data);
        }
      });
    }
  </script>

