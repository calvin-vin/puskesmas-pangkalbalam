
        <!-- Begin Page Content -->
        <div class="container-fluid">          

        <div class="row pb-3 mx-auto">
	        <div class="col-md-7 offset-2">
	        	<h3 class="mb-5 text-gray-800 text-center">Ubah Pemeriksaan Pasien</h3>

	        	<form action="" method="post">
	        		<input type="hidden" name="id" value="<?= $detail_laboratorium['id']; ?>">
		          	<div class="form-group row">
					    <div class="col-md-6">
					    	<label for="nomor_laboratorium"><strong>Nomor Laboratorium</strong></label>
						    <input type="text" class="form-control" id="nomor_laboratorium" name="nomor_laboratorium"
						    value="<?= $detail_laboratorium['nomor_laboratorium']; ?>" autocomplete="off">
						    <?= form_error('nomor_laboratorium', '<small class="text-danger pl-1">','</small>'); ?>
						</div>
					</div>
					<div class="form-group">
						<label for="hasil_pemeriksaan"><strong>Hasil Pemeriksaan</strong></label>
					    <input type="text" class="form-control" id="penyakitRekamMedis" name="hasil_pemeriksaan"autocomplete="off" value="<?= $detail_laboratorium['hasil_pemeriksaan']; ?>">
					   	<?= form_error('hasil_pemeriksaan', '<small class="text-danger pl-1">','</small>'); ?>
					</div>
					<div class="form-group">
					    <label for="keterangan"><strong>Keterangan</strong></label>
					    <textarea class="form-control" id="keterangan" rows="3" name="keterangan" autocomplete="off"><?= $detail_laboratorium['keterangan']; ?></textarea>
					    <?= form_error('keterangan', '<small class="text-danger pl-1">','</small>'); ?>
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
