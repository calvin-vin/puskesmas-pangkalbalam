
        <!-- Begin Page Content -->
        <div class="container-fluid">          

        <div class="row pb-3 mx-auto">
	        <div class="col-md-7 offset-2">
	        	<h3 class="mb-5 text-gray-800 text-center">Rujuk Pasien</h3>

	        	<form action="" method="post">
        			<div class="form-group row">
					    <div class="col-md-6">
					    	<label><strong>Nomor Rekam Medis</strong></label>
						    <input type="text" class="form-control" value="<?= $rekam_medis['nomor_rekam_medis']; ?>" disabled>
						</div>
					</div>
	        		<div class="form-group row">
					    <div class="col-md-6">
					    	<label><strong>Nama Pasien</strong></label>
						    <input type="text" class="form-control" 
						    value="<?= $rekam_medis['nama_pasien']; ?>" disabled>
					    </div>
					</div>
					<div class="form-group">
						<label for="penyakit"><strong>Penyakit</strong></label>
					    <input type="text" class="form-control" id="penyakitRekamMedis" name="penyakit"autocomplete="off">
					   		 <?= form_error('penyakit', '<small class="text-danger pl-1">','</small>'); ?>
					</div>
					<div class="form-group">
						<label for="obat"><strong>Obat</strong></label>
					    <input type="text" class="form-control" id="obatRekamMedis" name="obat" autocomplete="off">
					    <?= form_error('obat', '<small class="text-danger pl-1">','</small>'); ?>
					</div>
					<div class="form-group">
					    <label for="keterangan"><strong>Keterangan</strong></label>
					    <textarea class="form-control" id="keterangan" rows="3" name="keterangan" autocomplete="off"><?= set_value('keterangan'); ?></textarea>
					    <?= form_error('keterangan', '<small class="text-danger pl-1">','</small>'); ?>
					</div>
					<div class="form-group">
					    <button type="submit" class="btn btn-primary">Rujuk</button>
					</div>
		        </form>

	        </div>
		</div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
