 <?php date_default_timezone_set('Asia/Jakarta'); ?>
    <!-- Begin Page Content -->
    <div class="container-fluid">

      <!-- Page Heading -->
      <h1 class="h3 mb-4 text-gray-800">Manajemen Pengguna</h1>

      <div class="row">
      	<div class="col-lg-6">
      		<?= $this->session->flashdata('message'); ?>
      	</div>
      </div>

      <div class="row">
      	<div class="col">
      		<a href="<?= base_url('admin/user_add'); ?>" class="btn btn-primary">Tambah Pengguna</a>
      	</div>
      </div>

      <div class="row mt-3">
      	<div class="col-md-6">
      		<table class="table table-hover">
			  <thead>
			    <tr>
			      <th scope="col">#</th>
			      <th scope="col">Nama</th>
			      <th scope="col">Role</th>
			      <th scope="col">Bagian</th>
			      <th scope="col">Aktif</th>
			      <th scope="col">Action</th>
			    </tr>
			  </thead>
			  <tbody>
			  	<?php $i = 1; ?>
			    <?php foreach($all_user as $users) : ?>
			    	<tr>
				      <th scope="row"><?= $i; ?></th>
				      <td><?= $users['name']; ?></td>
				      <td><?= $users['role']; ?></td>
				      <td><?= $users['section']; ?></td>
				      <td>
				      	<input type="checkbox" class="form-check-input ml-3 checkbox_userActive" data-id="<?= $users['id']; ?>" <?= check_userActive($users['id']); ?>>
				      </td>
				      <td>
				      	<a href="#" data-toggle="modal" data-target="#detailUserModal" class="badge badge-primary detailUser" data-id="<?= $users['id']; ?>">Detail</a>
				      	<a href="<?= base_url('admin/user_edit/') . $users['id']; ?>" class="badge badge-success">Ubah</a>
				      	<a href="#" class="badge badge-danger" data-toggle="modal" data-target="#deleteUserModal" onclick="$('#deleteUserModal #formDelete').attr('action', '<?= base_url('admin/user_delete/') . $users['id']; ?>')">Hapus</a>
				      </td>
				    </tr>
				    <?php $i++; ?>
			    <?php endforeach ?>
			  </tbody>
			</table>
      	</div>
      </div>

    </div>
    <!-- /.container-fluid -->

  </div>
  <!-- End of Main Content -->

	<!-- Modal detail -->
	<div class="modal fade" id="detailUserModal" tabindex="-1" role="dialog" aria-labelledby="detailUserModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="detailUserModalLabel">Detail Pengguna</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="card" style="max-width: 100%;border: none;">
			  <div class="row no-gutters">
			    <div class="col-md-4 offset-md-1 mt-3">
			      <img src="" class="card-img" id="user_image">
			    </div>
			    <div class="col-md-6">
			      <div class="card-body">
			        <h5 class="card-title font-weight-bold" id="user_name">Calvin</h5>
			        <small class="text-primary" id="user_email">calvinsan123@gmail.com</small>
			        <p class="card-text" id="user_description">
			        	Role : </br>
			        	Bagian : </br>
			        	Tanggal Dibuat : 4 Mei 2019
			    	</p>
			        <p class="card-text"><small class="text-muted" id="user_last_login">Last login:</small></p>
			      </div>
			    </div>
			  </div>
			</div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	      </div>
	    </div>
	  </div>
	</div>

	<!-- Modal Delete -->
	<div class="modal fade" id="deleteUserModal" tabindex="-1" role="dialog" aria-labelledby="deleteUserModalLabel" aria-hidden="true">
	  <div class="modal-dialog modal-sm" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="deleteUserModalLabel">Yakin ingin menghapus pengguna?</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body mx-auto">
	        <form id="formDelete" action="" method="post">
	        	<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	        	<button type="submit" class="btn btn-danger">Hapus</button>
	        </form>
	      </div>
	    </div>
	  </div>
	</div>

      