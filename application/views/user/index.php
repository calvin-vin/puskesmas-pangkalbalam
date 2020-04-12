<?php date_default_timezone_set('Asia/Jakarta'); ?>
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">Profil saya</h1>

          <div class="row justify content center">
          	<div class="col-lg-4 offset-4">
          		<?= $this->session->flashdata('message'); ?>
          	</div>
          </div>
 
 		 <div class="row">
 		 	<div class="col">
 		 		<img src="<?= base_url('assets/img/profile/') . $user['image']; ?>" class="mx-auto d-block img-fluid rounded-circle" style="display: block;width: 300px;height: 300px;background-size: cover;">
 		 		<h6 class="text-center mt-3 text-primary">Nama : <?= $user['name']; ?></h6>
 		 		<p class="text-muted text-center font-italic">Login Terakhir : <?= date('d-m-Y H:i:s', $user['last_login']); ?></p>
 		 	</div>
 		 </div>


        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      