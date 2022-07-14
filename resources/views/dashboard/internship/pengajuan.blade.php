@extends('dashboard.layouts.app')

@section('title', "Pengajuan PKL")

@section('style')
	<link rel="stylesheet" href="{{ asset('assets/vendor/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/pickadate/themes/default.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/pickadate/themes/default.date.css') }}">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" href="{{ asset('assets/vendor/fancyapps/fancy.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/vendor/owl-carousel/owl.carousel.css') }}"></link>
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
										<table id="data_reviews" class="display" style="width: 100%">
											<thead>
												<tr>
													<th>#</th>
													<th>Nama</th>
													<th>Jurusan</th>
													<th>Mulai</th>
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
										<table id="data_payments" class="display" style="width: 100%">
											<thead>
												<tr>
													<th>#</th>
													<th>Nama</th>
													<th>Jurusan</th>
													<th>Mulai</th>
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
										<table id="data_accepts" class="display" style="width: 100%">
											<thead>
												<tr>
													<th>#</th>
													<th>Nama</th>
													<th>Jurusan</th>
													<th>Selesai</th>
													<th>Tipe</th>
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
										<table id="data_dones" class="display" style="width: 100%">
											<thead>
												<tr>
													<th>#</th>
													<th>Nama</th>
													<th>Jurusan</th>
													<th>Institusi</th>
													<th>Tipe</th>
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
	<script src="{{ asset('assets/vendor/pickadate/picker.js') }}"></script>
    <script src="{{ asset('assets/vendor/pickadate/picker.date.js') }}"></script>

	<script src="{{ asset('assets/vendor/fancyapps/fancybox.umd.js') }}"></script>
	<script src="{{ asset('assets/vendor/owl-carousel/owl.carousel.js') }}"></script>

    <script>

		let carousel; //a variable thats hold owlCarousel object
		const setCarousel = {
			loop:true,
			margin:15,
			nav:true,
			autoplaySpeed: 3000,
			navSpeed: 3000,
			paginationSpeed: 3000,
			slideSpeed: 3000,
			smartSpeed: 3000,
			autoplay: true,
			animateOut: 'fadeOut',
			dots:false,
			navigation:false,
			navText: ['', ''],
			responsive:{
				0:{
					items:1
				},
				
				768:{
					items:2
				},			
				
				1400:{
					items:2
				},
				1600:{
					items:3
				},
				1750:{
					items:3
				}
			}
		}
		
		function myCarouselStart() {
			carousel = $('.rekening-slider').owlCarousel(setCarousel);
		}

        $(document).ready(function(){
            $('.datepicker-default').pickadate({
                format: 'd mmmm yyyy',
                formatSubmit: 'yyyy-mm-dd'
            })

			myCarouselStart()

			$('#start_date').pickadate('picker').set("min", "{{ date('Y-m-d') }}")
			$('#end_date').pickadate('picker').set("disable", true)

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
                                        <button class="dropdown-item delete_magang" data-id="${ data.id }" data-name="${data.name}" data-from="#data_reviews">
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
					case '#data_dones': text = "Reload Data Lulus"; break;
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
                                                        <button class="dropdown-item delete_magang" data-id="${ data.id }" data-name="${data.name}" data-from="#data_payments">
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
                                            return data.end_date;
                                        }
                                    },
                                    {
                                        "mData": null,
                                        "render": function (data, row, type, meta) {
                                            return data.type;
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
					case 'done':
						if(!$.fn.DataTable.isDataTable('#data_dones')){
							$.extend(dataDone, {
                                "ajax": {
                                    "type": "POST",
                                    "url": `{{ route('internship.all', 'done') }}`,
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
                                            return data.institution;
                                        }
                                    },
                                    {
                                        "mData": null,
                                        "render": function (data, row, type, meta) {
                                            return data.type;
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

							$('#data_dones').DataTable(dataAccept);
						} else {
							reloadData('#data_dones')
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

				minDate.setDate(minDate.getDate() + 7); // set 1 Week

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
					  data_id = $(e.relatedTarget).data('id'),
					  htmlBank = `<div class="items">
										<div class="customers review-slider">
											<div class="d-flex justify-content-between align-items-center mt-2">
												<div class="customer-profile d-flex ">
													<img src="{{ asset('image/assets/no-img.png') }}" alt="" style="width: auto;height: 30px;">
													<div class="ms-3">
														<h5 class="mb-0"><a href="javascript:void(0);" class="id-bank text-primary clipboard-text">123-21211-221</a></h5>
														<span class="font-w700 name-bank">Bank BRI</span>
													</div>
												</div>
											</div>
										</div>
									</div>`;
				let institutions, province, account, tipepkl, jenjang, fee;

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
					}),
					$.ajax({
						url: '{{ route("get_settings") }}',
						type: 'POST',
						data: {name: ['fee']},
						dataType: 'json',
						cache: false
					}).done(function (data) {
						if(data.success){
							fee = data.get.value;
						} else {
							alertError("Terjadi Kesalahan", data.msg)
						}
					}).fail(function(data){
						resp = JSON.parse(data.responseText)
						alertError("Terjadi Kesalahan", resp.message)
						console.log("error");
					}),
					$.ajax({
						url: '{{ route("setting.get_tipepkl") }}',
						type: 'POST',
						dataType: 'json',
						cache: false
					}).done(function (data) {
						if(data.success){
							tipepkl = data.get;
						} else {
							alertError("Terjadi Kesalahan", data.msg)
						}
					}).fail(function(data){
						resp = JSON.parse(data.responseText)
						alertError("Terjadi Kesalahan", resp.message)
						console.log("error");
					}),
					$.ajax({
						url: '{{ route("setting.get_jenjang") }}',
						type: 'POST',
						dataType: 'json',
						cache: false
					}).done(function (data) {
						if(data.success){
							jenjang = data.get;
						} else {
							alertError("Terjadi Kesalahan", data.msg)
						}
					}).fail(function(data){
						resp = JSON.parse(data.responseText)
						alertError("Terjadi Kesalahan", resp.message)
						console.log("error");
					}),
					$.ajax({
						url: '{{ route("setting.get_account") }}',
						type: 'POST',
						dataType: 'json',
						cache: false
					}).done(function (data) {
						if(data.success){
							account = data.get;
						} else {
							alertError("Terjadi Kesalahan", data.msg)
						}
					}).fail(function(data){
						resp = JSON.parse(data.responseText)
						alertError("Terjadi Kesalahan", resp.message)
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

					modal.find("input[name='mou']").attr({
						'data-have' : fee.internship.mou,
						'data-no'	: fee.internship.no_mou,
					});

					$.each(tipepkl, function(i, val) {
						html_.push({id: val.id, text: val.name, fee: val.fee});
					})
					modal.find("select[name='type']").html('').select2({data: html_});

					html_ = [];
					$.each(jenjang, function(i, val) {
						html_.push({id: val.id, text: val.name, fee: val.fee});
					})
					modal.find("select[name='jenjang']").html('').select2({data: html_});

					html_ = [];
					$.each(institutions, function(i, val) {
						html_.push({id: val.id, text: val.name});
					})
					modal.find("select[name='institusi']").html('').select2({data: html_});

					html_ = [];
					$.each(province, function(i, val) {
						html_.push({id: val.id, text: val.nama});
					})

					carousel.trigger("destroy.owl.carousel");
					modal.find('.rekening-slider').html('')
					$.each(account, function(i, val){
						let item = $(htmlBank);
						
						if(val.image) item.find('img').attr('src', val.image);
						item.find('.id-bank').html(val.number);
						item.find('.name-bank').html(val.name);

						modal.find('.rekening-slider').append(item)
					})
					myCarouselStart();

					modal.find("select[name='province']").html('').select2({data: html_});
					if(modal.prop('id') == 'modal_addmagang'){
						modal.find("select[name='province']").attr('data-city', '3209');
						modal.find("select[name='province']").val(32).change();

						const set_fee = parseInt(tipepkl[0].fee) 
							+ parseInt(fee.internship.no_mou) + parseInt(jenjang[0].fee);

						modal.find('#pay_daftar').html(`Rp ${currency.format(set_fee)}`)

						modal.find('.price_havemou').html(`Rp ${currency.format(fee.internship.no_mou)}`)
						modal.find('.tipe_pkl').html(`${tipepkl[0].name}`)
						modal.find('.price_tipepkl').html(`Rp ${currency.format(tipepkl[0].fee)}`)
						modal.find('.jenjang').html(`${jenjang[0].name}`)
						modal.find('.price_jenjang').html(`Rp ${currency.format(jenjang[0].fee)}`)

						modal.find('.price_total').html(`Rp ${currency.format(set_fee)}`)
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
							const htmlBtnShow = `<button class="btn btn-secondary btn-xs ms-2" data-fancybox>Buka</button>`;
							let htmlBtn, check;

							modal.find('input[name="name"]').val(data.get.name)
							modal.find('input[name="nim"]').val(data.get.nim)
							modal.find('input[name="jurusan"]').val(data.get.jurusan)
							modal.find('select[name="institusi"]').val(data.get.institution? data.get.institution_id: "").change()
							modal.find('input[name="semester"]').val(data.get.semester)
							modal.find('select[name="type"]').val(data.get.type).change()
							modal.find('select[name="jenjang"]').val(data.get.jenjang).change()
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

							htmlBtn = $(htmlBtnShow).attr('href', data.get.file_internship.ktm_ktp)
							check = data.get.file_internship.ktm_ktp.split('.')[1];
							if(check == 'pdf') htmlBtn.attr('data-type', 'pdf');

							modal.find('#btnedit_ktm').html(htmlBtn)

							htmlBtn = $(htmlBtnShow).attr({
								href: data.get.file_internship.proposal,
								"data-type": 'pdf'
							})
							modal.find('#btnedit_proposal').html(htmlBtn)

							htmlBtn = $(htmlBtnShow).attr({
								href: data.get.file_internship.antigen,
								"data-type": 'pdf'
							})
							modal.find('#btnedit_antigen').html(htmlBtn)

							htmlBtn = $(htmlBtnShow).attr('href', data.get.file_internship.izin_ortu)
							check = data.get.file_internship.izin_ortu.split('.')[1];
							if(check == 'pdf') htmlBtn.attr('data-type', 'pdf');

							modal.find('#btnedit_izinortu').html(htmlBtn)

							htmlBtn = $(htmlBtnShow).attr({
								href: data.get.file_internship.jadwal,
								"data-type": 'pdf'
							})
							modal.find('#btnedit_jadwal').html(htmlBtn)

							htmlBtn = $(htmlBtnShow).attr({
								href: data.get.file_internship.panduan_praktek,
								"data-type": 'pdf'
							})
							modal.find('#btnedit_panduanpraktek').html(htmlBtn)

							htmlBtn = $(htmlBtnShow).attr({
								href: data.get.file_internship.izin_pkl,
								"data-type": 'pdf'
							})
							modal.find('#btnedit_izinmagang').html(htmlBtn)

							if(data.get.file_internship.mou){
								htmlBtn = $(htmlBtnShow).attr({
									href: data.get.file_internship.mou,
									"data-type": 'pdf'
								})
								modal.find('#btnedit_mou').html(htmlBtn)
							}

							if(data.get.file_internship.bukti_pkl){
								htmlBtn = $(htmlBtnShow).attr({
									href: data.get.file_internship.bukti_pkl,
									"data-type": 'pdf'
								})
								modal.find('#btnedit_bukti').html(htmlBtn)
							}

							if(data.get.file_internship.eviden_paid){
								htmlBtn = $(htmlBtnShow).attr('href', data.get.file_internship.eviden_paid)
								check = data.get.file_internship.eviden_paid.split('.')[1];
								if(check == 'pdf') htmlBtn.attr('data-type', 'pdf');

								modal.find('#btnedit_evidenpaid').html(htmlBtn)
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
					  id = $(e.relatedTarget).data('id'),
					  htmlBank = `<div class="items">
										<div class="customers review-slider">
											<div class="d-flex justify-content-between align-items-center mt-2">
												<div class="customer-profile d-flex ">
													<img src="{{ asset('image/assets/no-img.png') }}" alt="" style="width: auto;height: 30px;">
													<div class="ms-3">
														<h5 class="mb-0"><a href="javascript:void(0);" class="id-bank text-primary clipboard-text">123-21211-221</a></h5>
														<span class="font-w700 name-bank">Bank BRI</span>
													</div>
												</div>
											</div>
										</div>
									</div>`;

				$('#modal_detailmagang').modal('hide');
				modal.find('#id_bukti').val(id)

				let detail, rekening;
				$.when(
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
							detail = data.get
						} else {
							alertError("Berhasil", data.msg)
						}

						$('#preloader').addClass('d-none');
						$('#main-wrapper').addClass('show');
					}).fail(function(data){
						console.log(data.responseText)
					}),
					$.ajax({
						url: '{{ route("setting.get_account") }}',
						type: 'POST',
						dataType: 'json',
						cache: false
					}).done(function (data) {
						if(data.success){
							rekening = data.get
						} else {
							alertError("Terjadi Kesalahan", data.msg)
						}
					}).fail(function(data){
						resp = JSON.parse(data.responseText)
						alertError("Terjadi Kesalahan", resp.message)
						console.log("error");
					})
				).then(function(){
					const btnShowEviden = `
						<button class="btn btn-secondary btn-xs" data-fancybox></button>`;

					if(detail.file_internship.mou){
						modal.find('#docmou_view').html("Punya");
						modal.find('.have_mou').html(`Punya`)
					} else {
						modal.find('#docmou_view').html("Tidak Punya");
						modal.find('.have_mou').html(`Tidak Punya`)
					}

					carousel.trigger("destroy.owl.carousel");
					modal.find('.rekening-slider').html('')
					$.each(rekening, function(i, val){
						let item = $(htmlBank);
						
						if(val.image) item.find('img').attr('src', val.image);
						item.find('.id-bank').html(val.number);
						item.find('.name-bank').html(val.name);

						modal.find('.rekening-slider').append(item)
					})
					myCarouselStart();

					modal.find('.price_havemou').html(`Rp ${currency.format(detail.mou_price)}`)

					modal.find('.tipe_pkl').html(`${detail.type}`)
					modal.find('.price_tipepkl').html(`Rp ${currency.format(detail.type_price)}`)

					modal.find('.jenjang').html(`${detail.jenjang}`)
					modal.find('.price_jenjang').html(`Rp ${currency.format(detail.jenjang_price)}`)

					modal.find('.price_total').html(`Rp ${currency.format(detail.total_paid)}`)
					modal.find('#pay_view').html("Rp " + currency.format(detail.total_paid));

					if(detail.file_internship.eviden_paid){
						const htmlBtn = $(btnShowEviden).html('Lihat Bukti Pembayaran').attr('href', detail.file_internship.eviden_paid)
						const check = detail.file_internship.eviden_paid.split('.')[1];
						if(check == 'pdf') htmlBtn.attr('data-type', 'pdf');

						modal.find('#btn_evidenview').html(htmlBtn)
					} else {
						modal.find('#btn_evidenview').html('')
					}
				})

				
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
							htmlBtnShow = `<button class="btn btn-secondary btn-xs" data-fancybox>Buka</button>`,
							province, city, htmlBtn, check;

						modal.find('#name_view').html(data.get.name);
						modal.find('#nim_view').html(data.get.nim);
						modal.find('#institusi_view').html(data.get.institution ? data.get.institution.name : "Tidak ada");
						modal.find('#semester_view').html(`Semester ${data.get.semester}`);
						modal.find('#jurusan_view').html(data.get.jurusan);
						modal.find('#type_view').html(data.get.type);
						modal.find('#jenjang_view').html(data.get.jenjang);
						modal.find('#start_view').html(data.get.start_date);
						modal.find('#end_view').html(data.get.end_date);
						modal.find('#address_view').html(data.get.address);
						modal.find('#status_view').html(setBadgeStatus(data.get.status));
						modal.find('#statuspay_view').html(setBadgePay(data.get.paid));

						if(data.get.file_internship.mou){
							modal.find('#docmou_view').html('Punya')
							modal.find('.have_mou').html('Punya')
						} else {
							modal.find('#docmou_view').html('Tidak Punya')
							modal.find('.have_mou').html('Tidak Punya')
						}

						modal.find('.price_havemou').html(`Rp ${currency.format(data.get.mou_price)}`)

						modal.find('.tipe_pkl').html(`${data.get.type}`)
						modal.find('.price_tipepkl').html(`Rp ${currency.format(data.get.type_price)}`)

						modal.find('.jenjang').html(`${data.get.jenjang}`)
						modal.find('.price_jenjang').html(`Rp ${currency.format(data.get.jenjang_price)}`)

						modal.find('.price_total').html(`Rp ${currency.format(data.get.total_paid)}`)

						if(data.get.rooms.length > 0){
							let rooms_ = ``;
							$.each(data.get.rooms, (i, val) => {
								rooms_ += val.name + ", ";
							})
							modal.find('#rooms_view').html(rooms_)
							modal.find('.is_rooms').removeClass('d-none')
						} else {
							modal.find('.is_rooms').addClass('d-none')
							modal.find('#rooms_view').html('')
						}

						modal.find('#pay_view').html(`Rp ${currency.format(data.get.total_paid)}`)

						htmlBtn = $(htmlBtnShow).attr('href', data.get.file_internship.ktm_ktp)
						check = data.get.file_internship.ktm_ktp.split('.')[1];
						if(check == 'pdf') htmlBtn.attr('data-type', 'pdf');

						modal.find('#ktm_view').html(htmlBtn)

						htmlBtn = $(htmlBtnShow).attr({
							href: data.get.file_internship.proposal,
							"data-type": 'pdf'
						})
						modal.find('#proposal_view').html(htmlBtn)

						htmlBtn = $(htmlBtnShow).attr({
							href: data.get.file_internship.antigen,
							"data-type": 'pdf'
						})
						modal.find('#antigen_view').html(htmlBtn)

						htmlBtn = $(htmlBtnShow).attr('href', data.get.file_internship.izin_ortu)
						check = data.get.file_internship.izin_ortu.split('.')[1];
						if(check == 'pdf') htmlBtn.attr('data-type', 'pdf');

						modal.find('#izinortu_view').html(htmlBtn)

						htmlBtn = $(htmlBtnShow).attr({
							href: data.get.file_internship.jadwal,
							"data-type": 'pdf'
						})
						modal.find('#jadwal_view').html(htmlBtn)

						htmlBtn = $(htmlBtnShow).attr({
							href: data.get.file_internship.panduan_praktek,
							"data-type": 'pdf'
						})
						modal.find('#panduanpraktek_view').html(htmlBtn)

						htmlBtn = $(htmlBtnShow).attr({
							href: data.get.file_internship.izin_pkl,
							"data-type": 'pdf'
						})
						modal.find('#izinpkl_view').html(htmlBtn)

						if(data.get.file_internship.mou){
							htmlBtn = $(htmlBtnShow).attr({
								href: data.get.file_internship.mou,
								"data-type": 'pdf'
							})
							modal.find('#mou_view').html(htmlBtn)
						} else {
							modal.find('#mou_view').html("<h5>Tidak ada berkas</h5>")
						}

						if(data.get.file_internship.bukti_pkl){
							htmlBtn = $(htmlBtnShow).attr({
								href: data.get.file_internship.bukti_pkl,
								"data-type": 'pdf'
							})
							modal.find('#buktipkl_view').html(htmlBtn)
						} else {
							modal.find('#buktipkl_view').html("<h5>Tidak ada berkas</h5>")
						}

						if(data.get.file_internship.eviden_paid){
							htmlBtn = $(htmlBtnShow).attr('href', data.get.file_internship.eviden_paid)
							check = data.get.file_internship.eviden_paid.split('.')[1];
							if(check == 'pdf') htmlBtn.attr('data-type', 'pdf');

							modal.find('#evidenpaid_view').html(htmlBtn)
						} else {
							modal.find('#evidenpaid_view').html(btnEviden)
						}

						if(data.get.file_internship.sertifikat){
							htmlBtn = $(htmlBtnShow).attr({
								href: data.get.file_internship.sertifikat,
								"data-type": 'pdf'
							})

							modal.find('.is_sertifikat').removeClass('d-none')
							modal.find('#sertifikat_view').html(htmlBtn)
						} else {
							modal.find('.is_sertifikat').addClass('d-none')
							modal.find('#sertifikat_view').html('')
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

			$('#modal_addmagang, #modal_editmagang').on('change', 'input[name="mou"], select[name="type"], select[name="jenjang"]', function(e){
				const modal = $(this).closest('.modal'),
					  input_mou = modal.find('input[name="mou"]'),
					  select_type = modal.find('select[name="type"]').select2('data')[0],
					  select_jenjang = modal.find('select[name="jenjang"]').select2('data')[0];

				let from_mou = input_mou.data('from') == 'add'? "#docmou_daftar": "#docmou_edit",
					from_pay = input_mou.data('from') == 'add'? "#pay_daftar": "#pay_edit",
					have_mou = input_mou.data('have'),
					no_mou   = input_mou.data('no'), word_mou, fee_mou;
				
				if(input_mou.val()){
					word_mou = "Punya", fee_mou = parseInt(have_mou);
				} else {
					word_mou = "Tidak Punya", fee_mou = parseInt(no_mou);
				}

				const fee_type = parseInt(select_type.fee), fee_jenjang = parseInt(select_jenjang.fee), 
					  total = fee_mou + fee_type + fee_jenjang;

				modal.find('.have_mou').html(word_mou)
				modal.find('.price_havemou').html(`Rp ${currency.format(fee_mou)}`)
				modal.find('.tipe_pkl').html(select_type.text)
				modal.find('.price_tipepkl').html(`Rp ${currency.format(fee_type)}`)
				modal.find('.jenjang').html(select_jenjang.text)
				modal.find('.price_jenjang').html(`Rp ${currency.format(fee_jenjang)}`)

				modal.find('.price_total').html(`Rp ${currency.format(total)}`)

				modal.find(from_mou).html(word_mou)
				modal.find(from_pay).html(`Rp ${currency.format(total)}`)
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

				modal.find('.price_havemou').html(`Rp 0`)
				modal.find('.price_tipepkl').html(`Rp 0`)
				modal.find('.price_jenjang').html(`Rp 0`)
				modal.find('.price_total').html(`Rp 0`)

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

			$('#data_reviews, #data_payments').on('click', ".delete_magang", function(e){
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
							url: "{{ route('internship.delete') }}",
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

			$('#edit_magang').validate({
				ignore: [],
				rules:{
					name: { required: true, alphanumeric: true },
					nim: { required: true, digits: true },
					date: { required: true, date: true },
					jurusan: { required: true, alphanumeric: true },
					institusi: { required: true },
					semester: { required: true, digits: true, min: 1 },
					type: { required: true }, jenjang: { required: true },
					start_date: { required: true, date: true }, end_date: { required: true, date: true },
					phone: { required: true, digits: true, minlength: 11, maxlength: 14 },
					city: { required: true }, province: { required: true },
					address: { required: true },
					ktm_ktp: { required: false, extension: "pdf|jpeg|jpg|png", filesize : 1 },
					proposal: { required: false, extension: "pdf", filesize : 2 },
					antigen: { required: false, extension: "pdf", filesize : 1 },
					izin_ortu: { required: false, extension: "pdf|jpeg|jpg|png", filesize : 1 },
					jadwal: { required: false, extension: "pdf", filesize : 1 },
					panduan_praktek: { required: false, extension: "pdf", filesize : 1 },
					izin_pkl: { required: false, extension: "pdf", filesize : 1 },
					mou: { required: false, extension: "pdf", filesize : 1 },
					bukti_pkl: { required: false, extension: "pdf", filesize : 1 },
					eviden_paid: { required: false, extension: "pdf|jpeg|jpg|png", filesize : 1 },
				},
				submitHandler: function (form) {
					let data_daftar = new FormData(form);
					data_daftar.append('_method', 'PATCH');

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
					type: { required: true }, jenjang: { required: true },
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
