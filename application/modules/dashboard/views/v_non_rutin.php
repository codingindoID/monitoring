<div class="box">
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
          <?php 
          $pesan_hapus = "'apakah anda akan menghapus data ini?'";
          foreach ($kunjungan as $k): ?>
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