
  <!-- Begin Page Content -->
  <div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Ubah Password</h1>

    <div class="row">
    	<div class="col-lg-6">

    		<?= $this->session->flashdata('message'); ?>
    		
    		<form action="<?= base_url('user/changepassword'); ?>" method="post">
    			<div class="form-group">
    				<label for="current">Password Lama</label>
    				<input type="password" class="form-control" name="current" id="current">
    				<?= form_error('current', '<small class="text-danger">', '</small>') ?>
    			</div>
    			<div class="form-group">
    				<label for="password1">Password Baru</label>
    				<input type="password" class="form-control" name="password1" id="password1">
    				<?= form_error('password1', '<small class="text-danger">', '</small>') ?>
    			</div>
    			<div class="form-group">
    				<label for="password2">Konfirmasi Password Baru</label>
    				<input type="password" class="form-control" name="password2" id="password2">
    				<?= form_error('password2', '<small class="text-danger">', '</small>') ?>
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

