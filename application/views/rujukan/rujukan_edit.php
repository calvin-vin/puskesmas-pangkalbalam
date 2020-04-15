
        <!-- Begin Page Content -->
        <div class="container-fluid">          

        <div class="row pb-3 mx-auto">
	        <div class="col-md-7 offset-2">
	        	<h3 class="mb-5 text-gray-800 text-center">Ubah Rujukan Pasien</h3>

	        	<form action="" method="post">
	        		<input type="hidden" name="id" value="<?= $rujukan['id']; ?>">
		          	<div class="form-group row">
					    <div class="col-md-6">
					    	<label for="nomor_rujukan"><strong>Nomor Rujukan</strong></label>
						    <input type="text" class="form-control" id="nomor_rujukan" name="nomor_rujukan"
						    value="<?= $rujukan['nomor_rujukan']; ?>" autocomplete="off">
						    <?= form_error('nomor_rujukan', '<small class="text-danger pl-1">','</small>'); ?>
						</div>
					</div>
					<div class="form-group">
					    <label for="tujuan"><strong>Tujuan</strong></label>
					    <textarea class="form-control" id="tujuan" rows="3" name="tujuan" autocomplete="off"><?= $rujukan['tujuan']; ?></textarea>
					    <?= form_error('tujuan', '<small class="text-danger pl-1">','</small>'); ?>
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
