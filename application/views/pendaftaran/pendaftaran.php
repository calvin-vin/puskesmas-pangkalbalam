
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">Pendaftaran</h1>

          <div class="row">
	      	<div class="col-lg-6">
	      		<?= $this->session->flashdata('message'); ?>
	      	</div>
	      </div>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Data Pendaftaran</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Nomor Pendaftaran</th>
                      <th>Nomor Pasien</th>
                      <th>Nama</th>
                      <th>NIK</th>
                      <th>Kategori</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Nomor Pendaftaran</th>
                      <th>Nomor Pasien</th>
                      <th>Nama</th>
                      <th>NIK</th>
                      <th>Kategori</th>
                      <th>Aksi</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <?php foreach($pendaftarans as $pendaftaran) : ?>
                	<tr>
                      <td><?= $pendaftaran['nomor_pendaftaran']; ?></td>
                      <td><?= $pendaftaran['nomor_pasien']; ?></td>
                      <td><?= $pendaftaran['nama']; ?></td>
                      <td><?= $pendaftaran['nik']; ?></td>
                      <td><?= $pendaftaran['kategori']; ?></td>
                      <td>
                      	<div class="row justify-content-center text-center">
        				      		<div class="col-md-3 py-1">
        				      			<a href="#" data-toggle="modal" data-target="#detailPendaftaranModal" data-toggle="tooltip" data-placement="bottom" title="Detail" class="btn btn-info btn-circle btn-sm detailPendaftaran" data-id="<?= $pendaftaran['id']; ?>">
        						      		<i class="fas fa-info-circle"></i>
        						      	</a>
        				      		</div>
                          <div class="col-md-3 py-1">
                            <a href="<?= base_url('pendaftaran/pendaftaran_edit/') . $pendaftaran['id']; ?>"
                              title="Ubah" class="btn btn-success btn-circle btn-sm ">
                              <i class="fas fa-edit"></i>
                            </a>
                          </div>
                          <div class="col-md-3 py-1">
                            <a href="#" class="btn btn-danger btn-circle btn-sm" data-toggle="modal" data-target="#deletePendaftaranModal"  title="Hapus" onclick="$('#deletePendaftaranModal #formDelete').attr('action', '<?= base_url('pendaftaran/pendaftaran_delete/') . $pendaftaran['id']; ?>')">
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
	<div class="modal fade" id="detailPendaftaranModal" tabindex="-1" role="dialog" aria-labelledby="detailPendaftaranModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="detailPendaftaranModalLabel">Detail Pendaftaran</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="card" style="max-width: 100%;border: none;">
			  <ul class="list-group">
          <li class="list-group-item rounded-0">Nomor Pendaftaran : <span id="nomor_pendaftaran"></span></li>
				  <li class="list-group-item rounded-0">Nomor Pasien : <span id="nomor_pasien"></span></li>
				  <li class="list-group-item rounded-0">NIK : <span id="nik"></span></li>
				  <li class="list-group-item rounded-0">Nama : <span id="nama"></span></li>
				  <li class="list-group-item rounded-0">Jenis Kelamin : <span id="jenis_kelamin"></span></li>
				  <li class="list-group-item rounded-0">Tanggal Lahir : <span id="tanggal_lahir"></span></li>
				  <li class="list-group-item rounded-0">Kategori : <span id="kategori"></span></li>
				  <li class="list-group-item rounded-0">Biaya : <span id="biaya"></span></li>
          <li class="list-group-item rounded-0">Tanggal Berobat : <span id="tanggal_berobat"></span></li>
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
<div class="modal fade" id="deletePendaftaranModal" tabindex="-1" role="dialog" aria-labelledby="deletePendaftaranModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deletePendaftaranModalLabel">Yakin ingin menghapus data pendaftaran?</h5>
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

      