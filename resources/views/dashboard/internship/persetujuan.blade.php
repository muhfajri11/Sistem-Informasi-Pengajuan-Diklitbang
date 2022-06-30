@extends('dashboard.layouts.app')

@section('title', "Persetujuan PKL")

@section('style')
	<link rel="stylesheet" href="{{ asset('assets/vendor/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/pickadate/themes/default.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/pickadate/themes/default.date.css') }}">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" href="{{ asset('assets/vendor/fancyapps/fancy.css') }}">
    <style>
        .ck-balloon-panel{z-index:9999 !important}
    </style>
@endsection

@section('content')
    <div class="d-block d-md-none col-12">
        <div class="card px-4 py-3">
            <h3 class="text-secondary mb-0"><i class="fas fa-ballot-check me-2"></i> @yield('title')</h3>
        </div>
    </div>

	<div class="col-xl-3 col-xxl-6 col-lg-6 col-sm-6">
		<div class="widget-stat card bg-secondary">
			<div class="card-body  p-4">
				<div class="media">
					<span class="me-3">
						<i class="far fa-graduation-cap"></i>
					</span>
					<div class="media-body text-white">
						<p class="mb-0">PKL (Diterima)</p>
						<h3 class="text-white mb-2 mt-1">{{ count($data['internship']['accept']) }}</h3>
						<div class="progress mb-2 bg-secondary">
							<div class="progress-bar progress-animated bg-white" style="width: {{ $data['internship']['presentase_accept'] }}%"></div>
						</div>
						<small>{{ count($data['internship']['accept']) }}/{{ count($data['internship']['all']) }} Pengaju (Kuota Diterima: {{ $data['kuota_pkl'] }})</small>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="col-xl-3 col-xxl-6 col-lg-6 col-sm-6">
		<div class="widget-stat card bg-dark">
			<div class="card-body  p-4">
				<div class="media">
					<span class="me-3">
						<i class="far fa-graduation-cap"></i>
					</span>
					<div class="media-body text-white">
						<p class="mb-0">PKL (Waiting)</p>
						<h3 class="text-white mb-2 mt-1">{{ count($data['internship']['waiting']) }}</h3>
						<div class="progress mb-2 bg-secondary">
							<div class="progress-bar progress-animated bg-white" style="width: {{ $data['internship']['presentase_waiting'] }}%"></div>
						</div>
						<small>{{ count($data['internship']['waiting']) }}/{{ count($data['internship']['all']) }} Pengaju</small>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="col-12">
		<div class="card">
			<div class="card-body pb-0 pt-1">
				<ul class="list-group list-group-flush">
					<li class="list-group-item d-flex px-0 justify-content-between list-button" data-bs-toggle="modal" data-bs-target="#modal_settingpkl">
						<strong>Biaya MOU (Punya)</strong>
						<span class="mb-0 fee_mou">{{ "Rp " . number_format($data['fee']->internship->mou,2,',','.') }}</span>
					</li>
					<li class="list-group-item d-flex px-0 justify-content-between list-button" data-bs-toggle="modal" data-bs-target="#modal_settingpkl">
						<strong>Biaya MOU (Tidak Punya)</strong>
						<span class="mb-0 fee_nomou">{{ "Rp " . number_format($data['fee']->internship->no_mou,2,',','.') }}</span>
					</li>
					<li class="list-group-item d-flex px-0 justify-content-between list-button" data-bs-toggle="modal" data-bs-target="#modal_settingpkl">
						<strong>Kuota Penerimaan PKL</strong>
						<span class="mb-0 kuota_pkl">{{ $data['kuota_pkl'] }}</span>
					</li>
				</ul>
			</div>
			<div class="card-footer pt-0 pb-0 text-center">
				<div class="row">
					<div class="col-4 pt-3 pb-3 border-end">
						<h3 class="mb-1 text-primary">{{ count($data['internship']['waiting']) }}</h3>
						<span>Waiting</span>
					</div>
					<div class="col-4 pt-3 pb-3 border-end">
						<h3 class="mb-1 text-primary">{{ count($data['internship']['accept']) }}</h3>
						<span>Diterima</span>
					</div>
					<div class="col-4 pt-3 pb-3">
						<h3 class="mb-1 text-primary">{{ count($data['internship']['done']) }}</h3>
						<span>Selesai</span>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="custom-tab-1">
					<ul class="nav nav-tabs">
						<li class="nav-item">
							<a href="#tipepkl" data-bs-toggle="tab" class="nav-table nav-link active show">Tipe PKL</a>
						</li>
						<li class="nav-item">
							<a href="#jenjangpend" data-bs-toggle="tab" class="nav-table nav-link">Jenjang Pend.</a>
						</li>
					</ul>
					<div class="tab-content pt-4">
						<div id="tipepkl" class="tab-pane fade active show">
							<div class="row">
								<div class="col-12">
									<div class="d-flex justify-content-between mb-4">
										<h3 class="font-weight-bold">
                                            Tipe PKL
                                        </h3>
										<button type="button" data-table="#data_tipepkl" class="btn btn-rounded btn-primary btn_refresh">
											<span class="btn-icon-start text-primary">
												<i class="fas fa-sync-alt"></i>
											</span> Refresh Data
										</button>
									</div>
									<div class="table-responsive">
										<table id="data_tipepkl" class="display" style="width: 100%">
											<thead>
												<tr>
													<th>Nama</th>
													<th>Biaya</th>
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
						<div id="jenjangpend" class="tab-pane fade">
							<div class="row">
								<div class="col-12">
									<div class="d-flex justify-content-between mb-4">
										<h3 class="font-weight-bold">
                                            Jenjang Pendidikan
                                        </h3>
										<button type="button" data-table="#data_jenjangpend" class="btn btn-rounded btn-primary btn_refresh">
											<span class="btn-icon-start text-primary">
												<i class="fas fa-sync-alt"></i>
											</span> Refresh Data
										</button>
									</div>
									<div class="table-responsive">
										<table id="data_jenjangpend" class="display" style="width: 100%">
											<thead>
												<tr>
													<th>Nama</th>
													<th>Biaya</th>
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
										<h3 class="font-weight-bold">
                                            Pengajuan
                                            <span class="badge badge-pill badge-dark">
                                                Review
                                            </span>
                                        </h3>
										<button type="button" data-table="#data_reviews" class="btn btn-rounded btn-primary btn_refresh">
											<span class="btn-icon-start text-primary">
												<i class="fas fa-sync-alt"></i>
											</span> Refresh Data
										</button>
									</div>
									<div class="table-responsive">
										<table id="data_reviews" class="display" style="width: 100%">
											<thead>
												<tr>
													<th>#</th>
													<th>Nama</th>
													<th>Jurusan</th>
													<th>Mulai</th>
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
						<div id="pembayaran" class="tab-pane fade">
							<div class="row">
								<div class="col-12">
									<div class="d-flex justify-content-between mb-4">
										<h3 class="font-weight-bold">
                                            Pengajuan
                                            <span class="badge badge-pill badge-warning">
                                                Pembayaran
                                            </span>
                                        </h3>
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
													<th>Bukti</th>
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
										<h3 class="font-weight-bold">
                                            Pengajuan
                                            <span class="badge badge-pill badge-secondary">
                                                Diterima
                                            </span>
                                        </h3>
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
										<h3 class="font-weight-bold">
                                            Pengajuan 
                                            <span class="small text-light">(Selesai, Ditolak)</span>
                                        </h3>
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

    @include('dashboard.internship.components.mdetail_magang')

    @include('dashboard.internship.components.modal_status')

    @include('dashboard.internship.components.modal_message')

    @include('dashboard.internship.components.modal_rooms')

	@include('dashboard.internship.components.modal_sertifikat')
	
	@include('dashboard.internship.components.medit_tipepkl')
	@include('dashboard.internship.components.medit_jenjang')
	@include('dashboard.internship.components.modal_settingpkl')
@endsection

@section('script')
	<script src="{{ asset('assets/vendor/pickadate/picker.js') }}"></script>
    <script src="{{ asset('assets/vendor/pickadate/picker.date.js') }}"></script>

	<script src="{{ asset('assets/vendor/fancyapps/fancybox.umd.js') }}"></script>
    <script src="{{ asset('assets/vendor/ckeditor/ckeditor.js') }}"></script>

    <script>
        let theEditor;

        ClassicEditor
            .create( document.querySelector( '#editor' ) )
            .then( editor => {
                theEditor = editor; // Save for later use.
            } )
            .catch( error => {
                console.error( error );
            } );

        function getDataFromTheEditor() {
            return theEditor.getData();
        }

        function setDataFromTheEditor(text) {
            return theEditor.setData(text);
        }

        $(document).ready(function(){

            $.validator.addMethod('ckrequired', function (value, element, params) {
                var idname = $(element).attr('id');
                var messageLength =  $.trim ( getDataFromTheEditor() );
                return !params  || messageLength.length !== 0;
            }, "This field is required.");

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
				  dataDone = setDatatables,
				  dataTipe = setDatatables,
				  dataJenjang = setDatatables;

            $.extend(dataReviews, {
                "ajax": {
                    "type": "POST",
                    "url": `{{ route('internship.all', ['type' => 'review', 'admin' => 1]) }}`,
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
                            return data.type;
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
                                            data-bs-toggle="modal" data-bs-target="#modal_sendmsg">
                                            <i class="fas fa-paper-plane me-1"></i> Kirim Pesan
                                        </button>
                                        <button class="dropdown-item" data-id="${ data.id }" data-status="${data.status}"
                                            data-table="data_reviews" data-bs-toggle="modal" data-bs-target="#modal_ubahstatus">
                                            <i class="fas fa-user-check me-1"></i> Ubah Status
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

			$.extend(dataTipe, {
                "ajax": {
                    "type": "POST",
                    "url": `{{ route('setting.tipepkl_all') }}`,
                    "timeout": 120000
                },
                "aoColumns": [
                    {
                        "mData": null,
                        "render": function (data, row, type, meta) {
                            return data.name;
                        }
                    },
                    {
                        "mData": null,
                        "render": function (data, row, type, meta) {
                            return data.fee;
                        }
                    },
                    {
                        "mData": null,
                        "sortable": false,
                        "render": function (data, row, type, meta) {
                            
                            let btn = `
								<div class="btn-group">
									<button data-list="${ data.name }" data-name="tipe_internship"
										class="btn btn-warning shadow btn-xs px-2"
										data-bs-toggle="modal" data-bs-target="#modal_edittipepkl" data-from="#data_tipepkl">
										<i class="fas fa-cog me-1"></i>
									</button>
									<button class="btn btn-danger shadow btn-xs px-2 delete_setting"
										data-list="${ data.name }" data-name="tipe_internship" data-from="#data_tipepkl">
										<i class="fas fa-trash me-1"></i>
									</button>
								</div>`;

                            return btn;
                        }
                    }
                ]
            })

			let tipepkl_datatable = $('#data_tipepkl').DataTable(dataTipe);
			// $.fn.DataTable.isDataTable('#data_tipepkl')

			const reloadData = idTag => {
				let text = '';
				switch(idTag){
					case '#data_reviews': text = "Reload Data Reviews"; break;
					case '#data_payments': text = "Reload Data Payments"; break;
					case '#data_accepts': text = "Reload Data Accepts"; break;
					case '#data_dones': text = "Reload Data Lulus"; break;
					case '#data_tipepkl': text = "Reload Data Tipe PKL"; break;
					case '#data_jenjangpend': text = "Reload Data Jenjang Pendidikan"; break;
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
                                    "url": `{{ route('internship.all', ['type' => 'pay', 'admin' => 1]) }}`,
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
                                                            data-bs-toggle="modal" data-bs-target="#modal_sendmsg">
                                                            <i class="fas fa-paper-plane me-1"></i> Kirim Pesan
                                                        </button>
                                                        <button class="dropdown-item" data-id="${ data.id }" data-status="${data.status}"
                                                            data-table="data_payments" data-bs-toggle="modal" data-bs-target="#modal_ubahstatus">
                                                            <i class="fas fa-user-check me-1"></i> Ubah Status
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
                                    "url": `{{ route('internship.all', ['type' => 'accept', 'admin' => 1]) }}`,
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
                                                <div class="btn-group">
                                                    <button data-id="${ data.id }"
                                                        class="btn btn-primary shadow btn-xs px-2"
                                                        data-bs-toggle="modal" data-bs-target="#modal_detailmagang">
                                                        <i class="fas fa-eye me-1"></i><span class="d-none d-sm-block">View</span>
                                                    </button>
                                                    <button class="btn btn-primary shadow btn-xs px-2" data-id="${ data.id }"
                                                        data-bs-toggle="modal" data-bs-target="#modal_setruangan">
                                                        <i class="fas fa-hospital-alt me-1"></i> <span class="d-none d-sm-block">Room</span>
                                                    </button>
                                                    <div class="btn-group">
                                                        <button id="btnGroupDrop1" type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown"></button>
                                                        <div class="dropdown-menu">
                                                            <button class="dropdown-item" data-id="${ data.id }"
                                                                data-bs-toggle="modal" data-bs-target="#modal_sendmsg">
                                                                <i class="fas fa-paper-plane me-1"></i> Kirim Pesan
                                                            </button>
                                                            <button class="dropdown-item" data-id="${ data.id }" data-status="${data.status}"
                                                                data-table="data_payments" data-bs-toggle="modal" data-bs-target="#modal_ubahstatus">
                                                                <i class="fas fa-user-check me-1"></i> Ubah Status
                                                            </button>
                                                            <button class="dropdown-item delete_magang" data-id="${ data.id }" data-name="${data.name}" data-from="#data_accepts">
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
					case 'done':
						if(!$.fn.DataTable.isDataTable('#data_dones')){
							$.extend(dataDone, {
                                "ajax": {
                                    "type": "POST",
                                    "url": `{{ route('internship.all', ['type' => 'done,reject', 'admin' => 1]) }}`,
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
                                                        <i class="fas fa-eye me-1"></i>
                                                    </button>
													<button class="btn btn-primary shadow btn-xs px-2" data-id="${ data.id }"
														data-bs-toggle="modal" data-bs-target="#modal_sendmsg">
														<i class="fas fa-paper-plane me-1"></i>
													</button>
                                                    <div class="btn-group">
                                                        <button id="btnGroupDrop1" type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown"></button>
                                                        <div class="dropdown-menu">
                                                            <button class="dropdown-item" data-id="${ data.id }" data-status="${data.status}"
                                                                data-table="data_dones" data-bs-toggle="modal" data-bs-target="#modal_ubahstatus">
                                                                <i class="fas fa-user-check me-1"></i> Ubah Status
                                                            </button>
															<button class="dropdown-item" data-id="${ data.id }" data-status="${data.status}"
                                                                data-table="data_dones" data-bs-toggle="modal" data-bs-target="#modal_sertifikat">
                                                                <i class="fas fa-file-certificate me-1"></i> Sertifikat
                                                            </button>
                                                            <button class="dropdown-item delete_magang" data-id="${ data.id }" data-name="${data.name}" data-from="#data_dones">
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

							$('#data_dones').DataTable(dataAccept);
						} else {
							reloadData('#data_dones')
						}
					break;
					case 'tipepkl':
						if(!$.fn.DataTable.isDataTable('#data_tipepkl')){
							$('#data_tipepkl').DataTable(dataTipe);
						} else {
							reloadData('#data_tipepkl')
						}
					break;
					case 'jenjangpend':
					if(!$.fn.DataTable.isDataTable('#data_jenjangpend')){
							$.extend(dataDone, {
                                "ajax": {
                                    "type": "POST",
                                    "url": `{{ route('setting.jenjang_all') }}`,
                                    "timeout": 120000
                                },
                                "aoColumns": [
                                    {
                                        "mData": null,
                                        "render": function (data, row, type, meta) {
                                            return data.name;
                                        }
                                    },
                                    {
                                        "mData": null,
                                        "render": function (data, row, type, meta) {
                                            return data.fee;
                                        }
                                    },
                                    {
                                        "mData": null,
                                        "sortable": false,
                                        "render": function (data, row, type, meta) {
                                            
                                            let btn = `
                                                <div class="btn-group">
                                                    <button data-list="${ data.name }" data-name="jenjang_pendidikan"
                                                        class="btn btn-warning shadow btn-xs px-2"
                                                        data-bs-toggle="modal" data-bs-target="#modal_editjenjang" data-from="#data_jenjangpend">
														<i class="fas fa-cog me-1"></i>
                                                    </button>
													<button class="btn btn-danger shadow btn-xs px-2 delete_setting"
														data-list="${ data.name }" data-name="jenjang_pendidikan" data-from="#data_jenjangpend">
														<i class="fas fa-trash me-1"></i>
													</button>
                                                </div>`;

                                            return btn;
                                        }
                                    }
                                ]
                            })

							$('#data_jenjangpend').DataTable(dataJenjang);
						} else {
							reloadData('#data_jenjangpend')
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

			$('#modal_settingpkl').on('click', '.min_members', function(e){
                e.preventDefault();
                const members = $(this).parent().find('input'),
                      membersNow = parseInt(members.val())

                if(membersNow > 1) members.val(membersNow - 1)
            })

            $('#modal_settingpkl').on('click', '.add_members', function(e){
                e.preventDefault();
                const members = $(this).parent().find('input'),
                      membersNow = parseInt(members.val())

                if(membersNow > 0) members.val(membersNow + 1)
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
						let btnEviden = `<h5>Tidak ada berkas</h5>`, 
							htmlBtnShow = `<button class="btn btn-secondary btn-xs" data-fancybox>Buka</button>`,
							province, city, htmlBtn, check;

						modal.find('#name_view').html(data.get.name);
						modal.find('#nim_view').html(data.get.nim);
						modal.find('#institusi_view').html((data.get.institution? data.get.institution.name: "Tidak ada"));
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

			$('#modal_settingpkl').on('show.bs.modal', function (e) {
                const modal = $(this);

				$.ajax({
					url: "{{ route('get_settings') }}",
					data: {name: ['fee', 'kuota']},
					type: 'POST',
					async:false,
					dataType: 'json'
				}).done(function (data) {
					if(data.success){
						const settings = {};

						data.get.forEach(val => {
							settings[val.name] = val.value;
						})
						
						modal.find('input[name="mou"]').val(settings.fee.internship.mou)
						modal.find('input[name="no_mou"]').val(settings.fee.internship.no_mou)
						modal.find('input[name="kuota"]').val(settings.kuota.internship)
					} else {
						alertError("Terjadi Kesalahan", data.msg)
					}
				}).fail(function(data){
					resp = JSON.parse(data.responseText)
					alertError("Terjadi Kesalahan", resp.message)
					console.log("error");
				})
            })

            $('#modal_setruangan').on('show.bs.modal', function (e) {
                const modal = $(this),
                      id    = $(e.relatedTarget).data('id'),
                      data_status    = $(e.relatedTarget).data('status'),
                      data_table    = $(e.relatedTarget).data('table');
                let intern, rooms;

                $.when(
                    $.ajax({
                        url: "{{ route('internship.get') }}",
                        data: {id: id},
                        type: 'POST',
                        async:false,
                        dataType: 'json'
                    }).done(function (data) {
                        if(data.success){
                            intern = data.get;
                        } else {
                            alertError("Terjadi Kesalahan", data.msg)
                        }
                    }).fail(function(data){
                        resp = JSON.parse(data.responseText)
                        alertError("Terjadi Kesalahan", resp.message)
                        console.log("error");
                    }),
                    $.ajax({
                        url: "{{ route('manage_room.rooms') }}",
                        type: 'POST',
                        async:false,
                        dataType: 'json'
                    }).done(function (data) {
                        rooms = data;
                    }).fail(function(data){
                        resp = JSON.parse(data.responseText)
                        alertError("Terjadi Kesalahan", resp.message)
                        console.log("error");
                    })
                )
                .then(function(){
                    const btnShowEviden = `
                            <button class="btn btn-secondary btn-xs" data-fancybox>
                                Buka
                            </button>`;
                    let check, set_room = [];
                    if(intern.file_internship.bukti_pkl){
                        $.each(rooms, function(i, val){
                            set_room.push({id: val.id, text: val.name})
                        })
                    } else {
                        $.each(rooms, function(i, val){
                            if(val.rate == 1) set_room.push({id: val.id, text: val.name})
                        })
                    }

                    modal.find('select[name="rooms[]"]').html('').select2({data: set_room});

                    modal.find('input[name="id"]').val(id)
                    modal.find('form').attr('data-table', data_table)

                    const data_id = [];
                    $.each(intern.rooms, function(i, val){
                        data_id.push(val.id)
                    })

                    modal.find('select[name="rooms[]"]').val(data_id).change();
                    
                    modal.find('#name_room').html(intern.name)
                    modal.find('#jurusan_room').html(intern.jurusan)
                    modal.find('#institusi_room').html(intern.institution?intern.institution.name:"Tidak ada")
                    check = intern.file_internship.bukti_pkl? 
                        $(btnShowEviden).attr('href', intern.file_internship.bukti_pkl) :
                        `<strong>Tidak ada pengalaman</strong>`;

                    modal.find('#exp_room').html(check)
                    
                })
            })

			$('#modal_edittipepkl, #modal_editjenjang').on('show.bs.modal', function (e) {
                const modal = $(this),
                      name    = $(e.relatedTarget).data('name'),
					  list    = $(e.relatedTarget).data('list'),
					  from = $(e.relatedTarget).data('from');

                $.ajax({
					url: "{{ route('setting.get_data') }}",
					data: {name: name, list: list},
					type: 'POST',
					async:false,
					dataType: 'json',
					beforeSend: function(){
						$('#preloader').removeClass('d-none');
						$('#main-wrapper').removeClass('show');
					}
				}).done(function(data){
					if(data.success){
						modal.find('#id_bukti').val(data.get.name)
						modal.find('#tipe_bukti').val(name)

						modal.find('input[name="name"]').val(data.get.name)
						modal.find('input[name="fee"]').val(data.get.fee)

						modal.find('form').attr('data-table', from)
					} else {
						alertError("Error", data.msg)
					}

					$('#preloader').addClass('d-none');
					$('#main-wrapper').addClass('show');
				}).fail(function(data){
					$('#preloader').addClass('d-none');
					$('#main-wrapper').addClass('show');
					console.log(data.responseText)
				});
            })

			$('#data_tipepkl, #data_jenjangpend')
			.on('click', ".delete_setting", function(e){
				e.preventDefault();
				const list = $(this).data('list'),
					  name = $(this).data('name'),
					  id_elm = $(this).data('from');

				Swal.fire({
					title: `Apakah kamu yakin ingin menghapus ${list}?`,
					showDenyButton: true,
					showConfirmButton: false,
					showCancelButton: true,
					denyButtonText: `Hapus`
				}).then((result) => {
					if (result.isDenied) {
						$.ajax({
							url: "{{ route('setting.delete_spesific') }}",
							data: {list: list, name: name},
							type: 'POST',
							async:false,
							dataType: 'json',
							beforeSend: function(){
								$('#preloader').removeClass('d-none');
								$('#main-wrapper').removeClass('show');
							}
						}).done(function(data){
							if(data.success){
								alertWarning("Berhasil Data", data.msg)
								reloadData(id_elm)
							} else {
								alertError("Terjadi Kesalahan", data.msg)
							}

							$('#preloader').addClass('d-none');
							$('#main-wrapper').addClass('show');
						}).fail(function(data){
							$('#preloader').addClass('d-none');
							$('#main-wrapper').addClass('show');
							console.log(data.responseText)
						});
					}
				})
			})

            $('#modal_ubahstatus, #modal_sendmsg, #modal_sertifikat').on('show.bs.modal', function (e) {
                const modal = $(this),
                      id    = $(e.relatedTarget).data('id'),
                      data_status    = $(e.relatedTarget).data('status'),
                      data_table    = $(e.relatedTarget).data('table');

                $.ajax({
                    url: "{{ route('internship.get') }}",
                    data: {id: id},
                    type: 'POST',
                    async:false,
                    dataType: 'json'
                }).done(function (data) {
                    if(data.success){
						const status = ['reject', 'review', 'pay', 'accept', 'done'],
                              btnShowEviden = `
                                <button class="btn btn-secondary btn-xs" data-fancybox>
                                </button>`;
                        let check;

                        modal.find('input[name="id"]').val(id)
                        modal.find('form').attr('data-table', data_table)
                    
                        if(modal.attr('id') == 'modal_ubahstatus' || modal.attr('id') == 'modal_sertifikat'){
                            modal.find('#name_status').html(data.get.name)
                            modal.find('#jurusan_status').html(data.get.jurusan)
                            modal.find('#institusi_status').html(data.get.institution?data.get.institution.name: "Tidak ada")
                            modal.find('#status_status').html(setBadgeStatus(data.get.status))
                            modal.find('#statuspay_status').html(setBadgePay(data.get.paid))

							check = data.get.file_internship.eviden_paid? 
									$(btnShowEviden).attr('href', data.get.file_internship.eviden_paid).html('Lihat Bukti Pembayaran') :
									`<strong>Tidak ada bukti</strong>`;

								modal.find('#eviden_status').html(check)
                            
                            if(modal.attr('id') == 'modal_ubahstatus'){
								check = data.get.paid? true : false;
								modal.find('#switch').prop('checked', check);

								modal.find('select[name="status"]').html('').select2({data: status})
								modal.find('select[name="status"]').val(data_status).change();
							} else {
								
								check = data.get.file_internship.sertifikat? 
									$(btnShowEviden).attr({
										href: data.get.file_internship.sertifikat,
										'data-type': 'pdf'
									}).html('Lihat Sertifikat') :
									``;

								modal.find('#btn_sertifikatview').html(check)
							}
                        } else {
                            modal.find('#name_msg').html(data.get.name)
                            modal.find('#jurusan_msg').html(data.get.jurusan)
                            modal.find('#institusi_msg').html(data.get.institution? data.get.institution.name : "Tidak ada")
                            modal.find('#mail_msg').html(data.get.user.email)
                        }
					} else {
						alertError("Terjadi Kesalahan", data.msg)
					}
                }).fail(function(data){
                    resp = JSON.parse(data.responseText)
                    alertError("Terjadi Kesalahan", resp.message)
                    console.log("error");
                }); 
            })

            $('#modal_ubahstatus, #modal_sendmsg').on('hide.bs.modal', function (e) {
                const modal = $(this);

                modal.find('form')[0].reset()
                
                if(modal.attr('id') == 'modal_ubahstatus'){
                    modal.find('#title_status').html('')
                    modal.find('#institusi_status').html('')
                    modal.find('#status_status').html('')
                    modal.find('#statuspay_status').html('')
                    modal.find('#switch').prop('checked', false);

                    modal.find('select[name="status"]').html('').select2({data: []})
                    modal.find('#eviden_status').html('')
                } else {
                    modal.find('#title_msg').html('')
                    modal.find('#institusi_msg').html('')
                    modal.find('#mail_msg').html('')
                    setDataFromTheEditor('')
                }
            })

			$('#data_reviews, #data_payments, #data_accepts, #data_dones')
			.on('click', ".delete_magang", function(e){
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

            $('#ubah_status').validate({
				submitHandler: function (form) {
                    const dataForm = $(form).serializeObject(),
                          table = $(form).data('table');

                    if(dataForm.switch_pay) delete dataForm.switch_pay;
                    dataForm.from = 'internship';

                    dataForm.paid = $(form).find('input[name="switch_pay"]').prop('checked')? 1 : 0;
					$.ajax({
						url: "{{ route('changestatus') }}",
						method: 'POST',
						data: dataForm,
						beforeSend: function(){
							$('#modal_ubahstatus').modal('hide')
							$('#ubah_status')[0].reset();
							$('#preloader').removeClass('d-none');
							$('#main-wrapper').removeClass('show');
						}
					}).done(function (data) {						
						$('#preloader').addClass('d-none');
						$('#main-wrapper').addClass('show');
						
						if(data.success){
							alertSuccess("Berhasil", data.msg)
                            reloadData("#" + table);
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

			$('#tambah_sertifikat').validate({
				rules: {
					sertifikat: { required: true, extension: "pdf", filesize : 1 }
				},
				submitHandler: function (form) {
                    let dataForm = new FormData(form),
						table = $(form).data('table');
					dataForm.append('_method', 'PUT');
                    dataForm.append('from', 'internship');

					$.ajax({
						url: "{{ route('internship.add_certificate') }}",
						type: 'POST',
						async: false,
						processData: false,
						contentType: false,
						cache: false,
						dataType: 'json',
						enctype: 'multipart/form-data',
						data: dataForm,
						beforeSend: function(){
							$('#modal_sertifikat').modal('hide')
							$(form)[0].reset();
							$('#preloader').removeClass('d-none');
							$('#main-wrapper').removeClass('show');
						}
					}).done(function (data) {						
						$('#preloader').addClass('d-none');
						$('#main-wrapper').addClass('show');
						
						if(data.success){
							alertSuccess("Berhasil", data.msg)
                            reloadData("#" + table);
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

            $('#set_ruangan').validate({
                rules:{
					rooms: { required: true }
				},
				submitHandler: function (form) {
                    const dataForm = $(form).serializeObject(),
                          table = $(form).data('table');

                    dataForm.from = 'internship';
                    dataForm.rooms = dataForm['rooms[]'];
                    delete dataForm['rooms[]'];
                    
					$.ajax({
						url: "{{ route('internship.set_rooms') }}",
						method: 'POST',
                        async: false,
						data: dataForm,
						beforeSend: function(){
							$('#modal_setruangan').modal('hide')
							$('#set_ruangan')[0].reset();
							$('#preloader').removeClass('d-none');
							$('#main-wrapper').removeClass('show');
						}
					}).done(function (data) {						
						$('#preloader').addClass('d-none');
						$('#main-wrapper').addClass('show');
						
						if(data.success){
							alertSuccess("Berhasil", data.msg)
                            reloadData("#" + table);
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

            $('#send_msg').validate({
                ignore : [],
				rules:{
					title: { required: true, alphanumeric: true },
                    body:{
                        ckrequired: true
                    }
				},
				submitHandler: function (form) {
                    const dataForm = $(form).serializeObject(),
                          table = $(form).data('table');
                    
                    dataForm.from = 'internship';
					$.ajax({
						url: "{{ route('send_msg') }}",
						method: 'POST',
						data: dataForm,
						beforeSend: function(){
							$('#modal_sendmsg').modal('hide')
							$('#send_msg')[0].reset();
                            setDataFromTheEditor('')
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

			$('#edit_tipepkl').validate({
				rules:{
					name: { required: true, alphanumeric: true },
					fee: { required: true, number: true, min: 0 },
				},
				submitHandler: function (form) {
                    const dataForm = $(form).serializeObject(),
                          table = $(form).data('table');
						dataForm._method = "_PATCH";
						
					$.ajax({
						url: "{{ route('setting.update_data') }}",
						type: 'PATCH',
						data: dataForm,
						beforeSend: function(){
							const modal = $(form).closest('.modal');

							modal.modal('hide')
							$(form)[0].reset();

							$('#preloader').removeClass('d-none');
							$('#main-wrapper').removeClass('show');
						}
					}).done(function (data) {						
						$('#preloader').addClass('d-none');
						$('#main-wrapper').addClass('show');
						
						if(data.success){
							alertSuccess("Berhasil", data.msg)
							reloadData(table)
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

			$('#edit_jenjang').validate({
				rules:{
					name: { required: true, alphanumeric: true },
					fee: { required: true, number: true, min: 0 },
				},
				submitHandler: function (form) {
                    const dataForm = $(form).serializeObject(),
                          table = $(form).data('table');
						dataForm._method = "_PATCH";
						
					$.ajax({
						url: "{{ route('setting.update_data') }}",
						type: 'PATCH',
						data: dataForm,
						beforeSend: function(){
							const modal = $(form).closest('.modal');

							modal.modal('hide')
							$(form)[0].reset();

							$('#preloader').removeClass('d-none');
							$('#main-wrapper').removeClass('show');
						}
					}).done(function (data) {						
						$('#preloader').addClass('d-none');
						$('#main-wrapper').addClass('show');
						
						if(data.success){
							alertSuccess("Berhasil", data.msg)
							reloadData(table)
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

			$('#setting_pkl').validate({
				rules:{
					mou: { required: true, number: true, min: 0 },
					no_mou: { required: true, number: true, min: 0 },
					kuota: { required: true, digits: true, min: 1 },
				},
				submitHandler: function (form) {
                    const dataForm = $(form).serializeObject();
					
					dataForm._method = "_PATCH";
						
					$.ajax({
						url: "{{ route('setting.set_pkl') }}",
						type: 'PATCH',
						data: dataForm,
						beforeSend: function(){
							const modal = $(form).closest('.modal');

							modal.modal('hide')
							$(form)[0].reset();

							$('#preloader').removeClass('d-none');
							$('#main-wrapper').removeClass('show');
						}
					}).done(function (data) {						
						$('#preloader').addClass('d-none');
						$('#main-wrapper').addClass('show');
						
						if(data.success){
							alertSuccess("Berhasil", data.msg)

							$('.fee_mou').html(`Rp ${currency.format(dataForm.mou)}`)
							$('.fee_nomou').html(`Rp ${currency.format(dataForm.no_mou)}`)
							$('.kuota_pkl').html(dataForm.kuota)
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