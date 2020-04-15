
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">Telah Diperiksa</h1>

          <div class="row">
            <div class="col-lg-6">
              <?= $this->session->flashdata('message'); ?>
            </div>
          </div>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Data Pasien Telah Diperiksa</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Nomor Laboratorium</th>
                      <th>Nama Pasien</th>
                      <th>Hasil Pemeriksaan</th>
                      <th>Dokter</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Nomor Laboratorium</th>
                      <th>Nama Pasien</th>
                      <th>Hasil Pemeriksaan</th>
                      <th>Dokter</th>
                      <th>Aksi</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <?php foreach($detail_laboratorium as $dl) : ?>
                  <tr>
                      <td><?= $dl['nomor_laboratorium']; ?></td>
                      <td><?= $dl['nama_pasien']; ?></td>
                      <td><?= $dl['hasil_pemeriksaan']; ?></td>
                       <td><?= $dl['dokter_pengirim']; ?></td>
                      <td>
                        <div class="row justify-content-center">
                          <div class="col-3">
                            <a href="#" data-toggle="modal" data-target="#detailLabModal" data-toggle="tooltip" data-placement="bottom" title="Detail" class="btn btn-info btn-circle btn-sm detailLab" data-id="<?= $dl['id']; ?>">
                              <i class="fas fa-info-circle"></i>
                            </a>
                          </div>
                          <div class="col-3">
                            <a href="<?= base_url('laboratorium/periksa_edit/') . $dl['id']; ?>"
                              title="Ubah" class="btn btn-success btn-circle btn-sm ">
                              <i class="fas fa-edit"></i>
                            </a>
                          </div>
                          <div class="col-3">
                            <a href="#" class="btn btn-danger btn-circle btn-sm" data-toggle="modal" data-target="#deleteLabModal"  title="Hapus" onclick="$('#deleteLabModal #formDelete').attr('action', '<?= base_url('laboratorium/periksa_delete/') . $dl['id']; ?>')">
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
  <div class="modal fade" id="detailLabModal" tabindex="-1" role="dialog" aria-labelledby="detailLabModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="detailLabModalLabel">Detail Pemeriksaan Lab</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="card" style="max-width: 100%;border: none;">
        <ul class="list-group">
          <li class="list-group-item rounded-0">Nomor Laboratorium: <span id="nomor_laboratorium"></span></li>
          <li class="list-group-item rounded-0">Nomor Rekam Medis : <span id="nomor_rekam_medis"></span></li>
          <li class="list-group-item rounded-0">Nama Pasien : <span id="nama_pasien"></span></li>
          <li class="list-group-item rounded-0">Tanggal Pemeriksaan : <span id="tanggal_pemeriksaan"></span></li>
          <li class="list-group-item rounded-0">Dokter Pengirim : <span id="dokter_pengirim"></span></li>
          <li class="list-group-item rounded-0">Nama Petugas : <span id="nama_petugas"></span></li>
          <li class="list-group-item rounded-0">Hasil Pemeriksaan : <span id="hasil_pemeriksaan"></span></li>
          <li class="list-group-item rounded-0">Keterangan : <span id="keterangan"></span></li>
        </ul>
      </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

<!-- Modal Delete -->
<div class="modal fade" id="deleteLabModal" tabindex="-1" role="dialog" aria-labelledby="deleteLabModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteLabModalLabel">Yakin ingin menghapus data pemeriksaan?</h5>
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