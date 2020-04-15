
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">Hasil Pemeriksaan Pasien</h1>

          <div class="row">
	      	<div class="col-lg-6">
	      		<?= $this->session->flashdata('message'); ?>
	      	</div>
	      </div>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Data Hasil Pemeriksaan Pasien</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Nomor Pemeriksaan</th>
                      <th>Nama Pasien</th>
                      <th>Penyakit</th>
                      <th>Dokter</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Nomor Pemeriksaan</th>
                      <th>Nama Pasien</th>
                      <th>Penyakit</th>
                      <th>Dokter</th>
                      <th>Aksi</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <?php foreach($detail_pemeriksaan as $dp) : ?>
                	<tr>
                      <td><?= $dp['nomor_pemeriksaan']; ?></td>
                      <td><?= $dp['nama_pasien']; ?></td>
                      <td><?= $dp['nama_penyakit']; ?></td>
                      <td><?= $dp['nama_dokter']; ?></td>
                      <td>
                      	<div class="row justify-content-center">
                          <div class="col-3">
                            <a href="#" data-toggle="modal" data-target="#detailPemeriksaanModal" data-toggle="tooltip" data-placement="bottom" title="Detail" class="btn btn-info btn-circle btn-sm detailPemeriksaan" data-id="<?= $dp['id']; ?>">
                              <i class="fas fa-info-circle"></i>
                            </a>
                          </div>
                          <div class="col-3">
                            <a href="<?= base_url('dokter/pemeriksaan_edit/') . $dp['id']; ?>"
                              title="Ubah" class="btn btn-success btn-circle btn-sm ">
                              <i class="fas fa-edit"></i>
                            </a>
                          </div>
                          <div class="col-3">
                            <a href="#" class="btn btn-danger btn-circle btn-sm" data-toggle="modal" data-target="#deletePemeriksaanModal"  title="Hapus" onclick="$('#deletePemeriksaanModal #formDelete').attr('action', '<?= base_url('dokter/pemeriksaan_delete/') . $dp['id']; ?>')">
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
  <div class="modal fade" id="detailPemeriksaanModal" tabindex="-1" role="dialog" aria-labelledby="detailPemeriksaanModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="detailPemeriksaanModalLabel">Detail Pemeriksaan Pasien</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="card" style="max-width: 100%;border: none;">
        <ul class="list-group">
          <li class="list-group-item rounded-0">Nomor Pemeriksaan: <span id="nomor_pemeriksaan"></span></li>
          <li class="list-group-item rounded-0">Nomor Rekam Medis : <span id="nomor_rekam_medis"></span></li>
          <li class="list-group-item rounded-0">Nama Pasien : <span id="nama_pasien"></span></li>
          <li class="list-group-item rounded-0">Tanggal Berobat : <span id="tanggal_berobat"></span></li>
          <li class="list-group-item rounded-0">Nama Dokter : <span id="nama_dokter"></span></li>
          <li class="list-group-item rounded-0">Nama Penyakit : <span id="nama_penyakit"></span></li>
          <li class="list-group-item rounded-0">Obat : <span id="nama_obat"></span></li>
          <li class="list-group-item rounded-0">keterangan : <span id="keterangan"></span></li>
        </ul>
      </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

<!-- Modal Delete -->
<div class="modal fade" id="deletePemeriksaanModal" tabindex="-1" role="dialog" aria-labelledby="deletePemeriksaanModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deletePemeriksaanModalLabel">Yakin ingin menghapus data pemeriksaan?</h5>
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

      