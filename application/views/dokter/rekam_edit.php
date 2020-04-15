
        <!-- Begin Page Content -->
        <div class="container-fluid">  

        <h3 class="mb-5 text-gray-800 text-center">Form Ubah Data Rekam Medis</h3>        

        <div class="row pb-3 mx-auto">
	        <div class="col-md-7 offset-4">

	        	<form action="" method="post">
	        		<input type="hidden" name="id" value="<?= $rekam_medis['id']; ?>">
        			<div class="form-group row">
					    <div class="col-md-6">
					    	<label for="nomor_pendaftaran"><strong>Nomor Pendaftaran</strong></label>
						    <input type="text" class="form-control" 
						    value="<?= $rekam_medis['nomor_pendaftaran']; ?>" disabled>
						</div>
					</div>
	        		<div class="form-group row">
					    <div class="col-md-6">
					    	<label for="nama_pasien"><strong>Nama Pasien</strong></label>
						    <input type="text" class="form-control" value="<?= $rekam_medis['nama_pasien']; ?>"  disabled>
					    </div>
					</div>
		          	<div class="form-group row">
					    <div class="col-md-6">
					    	<label for="nomor_rekam_medis"><strong>Nomor Rekam Medis</strong></label>
						    <input type="text" class="form-control" id="nomor_rekam_medis" name="nomor_rekam_medis"
						    value="<?= $rekam_medis['nomor_rekam_medis']; ?>" autocomplete="off" >
						    <?= form_error('nomor_rekam_medis', '<small class="text-danger pl-1">','</small>'); ?>
						</div>
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

      