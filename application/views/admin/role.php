    <!-- Begin Page Content -->
    <div class="container-fluid">

      <!-- Page Heading -->
      <h1 class="h3 mb-4 text-gray-800">Role</h1>

      <div class="row">
      	<div class="col-lg-6">
      		<?= validation_errors( 
				'<div class="alert alert-danger alert-dismissible fade show" role="alert">
				  ',
				  '<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				    <span aria-hidden="true">&times;</span>
				  </button>
				</div>'); ?>
      		<?= $this->session->flashdata('message'); ?>
      	</div>
      </div>

      <div class="row">
      	<div class="col">
      		<button class="btn btn-primary addRole" data-toggle="modal" data-target="#roleModal">Tambah Role</button>
      	</div>
      </div>

      <div class="row mt-3">
      	<div class="col-md-6">
      		<table class="table table-hover">
			  <thead>
			    <tr>
			      <th scope="col">#</th>
			      <th scope="col">Role</th>
			      <th scope="col">Action</th>
			    </tr>
			  </thead>
			  <tbody>
			  	<?php $i = 1; ?>
			    <?php foreach($role as $r) : ?>
			    	<tr>
				      <th scope="row"><?= $i; ?></th>
				      <td><?= $r['role']; ?></td>
				      <td>
				      	<a href="<?= base_url('admin/roleaccess/') . $r['id']; ?>" class="badge badge-warning">Access</a>
				      	<a href="#" data-toggle="modal" data-target="#roleModal" class="badge badge-success editRole" data-id="<?= $r['id']; ?>">Ubah</a>
				      	<a href="#" class="badge badge-danger" data-toggle="modal" data-target="#deleteRoleModal" onclick="$('#deleteRoleModal #formDelete').attr('action', '<?= base_url('admin/delete_role/') . $r['id']; ?>')">Hapus</a>
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

	<!-- Modal Tambah -->
	<div class="modal fade" id="roleModal" tabindex="-1" role="dialog" aria-labelledby="roleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="roleModalLabel">Tambah Role</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        <form action="<?= base_url('admin/role'); ?>" method="post">
	        	<div class="form-group">
				    <input type="role" class="form-control" id="role" name="role" placeholder="Nama Role">
				</div>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	        <button type="submit" class="btn btn-primary">Tambah</button>
	        </form>
	      </div>
	    </div>
	  </div>
	</div>

	<!-- Modal Delete -->
	<div class="modal fade" id="deleteRoleModal" tabindex="-1" role="dialog" aria-labelledby="deleteRoleModalLabel" aria-hidden="true">
	  <div class="modal-dialog modal-sm" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="deleteRoleModalLabel">Yakin ingin menghapus role?</h5>
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

      