
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">Profil saya</h1>

 
 		 <div class="row">
 		 	<div class="col">
 		 		<img src="<?= base_url('assets/img/profile/') . $user['image']; ?>" width="300" class="rounded-circle mx-auto d-block img-fluid">
 		 		<h6 class="text-center mt-3 text-primary">Nama : <?= $user['name']; ?></h6>
 		 		<p class="text-muted text-center font-italic">Login Terakhir : <?= date('d-m-Y', $user['last_login']); ?></p>
 		 	</div>
 		 </div>


        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      