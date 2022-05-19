var alertSuccess = function(title, msg){
    toastr.success(msg, title, {
        timeOut: 3500,
        closeButton: !0,
        debug: !1,
        newestOnTop: !0,
        progressBar: !0,
        positionClass: "toast-top-right",
        preventDuplicates: !0,
        onclick: null,
        showDuration: "0",
        hideDuration: "1000",
        extendedTimeOut: "1000",
        showEasing: "swing",
        hideEasing: "linear",
        showMethod: "fadeIn",
        hideMethod: "fadeOut",
        tapToDismiss: !1
    })
}

var alertWarning = function(title, msg){
    toastr.warning(msg, title, {
        timeOut: 3500,
        closeButton: !0,
        debug: !1,
        newestOnTop: !0,
        progressBar: !0,
        positionClass: "toast-top-right",
        preventDuplicates: !0,
        onclick: null,
        showDuration: "0",
        hideDuration: "1000",
        extendedTimeOut: "1000",
        showEasing: "swing",
        hideEasing: "linear",
        showMethod: "fadeIn",
        hideMethod: "fadeOut",
        tapToDismiss: !1
    })
}

var alertError = function(title, msg){
    toastr.error(msg, title, {
        timeOut: 3500,
        closeButton: !0,
        debug: !1,
        newestOnTop: !0,
        progressBar: !0,
        positionClass: "toast-top-right",
        preventDuplicates: !0,
        onclick: null,
        showDuration: "0",
        hideDuration: "1000",
        extendedTimeOut: "1000",
        showEasing: "swing",
        hideEasing: "linear",
        showMethod: "fadeIn",
        hideMethod: "fadeOut",
        tapToDismiss: !1
    })
}

var preload = function(set = 1){
    if(set){
        $('.preload-container').addClass('d-none')
        $('body').removeClass('overflow-hidden')
    } else {
        $('.preload-container').removeClass('d-none')
        $('body').addClass('overflow-hidden')
    }
}

$(document).ready(function() {
	
	/*
	    Sidebar
	*/
	$('#lupaPassword').on('show.bs.modal', function (e) {
		$('.sidebar, .sidebar1').removeClass('active');
        $('.overlay').removeClass('active');
		$('body').removeClass('overflow-hidden');
	})

	$('.dismiss, .overlay').on('click', function() {
        $('.sidebar, .sidebar1').removeClass('active');
        $('.overlay').removeClass('active');
		$('body').removeClass('overflow-hidden');
    });

    $('.open-menu, .open-btn').on('click', function(e) {
    	e.preventDefault();
        $('.sidebar').addClass('active');
        $('.overlay').addClass('active');
		$('body').addClass('overflow-hidden');
        // close opened sub-menus
        $('.collapse.show').toggleClass('show');
        $('a[aria-expanded=true]').attr('aria-expanded', 'false');
    });

	$('.open-menu2').on('click', function(e) {
    	e.preventDefault();
        $('.sidebar1').addClass('active');
        $('.overlay').addClass('active');
		$('body').addClass('overflow-hidden');
        // close opened sub-menus
        $('.collapse.show').toggleClass('show');
        $('a[aria-expanded=true]').attr('aria-expanded', 'false');
    });

	$('.toLogin').on('click', function(e){
		e.preventDefault();
		$('.sidebar, .sidebar1').removeClass('active');
        $('.overlay').removeClass('active');
		$('body').removeClass('overflow-hidden');

		$('.sidebar').addClass('active');
        $('.overlay').addClass('active');
		$('body').addClass('overflow-hidden');
        // close opened sub-menus
        $('.collapse.show').toggleClass('show');
        $('a[aria-expanded=true]').attr('aria-expanded', 'false');
	})

	$('.toRegister').on('click', function(e){
		e.preventDefault();
		$('.sidebar, .sidebar1').removeClass('active');
        $('.overlay').removeClass('active');
		$('body').removeClass('overflow-hidden');

		$('.sidebar1').addClass('active');
        $('.overlay').addClass('active');
		$('body').addClass('overflow-hidden');
        // close opened sub-menus
        $('.collapse.show').toggleClass('show');
        $('a[aria-expanded=true]').attr('aria-expanded', 'false');
	})

    /*
        Background slideshow
    */
	$('.top-content').backstretch("image/assets/bg_index.jpg");
    $('.section-4-container').backstretch("image/assets/bg_index.jpg");
    $('.section-6-container').backstretch("image/assets/bg_index.jpg");
    
    /*
	    Wow
	*/
	new WOW().init();

});
