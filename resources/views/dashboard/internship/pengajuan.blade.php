@extends('dashboard.layouts.app')

@section('title', "Pengajuan Magang")

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
            <h3 class="text-secondary mb-0"><i class="fas fa-graduation-cap me-2"></i> @yield('title')</h3>
        </div>
    </div>

    <div class="col-12">
        <div class="card">
            <div class="card-body">
				<div class="custom-tab-1">
					<ul class="nav nav-tabs">
						<li class="nav-item">
							<a href="#reviews" data-bs-toggle="tab" class="nav-table nav-link active show">Review</a>
						</li>
						<li class="nav-item">
							<a href="#pembayaran" data-bs-toggle="tab" class="nav-table nav-link">Pembayaran</a>
						</li>
						<li class="nav-item">
							<a href="#accept" data-bs-toggle="tab" class="nav-table nav-link">Diterima</a>
						</li>
						<li class="nav-item">
							<a href="#done" data-bs-toggle="tab" class="nav-table nav-link">Selesai</a>
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
													<a class="dropdown-item" data-bs-toggle="modal" href="#modal_addmagang">
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
													<th>Nama</th>
													<th>Jurusan</th>
													<th>Mulai Magang</th>
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
													<th>Nama</th>
													<th>Jurusan</th>
													<th>Mulai Magang</th>
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
													<th>Nama</th>
													<th>Jurusan</th>
													<th>Selesai Magang</th>
													<th>Tipe Magang</th>
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
						<div id="done" class="tab-pane fade">
							<div class="row">
								<div class="col-12">
									<div class="d-flex justify-content-between mb-4">
										<h3 class="font-weight-bold">Data Pengajuan <span class="small text-light">(Selesai)</span></h3>
										<button type="button" data-table="#data_dones" class="btn btn-rounded btn-primary btn_refresh">
											<span class="btn-icon-start text-primary">
												<i class="fas fa-sync-alt"></i>
											</span> Refresh Data
										</button>
									</div>
									<div class="table-responsive">
										<table id="data_dones" class="display dt-responsive">
											<thead>
												<tr>
													<th>#</th>
													<th>Nama</th>
													<th>Jurusan</th>
													<th>Institusi</th>
													<th>Tipe Magang</th>
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

	@include('dashboard.internship.components.madd_magang')

	@include('dashboard.internship.components.medit_magang')

	@include('dashboard.internship.components.mdetail_magang')

	@include('dashboard.studibanding.components.madd_institusi')

	@include('dashboard.internship.components.mupload_pembayaran')
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
						element.closest('.form-group').append(error)
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
                formatSubmit: 'yyyy-mm-dd'
            })

			$('#start_date').pickadate('picker').set("min", "{{ date('Y-m-d') }}")
			$('#end_date').pickadate('picker').set("disable", true)

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
						<span class="badge badge-pill badge-secondary">
							${status}
						</span>`;
						break;
					case "done":
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

			const setBadgeType = type_ => {
				switch(type_){
					case 'medic':
						return `
						<span class="badge mx-auto badge-pill badge-primary">
							Medis
						</span>`;
						break;
					case 'non-medic':
						return `
						<span class="badge mx-auto badge-pill badge-secondary">
							Non Medis
						</span>`;
						break;
				}
			}

			const dataReviews = setDatatables,
                  dataPayments = setDatatables,
                  dataAccept = setDatatables,
				  dataDone = setDatatables;

            $.extend(dataReviews, {
                "ajax": {
                    "type": "POST",
                    "url": `{{ route('internship.all', 'review,reject') }}`,
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
                            return data.jurusan;
                        }
                    },
                    {
                        "mData": null,
                        "render": function (data, row, type, meta) {
                            return data.start_date;
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
                                    data-bs-toggle="modal" data-bs-target="#modal_detailmagang">
                                    <i class="fas fa-eye me-1"></i><span class="d-none d-sm-block">View</span>
                                </button>
                                <div class="btn-group">
                                    <button id="btnGroupDrop1" type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown"></button>
                                    <div class="dropdown-menu">
                                        <button class="dropdown-item" data-id="${ data.id }"
                                            data-bs-toggle="modal" data-bs-target="#modal_editmagang">
                                            <i class="fas fa-cog me-1"></i> Edit
                                        </button>
										<button class="dropdown-item" data-bs-toggle="modal" href="#modal_uploadpembayaran" data-id="${data.id}">
											<i class="fas fa-file me-1"></i> Upload Pembayaran
										</button>
                                        <button class="dropdown-item delete_magang" data-id="${ data.id }" data-name="${data.title}" data-from="#data_reviews">
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
					case '#data_done': text = "Reload Data Lulus"; break;
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
                                    "url": `{{ route('internship.all', 'pay') }}`,
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
                                            return data.jurusan;
                                        }
                                    },
                                    {
                                        "mData": null,
                                        "render": function (data, row, type, meta) {
                                            return data.start_date;
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
                                                    data-bs-toggle="modal" data-bs-target="#modal_detailmagang">
                                                    <i class="fas fa-eye me-1"></i><span class="d-none d-sm-block">View</span>
                                                </button>
                                                <div class="btn-group">
                                                    <button id="btnGroupDrop1" type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown"></button>
                                                    <div class="dropdown-menu">
                                                        <button class="dropdown-item" data-id="${ data.id }"
                                                            data-bs-toggle="modal" data-bs-target="#modal_editmagang">
                                                            <i class="fas fa-cog me-1"></i> Edit
                                                        </button>
														<button class="dropdown-item" data-bs-toggle="modal" href="#modal_uploadpembayaran" data-id="${data.id}">
															<i class="fas fa-file me-1"></i> Upload Pembayaran
														</button>
                                                        <button class="dropdown-item delete_magang" data-id="${ data.id }" data-name="${data.title}" data-from="#data_payments">
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
                                    "url": `{{ route('internship.all', 'accept') }}`,
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
                                            return data.nama;
                                        }
                                    },
                                    {
                                        "mData": null,
                                        "render": function (data, row, type, meta) {
                                            return data.jurusan;
                                        }
                                    },
                                    {
                                        "mData": null,
                                        "render": function (data, row, type, meta) {
                                            return data.end_date;
                                        }
                                    },
                                    {
                                        "mData": null,
                                        "render": function (data, row, type, meta) {
                                            return setBadgeType(data.type);
                                        }
                                    },
                                    {
                                        "mData": null,
                                        "sortable": false,
                                        "render": function (data, row, type, meta) {
                                            
                                            let btn = `
                                            	<button data-id="${ data.id }"
                                                    class="btn btn-primary shadow btn-xs px-2"
                                                    data-bs-toggle="modal" data-bs-target="#modal_detailmagang">
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

			$('.nav-table').on('shown.bs.tab', function (event) {
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

			$('.nav-daftar').on('shown.bs.tab', function (event) {
				const active = event.target, // newly activated tab
					previousActive = event.relatedTarget,	// previous active tab
					btnSubmit = $('#btnmagang_submit');

				let id_active = $(active).attr('href'),
					id_previousActive = $(previousActive).attr('href');

				id_active = id_active.split('#')[1],
				id_previousActive = id_previousActive.split('#')[1]

				if(id_active == 'berkas' || id_active == 'invoice'){
					const htmlBack = `<button 
						type="button" 
						id="btnmagang_back" 
					class="btn btn-secondary">Kembali</button>`;

					$('#html_back').html('');
					$('#html_back').append($(htmlBack));
					if(id_active == 'berkas'){
						$('#html_back button').attr('data-back', 'biodata');
						btnSubmit.prop('type', 'button');
						btnSubmit.html('Lanjut');
						btnSubmit.attr('data-next', 'invoice');
					} else {
						$('#html_back button').attr('data-back', 'berkas')
						btnSubmit.prop('type', 'submit');
						btnSubmit.html('Simpan Data');
						btnSubmit.removeAttr('data-next');
					}
				} else {
					$('#html_back').html('');
					btnSubmit.prop('type', 'button');
					btnSubmit.html('Lanjut');
					btnSubmit.attr('data-next', 'berkas');
				}
			})

			$('.nav-edit').on('shown.bs.tab', function (event) {
				const active = event.target, // newly activated tab
					previousActive = event.relatedTarget,	// previous active tab
					modal = $(active).closest('.modal'),
					btnSubmit = modal.find('#btnmagang_submit');

				let id_active = $(active).attr('href'),
					id_previousActive = $(previousActive).attr('href');

				id_active = id_active.split('#')[1],
				id_previousActive = id_previousActive.split('#')[1]

				if(id_active == 'berkas_edit' || id_active == 'invoice_edit'){
					const htmlBack = `<button 
						type="button" 
						id="btnmagang_back" 
					class="btn btn-secondary">Kembali</button>`;

					modal.find('#html_back').html('');
					modal.find('#html_back').append($(htmlBack));
					if(id_active == 'berkas_edit'){
						modal.find('#html_back button').attr('data-back', 'biodata_edit');
						btnSubmit.prop('type', 'button');
						btnSubmit.html('Lanjut');
						btnSubmit.attr('data-next', 'invoice_edit');
					} else {
						modal.find('#html_back button').attr('data-back', 'berkas_edit')
						btnSubmit.prop('type', 'submit');
						btnSubmit.html('Simpan Data');
						btnSubmit.removeAttr('data-next');
					}
				} else {
					modal.find('#html_back').html('');
					btnSubmit.prop('type', 'button');
					btnSubmit.html('Lanjut');
					btnSubmit.attr('data-next', 'berkas_edit');
				}
			})

			$('#modal_addmagang, #modal_editmagang').on('click', '#btnmagang_submit', function(e){
				const modal = $(this).closest('.modal'),
					  type = $(this).prop('type'),
					  next = $(this).attr('data-next');

				if(type == 'button') modal.find(`a[href="#${next}"]`).tab('show')
			})

			$('#modal_addmagang, #modal_editmagang').on('click', '#btnmagang_back', function(){
				const modal = $(this).closest('.modal'),
					  next = $(this).attr('data-back');

				modal.find(`a[href="#${next}"]`).tab('show')
			})

			$('#modal_addmagang, #modal_editmagang, #modal_uploadpembayaran').on('change', '.form-daftar', function(e) {
				const btn_preview = $(this).parent().parent(),
					  form_file = $(this),
					  reader = new FileReader();

				if(this.files[0]){
					const fileTypes = ['pdf'],
						  extension = this.files[0].name.split('.').pop().toLowerCase(),  //file extension from input file
            			  isSuccess = fileTypes.indexOf(extension) > -1;  //is extension in acceptable types

					reader.onload = function(e) {
						btn_preview.find('button').prop('disabled', false)
						btn_preview.find('button').removeClass('btn-dark')
						btn_preview.find('button').addClass('btn-secondary')
						btn_preview.find('button').attr('href', e.target.result);

						if(isSuccess){
							btn_preview.find('button').attr('data-type', 'pdf')
						} else {
							btn_preview.find('button').removeAttr('data-type');
						}
					}
					reader.readAsDataURL(this.files[0]);
				} else {
					btn_preview.find('button').prop('disabled', true)
					btn_preview.find('button').addClass('btn-dark')
					btn_preview.find('button').removeClass('btn-secondary')
					btn_preview.find('button').removeAttr('href');
					btn_preview.find('button').removeAttr('data-type');
				}

			});

			$('#modal_addmagang, #modal_editmagang').on('change', 'input[name="start_date"]', function(e) {
				const modal = $(this).closest('.modal')
					  minDate = new Date($(this).val());

				minDate.setMonth(minDate.getMonth()+1);
				modal.find('input[name="end_date"]').val('')
				modal.find('input[name="end_date"]').pickadate('picker').set({
					disable: false,
					min: minDate // +1 Month
				})
			});

			$('#modal_addmagang, #modal_editmagang').on('click', '.min_members', function(e){
                e.preventDefault();
                const members = $(this).parent().find('input'),
                      membersNow = parseInt(members.val())

                if(membersNow > 1) members.val(membersNow - 1)
            })

            $('#modal_addmagang, #modal_editmagang').on('click', '.add_members', function(e){
                e.preventDefault();
                const members = $(this).parent().find('input'),
                      membersNow = parseInt(members.val())

                if(membersNow > 0) members.val(membersNow + 1)
            })

			$('#modal_addmagang, #modal_editmagang').on('show.bs.modal', function (e) {
                const modal = $(this),
					  data_id = $(e.relatedTarget).data('id');
				let institutions, province;

                $.when(
					$.ajax({
						url: '{{ route('get_institutions') }}',
						type: 'POST',
						dataType: 'json',
						cache: false
					}).done(function (data) {
						if(data.success){
							institutions = data.get
						} else {
							alertError("Terjadi Kesalahan", data.msg)
						}
					}).fail(function(data){
						resp = JSON.parse(data.responseText)
						alertError("Terjadi Kesalahan", resp.message)
						console.log("error");
					}),
					$.ajax({
						url: 'https://dev.farizdotid.com/api/daerahindonesia/provinsi',
						type: 'GET',
						dataType: 'json',
						headers: '',
						cache: false
					}).done(function (data) {
						province = data.provinsi
					}).fail(function(data){
						console.log(data)
						console.log("error");
					})
				).then(function(){
					let html_ = [];

					if(modal.prop('id') == 'modal_addmagang'){
						modal.find('input[name="name"]').val("{{ auth()->user()->name }}")
						modal.find('input[name="phone"]').val("{{ auth()->user()->phone }}")
					} else {
						modal.find('#id_bukti').val(data_id)
					}

					$.each(institutions, function(i, val) {
						html_.push({id: val.id, text: val.name});
					})
					modal.find("select[name='institusi']").html('').select2({data: html_});

					html_ = [];
					$.each(province, function(i, val) {
						html_.push({id: val.id, text: val.nama});
					})

					modal.find("select[name='province']").html('').select2({data: html_});
					if(modal.prop('id') == 'modal_addmagang'){
						modal.find("select[name='province']").attr('data-city', '3209');
						modal.find("select[name='province']").val(32).change();
					}
				})

				if(modal.prop('id') == 'modal_editmagang'){
					$.ajax({
						url: '{{ route('internship.get') }}',
						type: 'POST',
						data : {id: data_id},
						dataType: 'json',
						cache: false
					}).done(function (data) {
						if(data.success){
							const htmlBtnShow = `<button class="btn btn-secondary btn-xs ms-2" data-fancybox></button>`;
							let htmlBtn, check;

							modal.find('input[name="name"]').val(data.get.name)
							modal.find('input[name="nim"]').val(data.get.nim)
							modal.find('input[name="jurusan"]').val(data.get.jurusan)
							modal.find('select[name="institusi"]').val(data.get.institution_id).change()
							modal.find('input[name="semester"]').val(data.get.semester)
							modal.find('select[name="type"]').val(data.get.type).change()
							modal.find('input[name="phone"]').val(data.get.phone)
							modal.find("select[name='province']").attr('data-city', data.get.city);
							modal.find("select[name='province']").val(data.get.province).change();
							modal.find('input[name="start_date"]').pickadate('picker').set('select', data.get.start_date, { format: 'yyyy-mm-dd' })
							modal.find('input[name="end_date"]').pickadate('picker').set('select', data.get.end_date, { format: 'yyyy-mm-dd' })

							modal.find('textarea[name="address"]').val(data.get.address)
							if(data.get.file_internship.mou){
								modal.find('#docmou_edit').html('Punya')
							} else {
								modal.find('#docmou_edit').html('Tidak Punya')
							}

							modal.find('#pay_edit').html(`Rp ${currency.format(data.get.total_paid)}`)

							htmlBtn = $(htmlBtnShow).html('Lihat KTM').attr('href', data.get.file_internship.ktm)
							check = data.get.file_internship.ktm.split('.')[1];
							if(check == 'pdf') htmlBtn.attr('data-type', 'pdf');

							modal.find('#btnedit_ktm').append(htmlBtn)

							htmlBtn = $(htmlBtnShow).html('Lihat Proposal').attr({
								href: data.get.file_internship.proposal,
								"data-type": 'pdf'
							})
							modal.find('#btnedit_proposal').append(htmlBtn)

							htmlBtn = $(htmlBtnShow).html('Lihat Antigen').attr({
								href: data.get.file_internship.antigen,
								"data-type": 'pdf'
							})
							modal.find('#btnedit_antigen').append(htmlBtn)

							htmlBtn = $(htmlBtnShow).html('Lihat Izin Ortu').attr('href', data.get.file_internship.izin_ortu)
							check = data.get.file_internship.izin_ortu.split('.')[1];
							if(check == 'pdf') htmlBtn.attr('data-type', 'pdf');

							modal.find('#btnedit_izinortu').append(htmlBtn)

							htmlBtn = $(htmlBtnShow).html('Lihat Transkrip').attr({
								href: data.get.file_internship.transkrip,
								"data-type": 'pdf'
							})
							modal.find('#btnedit_transkrip').append(htmlBtn)

							htmlBtn = $(htmlBtnShow).html('Lihat Panduan Praktek').attr({
								href: data.get.file_internship.panduan_praktek,
								"data-type": 'pdf'
							})
							modal.find('#btnedit_panduanpraktek').append(htmlBtn)

							htmlBtn = $(htmlBtnShow).html('Lihat Izin Magang').attr({
								href: data.get.file_internship.izin_pkl,
								"data-type": 'pdf'
							})
							modal.find('#btnedit_izinmagang').append(htmlBtn)

							htmlBtn = $(htmlBtnShow).html('Lihat Akreditasi').attr({
								href: data.get.file_internship.akreditasi,
								"data-type": 'pdf'
							})
							modal.find('#btnedit_akreditasi').append(htmlBtn)

							if(data.get.file_internship.mou){
								htmlBtn = $(htmlBtnShow).html('Lihat Mou').attr({
									href: data.get.file_internship.mou,
									"data-type": 'pdf'
								})
								modal.find('#btnedit_mou').append(htmlBtn)
							}

							if(data.get.file_internship.bukti_pkl){
								htmlBtn = $(htmlBtnShow).html('Lihat Bukti Magang').attr({
									href: data.get.file_internship.bukti_pkl,
									"data-type": 'pdf'
								})
								modal.find('#btnedit_bukti').append(htmlBtn)
							}

							if(data.get.file_internship.eviden_paid){
								htmlBtn = $(htmlBtnShow).html('Lihat Bukti Pembayaran').attr('href', data.get.file_internship.eviden_paid)
								check = data.get.file_internship.eviden_paid.split('.')[1];
								if(check == 'pdf') htmlBtn.attr('data-type', 'pdf');

								modal.find('#btnedit_evidenpaid').append(htmlBtn)
							}
						} else {
							alertError("Terjadi Kesalahan", data.msg)
						}
					}).fail(function(data){
						resp = JSON.parse(data.responseText)
						alertError("Terjadi Kesalahan", resp.message)
						console.log("error");
					})
				}
            })

			$('#modal_uploadpembayaran').on('show.bs.modal', function (e) {
				const modal = $(this),
					  id = $(e.relatedTarget).data('id');

				$('#modal_detailmagang').modal('hide');
				modal.find('#id_bukti').val(id)

				$.ajax({
					url: "{{ route('internship.get') }}",
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
							<button class="btn btn-secondary btn-xs" data-fancybox></button>`;

						if(data.get.file_internship.mou){
							modal.find('#docmou_view').html("Punya");
						} else {
							modal.find('#docmou_view').html("Tidak Punya");
						}
						modal.find('#pay_view').html("Rp " + currency.format(data.get.total_paid));

						if(data.get.file_internship.eviden_paid){
							const htmlBtn = $(btnShowEviden).html('Lihat Bukti Pembayaran').attr('href', data.get.file_internship.eviden_paid)
							const check = data.get.file_internship.eviden_paid.split('.')[1];
							if(check == 'pdf') htmlBtn.attr('data-type', 'pdf');

							modal.find('#btn_evidenview').append(htmlBtn)
						}

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

			$('#modal_detailmagang').on('show.bs.modal', function (e) {
				const modal = $(this),
					  data_id = $(e.relatedTarget).data('id');

				$.ajax({
					url: "{{ route('internship.get') }}",
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
						let btnEviden = `
							<button class="btn btn-dark" data-bs-toggle="modal" href="#modal_uploadpembayaran" data-id="${data.get.id}">
								Upload Bukti Pembayaran
							</button>`, 
							htmlBtnShow = `<button class="btn btn-secondary btn-xs" data-fancybox></button>`,
							province, city, htmlBtn, check;

						modal.find('#name_view').html(data.get.name);
						modal.find('#nim_view').html(data.get.nim);
						modal.find('#institusi_view').html(data.get.institution.name);
						modal.find('#semester_view').html(`Semester ${data.get.semester}`);
						modal.find('#jurusan_view').html(data.get.jurusan);
						modal.find('#type_view').html(setBadgeType(data.get.type));
						modal.find('#start_view').html(data.get.start_date);
						modal.find('#end_view').html(data.get.end_date);
						modal.find('#address_view').html(data.get.address);
						modal.find('#status_view').html(setBadgeStatus(data.get.status));
						modal.find('#statuspay_view').html(setBadgePay(data.get.paid));

						if(data.get.file_internship.mou){
							modal.find('#docmou_view').html('Punya')
						} else {
							modal.find('#docmou_view').html('Tidak Punya')
						}

						modal.find('#pay_view').html(`Rp ${currency.format(data.get.total_paid)}`)

						htmlBtn = $(htmlBtnShow).html('Lihat KTM').attr('href', data.get.file_internship.ktm)
						check = data.get.file_internship.ktm.split('.')[1];
						if(check == 'pdf') htmlBtn.attr('data-type', 'pdf');

						modal.find('#ktm_view').append(htmlBtn)

						htmlBtn = $(htmlBtnShow).html('Lihat Proposal').attr({
							href: data.get.file_internship.proposal,
							"data-type": 'pdf'
						})
						modal.find('#proposal_view').append(htmlBtn)

						htmlBtn = $(htmlBtnShow).html('Lihat Antigen').attr({
							href: data.get.file_internship.antigen,
							"data-type": 'pdf'
						})
						modal.find('#antigen_view').append(htmlBtn)

						htmlBtn = $(htmlBtnShow).html('Lihat Izin Ortu').attr('href', data.get.file_internship.izin_ortu)
						check = data.get.file_internship.izin_ortu.split('.')[1];
						if(check == 'pdf') htmlBtn.attr('data-type', 'pdf');

						modal.find('#izinortu_view').append(htmlBtn)

						htmlBtn = $(htmlBtnShow).html('Lihat Transkrip').attr({
							href: data.get.file_internship.transkrip,
							"data-type": 'pdf'
						})
						modal.find('#transkrip_view').append(htmlBtn)

						htmlBtn = $(htmlBtnShow).html('Lihat Panduan Praktek').attr({
							href: data.get.file_internship.panduan_praktek,
							"data-type": 'pdf'
						})
						modal.find('#panduanpraktek_view').append(htmlBtn)

						htmlBtn = $(htmlBtnShow).html('Lihat Izin Magang').attr({
							href: data.get.file_internship.izin_pkl,
							"data-type": 'pdf'
						})
						modal.find('#izinpkl_view').append(htmlBtn)

						htmlBtn = $(htmlBtnShow).html('Lihat Akreditasi').attr({
							href: data.get.file_internship.akreditasi,
							"data-type": 'pdf'
						})
						modal.find('#akreditasi_view').append(htmlBtn)

						if(data.get.file_internship.mou){
							htmlBtn = $(htmlBtnShow).html('Lihat Mou').attr({
								href: data.get.file_internship.mou,
								"data-type": 'pdf'
							})
							modal.find('#mou_view').append(htmlBtn)
						} else {
							modal.find('#mou_view').html("<h5>Tidak ada berkas</h5>")
						}

						if(data.get.file_internship.bukti_pkl){
							htmlBtn = $(htmlBtnShow).html('Lihat Bukti Magang').attr({
								href: data.get.file_internship.bukti_pkl,
								"data-type": 'pdf'
							})
							modal.find('#buktipkl_view').append(htmlBtn)
						} else {
							modal.find('#buktipkl_view').html("<h5>Tidak ada berkas</h5>")
						}

						if(data.get.file_internship.eviden_paid){
							htmlBtn = $(htmlBtnShow).html('Lihat Bukti Pembayaran').attr('href', data.get.file_internship.eviden_paid)
							check = data.get.file_internship.eviden_paid.split('.')[1];
							if(check == 'pdf') htmlBtn.attr('data-type', 'pdf');

							modal.find('#evidenpaid_view').append(htmlBtn)
						} else {
							modal.find('#evidenpaid_view').append(btnEviden)
						}

						$.when(
							$.ajax({
								url: 'https://dev.farizdotid.com/api/daerahindonesia/provinsi/' + data.get.province,
								type: 'GET',
								dataType: 'json',
								headers: '',
								cache: false
							}).done(function (data) {
								province = data.nama
							}).fail(function(data){
								console.log(data)
								console.log("error");
							}),
							$.ajax({
								url: 'https://dev.farizdotid.com/api/daerahindonesia/kota/' + data.get.city,
								type: 'GET',
								dataType: 'json',
								headers: '',
								cache: false
							}).done(function (data) {
								city = data.nama
							}).fail(function(data){
								console.log(data)
								console.log("error");
							})
						).then(function(){
							modal.find('#province_view').html(province);
							modal.find('#city_view').html(city);
						})

					} else {
						alertError("Berhasil", data.msg)
					}

					$('#preloader').addClass('d-none');
					$('#main-wrapper').addClass('show');
				}).fail(function(data){
					console.log(data.responseText)
				});
			})

			$('#modal_addmagang, #modal_editmagang').on('change', 'select[name="province"]', function(e){
				e.preventDefault();
				const modal = $(this).closest('.modal'),
					  id 	= $(this).val(),
					  elm = $(this),
					  checkattr = $(this).hasAttr('data-city');

				if(checkattr) {
					var data_id = $(this).attr('data-city');
				}

				$.ajax({
					url: `https://dev.farizdotid.com/api/daerahindonesia/kota?id_provinsi=${id}`,
					type: 'GET',
					dataType: 'json',
					headers: '',
					cache: false,
					beforeSend: function(){
						modal.find("select[name='city']").html('').select2({data: []});
					}
				}).done(function (data) {
					let city = data.kota_kabupaten, html_ = [];
					$.each(city, function(i, val) {
						html_.push({id: val.id, text: val.nama});
					})

					modal.find("select[name='city']").html('').select2({data: html_});

					if(checkattr){
						modal.find("select[name='city']").val(data_id).change()
						elm.removeAttr('data-city')
					}
				}).fail(function(data){
					console.log(data)
					console.log("error");
				})
			});

			$('#modal_addmagang').on('change', 'input[name="mou"]', function(e){
				const modal = $(this).closest('.modal'),
					  val = $(this).val();

				if(val){
					modal.find('#docmou_daftar').html('Punya')
					modal.find('#pay_daftar').html(`Rp ${currency.format(150000)}`)
				} else {
					modal.find('#docmou_daftar').html('Tidak Punya')
					modal.find('#pay_daftar').html(`Rp ${currency.format(300000)}`)
				}
			})

			$('#modal_addmagang').on('click', '#btn_addinstitusi', function(e){
                e.preventDefault();
				const modal = $(this).closest('.modal');

                modal.modal('hide');
                $('#modal_addinstitusi').modal('show');
            })

			$('#modal_addmagang, #modal_editmagang').on('hide.bs.modal', function (e) {
                const modal = $(this);

				modal.find('form')[0].reset();
				modal.find("select[name='institusi']").html('').select2({data: []});
				modal.find("select[name='province']").html('').select2({data: []});
				modal.find("select[name='city']").html('').select2({data: []});

				modal.find('button[data-fancybox]').prop('disabled', true)
				modal.find('button[data-fancybox]').removeAttr('href')
				modal.find('button[data-fancybox]').removeClass('btn-secondary')
				modal.find('button[data-fancybox]').addClass('btn-dark')
				modal.find('button[data-fancybox]').removeAttr('data-type');

				modal.find('input[name="start_date"]').val('')
				modal.find('input[name="end_date"]').val('')
				modal.find('input[name="end_date"]').pickadate('picker').set("disable", true)

				modal.find('.docmou').html('Tidak Punya')
				modal.find('.pay').html(`Rp ${currency.format(300000)}`)

				if(modal.prop('id') == 'modal_editmagang'){
					const nameId = ['ktm', 'proposal', 'antigen', 'izinortu', 'transkrip',
						'panduanpraktek', 'izinmagang', 'akreditasi', 'mou', 'buktipkl', 'evidenpaid'];

					$.each(nameId, function(i, val){
						modal.find(`#btnedit_${val}`).html('')
					})
				}
			})

			$('#modal_addinstitusi').on('hide.bs.modal', function (e) {
                const modal = $(this);

				modal.find('form')[0].reset();
			})

			$('#edit_magang').validate({
				ignore: [],
				rules:{
					name: { required: true, alphanumeric: true },
					nim: { required: true, digits: true },
					date: { required: true, date: true },
					jurusan: { required: true, alphanumeric: true },
					institusi: { required: true },
					semester: { required: true, digits: true, min: 1 },
					type: { required: true },
					start_date: { required: true, date: true }, end_date: { required: true, date: true },
					phone: { required: true, digits: true, minlength: 11, maxlength: 14 },
					city: { required: true }, province: { required: true },
					address: { required: true },
					ktm: { required: false, extension: "pdf|jpeg|jpg|png", filesize : 1 },
					proposal: { required: false, extension: "pdf", filesize : 2 },
					antigen: { required: false, extension: "pdf", filesize : 1 },
					izin_ortu: { required: false, extension: "pdf|jpeg|jpg|png", filesize : 1 },
					transkrip: { required: false, extension: "pdf", filesize : 1 },
					panduan_praktek: { required: false, extension: "pdf", filesize : 1 },
					izin_pkl: { required: false, extension: "pdf", filesize : 1 },
					akreditasi: { required: false, extension: "pdf", filesize : 1 },
					mou: { required: false, extension: "pdf", filesize : 1 },
					bukti_pkl: { required: false, extension: "pdf", filesize : 1 },
					eviden_paid: { required: false, extension: "pdf|jpeg|jpg|png", filesize : 1 },
				},
				submitHandler: function (form) {
					let data_daftar = new FormData(form);
					data_daftar.append('_method', 'PATCH');

					console.log('test')

					$.ajax({
						url: "{{ route('internship.update') }}",
						type: 'POST',
						data: data_daftar,
						async: false,
						processData: false,
						contentType: false,
						cache: false,
						dataType: 'json',
						enctype: 'multipart/form-data',
						beforeSend: function(){
							$('#modal_editmagang').modal('hide')
							$('#preloader').removeClass('d-none');
							$('#main-wrapper').removeClass('show');
						}
					}).done(function (data) {						
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

			$('#tambah_magang').validate({
				ignore: [],
				rules:{
					name: { required: true, alphanumeric: true },
					nim: { required: true, digits: true },
					date: { required: true, date: true },
					jurusan: { required: true, alphanumeric: true },
					institusi: { required: true },
					semester: { required: true, digits: true, min: 1 },
					type: { required: true },
					start_date: { required: true, date: true }, end_date: { required: true, date: true },
					phone: { required: true, digits: true, minlength: 11, maxlength: 14 },
					city: { required: true }, province: { required: true },
					address: { required: true },
					ktm: { required: true, extension: "pdf|jpeg|jpg|png", filesize : 1 },
					proposal: { required: true, extension: "pdf", filesize : 2 },
					antigen: { required: true, extension: "pdf", filesize : 1 },
					izin_ortu: { required: true, extension: "pdf|jpeg|jpg|png", filesize : 1 },
					transkrip: { required: true, extension: "pdf", filesize : 1 },
					panduan_praktek: { required: true, extension: "pdf", filesize : 1 },
					izin_pkl: { required: true, extension: "pdf", filesize : 1 },
					akreditasi: { required: true, extension: "pdf", filesize : 1 },
					mou: { required: false, extension: "pdf", filesize : 1 },
					bukti_pkl: { required: false, extension: "pdf", filesize : 1 },
					eviden_paid: { required: false, extension: "pdf|jpeg|jpg|png", filesize : 1 },
				},
				submitHandler: function (form) {
					let data_daftar = new FormData(form);

					$.ajax({
						url: "{{ route('internship.store') }}",
						type: 'POST',
						data: data_daftar,
						async: false,
						processData: false,
						contentType: false,
						cache: false,
						dataType: 'json',
						enctype: 'multipart/form-data',
						beforeSend: function(){
							$('#modal_addmagang').modal('hide')
							$('#preloader').removeClass('d-none');
							$('#main-wrapper').removeClass('show');
						}
					}).done(function (data) {						
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
						url: "{{ route('internship.update_eviden') }}",
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

        });
    </script>
@endsection