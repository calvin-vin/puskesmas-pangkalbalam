
        <!-- Begin Page Content -->
        <div class="container-fluid">          

        <div class="row pb-3 mx-auto">
	        <div class="col-md-7 offset-2">
	        	<h3 class="mb-5 text-gray-800 text-center">Form Ubah Pendaftaran Pasien</h3>

	        	<form action="" method="post">
	        		<input type="hidden" name="id" value="<?= $pendaftaran['id']; ?>">
        			<div class="form-group row">
					    <div class="col-md-6">
					    	<label for="nomor_pendaftaran"><strong>Nomor Pendaftaran</strong></label>
						    <input type="text" class="form-control" id="nomor_pendaftaran" name="nomor_pendaftaran" value="<?= $pendaftaran['nomor_pendaftaran']; ?>">
						    <?= form_error('nomor_pendaftaran', '<small class="text-danger pl-1">','</small>'); ?>
						</div>
					</div>
	        		<div class="form-group row">
					    <div class="col-md-6">
					    	<label for="biaya"><strong>Biaya</strong></label>
						    <input type="text" class="form-control" id="biaya" name="biaya" value="<?= $pendaftaran['biaya']; ?>" autocomplete="off">
						    <?= form_error('biaya', '<small class="text-danger pl-1">','</small><br>'); ?>
						    <small>*Masukkan angka contoh: 1000</small>
					    </div>
					</div>
					<div class="form-group">
					    <label for="tanggal_berobat"><strong>Tanggal Berobat</strong></label>
					    <input type="text" class="form-control" id="datepicker" name="tanggal_berobat"
					    value="<?= $pendaftaran['tanggal_berobat']; ?>" autocomplete="off"> 
					    <?= form_error('tanggal_berobat', '<small class="text-danger pl-1">','</small>'); ?>
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

      