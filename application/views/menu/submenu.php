    <!-- Begin Page Content -->
    <div class="container-fluid">

      <!-- Page Heading -->
      <h1 class="h3 mb-4 text-gray-800">Manajemen Submenu</h1>

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
      		<button class="btn btn-primary addSubmenu" data-toggle="modal" data-target="#submenuModal">
      			Tambah Submenu
      		</button>
      	</div>
      </div>

      <div class="row mt-3">
      	<div class="col-md-10">
      		<table class="table table-hover">
			  <thead>
			    <tr>
			      <th scope="col">#</th>
			      <th scope="col">Title</th>
			      <th scope="col">Menu</th>
			      <th scope="col">URL</th>
			      <th scope="col">Icon</th>
			      <th scope="col">Aktif</th>
			      <th scope="col">Action</th>
			    </tr>
			  </thead>
			  <tbody>
			  	<?php $i = 1; ?>
			    <?php foreach($submenu as $sm) : ?>
			    	<tr>
				      <th scope="row"><?= $i; ?></th>
				      <td><?= $sm['title']; ?></td>
				      <td><?= $sm['menu']; ?></td>
				      <td><?= $sm['url']; ?></td>
				      <td><?= $sm['icon']; ?></td>
				      <?php if ($sm['is_active'] == 1) : ?>
				      	<div class="form-group form-check">
						    <td><input type="checkbox" class="form-check-input ml-3" checked="checked"></td>
						</div>
				      <?php else : ?>
				      	<td><input type="checkbox" class="form-check-input ml-3"></td>
				      <?php endif; ?>
				      <td>
				      	<a href="" data-toggle="modal" data-target="#submenuModal" class="badge badge-success editSubmenu" data-id="<?= $sm['id']; ?>">Ubah</a>
				      	<a href="#" class="badge badge-danger" data-toggle="modal" data-target="#deleteSubmenuModal" onclick="$('#deleteSubmenuModal #formDelete').attr('action', '<?= base_url('menu/delete_submenu/') . $sm['id']; ?>')">Hapus</a>
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
	<div class="modal fade" id="submenuModal" tabindex="-1" role="dialog" aria-labelledby="submenuModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="submenuModalLabel">Tambah SubMenu</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        <form action="<?= base_url('menu/submenu'); ?>" method="post">
	        	<div class="form-group">
				    <input type="title" class="form-control" id="title" name="title" placeholder="Nama Submenu">
				</div>
				<div class="form-group">
				    <select class="form-control" id="menu_id" name="menu_id">
				      <?php foreach ($menu as $m) : ?>
				      	<option value="<?= $m['id'];  ?>"><?= $m['menu'] ?></option>
				      <?php endforeach; ?>
				    </select>
				</div>
				<div class="form-group">
				    <input type="text" class="form-control" id="url" name="url" placeholder="URL">
				</div>
				<div class="form-group">
				    <input type="text" class="form-control" id="icon" name="icon" placeholder="Icon">
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
	<div class="modal fade" id="deleteSubmenuModal" tabindex="-1" role="dialog" aria-labelledby="deleteSubmenuModalLabel" aria-hidden="true">
	  <div class="modal-dialog modal-sm" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="deleteSubmenuModalLabel">Yakin ingin menghapus menu?</h5>
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

      