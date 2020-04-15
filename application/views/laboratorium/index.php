
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">Belum Diperiksa</h1>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Data Pasien Belum Diperiksa</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Nomor Rekam Medis</th>
                      <th>Nama Pasien</th>
                      <th>Dokter Pengirim</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Nomor Rekam Medis</th>
                      <th>Nama Pasien</th>
                      <th>Dokter Pengirim</th>
                      <th>Aksi</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <?php foreach($detail_laboratorium as $dl) : ?>
                  <tr>
                      <td><?= $dl['nomor_rekam_medis']; ?></td>
                      <td><?= $dl['nama_pasien']; ?></td>
                      <td><?= $dl['dokter_pengirim']; ?></td>
                      <td>
                        <a href="<?= base_url('laboratorium/periksa/') . $dl['id']; ?>" class="btn btn-primary btn-icon-split">
                          <span class="icon text-white-50">
                            <i class="fas fa-check"></i>
                          </span>
                          <span class="text">Periksa</span>
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
