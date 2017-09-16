$(document).ready(function() {
	
	var navToggle = $('.navbar-toggle'),
		toggle = $('.toggle'),
		dropdown = $('.dropdown'),
		wrap = $('.wrap-modal'),
		slideLeft = $('#slide-left'),
		admin = $('.admin'),
		adminMain = $('.admin-main');


		slideLeft.click(function() {
			admin.toggleClass('slide');
			adminMain.toggleClass('slide');
		});
	// function default(isi){
	// 	isi.on(click(function(event) {
	// 		event.preventDefault();
	// 	});)
	// }

	// default(navToggle);
	// default(dropdown);
	// default(toggle);

	// $("#btn_login").click(function(event) {
	// 	event.preventDefault();
		
	// 	var email = $('#email').val(),
	// 		pass = $('#password').val(),
	// 		url_login = 'login.php',
	// 		data = $('#login_form').serialize();

	// 	$.ajax({
	// 		url: url_login,
	// 		type: 'POST',
	// 		data: { email: email, password:pass}

	// 	});
	// });

    // $(window).scroll(function() {
    //     if ($(this).scrollTop() < 100) {
    //         $('.scroll-top').fadeOut();
    //     } else {
    //         $('.scroll-top').fadeIn();
    //     }
    // });

    // $('.scroll-top').click(function(e) {
    //     e.preventDefault();
    //     $('html, body').animate({
    //         scrollTop: 0
    //     }, 325);
    //     return false;
    // });
    $('.default').click(function(event) {
    	event.preventDefault();
    });

    $('.callback').click(function() {
    	return confirm('Apa anda yakin ?');
    });

    $('#print').click(function() {
    	window.print();
    });
    // $('.btn-update').on('click', function() {
    // 	$('#update').removeClass('none');
    // });
    // $('.btn-delete').click(function() {
    // 	var link = $(this).attr('data_id'),
    // 	 	type = $(this).attr('data_type');

    // 	$(location).attr('href', 'proses/delete.php?id=' + link + '&type=' + type);
    // });
    $('.login-btn').click(function(event) {
    	event.preventDefault();
    	$('#login-modal').removeClass('none');
    	$('#register-modal').addClass('none');
    });
    $('.register-btn').click(function(event) {
    	event.preventDefault();
    	$('#register-modal').removeClass('none');
    	$('#login-modal').addClass('none');
    });


    wrap.on('click', function(event) {
    	event.stopPropagation();
    	wrap.addClass('none');
    });
    wrap.on('click', '.modal', function(event) {
    	event.stopPropagation();
    	/* Act on the event */
    });
    wrap.on('click', '.modal-admin', function(event) {
    	event.stopPropagation();
    	/* Act on the event */
    });
    $('#scroll-top').fadeOut();

	$('.scroll').click(function(e) {
		e.preventDefault()
		var key = $(this).attr('scroll'),
			go = $(key);
		$('html, body').animate({
			scrollTop: go.offset().top
		}, 'slow'); 
		return false;
	});
	
	$(window).scroll(function() {
		var show = $('#header').height(),
			scrollTop = $('#scroll-top');
		if ($(this).scrollTop() > show) {
			scrollTop.fadeIn();
		}else{
			scrollTop.fadeOut();
		}
	});
});