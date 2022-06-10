@extends('dashboard.layouts.app')

@section('title', "Pengajuan Studi Banding")

@section('style')
	<link rel="stylesheet" href="{{ asset('assets/vendor/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/pickadate/themes/default.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/pickadate/themes/default.date.css') }}">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" href="{{ asset('assets/vendor/fancyapps/fancy.css') }}">
@endsection

@section('content')
    <div class="d-block d-md-none col-12">
        <div class="card px-4 py-3">
            <h3 class="text-secondary mb-0"><i class="fas fa-users-class me-2"></i> @yield('title')</h3>
        </div>
    </div>

    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="profile-tab">
					<div class="custom-tab-1">
						<ul class="nav nav-tabs">
							<li class="nav-item">
								<a href="#reviews" data-bs-toggle="tab" class="nav-link active show">Review</a>
							</li>
							<li class="nav-item">
								<a href="#pembayaran" data-bs-toggle="tab" class="nav-link">Pembayaran</a>
							</li>
                            <li class="nav-item">
								<a href="#accept" data-bs-toggle="tab" class="nav-link">Diterima</a>
							</li>
						</ul>
						<div class="tab-content pt-4">
							<div id="reviews" class="tab-pane fade active show">
								<div class="row">
									<div class="col-12">
										<div class="d-flex justify-content-between mb-4">
											<h3 class="font-weight-bold">Data Pengajuan <span class="small text-light">(Review)</span></h3>
											<div class="btn-group">
												<button type="button" data-table="#data_reviews" class="btn btn-primary btn_refresh">
													<i class="fas fa-sync-alt"></i> Refresh Data
												</button>
												<div class="btn-group">
													<button id="btnGroupDrop1" type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown"></button>
													<div class="dropdown-menu">
														<a class="dropdown-item" data-bs-toggle="modal" href="#modal_addstudibanding">
															<i class="fas fa-file-alt me-2"></i> Ajukan
														</a>
													</div>
												</div>
											</div>
										</div>
										<div class="table-responsive">
											<table id="data_reviews" class="display dt-responsive">
												<thead>
													<tr>
														<th>#</th>
														<th>Judul</th>
														<th>Kunjungan</th>
														<th>Pengunjung</th>
														<th>Status</th>
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
							<div id="pembayaran" class="tab-pane fade">
                                <div class="row">
									<div class="col-12">
										<div class="d-flex justify-content-between mb-4">
											<h3 class="font-weight-bold">Data Pengajuan <span class="small text-light">(Pembayaran)</span></h3>
											<button type="button" data-table="#data_payments" class="btn btn-rounded btn-primary btn_refresh">
												<span class="btn-icon-start text-primary">
													<i class="fas fa-sync-alt"></i>
												</span> Refresh Data
											</button>
										</div>
										<div class="table-responsive">
											<table id="data_payments" class="display dt-responsive">
												<thead>
													<tr>
														<th>#</th>
														<th>Judul</th>
														<th>Kunjungan</th>
														<th>Pengunjung</th>
														<th>Status</th>
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
                            <div id="accept" class="tab-pane fade">
                                <div class="row">
									<div class="col-12">
										<div class="d-flex justify-content-between mb-4">
											<h3 class="font-weight-bold">Data Pengajuan <span class="small text-light">(Diterima)</span></h3>
											<button type="button" data-table="#data_accepts" class="btn btn-rounded btn-primary btn_refresh">
												<span class="btn-icon-start text-primary">
													<i class="fas fa-sync-alt"></i>
												</span> Refresh Data
											</button>
										</div>
										<div class="table-responsive">
											<table id="data_accepts" class="display dt-responsive">
												<thead>
													<tr>
														<th>#</th>
														<th>Judul</th>
														<th>Kunjungan</th>
														<th>Pengunjung</th>
														<th>Status</th>
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
				</div>
            </div>
        </div>
    </div>

	@include('dashboard.studibanding.components.mdetail_studibanding')

	@include('dashboard.studibanding.components.madd_studibanding')
	
	@include('dashboard.studibanding.components.medit_studibanding')

	@include('dashboard.studibanding.components.madd_institusi')

	@include('dashboard.studibanding.components.mupload_pembayaran')
@endsection

@section('script')
	<script src="{{ asset('assets/vendor/select2/js/select2.full.min.js') }}"></script>
	<script src="{{ asset('assets/js/jquery.validate.min.js') }}"></script>

    <script src="{{ asset('assets/vendor/pickadate/picker.js') }}"></script>
    <script src="{{ asset('assets/vendor/pickadate/picker.date.js') }}"></script>

	<script src="{{ asset('assets/vendor/fancyapps/fancybox.umd.js') }}"></script>

    <script>
        $(document).ready(function(){
            var currency = new Intl.NumberFormat('id-ID');

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
						error.insertAfter(element);
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
            $('.datepicker-default').pickadate({
                format: 'd mmmm yyyy',
                min: "{{ date('Y-m-d') }}",
                formatSubmit: 'yyyy-mm-dd',
                hiddenName: true
            });
			
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

			const setBadgeStatus = status => {
				switch(status){
					case "reject":
						return `
						<span class="badge mx-auto badge-pill badge-danger">
							${status}
						</span>`;
						break;
					case "review":
						return `
						<span class="badge mx-auto badge-pill badge-dark">
							${status}
						</span>`;
						break;
					case "pay":
						return `
						<span class="badge mx-auto badge-pill badge-warning">
							${status}
						</span>`;
						break;
					case "accept":
						return `
						<span class="badge badge-pill badge-primary">
							${status}
						</span>`;
						break;
				}
			}

			const setBadgePay = pay => {
				switch(pay){
					case 0:
						return `
						<span class="badge mx-auto badge-pill badge-warning">
							Belum Lunas
						</span>`;
						break;
					case 1:
						return `
						<span class="badge mx-auto badge-pill badge-primary">
							Lunas
						</span>`;
						break;
				}
			}

            const dataReviews = setDatatables,
                  dataPayments = setDatatables,
                  dataAccept = setDatatables;

            $.extend(dataReviews, {
                "ajax": {
                    "type": "POST",
                    "url": `{{ route('studi_banding.all', 'review,reject') }}`,
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
                            return data.title;
                        }
                    },
                    {
                        "mData": null,
                        "render": function (data, row, type, meta) {
                            return data.visit;
                        }
                    },
                    {
                        "mData": null,
                        "render": function (data, row, type, meta) {
                            return data.members;
                        }
                    },
                    {
                        "mData": null,
                        "render": function (data, row, type, meta) {
                            return setBadgeStatus(data.status);
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
                                    data-bs-toggle="modal" data-bs-target="#modal_detailstudibanding">
                                    <i class="fas fa-eye me-1"></i><span class="d-none d-sm-block">View</span>
                                </button>
                                <div class="btn-group">
                                    <button id="btnGroupDrop1" type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown"></button>
                                    <div class="dropdown-menu">
                                        <button class="dropdown-item" data-id="${ data.id }"
                                            data-bs-toggle="modal" data-bs-target="#modal_editstudibanding">
                                            <i class="fas fa-cog me-1"></i> Edit
                                        </button>
										<button class="dropdown-item" data-bs-toggle="modal" href="#modal_uploadpembayaran" data-id="${data.id}">
											<i class="fas fa-file me-1"></i> Upload Pembayaran
										</button>
                                        <button class="dropdown-item delete_studibanding" data-id="${ data.id }" data-name="${data.title}" data-from="#data_reviews">
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

            let reviews_datatable = $('#data_reviews').DataTable(dataReviews);

            const reloadData = idTag => {
				let text = '';
				switch(idTag){
					case '#data_reviews': text = "Reload Data Reviews"; break;
					case '#data_payments': text = "Reload Data Payments"; break;
					case '#data_accepts': text = "Reload Data Accepts"; break;
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
					case 'reviews':
						if(!$.fn.DataTable.isDataTable('#data_reviews')){
							$('#data_reviews').DataTable(dataReviews);
						} else {
							reloadData('#data_reviews')
						}
					break;
					case 'pembayaran':
						if(!$.fn.DataTable.isDataTable('#data_payments')){
							$.extend(dataPayments, {
                                "ajax": {
                                    "type": "POST",
                                    "url": `{{ route('studi_banding.all', 'pay') }}`,
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
                                            return data.title;
                                        }
                                    },
                                    {
                                        "mData": null,
                                        "render": function (data, row, type, meta) {
                                            return data.visit;
                                        }
                                    },
                                    {
                                        "mData": null,
                                        "render": function (data, row, type, meta) {
                                            return data.members;
                                        }
                                    },
                                    {
                                        "mData": null,
                                        "render": function (data, row, type, meta) {
                                            return setBadgePay(data.paid);
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
                                                    data-bs-toggle="modal" data-bs-target="#modal_detailstudibanding">
                                                    <i class="fas fa-eye me-1"></i><span class="d-none d-sm-block">View</span>
                                                </button>
                                                <div class="btn-group">
                                                    <button id="btnGroupDrop1" type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown"></button>
                                                    <div class="dropdown-menu">
                                                        <button class="dropdown-item" data-id="${ data.id }"
                                                            data-bs-toggle="modal" data-bs-target="#modal_editstudibanding">
                                                            <i class="fas fa-cog me-1"></i> Edit
                                                        </button>
														<button class="dropdown-item" data-bs-toggle="modal" href="#modal_uploadpembayaran" data-id="${data.id}">
															<i class="fas fa-file me-1"></i> Upload Pembayaran
														</button>
                                                        <button class="dropdown-item delete_studibanding" data-id="${ data.id }" data-name="${data.title}" data-from="#data_payments">
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

							$('#data_payments').DataTable(dataPayments);
						} else {
							reloadData('#data_payments')
						}
					break;
                    case 'accept':
						if(!$.fn.DataTable.isDataTable('#data_accepts')){
							$.extend(dataAccept, {
                                "ajax": {
                                    "type": "POST",
                                    "url": `{{ route('studi_banding.all', 'accept') }}`,
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
                                            return data.title;
                                        }
                                    },
                                    {
                                        "mData": null,
                                        "render": function (data, row, type, meta) {
                                            return data.visit;
                                        }
                                    },
                                    {
                                        "mData": null,
                                        "render": function (data, row, type, meta) {
                                            return data.members;
                                        }
                                    },
                                    {
                                        "mData": null,
                                        "render": function (data, row, type, meta) {
                                            return setBadgeStatus(data.status);
                                        }
                                    },
                                    {
                                        "mData": null,
                                        "sortable": false,
                                        "render": function (data, row, type, meta) {
                                            
                                            let btn = `
                                            	<button data-id="${ data.id }"
                                                    class="btn btn-primary shadow btn-xs px-2"
                                                    data-bs-toggle="modal" data-bs-target="#modal_detailstudibanding">
                                                    <i class="fas fa-eye me-1"></i><span class="d-none d-sm-block">View</span>
                                                </button>`;

                                            return btn;
                                        }
                                    }
                                ]
                            })

							$('#data_accepts').DataTable(dataAccept);
						} else {
							reloadData('#data_accepts')
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

			$('.tab-content').on('click', '.btn_refresh', function(e){
				e.preventDefault();
				const id_elm = $(this).data('table');

				reloadData(id_elm);
			})

            $('#modal_addstudibanding, #modal_editstudibanding').on('click', '.min_members', function(e){
                e.preventDefault();
                const members = $(this).parent().find('input'),
                      membersNow = parseInt(members.val()),
                      totalMembers = members.parent().parent().parent().parent().find('#totalmember'),
                      biaya = members.parent().parent().parent().parent().find('#biaya');

                if(membersNow > 1){
                    members.val(membersNow - 1)
                    totalMembers.html(members.val() + " Orang");
                    
                    if(parseInt(members.val()) < 10){
                        const cost = 300000 * parseInt(members.val());
                        biaya.html(`Rp ${currency.format(cost)}`);
                    } else {
                        const cost = 240000 * parseInt(members.val());
                        biaya.html(`Rp ${currency.format(cost)}`);
                    }
                }
            })

            $('#modal_addstudibanding, #modal_editstudibanding').on('click', '.add_members', function(e){
                e.preventDefault();
                const members = $(this).parent().find('input'),
                      membersNow = parseInt(members.val()),
                      totalMembers = members.parent().parent().parent().parent().find('#totalmember'),
                      biaya = members.parent().parent().parent().parent().find('#biaya');

                if(membersNow > 0){
                    members.val(membersNow + 1)
                    totalMembers.html(members.val() + " Orang");
                    
                    if(parseInt(members.val()) < 10){
                        const cost = 300000 * parseInt(members.val());
                        biaya.html(`Rp ${currency.format(cost)}`);
                    } else {
                        const cost = 240000 * parseInt(members.val());
                        biaya.html(`Rp ${currency.format(cost)}`);
                    }
                }
            })

            $('#add_questionDaftar').click(function(e){
                e.preventDefault();
                const listQuestion = $('#list_questionDaftar'),
                      formQuestion = `
                        <div class="form-group form_question mb-2">
                            <div class="input-group">
                                <input type="text" name="questions[]" class="form-control" required>
                                <button class="btn btn-danger delete_question" type="button">-</button>
                            </div>
                        </div>`;
                
                listQuestion.append($(formQuestion));
            })

			$('#add_questionEdit').click(function(e){
                e.preventDefault();
                const listQuestion = $('#list_questionEdit'),
                      formQuestion = `
                        <div class="form-group form_question mb-2">
                            <div class="input-group">
                                <input type="text" name="questions[]" class="form-control" required>
                                <button class="btn btn-danger delete_question" type="button">-</button>
                            </div>
                        </div>`;
                
                listQuestion.append($(formQuestion));
            })

            $('#list_questionDaftar, #list_questionEdit').on('click', '.delete_question', function(e){
                e.preventDefault();
                
                $(this).parent().parent().remove();
            })

            $('#btn_addinstitusi').click(function(e){
                e.preventDefault();
                $('#modal_addstudibanding').modal('hide');
                $('#modal_addinstitusi').modal('show');
            })

            $('#tambah_studibanding').validate({
				rules:{
					title: { required: true, alphanumeric: true },
					institution: { required: true },
					date: { required: true, date: true },
					members: { required: true, digits: true, min: 1 },
					rooms: { required: true },
					questions: { required: true, alphanumeric: true },
					attach: { required: true, extension: "pdf", filesize : 1 },
					eviden_paid: { required: false, extension: "pdf|jpeg|jpg|png", filesize : 2 }
				},
				submitHandler: function (form) {
					let data_daftar = new FormData(form),
						dataDaftar  = {};

					$.ajax({
						url: "{{ route('studi_banding.store') }}",
						method: 'POST',
						data: data_daftar,
						async: false,
						processData: false,
						contentType: false,
						cache: false,
						dataType: 'json',
						enctype: 'multipart/form-data',
						beforeSend: function(){
							$('#modal_addstudibanding').modal('hide')
							$('#preloader').removeClass('d-none');
							$('#main-wrapper').removeClass('show');
						}
					}).done(function (data) {						
						// console.log(data)
						$('#preloader').addClass('d-none');
						$('#main-wrapper').addClass('show');
						
						if(data.success){
							alertSuccess("Berhasil", data.msg)
							reloadData('#data_reviews');
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

			$('#edit_studibanding').validate({
				rules:{
					title: { required: true, alphanumeric: true },
					institution: { required: true },
					date: { required: true, date: true },
					members: { required: true, digits: true, min: 1 },
					rooms: { required: true },
					questions: { required: true, alphanumeric: true },
					attach: { required: false, extension: "pdf", filesize : 1 },
					eviden_paid: { required: false, extension: "pdf|jpeg|jpg|png", filesize : 2 }
				},
				submitHandler: function (form) {
					let data_daftar = new FormData(form);

					data_daftar.append('_method', 'PATCH');

					$.ajax({
						url: "{{ route('studi_banding.update') }}",
						method: 'POST',
						data: data_daftar,
						async: false,
						processData: false,
						contentType: false,
						cache: false,
						dataType: 'json',
						enctype: 'multipart/form-data',
						beforeSend: function(){
							$('#modal_editstudibanding').modal('hide')
							$('#edit_studibanding')[0].reset();
							$('#preloader').removeClass('d-none');
							$('#main-wrapper').removeClass('show');
						}
					}).done(function (data) {						
						// console.log(data)
						$('#preloader').addClass('d-none');
						$('#main-wrapper').addClass('show');
						
						if(data.success){
							alertSuccess("Berhasil", data.msg)
							reloadData('#data_reviews');
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

            $('#tambah_institusi').validate({
				rules:{
					name: { required: true, alphanumeric: true,
                        remote: {
							url: '{{ route("verify_institution") }}',
							type: 'POST',
							data: {
								name: function(){
									return $('#namainstitusi_daftar').val();
								}
							}
						} }
				},
				submitHandler: function (form) {
					$.ajax({
						url: "{{ route('store_institution') }}",
						method: 'POST',
						data: {"name" : $('#namainstitusi_daftar').val()},
						beforeSend: function(){
							$('#modal_addinstitusi').modal('hide')
							$('#tambah_institusi')[0].reset();
							$('#preloader').removeClass('d-none');
							$('#main-wrapper').removeClass('show');
						}
					}).done(function (data) {						
						$('#preloader').addClass('d-none');
						$('#main-wrapper').addClass('show');
						
						if(data.success){
							alertSuccess("Berhasil", data.msg)
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

			$('#upload_bukti').validate({
				rules:{
					eviden_paid: { required: true, extension: "pdf|jpeg|jpg|png", filesize : 2 }
				},
				submitHandler: function (form) {
					const formData = new FormData(form);

					formData.append('_method', 'PUT');

					$.ajax({
						url: "{{ route('studi_banding.update_eviden') }}",
						type: 'POST',
						data: formData,
						async: false,
						processData: false,
						contentType: false,
						cache: false,
						dataType: 'json',
						enctype: 'multipart/form-data',
						beforeSend: function(){
							$('#modal_uploadpembayaran').modal('hide')
							$('#upload_bukti')[0].reset();
							$('#preloader').removeClass('d-none');
							$('#main-wrapper').removeClass('show');
						}
					}).done(function (data) {						
						$('#preloader').addClass('d-none');
						$('#main-wrapper').addClass('show');
						
						if(data.success){
							alertSuccess("Berhasil", data.msg)
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

            $('#modal_addstudibanding').on('show.bs.modal', function (e) {
                const modal = $(this);

                $.ajax({
                    url: '{{ route('get_institutionroom') }}',
                    type: 'POST',
                    dataType: 'json'
                }).done(function (data) {
                    if(data.success){
						let html_ = [];

						$.each(data.get.institutions, function(i, val) {
							html_.push({id: val.id, text: val.name});
						})
						$("#institusi_daftar").html('').select2({data: html_});
						html_ = [];
						$.each(data.get.rooms, function(i, val) {
							html_.push({id: val.id, text: val.name});
						})
						$("#rooms_daftar").html('').select2({data: html_});
					} else {
						alertError("Terjadi Kesalahan", data.msg)
					}
                }).fail(function(data){
                    resp = JSON.parse(data.responseText)
                    alertError("Terjadi Kesalahan", resp.message)
                    console.log("error");
                }); 
            })

			$('#modal_editstudibanding').on('show.bs.modal', function (e) {
                const modal = $(this),
					  data_id = $(e.relatedTarget).data('id');

                $.ajax({
                    url: '{{ route('get_institutionroom') }}',
                    type: 'POST',
                    dataType: 'json'
                }).done(function (from) {
                    if(from.success){
						let html_ = [];

						$.each(from.get.institutions, function(i, val) {
							html_.push({id: val.id, text: val.name});
						})
						$("#institusi_edit").html('').select2({data: html_});
						html_ = [];
						$.each(from.get.rooms, function(i, val) {
							html_.push({id: val.id, text: val.name});
						})
						$("#rooms_edit").html('').select2({data: html_});
						$("#id_bukti").val(data_id);

						$.ajax({
							url: "{{ route('studi_banding.get') }}",
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
								let rooms = ``, rooms_id = [];
								const listQuestion = $('#list_questionEdit'),
									btnLampiran = `
										<button class="btn btn-secondary btn-xs ms-2" data-fancybox="detail" data-type="pdf">
											Lihat Lampiran
										</button>`, 
									btnShowEviden = `
										<button class="btn btn-secondary btn-xs ms-2" data-fancybox="detail">
											Lihat Bukti Pembayaran
										</button>`
									formQuestion = `
										<div class="form-group form_question mb-2">
											<div class="input-group">
												<input type="text" name="questions[]" class="form-control" required>
												<button class="btn btn-danger delete_question" type="button">-</button>
											</div>
										</div>`;

								$.each(data.get.rooms, function(i, val){
									rooms_id.push(val.id);
								})
								
								modal.find('#judul_edit').val(data.get.title);
								modal.find('#institusi_edit').val(data.get.institution.id).change();
								modal.find('#kunjungan_edit').pickadate('picker').set('select', `${data.get.visited}`, { format: 'yyyy-mm-dd' });
								modal.find('#pengunjung_edit').val(data.get.member);
								modal.find('#rooms_edit').val(rooms_id).change()
								
								$.each(data.get.questions, function(i, val){
									if(i == 0){
										modal.find('input[name="questions[]"]').val(val);
									} else {
										const question_input = $(formQuestion);
										question_input.find('input[name="questions[]"]').val(val);
										listQuestion.append(question_input);
									}
								})

								modal.find('#totalmember').html(data.get.member + " Orang");
                    
								if(parseInt(data.get.member) < 10){
									const cost = 300000 * parseInt(data.get.member);
									modal.find('#biaya').html(`Rp ${currency.format(cost)}`);
								} else {
									const cost = 240000 * parseInt(data.get.member);
									modal.find('#biaya').html(`Rp ${currency.format(cost)}`);
								}

								modal.find('#btnedit_attachview').append($(btnLampiran).attr('href', data.get.attach))
								if(data.get.eviden_paid){
									modal.find('#btnedit_evidenview').append($(btnShowEviden).attr('href', data.get.eviden_paid))
								}
							} else {
								alertError("Berhasil", data.msg)
							}

							$('#preloader').addClass('d-none');
							$('#main-wrapper').addClass('show');
						}).fail(function(data){
							console.log(data.responseText)
						});
					} else {
						alertError("Terjadi Kesalahan", from.msg)
					}
                }).fail(function(data){
                    resp = JSON.parse(data.responseText)
                    alertError("Terjadi Kesalahan", resp.message)
                    console.log("error");
                }); 
            })

			$('#modal_detailstudibanding').on('show.bs.modal', function (e) {
				const modal = $(this),
					  data_id = $(e.relatedTarget).data('id');

				$.ajax({
					url: "{{ route('studi_banding.get') }}",
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
						let rooms = ``, questionView = `
							<tr></tr>`, btnEviden = `
							<button class="btn btn-dark" data-bs-toggle="modal" href="#modal_uploadpembayaran" data-id="${data.get.id}">
								Upload Bukti Pembayaran
							</button>`, btnLampiran = `
							<button class="btn btn-secondary" data-fancybox="detail" data-type="pdf">
								Lihat Lampiran
							</button>`, btnShowEviden = `
							<button class="btn btn-secondary" data-fancybox="detail">
								Lihat Bukti Pembayaran
							</button>`;

						$.each(data.get.rooms, function(i, val){
							rooms += val.name + ", ";
						})

						modal.find('#title_view').html(data.get.title);
						modal.find('#rooms_view').html(rooms);
						modal.find('#institution_view').html(data.get.institution.name);
						modal.find('#visit_view').html(data.get.visit);
						modal.find('#members_view').html(data.get.members);
						modal.find('#pay_view').html("Rp " + currency.format(data.get.total_paid));
						modal.find('#status_view').html(setBadgeStatus(data.get.status));
						modal.find('#statuspay_view').html(setBadgePay(data.get.paid));
						modal.find('#question_view table tbody').html('');
						modal.find('#attach_view').html($(btnLampiran).attr('href', data.get.attach));
						modal.find('#eviden_view').html('')

						$.each(data.get.questions, function(i, val){
							modal.find('#question_view table tbody').append($(questionView).append(`<th>${val}</th>`));
						})

						if(data.get.eviden_paid){
							modal.find('#eviden_view').append($(btnShowEviden).attr('href', data.get.eviden_paid))
						} else {
							modal.find('#eviden_view').append(btnEviden)
						}

					} else {
						alertError("Berhasil", data.msg)
					}

					$('#preloader').addClass('d-none');
					$('#main-wrapper').addClass('show');
				}).fail(function(data){
					console.log(data.responseText)
				});
			})

			$('#modal_uploadpembayaran').on('show.bs.modal', function (e) {
				const modal = $(this),
					  id = $(e.relatedTarget).data('id');

				$('#modal_detailstudibanding').modal('hide');
				modal.find('#id_bukti').val(id)

				$.ajax({
					url: "{{ route('studi_banding.get') }}",
					data: {id: id},
					type: 'POST',
					async:false,
					dataType: 'json',
					beforeSend: function(){
						$('#preloader').removeClass('d-none');
						$('#main-wrapper').removeClass('show');
					}
				}).done(function(data){
					if(data.success){
						const btnShowEviden = `
							<button class="btn btn-secondary btn-xs" data-fancybox="detail">
								Lihat Bukti Pembayaran
							</button>`;

						modal.find('#title_view').html(data.get.title);
						modal.find('#members_view').html(data.get.members);
						modal.find('#pay_view').html("Rp " + currency.format(data.get.total_paid));
						if(data.get.eviden_paid){
							modal.find('#btn_evidenview').append($(btnShowEviden).attr('href', data.get.eviden_paid))
						} else {
							modal.find('#btn_evidenview').html('')
						}
					} else {
						alertError("Berhasil", data.msg)
					}

					$('#preloader').addClass('d-none');
					$('#main-wrapper').addClass('show');
				}).fail(function(data){
					console.log(data.responseText)
				});
			})

			$('#data_reviews, #data_payments').on('click', ".delete_studibanding", function(e){
				e.preventDefault();
				const id = $(this).data('id'),
					  name = $(this).data('name'),
					  id_elm = $(this).data('from');

				Swal.fire({
					title: `Apakah kamu yakin ingin menghapus ${name}?`,
					showDenyButton: true,
					showConfirmButton: false,
					showCancelButton: true,
					denyButtonText: `Hapus`
				}).then((result) => {
					if (result.isDenied) {
						$.ajax({
							url: "{{ route('studi_banding.delete') }}",
							data: {id: id, _method: "DELETE"},
							method: 'POST',
							async:false,
							dataType: 'json',
							beforeSend: function(){
								$('#preloader').removeClass('d-none');
								$('#main-wrapper').removeClass('show');
							}
						}).done(function(data){
							if(data.success){
								alertWarning("Berhasil Hapus Pengajuan", data.msg)
								reloadData(id_elm)
							} else {
								alertError("Terjadi Kesalahan", data.msg)
							}

							$('#preloader').addClass('d-none');
							$('#main-wrapper').addClass('show');
						}).fail(function(data){
							console.log(data.responseText)
						});
					}
				})
			})

			$('#modal_addstudibanding').on('hide.bs.modal', function (e) {
				const modal = $(this);
				
				modal.find('#tambah_studibanding')[0].reset();
				$("#institusi_daftar").html('').select2({data: []});
				$("#rooms_daftar").html('').select2({data: []});
				modal.find('.form_question:not(:first)').remove();
			})

			$('#modal_editstudibanding').on('hide.bs.modal', function (e) {
				const modal = $(this);

				modal.find('#edit_studibanding')[0].reset();
				$("#institusi_edit").html('').select2({data: []});
				$("#rooms_edit").html('').select2({data: []});
				
				modal.find('.form_question:not(:first)').remove();
				modal.find('#totalmember').html('0 Orang');
				modal.find('#biaya').html('Rp 0');

				modal.find('#btnedit_attachview').html('');
				modal.find('#btnedit_evidenview').html('');
			})
        });
    </script>
@endsection