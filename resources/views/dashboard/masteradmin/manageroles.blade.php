@extends('dashboard.layouts.app')

@section('title', "Manage Roles")

@section('style')
	<link rel="stylesheet" href="{{ asset('assets/vendor/select2/css/select2.min.css') }}">
@endsection

@section('content')
	<div class="d-block d-md-none col-12">
		<div class="card px-4 py-3">
			<h3 class="text-secondary mb-0"><i class="fas fa-users me-2"></i> @yield('title')</h3>
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
				</div>
			</div>
		</div>
	</div>

	@include('dashboard.masteradmin.components.pengguna.mdetail_pengguna')

	@include('dashboard.masteradmin.components.pengguna.madd_pengguna')

	@include('dashboard.masteradmin.components.pengguna.medit_pengguna')
@endsection

@section('script')
	<script>
		$(document).ready(function(){

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
							<div class="btn-group">
								<button data-id="${ data.id }"
									class="btn btn-primary shadow btn-xs px-2"
									data-bs-toggle="modal" data-bs-target="#modal_detailpengguna">
									<i class="fas fa-eye me-1"></i><span class="d-none d-sm-block">View</span>
								</button>
								<div class="btn-group">
									<button id="btnGroupDrop1" type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown"></button>
									<div class="dropdown-menu">
										<button class="dropdown-item" data-id="${ data.id }"
											data-bs-toggle="modal" data-bs-target="#modal_editpengguna">
											<i class="fas fa-cog me-1"></i> Edit
										</button>
										<button class="dropdown-item delete_pengguna" data-id="${ data.id }" data-name="${data.name}">
											<i class="fas fa-trash me-1"></i> Hapus
										</button>
									</div>
								</div>
							</div>`;

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

			$('#role_daftar, #role_edit').on('change', function(e){
				e.preventDefault();
				let permission = $(this).data('is')? $("#permissions_edit") : $("#permissions_daftar");
				// data fees
				$.ajax({
					url: "{{ route('manage_role.get_role') }}",
					data: {id_role: $(this).val()},
					type: 'POST',
					async:false,
					dataType: 'json',
					beforeSend: function(){
						permission.prop('disabled', true);
						permission.val('').change();
					}
				}).done(function(data){
					if(data.success){
						const id = [];
						$.each(data.permissions, function(i, val){
							id.push(val)
						})

						permission.val(id).change();
						permission.prop('disabled', false);
					} else {
						alertError('Terjadi Kesalahan', data.msg)
					}
				}).fail(function(data){
					resp = JSON.parse(data.responseText)
					alertError("Terjadi Kesalahan", resp.message)
					console.log("error");
				});
			});

			$('#tambah_pengguna').validate({
				rules:{
					nama_daftar: { required: true, maxlength: 20, alphanumeric: true },
					email_daftar: { 
						required: true, 
						email: true,
						remote: {
							url: '{{ route("verifyemail") }}',
							type: 'POST',
							data: {
								email: function(){
									return $('#email_daftar').val();
								}
							}
						}
					},
					phone_daftar: { required: true, digits: true, minlength: 11, maxlength: 14 },
					role_daftar: { required: true },
					permissions_daftar: { required: true }
				},
				submitHandler: function (form) {
					let data_daftar = $(form).serializeArray(),
						dataDaftar  = {};

					$.each(data_daftar, function(i, val){
						if(!(val.name == 'permissions_daftar[]')){
							dataDaftar[val.name] = val.value
						}
					})

					const arr = [], permission = $("#permissions_daftar");
					$.each(permission.val(), function(i, val) {
						arr.push(val)
					});

					dataDaftar.permissions = arr;
					console.log(dataDaftar);
					
					$.ajax({
						url: '{{ route('manage_role.add_user') }}',
						method: 'POST',
						data: dataDaftar,
						beforeSend: function(){
							$('#modal_addpengguna').modal('hide')
							$('#tambah_pengguna')[0].reset();
							$('#preloader').removeClass('d-none');
							$('#main-wrapper').removeClass('show');
						}
					}).done(function (data) {						
						$('#preloader').addClass('d-none');
						$('#main-wrapper').addClass('show');
						
						if(data.success){
							alertSuccess("Berhasil Tambah Pengguna", data.msg)
							reloadData('#data_users')
						} else {
							alertError("Terjadi Kesalahan", data.msg)
						}
					}).fail(function(data){
						$('#preloader').addClass('d-none');
						$('#main-wrapper').addClass('show');

						resp = JSON.parse(data.responseText)
						alertError("Terjadi Kesalahan", resp.message)
						console.log("error");
					});   
				}
			})

			$('#edit_pengguna').validate({
				rules:{
					nama_edit: { required: true, maxlength: 20, alphanumeric: true },
					email_edit: { 
						required: true, 
						email: true,
						remote: {
							url: '{{ route("verifyemail") }}',
							type: 'POST',
							data: {
								email: function(){
									return $('#email_edit').val();
								},
								id_user: function(){
									return $('#id_edit').val();
								}
							}
						}
					},
					phone_edit: { required: true, digits: true, minlength: 11, maxlength: 14 },
					role_edit: { required: true },
					permissions_edit: { required: true }
				},
				submitHandler: function (form) {
					let data_update = $(form).serializeArray(),
						dataUpdate  = {};

					$.each(data_update, function(i, val){
						if(!(val.name == 'permissions_edit[]')){
							dataUpdate[val.name] = val.value
						}
					})

					const arr = [], permission = $("#permissions_edit");
					$.each(permission.val(), function(i, val) {
						arr.push(val)
					});

					dataUpdate.permissions = arr;
					dataUpdate._method = "PATCH";
					console.log(dataUpdate);
					
					$.ajax({
						url: '{{ route('manage_role.update_user') }}',
						type: 'PATCH',
						data: dataUpdate,
						beforeSend: function(){
							$('#modal_editpengguna').modal('hide')
							$('#edit_pengguna')[0].reset();
							$('#preloader').removeClass('d-none');
							$('#main-wrapper').removeClass('show');
						}
					}).done(function (data) {						
						$('#preloader').addClass('d-none');
						$('#main-wrapper').addClass('show');
						
						if(data.success){
							alertSuccess("Berhasil Update Pengguna", data.msg)
							reloadData('#data_users')
						} else {
							alertError("Terjadi Kesalahan", data.msg)
						}
					}).fail(function(data){
						$('#preloader').addClass('d-none');
						$('#main-wrapper').addClass('show');

						resp = JSON.parse(data.responseText)
						alertError("Terjadi Kesalahan", resp.message)
						console.log("error");
					});   
				}
			})

			$('#modal_detailpengguna').on('show.bs.modal', function (e) {
				const modal = $(this),
					  data_id = $(e.relatedTarget).data('id');

				$.ajax({
					url: "{{ route('manage_role.get_user') }}",
					data: {id: data_id},
					type: 'POST',
					async:false,
					dataType: 'json',
					beforeSend: function(){
						$('#preloader').removeClass('d-none');
						$('#main-wrapper').removeClass('show');
					}
				}).done(function(data){
					if(data.success){
						modal.find('#nama_view').val(data.name)
						modal.find('#email_view').val(data.email)
						if(data.is_verified){
							modal.find('#email_check').addClass('bg-primary text-white');
						} else {
							modal.find('#email_check').removeClass('bg-primary text-white');
						}

						modal.find('#phone_view').val(data.phone)
						modal.find('#role_view').html(data.role)
						
						let collect = ``;
						$.each(data.permissions, function(i, val){
							collect += setBadgeRoles(val.name) + " ";
						})

						modal.find('#permissions_view').html(collect)
						modal.find('#created_view').html(data.created_at)
					} else {
						alertError("Terjadi Kesalahan", data.msg)
					}

					$('#preloader').addClass('d-none');
					$('#main-wrapper').addClass('show');
				}).fail(function(data){
					$('#preloader').addClass('d-none');
					$('#main-wrapper').addClass('show');

					resp = JSON.parse(data.responseText)
                    alertError("Terjadi Kesalahan", resp.message)
                    console.log("error");
				});
			})

			$('#modal_editpengguna').on('show.bs.modal', function (e) {
				const modal = $(this),
					  data_id = $(e.relatedTarget).data('id');

				$.ajax({
					url: "{{ route('manage_role.get_user') }}",
					data: {id: data_id},
					type: 'POST',
					async:false,
					dataType: 'json',
					beforeSend: function(){
						$('#preloader').removeClass('d-none');
						$('#main-wrapper').removeClass('show');
					}
				}).done(function(data){
					if(data.success){
						modal.find('#id_edit').val(data_id);
						modal.find('#nama_edit').val(data.name);
						modal.find('#email_edit').val(data.email);
						modal.find('#phone_edit').val(data.phone);

						modal.find('#role_edit').val(data.role_id).change()

						const id = [];
						$.each(data.permissions, function(i, val){
							id.push(val.id)
						})

						modal.find('#permissions_edit').val(id).change();
					} else {
						alertError("Terjadi Kesalahan", data.msg)
					}

					$('#preloader').addClass('d-none');
					$('#main-wrapper').addClass('show');
				}).fail(function(data){
					$('#preloader').addClass('d-none');
					$('#main-wrapper').addClass('show');

					resp = JSON.parse(data.responseText)
                    alertError("Terjadi Kesalahan", resp.message)
                    console.log("error");
				});
			})

			$('#data_users').on('click', ".delete_pengguna", function(e){
				e.preventDefault();
				const id = $(this).data('id'),
					  name = $(this).data('name');

				Swal.fire({
					title: `Apakah kamu yakin ingin menghapus ${name}?`,
					showDenyButton: true,
					showConfirmButton: false,
					showCancelButton: true,
					denyButtonText: `Hapus`
				}).then((result) => {
					if (result.isDenied) {
						$.ajax({
							url: "{{ route('manage_role.delete_user') }}",
							data: {id: id},
							type: 'DELETE',
							async:false,
							dataType: 'json',
							beforeSend: function(){
								$('#preloader').removeClass('d-none');
								$('#main-wrapper').removeClass('show');
							}
						}).done(function(data){
							if(data.success){
								alertWarning("Berhasil Hapus Pengguna", data.msg)
								reloadData('#data_users')
							} else {
								alertError("Terjadi Kesalahan", data.msg)
							}

							$('#preloader').addClass('d-none');
							$('#main-wrapper').addClass('show');
						}).fail(function(data){
							$('#preloader').addClass('d-none');
							$('#main-wrapper').addClass('show');

							resp = JSON.parse(data.responseText)
							alertError("Terjadi Kesalahan", resp.message)
							console.log("error");
						});
					}
				})
			})
		})
	</script>
@endsection