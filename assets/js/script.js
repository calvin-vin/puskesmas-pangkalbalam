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
				console.log(data);
				$('#title').val(data.title);
				$('#menu_id').val(data.menu_id);
				$('#url').val(data.url);
				$('#icon').val(data.icon);
			}

		});
	});

	// -----------------------Role-----------------------
	$('.addRole').on('click', function(){

		$('#menuModalLabel').html('Tambah Role');
		$('.modal-footer button[type=submit]').html('Tambah');
		$('.modal-body form').attr('action',  base_url + 'admin/role');

		$('#role').val('');

	});

	$('.editRole').on('click', function(){
		
		const id = $(this).data('id');

		$('#roleModalLabel').html('Ubah Role');
		$('.modal-footer button[type=submit]').html('Ubah');
		$('.modal-body form').attr('action',  base_url + 'admin/role_edit/' + id);

		$.ajax({

			url :  base_url + 'admin/role_getEdit',
			data : {id:id},
			method : 'post',
			dataType : 'json',
			success : function(data) {
				$('#role').val(data.menu);
			}

		});
	});

});