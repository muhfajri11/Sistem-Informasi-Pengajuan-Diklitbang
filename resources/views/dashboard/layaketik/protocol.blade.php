@extends('dashboard.layouts.app')

@section('title', "Protokol Penelitian")

@section('style')
	<link rel="stylesheet" href="{{ asset('assets/vendor/select2/css/select2.min.css') }}">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" href="{{ asset('assets/vendor/fancyapps/fancy.css') }}">

    <style>
        .ck-balloon-panel{z-index:9999 !important}
    </style>
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
							<a href="#selfassesment" data-bs-toggle="tab" class="nav-table nav-link">Self Assesment</a>
						</li>
					</ul>
					<div class="tab-content pt-4">
						<div id="protocol" class="tab-pane fade active show">
							<div class="row">
								<div class="col-12">
									<div class="d-flex justify-content-between mb-4">
										<h3 class="font-weight-bold">Protokol Etik</h3>
										<div class="btn-group">
											<button type="button" data-table="#data_protocol" class="btn btn-primary btn_refresh">
												<i class="fas fa-sync-alt"></i> Refresh Data
											</button>
											<div class="btn-group">
												<button id="btnGroupDrop1" type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown"></button>
												<div class="dropdown-menu">
													<a class="dropdown-item" href="{{ route('layaketik.protocol.form') }}">
														<i class="fas fa-file-alt me-2"></i> Tambah Protokol
													</a>
												</div>
											</div>
										</div>
									</div>
									<div class="table-responsive">
										<table id="data_protocol" class="display" style="width: 100%">
											<thead>
												<tr>
													<th>#</th>
													<th>Judul</th>
													<th>Mulai</th>
                                                    <th>Tanggal Protokol</th>
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
						<div id="selfassesment" class="tab-pane fade">
							<div class="row">
								<div class="col-12">
									<div class="d-flex justify-content-between mb-4">
										<h3 class="font-weight-bold">Self Assesment</h3>
                                        <div class="btn-group">
											<button type="button" data-table="#data_selfassesment" class="btn btn-primary btn_refresh">
												<i class="fas fa-sync-alt"></i> Refresh Data
											</button>
											<div class="btn-group">
												<button id="btnGroupDrop1" type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown"></button>
												<div class="dropdown-menu">
													<a class="dropdown-item" href="{{ route('layaketik.protocol.self_assesment') }}">
														<i class="fas fa-file-alt me-2"></i> Tambah Self Assesment
													</a>
												</div>
											</div>
										</div>
									</div>
									<div class="table-responsive">
										<table id="data_selfassesment" class="display" style="width: 100%">
											<thead>
												<tr>
													<th>#</th>
													<th>Judul</th>
													<th>Mulai</th>
													<th>Tanggal Self Assesment</th>
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

			const dataProtocols = setDatatables,
                  dataSelfAssesments = setDatatables

            $.extend(dataProtocols, {
                "ajax": {
                    "type": "POST",
                    "url": `{{ route('layaketik.protocol.all') }}`,
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
                            return data.start_date;
                        }
                    },
                    {
                        "mData": null,
                        "render": function (data, row, type, meta) {
                            return data.created_at;
                        }
                    },
                    {
                        "mData": null,
                        "sortable": false,
                        "render": function (data, row, type, meta) {
                            
                            let btn = `
							<div class="btn-group">`;
								
								if(data.edit){
									btn += `
								<a href="{{ URL::to('/dashboard/layaketik/protocol/view/') }}/${ data.id }"
									class="btn btn-primary shadow btn-xs px-2">
									<i class="fas fa-eye me-1"></i> <span class="d-none d-sm-block">View</span>
								</a>
								<div class="btn-group">
                                    <button id="btnGroupDrop1" type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown"></button>
                                    <div class="dropdown-menu">`;
								} else {
									btn += `
								<button data-hash="${data.id}"
									class="btn btn-primary shadow btn-xs px-2 btn_acc">
									<i class="fas fa-file-check me-1"></i><span class="d-none d-sm-block">Review</span>
								</button>
								<div class="btn-group">
                                    <button id="btnGroupDrop1" type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown"></button>
                                    <div class="dropdown-menu">
										<a href="{{ URL::to('/dashboard/layaketik/protocol/view/') }}/${ data.id }"
											class="dropdown-item">
											<i class="fas fa-eye me-1"></i> View
										</a>
										<a href="{{ URL::to('/dashboard/layaketik/protocol/edit/') }}/${data.id}"
											class="dropdown-item">
											<i class="fas fa-cog me-1"></i> Edit
										</a>`;
								}

								btn += `
										<a href="{{ URL::to('/dashboard/layaketik/protocol/print/') }}/${data.id}"
											class="dropdown-item">
											<i class="fas fa-print me-1"></i> Print
										</a>
                                    </div>
                                </div>
							</div>`;

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
					case '#data_selfassesment': text = "Reload Data Self Assesment"; break;
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
					case 'selfassesment':
						if(!$.fn.DataTable.isDataTable('#data_selfassesment')){
							$.extend(dataSelfAssesments, {
                                "ajax": {
                                    "type": "POST",
                                    "url": `{{ route('layaketik.protocol.selfassesment.all') }}`,
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
										return data.start_date;
									}
								},
								{
									"mData": null,
									"render": function (data, row, type, meta) {
										return data.created_at;
									}
								},
								{
									"mData": null,
									"sortable": false,
									"render": function (data, row, type, meta) {
										let btn;
										
										if(data.edit){
											btn = `
											<a href="{{ URL::to('/dashboard/layaketik/protocol/self_assesment/view/') }}/${data.id}"
												class="btn btn-primary shadow btn-xs px-2">
												<i class="fas fa-eye me-1"></i> <span class="d-none d-sm-block">View</span>
											</a>`;
										} else {
											btn = `
											<div class="btn-group">
												<a href="{{ URL::to('/dashboard/layaketik/protocol/self_assesment/view/') }}/${data.id}"
													class="btn btn-primary shadow btn-xs px-2">
													<i class="fas fa-eye me-1"></i> <span class="d-none d-sm-block">View</span>
												</a>
												<a href="{{ URL::to('/dashboard/layaketik/protocol/self_assesment/edit/') }}/${data.id}"
													class="btn btn-primary shadow btn-xs px-2">
													<i class="fas fa-cog me-1"></i> <span class="d-none d-sm-block">Edit</span>
												</a>
											</div>`;
										}

										return btn;
									}
								}
							]
                            })

							$('#data_selfassesment').DataTable(dataSelfAssesments);
						} else {
							reloadData('#data_selfassesment')
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

			$('#data_protocol').on('click', '.btn_acc', function(e){
				Swal.fire({
                        title: `Protokol anda siap ditelaah?`,
                        text: "Periksa kembali data anda apakah sudah sesuai.",
                        showCancelButton: true,
                        confirmButtonText: `Save`
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $.ajax({
                                url: "{{ route('layaketik.protocol.ready') }}",
                                method: 'POST',
								data: {hash: $(this).data('hash')},
                                async: false,
                                beforeSend: function(){
                                    $('#preloader').removeClass('d-none');
                                    $('#main-wrapper').removeClass('show');
                                }
                            }).done(function (data) {						
                                if(data.success){
                                    alertSuccess("Berhasil", data.msg)
                                    reloadData('#data_protocol')
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