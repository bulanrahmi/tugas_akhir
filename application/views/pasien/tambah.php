<div class="col-md-12 top-20">
	<div class="panel">
		<div class="panel-heading"><h3>Data Pasien</h3></div>
		<div class="panel-body">
			<?php echo form_open_multipart('Pendaftaran/proses_tambah_pasien') ?>
			<div class="row">
				<div class="col-md-4">
					<span class="icon-user"> Nama Pasien</span>
					<input type="text" required="" name="nama_pasien" id="nama_pasien" class="form-control">
				</div>

				<div class="col-md-4">
					<span class="fa-star-half"> NO BPJS</span>
					<input required="" type="text" name="no_bpjs" id="no_bpjs" class="form-control">
				</div>
				<div class="col-md-4">
					<span class="fa-star-half"> NO HP</span>
					<input required="" type="text" name="no_hp" id="no_hp" class="form-control">
				</div>
			</div>

			<div class="row">
				<div class="col-md-6">
					<span class="icon-user"> Alamat</span>
					<textarea name="alamat" required="" class="form-control" id="alamat"></textarea>
				</div>
			</div>
			<hr>
			<div class="row">
				<div class="col-md-6">
					<span class="icon-user"> Username</span>
					<input type="text" required="" name="uname" id="uname" class="form-control">
				</div>

				<div class="col-md-6">
					<span class="fa-star-half"> Password</span>
					<input required="" type="text" name="password" id="password" class="form-control">
				</div>
			</div>
			<hr>
			<button type="submit" name="submit" class="btn btn-primary">Simpan data pasien</button>
			<a href="<?= site_url('pendaftaran/pasien') ?>" class="btn btn-warning">Batal</a>
			<?php echo form_close(); ?>

		</div>
	</div>
</div>
