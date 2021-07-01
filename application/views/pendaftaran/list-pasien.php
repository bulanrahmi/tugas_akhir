<div class="col-md-12 top-20">
	<div class="panel">
		<div class="panel-heading"><h3>Data Pasien</h3></div>
		<div class="panel-body">
			<a href="<?=site_url('Pendaftaran/tambah_pasien')?>" class="btn btn-info">Tambah Pasien</a>
			<hr>
			<div class="responsive-table">
				<table id="datatables-example" class="table table-striped table-bordered">
					<thead>
					<tr>
						<th>No</th>
						<th>Nama</th>
						<th>Alamat</th>
						<th>Nomor BPJS</th>
						<th>No. HP</th>
						<th>Aksi</th>
					</tr>
					</thead>
					<tbody>
					<?php
					$no = 1;
					foreach ($pasien as $row):
						?>
						<tr>
							<td><?php echo $no++; ?></td>
							<td><?php echo $row->nama_pasien; ?></td>
							<td><?php echo $row->alamat; ?></td>
							<td><?php echo $row->no_BPJS; ?></td>
							<td><?php echo $row->no_hp; ?></td>
							<td><?php echo anchor('Pendaftaran/hapus/' . $row->id_pasien, 'Hapus', array('class' => 'btn btn-3d btn-info btn-sm')) ?></td>

						</tr>
					<?php
					endforeach;
					?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

