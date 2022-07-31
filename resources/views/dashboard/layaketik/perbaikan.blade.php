@extends('dashboard.layouts.app')

@section('title', "Perbaikan Protokol")

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
							<a href="#revision" data-bs-toggle="tab" class="nav-table nav-link active show">Perbaikan</a>
						</li>
						<li class="nav-item">
							<a href="#revisionprotocol" data-bs-toggle="tab" class="nav-table nav-link">Hasil Perbaikan</a>
						</li>
					</ul>
					<div class="tab-content pt-4">
						<div id="revision" class="tab-pane fade active show">
                            <div class="row">
                                <div class="col-12">
                                    <div class="d-flex justify-content-between mb-4">
                                        <h3 class="font-weight-bold">Protokol yang perlu perbaikan</h3>
                                        <button type="button" data-table="#data_revision" class="btn btn-primary btn_refresh">
                                            <i class="fas fa-sync-alt"></i> Refresh Data
                                        </button>
                                    </div>
                                    <div class="table-responsive">
                                        <table id="data_revision" class="display" style="width: 100%">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Judul</th>
                                                    <th>Perbaikan Ke</th>
                                                    <th>Klasifikasi Sementara</th>
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
                        <div id="revisionprotocol" class="tab-pane fade">
                            <div class="row">
                                <div class="col-12">
                                    <div class="d-flex justify-content-between mb-4">
                                        <h3 class="font-weight-bold">Protokol yang sudah diperbaiki</h3>
                                        <button type="button" data-table="#data_revisionprotocol" class="btn btn-primary btn_refresh">
                                            <i class="fas fa-sync-alt"></i> Refresh Data
                                        </button>
                                    </div>
                                    <div class="table-responsive">
                                        <table id="data_revisionprotocol" class="display" style="width: 100%">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Judul</th>
                                                    <th>Perbaikan Ke</th>
                                                    <th>Tanggal Perbaikan</th>
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
    @include('dashboard.layaketik.components.modal_detailperbaikan')
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

			const dataRevisions = setDatatables,
                  dataRevisionProtocols = setDatatables;

            $.extend(dataRevisions, {
                "ajax": {
                    "type": "POST",
                    "url": `{{ route('layaketik.revision.protocol.ready') }}`,
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
                            return data.revision;
                        }
                    },
                    {
                        "mData": null,
                        "render": function (data, row, type, meta) {
                            return setUsulan(data.status);
                        }
                    },
                    {
                        "mData": null,
                        "sortable": false,
                        "render": function (data, row, type, meta) {
                            
                            let btn = `
                            <div class="btn-group">
                                <a href="{{ URL::to('/dashboard/layaketik/revision/protocol/form/') }}/${ data.id }"
                                    class="btn btn-primary shadow btn-xs px-2">
                                    <i class="fas fa-edit me-1"></i> <span class="d-none d-sm-block">Perbaiki</span>
                                </a>
                                <div class="btn-group">
                                    <button id="btnGroupDrop1" type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown"></button>
                                    <div class="dropdown-menu">
                                        <button class="dropdown-item" data-id="${data.rev}"
                                            data-bs-toggle="modal" data-bs-target="#modal_detailperbaikan">
                                            <i class="fas fa-eye me-1"></i> Detail
                                        </button>
                                    </div>
                                </div>
                            </div>`;

                            return btn;
                        }
                    }
                ]
            })

			let revision_datatable = $('#data_revision').DataTable(dataRevisions);

			const reloadData = idTag => {
				let text = '';
				switch(idTag){
					case '#data_revision': text = "Reload Data Telaah Lanjut"; break;
                    case '#data_revisionprotocol': text = "Reload Data Keputusan Perbaikan"; break;
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
					case 'revision':
						if(!$.fn.DataTable.isDataTable('#data_revision')){
							$('#data_revision').DataTable(dataRevisions);
						} else {
							reloadData('#data_revision')
						}
					break;
					case 'revisionprotocol':
						if(!$.fn.DataTable.isDataTable('#data_revisionprotocol')){
							$.extend(dataRevisionProtocols, {
                                "ajax": {
                                    "type": "POST",
                                    "url": `{{ route('layaketik.revision.protocol.revisioned') }}`,
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
										return data.revision;
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
                                            <div class="btn-group">
                                                <a href="{{ URL::to('/dashboard/layaketik/revision/protocol/view/') }}/${ data.id }"
                                                    class="btn btn-primary shadow btn-xs px-2">
                                                    <i class="fas fa-eye me-1"></i> <span class="d-none d-sm-block">View</span>
                                                </a>
                                                <button class="btn btn-primary shadow btn-xs px-2" data-id="${data.rev}"
                                                    data-bs-toggle="modal" data-bs-target="#modal_detailperbaikan">
                                                    <i class="fas fa-eye me-1"></i> <span class="d-none d-sm-block"> Catatan </span>
                                                </button>
                                            </div>`;
                                        } else {
                                            btn = `
                                            <div class="btn-group">
                                                <button data-hash="${data.id}"
                                                    class="btn btn-primary shadow btn-xs px-2 btn_acc">
                                                    <i class="fas fa-file-check me-1"></i><span class="d-none d-sm-block">Review</span>
                                                </button>
                                                <div class="btn-group">
                                                    <button id="btnGroupDrop1" type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown"></button>
                                                    <div class="dropdown-menu">
                                                        <a href="{{ URL::to('/dashboard/layaketik/revision/protocol/form/') }}/${ data.id }"
                                                            class="dropdown-item">
                                                            <i class="fas fa-cog me-1"></i> Edit
                                                        </a>
                                                        <a href="{{ URL::to('/dashboard/layaketik/revision/protocol/view/') }}/${ data.id }"
                                                            class="dropdown-item">
                                                            <i class="fas fa-cog me-1"></i> View Perbaikan
                                                        </a>
                                                        <button class="dropdown-item" data-id="${data.rev}"
                                                            data-bs-toggle="modal" data-bs-target="#modal_detailperbaikan">
                                                            <i class="fas fa-eye me-1"></i> Detail Catatan
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>`;
                                        }

										return btn;
									}
								}
							]
                            })

							$('#data_revisionprotocol').DataTable(dataRevisionProtocols);
						} else {
							reloadData('#data_revisionprotocol')
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

            $('#modal_detailperbaikan').on('show.bs.modal', function (e) {
                const modal = $(this),
                      id    = $(e.relatedTarget).data('id');

                $.ajax({
                    url: "{{ route('layaketik.telaah.revision.detail') }}",
                    data: {id: id},
                    type: 'POST',
                    async:false,
                    dataType: 'json',
					beforeSend: function(){
						$('#preloader').removeClass('d-none');
						$('#main-wrapper').removeClass('show');
					}
                }).done(function (data) {
                    if(data.success){
						const btnShow = `
                                <button class="btn btn-secondary btn-xs" data-type="pdf" data-fancybox>
                                    Buka Surat
                                </button>`;
                        let check;
                    
                        modal.find('#judul_view').html(data.get.research.judul)
                        modal.find('#ketua_view').html(data.get.research.ketua)
                        modal.find('#status_view').html(setUsulan(data.get.result_review.status))
                        modal.find('#revision_view').html(data.get.revision)
                        modal.find('#created_view').html(data.get.created_at)
                        modal.find('#catatan_view').html(data.get.resume_catatan)

                        if(data.get.surat_perbaikan){
							htmlBtn = $(btnShow).attr('href', data.get.surat_perbaikan)

							modal.find('#surat_view').html(htmlBtn)
						} else {
							modal.find('#surat_view').html('<p class="font-w600">Tidak Ada Surat</p>')
						}
					} else {
						alertError("Terjadi Kesalahan", data.msg)
					}

                    $('#preloader').addClass('d-none');
					$('#main-wrapper').addClass('show');
                }).fail(function(data){
                    resp = JSON.parse(data.responseText)
                    alertError("Terjadi Kesalahan", resp.message)
                    console.log("error");

                    $('#preloader').addClass('d-none');
					$('#main-wrapper').addClass('show');
                }); 
            })

            $('#data_revisionprotocol').on('click', '.btn_acc', function(e){
				Swal.fire({
                        title: `Protokol anda siap direview kembali?`,
                        text: "Periksa kembali data anda apakah sudah sesuai.",
                        showCancelButton: true,
                        confirmButtonText: `Save`
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $.ajax({
                                url: "{{ route('layaketik.revision.protocol.is_ready') }}",
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

