  <!-- general form elements disabled -->
  <div class="row">
    <div class="col">
      <div class="col-lg-4 col-md-12">
        <div class="box"  style="padding: 10px;">
          <div class="box-header with-border">
            <h3 class="box-title pull-right">Data Pegawai</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <form role="form" method="post" action="<?php echo site_url('master/input_perusahaan/') ?>">
              <!-- text input -->
              <div class="form-group">
                <label>Nama</label>
                <input type="text" class="form-control" placeholder="Nama PT" name="nama_perusahaan" required>
              </div> 
              <!-- select -->
               <div class="form-group">
                <label>Minimal</label>
                <select class="form-control select2" style="width: 100%;">
                  <option selected="selected">Alabama</option>
                  <option>Alaska</option>
                  <option>California</option>
                  <option>Delaware</option>
                  <option>Tennessee</option>
                  <option>Texas</option>
                  <option>Washington</option>
                </select>
              </div>
              <button type="submit" class="btn bg-purple">Simpan</button>
            </form>
          </div>
          <!-- /.box-body -->
        </div>
      </div>
      <!-- /.box -->

      <div class="col-lg-8 col-md-12">
        <div class="box"  style="padding: 10px;">
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
                  <td><a style="cursor: pointer;" onclick="alert('<?php echo $p->id_perusahaan ?>')"><?php echo $p->nama_perusahaan ?></a></td>
                  <td><?php echo $p->deskripsi_perusahaan ?></td>
                </tr>
              <?php endforeach ?>
            </tbody>
          </table>
          <!-- /.box-body -->
        </div>
      </div>
    </div>
  </div>

  <script type="text/javascript">
    document.getElementById('menu_master').setAttribute("style", "display : block");
  </script>