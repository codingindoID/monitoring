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
    <div class="btn-group" style="margin-bottom: -10px;">
      <a data-toggle="modal" data-target="#modalpilih" class="btn bg-purple"><i class="fa fa-plus"></i> input</a>
      <a target="_blank" href="<?= site_url('beranda/cetak_all') ?>" class="btn btn-success"><i class="fa fa-print"></i> cetak</a>
    </div>
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
            <th class="text-center">Tanggal Keluar</th>
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
             <td><?php echo $k->tgl_keluar==null ? '-' : date('d-m-Y', strtotime($k->tgl_keluar))  ?></td>
             <td><?php echo $k->jam_keluar==null ? '-' : $k->jam_keluar?></td>
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

<!-- pilih jenis kunjungan -->
<div class="modal fade" id="modalpilih">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Pilih jenis kunjungan</h4>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col" style="margin-right: 25px;margin-left: 25px;">
             <a href="#" data-toggle="modal" data-target="#modal-default" data-dismiss="modal" class="btn btn-success col-lg-12 col-xs-12">KUNJUNGAN RUTIN</a>
           </div>
         </div>
         <div class="row">
          <div class="col" style="margin-right: 25px;margin-left: 25px; margin-top: 15px;">
            <a href="#" class="btn btn-warning col-lg-12 col-xs-12" data-toggle="modal" data-target="#modal-non" data-dismiss="modal">KUNJUNGAN NON RUTIN</a>
          </div>
        </div>
      </div>
      <div class="modal-footer">

      </div>
    </div>
  </div>
</div>

<!-- KUNJUNGAN RUTIN MASUK -->
<div class="modal fade" id="modal-default">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Input Kunjungan Rutin</h4>
        </div>
        <div class="modal-body">
          <form action="<?php echo site_url('beranda/aksi_input') ?>" method="post">
            <div id="rutin" class="form-group" style="margin-top: 5px;">
              <label for="exampleInputEmail1">Nomor Polisi</label>
              <!-- <input class="form-control"  type="text" name="nopol_rutin"> -->
              <select name="no_pol" id="select_nopol" onchange="select()" class="form-control select2" style="width: 100%;" required>
               <option value="">---no pol---</option>
               <?php foreach ($kendaraan as $k): ?>
                <option value="<?php echo $k->no_pol ?>"><?php echo $k->no_pol ?></option>
              <?php endforeach ?>
            </select>
          </div>
          <input type="text" name="jenis" value="rutin" hidden>
          <div id="data_Detil" hidden>
            <center><strong>Detil Kendaraan</strong></center>
            <div class="form-group">
              <label>Merek</label>
              <input type="text" class="form-control" placeholder="Merek" id="merek" name="merek" disabled>
            </div> 
            <div class="form-group">
              <label>Seri</label>
              <input type="text" class="form-control" placeholder="Seri" id="seri" name="seri" disabled>
            </div> 
            <div class="form-group">
              <label>Warna</label>
              <input type="text" class="form-control" placeholder="Warna" id="warna" name="warna" disabled>
            </div> 
            <div class="form-group">
              <label>Driver</label>
              <input type="text" class="form-control" placeholder="driver" id="driver" name="driver" disabled>
            </div> 
          </div>

        </div>
        <!-- end body -->
        <div class="modal-footer">
          <input type="submit" class="col-lg-12 btn bg-purple">
        </div>
      </form>
    </div>
  </div>
</div>
</div>

<!-- KUNJUNGAN NON RUTIN MASUK -->
<div class="modal fade" id="modal-non">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Input Kunjungan <strong>NON</strong> Rutin</h4>
        </div>
        <div class="modal-body">
          <form action="<?php echo site_url('beranda/aksi_input') ?>" method="post">
           <div class="form-group">
            <label>Nomor Polisi</label>
            <input type="text" class="form-control" placeholder="NoPol" id="no pol" name="no_pol">
          </div> 
          <div class="form-group">
            <label>Driver/pemilik</label>
            <input type="text" class="form-control" placeholder="Driver/pemilik" id="pemilik" name="pemilik">
          </div> 
          <div class="form-group">
            <label>Perusahaan</label>
            <input type="text" class="form-control" placeholder="Perusahaan" id="pemilik" name="perusahaan">
          </div> 
        </div>
        <input type="text" name="jenis" value="non_rutin" hidden>
        <!-- end body -->
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
/*menangkap data change kunjungan rutin*/
function select()
{
 var j = document.getElementById('select_nopol');
 var no_pol = j.options[j.selectedIndex].value;
 $.ajax({
  url : "<?php echo base_url()."beranda/detil_kendaraan/" ?>"+ no_pol,
  type: "GET",
  dataType: "JSON",
  success: function(data)
  {
    document.getElementById('data_Detil').hidden = false;
    document.getElementById('merek').value = data.merek;
    document.getElementById('seri').value = data.seri;
    document.getElementById('warna').value = data.warna;
    document.getElementById('driver').value = data.pemilik;
  },
  error: function (jqXHR, textStatus, errorThrown)
  {
    alert('Anda Belum Memilih Nomor Polisi Kendaraan');
    document.getElementById('data_Detil').hidden = true;
  }
});
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
