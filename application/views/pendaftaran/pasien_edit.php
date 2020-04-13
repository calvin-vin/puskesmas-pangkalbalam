
        <!-- Begin Page Content -->
        <div class="container-fluid">          

        <div class="row pb-3 mx-auto">
	        <div class="col-md-7 offset-2">
	        	<h3 class="mb-5 text-gray-800 text-center">Form Ubah Pasien</h3>

	        	<form action="" method="post">
	        		<input type="hidden" name="id" value="<?= $pasien['id']; ?>">
        			<div class="form-group row">
					    <div class="col-md-6">
					    	<label for="nomor_pasien"><strong>Nomor Pasien</strong></label>
						    <input type="text" class="form-control" id="nomor_pasien" name="nomor_pasien"
						    value="<?= $pasien['nomor_pasien']; ?>" autocomplete="off">
						    <?= form_error('nomor_pasien', '<small class="text-danger pl-1">','</small>'); ?>
						</div>
					</div>
	        		<div class="form-group row">
					    <div class="col-md-6">
					    	<label for="nik"><strong>NIK</strong></label>
						    <input type="text" class="form-control" id="nik" name="nik" value="<?= $pasien['nik']; ?>" autocomplete="off">
						    <?= form_error('nik', '<small class="text-danger pl-1">','</small>'); ?>
					    </div>
					</div>
		          	<div class="form-group">
					    <label for="nama"><strong>Nama Lengkap</strong></label>
					    <input type="text" class="form-control" id="nama" name="nama"
					    value="<?= $pasien['nama']; ?>" autocomplete="off">
					    <?= form_error('nama', '<small class="text-danger pl-1">','</small>'); ?>
					</div>
					<div class="form-group">
						<div class="row">
						 	<div class="col">
						 		<label><strong>Jenis Kelamin</strong></label>
						 	</div>
						</div>
						<div class="row">
						 	<div class="col">
								<?php if ($pasien['jenis_kelamin'] == 'L') : ?>
									<div class="custom-control custom-radio custom-control-inline">
									  <input type="radio" id="laki-laki" name="jenis_kelamin" class="custom-control-input" value="L" checked="checked">
									  <label class="custom-control-label" for="laki-laki">Laki-laki</label>
									</div>
									<div class="custom-control custom-radio custom-control-inline">
									  <input type="radio" id="perempuan" name="jenis_kelamin" class="custom-control-input" value="P">
									  <label class="custom-control-label" for="perempuan">Perempuan</label>
									</div>
								<?php else : ?>
									<div class="custom-control custom-radio custom-control-inline">
									  <input type="radio" id="laki-laki" name="jenis_kelamin" class="custom-control-input" value="L">
									  <label class="custom-control-label" for="laki-laki">Laki-laki</label>
									</div>
									<div class="custom-control custom-radio custom-control-inline">
									  <input type="radio" id="perempuan" name="jenis_kelamin" class="custom-control-input" value="P" checked="checked">
									  <label class="custom-control-label" for="perempuan">Perempuan</label>
									</div>
								<?php endif; ?>
						 	</div>	
						</div>
						<?= form_error('jenis_kelamin', '<small class="text-danger pl-1">','</small>'); ?>
					</div>
					<div class="form-group">
					    <label for="tanggal_lahir"><strong>Tanggal Lahir</strong></label>
					    <input type="text" class="form-control" id="datepicker" name="tanggal_lahir"
					    value="<?= $pasien['tanggal_lahir']; ?>" autocomplete="off"> 
					    <?= form_error('tanggal_lahir', '<small class="text-danger pl-1">','</small>'); ?>
					</div>
					<div class="form-group">
						<div class="row">
						 	<div class="col">
						 		<label><strong>Kategori</strong></label>
						 	</div>
						</div>
						<div class="row">
						 	<div class="col">
								<?php if ($pasien['kategori'] == 'Non BPJS') : ?>
									<div class="custom-control custom-radio custom-control-inline">
									  <input type="radio" id="non_bpjs" name="kategori" class="custom-control-input" value="Non BPJS" checked="checked">
									  <label class="custom-control-label" for="non_bpjs">Non BPJS</label>
									</div>
									<div class="custom-control custom-radio custom-control-inline">
									  <input type="radio" id="BPJS" name="kategori" class="custom-control-input" value="BPJS">
									  <label class="custom-control-label" for="BPJS">BPJS</label>
									</div>
								<?php else: ?>
									<div class="custom-control custom-radio custom-control-inline">
									  <input type="radio" id="non_bpjs" name="kategori" class="custom-control-input" value="Non BPJS">
									  <label class="custom-control-label" for="non_bpjs">Non BPJS</label>
									</div>
									<div class="custom-control custom-radio custom-control-inline">
									  <input type="radio" id="BPJS" name="kategori" class="custom-control-input" value="BPJS" checked="checked">
									  <label class="custom-control-label" for="BPJS">BPJS</label>
									</div>
								<?php endif; ?>
						 	</div>	
						</div>
						<?= form_error('kategori', '<small class="text-danger pl-1">','</small>'); ?>
					</div>
					<div class="form-group row">
					    <div class="col-md-6">
					    	<label for="hp"><strong>No. HP</strong></label>
						    <input type="text" class="form-control" id="hp" name="hp" value="<?= $pasien['hp']; ?>" autocomplete="off">
						    <?= form_error('hp', '<small class="text-danger pl-1">','</small>'); ?>
					    </div>
					</div>
					<div class="form-group">
					    <label for="alamat"><strong>Alamat</strong></label>
					    <textarea class="form-control" id="alamat" rows="3" name="alamat" autocomplete="off"><?= $pasien['alamat']; ?></textarea>
					    <?= form_error('alamat', '<small class="text-danger pl-1">','</small>'); ?>
					</div>
					<div class="form-group">
					    <button type="submit" class="btn btn-primary">Ubah</button>
					</div>
		        </form>

	        </div>
		</div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      