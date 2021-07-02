<div class="panel box-shadow-none content-header">
	<div class="panel-body">
		<?php echo form_open('Pendaftaran/add'); ?>

		<div class="col-md-4">
			<h3 class="animated fadeInLeft">Nama pasien</h3>
			<p class="animated fadeInDown">
				<input type="hidden" name="id_pasien" value="<?=$this->session->userdata('id_user');?>">
				<input type="text" class="form-control" name="nama_pasien" value="<?=$this->session->userdata('nama_pasien');?>" disabled>
			</p>
		</div>
		<div class="col-md-4">
			<h3 class="animated fadeInLeft">Nomor BPJS</h3>
			<p class="animated fadeInDown">
				<input type="text" name="nomor_bpjs" value="<?=$this->session->userdata('no_BPJS');?>" class="form-control nomor_bpjs" disabled>
			</p>
		</div>

		<div class="col-md-4">
			<h3 class="animated fadeInLeft">Alamat</h3>
			<p class="animated fadeInDown">
				<input type="text" name="alamat" class="form-control alamat" disabled value="<?=$this->session->userdata('alamat');?>">
			</p>
		</div>


		<div class="col-md-4">
			<h3 class="animated fadeInLeft">Jenis paisien</h3>
			<p class="animated fadeInDown">
				<?php echo cmb_dinamis('jenis_pasien', 'jenis_berobat', 'jenis_pasien', 'id') ?>
			</p>
		</div>
		<div class="col-md-4">
			<h3 class="animated fadeInLeft">Tanggal</h3>
			<p class="animated fadeInDown">
				<input type="date" required="" name="tanggal" class="form-control">
			</p>
		</div>


		<div class="col-md-4">
			<h3 class="animated fadeInLeft">Keterangan</h3>
			<p class="animated fadeInDown">
				<textarea name="keterangan" required="" class="form-control"></textarea>
			</p>
		</div>

		<div class="col-md-12">
			<p class="animated fadeInDown">
				<button type="submit" name="submit" class="btn btn-3d ripple-infinite btn-raised btn-info btn-sm">
					Simpan Pendaftaran
				</button>
			</p>
		</div>
		<?php echo form_close(); ?>
	</div>
</div>
<div class="col-md-12 top-20 padding-0">
	<div class="col-md-12">
		<div class="panel">
			<div class="panel-heading"><h3>Data Tables</h3></div>
			<div class="panel-body">
				<div class="responsive-table">
					<table id="datatables-example" class="table table-striped table-bordered" width="100%"
						   cellspacing="0">
						<thead>
						<tr>
							<th>No</th>
							<th>Nama</th>
							<th>Tanggal</th>
							<th>Keterangan</th>
							<?php if ($this->session->userdata('level') == 'admin') : ?>
								<th>Aksi Edit</th>
								<th>Aksi Delete</th>
							<?php endif; ?>
						</tr>
						</thead>
						<tbody>
						<?php
						$no = 1;
						foreach ($daftar as $row):
							?>
							<tr>
								<td><?php echo $no; ?></td>
								<td><?php echo $row->nama_pasien; ?></td>
								<td><?php echo $row->tanggal_daftar; ?></td>
								<td><?php echo $row->keterangan; ?></td>
								<td><?php echo $row->jenis_pasien; ?></td>
								<?php if ($this->session->userdata('level') == 'admin') : ?>
									<!-- <td>
                                        <button class="btn btn-3d ripple-infinite btn-raised btn-success btn-sm" onclick="show_by_id(<?php //echo $row->id ?>)" data-toggle="modal" data-target="#exampleModal">
                                            <div>
                                                <span>Edit</span>
                                            </div>
                                        </button>
                                    </td> -->
									<td><?php echo anchor('Pendaftaran/hapus/' . $row->id, 'Hapus', array('class' => 'btn btn-3d btn-info btn-sm')) ?></td>
								<?php endif; ?>
							</tr>
							<?php
							$no++;
						endforeach;
						?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
