<!--**********************************
			Sidebar start
		***********************************-->
		<div class="dlabnav">
			<div class="dlabnav-scroll">
				<ul class="metismenu" id="menu">
					<li>
						<a href="{{ route('dashboard') }}" class="{{ request()->is('/dashboard') ? 'mm-active' : '' }}" aria-expanded="false">
							<i class="flaticon-025-dashboard"></i>
							<span class="nav-text">Dashboard</span>
						</a>
					</li>
					<li>
						<a href="{{ route('manage_role') }}" class="active" aria-expanded="false">
							<i class="fas fa-users"></i>
							<span class="nav-text">Manajemen Role</span>
						</a>
					</li>
					<li>
						<a class="has-arrow " href="javascript:void()" aria-expanded="false">
							<i class="fas fa-graduation-cap"></i>
							<span class="nav-text">Magang</span>
						</a>
						<ul aria-expanded="false">
							<li><a href="{{ route('internship.approve') }}">Persetujuan</a></li>
							<li><a href="{{ route('internship') }}">Pengajuan</a></li>
							<li><a href="#!">Pengaturan</a></li>
						</ul>
					</li>
					<li>
						<a class="has-arrow " href="javascript:void()" aria-expanded="false">
							<i class="fas fa-users-class"></i>
							<span class="nav-text">Studi Banding</span>
						</a>
						<ul aria-expanded="false">
							<li><a href="{{ route('studi_banding.approve') }}">Persetujuan</a></li>
							<li><a href="{{ route('studi_banding') }}">Pengajuan</a></li>
						</ul>
					</li>
					<li>
						<a class="has-arrow " href="javascript:void()" aria-expanded="false">
							<i class="fas fa-atom"></i>
							<span class="nav-text">Penelitian</span>
						</a>
						<ul aria-expanded="false">
							<li><a href="#!">Data Pengajuan</a></li>
							<li><a href="#!">Pengambilan Data</a></li>
							<li><a href="#!">Pengajuan Penelitian</a></li>
							<li><a href="#!">Pengajuan Validasi Data</a></li>
						</ul>
					</li>
					<li><a href="{{ route('manage_room') }}" class="active" aria-expanded="false">
						<i class="fas fa-hospital-alt"></i>
						<span class="nav-text">Ruangan</span>
						</a>
					</li>
				</ul>
				
				<div class="copyright">
					<p class="text-center"><strong>SIM Diklit Dashboard</strong> © {{ date('Y')}}</p>
				</div>
			</div>
		</div>
		<!--**********************************
			Sidebar end
		***********************************-->