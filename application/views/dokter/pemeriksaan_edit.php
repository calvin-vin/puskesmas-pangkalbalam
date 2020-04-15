
        <!-- Begin Page Content -->
        <div class="container-fluid">          

        <div class="row pb-3 mx-auto">
	        <div class="col-md-7 offset-2">
	        	<h3 class="mb-5 text-gray-800 text-center">Ubah Hasil Pemeriksaan</h3>

	        	<form action="" method="post">
	        		<input type="hidden" name="id" value="<?= $detail_pemeriksaan['id']; ?>">
		          	<div class="form-group row">
					    <div class="col-md-6">
					    	<label for="nomor_pemeriksaan"><strong>Nomor Pemeriksaan</strong></label>
						    <input type="text" class="form-control" id="nomor_pemeriksaan" name="nomor_pemeriksaan"
						    value="<?= $detail_pemeriksaan['nomor_pemeriksaan']; ?>" autocomplete="off">
						    <?= form_error('nomor_pemeriksaan', '<small class="text-danger pl-1">','</small>'); ?>
						</div>
					</div>
					<div class="form-group">
						<label for="penyakit"><strong>Penyakit</strong></label>
					    <input type="text" class="form-control" id="penyakitRekamMedis" name="penyakit"autocomplete="off" value="<?= $detail_pemeriksaan['nama_penyakit']; ?>">
					   		 <?= form_error('penyakit', '<small class="text-danger pl-1">','</small>'); ?>
					</div>
					<div class="form-group">
						<label for="obat"><strong>Obat</strong></label>
					    <input type="text" class="form-control" id="obatRekamMedis" name="obat" autocomplete="off" value="<?= $detail_pemeriksaan['nama_obat']; ?>">
					    <?= form_error('obat', '<small class="text-danger pl-1">','</small>'); ?>
					</div>
					<div class="form-group">
					    <label for="keterangan"><strong>Keterangan</strong></label>
					    <textarea class="form-control" id="keterangan" rows="3" name="keterangan" autocomplete="off"><?= $detail_pemeriksaan['keterangan']; ?></textarea>
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
