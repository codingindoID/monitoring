<style>
  .example-modal .modal {
    position: relative;
    top: auto;
    bottom: auto;
    right: auto;
    left: auto;
    display: block;
    z-index: 1;
  }

  .example-modal .modal {
    background: transparent !important;
  }
</style>
<div class="box"  style="margin-top: -10px;">
  <div class="box-header" style="margin-left: 5px;margin-right: 5px;">
  </div>
  <!-- /.box-header -->
  <div class="box-body" style="margin-left: 5px;margin-right: 5px;">
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
            <th class="text-center">Jam Keluar</th>
            <th class="text-center">#</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($kunjungan as $k): ?>
            <tr>
             <td><?php echo $k->id_kunjungan ?></td>
             <td><?php echo $k->no_pol ?></td>
             <td><?php echo $k->driver ?></td>
             <td><?php echo $k->jenis_kunjungan ?></td>
             <td><?php echo date('d-m-Y', strtotime($k->tgl_kunjungan)) ?></td>
             <td><?php echo $k->jam_masuk ?></td>
             <td><?php echo $k->jam_keluar ?></td>
             <td>
              <?php if ($k->jam_keluar==null){ ?>
                <a  data-toggle="modal" data-target="#modalkeluar" onclick="edit('<?php echo $k->id_kunjungan ?>')" class="btn-sm btn-warning"><i class="fa fa-power-off"></i></a>
              <?php }else{ ?>
                 <a class="btn-sm btn-success"><i class="fa fa-check"></i></a>
              <?php } ?> 
            </td>
          </tr>
        <?php endforeach ?>
      </tbody>
    </table>
  </div>
</div>
<!-- /.box-body -->
</div>

<script type="text/javascript">
  document.getElementById('menu_surat').setAttribute("style", "display : block");
</script>
<div class="modal fade" id="modal-default">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Input Kunjungan</h4>
        </div>
        <div class="modal-body">
          <form action="<?php echo site_url('beranda/aksi_input') ?>" method="post">
            <div class="form-group">
              <label>Jenis Kunjungan</label>
              <select id="kunjungan" onchange="change()" class="form-control" name="jenis">
                <option value="">--opt--</option>
                <option value="rutin">Rutin</option>
                <option value="non-rutin">Non Rutin</option>
              </select>
              <div id="rutin" hidden class="form-group" style="margin-top: 5px;">
                <label for="exampleInputEmail1">Nomor Polisi</label>
                <input class="form-control"  type="text" name="nopol_rutin">
              </div>
              <div id="non" hidden style="margin-top: 5px;">
                <div class="form-group">
                  <label for="exampleInputEmail1">Nomor Polisi</label>
                  <input class="form-control"  type="text" name="nopol_non">

                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Driver</label>

                  <input class="form-control"  type="text" name="driver">
                </div>
              </div>

            </div>
            <div class="modal-footer">
              <input type="submit" class="col-lg-12 btn bg-purple">
            </div>
          </form>
        </div>
      </div>
    </div>
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
            <form action="<?php echo site_url('beranda/aksi_keluar') ?>" method="post">
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

            </div>
            <div class="modal-footer">
              <input type="submit" class="col-lg-12 btn btn-danger" value="selesai kunjungan">
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <script>
    function change(){
     var j = document.getElementById('kunjungan');
     var str = j.options[j.selectedIndex].value;
     if (str=='rutin') {
      var obj = document.getElementById('rutin');
      var obj2 = document.getElementById('non');
      obj.hidden = false;
      obj2.hidden = true;
    }else if(str=='non-rutin'){
      var obj = document.getElementById('non');
      var obj2 = document.getElementById('rutin');
      obj.hidden = false;
      obj2.hidden = true;
    }else{
      alert('anda blm memilih');
    }
  }

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
