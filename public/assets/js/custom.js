 var Travl  = function(){
	 "use strict"
	/* Search Bar ============ */
	var screenWidth = $( window ).width();
	var screenHeight = $( window ).height();
	
	
	var handleNiceSelect = function(){
		if(jQuery('.default-select').length > 0 ){
			jQuery('.default-select').niceSelect();
		}
	}

	var handlePreloader = function(){
		jQuery('#preloader').addClass('d-none');
			$('#main-wrapper').addClass('show');
		
	}

    var handleMetisMenu = function() {
		if(jQuery('#menu').length > 0 ){
			$("#menu").metisMenu();
		}
		jQuery('.metismenu > .mm-active ').each(function(){
			if(!jQuery(this).children('ul').length > 0)
			{
				jQuery(this).addClass('active-no-child');
			}
		});
	}
   
    var handleAllChecked = function() {
		$("#checkAll").on('change',function() {
			$("td input, .email-list .custom-checkbox input").prop('checked', $(this).prop("checked"));
		});
	}

	var handleNavigation = function() {
		$(".nav-control").on('click', function() {

			$('#main-wrapper').toggleClass("menu-toggle");

			$(".hamburger").toggleClass("is-active");
		});
	}
  
	var handleCurrentActive = function() {
		for (var nk = window.location,
			o = $("ul#menu a").filter(function() {
				
				return this.href == nk;
				
			})
			.addClass("mm-active")
			.parent()
			.addClass("mm-active");;) 
		{
			
			if (!o.is("li")) break;
			
			o = o.parent()
				.addClass("mm-show")
				.parent()
				.addClass("mm-active");
		}
	}

	var handleMiniSidebar = function() {
		$("ul#menu>li").on('click', function() {
			const sidebarStyle = $('body').attr('data-sidebar-style');
			if (sidebarStyle === 'mini') {
				console.log($(this).find('ul'))
				$(this).find('ul').stop()
			}
		})
	}
   
	var handleMinHeight = function() {
		var win_h = window.outerHeight;
		var win_h = window.outerHeight;
		if (win_h > 0 ? win_h : screen.height) {
			$(".content-body").css("min-height", (win_h + 60) + "px");
		};
	}
    
	var handleDataAction = function() {
		$('a[data-action="collapse"]').on("click", function(i) {
			i.preventDefault(),
				$(this).closest(".card").find('[data-action="collapse"] i').toggleClass("mdi-arrow-down mdi-arrow-up"),
				$(this).closest(".card").children(".card-body").collapse("toggle");
		});

		$('a[data-action="expand"]').on("click", function(i) {
			i.preventDefault(),
				$(this).closest(".card").find('[data-action="expand"] i').toggleClass("icon-size-actual icon-size-fullscreen"),
				$(this).closest(".card").toggleClass("card-fullscreen");
		});



		$('[data-action="close"]').on("click", function() {
			$(this).closest(".card").removeClass().slideUp("fast");
		});

		$('[data-action="reload"]').on("click", function() {
			var e = $(this);
			e.parents(".card").addClass("card-load"),
				e.parents(".card").append('<div class="card-loader"><i class=" ti-reload rotate-refresh"></div>'),
				setTimeout(function() {
					e.parents(".card").children(".card-loader").remove(),
						e.parents(".card").removeClass("card-load")
				}, 2000)
		});
	}

    var handleHeaderHight = function() {
		const headerHight = $('.header').innerHeight();
		$(window).scroll(function() {
			if ($('body').attr('data-layout') === "horizontal" && $('body').attr('data-header-position') === "static" && $('body').attr('data-sidebar-position') === "fixed")
				$(this.window).scrollTop() >= headerHight ? $('.dlabnav').addClass('fixed') : $('.dlabnav').removeClass('fixed')
		});
	}
	
	// var handleDzScroll = function() {
	// 	jQuery('.dlab-scroll').each(function(){
	// 		var scroolWidgetId = jQuery(this).attr('id');
	// 		const ps = new PerfectScrollbar('#'+scroolWidgetId, {
	// 		  wheelSpeed: 2,
	// 		  wheelPropagation: true,
	// 		  minScrollbarLength: 20
	// 		});
    //         ps.isRtl = false;
	// 	})
	// }
	
	var handleMenuTabs = function() {
		if(screenWidth <= 991 ){
			jQuery('.menu-tabs .nav-link').on('click',function(){
				if(jQuery(this).hasClass('open'))
				{
					jQuery(this).removeClass('open');
					jQuery('.fixed-content-box').removeClass('active');
					jQuery('.hamburger').show();
				}else{
					jQuery('.menu-tabs .nav-link').removeClass('open');
					jQuery(this).addClass('open');
					jQuery('.fixed-content-box').addClass('active');
					jQuery('.hamburger').hide();
				}
				//jQuery('.fixed-content-box').toggleClass('active');
			});
			jQuery('.close-fixed-content').on('click',function(){
				jQuery('.fixed-content-box').removeClass('active');
				jQuery('.hamburger').removeClass('is-active');
				jQuery('#main-wrapper').removeClass('menu-toggle');
				jQuery('.hamburger').show();
			});
		}
	}

	var handleDeleteChat = function(){
		jQuery('.delete-all-msg').on('click',function(){
			Swal.fire({
				title: `Apakah kamu yakin ingin menghapus semua pesan?`,
				showDenyButton: true,
				showConfirmButton: false,
				showCancelButton: true,
				denyButtonText: `Hapus`
			}).then((result) => {
				if (result.isDenied) {
					$.ajax({
						url: window.location.origin +"/dashboard/messages/delete",
						data: {_method: "DELETE"},
						method: 'POST',
						async:false,
						dataType: 'json',
						beforeSend: function(){
							$('#preloader').removeClass('d-none');
							$('#main-wrapper').removeClass('show');
						}
					}).done(function(data){
						if(data.success){
							alertWarning("Berhasil", data.msg)
							jQuery('#content_listmsg').html('<li class="text-center font-w700">Tidak ada pemberitahuan</li>');
							jQuery('.dlab-chat-user-box').find('.delete-all-msg').hide()
							jQuery('.pop_msg').hide()
						} else {
							alertError("Terjadi Kesalahan", data.msg)
						}

						$('#preloader').addClass('d-none');
						$('#main-wrapper').addClass('show');
					}).fail(function(data){
						$('#preloader').addClass('d-none');
						$('#main-wrapper').addClass('show');
						console.log(data.responseText)
					});
				}
			})
		})

		jQuery('.delete-msg').on('click',function(){
			Swal.fire({
				title: `Apakah kamu yakin ingin menghapus pesan?`,
				showDenyButton: true,
				showConfirmButton: false,
				showCancelButton: true,
				denyButtonText: `Hapus`
			}).then((result) => {
				if (result.isDenied) {
					$.ajax({
						url: window.location.origin+"/dashboard/messages/delete/"+jQuery(this).data('id'),
						data: {_method: "DELETE"},
						method: 'POST',
						async:false,
						dataType: 'json',
						beforeSend: function(){
							$('#preloader').removeClass('d-none');
							$('#main-wrapper').removeClass('show');
						}
					}).done(function(data){
						if(data.success){
							alertWarning("Berhasil", data.msg)
							jQuery('.dlab-chat-history-back').trigger('click');
						} else {
							alertError("Terjadi Kesalahan", data.msg)
						}

						$('#preloader').addClass('d-none');
						$('#main-wrapper').addClass('show');
					}).fail(function(data){
						$('#preloader').addClass('d-none');
						$('#main-wrapper').addClass('show');
						console.log(data.responseText)
					});
				}
			})
		})
	}
	
	var handleChatbox = function() {
		jQuery('.bell-link').on('click',function(){
			jQuery('.chatbox').addClass('active');

			jQuery.ajax({
				url: window.location.origin +"/dashboard/messages",
				type: 'POST',
				async:false,
				dataType: 'json',
				beforeSend: function(){
					jQuery('#contentload_listmsg').removeClass('d-none').fadeIn('slow')
				}
			}).done(function (data) {
				if(data.success){
					const listMsg = `
						<li class="dlab-chat-user">
							<p class="title_msg font-w700 mb-1 text-truncate"></p>
							<p class="body_msg mb-1 text-truncate small"></p>
							<p class="mb-0 small">
								<font class="date_msg"></font> &centerdot; <font class="from_msg"></font>
							</p>
						</li>`,
						emptyMsg = `<li class="text-center font-w700">Tidak ada pemberitahuan</li>`;

					const ucwords = function(str) {
						return (str + '').replace(/^([a-z])|\s+([a-z])/g, function ($1) {
							return $1.toUpperCase();
						});
					}
					const strip = function(html){
						let doc = new DOMParser().parseFromString(html, 'text/html');
						return doc.body.textContent || "";
					}

					jQuery('#content_listmsg').html('')

					if(data.get.length > 0){
						let countRead = 0;
						jQuery('.dlab-chat-user-box').find('.delete-all-msg').show()
						jQuery.each(data.get, (i, val) => {
							let setMsg = jQuery(listMsg),
								dateCreate = new Date(val.updated_at);

							if(!val.is_read) {
								setMsg.addClass('bg-primary text-white')
								countRead++;
							}

							setMsg.attr('data-id', val.id);
							setMsg.find('.title_msg').html(val.title)
							setMsg.find('.body_msg').html(strip(val.body))
							setMsg.find('.date_msg').html(`
								${dateCreate.getDay()} 
								${dateCreate.toLocaleString('default', { month: 'short' })} 
								${dateCreate.getFullYear()}`)
							setMsg.find('.from_msg').html(ucwords(val.from))
	
							jQuery('#content_listmsg').append(setMsg)
						})

						if(countRead > 0){
							jQuery('.pop_msg').show()
							jQuery('.pop_msg').html(countRead)
						} else {
							jQuery('.pop_msg').hide()
						}
					} else {
						jQuery('.pop_msg').hide()
						jQuery('.dlab-chat-user-box').find('.delete-all-msg').hide()
						jQuery('#content_listmsg').append(jQuery(emptyMsg));
					}

				} else {
					console.log(data.msg)
				}

				jQuery('#contentload_listmsg').addClass('d-none').fadeOut('slow')
			}).fail(function(data){
				jQuery('#contentload_listmsg').addClass('d-none').fadeOut('slow')
				resp = JSON.parse(data.responseText)
				console.log(resp.message)
				console.log("error");
			})
		});
		jQuery('.chatbox-close').on('click',function(){
			jQuery('.chatbox').removeClass('active');
			jQuery('#contentload_listmsg').addClass('d-none').fadeIn('slow')
			jQuery('#content_listmsg').html('')
		});
	}
	
	// var handlePerfectScrollbar = function() {
	// 	if(jQuery('.dlabnav-scroll').length > 0)
	// 	{
	// 		//const qs = new PerfectScrollbar('.dlabnav-scroll');
	// 		const qs = new PerfectScrollbar('.dlabnav-scroll');
			
	// 		qs.isRtl = false;
	// 	}
	// }

	var handleBtnNumber = function() {
		$('.btn-number').on('click', function(e) {
			e.preventDefault();

			fieldName = $(this).attr('data-field');
			type = $(this).attr('data-type');
			var input = $("input[name='" + fieldName + "']");
			var currentVal = parseInt(input.val());
			if (!isNaN(currentVal)) {
				if (type == 'minus')
					input.val(currentVal - 1);
				else if (type == 'plus')
					input.val(currentVal + 1);
			} else {
				input.val(0);
			}
		});
	}
	
	var handleDzChatUser = function() {
		// Open Detail Notifikasi
		jQuery('.dlab-chat-user-box').on('click', '.dlab-chat-user', function(){
			jQuery('.dlab-chat-user-box').addClass('d-none');
			jQuery('.dlab-chat-history-box').removeClass('d-none');
			const id = jQuery(this).data('id');
            //$(".chatbox .msg_card_body").height(vHeightArea());
            //$(".chatbox .msg_card_body").css('height',vHeightArea());
			jQuery.ajax({
				url: window.location.origin +"/dashboard/messages/read_msg/1",
				data: {id: id},
				type: 'POST',
				async:false,
				dataType: 'json',
				beforeSend: function(){
					jQuery('#contentload_msg').removeClass('d-none').fadeIn('slow')
				}
			}).done(function (data) {
				if(data.success){
					const container = jQuery('#content_msg .col-12'),
						  dateCreate = new Date(data.get.updated_at);

					const ucwords = function(str) {
						return (str + '').replace(/^([a-z])|\s+([a-z])/g, function ($1) {
							return $1.toUpperCase();
						});
					}

					if(data.get.internship){
						container.find('.additional_contentmsg').html(`
							<dt>Nama Lengkap</dt>
							<dd>${data.get.internship.name}</dd>

							<dt>Jurusan & Tipe Magang</dt>
							<dd>${data.get.internship.jurusan} &centerdot; ${ucwords(data.get.internship.type)}</dd>
						`);
					}

					if(data.get.comparative){
						container.find('.additional_contentmsg').html(`
							<dt>Tema Pertemuan</dt>
							<dd>${data.get.internship.title}</dd>

							<dt>Insitusi</dt>
							<dd>${data.get.internship.insitution.name}</dd>
						`);
					}
					container.closest('.dlab-chat-history-box').find('.from_contentmsg').html(ucwords(data.get.from))
					container.closest('.dlab-chat-history-box').find('.delete-msg').attr('data-id', data.get.id)
					container.find('.title_contentmsg').html(data.get.title);
					container.find('.body_contentmsg').html(data.get.body);
					container.find('.date_contentmsg').html(`
								${dateCreate.getDay()} 
								${dateCreate.toLocaleString('default', { month: 'short' })} 
								${dateCreate.getFullYear()}`)
				} else {
					console.log(data.msg)
				}

				jQuery('#contentload_msg').addClass('d-none').fadeOut('slow')
			}).fail(function(data){
				jQuery('#contentload_msg').addClass('d-none').fadeOut('slow')
				resp = JSON.parse(data.responseText)
				console.log(resp.message)
				console.log("error");
			})

			jQuery('#contentload_listmsg').addClass('d-none').fadeIn('slow')
			jQuery('#content_listmsg').html('')
		}); 
		
		// Back List Notifikasi
		jQuery('.dlab-chat-history-back').on('click',function(){
			jQuery('.dlab-chat-user-box').removeClass('d-none');
			jQuery('.dlab-chat-history-box').addClass('d-none');

			jQuery.ajax({
				url: window.location.origin +"/dashboard/messages",
				type: 'POST',
				async:false,
				dataType: 'json',
				beforeSend: function(){
					jQuery('#contentload_listmsg').removeClass('d-none').fadeIn('slow')
				}
			}).done(function (data) {
				if(data.success){
					const listMsg = `
						<li class="dlab-chat-user">
							<p class="title_msg font-w700 mb-1 text-truncate"></p>
							<p class="body_msg mb-1 text-truncate small"></p>
							<p class="mb-0 small">
								<font class="date_msg"></font> &centerdot; <font class="from_msg"></font>
							</p>
						</li>`,
						emptyMsg = `<li class="text-center font-w700">Tidak ada pemberitahuan</li>`;

					const ucwords = function(str) {
						return (str + '').replace(/^([a-z])|\s+([a-z])/g, function ($1) {
							return $1.toUpperCase();
						});
					}
					const strip = function(html){
						let doc = new DOMParser().parseFromString(html, 'text/html');
						return doc.body.textContent || "";
					}

					jQuery('#content_listmsg').html('')

					if(data.get.length > 0){
						let countRead = 0;
						jQuery('.dlab-chat-user-box').find('.delete-all-msg').show()
						jQuery.each(data.get, (i, val) => {
							let setMsg = jQuery(listMsg),
								dateCreate = new Date(val.updated_at);

							if(!val.is_read){
								setMsg.addClass('bg-primary text-white')
								countRead++;
							}

							setMsg.attr('data-id', val.id);
							setMsg.find('.title_msg').html(val.title)
							setMsg.find('.body_msg').html(strip(val.body))
							setMsg.find('.date_msg').html(`
								${dateCreate.getDay()} 
								${dateCreate.toLocaleString('default', { month: 'short' })} 
								${dateCreate.getFullYear()}`)
							setMsg.find('.from_msg').html(ucwords(val.from))
	
							jQuery('#content_listmsg').append(setMsg)
						})

						if(countRead > 0){
							jQuery('.pop_msg').show()
							jQuery('.pop_msg').html(countRead)
						} else {
							jQuery('.pop_msg').hide()
						}
					} else {
						jQuery('.pop_msg').hide()
						jQuery('.dlab-chat-user-box').find('.delete-all-msg').hide()
						jQuery('#content_listmsg').append(jQuery(emptyMsg));
					}

				} else {
					console.log(data.msg)
				}

				jQuery('#contentload_listmsg').addClass('d-none').fadeOut('slow')
			}).fail(function(data){
				jQuery('#contentload_listmsg').addClass('d-none').fadeOut('slow')
				resp = JSON.parse(data.responseText)
				console.log(resp.message)
				console.log("error");
			})
		}); 
		
		jQuery('.dlab-fullscreen').on('click',function(){
			jQuery('.dlab-fullscreen').toggleClass('active');
		});
        
        /* var vHeight = function(){ */
            
        /* } */
        
        
	}
	
	
	var handleDzFullScreen = function() {
		jQuery('.dlab-fullscreen').on('click',function(e){
			if(document.fullscreenElement||document.webkitFullscreenElement||document.mozFullScreenElement||document.msFullscreenElement) { 
				/* Enter fullscreen */
				if(document.exitFullscreen) {
					document.exitFullscreen();
				} else if(document.msExitFullscreen) {
					document.msExitFullscreen(); /* IE/Edge */
				} else if(document.mozCancelFullScreen) {
					document.mozCancelFullScreen(); /* Firefox */
				} else if(document.webkitExitFullscreen) {
					document.webkitExitFullscreen(); /* Chrome, Safari & Opera */
				}
			} 
			else { /* exit fullscreen */
				if(document.documentElement.requestFullscreen) {
					document.documentElement.requestFullscreen();
				} else if(document.documentElement.webkitRequestFullscreen) {
					document.documentElement.webkitRequestFullscreen();
				} else if(document.documentElement.mozRequestFullScreen) {
					document.documentElement.mozRequestFullScreen();
				} else if(document.documentElement.msRequestFullscreen) {
					document.documentElement.msRequestFullscreen();
				}
			}		
		});
	}
	
	var handleshowPass = function(){
		jQuery('.show-pass').on('click',function(){
			jQuery(this).toggleClass('active');
			if(jQuery('#dlab-password').attr('type') == 'password'){
				jQuery('#dlab-password').attr('type','text');
			}else if(jQuery('#dlab-password').attr('type') == 'text'){
				jQuery('#dlab-password').attr('type','password');
			}
		});
	}
	
	var heartBlast = function (){
		$(".heart").on("click", function() {
			$(this).toggleClass("heart-blast");
		});
	}
	
	var handleDzLoadMore = function() {
		$(".dlab-load-more").on('click', function(e)
		{
			e.preventDefault();	//STOP default action
			$(this).append(' <i class="fas fa-sync"></i>');
			
			var dlabLoadMoreUrl = $(this).attr('rel');
			var dlabLoadMoreId = $(this).attr('id');
			
			$.ajax({
				method: "POST",
				url: dlabLoadMoreUrl,
				dataType: 'html',
				success: function(data) {
					$( "#"+dlabLoadMoreId+"Content").append(data);
					$('.dlab-load-more i').remove();
				}
			})
		});
	}
	
	var handleLightgallery = function(){
		if(jQuery('#lightgallery').length > 0){
			$('#lightgallery').lightGallery({
				loop:true,
				thumbnail:true,
				exThumbImage: 'data-exthumbimage'
			});
		}
	}
	var handleCustomFileInput = function() {
		$(".custom-file-input").on("change", function() {
			var fileName = $(this).val().split("\\").pop();
			$(this).siblings(".custom-file-label").addClass("selected").html(fileName);
		});
	}
    
  	var vHeight = function(){
        var ch = $(window).height() - 206;
        $(".chatbox .msg_card_body").css('height',ch);
    }
    
	// var domoPanel = function(){
	// 	const ps = new PerfectScrollbar('.dlab-demo-content');
	// 	$('.dlab-demo-trigger').on('click', function() {
	// 			$('.dlab-demo-panel').addClass('show');
	// 	  });
	// 	  $('.dlab-demo-close, .bg-close').on('click', function() {
	// 			$('.dlab-demo-panel').removeClass('show');
	// 	  });
		  
	// 	  $('.dlab-demo-bx').on('click', function() {
	// 		  $('.dlab-demo-bx').removeClass('demo-active');
	// 		  $(this).addClass('demo-active');
	// 	  });
	// } 
	
	var handleDatetimepicker = function(){
		if(jQuery("#datetimepicker1").length>0) {
			$('#datetimepicker1').datetimepicker({
				inline: true,
			});
		}
	}
	
	var handleCkEditor = function(){
		if(jQuery("#ckeditor").length>0) {
			ClassicEditor
			.create( document.querySelector( '#ckeditor' ), {
				// toolbar: [ 'heading', '|', 'bold', 'italic', 'link' ]
			} )
			.then( editor => {
				window.editor = editor;
			} )
			.catch( err => {
				console.error( err.stack );
			} );
		}
	}
	
	var handleMenuPosition = function(){
		
		if(screenWidth > 1024){
			$(".metismenu  li").unbind().each(function (e) {
				if ($('ul', this).length > 0) {
					var elm = $('ul:first', this).css('display','block');
					var off = elm.offset();
					var l = off.left;
					var w = elm.width();
					var elm = $('ul:first', this).removeAttr('style');
					var docH = $("body").height();
					var docW = $("body").width();
					
					if(jQuery('html').hasClass('rtl')){
						var isEntirelyVisible = (l + w <= docW);	
					}else{
						var isEntirelyVisible = (l > 0)?true:false;	
					}
						
					if (!isEntirelyVisible) {
						$(this).find('ul:first').addClass('left');
					} else {
						$(this).find('ul:first').removeClass('left');
					}
				}
			});
		}
	}	
  
	/* Function ============ */
	return {
		init:function(){
			handleMetisMenu();
			handleAllChecked();
			handleNavigation();
			handleCurrentActive();
			handleMiniSidebar();
			handleMinHeight();
			handleDataAction();
			handleHeaderHight();
			// handleDzScroll();
			handleMenuTabs();
			handleChatbox();
			handleDeleteChat();
			// handlePerfectScrollbar();
			handleBtnNumber();
			handleDzChatUser();
			handleDzFullScreen();
			handleshowPass();
			heartBlast();
			handleDzLoadMore();
			handleLightgallery();
			handleCustomFileInput();
			vHeight();
			// domoPanel();
			handleDatetimepicker();
			handleCkEditor();
		},

		
		load:function(){
			handlePreloader();
			handleNiceSelect();
		},
		
		resize:function(){
			vHeight();
			
		},
		
		handleMenuPosition:function(){
			
			handleMenuPosition();
		},
	}
	
}();

/* Document.ready Start */	
jQuery(document).ready(function() {
	$('[data-bs-toggle="popover"]').popover();
    'use strict';
	Travl .init();

	// $('.btn-delete-msg').on('click', function(e){
	// 	e.stopPropagation();
	// })

});
/* Document.ready END */

/* Window Load START */
jQuery(window).on('load',function () {
	'use strict'; 
	Travl .load();
	setTimeout(function(){
			Travl .handleMenuPosition();
	}, 1000);
	
	jQuery.ajax({
		url: window.location.origin +"/dashboard/messages",
		type: 'POST',
		async:false,
		dataType: 'json'
	}).done(function (data) {
		if(data.success){
			if(data.get.length > 0){
				let countRead = 0;
				jQuery.each(data.get, function(i, val){
					if(!val.is_read) countRead++;
				})

				if(countRead > 0){
					jQuery('.pop_msg').show()
					jQuery('.pop_msg').html(countRead)
				} else {
					jQuery('.pop_msg').hide()
				}
			} else {
				jQuery('.pop_msg').hide()
			}
		} else {
			console.log(data.msg)
		}

		jQuery('#contentload_listmsg').addClass('d-none').fadeOut('slow')
	}).fail(function(data){
		jQuery('#contentload_listmsg').addClass('d-none').fadeOut('slow')
		resp = JSON.parse(data.responseText)
		console.log(resp.message)
		console.log("error");
	})
});
/*  Window Load END */
/* Window Resize START */
jQuery(window).on('resize',function () {
	'use strict'; 
	Travl .resize();
	setTimeout(function(){
			Travl .handleMenuPosition();
	}, 1000);
});
/*  Window Resize END */

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

$.ajaxSetup({
	headers: {
		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	}
});

$.fn.serializeObject = function()
{
   var o = {};
   var a = this.serializeArray();
   $.each(a, function() {
       if (o[this.name]) {
           if (!o[this.name].push) {
               o[this.name] = [o[this.name]];
           }
           o[this.name].push(this.value || '');
       } else {
           o[this.name] = this.value || '';
       }
   });
   return o;
};

$.fn.hasAttr = function(name) {  
   return this.attr(name) !== undefined;
};

$.validator.setDefaults({
	highlight: function(element) {
		$(element).closest('.form-group').addClass('has-error');
	},
	unhighlight: function(element) {
		$(element).closest('.form-group').removeClass('has-error');
	},
	errorElement: 'span',
	errorClass: 'text-danger',
	errorPlacement: function(error, element) {
		if(element.parent('.input-group').length) {
			error.insertAfter(element.parent());
		} else {
			if(element.closest('.form-group').length){
				element.closest('.form-group').append(error)
			} else {
				
				element.parent().append(error);
			}
		}
	}
});

$.validator.addMethod("alphanumeric", function(value, element) {
	return this.optional(element) || /^[a-z\d\-\s\?]+$/i.test(value);
}, "Letters and numbers only please");

$.validator.addMethod('filesize', function (value, element, param) {
	return this.optional(element) || (element.files[0].size <= param * 1000000)
}, 'File size must be less than {0} MB');

$.validator.addMethod("extension", function(value, element, param) {
	param = typeof param === "string" ? param.replace(/,/g, '|') : "png|jpe?g|gif";
	return this.optional(element) || value.match(new RegExp(".(" + param + ")$", "i"));
},  "Please enter a value with a valid extension.");

$(".select2_").select2();

const setDatatables = {
	searching: true,
	paging:true,
	select: true,
	info: true,         
	language: {
		paginate: {
			next: '<i class="fa fa-angle-double-right" aria-hidden="true"></i>',
			previous: '<i class="fa fa-angle-double-left" aria-hidden="true"></i>' 
		},
		searchPlaceholder: "Cari Sesuatu ..."
	},
	lengthChange: true,
	"sAjaxDataProp": ""
}

var currency = new Intl.NumberFormat('id-ID');