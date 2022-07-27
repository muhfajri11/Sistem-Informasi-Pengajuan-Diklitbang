@extends('dashboard.layouts.app')

@section('title', "Telaah Cepat")

@section('style')
	<link rel="stylesheet" href="{{ asset('assets/vendor/select2/css/select2.min.css') }}">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" href="{{ asset('assets/vendor/fancyapps/fancy.css') }}">
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
							<a href="#protocol" data-bs-toggle="tab" class="nav-table nav-link active show">Protokol</a>
						</li>
						<li class="nav-item">
							<a href="#telaah" data-bs-toggle="tab" class="nav-table nav-link">Hasil Telaah Anda</a>
						</li>
					</ul>
					<div class="tab-content pt-4">
						<div id="protocol" class="tab-pane fade active show">
							<div class="row">
								<div class="col-12">
									<div class="d-flex justify-content-between mb-4">
										<h3 class="font-weight-bold">Protokol Terbaru</h3>
										<button type="button" data-table="#data_protocol" class="btn btn-primary btn_refresh">
                                            <i class="fas fa-sync-alt"></i> Refresh Data
                                        </button>
									</div>
									<div class="table-responsive">
										<table id="data_protocol" class="display" style="width: 100%">
											<thead>
												<tr>
													<th>#</th>
													<th>Judul</th>
                                                    <th>Tanggal Pengajuan</th>
													<th>Tanggal Mulai</th>
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
						<div id="telaah" class="tab-pane fade">
							<div class="row">
								<div class="col-12">
									<div class="d-flex justify-content-between mb-4">
										<h3 class="font-weight-bold">Hasil Telaah Anda</h3>
                                        <button type="button" data-table="#data_telaah" class="btn btn-primary btn_refresh">
                                            <i class="fas fa-sync-alt"></i> Refresh Data
                                        </button>
									</div>
									<div class="table-responsive">
										<table id="data_telaah" class="display" style="width: 100%">
											<thead>
												<tr>
													<th>#</th>
													<th>Judul</th>
                                                    <th>Tanggal Pengajuan</th>
                                                    <th>Klasifikasi Usulan</th>
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

@endsection

@section('script')
	<script src="{{ asset('assets/vendor/fancyapps/fancybox.umd.js') }}"></script>

    <script>
        $(document).ready(function(){

            const setUsulan = value => {
				switch(value){
					case 'exempted':
						return `
						<span class="badge mx-auto badge-pill badge-primary">
							Exempted
						</span>`;
						break;
					case 'expedited':
						return `
						<span class="badge mx-auto badge-pill badge-secondary">
							Expedited
						</span>`;
						break;
					case 'fullboard':
						return `
						<span class="badge mx-auto badge-pill badge-secondary">
							Fullboard
						</span>`;
						break;
					case 'ditolak':
						return `
						<span class="badge mx-auto badge-pill badge-dark">
							Tidak bisa ditelaah
						</span>`;
						break;
                    default: 
						return ``;
                        break;
				}
			}

			const dataProtocols = setDatatables,
                  dataTelaah = setDatatables;

            $.extend(dataProtocols, {
                "ajax": {
                    "type": "POST",
                    "url": `{{ route('layaketik.telaah.cepat.ready') }}`,
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
                            return data.pengajuan;
                        }
                    },
                    {
                        "mData": null,
                        "render": function (data, row, type, meta) {
                            return data.mulai;
                        }
                    },
                    {
                        "mData": null,
                        "sortable": false,
                        "render": function (data, row, type, meta) {
                            
                            let btn = `
							<a href="{{ URL::to('/dashboard/layaketik/telaah/cepat/') }}/${ data.id }"
                                class="btn btn-primary shadow btn-xs px-2">
                                <i class="fas fa-edit me-1"></i> <span class="d-none d-sm-block">Telaah</span>
                            </a>`;

                            return btn;
                        }
                    }
                ]
            })

			let protocol_datatable = $('#data_protocol').DataTable(dataProtocols);

			const reloadData = idTag => {
				let text = '';
				switch(idTag){
					case '#data_protocol': text = "Reload Data Protokol"; break;
					case '#data_telaah': text = "Reload Data Telaah"; break;
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
					case 'protocol':
						if(!$.fn.DataTable.isDataTable('#data_protocol')){
							$('#data_protocol').DataTable(dataProtocols);
						} else {
							reloadData('#data_protocol')
						}
					break;
                    case 'telaah':
                    if(!$.fn.DataTable.isDataTable('#data_telaah')){
							$.extend(dataTelaah, {
                                "ajax": {
                                    "type": "POST",
                                    "url": `{{ route('layaketik.telaah.cepat.reviewed') }}`,
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
                                            return data.pengajuan;
                                        }
                                    },
                                    {
                                        "mData": null,
                                        "render": function (data, row, type, meta) {
                                            return setUsulan(data.usulan);
                                        }
                                    },
                                    {
                                        "mData": null,
                                        "sortable": false,
                                        "render": function (data, row, type, meta) {
                                            
                                            let btn = `
                                            <a href="{{ URL::to('/dashboard/layaketik/telaah/cepat/') }}/${ data.id }"
                                                class="btn btn-primary shadow btn-xs px-2">
                                                <i class="fas fa-cog me-1"></i> <span class="d-none d-sm-block">Edit</span>
                                            </a>`;

                                            return btn;
                                        }
                                    }
                                ]
                            })

							$('#data_telaah').DataTable(dataTelaah);
						} else {
							reloadData('#data_telaah')
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
        })
    </script>
@endsection