
        <!-- Begin Page Content -->
        <div class="container-fluid">          

        <div class="row pb-3">
	        <div class="col-md-6">
	        	<div class="card">
					<div class="card-header">
					    Form Tambah Pengguna
					</div>
					<div class="card-body">
	          		
		          		<form action="<?= base_url('admin/user_add') ?>" method="post">
				          	<div class="form-group">
							    <label for="name">Nama</label>
							    <input type="text" class="form-control" id="name" name="name" placeholder="Nama Lengkap" 
							    value="<?= set_value('name'); ?>">
							    <?= form_error('name', '<small class="text-danger pl-1">','</small>'); ?>
							</div>
							<div class="form-group">
							    <label for="email">Email</label>
							    <input type="text" class="form-control" id="email" name="email" placeholder="puskesmas@mail.com"value="<?= set_value('email'); ?>">
							    <?= form_error('email', '<small class="text-danger pl-1">','</small>'); ?>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
									    <label for="password">Password</label>
									    <input type="password" class="form-control" id="password" name="password" placeholder="Min 6 karakter">
									    <?= form_error('password', '<small class="text-danger pl-1">','</small>'); ?>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
									    <label for="password2">Konfirmasi Password</label>
									    <input type="password" class="form-control" id="password2" name="password2">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
									    <label for="Role">Pilih Role</label>
									    <select class="form-control" id="role" name="role_id">
									      <?php foreach ($role as $r) : ?>
									      	<option value="<?= $r['id']; ?>"><?= $r['role']; ?></option>
									      <?php endforeach ?>
									    </select>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
									    <label for="section">Bagian</label>
									    <input type="text" class="form-control" id="section" name="section" placeholder="Contoh: Gigi" value="<?= set_value('section'); ?>">
									    <?= form_error('section', '<small class="text-danger pl-1">','</small>'); ?>
									</div>
								</div>
							</div>
							<div class="form-group">
							    <button type="submit" class="btn btn-primary">Tambah</button>
							</div>
				        </form>

					</div>
				</div>
	        </div>
		</div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      