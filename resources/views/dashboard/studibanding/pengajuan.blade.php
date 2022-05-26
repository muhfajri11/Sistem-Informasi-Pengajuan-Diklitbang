@extends('dashboard.layouts.app')

@section('title', "Pengajuan Studi Banding")

@section('style')
	<link rel="stylesheet" href="{{ asset('assets/vendor/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/pickadate/themes/default.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/pickadate/themes/default.date.css') }}">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
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
								<a href="#review" data-bs-toggle="tab" class="nav-link active show">Review</a>
							</li>
							<li class="nav-item">
								<a href="#pembayaran" data-bs-toggle="tab" class="nav-link">Pembayaran</a>
							</li>
                            <li class="nav-item">
								<a href="#accept" data-bs-toggle="tab" class="nav-link">Diterima</a>
							</li>
						</ul>
						<div class="tab-content pt-4">
							<div id="review" class="tab-pane fade active show">
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
											<button type="button" data-table="#data_payments" class="btn btn-rounded btn-primary btn_refresh">
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

					<div class="modal fade" id="modal_detailstudibanding" role="dialog" aria-hidden="true">
						<div class="modal-dialog modal-lg">
							<div class="modal-content">
								<div class="modal-header">
									<h3 class="modal-title text-secondary"><i class="fas fa-users-class me-2"></i> Lihat Studi Banding</h3>
									<button type="button" class="btn-close" data-bs-dismiss="modal">
									</button>
								</div>
								<div class="modal-body">
								</div>
							</div>
						</div>
					</div>

                    <div class="modal fade" id="modal_addinstitusi" role="dialog" aria-hidden="true">
						<div class="modal-dialog modal-lg">
							<form class="modal-content" id="tambah_institusi" novalidate>
								<div class="modal-header">
									<h3 class="modal-title text-secondary"><i class="fas fa-university me-2"></i> Tambah Institusi</h3>
									<button type="button" class="btn-close" data-bs-dismiss="modal">
									</button>
								</div>
								<div class="modal-body">
                                    <div class="col-12 mb-4">
                                        <div class="form-group">
                                            <label for="namainstitusi_daftar">Nama Institusi</label>
                                            <input type="text" name="name" class="form-control mb-2" id="namainstitusi_daftar" required>
                                        </div>
                                    </div>
								</div>
                                <div class="modal-footer">
									<button type="submit" class="btn btn-primary">Simpan Data</button>
								</div>
							</form>
						</div>
					</div>

					<div class="modal fade" id="modal_addstudibanding" role="dialog" aria-hidden="true">
						<div class="modal-dialog modal-lg">
							<form class="modal-content" id="tambah_studibanding" enctype="multipart/form-data" novalidate>
								<div class="modal-header">
									<h3 class="modal-title text-secondary"><i class="fas fa-file-alt me-2"></i> Ajukan Studi Banding</h3>
									<button type="button" class="btn-close" data-bs-dismiss="modal">
									</button>
								</div>
								<div class="modal-body">
									<div class="row">
                                        <div class="col-12">
											<div class="alert alert-secondary alert-alt fade show">
												<h5>Aturan Biaya Studi Banding</h5>
                                                <p class="mb-1">Untuk pengunjung yang <span class="badge badge-pill badge-dark">< 10</span> dikenakan biaya <span class="badge badge-pill badge-secondary">Rp 240.000</span></p>
                                                <p class="mb-0">Untuk pengunjung yang <span class="badge badge-pill badge-dark">> 10</span> dikenakan biaya <span class="badge badge-pill badge-secondary">Rp 300.000</span></p>
											</div>
										</div>
                                        <div class="col-12 mb-4">
											<div class="form-group">
												<label for="judul_daftar">Judul</label>
												<input type="text" name="title" class="form-control mb-2" id="judul_daftar" required>
                                                <span class="small text-light">*Apa yang akan dibahas dalam kunjungan</span>
											</div>
										</div>
                                        <div class="col-12 mb-4">
                                            <div class="form-group">
												<label for="institusi_daftar">Pilih Institusi <button class="btn btn-dark btn-xs ms-2" id="btn_addinstitusi" type="button">Tambah Institusi</button></label>
												<select id="institusi_daftar" class="select2_" name="institution" required>
													@foreach ($institutions as $institution)
														<option value="{{ $institution['id'] }}">{{ $institution['name'] }}</option>
													@endforeach
												</select>
                                                <span class="small text-light">*Klik tambah institusi jika institusi tidak ada</span>
											</div>
                                        </div>
                                        <div class="col-12 col-md-6 mb-4">
                                            <div class="form-group">
												<label for="kunjungan_daftar">Tanggal Kunjungan</label>
												<input name="visit" class="datepicker-default form-control" id="kunjungan_daftar" required>
											</div>
                                        </div>
                                        <div class="col-12 col-md-6 mb-4">
                                            <div class="form-group">
												<label for="pengunjung_daftar">Pengunjung <span class="small text-light">/orang</span></label>
                                                <div class="input-group">
                                                    <button class="btn btn-primary min_members" type="button">-</button>
                                                    <input type="number" name="members" class="form-control text-center" id="pengunjung_daftar" value="1" readonly required>
                                                    <button class="btn btn-primary add_members" type="button">+</button>
                                                </div>
											</div>
                                        </div>
                                        <div class="col-12 mb-4">
											<div class="form-group">
												<label for="rooms_daftar">Pilih Ruangan</label>
												<select id="rooms_daftar" class="multi-select select2_" name="rooms[]" multiple="multiple" required>
													@foreach ($rooms as $room)
														<option value="{{ $room['id'] }}">{{ $room['name'] }}</option>
													@endforeach
												</select>
											</div>
										</div>
                                        <div class="col-12">
                                            <div class="accordion accordion-primary" id="question_daftar">
                                                <div class="accordion-item">
                                                    <div class="accordion-header  rounded-lg" id="questionDaftarAccordion" data-bs-toggle="collapse" data-bs-target="#questionDaftar" aria-controls="questionDaftar"   aria-expanded="true" role="button">
                                                        <span class="accordion-header-icon"></span>
                                                        <span class="accordion-header-text">Daftar Pertanyaan</span>
                                                        <span class="accordion-header-indicator"></span>
                                                    </div>
                                                    <div id="questionDaftar" class="collapse show" aria-labelledby="questionDaftarAccordion" data-bs-parent="#question_daftar">
                                                        <div class="accordion-body-text">
                                                            <div class="row mt-1">
                                                                <div class="col-12 mb-2" id="list_questionDaftar">
                                                                    <div class="form-group mb-2">
                                                                        <div class="input-group">
                                                                            <input type="text" name="questions[]" class="form-control" required>
                                                                            <button class="btn btn-danger delete_questionDaftar" disabled type="button">-</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <button class="btn col-6 mx-auto btn-dark btn-sm" id="add_questionDaftar" type="button">Tambah Pertanyaan</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 mb-4">
											<div class="form-group">
												<label for="lampiran_daftar">Lampiran <span class="small text-light">(opsional)</span></label>
                                                <div class="form-file">
                                                    <input type="file" class="form-file-input form-control" name="attach" required>
                                                </div>
												<span class="small text-light">*File berbentuk .pdf</span>
											</div>
										</div>
                                        <div class="col-12">
											<div class="accordion accordion-primary" id="pay_daftar">
                                                <div class="accordion-item">
                                                    <div class="accordion-header  rounded-lg" id="payDaftarAccordion" data-bs-toggle="collapse" data-bs-target="#payDaftar" aria-controls="payDaftar"   aria-expanded="true" role="button">
                                                        <span class="accordion-header-icon"></span>
                                                        <span class="accordion-header-text">Biaya Pendaftaran</span>
                                                        <span class="accordion-header-indicator"></span>
                                                    </div>
                                                    <div id="payDaftar" class="collapse show" aria-labelledby="payDaftarAccordion" data-bs-parent="#pay_daftar">
                                                        <div class="accordion-body-text">
                                                            <div class="row mt-1">
                                                                <div class="col-12 col-md-6 d-flex align-items-center">
                                                                    <i class="fas fa-users fa-3x me-2"></i>
                                                                    <div>
                                                                        <p class="small mb-0">Total Pengunjung</p>
                                                                        <h4 id="totalmember_daftar">1 Orang</h4>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12 col-md-6 d-flex align-items-center">
                                                                    <i class="fas fa-wallet fa-3x me-4"></i>
                                                                    <div>
                                                                        <p class="small text-right mb-0">Total Biaya</p>
                                                                        <h4 class="text-right" id="biaya_daftar">Rp 300.000</h4>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12 mt-2">
                                                                    <div class="form-group">
                                                                        <label for="eviden_daftar">Bukti Pembayaran <span class="small text-light">(opsional)</span></label>
                                                                        <div class="form-file">
                                                                            <input type="file" class="form-file-input form-control" name="eviden_paid">
                                                                        </div>
																		<span class="small text-light">*File berbentuk .pdf, .jpeg, .jpg, atau .png</span>
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
								<div class="modal-footer">
									<button type="submit" class="btn btn-primary">Simpan Data</button>
								</div>
							</form>
						</div>
					</div>

					<div class="modal fade" id="modal_editstudibanding" role="dialog" aria-hidden="true">
						<div class="modal-dialog modal-lg">
							<form class="modal-content" id="edit_studibanding" novalidate>
								<div class="modal-header">
									<h3 class="modal-title text-secondary"><i class="fas fa-user-cog me-2"></i>Update Pengguna</h3>
									<button type="button" class="btn-close" data-bs-dismiss="modal">
									</button>
								</div>
								<div class="modal-body">
								</div>
								<div class="modal-footer">
									<button type="submit" class="btn btn-primary">Simpan Data</button>
								</div>
							</form>
						</div>
					</div>
				</div>
            </div>
        </div>
    </div>
@endsection

@section('script')
	<script src="{{ asset('assets/vendor/select2/js/select2.full.min.js') }}"></script>
	<script src="{{ asset('assets/js/jquery.validate.min.js') }}"></script>

    <script src="{{ asset('assets/vendor/pickadate/picker.js') }}"></script>
    <script src="{{ asset('assets/vendor/pickadate/picker.date.js') }}"></script>

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

            const dataReviews = setDatatables,
                  dataPayments = setDatatables,
                  dataAccept = setDatatables;

            $.extend(dataReviews, {
                "ajax": {
                    "type": "POST",
                    "url": `{{ route('studi_banding.all', 'review') }}`,
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
                                        <button class="dropdown-item delete_studibanding" data-id="${ data.id }" data-name="${data.title}">
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
                                            return data.status;
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
                                                        <button class="dropdown-item delete_studibanding" data-id="${ data.id }" data-name="${data.title}">
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
                                            return data.status;
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
                                                        <button class="dropdown-item delete_studibanding" data-id="${ data.id }" data-name="${data.title}">
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

            $('#data_reviews').on('click', ".delete_pengguna", function(e){
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
							url: "{{ route('studi_banding.delete') }}",
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
							console.log(data.responseText)
						});
					}
				})
			})

            $('#modal_addstudibanding').on('click', '.min_members', function(e){
                e.preventDefault();
                const members = $('#pengunjung_daftar'),
                      membersNow = parseInt(members.val()),
                      totalMembers = $('#totalmember_daftar'),
                      biaya = $('#biaya_daftar');

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

            $('#modal_addstudibanding').on('click', '.add_members', function(e){
                e.preventDefault();
                const members = $('#pengunjung_daftar'),
                      membersNow = parseInt(members.val()),
                      totalMembers = $('#totalmember_daftar'),
                      biaya = $('#biaya_daftar');

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
                        <div class="form-group mb-2">
                            <div class="input-group">
                                <input type="text" name="questions[]" class="form-control" required>
                                <button class="btn btn-danger delete_questionDaftar" type="button">-</button>
                            </div>
                        </div>`;
                
                listQuestion.append($(formQuestion));
            })

            $('#list_questionDaftar').on('click', '.delete_questionDaftar', function(e){
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
							$('#tambah_studibanding')[0].reset();
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

            $('#modal_addstudibanding').on('shown.bs.modal', function (e) {
                const modal = $(this);

                $.ajax({
                    url: '{{ route('get_institution') }}',
                    type: 'POST',
                    dataType: 'json',
                    beforeSend: function(){
                        $("#institusi_daftar").html('').select2({data: []});
                    }
                }).done(function (institutions) {
                    const html_ = [];

                    $.each(institutions, function(i, val) {
                        html_.push({id: val.id, text: val.name});
                    })
                    
                    $("#institusi_daftar").html('').select2({data: html_});
                }).fail(function(data){
                    resp = JSON.parse(data.responseText)
                    alertError("Terjadi Kesalahan", resp.message)
                    console.log("error");
                }); 
            })
        });
    </script>
@endsection