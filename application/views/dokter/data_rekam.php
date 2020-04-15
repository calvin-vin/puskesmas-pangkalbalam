
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">Data Rekam Medis</h1>

          <div class="row">
	      	<div class="col-lg-6">
	      		<?= $this->session->flashdata('message'); ?>
	      	</div>
	      </div>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Data Pasien Rekam Medis</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Nomor Rekam Medis</th>
                      <th>Nama Pasien</th>
                      <th>Tanggal Berobat</th>
                      <th>Nama Dokter</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Nomor Rekam Medis</th>
                      <th>Nama Pasien</th>
                      <th>Tanggal Berobat</th>
                      <th>Nama Dokter</th>
                      <th>Aksi</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <?php foreach($rekam_medis as $rm) : ?>
                	<tr>
                      <td><?= $rm['nomor_rekam_medis']; ?></td>
                      <td><?= $rm['nama_pasien']; ?></td>
                      <td><?= $rm['tanggal_berobat']; ?></td>
                      <td><?= $rm['nama_dokter']; ?></td>
                      <td>
                      	<div class="row">
                          <div class="col">
                            <a href="<?= base_url('dokter/data_rekam_edit/') . $rm['id']; ?>"
                              title="Ubah" class="btn btn-success btn-circle btn-sm ">
                              <i class="fas fa-edit"></i>
                            </a>
                          </div>
                          <div class="col">
                            <a href="#" class="btn btn-danger btn-circle btn-sm" data-toggle="modal" data-target="#deleteDataRekamModal"  title="Hapus" onclick="$('#deleteDataRekamModal #formDelete').attr('action', '<?= base_url('dokter/data_rekam_delete/') . $rm['id']; ?>')">
                              <i class="fas fa-trash"></i>
                            </a>
                          </div>
                          <?php if ($rm['status'] == 0) : ?>
                            <div class="col">
                              <a href="<?= base_url('dokter/rujukan/') . $rm['id']; ?>" class="btn btn-warning btn-circle btn-sm" title="Rujukan">
                                <i class="fas fa-hospital"></i>
                              </a>
                            </div>
                            <div class="col">
                              <a href="#" class="btn btn-info btn-circle btn-sm" data-toggle="modal" data-target="#pemeriksaanLabModal" title="Laboratorium" onclick="$('#pemeriksaanLabModal #formLab').attr('action', '<?= base_url('dokter/laboratorium/') . $rm['id']; ?>')">
                                <i class="fas fa-flask"></i>
                              </a>
                            </div>
                            <div class="col">
                              <a href="<?= base_url('dokter/rekam_finish/') . $rm['id']; ?>" class="btn btn-primary btn-circle btn-sm" title="Selesai">
                                <i class="fas fa-check"></i>
                              </a>
                            </div>
                          <?php endif; ?>
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

<!-- Modal Pemeriksaan Lab -->
<div class="modal fade" id="pemeriksaanLabModal" tabindex="-1" role="dialog" aria-labelledby="pemeriksaanLabModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="pemeriksaanLabModalLabel">Lakukan proses pemeriksaan lab terhadap pasien?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body mx-auto">
        <form id="formLab" action="" method="post">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-info">Proses</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Modal Delete -->
<div class="modal fade" id="deleteDataRekamModal" tabindex="-1" role="dialog" aria-labelledby="deleteDataRekamModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteDataRekamModalLabel">Yakin ingin menghapus data rekam medis?</h5>
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

      