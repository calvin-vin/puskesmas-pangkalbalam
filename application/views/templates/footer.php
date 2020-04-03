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

  <!-- Core plugin JavaScript-->
  <script src="<?= base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?= base_url('assets/'); ?>js/sb-admin-2.min.js"></script>

  <!-- Puskesmas Script -->
  <script src="<?= base_url('assets/'); ?>js/script.js"></script>


  <script type="text/javascript">
    
    $(document).ready(function() {

    const base_url = 'http://localhost/puskesmas-pangkalbalam/'

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


    // role
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

  });

  </script>

</body>

</html>
