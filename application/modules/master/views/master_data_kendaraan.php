<div class="box">
  <div class="box-header">
    <a href="#" class="btn bg-purple" data-toggle="modal" data-target="#modaladd"><i class="fa fa-plus"></i> Tambah Data</a>
  </div>
  <div class="box-body">
    <div class="table-responsive">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>Kode</th>
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
          <tr>
            <td><a href="#">data</a></td>
            <td>data</td>
            <td>data</td>
            <td>data</td>
            <td>data</td>
            <td>data</td>
            <td>data</td>
            <td>data</td>
            <td>data</td>
          </tr>
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
             <div class="form-group">
              <label>Nomor Polisi</label>
              <input type="text" class="form-control" placeholder="Nomor Polisi" name="nopol" required>
            </div> 
            <div class="form-group">
              <label>Pemilik / Driver</label>
              <input type="text" class="form-control" placeholder="Nama Pemilik" name="pemilik" required>
            </div> 
            <div class="form-group">
              <label>Perusahaan</label>
              <select name="perusahaan" class="form-control select2" style="width: 100%;" required>
               <option value="">--Perusahaan--</option>
               <?php 
               $no = 1;
               foreach ($perusahaan as $p): ?>
                 <option value="<?php echo $p->id_perusahaan ?>"><?php echo $p->nama_perusahaan ?></option>
               <?php endforeach ?>
             </select>
           </div>
           <div class="form-group">
             <label>Jenis</label>
             <select name="jenis" class="form-control select2" style="width: 100%;" required>
               <option value="">---Jenis---</option>
               <option value="mobil">Mobil</option>
               <option value="motor">Motor</option>
               <option value="mobil box">Mobil Box</option>
               <option value="Lainnya">Lainnya</option>
             </select>
           </div>
           <div class="form-group">
             <label>Merk</label>
             <select name="merek" class="form-control select2" style="width: 100%;" required>
               <option value="">---Merk---</option>
               <?php foreach ($merek as $m): ?>
                 <option value="<?php echo $m->id_merek ?>"><?php echo $m->merek ?></option>}
                 option
               <?php endforeach ?>
             </select>
           </div>
           <div class="form-group">
            <label>Seri</label>
            <input type="text" class="form-control" placeholder="Seri" name="seri" required>
          </div> 
         <div class="form-group">
            <label>Warna</label>
            <input type="text" class="form-control" placeholder="warna" name="warna" required>
          </div> 
          <div class="form-group">
             <label>Kepemilikan</label>
             <select name="kepemilikan" class="form-control" style="width: 100%;" required>
               <option value="">---Kepemilikan---</option>
               <option value="1">Pribadi</option>
               <option value="2">Operasional</option>    
             </select>
           </div>
         <div class="form-group">
          <label>Date Expired</label>

          <div class="input-group date">
            <div class="input-group-addon">
              <i class="fa fa-calendar"></i>
            </div>
            <input  required="true" name="dateexp"  type="text" class="form-control pull-right" id="datepicker">
          </div>
        </div>
        <button type="submit" class="btn bg-purple" style="margin-top: 10px;"><i class="fa fa-save"></i> Simpan</button>
      </form>
    </div>
  </div>
</div>
</div>




<!-- <form role="form" method="post" action="<?php echo site_url('master/input_driver/') ?>">
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
</form> -->