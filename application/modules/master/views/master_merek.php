  <!-- /.box-header -->
  <div class="row">
      <div class="col-lg-12 col-md-12 col-xs-12">
        <div class="box">
          <div class="box-header">
            <span class="pull-right"><strong>input data baru</strong></span>
          </div>
          <form role="form" method="post" action="<?php echo site_url('master/input_driver/') ?>">
            <div class="form-group">
             <div class="form-group">
              <label>Nama</label>
              <input type="text" class="form-control" placeholder="Nama" name="nama" required>
            </div> 
            <label>Perusahaan</label>
            <select name="perusahaan" class="form-control select2" style="width: 100%;" required>
             <option value="">---perusahaan---</option>}
             option
             <?php 
             $no = 1;
             foreach ($perusahaan as $p): ?>
               <option value="<?php echo $p->id_perusahaan ?>"><?php echo $p->nama_perusahaan ?></option>
             <?php endforeach ?>
           </select>
         </div>
         <button type="submit" class="btn bg-purple"><i class="fa fa-save"></i>Simpan</button>
       </form>
     </div> 
     <div class="box-body">
      <table class="table table-bordered table-striped"  id="example1">
        <thead>
          <th>no</th>
          <th>Nama Driver</th>
          <th>Perusahaan</th>
        </thead>
        <tbody>
          <?php 
          $no = 1;
          foreach ($driver as $d): ?>
            <tr>
              <td><?php echo $no++ ?></td>
              <td><?php echo $d->nama_pegawai ?></td>
              <td><?php echo $d->nama_perusahaan ?></td>
            </tr>
          <?php endforeach ?>   
        </tbody>
      </table>
    </div>
  </div>
</div>

<script type="text/javascript">
  document.getElementById('menu_master').setAttribute("style", "display : block");
</script>