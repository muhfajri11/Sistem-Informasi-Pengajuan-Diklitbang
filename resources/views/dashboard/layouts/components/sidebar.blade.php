<!--**********************************
			Sidebar start
		***********************************-->
		<div class="dlabnav">
			<div class="dlabnav-scroll">
				@if (auth()->user()->hasVerifiedEmail())
				<ul class="metismenu" id="menu">
					<li>
						<a href="{{ route('dashboard') }}" class="{{ request()->is('/dashboard') ? 'mm-active' : '' }}" aria-expanded="false">
							<i class="flaticon-025-dashboard"></i>
							<span class="nav-text">Dashboard</span>
						</a>
					</li>
					@can('master')
					<li>
						<a href="{{ route('manage_role') }}" class="active" aria-expanded="false">
							<i class="fas fa-users"></i>
							<span class="nav-text">Manajemen Role</span>
						</a>
					</li>
					@endcan
					<li>
						<a class="has-arrow " href="javascript:void()" aria-expanded="false">
							<i class="fas fa-graduation-cap"></i>
							<span class="nav-text">PKL</span>
						</a>
						<ul aria-expanded="false">
							@can('pendidikan')
							<li><a href="{{ route('internship.approve') }}">Persetujuan</a></li>
							@endcan
							@can('user')
							<li><a href="{{ route('internship') }}">Pengajuan</a></li>
							@endcan
						</ul>
					</li>
					<li>
						<a class="has-arrow " href="javascript:void()" aria-expanded="false">
							<i class="fas fa-users-class"></i>
							<span class="nav-text">Studi Banding</span>
						</a>
						<ul aria-expanded="false">
							@can('pendidikan')
							<li><a href="{{ route('studi_banding.approve') }}">Persetujuan</a></li>
							@endcan
							@can('user')
							<li><a href="{{ route('studi_banding') }}">Pengajuan</a></li>
							@endcan
						</ul>
					</li>
					@canany(['penelitian', 'user'])
					<li>
						<a class="has-arrow " href="javascript:void()" aria-expanded="false">
							<i class="fas fa-atom"></i>
							<span class="nav-text">Penelitian</span>
						</a>
						<ul aria-expanded="false">
							@can('penelitian')
							<li><a href="{{ route('research.approve') }}">Persetujuan</a></li>
							@endcan
							<li><a href="{{ route('research') }}">Pengajuan</a></li>
						</ul>
					</li>
					<li>
						<a class="has-arrow " href="javascript:void()" aria-expanded="false">
							<i class="fas fa-books-medical"></i>
							<span class="nav-text">Uji Layak Etik</span>
						</a>
						<ul aria-expanded="false">
							@can('penelitian')
							<li><a class="has-arrow" href="javascript:void()" aria-expanded="false">Admin</a>
								<ul aria-expanded="false" class="left mm-collapse" style="height: 14px;">
									<li><a href="{{ route('layaketik.approve') }}">Approval Pengajuan</a></li>
								</ul>
							</li>
							@endcan
							<li><a href="{{ route('layaketik') }}">Pengisian Data</a></li>
							<li><a href="#!">Protokol Penelitian</a></li>
							<li><a href="#!">Self Assesment</a></li>
							<li><a href="#!">Hasil Telaah</a></li>
							<li><a href="#!">Perbaikan Protokol</a></li>
							<li><a href="#!">Pemberitahuan Fullboard</a></li>
						</ul>
					</li>
					@endcan
					@can('master')
					<li><a href="{{ route('manage_room') }}" class="active" aria-expanded="false">
						<i class="fas fa-hospital-alt"></i>
						<span class="nav-text">Ruangan</span>
						</a>
					</li>
					@endcan
				</ul>
				@endif
				
				<div class="copyright">
					<p class="text-center"><strong>SIM Diklit Dashboard</strong> © {{ date('Y')}}</p>
				</div>
			</div>
		</div>
		<!--**********************************
			Sidebar end
		***********************************-->