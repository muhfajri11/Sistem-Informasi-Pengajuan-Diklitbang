@extends('dashboard.layouts.app')

@section('title', "Pengajuan Layak Etik")

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
            <h3 class="text-secondary mb-0"><i class="fas fa-atom me-2"></i> @yield('title')</h3>
        </div>
    </div>

    <div class="col-12">
        <div class="card">
            <div class="card-body">
				<div class="custom-tab-1">
					<ul class="nav nav-tabs">
						<li class="nav-item">
							<a href="#reviews" data-bs-toggle="tab" class="nav-table nav-link active show">Waiting</a>
						</li>
						<li class="nav-item">
							<a href="#pembayaran" data-bs-toggle="tab" class="nav-table nav-link">Pembayaran</a>
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
										<h3 class="font-weight-bold">Data Pengajuan <span class="small text-light">(Waiting)</span></h3>
										<div class="btn-group">
											<button type="button" data-table="#data_reviews" class="btn btn-primary btn_refresh">
												<i class="fas fa-sync-alt"></i> Refresh Data
											</button>
											<div class="btn-group">
												<button id="btnGroupDrop1" type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown"></button>
												<div class="dropdown-menu">
													<a class="dropdown-item" data-bs-toggle="modal" href="#modal_addresearch">
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
													<th>Judul</th>
													<th>Peneliti Utama</th>
													<th>Mulai</th>
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
													<th>Judul</th>
													<th>Peneliti Utama</th>
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
						<div id="done" class="tab-pane fade">
							<div class="row">
								<div class="col-12">
									<div class="d-flex justify-content-between mb-4">
										<h3 class="font-weight-bold">Data Pengajuan <span class="small text-light">(Selesai, Ditolak)</span></h3>
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
													<th>Judul</th>
													<th>Peneliti Utama</th>
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

	@include('dashboard.layaketik.components.mdetail_research')

	@include('dashboard.layaketik.components.madd_research')

	@include('dashboard.layaketik.components.medit_research')

	@include('dashboard.layaketik.components.mupload_pembayaran')

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

			// $('#start_date').pickadate('picker').set("min", "{{ date('Y-m-d') }}")
			// $('#end_date').pickadate('picker').set("disable", true)

			const setBadgeStatus = status => {
				switch(status){
					case "propose":
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

			const setBadgeEtik = type_ => {
				switch(type_){
					case 1:
						return `
						<span class="badge mx-auto badge-pill badge-warning">
							Perlu
						</span>`;
						break;
					case 0:
						return `
						<span class="badge mx-auto badge-pill badge-primary">
							Tidak Perlu
						</span>`;
						break;
                    default: 
                        return '';
                        break;
				}
			}

			const setBadge = value => {
				switch(value){
					case 1:
						return `
						<span class="badge mx-auto badge-pill badge-secondary">
							Iya
						</span>`;
						break;
					case 0:
						return `
						<span class="badge mx-auto badge-pill badge-dark">
							Tidak
						</span>`;
						break;
                    default: 
                        return '';
                        break;
				}
			}

			const setKerjasama = value => {
				switch(value){
					case 'bukan_kerjasama':
						return `
						<span class="badge mx-auto badge-pill badge-dark">
							Bukan Kerjasama
						</span>`;
						break;
					case 'nasional':
						return `
						<span class="badge mx-auto badge-pill badge-secondary">
							Nasional
						</span>`;
						break;
					case 'internasional':
						return `
						<span class="badge mx-auto badge-pill badge-secondary">
							Internasional
						</span>`;
						break;
					case 'peneliti_asing':
						return `
						<span class="badge mx-auto badge-pill badge-secondary">
							Melibatkan peneliti asing
						</span>`;
						break;
                    default: 
						return ``;
                        break;
				}
			}

			const dataReviews = setDatatables,
                  dataPayments = setDatatables,
				  dataDone = setDatatables;

            $.extend(dataReviews, {
                "ajax": {
                    "type": "POST",
                    "url": `{{ route('layaketik.all', 'propose') }}`,
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
                            return data.judul;
                        }
                    },
                    {
                        "mData": null,
                        "render": function (data, row, type, meta) {
                            return data.ketua;
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
                        "sortable": false,
                        "render": function (data, row, type, meta) {
                            
                            let btn = `
                            <div class="btn-group">
                                <button data-id="${ data.id }"
                                    class="btn btn-primary shadow btn-xs px-2"
                                    data-bs-toggle="modal" data-bs-target="#modal_detailresearch">
                                    <i class="fas fa-eye me-1"></i><span class="d-none d-sm-block">View</span>
                                </button>
                                <div class="btn-group">
                                    <button id="btnGroupDrop1" type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown"></button>
                                    <div class="dropdown-menu">
                                        <button class="dropdown-item" data-id="${ data.id }"
                                            data-bs-toggle="modal" data-bs-target="#modal_editresearch">
                                            <i class="fas fa-cog me-1"></i> Edit
                                        </button>
										<button class="dropdown-item" data-bs-toggle="modal" href="#modal_uploadpembayaran" data-id="${data.id}">
											<i class="fas fa-file me-1"></i> Upload Pembayaran
										</button>
                                        <button class="dropdown-item delete_research" data-id="${ data.id }" data-name="${data.judul}" data-from="#data_reviews">
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
					case '#data_dones': text = "Reload Data Selesai"; break;
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
                                    "url": `{{ route('layaketik.all', 'pay') }}`,
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
                                            return data.judul;
                                        }
                                    },
                                    {
                                        "mData": null,
                                        "render": function (data, row, type, meta) {
                                            return data.ketua;
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
                                                    data-bs-toggle="modal" data-bs-target="#modal_detailresearch">
                                                    <i class="fas fa-eye me-1"></i><span class="d-none d-sm-block">View</span>
                                                </button>
                                                <div class="btn-group">
                                                    <button id="btnGroupDrop1" type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown"></button>
                                                    <div class="dropdown-menu">
                                                        <button class="dropdown-item" data-id="${ data.id }"
                                                            data-bs-toggle="modal" data-bs-target="#modal_editresearch">
                                                            <i class="fas fa-cog me-1"></i> Edit
                                                        </button>
														<button class="dropdown-item" data-bs-toggle="modal" href="#modal_uploadpembayaran" data-id="${data.id}">
															<i class="fas fa-file me-1"></i> Upload Pembayaran
														</button>
                                                        <button class="dropdown-item delete_research" data-id="${ data.id }" data-name="${data.judul}" data-from="#data_payments">
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
					case 'done':
						if(!$.fn.DataTable.isDataTable('#data_dones')){
							$.extend(dataDone, {
                                "ajax": {
                                    "type": "POST",
                                    "url": `{{ route('layaketik.all', 'accept') }}`,
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
                                            return data.judul;
                                        }
                                    },
                                    {
                                        "mData": null,
                                        "render": function (data, row, type, meta) {
                                            return data.ketua;
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
                                                    data-bs-toggle="modal" data-bs-target="#modal_detailresearch">
                                                    <i class="fas fa-eye me-1"></i><span class="d-none d-sm-block">View</span>
                                                </button>`;

                                            return btn;
                                        }
                                    }
                                ]
                            })

							$('#data_dones').DataTable(dataDone);
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
					modal = $(active).closest('.modal'),
					btnSubmit = $('#btnresearch_submit');

				let id_active = $(active).attr('href'),
					id_previousActive = $(previousActive).attr('href');

				id_active = id_active.split('#')[1],
				id_previousActive = id_previousActive.split('#')[1]

				if(id_active == 'invoice'){
					const htmlBack = `<button 
						type="button" 
						id="btnresearch_back" 
					class="btn btn-secondary">Kembali</button>`;

					modal.find('#html_back').html('');
					modal.find('#html_back').append($(htmlBack));
                    
					modal.find('#html_back button').attr('data-back', 'biodata')
                    btnSubmit.prop('type', 'submit');
                    btnSubmit.html('Simpan Data');
                    btnSubmit.removeAttr('data-next');
				} else {
					modal.find('#html_back').html('');
					btnSubmit.prop('type', 'button');
					btnSubmit.html('Lanjut');
					btnSubmit.attr('data-next', 'invoice');
				}
			})

			$('.nav-edit').on('shown.bs.tab', function (event) {
				const active = event.target, // newly activated tab
					previousActive = event.relatedTarget,	// previous active tab
					modal = $(active).closest('.modal'),
					btnSubmit = modal.find('#btnresearch_submit');

				let id_active = $(active).attr('href'),
					id_previousActive = $(previousActive).attr('href');

				id_active = id_active.split('#')[1],
				id_previousActive = id_previousActive.split('#')[1]

				if(id_active == 'invoice_edit'){
					const htmlBack = `<button 
						type="button" 
						id="btnresearch_back" 
					class="btn btn-secondary">Kembali</button>`;

					modal.find('#html_back').html('');
					modal.find('#html_back').append($(htmlBack));
                    
					modal.find('#html_back button').attr('data-back', 'biodata_edit')
                    btnSubmit.prop('type', 'submit');
                    btnSubmit.html('Simpan Data');
                    btnSubmit.removeAttr('data-next');
				} else {
					modal.find('#html_back').html('');
					btnSubmit.prop('type', 'button');
					btnSubmit.html('Lanjut');
					btnSubmit.attr('data-next', 'invoice_edit');
				}
			})

			$('.nav-view').on('shown.bs.tab', function (event) {
				const active = event.target, // newly activated tab
					previousActive = event.relatedTarget,	// previous active tab
					modal = $(active).closest('.modal'),
					btnSubmit = modal.find('#btnresearch_submit');

				let id_active = $(active).attr('href'),
					id_previousActive = $(previousActive).attr('href');

				id_active = id_active.split('#')[1],
				id_previousActive = id_previousActive.split('#')[1]

				if(id_active == 'invoice_view'){
					const htmlBack = `<button 
						type="button" 
						id="btnresearch_back" 
					class="btn btn-secondary">Kembali</button>`;

					modal.find('#html_back').html('');
					modal.find('#html_back').append($(htmlBack));
                    
					modal.find('#html_back button').attr('data-back', 'biodata_view')
                    btnSubmit.prop('type', 'submit');
                    btnSubmit.html('Simpan Data');
                    btnSubmit.removeAttr('data-next');
				} else {
					modal.find('#html_back').html('');
					btnSubmit.prop('type', 'button');
					btnSubmit.html('Lanjut');
					btnSubmit.attr('data-next', 'invoice_view');
				}
			})

            $('#modal_addresearch, #modal_editresearch').on('click', '#btnresearch_submit', function(e){
				const modal = $(this).closest('.modal'),
					  type = $(this).prop('type'),
					  next = $(this).attr('data-next');

				if(type == 'button') modal.find(`a[href="#${next}"]`).tab('show')
			})

			$('#modal_addresearch, #modal_editresearch').on('click', '#btnresearch_back', function(){
				const modal = $(this).closest('.modal'),
					  next = $(this).attr('data-back');

				modal.find(`a[href="#${next}"]`).tab('show')
			})

            $('#modal_addresearch, #modal_editresearch').on('change', '.form-daftar', function(e) {
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

			$('#modal_addresearch, #modal_editresearch').on('click', '.min_negara', function(e){
                e.preventDefault();
                const members = $(this).parent().find('input'),
                      membersNow = parseInt(members.val());

                if(membersNow > 1) members.val(membersNow - 1).change()
            })

            $('#modal_addresearch, #modal_editresearch').on('click', '.add_negara', function(e){
                e.preventDefault();
                const members = $(this).parent().find('input'),
                      membersNow = parseInt(members.val())

                if(membersNow > 0) members.val(membersNow + 1).change()
            })

			$('#modal_addresearch, #modal_editresearch').on('click', '.add_member', function(e){
				const modal = $(this).closest('.modal');

				e.preventDefault();
                const listMember = modal.find('.list_member'),
                      formMember = `
					  	<div class="row form_asing">
							<div class="col-12 col-md-6 mb-2">
								<div class="form-group form_member mb-1">
									<label>Nama Peneliti Asing <span class="small text-light">(Nama + Gelar)</span></label>
									<input type="text" name="nama_peneliti[]" class="form-control" required>
								</div>
							</div>
							<div class="col-12 col-md-6 mb-2">
								<div class="form-group form_member mb-1">
									<label>Institusi Peneliti Asing</label>
									<input type="text" name="institusi_peneliti[]" class="form-control" required>
								</div>
							</div>
							<div class="col-12 col-md-6 mb-2">
								<div class="form-group form_member mb-1">
									<label>Tugas & Fungsi</label>
									<input type="text" name="tugas_peneliti[]" class="form-control" required>
								</div>
							</div>
							<div class="col-12 col-md-6 mb-2">
								<div class="form-group form_member mb-1">
									<label>No. Telepon Peneliti</label>
									<input type="text" name="telp_peneliti[]" class="form-control" required>
								</div>
							</div>
							<button class="btn btn-danger btn-xs col-12 mb-2 delete_member" type="button">Hapus Peneliti Asing</button>
							<hr/>
						</div>
                        `;

                if(listMember.find('.empty_member').length > 0){
                    listMember.html('');
                    listMember.append($(formMember));
                } else {
                    listMember.append($(formMember));
                }
                
			})

            $('#modal_addresearch, #modal_editresearch').on('click', '.delete_member', function(e){
                e.preventDefault();
                const modal = $(this).closest('.modal'),
                      listMember = modal.find('.list_member');
                
                $(this).parent().remove();

                if(listMember.find('.form_member').length < 1){
                    listMember.html(`<p class="empty_member text-center">Tidak ada anggota</p>`);
                }
            })

			$('#modal_addresearch, #modal_editresearch').on('change', 'select[name="kerjasama"]', function(e) {
				const modal = $(this).closest('.modal'),
					  kerjasama = $(this).val();

				const setClass = function(negara, asing) {
					if(negara) {
						modal.find('.set_negara').removeClass('d-none');
					} else {
						modal.find('.set_negara').addClass('d-none');
						modal.find('.set_negara .input-group').html('');
					}
					
					if(asing) {
						modal.find('.set_asing').removeClass('d-none');
					} else {
						modal.find('.set_asing').addClass('d-none');
						modal.find('.form_asing').remove();
						modal.find('.list_member').html(`<p class="empty_member text-center">Tidak ada anggota</p>`);
					}
				}

				const addNegara = function() {
					const html_ = `
						<button class="btn btn-primary min_negara" type="button">-</button>
							<input type="number" name="jumlah_negara" class="form-control text-center" id="negara_daftar" value="1" readonly required>
						<button class="btn btn-primary add_negara" type="button">+</button>`;

					modal.find('.set_negara .input-group').html($(html_));
				}

				switch(kerjasama){
					case "internasional":
						addNegara(); setClass(1,0);						
						break;
					case "peneliti_asing": 
						setClass(0,1)
						break;
					default:  
						setClass(0,0)
					break;
				}
			});

			$('#modal_addresearch, #modal_editresearch').on('change', 'input[name="is_multisenter"]', function(e) {
				const modal = $(this).closest('.modal'),
					  is_multisenter = $(this).prop('checked'),
					  html_tmpt = `
						<input type="text" 
							name="tempat_multisenter" 
							class="form-control mb-2" 
							id="tempatmultisenter_daftar" 
						required>`,
						html_acc = `
						<div class="d-flex flex-row mt-2">
							<strong class="small">Tidak</strong>
							<div class="checkbox mx-2">
								<input type="checkbox" id="accmultisenter_daftar" name="acc_multisenter" 
									class="switchbox" style="display:none">
								<label for="accmultisenter_daftar" class="toggle"><span></span></label>
							</div>
							<strong class="small">Ya</strong>
						</div>`;
				
				if(is_multisenter){
					modal.find('.set_tempat').html($(html_tmpt));
					modal.find('.set_acc').html($(html_acc));
					modal.find('.show_multisenter').removeClass('d-none');
				} else {
					modal.find('.set_tempat').html('');
					modal.find('.set_acc').html('');
					modal.find('.show_multisenter').addClass('d-none');
				}
			});

			$('#modal_addresearch, #modal_editresearch').on('click', '#btn_checkfee', function(e) {
				const modal = $(this).closest('.modal'),
					  id_judul = modal.find('select[name="judul"]').val()? modal.find('select[name="judul"]').val() : modal.find('.judul_edit').attr('data-id'),
					  id_jenis = modal.find('select[name="jenis"]').val(),
					  id_asal = modal.find('select[name="asal"]').val(),
					  id_lembaga = modal.find('select[name="lembaga"]').val(),
					  id_status = modal.find('select[name="status"]').val();

				if(id_judul){
					const data = {
						id_judul: id_judul,
						id_jenis: id_jenis,
						id_asal: id_asal,
						id_lembaga: id_lembaga,
						id_status: id_status
					}

					$.ajax({
						url: "{{ route('layaketik.check_fee') }}",
						data: data,
						type: 'POST',
						async:false,
						dataType: 'json',
						beforeSend: function(){
							$('#preloader').removeClass('d-none');
							$('#main-wrapper').removeClass('show');
						}
					}).done(function(data){
						if(data.success){
							modal.find('.pay').html(data.get.fee? `Rp ${currency.format(data.get.fee)}` : "Tidak terdeteksi")
						} else {
							alertError("Berhasil", data.msg)
						}

						$('#preloader').addClass('d-none');
						$('#main-wrapper').addClass('show');
					}).fail(function(data){
						console.log(data.responseText)
					})
				} else {
					modal.find('.pay').html('Rp -')
				}
			});

			$('#modal_addresearch, #modal_editresearch').on('show.bs.modal', function (e) {
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
				let account, judul, jenis, asal, lembaga, status_;
				
				$('#preloader').removeClass('d-none');
				$('#main-wrapper').removeClass('show');

                $.when(
					$.ajax({
						url: '{{ route("layaketik.get_ethic") }}',
						type: 'POST',
						dataType: 'json',
						cache: false
					}).done(function (data) {
						if(data.success){
							judul = data.get;
						} else {
							alertError("Terjadi Kesalahan", data.msg)
						}
					}).fail(function(data){
						resp = JSON.parse(data.responseText)
						alertError("Terjadi Kesalahan", resp.message)
						console.log("error");
					}),
					$.ajax({
						url: '{{ route("setting.get_jenis") }}',
						type: 'POST',
						dataType: 'json',
						cache: false
					}).done(function (data) {
						if(data.success){
							jenis = data.get;
						} else {
							alertError("Terjadi Kesalahan", data.msg)
						}
					}).fail(function(data){
						resp = JSON.parse(data.responseText)
						alertError("Terjadi Kesalahan", resp.message)
						console.log("error");
					}),
					$.ajax({
						url: '{{ route("setting.get_asal") }}',
						type: 'POST',
						dataType: 'json',
						cache: false
					}).done(function (data) {
						if(data.success){
							asal = data.get;
						} else {
							alertError("Terjadi Kesalahan", data.msg)
						}
					}).fail(function(data){
						resp = JSON.parse(data.responseText)
						alertError("Terjadi Kesalahan", resp.message)
						console.log("error");
					}),
					$.ajax({
						url: '{{ route("setting.get_lembaga") }}',
						type: 'POST',
						dataType: 'json',
						cache: false
					}).done(function (data) {
						if(data.success){
							lembaga = data.get;
						} else {
							alertError("Terjadi Kesalahan", data.msg)
						}
					}).fail(function(data){
						resp = JSON.parse(data.responseText)
						alertError("Terjadi Kesalahan", resp.message)
						console.log("error");
					}),
					$.ajax({
						url: '{{ route("setting.get_status") }}',
						type: 'POST',
						dataType: 'json',
						cache: false
					}).done(function (data) {
						if(data.success){
							status_ = data.get;
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

					if(judul.length > 0){
						$.each(judul, function(i, val) {
							html_.push({id: val.id, text: val.judul});
						})
					} else {
						html_.push({id: "", text: "-"});
					}
					
					modal.find("select[name='judul']").html('').select2({data: html_});
					modal.find("select[name='judul']").prop('disabled', false)

					html_ = [];
					$.each(jenis, function(i, val) {
						html_.push({id: val.id, text: val.name});
					})
					modal.find("select[name='jenis']").html('').select2({data: html_});

					html_ = [];
					$.each(asal, function(i, val) {
						html_.push({id: val.id, text: val.name});
					})
					modal.find("select[name='asal']").html('').select2({data: html_});

					html_ = [];
					$.each(lembaga, function(i, val) {
						html_.push({id: val.id, text: val.name});
					})
					modal.find("select[name='lembaga']").html('').select2({data: html_});

					html_ = [];
					$.each(status_, function(i, val) {
						html_.push({id: val.id, text: val.name});
					})
					modal.find("select[name='status']").html('').select2({data: html_});

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
				})

				if(modal.prop('id') == 'modal_editresearch'){
					$.ajax({
						url: "{{ route('layaketik.get') }}",
						data: {id: data_id},
						type: 'POST',
						async:false,
						dataType: 'json'
					}).done(function(data){
						if(data.success){
							const htmlBtnShow = `<button class="btn btn-secondary btn-xs ms-2" data-fancybox>Buka</button>`;
							let htmlBtn, check;

							modal.find("input[name='id']").val(data_id);

							modal.find('.judul_edit').attr('data-id', data.get.research_id).html(data.get.research.judul);
							setTimeout(function(){
								modal.find("select[name='jenis']").val(data.get.research_type_id).change();
								modal.find("select[name='asal']").val(data.get.origin_proposer_id).change();
								modal.find("select[name='lembaga']").val(data.get.institution_proposer_id).change();
								modal.find("select[name='status']").val(data.get.status_proposer_id).change();
							}, 3000)
							
							modal.find("input[name='sumber_dana']").val(data.get.sumber_dana);
							modal.find("input[name='total_dana']").val(data.get.total_dana);

							modal.find("select[name='kerjasama']").val(data.get.kerjasama).change();

							if(data.get.peneliti_asing){
								$.each(data.get.peneliti_asing, function(i, val){
									modal.find(".add_member").trigger('click');
									let form_asing = modal.find('.form_asing');

									$(form_asing[i]).find('input[name="nama_peneliti[]"]').val(val.nama);
									$(form_asing[i]).find('input[name="institusi_peneliti[]"]').val(val.institution);
									$(form_asing[i]).find('input[name="tugas_peneliti[]"]').val(val.job);
									$(form_asing[i]).find('input[name="telp_peneliti[]"]').val(val.phone);
								})
							}

							modal.find("input[name='jumlah_negara']").val(data.get.jumlah_negara);

							modal.find("input[name='is_multisenter']").prop('checked', data.get.is_multisenter).change()
							modal.find("input[name='tempat_multisenter']").val(data.get.tempat_multisenter)
							modal.find("input[name='acc_multisenter']").prop('checked', data.get.acc_multisenter).change()

							htmlBtn = $(htmlBtnShow).attr({
								href: data.get.surat_pengantar,
								"data-type": 'pdf'
							})
							modal.find('#btnedit_suratpengantar').html(htmlBtn)							

							if(data.get.eviden_paid){
								htmlBtn = $(htmlBtnShow).attr('href', data.get.eviden_paid)
								check = data.get.eviden_paid.split('.')[1];
								if(check == 'pdf') htmlBtn.attr('data-type', 'pdf');

								modal.find('#btnedit_evidenpaid').html(htmlBtn)
							}

						} else {
							alertError("Terjasi Kesalahan", data.msg)
						}
					}).fail(function(data){
						console.log(data.responseText)
					});
				}

				$('#preloader').addClass('d-none');
				$('#main-wrapper').addClass('show');
            })
			
			$('#modal_addresearch, #modal_editresearch').on('hide.bs.modal', function (e) {
                const modal = $(this);

				modal.find('form')[0].reset();
				modal.find("select[name='judul']").html('')
				modal.find("select[name='judul']").prop('disabled', true)

				modal.find('input[name="is_multisenter"]').prop('checked', false).change();

				modal.find("select[name='jenis']").html('');
				modal.find("select[name='asal']").html('');
				modal.find("select[name='lembaga']").html('');
				modal.find("select[name='status']").html('');

				modal.find('button[data-fancybox]').prop('disabled', true)
				modal.find('button[data-fancybox]').removeAttr('href')
				modal.find('button[data-fancybox]').removeClass('btn-secondary')
				modal.find('button[data-fancybox]').addClass('btn-dark')
				modal.find('button[data-fancybox]').removeAttr('data-type');

				modal.find('.list_member').html('<p class="empty_member text-center">Tidak ada anggota</p>')

				if(modal.prop('id') == 'modal_editresearch'){
					const nameId = ['suratpengantar', 'evidenpaid'];

					$.each(nameId, function(i, val){
						modal.find(`#btnedit_${val}`).html('')
					})
				}
			})

			$('#modal_detailresearch').on('show.bs.modal', function (e) {
				const modal = $(this),
					  data_id = $(e.relatedTarget).data('id');

				$.ajax({
					url: "{{ route('layaketik.get') }}",
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
							<button class="btn btn-dark btn-xs" data-bs-toggle="modal" href="#modal_uploadpembayaran" data-id="${data.get.id}">
								Upload Bukti Pembayaran
							</button>`, 
							htmlBtnShow = `<button class="btn btn-secondary btn-xs" data-fancybox>Buka</button>`,
							province, city, htmlBtn, check;

						modal.find('#judul_view').html(data.get.research.judul);
						modal.find('#title_view').html(data.get.research.title);
						modal.find('#tipe_view').html(data.get.research.tipe_penelitian);
						modal.find('#institusi_view').html(data.get.research.institution ? data.get.research.institution.name : "Tidak ada");

						modal.find('#ketua_view').html(data.get.research.ketua);
						modal.find('#nik_view').html(data.get.research.nik);
						modal.find('#jenjang_view').html(data.get.research.education_level ? data.get.research.education_level.name : "Tidak ada");
						modal.find('#jenis_view').html(data.get.research_type ? data.get.research_type.name : "Tidak ada");
						modal.find('#asal_view').html(data.get.origin_proposer ? data.get.origin_proposer.name : "Tidak ada");
						modal.find('#lembaga_view').html(data.get.institution_proposer ? data.get.institution_proposer.name : "Tidak ada");
						modal.find('#_status_view').html(data.get.status_proposer ? data.get.status_proposer.name : "Tidak ada");

						modal.find('#phone_view').html(data.get.research.phone);
						modal.find('#address_view').html(data.get.research.address);
						if(data.get.research.anggota.length > 0){
							let anggota = ``;
							$.each(data.get.research.anggota, (i, val) => {
								anggota += val + ", ";
							})
							modal.find('#anggota_view').html(anggota)
							modal.find('.is_anggota').removeClass('d-none')
						} else {
							modal.find('.is_anggota').addClass('d-none')
							modal.find('#anggota_view').html('')
						}

						modal.find('#tempat_view').html(data.get.research.tempat);
						modal.find('#start_view').html(data.get.research.start_date);
						modal.find('#end_view').html(data.get.research.end_date);
						
						if(Number.isInteger(data.get.research.is_layaketik)){
							modal.find('#layaketik_view').html(setBadgeEtik(data.get.research.is_layaketik))
							modal.find('.is_layaketik').removeClass('d-none')
						} else {
							modal.find('#layaketik_view').html('')
							modal.find('.is_layaketik').addClass('d-none')
						}

						modal.find('#sumberdana_view').html(data.get.sumber_dana);
						modal.find('#totaldana_view').html(`Rp ${currency.format(data.get.total_dana)}`);

						modal.find('#kerjasama_view').html(setKerjasama(data.get.kerjasama));

						switch(data.get.kerjasama){
							case 'internasional': 
								modal.find('.is_internasional').removeClass('d-none');
								modal.find('.is_asing').addClass('d-none');

								modal.find('#negara_view').html(data.get.jumlah_negara + " Negara");
								modal.find('.table-asing').html('');
								break;
							case 'peneliti_asing': 
								modal.find('.is_internasional').addClass('d-none');
								modal.find('.is_asing').removeClass('d-none');

								modal.find('#negara_view').html('');
								
								let data_asing = ``;
								$.each(data.get.peneliti_asing, function(i, val){
									data_asing += `
										<tr>
											<td>${val.nama}</td>
											<td>${val.institution}</td>
											<td>${val.job}</td>
											<td>${val.phone}</td>
										</tr>
									`;
								});
								modal.find('.table-asing').html(data_asing);
							break;
							default: 
								modal.find('.is_internasional').addClass('d-none');
								modal.find('.is_asing').addClass('d-none');
								modal.find('#negara_view').html('');
								modal.find('.table-asing').html('');
								break;
						}

						modal.find('#multisenter_view').html(setBadge(data.get.is_multisenter));

						if(data.get.is_multisenter){
							modal.find('.is_tempatmultisenter').removeClass('d-none');
							modal.find('.is_accmultisenter').removeClass('d-none');

							modal.find('#tempatmultisenter_view').html(data.get.tempat_multisenter);
							modal.find('#accmultisenter_view').html(setBadge(data.get.acc_multisenter));
						} else {
							modal.find('.is_tempatmultisenter').addClass('d-none');
							modal.find('.is_accmultisenter').addClass('d-none');

							modal.find('#tempatmultisenter_view').html('');
							modal.find('#accmultisenter_view').html('');
						}

						modal.find('#pay_view').html(`Rp ${currency.format(data.get.research.total_paid)}`)
						modal.find('#status_view').html(setBadgeStatus(data.get.research.status));
						modal.find('#statuspay_view').html(setBadgePay(data.get.research.paid));

						modal.find('#payetik_view').html(data.get.research_fee?`Rp ${currency.format(data.get.research_fee.fee)}`:"Tidak terdefinisi")
						modal.find('#statusetik_view').html(setBadgeStatus(data.get.status));
						modal.find('#statuspayetik_view').html(setBadgePay(data.get.paid));

						htmlBtn = $(htmlBtnShow).attr({
							href: data.get.research.permohonan,
							"data-type": 'pdf'
						})
						modal.find('#permohonan_view').html(htmlBtn)

						htmlBtn = $(htmlBtnShow).attr({
							href: data.get.research.proposal,
							"data-type": 'pdf'
						})
						modal.find('#proposal_view').html(htmlBtn)

						htmlBtn = $(htmlBtnShow).attr({
							href: data.get.surat_pengantar,
							"data-type": 'pdf'
						})
						modal.find('#pengantar_view').html(htmlBtn)

						if(data.get.research.eviden_paid){
							htmlBtn = $(htmlBtnShow).attr('href', data.get.research.eviden_paid)
							check = data.get.research.eviden_paid.split('.')[1];
							if(check == 'pdf') htmlBtn.attr('data-type', 'pdf');

							modal.find('#evidenpaid_view').html(htmlBtn)
						} else {
							modal.find('#evidenpaid_view').html('<p class="font-w600">Tidak Ada Bukti</p>')
						}

						if(data.get.eviden_paid){
							htmlBtn = $(htmlBtnShow).attr('href', data.get.eviden_paid)
							check = data.get.eviden_paid.split('.')[1];
							if(check == 'pdf') htmlBtn.attr('data-type', 'pdf');

							modal.find('#evidenpaidetik_view').html(htmlBtn)
						} else {
							modal.find('#evidenpaidetik_view').html(btnEviden)
						}

						if(data.get.research.izin_penelitian){
							htmlBtn = $(htmlBtnShow).attr({
								href: data.get.research.izin_penelitian,
								"data-type": 'pdf'
							})

							modal.find('.is_izin').removeClass('d-none')
							modal.find('#izin_view').html(htmlBtn)
						} else {
							modal.find('.is_izin').addClass('d-none')
							modal.find('#izin_view').html('')
						}

						$.when(
							$.ajax({
								url: 'https://dev.farizdotid.com/api/daerahindonesia/provinsi/' + data.get.research.province,
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
								url: 'https://dev.farizdotid.com/api/daerahindonesia/kota/' + data.get.research.city,
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
						alertError("Terjadi Kesalahan", data.msg)
					}

					$('#preloader').addClass('d-none');
					$('#main-wrapper').addClass('show');
				}).fail(function(data){
					console.log(data.responseText)
				});
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

				$('#modal_detailresearch').modal('hide');
				modal.find('#id_bukti').val(id)

				let detail, rekening;
				$.when(
					$.ajax({
						url: "{{ route('layaketik.get') }}",
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

					modal.find('#statuspay_view').html(setBadgePay(detail.paid));
					modal.find('#pay_view').html(detail.research_fee? `Rp ${currency.format(detail.research_fee.fee)}`: 'Tidak terdefinisi');

					if(detail.eviden_paid){
						const htmlBtn = $(btnShowEviden).html('Lihat Bukti Pembayaran').attr('href', detail.eviden_paid)
						const check = detail.eviden_paid.split('.')[1];
						if(check == 'pdf') htmlBtn.attr('data-type', 'pdf');

						modal.find('#btn_evidenview').html(htmlBtn)
					} else {
						modal.find('#btn_evidenview').html('')
					}
				})

				
			})

			$('#data_reviews, #data_payments').on('click', ".delete_research", function(e){
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
							url: "{{ route('layaketik.delete') }}",
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

			$('#tambah_research').validate({
				ignore: [],
				rules:{
					judul: { required: true }, jenis: { required: true },
					asal: { required: true }, lembaga: { required: true }, status: { required: true }, 
					sumberdana: { required: true, alphanumeric: true },
					totaldana: { required: true, digits: true, min: 0 },
					kerjasama: { required: true }, jumlah_negara: { required: true, digits: true, min: 0 },
					nama_peneliti: { required: true, alphanumeric: true },
					institusi_peneliti: { required: true, alphanumeric: true },
					tugas_peneliti: { required: true, alphanumeric: true },
					telp_peneliti: { required: true, digits: true, minlength: 9, maxlength: 14 },
					institusi_peneliti: { required: true, alphanumeric: true },
					tempat_multisenter: { required: true, alphanumeric: true },
					surat_pernyataan: { required: true, extension: "pdf", filesize : 1 },
					eviden_paid: { required: false, extension: "pdf|jpeg|jpg|png", filesize : 1 },
				},
				submitHandler: function (form) {
					let data_daftar = new FormData(form),
                        modal = $(form).closest('.modal');

                    data_daftar.append(
						'is_multisenter', 
						$(form).find('input[name="is_multisenter"]').prop('checked')? 1 : 0
					);

					if($(form).find('input[name="acc_multisenter"]').length > 0){
						data_daftar.append(
							'acc_multisenter', 
							$(form).find('input[name="acc_multisenter"]').prop('checked')? 1 : 0
						);	
					}

					$.ajax({
						url: "{{ route('layaketik.store') }}",
						type: 'POST',
						data: data_daftar,
						async: false,
						processData: false,
						contentType: false,
						cache: false,
						dataType: 'json',
						enctype: 'multipart/form-data',
						beforeSend: function(){
							$(modal).modal('hide')
                            $(form)[0].reset()
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

			$('#edit_research').validate({
				ignore: [],
				rules:{
					judul: { required: true }, jenis: { required: true },
					asal: { required: true }, lembaga: { required: true }, status: { required: true }, 
					sumberdana: { required: true, alphanumeric: true },
					totaldana: { required: true, digits: true, min: 0 },
					kerjasama: { required: true }, jumlah_negara: { required: true, digits: true, min: 0 },
					nama_peneliti: { required: true, alphanumeric: true },
					institusi_peneliti: { required: true, alphanumeric: true },
					tugas_peneliti: { required: true, alphanumeric: true },
					telp_peneliti: { required: true, digits: true, minlength: 9, maxlength: 14 },
					institusi_peneliti: { required: true, alphanumeric: true },
					tempat_multisenter: { required: true, alphanumeric: true },
					surat_pernyataan: { required: false, extension: "pdf", filesize : 1 },
					eviden_paid: { required: false, extension: "pdf|jpeg|jpg|png", filesize : 1 },
				},
				submitHandler: function (form) {
					let data_daftar = new FormData(form),
                        modal = $(form).closest('.modal');

                    data_daftar.append(
						'is_multisenter', 
						$(form).find('input[name="is_multisenter"]').prop('checked')? 1 : 0
					);

					data_daftar.append('_method', 'PATCH');

					if($(form).find('input[name="acc_multisenter"]').length > 0){
						data_daftar.append(
							'acc_multisenter', 
							$(form).find('input[name="acc_multisenter"]').prop('checked')? 1 : 0
						);	
					}

					$.ajax({
						url: "{{ route('layaketik.update') }}",
						type: 'POST',
						data: data_daftar,
						async: false,
						processData: false,
						contentType: false,
						cache: false,
						dataType: 'json',
						enctype: 'multipart/form-data',
						beforeSend: function(){
							// $(modal).modal('hide')
                            // $(form)[0].reset()
							$('#preloader').removeClass('d-none');
							$('#main-wrapper').removeClass('show');
						}
					}).done(function (data) {						
						$('#preloader').addClass('d-none');
						$('#main-wrapper').addClass('show');
						
						if(data.success){
							alertSuccess("Berhasil", data.msg)
							// reloadData('#data_reviews');
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
					const formData = new FormData(form),
						  modal = $(form).closest('.modal');

					formData.append('_method', 'PUT');

					$.ajax({
						url: "{{ route('layaketik.update_eviden') }}",
						type: 'POST',
						data: formData,
						async: false,
						processData: false,
						contentType: false,
						cache: false,
						dataType: 'json',
						enctype: 'multipart/form-data',
						beforeSend: function(){
							$(modal).modal('hide')
							$(form)[0].reset();
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
