<div class="box">
	<div class="box-body">
		<form role="form" method="post" action="<?php echo site_url('master/update_data_kendaraan/') ?>">
			<div class="form-group">
				<input type="text" name="id_data" value="<?php echo $kendaraan->id_data ?>" hidden>
				<div class="form-group col-xs-6">
					<label>Nomor Polisi</label>
					<input value="<?php echo $kendaraan->no_pol ?>" type="text" class="form-control" placeholder="Nomor Polisi" name="nopol" disabled >
				</div> 
				<div class="form-group col-xs-6">
					<label>Pemilik / Driver</label>
					<input value="<?php echo $kendaraan->pemilik ?>" type="text" class="form-control" placeholder="Nama Pemilik" name="pemilik" required>
				</div> 
				<div class="form-group col-xs-12">
					<label>Perusahaan</label>
					<select name="perusahaan" class="form-control select2" style="width: 100%;" required>
						<option value="">--Perusahaan--</option>
						<?php 
						$no = 1;
						foreach ($perusahaan as $p): ?>
							<option <?php echo $p->id_perusahaan==$kendaraan->perusahaan ? 'selected' : ''?> value="<?php echo $p->id_perusahaan ?>"><?php echo $p->nama_perusahaan ?></option>
						<?php endforeach ?>
					</select>
				</div>
				<div class="form-group  col-xs-6">
					<label>Jenis</label>
					<select name="jenis" class="form-control select2" style="width: 100%;" required>
						<option value="">---Jenis---</option>
						<option value="mobil" <?php echo 'mobil'==$kendaraan->jenis ? 'selected' : ''?>>Mobil</option>
						<option value="motor" <?php echo $kendaraan->jenis=='motor' ? 'selected' : ''?>>Motor</option>
						<option value="mobil box"  <?php echo $kendaraan->jenis=='mobil box' ? 'selected' : ''?>>Mobil Box</option>
						<option value="Lainnya" <?php echo $kendaraan->jenis=='Lainnya' ? 'selected' : ''?>>Lainnya</option>
					</select>
				</div>
				<div class="form-group  col-xs-6">
					<label>Merk</label>
					<select name="merek" class="form-control select2" style="width: 100%;" required>
						<option value="">---Merk---</option>
						<?php foreach ($merek as $m): ?>
							<option value="<?php echo $m->id_merek ?>" <?php echo $m->id_merek==$kendaraan->id_merek ? 'selected' : ''?>><?php echo $m->merek ?></option>}
							option
						<?php endforeach ?>
					</select>
				</div>
				<div class="form-group  col-xs-6">
					<label>Seri</label>
					<input value="<?php echo $kendaraan->seri ?>" type="text" class="form-control" placeholder="Seri" name="seri" required>
				</div> 
				<div class="form-group  col-xs-6">
					<label>Warna</label>
					<input value="<?php echo $kendaraan->warna ?>" type="text" class="form-control" placeholder="warna" name="warna" required>
				</div> 
				<div class="form-group  col-xs-6">
					<label>Kepemilikan</label>
					<select name="kepemilikan" class="form-control" style="width: 100%;" required>
						<option value="">---Kepemilikan---</option>
						<option value="1" <?php echo $kendaraan->id_kepemilikan=='1' ? 'selected' : ''?>>Pribadi</option>
						<option value="2" <?php echo $kendaraan->id_kepemilikan=='2' ? 'selected' : ''?>>Operasional</option>    
					</select>
				</div>
				<div class="form-group  col-xs-6">
					<label>Date Expired</label>
					<div class="input-group date">
						<div class="input-group-addon">
							<i class="fa fa-calendar"></i>
						</div>
						<input  required="true" name="dateexp"  type="text" class="form-control pull-right" id="datepicker" value="<?php echo date('d-F-Y' ,strtotime($kendaraan->tgl_kadaluwarsa)) ?>">
					</div>
				</div>
			</div>
		</div>
		<div class="modal-footer">
			<button type="submit" class="btn bg-purple pull-left"><i class="fa fa-save"></i> Simpan Perubahan</button>
			<a href="<?php echo site_url('master/hapus_data_kendaraan/').$kendaraan->id_data ?>" class="btn btn-danger pull-right"><i class="fa fa-trash"></i> Hapus Data</a>
		</div>
	</form>
</div>
