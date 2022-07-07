@extends('dashboard.layouts.app')

@section('title', "Pengajuan Penelitian")

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
							<a href="#reviews" data-bs-toggle="tab" class="nav-table nav-link active show">Review</a>
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
										<h3 class="font-weight-bold">Data Pengajuan <span class="small text-light">(Review)</span></h3>
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
													<th>Uji Layak Etik</th>
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

    @include('dashboard.research.components.madd_research')

	@include('dashboard.research.components.medit_research')

	@include('dashboard.research.components.mdetail_research')

	@include('dashboard.studibanding.components.madd_institusi')

	@include('dashboard.research.components.mupload_pembayaran')

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

			const dataReviews = setDatatables,
                  dataPayments = setDatatables,
				  dataDone = setDatatables;

            $.extend(dataReviews, {
                "ajax": {
                    "type": "POST",
                    "url": `{{ route('research.all', 'review') }}`,
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
                                    "url": `{{ route('research.all', 'pay') }}`,
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
                                    "url": `{{ route('research.all', 'accept,reject') }}`,
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
                                            return Number.isInteger(data.is_layaketik) ? setBadgeEtik(data.is_layaketik) : "-";
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

            $('#modal_addresearch, #modal_editresearch').on('click', '.add_member', function(e){
				const modal = $(this).closest('.modal');

				e.preventDefault();
                const listMember = modal.find('.list_member'),
                      formMember = `
                        <div class="form-group form_member mb-2">
                            <label>Nama Anggota <span class="small text-light">(Nama + Gelar)</span></label>
                            <div class="input-group">
                                <input type="text" name="members[]" class="form-control" required>
                                <button class="btn btn-danger delete_member" type="button">-</button>
                            </div>
                        </div>`;

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
                
                $(this).parent().parent().remove();

                if(listMember.find('.form_member').length < 1){
                    listMember.html(`<p class="empty_member text-center">Tidak ada anggota</p>`);
                }
            })

            $('#modal_addresearch').on('click', '#btn_addinstitusi', function(e){
                e.preventDefault();
				const modal = $(this).closest('.modal');

                modal.modal('hide');
                $('#modal_addinstitusi').modal('show');
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

            $('#modal_addresearch, #modal_editresearch').on('change', 'input[name="start_date"]', function(e) {
				const modal = $(this).closest('.modal')
					  minDate = new Date($(this).val());

				minDate.setDate(minDate.getDate() + 1); // set 1 Day

				modal.find('input[name="end_date"]').val('')
				modal.find('input[name="end_date"]').pickadate('picker').set({
					disable: false,
					min: minDate // +1 Day
				})
			});

            $('#modal_addresearch, #modal_editresearch').on('change', 'select[name="province"]', function(e){
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
				let institutions, province, account, jenjang, fee;

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

					if(modal.prop('id') == 'modal_addresearch'){
						modal.find('input[name="ketua"]').val("{{ auth()->user()->name }}")
						modal.find('input[name="phone"]').val("{{ auth()->user()->phone }}")
					} else {
						modal.find('#id_bukti').val(data_id)
					}

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
					if(modal.prop('id') == 'modal_addresearch'){
						modal.find("select[name='province']").attr('data-city', '3209');
						modal.find("select[name='province']").val(32).change();
						modal.find('#pay_daftar').html(`Rp ${currency.format(fee.research)}`)
					}
				})

				if(modal.prop('id') == 'modal_editresearch'){
					$.ajax({
						url: '{{ route('research.get') }}',
						type: 'POST',
						data : {id: data_id},
						dataType: 'json',
						cache: false
					}).done(function (data) {
						if(data.success){
							const htmlBtnShow = `<button class="btn btn-secondary btn-xs ms-2" data-fancybox>Buka</button>`;
							let htmlBtn, check;
							modal.find('input[name="judul"]').val(data.get.judul)
							modal.find('input[name="title"]').val(data.get.title)
							modal.find('select[name="tipe_penelitian"]').val(data.get.tipe_penelitian).change()
							modal.find('select[name="institusi"]').val(data.get.institution? data.get.institution_id: "").change()
							modal.find('input[name="ketua"]').val(data.get.ketua)
							modal.find('input[name="nik"]').val(data.get.nik)
							modal.find('select[name="jenjang"]').val(data.get.education_level_id).change()
							modal.find('input[name="phone"]').val(data.get.phone)
							modal.find("select[name='province']").attr('data-city', data.get.city);
							modal.find("select[name='province']").val(data.get.province).change();
							modal.find('textarea[name="address"]').val(data.get.address)

							if(data.get.anggota.length > 0) {
								const listMember = modal.find('.list_member'),
									formMember = `
										<div class="form-group form_member mb-2">
											<label>Nama Anggota <span class="small text-light">(Nama + Gelar)</span></label>
											<div class="input-group">
												<input type="text" name="members[]" class="form-control" required>
												<button class="btn btn-danger delete_member" type="button">-</button>
											</div>
										</div>`;

								let elm;
								listMember.html('');
								$.each(data.get.anggota, function(i, val){
									elm = $(formMember)
									elm.find('input').val(val)
									listMember.append(elm);							
								})
							}
							
							modal.find('input[name="tempat"]').val(data.get.tempat)
							modal.find('input[name="start_date"]').pickadate('picker').set('select', data.get.start_date, { format: 'yyyy-mm-dd' })
							modal.find('input[name="end_date"]').pickadate('picker').set('select', data.get.end_date, { format: 'yyyy-mm-dd' })

							modal.find('#pay_daftar').html(`Rp ${currency.format(data.get.total_paid)}`)

							htmlBtn = $(htmlBtnShow).attr({
								href: data.get.permohonan,
								"data-type": 'pdf'
							})
							modal.find('#btnedit_permohonan').html(htmlBtn)

							htmlBtn = $(htmlBtnShow).attr({
								href: data.get.proposal,
								"data-type": 'pdf'
							})
							modal.find('#btnedit_proposal').html(htmlBtn)							

							if(data.get.eviden_paid){
								htmlBtn = $(htmlBtnShow).attr('href', data.get.eviden_paid)
								check = data.get.eviden_paid.split('.')[1];
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

			$('#modal_detailresearch').on('show.bs.modal', function (e) {
				const modal = $(this),
					  data_id = $(e.relatedTarget).data('id');

				$.ajax({
					url: "{{ route('research.get') }}",
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

						modal.find('#judul_view').html(data.get.judul);
						modal.find('#title_view').html(data.get.title);
						modal.find('#tipe_view').html(data.get.tipe_penelitian);
						modal.find('#institusi_view').html(data.get.institution ? data.get.institution.name : "Tidak ada");

						modal.find('#ketua_view').html(data.get.ketua);
						modal.find('#nik_view').html(data.get.nik);
						modal.find('#jenjang_view').html(data.get.education_level ? data.get.education_level.name : "Tidak ada");
						modal.find('#phone_view').html(data.get.phone);
						modal.find('#address_view').html(data.get.address);
						if(data.get.anggota.length > 0){
							let anggota = ``;
							$.each(data.get.anggota, (i, val) => {
								anggota += val + ", ";
							})
							modal.find('#anggota_view').html(anggota)
							modal.find('.is_anggota').removeClass('d-none')
						} else {
							modal.find('.is_anggota').addClass('d-none')
							modal.find('#anggota_view').html('')
						}

						modal.find('#tempat_view').html(data.get.tempat);
						modal.find('#start_view').html(data.get.start_date);
						modal.find('#end_view').html(data.get.end_date);
						
						if(Number.isInteger(data.get.is_layaketik)){
							modal.find('#layaketik_view').html(setBadgeEtik(data.get.is_layaketik))
							modal.find('.is_layaketik').removeClass('d-none')
						} else {
							modal.find('#layaketik_view').html('')
							modal.find('.is_layaketik').addClass('d-none')
						}

						modal.find('#pay_view').html(`Rp ${currency.format(data.get.total_paid)}`)
						modal.find('#status_view').html(setBadgeStatus(data.get.status));
						modal.find('#statuspay_view').html(setBadgePay(data.get.paid));

						htmlBtn = $(htmlBtnShow).attr({
							href: data.get.permohonan,
							"data-type": 'pdf'
						})
						modal.find('#permohonan_view').html(htmlBtn)

						htmlBtn = $(htmlBtnShow).attr({
							href: data.get.proposal,
							"data-type": 'pdf'
						})
						modal.find('#proposal_view').html(htmlBtn)

						if(data.get.eviden_paid){
							htmlBtn = $(htmlBtnShow).attr('href', data.get.eviden_paid)
							check = data.get.eviden_paid.split('.')[1];
							if(check == 'pdf') htmlBtn.attr('data-type', 'pdf');

							modal.find('#evidenpaid_view').html(htmlBtn)
						} else {
							modal.find('#evidenpaid_view').html(btnEviden)
						}

						if(data.get.izin_penelitian){
							htmlBtn = $(htmlBtnShow).attr({
								href: data.get.izin_penelitian,
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
						url: "{{ route('research.get') }}",
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
					modal.find('#pay_view').html("Rp " + currency.format(detail.total_paid));

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

			$('#modal_addresearch, #modal_editresearch').on('hide.bs.modal', function (e) {
                const modal = $(this), listMember = modal.find('.list_member');

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

				modal.find('.pay').html(`Rp 0`)

				listMember.html(`<p class="empty_member text-center">Tidak ada anggota</p>`);

				if(modal.prop('id') == 'modal_editresearch'){
					const nameId = ['permohonan', 'proposal', 'evidenpaid'];

					$.each(nameId, function(i, val){
						modal.find(`#btnedit_${val}`).html('')
					})
				}
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
							url: "{{ route('research.delete') }}",
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
					judul: { required: true, alphanumeric: true },
                    title: { required: true, alphanumeric: true },
                    tipe_penelitian: { required: true }, institusi: { required: true },
                    ketua: { required: true, alphanumeric: true },
					nik: { required: true, digits: true, minlength:16, maxlength:16 },
                    jenjang: { required: true },
                    phone: { required: true, digits: true, minlength: 11, maxlength: 14 },
                    city: { required: true }, province: { required: true },
                    address: { required: true },
                    members: { required: true, alphanumeric: true },
                    tempat: { required: true, alphanumeric: true },
                    start_date: { required: true, date: true }, end_date: { required: true, date: true },
					proposal: { required: true, extension: "pdf", filesize : 2 },
					permohonan: { required: true, extension: "pdf", filesize : 1 },
					eviden_paid: { required: false, extension: "pdf|jpeg|jpg|png", filesize : 1 },
				},
				submitHandler: function (form) {
					let data_daftar = new FormData(form),
                        modal = $(form).closest('.modal');

					$.ajax({
						url: "{{ route('research.store') }}",
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
					judul: { required: true, alphanumeric: true },
                    title: { required: true, alphanumeric: true },
                    tipe_penelitian: { required: true }, institusi: { required: true },
                    ketua: { required: true, alphanumeric: true },
					nik: { required: true, digits: true, minlength:16, maxlength:16 },
                    jenjang: { required: true },
                    phone: { required: true, digits: true, minlength: 11, maxlength: 14 },
                    city: { required: true }, province: { required: true },
                    address: { required: true },
                    members: { required: true, alphanumeric: true },
                    tempat: { required: true, alphanumeric: true },
                    start_date: { required: true, date: true }, end_date: { required: true, date: true },
					proposal: { required: false, extension: "pdf", filesize : 2 },
					permohonan: { required: false, extension: "pdf", filesize : 1 },
					eviden_paid: { required: false, extension: "pdf|jpeg|jpg|png", filesize : 1 },
				},
				submitHandler: function (form) {
					let data_daftar = new FormData(form),
                        modal = $(form).closest('.modal');
					data_daftar.append('_method', 'PATCH');

					$.ajax({
						url: "{{ route('research.update') }}",
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

			$('#upload_bukti').validate({
				rules:{
					eviden_paid: { required: true, extension: "pdf|jpeg|jpg|png", filesize : 2 }
				},
				submitHandler: function (form) {
					const formData = new FormData(form),
						  modal = $(form).closest('.modal');

					formData.append('_method', 'PUT');

					$.ajax({
						url: "{{ route('research.update_eviden') }}",
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
