<div class="box">
	<div class="box-header"></div>
	<div class="box-body">
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
               <option value="">---Merk---</option>
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