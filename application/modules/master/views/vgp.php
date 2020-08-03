<div class="box">
	<div class="box-header">
		<a class="btn btn-default" target="_blank" href="<?php echo site_url('master/cetak_all') ?>"><i class="fa fa-print"></i> Cetak semua</a>
	</div>
	<div class="box-body">
		<div class="table-responsive">
			<table id="example1">
				<thead>
					<tr>
						<th>NO_POL</th>
						<th>Driver</th>
						<th>Perusahaan</th>
						<th>Jenis Kendaraan</th>
						<th>Merek</th>
						<th>Seri</th>
						<th>Cetak</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($kendaraan as $k): ?>
						<tr>
							<td><?php echo $k->no_pol ?></td>
							<td><?php echo $k->pemilik ?></td>
							<td><?php echo $k->perusahaan ?></td>
							<td><?php echo $k->jenis ?></td>
							<td><?php echo $k->merek ?></td>
							<td><?php echo $k->seri ?></td>
							<td class="text-center"><a href="<?php echo site_url('master/cetak_satuan/').$k->no_pol ?>" class="btn bg-purple" ><i class="fa fa-print"></i></a></td>
						</tr>
					<?php endforeach ?>
					
				</tbody>
			</table>
		</div>
	</div>
</div>