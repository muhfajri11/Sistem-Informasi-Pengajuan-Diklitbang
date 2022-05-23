@extends('dashboard.layouts.app')

@section('title', "Manage Roles")

{{-- @section('style')
	<link rel="stylesheet" href="{{ asset('assets/vendor/datatables/css/jquery.dataTables.min.css') }}">
@endsection --}}

@section('content')
	<div class="d-block d-md-none col-12">
		<div class="card px-4 py-3">
			<h3 class="text-secondary mb-0"><i class="fas fa-users mr-4"></i> @yield('title')</h3>
		</div>
	</div>

	<div class="col-12">
		<div class="card">
			<div class="card-body">
				<div class="profile-tab">
					<div class="custom-tab-1">
						<ul class="nav nav-tabs">
							<li class="nav-item">
								<a href="#users" data-bs-toggle="tab" class="nav-link active show">Pengguna</a>
							</li>
							<li class="nav-item">
								<a href="#roles" data-bs-toggle="tab" class="nav-link">Roles</a>
							</li>
						</ul>
						<div class="tab-content pt-4">
							<div id="users" class="tab-pane fade active show">
								<div class="row">
									<div class="col-12">
										<div class="d-flex justify-content-between mb-4">
											<h3 class="font-weight-bold">Data Pengguna</h3>
											<div class="btn-group">
												<button type="button" data-table="#data_users" class="btn btn-primary btn_refresh">
													<i class="fas fa-sync-alt"></i> Refresh Data
												</button>
												<div class="btn-group">
													<button id="btnGroupDrop1" type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown"></button>
													<div class="dropdown-menu">
														<a class="dropdown-item" data-bs-toggle="modal" href="#modal_addpengguna">
															<i class="fas fa-user-plus"></i> Tambah Pengguna
														</a>
													</div>
												</div>
											</div>
										</div>
										<div class="table-responsive">
											<table id="data_users" class="display dt-responsive">
												<thead>
													<tr>
														<th>#</th>
														<th>Nama Lengkap</th>
														<th>Email</th>
														<th>No. HP</th>
														<th>Role</th>
														<th>Action</th>
													</tr>
												</thead>
												<tbody>
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
							<div id="roles" class="tab-pane fade">
								<div class="row">
									<div class="col-12">
										<div class="d-flex justify-content-between mb-4">
											<h3 class="font-weight-bold">Data Roles</h3>
											<button type="button" data-table="#data_roles" class="btn btn-rounded btn-primary btn_refresh">
												<span class="btn-icon-start text-primary">
													<i class="fas fa-sync-alt"></i>
												</span> Refresh Data
											</button>
										</div>
										<div class="table-responsive">
											<table id="data_roles" class="display dt-responsive">
												<thead>
													<tr>
														<th>Nama</th>
														<th>Permissions</th>
														<th>Action</th>
													</tr>
												</thead>
												<tbody>
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- Modal -->
					<div class="modal fade" id="replyModal">
						<div class="modal-dialog modal-dialog-centered" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title">Post Reply</h5>
									<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
								</div>
								<div class="modal-body">
									<form>
										<textarea class="form-control" rows="4">Message</textarea>
									</form>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-danger light" data-bs-dismiss="modal">btn-close</button>
									<button type="button" class="btn btn-primary">Reply</button>
								</div>
							</div>
						</div>
					</div>

					<div class="modal fade" id="modal_addpengguna" tabindex="-1" role="dialog" aria-hidden="true">
						<div class="modal-dialog modal-lg">
							<div class="modal-content">
								<div class="modal-header">
									<h3 class="modal-title"><i class="fas fa-user-plus"></i> <span class="ml-4">Tambah Pengguna</span></h3>
									<button type="button" class="btn-close" data-bs-dismiss="modal">
									</button>
								</div>
								<div class="modal-body">
									<div class="row">
										<div class="col-12 mb-4">
											<div class="form-group">
												<label for="nama_daftar">Nama Lengkap</label>
												<input type="text" name="nama_daftar" class="form-control" id="nama_daftar" required>
											</div>
										</div>
										<div class="col-12 col-md-6 mb-4">
											<div class="form-group">
												<label for="email_daftar">Email</label>
												<input type="text" name="email_daftar" class="form-control" id="email_daftar" required>
											</div>
										</div>
										<div class="col-12 col-md-6 mb-4">
											<div class="form-group">
												<label for="phone_daftar">Nomor Handphone</label>
												<input type="number" name="phone_daftar" class="form-control" id="phone_daftar" required>
											</div>
										</div>
									</div>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-primary">Simpan Data</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('script')
	<script>
		$(document).ready(function(){
			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
			});
			
			const base_url = "{{ URL::to('/') }}",
				setDatatables = {
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

			const setBadgeRoles = roles => {
				switch(roles){
					case "masteradmin":
						return `
						<span class="badge mx-auto badge-pill badge-primary">
							${roles}
						</span>`;
						break;
					case "master":
						return `
						<span class="badge mx-auto badge-pill badge-primary">
							${roles}
						</span>`;
						break;
					case "pendidikan":
						return `
						<span class="badge badge-pill badge-secondary">
							${roles}
						</span>`;
						break;
					case "penelitian":
						return `
						<span class="badge badge-pill badge-info">
							${roles}
						</span>`;
						break;
					case "user":
						return `
						<span class="badge badge-pill badge-dark">
							${roles}
						</span>`;
						break;
				}
			}

			const dataUsers = setDatatables,
				  dataRoles = setDatatables;

			// extend prop ajax datatables Arrivals
			$.extend(dataUsers, {
				"ajax": {
					"type": "POST",
					"url": `{{ route('manage_role.users') }}`,
					"timeout": 120000
				},
				"aoColumns": [
					{
						"mData": null,
						"render": function (data, row, type, meta) {
							return data.i;
						}
					},
					{
						"mData": null,
						"render": function (data, row, type, meta) {
							return data.name;
						}
					},
					{
						"mData": null,
						"render": function (data, row, type, meta) {
							return data.email;
						}
					},
					{
						"mData": null,
						"render": function (data, row, type, meta) {
							return data.phone;
						}
					},
					{
						"mData": null,
						"render": function (data, row, type, meta) {
							return setBadgeRoles(data.role);
						}
					},
					{
						"mData": null,
						"sortable": false,
						"render": function (data, row, type, meta) {
							
							let btn = `
							<button data-id="${ data.id }" data-from="arrivals"
								class="btn btn-primary shadow btn-xs px-2"
								data-bs-toggle="modal" data-bs-target="#detail_booking">
								<i class="fas fa-eye me-0 me-sm-1 d-block d-sm-none"></i> <span class="d-none d-sm-block"><i class="fas fa-eye me-1"></i> View Data</span>
							</button>`;

							return btn;
						}
					}
				]
			})

			let users_datatable = $('#data_users').DataTable(dataUsers);

			const reloadData = idTag => {
				let text = '';
				switch(idTag){
					case '#data_users': text = "Reload Data Pengguna"; break;
					case '#data_roles': text = "Reload Data Roles"; break;
					case '#data_permissions': text = "Reload Data Permissions"; break;
				}

				$(idTag).DataTable().ajax.reload(function(){
					toastr.success("Berhasil refresh data", text, {
						timeOut: 2000,
						closeButton: !0,
						debug: !1,
						newestOnTop: !0,
						progressBar: !0,
						positionClass: "toast-top-right",
						preventDuplicates: !0,
						onclick: null,
						showDuration: "300",
						hideDuration: "1000",
						extendedTimeOut: "1000",
						showEasing: "swing",
						hideEasing: "linear",
						showMethod: "fadeIn",
						hideMethod: "fadeOut",
						tapToDismiss: !1
					})
				});
			};

			const checkDatatable = table => {
				switch(table){
					case 'users':
						if(!$.fn.DataTable.isDataTable('#data_users')){
							$('#data_users').DataTable(dataUsers);
						} else {
							reloadData('#data_users')
						}
					break;
					case 'roles':
						if(!$.fn.DataTable.isDataTable('#data_roles')){
							$.extend(dataRoles, {
								"ajax": {
									"type": "POST",
									"url": `{{ route('manage_role.roles') }}`,
									"timeout": 120000
								},
								"aoColumns": [
									{
										"mData": null,
										"render": function (data, row, type, meta) {
											return `<strong>${data.name}</strong>`;
										}
									},
									{
										"mData": null,
										"render": function (data, row, type, meta) {
											let collect = ``;
											$.each(data.permissions, function(i, val){
												collect += setBadgeRoles(val) + " ";
											})

											return collect;
										}
									},
									{
										"mData": null,
										"sortable": false,
										"render": function (data, row, type, meta) {
											
											let btn = `
											<button data-id="${ data.id }" data-from="arrivals"
												class="btn btn-primary shadow btn-xs px-2"
												data-bs-toggle="modal" data-bs-target="#detail_booking">
												<i class="fas fa-eye me-0 me-sm-1 d-block d-sm-none"></i> <span class="d-none d-sm-block"><i class="fas fa-eye me-1"></i> View Data</span>
											</button>`;

											return btn;
										}
									}
								]
							})

							$('#data_roles').DataTable(dataRoles);
						} else {
							reloadData('#data_roles')
						}
					break;
				}
			}

			$('a[data-bs-toggle="tab"]').on('shown.bs.tab', function (event) {
				const active = event.target, // newly activated tab
					previousActive = event.relatedTarget // previous active tab

				let id_active = $(active).attr('href'),
					id_previousActive = $(previousActive).attr('href'),
					data_active = $($(active).attr('href')),
					data_previousActive = $($(previousActive).attr('href'))

				id_active = id_active.split('#')[1],
				id_previousActive = id_previousActive.split('#')[1]

				checkDatatable(id_active)
			})

			$('.btn_refresh').on('click', function(e){
				e.preventDefault();
				const table = $(this).data('table');

				reloadData(table)
			})
		})
	</script>
@endsection