
        <!-- Begin Page Content -->
        <div class="container-fluid">          

        <div class="row pb-3 mx-auto">
	        <div class="col-md-7 offset-2">
	        	<h3 class="mb-5 text-gray-800 text-center">Form Ubah Penyakit</h3>

	        	<form action="" method="post">
	        		<input type="hidden" name="id" value="<?= $penyakit['id']; ?>">
        			<div class="form-group row">
					    <div class="col-md-6">
					    	<label for="nomor_penyakit"><strong>Nomor Penyakit</strong></label>
						    <input type="text" class="form-control" id="nomor_penyakit" name="nomor_penyakit"
						    value="<?= $penyakit['nomor_penyakit']; ?>" autocomplete="off">
						    <?= form_error('nomor_penyakit', '<small class="text-danger pl-1">','</small>'); ?>
						</div>
					</div>
	        		<div class="form-group row">
					    <div class="col-md-6">
					    	<label for="kode"><strong>Kode ICD X</strong></label>
						    <input type="text" class="form-control" id="kode" name="kode" value="<?= $penyakit['kode']; ?>" autocomplete="off">
						    <?= form_error('kode', '<small class="text-danger pl-1">','</small>'); ?>
					    </div>
					</div>
		          	<div class="form-group">
					    <label for="nama"><strong>Nama Penyakit</strong></label>
					    <input type="text" class="form-control" id="nama" name="nama"
					    value="<?= $penyakit['nama']; ?>" autocomplete="off">
					    <?= form_error('nama', '<small class="text-danger pl-1">','</small>'); ?>
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

      