
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">Telah Dirujuk</h1>

          <div class="row">
            <div class="col-lg-6">
              <?= $this->session->flashdata('message'); ?>
            </div>
          </div>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Data Pasien Telah Dirujuk</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Nomor Rujukan</th>
                      <th>Nama Pasien</th>
                      <th>Penyakit</th>
                      <th>Tujuan</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Nomor Rujukan</th>
                      <th>Nama Pasien</th>
                      <th>Penyakit</th>
                      <th>Tujuan</th>
                      <th>Aksi</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <?php foreach($rujukans as $rujukan) : ?>
                  <tr>
                      <td><?= $rujukan['nomor_rujukan']; ?></td>
                      <td><?= $rujukan['nama_pasien']; ?></td>
                      <td><?= $rujukan['nama_penyakit']; ?></td>
                      <td><?= $rujukan['tujuan']; ?></td>
                      <td>
                        <div class="row justify-content-center text-center">
                          <div class="col-md-3 py-1">
                            <a href="#" data-toggle="modal" data-target="#detailRujukanModal" data-toggle="tooltip" data-placement="bottom" title="Detail" class="btn btn-info btn-circle btn-sm detailRujukan" data-id="<?= $rujukan['id']; ?>">
                              <i class="fas fa-info-circle"></i>
                            </a>
                          </div>
                          <div class="col-md-3 py-1">
                            <a href="<?= base_url('rujukan/rujukan_edit/') . $rujukan['id']; ?>"
                              title="Ubah" class="btn btn-success btn-circle btn-sm ">
                              <i class="fas fa-edit"></i>
                            </a>
                          </div>
                          <div class="col-md-3 py-1">
                            <a href="#" class="btn btn-danger btn-circle btn-sm" data-toggle="modal" data-target="#deleteRujukanModal"  title="Hapus" onclick="$('#deleteRujukanModal #formDelete').attr('action', '<?= base_url('rujukan/rujukan_delete/') . $rujukan['id']; ?>')">
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
  <div class="modal fade" id="detailRujukanModal" tabindex="-1" role="dialog" aria-labelledby="detailRujukanModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="detailRujukanModalLabel">Detail Rujukan Pasien</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="card" style="max-width: 100%;border: none;">
        <ul class="list-group">
          <li class="list-group-item rounded-0">Nomor Rujukan: <span id="nomor_rujukan"></span></li>
          <li class="list-group-item rounded-0">Nomor Rekam Medis : <span id="nomor_rekam_medis"></span></li>
          <li class="list-group-item rounded-0">Nama Pasien : <span id="nama_pasien"></span></li>
          <li class="list-group-item rounded-0">Tanggal Berobat : <span id="tanggal_berobat"></span></li>
          <li class="list-group-item rounded-0">Nama Petugas : <span id="nama_petugas"></span></li>
          <li class="list-group-item rounded-0">Tujuan : <span id="tujuan"></span></li>
          <li class="list-group-item rounded-0">Nama Penyakit : <span id="nama_penyakit"></span></li>
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
<div class="modal fade" id="deleteRujukanModal" tabindex="-1" role="dialog" aria-labelledby="deleteRujukanModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteRujukanModalLabel">Yakin ingin menghapus data rujukan?</h5>
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