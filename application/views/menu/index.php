    <!-- Begin Page Content -->
    <div class="container-fluid">

      <!-- Page Heading -->
      <h1 class="h3 mb-4 text-gray-800">Manajemen Menu</h1>

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
      		<button class="btn btn-primary addMenu" data-toggle="modal" data-target="#menuModal">Tambah Menu</button>
      	</div>
      </div>

      <div class="row mt-3">
      	<div class="col-md-6">
      		<table class="table table-hover">
			  <thead>
			    <tr>
			      <th scope="col">#</th>
			      <th scope="col">Menu</th>
			      <th scope="col">Action</th>
			    </tr>
			  </thead>
			  <tbody>
			  	<?php $i = 1; ?>
			    <?php foreach($menu as $m) : ?>
			    	<tr>
				      <th scope="row"><?= $i; ?></th>
				      <td><?= $m['menu']; ?></td>
				      <td>
				      	<a href="" data-toggle="modal" data-target="#menuModal" class="badge badge-success editMenu" data-id="<?= $m['id']; ?>">Ubah</a>
				      	<a href="#" class="badge badge-danger" data-toggle="modal" data-target="#deleteMenuModal" onclick="$('#deleteMenuModal #formDelete').attr('action', '<?= base_url('menu/delete/') . $m['id']; ?>')">Hapus</a>
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
	<div class="modal fade" id="menuModal" tabindex="-1" role="dialog" aria-labelledby="menuModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="menuModalLabel">Tambah Menu</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        <form action="<?= base_url('menu'); ?>" method="post">
	        	<div class="form-group">
				    <input type="menu" class="form-control" id="menu" name="menu" placeholder="Nama Menu">
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
	<div class="modal fade" id="deleteMenuModal" tabindex="-1" role="dialog" aria-labelledby="deleteMenuModalLabel" aria-hidden="true">
	  <div class="modal-dialog modal-sm" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="deleteMenuModalLabel">Yakin ingin menghapus menu?</h5>
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

      