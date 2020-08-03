<!-- general form elements disabled -->
<div class="row">
  <div class="col">
    <div class="col-lg-4 col-md-12">
      <div class="box"  style="padding: 10px;">
        <div class="box-header with-border">
          <h3 class="box-title pull-right">Data Perusahaan</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <form role="form" method="post" action="<?php echo site_url('master/input_perusahaan/') ?>">
            <!-- text input -->
            <div class="form-group">
              <label>Nama Perusahaan</label>
              <input type="text" class="form-control" placeholder="Nama PT" name="nama_perusahaan" required>
            </div> 
            <!-- textarea -->
            <div class="form-group">
              <label>Deskripsi (optional)</label>
              <textarea class="form-control" rows="3" placeholder="Deskripsi perusahaan" name="deskripsi_perusahaan"></textarea>
            </div>
            <button type="submit" class="btn bg-purple"><i class="fa fa-save"></i>Simpan</button>
          </form>
        </div>
        <!-- /.box-body -->
      </div>
    </div>
    <!-- /.box -->

    <div class="col-lg-8 col-md-12">
      <div class="box"  style="padding: 10px;">
        <div class="box-header">

        </div>
        <div class="box-body">
          <table class="table table-bordered table-striped"  id="example1">
            <thead>
              <th>no</th>
              <th>nama perusahaan</th>
              <th>Deskripsi</th>
            </thead>
            <tbody>
              <?php 
              $no = 1;
              foreach ($perusahaan as $p): ?>
                <tr>
                  <td><?php echo $no++ ?></td>
                  <td><a style="cursor: pointer;" onclick="detil_perusahaan('<?php echo $p->id_perusahaan ?>')" data-toggle="modal" data-target="#modaledit"><?php echo $p->nama_perusahaan ?></a></td>
                  <td><?php echo $p->deskripsi_perusahaan ?></td>
                </tr>
              <?php endforeach ?>
            </tbody>
          </table>
        </div>
        <!-- /.box-body -->
      </div>
    </div>
  </div>
</div>

<!-- MODAL -->
<div class="modal fade" id="modaledit">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Detil Perusahaan</span></h4>
        </div>
        <div class="modal-body">
          <form role="form" method="post" action="<?php echo site_url('master/update_perusahaan/') ?>">
            <div class="form-group">
             <div class="form-group">
              <input type="text" class="form-control" placeholder="id perusahaan" name="id_perusahaan"  id="id_perusahaan">
            </div> 
            <div class="form-group">
              <label>Nama Perusahaan</label>
              <input type="text" class="form-control" placeholder="Nama Perusahaan" name="nama_perusahaan" required id="nama_perusahaan">
            </div> 
            <div class="form-group">
              <label>Deskripsi</label>
              <input type="text" class="form-control" placeholder="Deskripsi Perusahaan" name="deskripsi_perusahaan" id="deskripsi_perusahaan" >
            </div> 
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn bg-purple pull-left" style="margin-top: 10px;"><i class="fa fa-save"></i> Simpan perubahan</button>
            <a id="bt_hapus" onclick="return confirm('anda akan menghapus data ini?')" class="btn btn-default" style="margin-top: 10px;"><i class="fa fa-trash"></i> Hapus</a>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>



<script type="text/javascript">
  document.getElementById('menu_master').setAttribute("style", "display : block");

  function detil_perusahaan(id)
  {
    $.ajax({
      url : "<?php echo base_url()."master/detil_perusahaan/" ?>"+ id,
      type: "GET",
      dataType: "JSON",
      success: function(data)
      { 
        document.getElementById('id_perusahaan').value = data.id_perusahaan;
        document.getElementById('nama_perusahaan').value = data.nama_perusahaan;
        document.getElementById('deskripsi_perusahaan').value = data.deskripsi_perusahaan;
        document.getElementById('bt_hapus').setAttribute("href", "<?php echo site_url('master/hapus_perusahaan/') ?>"+data.id_perusahaan);
      //console.log(data);
    }
  });
  }
</script>