
        <!-- Begin Page Content -->
        <div class="container-fluid">          

        <div class="row pb-3">
	        <div class="col-md-6">
	        	<div class="card">
					<div class="card-header">
					    Form Ubah Pengguna
					</div>
					<div class="card-body">
	          		
		          		<form action="" method="post">
		          			<input type="hidden" name="id" value="<?= $user_id['id']; ?>">
				          	<div class="form-group">
							    <label for="name">Nama</label>
							    <input type="text" class="form-control" id="name" name="name" placeholder="Nama Lengkap" 
							    value="<?= $user_id['name']; ?>">
							    <?= form_error('name', '<small class="text-danger pl-1">','</small>'); ?>
							</div>
							<div class="form-group">
							    <label for="email">Email</label>
							    <input type="text" class="form-control" id="email" name="email" placeholder="puskesmas@mail.com"value="<?= $user_id['email']; ?>">
							    <?= form_error('email', '<small class="text-danger pl-1">','</small>'); ?>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
									    <label for="Role">Pilih Role</label>
									    <select class="form-control" id="role" name="role_id">
									      <?php foreach ($role as $r) : ?>
									      	<?php if ($r['id'] == $user_id['role_id']) : ?>
									      		<option value="<?= $r['id']; ?>" selected="selected"><?= $r['role']; ?></option>
								      		<?php else : ?>
								      			<option value="<?= $r['id']; ?>"><?= $r['role']; ?></option>
								      		<?php endif; ?>
									      <?php endforeach ?>
									    </select>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
									    <label for="section">Bagian</label>
									    <input type="text" class="form-control" id="section" name="section" placeholder="Contoh: Gigi" value="<?= $user_id['section']; ?>">
									    <?= form_error('section', '<small class="text-danger pl-1">','</small>'); ?>
									</div>
								</div>
							</div>
							<div class="form-group">
							    <button type="submit" class="btn btn-primary">Ubah</button>
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

      