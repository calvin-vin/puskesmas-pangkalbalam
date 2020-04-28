
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">Pasien</h1>

          <div class="row">
	      	<div class="col-lg-6">
	      		<?= $this->session->flashdata('message'); ?>
	      	</div>
	      </div>

	      <div class="row mb-3">
	      	<div class="col">
	      		<a href="<?= base_url('pendaftaran/pasien_add'); ?>" class="btn btn-primary btn-icon-split">
	      			<span class="icon text-white-50">
	      				<i class="fas fa-plus"></i>
	      			</span>
	      			<span class="text">Tambah Pasien</span>
	      		</a>
	      	</div>
	      </div>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Data Pasien</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Nomor</th>
                      <th>Nama</th>
                      <th>NIK</th>
                      <th>Kategori</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Nomor</th>
                      <th>Nama</th>
                      <th>NIK</th>
                      <th>Kategori</th>
                      <th>Aksi</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <?php foreach($pasiens as $pasien) : ?>
                	<tr>
                      <td><?= $pasien['nomor_pasien']; ?></td>
                      <td><?= $pasien['nama']; ?></td>
                      <td><?= $pasien['nik']; ?></td>
                      <td><?= $pasien['kategori']; ?></td>
                      <td>
                <div class="row justify-content-center text-center">
				      		<div class="col-md-5 py-1">
				      			<a href="<?= base_url('pendaftaran/pendaftaran_add/') . $pasien['id']; ?>" data-toggle="tooltip" data-placement="bottom" title="Daftar" class="btn btn-primary btn-circle btn-sm">
						      		<i class="fas fa-notes-medical"></i>
						      	</a>
				      		</div>
				      		<div class="col-md-5 py-1">
				      			<a href="#" data-toggle="modal" data-target="#detailPasienModal" data-toggle="tooltip" data-placement="bottom" title="Detail" class="btn btn-info btn-circle btn-sm detailPasien" data-id="<?= $pasien['id']; ?>">
						      		<i class="fas fa-info-circle"></i>
						      	</a>
				      		</div>
				      	</div>
				      	<div class="row justify-content-center text-center">
				      		<div class="col-md-5 py-1">
				      			<a href="<?= base_url('pendaftaran/pasien_edit/') . $pasien['id']; ?>" 
				      				title="Ubah" class="btn btn-success btn-circle btn-sm ">
						      		<i class="fas fa-edit"></i>
						      	</a>
				      		</div>
				      		<div class="col-md-5 py-1">
				      			<a href="#" class="btn btn-danger btn-circle btn-sm" data-toggle="modal" data-target="#deletePasienModal"  title="Hapus" onclick="$('#deletePasienModal #formDelete').attr('action', '<?= base_url('pendaftaran/pasien_delete/') . $pasien['id']; ?>')">
						      		<i class="fas fa-trash"></i>
						      	</a>
				      		</div>	
				      	</div>
                      </td>
                    </tr>
                    <?php endforeach ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

<!-- Modal detail -->
	<div class="modal fade" id="detailPasienModal" tabindex="-1" role="dialog" aria-labelledby="detailPasienModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="detailPasienModalLabel">Detail Pasien</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="card" style="max-width: 100%;border: none;">
			  <ul class="list-group">
				  <li class="list-group-item rounded-0">Nomor Pasien : <span id="nomor_pasien"></span></li>
				  <li class="list-group-item rounded-0">NIK : <span id="nik"></span></li>
				  <li class="list-group-item rounded-0">Nama : <span id="nama"></span></li>
				  <li class="list-group-item rounded-0">Jenis Kelamin : <span id="jenis_kelamin"></span></li>
				  <li class="list-group-item rounded-0">Tanggal Lahir : <span id="tanggal_lahir"></span></li>
				  <li class="list-group-item rounded-0">Kategori : <span id="kategori"></span></li>
				  <li class="list-group-item rounded-0">No. HP : <span id="hp"></span></li>
				  <li class="list-group-item rounded-0">Alamat : <span id="alamat"></span></li>
			  </ul>
		  </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	      </div>
	    </div>
	  </div>
	</div>

<!-- Modal Delete -->
<div class="modal fade" id="deletePasienModal" tabindex="-1" role="dialog" aria-labelledby="deletePasienModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deletePasienModalLabel">Yakin ingin menghapus data pasien?</h5>
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

      