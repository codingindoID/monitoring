<style type="text/css">
  .img_qr{
    width: 50% ;
    height:  auto ;
  }
</style>
<div class="box">
<!--   <div class="box-header">
    <div class="btn-group">
      <a href="#" class="btn bg-purple" data-toggle="modal" data-target="#modaladd"><i class="fa fa-plus"></i> Tambah</a>
      <a href="#" class="btn btn-success"><i class="fa fa-print"></i> Cetak</a>
    </div>
  </div> -->
  <div class="box-body">
    <div class="table-responsive">
      <table id="tb4" class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>Kode Register</th>
            <th class="text-center">QR CODE</th>
            <th>No-Pol</th>
            <th>Driver</th>
            <th>Perusahaan</th>
            <th>Jenis</th>
            <th>Merek</th>
            <th>Seri</th>
            <th>DateReg</th>
            <th>DateExp</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($kendaraan as $k): ?>
            <tr>
              <td><a href="<?php echo site_url('master/edit_kendaraan/').$k->id_data ?>"><?php  echo $k->id_data ?></a></td>
              <td style="word-break:break-all;" width="10%" class="text-center"><a target="_blank" href="<?php echo base_url('assets/image/qr_code/').$k->qr_code ?>"><img class="img_qr" src="<?php  echo base_url().'assets/image/qr_code/'.$k->qr_code ?>"></a></td>
              <td><?php  echo $k->no_pol ?></td>
              <td><?php  echo $k->pemilik ?></td>
              <td><?php  echo $k->perusahaan ?></td>
              <td><?php  echo $k->jenis ?></td>
              <td><?php  echo $k->merek ?></td>
              <td><?php  echo $k->seri ?></td>
              <td><?php  echo date('d-m-Y',strtotime($k->tgl_teregistrasi)) ?></td>
              <td><?php  echo date('d-m-Y',strtotime($k->tgl_kadaluwarsa)) ?></td>
            </tr>
          <?php endforeach ?>
        </tbody>
      </table>
    </div>
  </div>

</div>


<!-- MODAL -->
<div class="modal fade" id="modaladd">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Tambah Data Kendaraan</span></h4>
        </div>
        <div class="modal-body">
          <form role="form" method="post" action="<?php echo site_url('master/input_data_kendaraan/') ?>">
            <div class="form-group">
             <div class="form-group col-xs-6">
              <label>Nomor Polisi</label>
              <input type="text" class="form-control" placeholder="Nomor Polisi" name="nopol" required>
            </div> 
            <div class="form-group col-xs-6">
              <label>Pemilik / Driver</label>
              <input type="text" class="form-control" placeholder="Nama Pemilik" name="pemilik" required>
            </div> 
            <div class="form-group col-xs-12">
              <label>Perusahaan</label>
              <select name="perusahaan" class="form-control select2" style="width: 100%;" required>
               <option value="">--Perusahaan--</option>
               <?php 
               $no = 1;
               foreach ($perusahaan as $p): ?>
                 <option value="<?php echo $p->nama_perusahaan ?>"><?php echo $p->nama_perusahaan ?></option>
               <?php endforeach ?>
             </select>
           </div>
           <div class="form-group  col-xs-6">
             <label>Jenis</label>
             <select name="jenis" class="form-control select2" style="width: 100%;" required>
               <option value="">---Jenis---</option>
               <option value="mobil">Mobil</option>
               <option value="motor">Motor</option>
               <option value="mobil box">Mobil Box</option>
               <option value="Lainnya">Lainnya</option>
             </select>
           </div>
           <div class="form-group  col-xs-6">
             <label>Merk</label>
             <select name="merek" class="form-control select2" style="width: 100%;" required>
               <option value="">---Merek---</option>
               <?php foreach ($merek as $m): ?>
                 <option value="<?php echo $m->id_merek ?>"><?php echo $m->merek ?></option>}
                 option
               <?php endforeach ?>
             </select>
           </div>
           <div class="form-group  col-xs-6">
            <label>Seri</label>
            <input type="text" class="form-control" placeholder="Seri" name="seri" required>
          </div> 
          <div class="form-group  col-xs-6">
            <label>Warna</label>
            <input type="text" class="form-control" placeholder="warna" name="warna" required>
          </div> 
          <div class="form-group  col-xs-6">
           <label>Kepemilikan</label>
           <select name="kepemilikan" class="form-control" style="width: 100%;" required>
             <option value="">---Kepemilikan---</option>
             <option value="1">Pribadi</option>
             <option value="2">Operasional</option>    
           </select>
         </div>
         <div class="form-group  col-xs-6">
          <label>Date Expired</label>
          <div class="input-group date">
            <div class="input-group-addon">
              <i class="fa fa-calendar"></i>
            </div>
            <input  required="true" name="dateexp"  type="text" class="form-control pull-right" id="datepicker">
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn bg-purple col-xs-12" style="margin-top: 10px;"><i class="fa fa-save"></i> Simpan</button>
      </div>
    </form>
  </div>
</div>
</div>
</div>

<script type="text/javascript">
  document.getElementById('menu_master').setAttribute("style", "display : block");
</script>