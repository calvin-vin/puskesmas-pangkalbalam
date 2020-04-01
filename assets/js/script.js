$(document).ready(function() {

	$('.addMenu').on('click', function(){

		$('#menuModalLabel').html('Tambah Menu');
		$('.modal-footer button[type=submit]').html('Tambah');
		$('.modal-body form').attr('action', 'http://localhost/puskesmas-pangkalbalam/menu/');

		$('#menu').val('');

	});

	$('.editMenu').on('click', function(){

		
		const id = $(this).data('id');

		$('#menuModalLabel').html('Ubah Menu');
		$('.modal-footer button[type=submit]').html('ubah');
		$('.modal-body form').attr('action', 'http://localhost/puskesmas-pangkalbalam/menu/edit/' + id);

		$.ajax({

			url : 'http://localhost/puskesmas-pangkalbalam/menu/getEdit',
			data : {id:id},
			method : 'post',
			dataType : 'json',
			success : function(data) {
				$('#menu').val(data.menu);
			}

		});

});

});