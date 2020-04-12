
        <!-- Begin Page Content -->
        <div class="container-fluid">          

        <div class="row pb-3 mx-auto">
	        <div class="col-md-7 offset-2">
	        	<h3 class="mb-5 text-gray-800 text-center">Form Tambah Obat</h3>

	        	<form action="<?= base_url('puskesmas/obat_add') ?>" method="post">
        			<div class="form-group row">
					    <div class="col-md-6">
					    	<label for="nomor_obat"><strong>Nomor Obat</strong></label>
						    <input type="text" class="form-control" id="nomor_obat" name="nomor_obat"
						    value="<?= set_value('nomor_obat'); ?>" autocomplete="off">
						    <?= form_error('nomor_obat', '<small class="text-danger pl-1">','</small>'); ?>
						</div>
					</div>
	        		<div class="form-group row">
					    <div class="col-md-6">
					    	<label for="nama"><strong>Nama Obat</strong></label>
						    <input type="text" class="form-control" id="nama" name="nama" value="<?= set_value('nama'); ?>" autocomplete="off">
						    <?= form_error('nama', '<small class="text-danger pl-1">','</small>'); ?>
					    </div>
					</div>
		          	<div class="form-group">
					    <label for="jenis"><strong>Jenis</strong></label>
					    <input type="text" class="form-control" id="jenis" name="jenis"
					    value="<?= set_value('jenis'); ?>" autocomplete="off">
					    <?= form_error('jenis', '<small class="text-danger pl-1">','</small>'); ?>
					</div>
					<div class="form-group">
					    <label for="tanggal_masuk"><strong>Tanggal Masuk</strong></label>
					    <input type="text" class="form-control" id="datepicker" name="tanggal_masuk"
					    value="<?= set_value('tanggal_masuk'); ?>" autocomplete="off"> 
					    <?= form_error('tanggal_masuk', '<small class="text-danger pl-1">','</small>'); ?>
					</div>
					<div class="form-group row mb-4">
					    <div class="col-md-6">
					    	<label for="stok"><strong>Stok Obat</strong></label>
						    <input type="text" class="form-control" id="spinner" name="stok" value="0" autocomplete="off" min="0">
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

      