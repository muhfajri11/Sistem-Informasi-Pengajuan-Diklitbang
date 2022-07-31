<!--**********************************
			Nav header start
		***********************************-->
		<div class="nav-header">
			<a href="index.html" class="brand-logo">
				<img src="{{ asset('image/assets/logo.png') }}" alt="logo" width="47.426" height="47.426">
				<svg class="brand-title" xmlns="http://www.w3.org/2000/svg" width="143" height="46.359" viewBox="0 0 143 46.359">
				  <g id="Group_26" data-name="Group 26" transform="translate(-134 -40.641)">
					<text id="Hotel_Admin_Dashboard" data-name="Hotel Admin Dashboard" transform="translate(134 60)" fill="#212121" font-size="24" font-family="Poppins-Bold, Poppins" font-weight="bold"><tspan x="0" y="0">SIM DIKLIT</tspan></text>
					<text id="Hotel_Admin_Dashboard" data-name="Hotel Admin Dashboard" transform="translate(134 83)" fill="#5d5449" font-size="12" font-family="Poppins-Light, Poppins" font-weight="300"><tspan x="0" y="0">RSUD Gunung Jati</tspan></text>
				  </g>
				</svg>
			</a>
			<div class="nav-control">
				<div class="hamburger">
					<span class="line"></span><span class="line"></span><span class="line"></span>
				</div>
			</div>
		</div>
		<!--**********************************
			Nav header end
		***********************************-->
		
		<!--**********************************
			Chat box start
		***********************************-->
		@role('user')
		<div class="chatbox">
			<div class="chatbox-close"></div>
			<div class="card mb-sm-3 mb-md-0 contacts_card dlab-chat-user-box">
				<div class="card-header chat-list-header text-center">
					<h6 class="mb-1">Pemberitahuan</h6>
					<a href="javascript:void(0);" class="delete-all-msg"><i class="fa fa-trash"></i></a>
				</div>
				<div class="card-body contacts_body p-0 dlab-scroll  " id="DLAB_W_Contacts_Body">
					<div class="position-absolute d-flex justify-content-center align-items-center bg-white d-none" 
						id="contentload_listmsg" style="height: 100%;width: 100%;z-index: 10;left: 0;">
						<div class="spinner-grow" role="status">
							<span class="sr-only">Loading...</span>
						</div>
					</div>
					<ul class="contacts" id="content_listmsg">
						<li class="text-center font-w700">Tidak ada pemberitahuan</li>
					</ul>
				</div>
			</div>
			<div class="card chat dlab-chat-history-box d-none">
				<div class="card-header chat-list-header text-center">
					<a href="javascript:void(0);" class="dlab-chat-history-back">
						<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><polygon points="0 0 24 0 24 24 0 24"/><rect fill="#000000" opacity="0.3" transform="translate(15.000000, 12.000000) scale(-1, 1) rotate(-90.000000) translate(-15.000000, -12.000000) " x="14" y="7" width="2" height="10" rx="1"/><path d="M3.7071045,15.7071045 C3.3165802,16.0976288 2.68341522,16.0976288 2.29289093,15.7071045 C1.90236664,15.3165802 1.90236664,14.6834152 2.29289093,14.2928909 L8.29289093,8.29289093 C8.67146987,7.914312 9.28105631,7.90106637 9.67572234,8.26284357 L15.6757223,13.7628436 C16.0828413,14.136036 16.1103443,14.7686034 15.7371519,15.1757223 C15.3639594,15.5828413 14.7313921,15.6103443 14.3242731,15.2371519 L9.03007346,10.3841355 L3.7071045,15.7071045 Z" fill="#000000" fill-rule="nonzero" transform="translate(9.000001, 11.999997) scale(-1, -1) rotate(90.000000) translate(-9.000001, -11.999997) "/></g></svg>
					</a>
					<div>
						<h6 class="mb-1">Pesan</h6>
						<p class="mb-0 text-dark from_contentmsg">Online</p>
					</div>						
					<a href="javascript:void(0);" class="delete-msg"><i class="fa fa-trash"></i></a>
				</div>
				<div class="card-body msg_card_body dlab-scroll" id="DLAB_W_Contacts_Body3">
					<div class="position-absolute d-flex justify-content-center align-items-center bg-white d-none" 
						id="contentload_msg" style="height: 100%;width: 100%;z-index: 10;left: 0;">
						<div class="spinner-grow" role="status">
							<span class="sr-only">Loading...</span>
						</div>
					</div>
					<div class="row" id="content_msg">
						<div class="col-12">
							<h5 class="title_contentmsg"></h5>
							<dl class="additional_contentmsg"></dl>
							<div class="body_contentmsg"></div>
							<p class="small text-center mt-2 date_contentmsg"></p>
						</div>
					</div>
				</div>
			</div>
		</div>
		@endrole
		<!--**********************************
			Chat box End
		***********************************-->
		
		<!--**********************************
			Header start
		***********************************-->
		<div class="header">
			<div class="header-content">
				<nav class="navbar navbar-expand">
					<div class="collapse navbar-collapse justify-content-between">
						<div class="header-left">
							<div class="dashboard_bar">
								@yield('title')
							</div>
						</div>
						<ul class="navbar-nav header-right">

							<li class="nav-item dropdown notification_dropdown">
								@role('user')
								<a class="nav-link bell-link " data-id="{{ auth()->user()->id }}" href="javascript:void(0);">
									<svg xmlns="http://www.w3.org/2000/svg" width="19.375" height="24" viewBox="0 0 19.375 24">
										<g id="_006-notification" data-name="006-notification" transform="translate(-341.252 -61.547)">
										  <path id="Path_1954" data-name="Path 1954" d="M349.741,65.233V62.747a1.2,1.2,0,1,1,2.4,0v2.486a8.4,8.4,0,0,1,7.2,8.314v4.517l.971,1.942a3,3,0,0,1-2.683,4.342h-5.488a1.2,1.2,0,1,1-2.4,0h-5.488a3,3,0,0,1-2.683-4.342l.971-1.942V73.547a8.4,8.4,0,0,1,7.2-8.314Zm1.2,2.314a6,6,0,0,0-6,6v4.8a1.208,1.208,0,0,1-.127.536l-1.1,2.195a.6.6,0,0,0,.538.869h13.375a.6.6,0,0,0,.536-.869l-1.1-2.195a1.206,1.206,0,0,1-.126-.536v-4.8a6,6,0,0,0-6-6Z" transform="translate(0 0)" fill="#135846" fill-rule="evenodd"/>
										</g>
									  </svg>
									<span class="badge light text-white bg-primary rounded-circle pop_msg">76</span>
								</a>
								@endrole
							</li>	
							<li class="nav-item dropdown header-profile">
								<span>{{ Auth::user()->name }}</span>
								<a class="nav-link" href="javascript:void(0);" role="button" data-bs-toggle="dropdown">
									<img src="{{ asset('image/assets/user_circle.jpg') }}" width="20" alt=""/>
								</a>
								<div class="dropdown-menu dropdown-menu-end">
									<a class="dropdown-item ai-icon" style="cursor: pointer"
										onclick="event.preventDefault();
													document.getElementById('logout-form').submit();">
										<svg  xmlns="http://www.w3.org/2000/svg" class="text-danger" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
										<span class="ms-2">Logout </span>
	
										<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
											@csrf
										</form>
									</a>
									{{-- <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
										<a class="dropdown-item" href="{{ route('logout') }}"
										   onclick="event.preventDefault();
														 document.getElementById('logout-form').submit();">
											{{ __('Logout') }}
										</a>
	
										<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
											@csrf
										</form>
									</div> --}}
								</div>
							</li>
						</ul>
					</div>
				</nav>
			</div>
		</div>
		<!--**********************************
			Header end ti-comment-alt
		***********************************-->