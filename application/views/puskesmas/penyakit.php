
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">Penyakit</h1>

          <div class="row">
	      	<div class="col-lg-6">
	      		<?= $this->session->flashdata('message'); ?>
	      	</div>
	      </div>

	      <div class="row mb-3">
	      	<div class="col">
	      		<a href="<?= base_url('puskesmas/penyakit_add'); ?>" class="btn btn-primary btn-icon-split">
	      			<span class="icon text-white-50">
	      				<i class="fas fa-plus"></i>
	      			</span>
	      			<span class="text">Tambah Data Penyakit</span>
	      		</a>
	      	</div>
	      </div>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Data Penyakit</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Nomor</th>
                      <th>Kode ICD X</th>
                      <th>Nama Penyakit</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Nomor</th>
                      <th>Kode ICD X</th>
                      <th>Nama Penyakit</th>
                      <th>Aksi</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <?php foreach($penyakits as $penyakit) : ?>
                	<tr>
                      <td><?= $penyakit['nomor_penyakit']; ?></td>
                      <td><?= $penyakit['kode']; ?></td>
                      <td><?= $penyakit['nama']; ?></td>
                      <td>
                        <a href="<?= base_url('puskesmas/penyakit_edit/') . $penyakit['id']; ?>" 
                          title="Ubah" class="btn btn-success btn-circle btn-sm ">
                          <i class="fas fa-edit"></i>
                        </a>
                        <a href="#" class="btn btn-danger btn-circle btn-sm" data-toggle="modal" data-target ="#deletePenyakitModal"  title="Hapus" onclick="$('#deletePenyakitModal #formDelete').attr('action', '<?= base_url('puskesmas/penyakit_delete/') . $penyakit['id']; ?>')">
                          <i class="fas fa-trash"></i>
                        </a>
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

<!-- Modal Delete -->
<div class="modal fade" id="deletePenyakitModal" tabindex="-1" role="dialog" aria-labelledby="deletePenyakitModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deletePenyakitModalLabel">Yakin ingin menghapus data penyakit?</h5>
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

      