@extends('dashboard.layouts.app')

@section('title', "Pengajuan Studi Banding")

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
											<table id="data_reviews" class="display" style="width: 100%">
												<thead>
													<tr>
														<th>#</th>
														<th>Topik</th>
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
											<table id="data_payments" class="display" style="width: 100%">
												<thead>
													<tr>
														<th>#</th>
														<th>Topik</th>
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
											<table id="data_accepts" class="display" style="width: 100%">
												<thead>
													<tr>
														<th>#</th>
														<th>Topik</th>
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
			};
		
		function myCarouselStart() {
			carousel = $('.rekening-slider').owlCarousel(setCarousel);
		}

        $(document).ready(function(){

            $('.datepicker-default').pickadate({
                format: 'd mmmm yyyy',
                min: "{{ date('Y-m-d') }}",
                formatSubmit: 'yyyy-mm-dd',
                hiddenName: true
            });

			myCarouselStart()

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
                    members.val(membersNow - 1).change()
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
                      biaya = members.parent().parent().parent().parent().find('#biaya'),
					  modal = $(this).closest('.modal');

				const fee_less = modal.find('.fee_less').data('fee'),
					  fee_over = modal.find('.fee_over').data('fee');

                if(membersNow > 0){
                    members.val(membersNow + 1).change()
                    totalMembers.html(members.val() + " Orang");
                    
                    if(parseInt(members.val()) < 10){
                        const cost = parseInt(fee_less) * parseInt(members.val());
                        biaya.html(`Rp ${currency.format(cost)}`);
                    } else {
                        const cost = parseInt(fee_over) * parseInt(members.val());
                        biaya.html(`Rp ${currency.format(cost)}`);
                    }
                }
            })

			$('#modal_addstudibanding, #modal_editstudibanding').on('change', 'input[name="members"]', function(e){
                const modal = $(this).closest('.modal'),
					  formNames = modal.find("input[name='names[]']"),
					  htmlForm 	= `
					  	<div class="form-group form_name mb-2">
							<div class="input-group">
								<button class="btn btn-dark btn-disabled" type="button" disabled>1</button>
								<input type="text" name="names[]" class="form-control" required>
							</div>
						</div>`,
					  val = $(this).val(),
					  listName = modal.find('.list_name');

				if(val > 1){
					let storeElm;
					listName.find('.form-group:not(:first)').remove();

					for (let i = 2; i <= val; i++) {
						storeElm = $(htmlForm);
						storeElm.find('button').html(i);
						listName.append(storeElm);
					}
				} else {
					listName.find('.form-group:not(:first)').remove();
				}
            })

			$('#modal_addstudibanding, #modal_editstudibanding').on('click', '.add_question', function(e){
				const modal = $(this).closest('.modal');

				e.preventDefault();
                const listQuestion = modal.find('.list_question'),
                      formQuestion = `
                        <div class="form-group form_question mb-2">
                            <div class="input-group">
                                <input type="text" name="questions[]" class="form-control" required>
                                <button class="btn btn-danger delete_question" type="button">-</button>
                            </div>
                        </div>`;
                
                listQuestion.append($(formQuestion));
			})

			$('#modal_addstudibanding, #modal_editstudibanding').on('click', '.add_doc', function(e){
				const modal = $(this).closest('.modal');

				e.preventDefault();
                const listQuestion = modal.find('.list_doc'),
                      formQuestion = `
                        <div class="form-group form_doc mb-2">
                            <div class="input-group">
                                <input type="text" name="docs[]" class="form-control" required>
                                <button class="btn btn-danger delete_doc" type="button">-</button>
                            </div>
                        </div>`;
                
                listQuestion.append($(formQuestion));
			})

            $('#modal_addstudibanding, #modal_editstudibanding')
				.on('click', '.delete_question, .delete_doc', function(e){
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
					names: { required: true, alphanumeric: true },
					questions: { required: true, alphanumeric: true },
					docs: { required: true, alphanumeric: true },
					permohonan: { required: true, extension: "pdf", filesize : 1 },
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
				let institution, room, settings = {};

                $.when(
					$.ajax({
						url: '{{ route('get_institutionroom') }}',
						type: 'POST',
						dataType: 'json'
					}).done(function (data) {
						if(data.success){
							institution = data.get.institutions,
							room = data.get.rooms;
						} else {
							alertError("Terjadi Kesalahan", data.msg)
						}
					}).fail(function(data){
						resp = JSON.parse(data.responseText)
						alertError("Terjadi Kesalahan", resp.message)
						console.log("error");
					}),
					$.ajax({
						url: '{{ route("get_settings") }}',
						type: 'POST',
						data: {name: ['fee', 'rekening']},
						dataType: 'json',
						cache: false
					}).done(function (data) {
						if(data.success){
							data.get.forEach(val => {
								settings[val.name] = val.value;
							})
							console.log(settings)
						} else {
							alertError("Terjadi Kesalahan", data.msg)
						}
					}).fail(function(data){
						resp = JSON.parse(data.responseText)
						alertError("Terjadi Kesalahan", resp.message)
						console.log("error");
					})
				).then(function(){
					let html_ = [],
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

					$.each(institution, function(i, val) {
						html_.push({id: val.id, text: val.name});
					})
					$("#institusi_daftar").html('').select2({data: html_});
					html_ = [];
					$.each(room, function(i, val) {
						html_.push({id: val.id, text: val.name});
					})
					$("#rooms_daftar").html('').select2({data: html_});

					modal.find('.fee_less').attr('data-fee', settings.fee.comparative.kurang_dari).html(`Rp ${currency.format(settings.fee.comparative.kurang_dari)}`)
					modal.find('.fee_over').attr('data-fee', settings.fee.comparative.lebih_dari).html(`Rp ${currency.format(settings.fee.comparative.lebih_dari)}`)

					carousel.trigger("destroy.owl.carousel");
					modal.find('.rekening-slider').html('')
					$.each(settings.rekening, function(i, val){
						let item = $(htmlBank);
						
						if(val.image) item.find('img').attr('src', val.image);
						item.find('.id-bank').html(val.number);
						item.find('.name-bank').html(val.name);

						modal.find('.rekening-slider').append(item)
					})
					myCarouselStart()
				})

            })

			$('#modal_editstudibanding').on('show.bs.modal', function (e) {
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
				
				let institution, room, detail, settings = {};

				$.when(
					$.ajax({
						url: '{{ route('get_institutionroom') }}',
						type: 'POST',
						dataType: 'json'
					}).done(function (from) {
						if(from.success){
							institution = from.get.institutions,
							room = from.get.rooms							
						} else {
							alertError("Terjadi Kesalahan", from.msg)
						}
					}).fail(function(data){
						resp = JSON.parse(data.responseText)
						alertError("Terjadi Kesalahan", resp.message)
						console.log("error");
					}),
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
						url: '{{ route("get_settings") }}',
						type: 'POST',
						data: {name: ['fee', 'rekening']},
						dataType: 'json',
						cache: false
					}).done(function (data) {
						if(data.success){
							data.get.forEach(val => {
								settings[val.name] = val.value;
							})
							console.log(settings)
						} else {
							alertError("Terjadi Kesalahan", data.msg)
						}
					}).fail(function(data){
						resp = JSON.parse(data.responseText)
						alertError("Terjadi Kesalahan", resp.message)
						console.log("error");
					})
				)
				.then(function(){
					let html_ = [];

					$.each(institution, function(i, val) {
						html_.push({id: val.id, text: val.name});
					})
					$("#institusi_edit").html('').select2({data: html_});
					html_ = [];
					$.each(room, function(i, val) {
						html_.push({id: val.id, text: val.name});
					})
					$("#rooms_edit").html('').select2({data: html_});

					modal.find('.fee_less').attr('data-fee', settings.fee.comparative.kurang_dari).html(`Rp ${currency.format(settings.fee.comparative.kurang_dari)}`)
					modal.find('.fee_over').attr('data-fee', settings.fee.comparative.lebih_dari).html(`Rp ${currency.format(settings.fee.comparative.lebih_dari)}`)

					carousel.trigger("destroy.owl.carousel");
					modal.find('.rekening-slider').html('')
					$.each(settings.rekening, function(i, val){
						let item = $(htmlBank);
						
						if(val.image) item.find('img').attr('src', val.image);
						item.find('.id-bank').html(val.number);
						item.find('.name-bank').html(val.name);

						modal.find('.rekening-slider').append(item)
					})
					myCarouselStart();

					let rooms = ``, rooms_id = [];
					const btnLampiran = `
							<button class="btn btn-secondary btn-xs ms-2" data-fancybox data-type="pdf">
								Lihat Permohonan
							</button>`, 
						btnShowEviden = `
							<button class="btn btn-secondary btn-xs ms-2" data-fancybox>
								Lihat Bukti Pembayaran
							</button>`,
						formName = `
							<div class="form-group form_name mb-2">
								<div class="input-group">
									<button class="btn btn-dark btn-disabled" type="button" disabled>1</button>
									<input type="text" name="names[]" class="form-control" required>
								</div>
							</div>`,
						formQuestion = `
							<div class="form-group form_question mb-2">
								<div class="input-group">
									<input type="text" name="questions[]" class="form-control" required>
									<button class="btn btn-danger delete_question" type="button">-</button>
								</div>
							</div>`,
						formDoc = `
							<div class="form-group form_doc mb-2">
								<div class="input-group">
									<input type="text" name="docs[]" class="form-control" required>
									<button class="btn btn-danger delete_doc" type="button">-</button>
								</div>
							</div>`;

					$("#id_bukti").val(data_id);

					$.each(detail.rooms, function(i, val){
						rooms_id.push(val.id);
					})
					
					modal.find('#judul_edit').val(detail.title);
					modal.find('#institusi_edit').val(detail.institution.id).change();
					modal.find('#kunjungan_edit').pickadate('picker').set('select', `${detail.visited}`, { format: 'yyyy-mm-dd' });
					modal.find('#pengunjung_edit').val(detail.member);
					modal.find('#rooms_edit').val(rooms_id).change()

					modal.find('.list_name').html('')
					$.each(detail.names, function(i, val){
						const names_input = $(formName);
						names_input.find('input[name="names[]"]').val(val);
						names_input.find('button').html(i + 1);
						modal.find('.list_name').append(names_input);
					})

					$.each(detail.questions, function(i, val){
						if(i == 0){
							modal.find('input[name="questions[]"]').val(val);
						} else {
							const question_input = $(formQuestion);
							question_input.find('input[name="questions[]"]').val(val);
							modal.find('.list_question').append(question_input);
						}
					})
					
					$.each(detail.docs, function(i, val){
						if(i == 0){
							modal.find('input[name="docs[]"]').val(val);
						} else {
							const doc_input = $(formDoc);
							doc_input.find('input[name="docs[]"]').val(val);
							modal.find('.list_doc').append(doc_input);
						}
					})

					modal.find('#totalmember').html(detail.member + " Orang");

					const less = modal.find('.fee_less').data('fee'),
						  over = modal.find('.fee_over').data('fee');
		
					if(parseInt(detail.member) < 10){
						const cost = parseInt(less) * parseInt(detail.member);
						modal.find('#biaya').html(`Rp ${currency.format(cost)}`);
					} else {
						const cost = parseInt(over) * parseInt(detail.member);
						modal.find('#biaya').html(`Rp ${currency.format(cost)}`);
					}

					modal.find('#btnedit_attachview').append($(btnLampiran).attr('href', detail.permohonan))
					if(detail.eviden_paid){
						htmlBtn = $(btnShowEviden).attr('href', detail.eviden_paid)
						check = detail.eviden_paid.split('.')[1];
						if(check == 'pdf') htmlBtn.attr('data-type', 'pdf');

						modal.find('#btnedit_evidenview').html(htmlBtn)
					}
				})
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
						let rooms = ``, tableRow = `<tr></tr>`, btnEviden = `
							<button class="btn btn-dark btn-sm" data-bs-toggle="modal" href="#modal_uploadpembayaran" data-id="${data.get.id}">
								Upload Bukti Pembayaran
							</button>`, btnPermohonan = `
							<button class="btn btn-secondary btn-sm" data-fancybox data-type="pdf">
								Buka
							</button>`, btnShowEviden = `
							<button class="btn btn-secondary btn-sm" data-fancybox>
								Buka
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
						modal.find('#permohonan_view').html($(btnPermohonan).attr('href', data.get.permohonan));
						modal.find('#eviden_view').html('')

						modal.find('#name_view table tbody').html('')
						modal.find('#question_view table tbody').html('')
						modal.find('#doc_view table tbody').html('')

						$.each(data.get.names, function(i, val){
							modal.find('#name_view table tbody').append($(tableRow).append(`<th>${val}</th>`));
						})
						$.each(data.get.questions, function(i, val){
							modal.find('#question_view table tbody').append($(tableRow).append(`<th>${val}</th>`));
						})
						$.each(data.get.docs, function(i, val){
							modal.find('#doc_view table tbody').append($(tableRow).append(`<th>${val}</th>`));
						})

						if(data.get.eviden_paid){
							htmlBtn = $(btnShowEviden).attr('href', data.get.eviden_paid)
							check = data.get.eviden_paid.split('.')[1];
							if(check == 'pdf') htmlBtn.attr('data-type', 'pdf');

							modal.find('#eviden_view').html(htmlBtn)
						} else {
							modal.find('#eviden_view').html(btnEviden)
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

				$('#modal_detailstudibanding').modal('hide');
				modal.find('#id_bukti').val(id)

				let rekening, detail;

				$.when(
					$.ajax({
						url: "{{ route('studi_banding.get') }}",
						data: {id: id},
						type: 'POST',
						async:false,
						dataType: 'json'
					}).done(function(data){
						if(data.success){
							detail = data.get;
						} else {
							alertError("Berhasil", data.msg)
						}
					}).fail(function(data){
						console.log(data.responseText)
					}),
					$.ajax({
						url: '{{ route("get_settings") }}',
						type: 'POST',
						data: {name: ['rekening']},
						dataType: 'json',
						cache: false
					}).done(function (data) {
						if(data.success){
							rekening = data.get.value
						} else {
							alertError("Terjadi Kesalahan", data.msg)
						}
					}).fail(function(data){
						resp = JSON.parse(data.responseText)
						alertError("Terjadi Kesalahan", resp.message)
						console.log("error");
					})
				)
				.then(function(){
					const btnShowEviden = `
						<button class="btn btn-secondary btn-xs" data-fancybox>
							Lihat Bukti Pembayaran
						</button>`;

					modal.find('#title_view').html(detail.title);
					modal.find('#members_view').html(detail.members);
					modal.find('#pay_view').html("Rp " + currency.format(detail.total_paid));
					if(detail.eviden_paid){
						htmlBtn = $(btnShowEviden).attr('href', detail.eviden_paid)
						check = detail.eviden_paid.split('.')[1];
						if(check == 'pdf') htmlBtn.attr('data-type', 'pdf');

						modal.find('#eviden_view').html(htmlBtn)
					} else {
						modal.find('#btn_evidenview').html('')
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
				})
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

				modal.find('button[data-fancybox]').prop('disabled', true)
				modal.find('button[data-fancybox]').removeAttr('href')
				modal.find('button[data-fancybox]').removeClass('btn-secondary')
				modal.find('button[data-fancybox]').addClass('btn-dark')
				modal.find('button[data-fancybox]').removeAttr('data-type');
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

				modal.find('button[data-fancybox]').prop('disabled', true)
				modal.find('button[data-fancybox]').removeAttr('href')
				modal.find('button[data-fancybox]').removeClass('btn-secondary')
				modal.find('button[data-fancybox]').addClass('btn-dark')
				modal.find('button[data-fancybox]').removeAttr('data-type');
			})

			$('#modal_addstudibanding, #modal_editstudibanding, #modal_uploadpembayaran').on('change', '.form-daftar', function(e) {
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
        });
    </script>
@endsection