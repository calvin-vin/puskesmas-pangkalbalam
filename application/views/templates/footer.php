<!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Puskesmas Pangkalbalam <?= date('Y'); ?></span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Apakah anda ingin logout?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body mx-auto">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-danger" href="<?= base_url('auth/logout'); ?>">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
  <script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Jquery UI -->
  <script src="<?= base_url('assets/'); ?>vendor/jquery-ui-1.12.1/jquery-ui.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?= base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Page level plugins -->
  <script src="<?= base_url('assets/'); ?>vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="<?= base_url('assets/'); ?>vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Input spinner -->
  <script src="<?= base_url('assets/'); ?>vendor/spinner/bootstrap-number-input.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?= base_url('assets/'); ?>js/sb-admin-2.min.js"></script>

  <script type="text/javascript">
    
    $(document).ready(function() {

      // spinner jquery
      $('#spinner').bootstrapNumber({
        upClass:'primary rounded-0',
        downClass:'danger rounded-0',
        center:true
      });

      // tooltip jqeury
      $("body").tooltip({ selector: '[data-toggle=tooltip]' }); 

      // menggunkan plugin datepicker JQuery
      (function( factory) {
        if ( typeof define === "function" && define.amd ) {

            // AMD. Register as an anonymous module.
            define( [ "../widgets/datepicker" ], factory );
        } else {

            // Browser globals
            factory( jQuery.datepicker );
        }
      }( function( datepicker ) {

      datepicker.regional.id = {
          closeText: "Tutup",
          prevText: "&#x3C;mundur",
          nextText: "maju&#x3E;",
          currentText: "hari ini",
          monthNames: [ "Januari","Februari","Maret","April","Mei","Juni",
          "Juli","Agustus","September","Oktober","Nopember","Desember" ],
          monthNamesShort: [ "Jan","Feb","Mar","Apr","Mei","Jun",
          "Jul","Agu","Sep","Okt","Nop","Des" ],
          dayNames: [ "Minggu","Senin","Selasa","Rabu","Kamis","Jumat","Sabtu" ],
          dayNamesShort: [ "Min","Sen","Sel","Rab","kam","Jum","Sab" ],
          dayNamesMin: [ "Mg","Sn","Sl","Rb","Km","Jm","Sb" ],
          weekHeader: "Mg",
          dateFormat: "dd/mm/yy",
          firstDay: 0,
          isRTL: false,
          showMonthAfterYear: false,
          yearSuffix: "" };
      datepicker.setDefaults( datepicker.regional.id );

      return datepicker.regional.id;

      } ) );

      $( "#datepicker" ).datepicker({
        changeMonth: true,
        yearRange: "1950:2030",
        changeYear: true
      });


      // menggunkan plugin datatable JQuery
      $('#dataTable').DataTable();


      // baseurl
      const base_url = 'http://localhost/puskesmas-pangkalbalam/';

    // -------------------------menu---------------------

    $('.addMenu').on('click', function(){

      $('#menuModalLabel').html('Tambah Menu');
      $('.modal-footer button[type=submit]').html('Tambah');
      $('.modal-body form').attr('action',  base_url + 'menu');

      $('#menu').val('');

    });

    $('.editMenu').on('click', function(){

      
      const id = $(this).data('id');

      $('#menuModalLabel').html('Ubah Menu');
      $('.modal-footer button[type=submit]').html('Ubah');
      $('.modal-body form').attr('action',  base_url + 'menu/edit/' + id);

      $.ajax({

        url :  base_url + 'menu/getEdit',
        data : {id:id},
        method : 'post',
        dataType : 'json',
        success : function(data) {
          $('#menu').val(data.menu);
        }

      });
    });

    // -------------------------submenu---------------------
    $('.addSubmenu').on('click', function(){

      $('#submenuModalLabel').html('Tambah Submenu');
      $('.modal-footer button[type=submit]').html('Tambah');
      $('.modal-body form').attr('action',  base_url + 'menu/submenu');

      $('#title').val('');
      $('#menu_id').val('');
      $('#url').val('');
      $('#icon').val('');

    });

    $('.editSubmenu').on('click', function(){

      
      const id = $(this).data('id');

      $('#submenuModalLabel').html('Ubah Submenu');
      $('.modal-footer button[type=submit]').html('Ubah');
      $('.modal-body form').attr('action',  base_url + 'menu/edit_submenu/' + id);

      $.ajax({

        url :  base_url + 'menu/getEdit_submenu',
        data : {id:id},
        method : 'post',
        dataType : 'json',
        success : function(data) {
          $('#title').val(data.title);
          $('#menu_id').val(data.menu_id);
          $('#url').val(data.url);
          $('#icon').val(data.icon);
        }

      });
    });

    // -----------------------Role-----------------------

    $('.addRole').on('click', function(){

      $('#roleModalLabel').html('Tambah Role');
      $('.modal-footer button[type=submit]').html('Tambah');
      $('.modal-body form').attr('action',  base_url + 'admin/role');

      $('#role').val('');

    });

    $('.editRole').on('click', function(){
      
      const id = $(this).data('id');

      $('#roleModalLabel').html('Ubah Role');
      $('.modal-footer button[type=submit]').html('Ubah');
      $('.modal-body form').attr('action',  base_url + 'admin/edit_role/' + id);

      $.ajax({

        url :  base_url + 'admin/getEdit_role',
        data : {id:id},
        method : 'post',
        dataType : 'json',
        success : function(data) {
          $('#role').val(data.role);
        }

      });
    });


    // -----------------------checkbox_role--------------------

    $('.checkbox_role').on('click', function(){
      
      const menuId = $(this).data('menu');
      const roleId = $(this).data('role');

      $.ajax({

        url :  base_url + 'admin/changeroleaccess',
        data : {
          menuId : menuId,
          roleId : roleId
        },
        method : 'post',
        success : function() {
          document.location.href = base_url + 'admin/roleaccess/' + roleId;
        }
      });
    });

     // -------------------------submenu-----------------------

     $('.checkbox_submenu').on('click', function(){
      
      const id = $(this).data('id');

      $.ajax({
        url :  base_url + 'menu/active_submenu',
        data : {id:id},
        method : 'post',
        success : function() {
          document.location.href = base_url + 'menu/submenu';
        }

      });
    });

    // ----------------------------edit profil-----------------------

    $('.custom-file-input').on('change', function(){
        let fileName = $(this).val().split('\\').pop();
        $(this).next('.custom-file-label').addClass("selected").html(fileName);
    });

    // ----------------------checkbox_userActive----------------------

    $('.checkbox_userActive').on('click', function(){
      
      const id = $(this).data('id');

      $.ajax({

        url :  base_url + 'admin/changeuseractive',
        data : {id:id},
        method : 'post',
        success : function() {
          document.location.href = base_url + 'admin/user';
        }
      });
    });

    // ------------------------detail user--------------------------
    $('.detailUser').on('click', function(){

      const id = $(this).data('id');

      $.ajax({

        url :  base_url + 'admin/getDetail_user',
        data : {id:id},
        method : 'post',
        dataType : 'json',
        success : function(data) {
          $('#user_name').html(data.name);
          $('#user_email').html(data.email);
          $('#user_image').attr('src', base_url + 'assets/img/profile/' + data.image);
          $('#user_description').html(
            `Role : ` + data.role + `</br>
             Bagian : ` + data.section + ` </br>
             Tanggal Dibuat : ` + new Date(data.date_created * 1000).toLocaleDateString('id-ID')
            );
          $('#user_last_login').html(`Terakhir login: ` + new Date(data.last_login * 1000).toLocaleDateString('id-ID') + ' - ' +new Date(data.last_login * 1000).toLocaleTimeString('id-ID'));
        }

      });
    });

    // ------------------------------detail pasien------------------------
    $('.detailPasien').on('click', function(){

      const id = $(this).data('id');

      $.ajax({

        url :  base_url + 'pendaftaran/getDetail_pasien',
        data : {id:id},
        method : 'post',
        dataType : 'json',
        success : function(data) {
          $('#nomor_pasien').html(data.nomor_pasien);
          $('#nik').html(data.nik);
          $('#nama').html(data.nama);
          $('#jenis_kelamin').html(data.jenis_kelamin);
          $('#tanggal_lahir').html(data.tanggal_lahir);
          $('#kategori').html(data.kategori);
          $('#hp').html(data.hp);
          $('#alamat').html(data.alamat);
        }

      });
    });


    // ----------------------------detail pendaftaran-------------------
    $('.detailPendaftaran').on('click', function(){

      const id = $(this).data('id');

      $.ajax({

        url :  base_url + 'pendaftaran/getDetail_pendaftaran',
        data : {id:id},
        method : 'post',
        dataType : 'json',
        success : function(data) {
          $('#nomor_pendaftaran').html(data.nomor_pendaftaran);
          $('#nomor_pasien').html(data.nomor_pasien);
          $('#nik').html(data.nik);
          $('#nama').html(data.nama);
          $('#jenis_kelamin').html(data.jenis_kelamin);
          $('#tanggal_lahir').html(data.tanggal_lahir);
          $('#kategori').html(data.kategori);
          $('#biaya').html('Rp ' + parseInt(data.biaya).toLocaleString('in-IN'));
          $('#tanggal_berobat').html(data.tanggal_berobat);
          $('#alamat').html(data.alamat);
        }

      });
    });


    // --------------------------------------dokter--------------------------

    //daftar rekam medis dengan ajax
      $('#infoDaftarRekamMedis').hide();  
      $('#dataTidakDitemukan').hide();  
      $('#inputDaftarRekamMedis').on('keyup', function(){
        let nomor = $('#inputDaftarRekamMedis').val();

        $.ajax({
          url :  base_url + 'dokter/getPendaftaranByNomor',
          data : {nomor:nomor},
          method : 'post',
          dataType : 'json',
          success : function(data) {
            if(data) {
              $('#dataTidakDitemukan').hide();
              $('#infoDaftarRekamMedis').show();
              $('#nomor_pendaftaran').html(data.nomor_pendaftaran);
              $('#nama').html(data.nama);
              $('#jenis_kelamin').html(data.jenis_kelamin);
              $('#tanggal_lahir').html(data.tanggal_lahir);
              $('#inputNomorPendaftaran').val(data.nomor_pendaftaran);
              $('#linkDaftarRekamMedis').attr('href', base_url + 'dokter/rekam_add/' + data.nomor_pendaftaran);
            } else {
              $('#infoDaftarRekamMedis').hide();
              $('#dataTidakDitemukan').show();
              $('#inputNomorPendaftaran').val('');
              $('#linkDaftarRekamMedis').attr('href', '');
              if (!nomor){
                $('#dataTidakDitemukan').hide();
              }
            }
          }
        });

      });

      // -----------------------autocomplete penyakit rekam medis----------------   
      $( "#penyakitRekamMedis" ).autocomplete({
        source: function( request, response ) {
          $.ajax( {
            url: base_url + 'dokter/getAllPenyakit',
            method: 'post',
            data: {keyword:$('#penyakitRekamMedis').val()},
            dataType: "json",
            success: function( data ) {
              response( data )
            }
          } );
        },
        minLength: 1
      });

      // -----------------------autocomplete obat rekam medis----------------   
      $( "#obatRekamMedis" ).autocomplete({
        source: function( request, response ) {
          $.ajax( {
            url: base_url + 'dokter/getAllObat',
            method: 'post',
            data: {keyword:$('#obatRekamMedis').val()},
            dataType: "json",
            success: function( data ) {
              response( data )
            }
          } );
        },
        minLength: 1
      });

      // ----------------------------detail pemeriksaan-------------------
      $('.detailPemeriksaan').on('click', function(){

        const id = $(this).data('id');

        $.ajax({

          url :  base_url + 'dokter/getDetail_pemeriksaan',
          data : {id:id},
          method : 'post',
          dataType : 'json',
          success : function(data) {
            console.log(data);
            $('#nomor_pemeriksaan').html(data.nomor_pemeriksaan);
            $('#nomor_rekam_medis').html(data.nomor_rekam_medis);
            $('#nama_pasien').html(data.nama_pasien);
            $('#tanggal_berobat').html(data.tanggal_berobat);
            $('#nama_dokter').html(data.nama_dokter);
            $('#nama_penyakit').html(data.nama_penyakit);
            $('#nama_obat').html(data.nama_obat);
            $('#keterangan').html(data.keterangan);
          }

        });
      });


  });



  </script>

</body>

</html>
