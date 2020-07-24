<div class="box box-primary">
  <div class="box-header">
    <style type="text/css" media="screen">
      .margin-header{
        margin-top: 10px;
        margin-bottom: -20px;
      }
    </style>
    <form action="<?php echo site_url('master/input_merek/') ?>" method="post" accept-charset="utf-8">
      <div class="col-lg-4 col-md-4 col-xs-12 margin-header">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="merek kendaraan" name="merek" required>
        </div> 
      </div>
      <div class="col-lg-4 col-md-4 col-xs-12 margin-header">
        <button type="submit" class="btn bg-purple col-lg-4 col-md-4 col-xs-12">Tambah</button>
      </div>
    </form>
  </div>
  <div class="box-body" style="padding: 22px;">
    <table id="example2" class="table table-bordered table-hover table-responsive">
      <thead style="background: #605ca8; color: #ffffff;">
        <tr>
          <th>Kode</th>
          <th>Merek</th>
          <th class="text-center">#</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($merek as $m): ?>
          <tr>
          <td><?php echo $m->id_merek ?></td>
          <td><?php echo $m->merek ?>
          </td>
          <td class="text-center"><a onclick='return confirm("Hapus Data ini?")' href="<?php echo site_url('master/hapus_merek/').$m->id_merek ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a></td>
        </tr>
        <?php endforeach ?>
      </tbody>
    </table>
  </div>
</div>

<script type="text/javascript">
  document.getElementById('menu_master').setAttribute("style", "display : block");
</script>