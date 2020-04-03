(function() {

	// navbar scrolling
	$('.nav-link').on('click', function(e){

		const tujuan = $(this).attr('href');
		const elemenTujuan = $(tujuan);
		
		$('html').animate({
			scrollTop : elemenTujuan.offset().top - 50
		}, 1000, 'easeInOutExpo');

		e.preventDefault();
	});	

	$('.pelayanan').find('.kotak').on('click', function() {

		let judul = $(this).data('title');

		$.getJSON('data/layanan.json',  function(data){

			$('.modal-title').html(judul);

		});	
	});



})();