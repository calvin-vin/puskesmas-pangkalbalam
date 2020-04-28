
        <!-- Begin Page Content -->
        <div class="container-fluid d-flex justify-content-center">  

        <div class="row pb-3">
	        <div class="col-sm-12">
	        	<h3 class="mb-5 text-gray-800 text-center">Form Rekam Medis</h3> 

	        	<form action="" method="post">
        			<div class="form-group row">
					    <div class="col-md-12">
					    	<label for="nomor_pendaftaran"><strong>Nomor Pendaftaran</strong></label>
						    <input type="text" class="form-control" 
						    value="<?= $pendaftaran['nomor_pendaftaran']; ?>" disabled>
						</div>
					</div>
	        		<div class="form-group row">
					    <div class="col-md-12">
					    	<label for="nama_pasien"><strong>Nama Pasien</strong></label>
						    <input type="text" class="form-control" value="<?= $pendaftaran['nama']; ?>"  disabled>
					    </div>
					</div>
		          	<div class="form-group row">
					    <div class="col-md-12">
					    	<label for="nomor_rekam_medis"><strong>Nomor Rekam Medis</strong></label>
						    <input type="text" class="form-control" id="nomor_rekam_medis" name="nomor_rekam_medis"
						    value="<?= set_value('nomor_rekam_medis'); ?>" autocomplete="off" >
						    <?= form_error('nomor_rekam_medis', '<small class="text-danger pl-1">','</small>'); ?>
						</div>
					</div>
					<div class="form-group">
					    <button type="submit" class="btn btn-primary">Tambah</button>
					</div>
		        </form>

	        </div>
		</div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      