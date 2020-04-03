    <!-- Begin Page Content -->
    <div class="container-fluid">

      <!-- Page Heading -->
      <h1 class="h3 mb-4 text-gray-800">Role Access</h1>

      <div class="row">
      	<div class="col-lg-6">
      		<?= $this->session->flashdata('message'); ?>
      	</div>
      </div>

      <div class="row">
      	<div class="col">
      		<h5>Role : <?= $role['role']; ?></h5>
      	</div>
      </div>

      <div class="row mt-3">
      	<div class="col-md-6">
      		<table class="table table-hover">
			  <thead>
			    <tr>
			      <th scope="col">#</th>
			      <th scope="col">Menu</th>
			      <th scope="col">Access</th>
			    </tr>
			  </thead>
			  <tbody>
			  	<?php $i = 1; ?>
			    <?php foreach($menu as $m) : ?>
			    	<tr>
				      <th scope="row"><?= $i; ?></th>
				      <td><?= $m['menu']; ?></td>
				      <td>
				      	<input type="checkbox" class="form-check-input ml-3 checkbox_role" <?= checked($m['id'], $role['id']); ?> data-menu="<?= $m['id'] ?>" data-role="<?= $role['id']; ?>">
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


      