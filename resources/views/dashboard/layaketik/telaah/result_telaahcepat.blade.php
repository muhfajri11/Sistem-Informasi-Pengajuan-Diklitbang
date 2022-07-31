@extends('dashboard.layouts.app')

@section('title', "Keputusan Telaah")

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
							<a href="#telaahcepat" data-bs-toggle="tab" class="nav-table nav-link active show">Telaah Cepat</a>
						</li>
						<li class="nav-item">
							<a href="#keputusancepat" data-bs-toggle="tab" class="nav-table nav-link">Keputusan Telaah Cepat</a>
						</li>
					</ul>
					<div class="tab-content pt-4">
						<div id="telaahcepat" class="tab-pane fade active show">
                            <div class="row">
                                <div class="col-12">
                                    <div class="d-flex justify-content-between mb-4">
                                        <h3 class="font-weight-bold">Telaah Cepat</h3>
                                        <button type="button" data-table="#data_telaahcepat" class="btn btn-primary btn_refresh">
                                            <i class="fas fa-sync-alt"></i> Refresh Data
                                        </button>
                                    </div>
                                    <div class="table-responsive">
                                        <table id="data_telaahcepat" class="display" style="width: 100%">
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
                        <div id="keputusancepat" class="tab-pane fade">
                            <div class="row">
                                <div class="col-12">
                                    <div class="d-flex justify-content-between mb-4">
                                        <h3 class="font-weight-bold">Keputusan Telaah Cepat</h3>
                                        <button type="button" data-table="#data_keputusancepat" class="btn btn-primary btn_refresh">
                                            <i class="fas fa-sync-alt"></i> Refresh Data
                                        </button>
                                    </div>
                                    <div class="table-responsive">
                                        <table id="data_keputusancepat" class="display" style="width: 100%">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Judul</th>
                                                    <th>Keputusan</th>
                                                    <th>Tanggal Keputusan</th>
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
							<a href="#telaahlanjut" data-bs-toggle="tab" class="nav-lanjut nav-link active show">Telaah Lanjut</a>
						</li>
						<li class="nav-item">
							<a href="#keputusanlanjut" data-bs-toggle="tab" class="nav-lanjut nav-link">Keputusan Telaah Lanjut</a>
						</li>
					</ul>
					<div class="tab-content pt-4">
						<div id="telaahlanjut" class="tab-pane fade active show">
                            <div class="row">
                                <div class="col-12">
                                    <div class="d-flex justify-content-between mb-4">
                                        <h3 class="font-weight-bold">Telaah Lanjut</h3>
                                        <button type="button" data-table="#data_telaahlanjut" class="btn btn-primary btn_refresh">
                                            <i class="fas fa-sync-alt"></i> Refresh Data
                                        </button>
                                    </div>
                                    <div class="table-responsive">
                                        <table id="data_telaahlanjut" class="display" style="width: 100%">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Judul</th>
                                                    <th>Klasifikasi Sementara</th>
                                                    <th>Perbaikan Ke</th>
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
                        <div id="keputusanlanjut" class="tab-pane fade">
                            <div class="row">
                                <div class="col-12">
                                    <div class="d-flex justify-content-between mb-4">
                                        <h3 class="font-weight-bold">Keputusan Telaah Lanjut</h3>
                                        <button type="button" data-table="#data_keputusanlanjut" class="btn btn-primary btn_refresh">
                                            <i class="fas fa-sync-alt"></i> Refresh Data
                                        </button>
                                    </div>
                                    <div class="table-responsive">
                                        <table id="data_keputusanlanjut" class="display" style="width: 100%">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Judul</th>
                                                    <th>Keputusan</th>
                                                    <th>Perbaikan Ke</th>
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

    @include('dashboard.layaketik.components.macc_telaahcepat')

    @include('dashboard.layaketik.components.modal_detailresult')

    @include('dashboard.layaketik.components.modal_uploadhasil')

    @include('dashboard.layaketik.components.modal_detailperbaikan')

    @include('dashboard.layaketik.components.modal_detailfullboard')
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

			const dataQuickReviews = setDatatables,
                  dataQuickResults = setDatatables,
                  dataDeepReviews = setDatatables,
                  dataDeepResults = setDatatables;

            $.extend(dataQuickReviews, {
                "ajax": {
                    "type": "POST",
                    "url": `{{ route('layaketik.telaah.cepat.ready', 1) }}`,
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
                            <div class="btn-group">
                                <button data-id="${ data.id_ }" data-table="data_telaahcepat"
                                    class="btn btn-primary shadow btn-xs px-2"
                                    data-bs-toggle="modal" data-bs-target="#macc_telaahcepat">
                                    <i class="fas fa-file-check me-1"></i> <span class="d-none d-sm-block">Acc</span>
                                </button>
                                <div class="btn-group">
                                    <button id="btnGroupDrop1" type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown"></button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="{{ URL::to('/dashboard/layaketik/telaah/cepat/result/list/') }}/${ data.id }"
                                            target="_blank">
                                            <i class="fas fa-eye me-1"></i> Telaah Cepat
                                        </a>
                                    </div>
                                </div>
                            </div>`;

                            return btn;
                        }
                    }
                ]
            })

			let quickreviews_datatable = $('#data_telaahcepat').DataTable(dataQuickReviews);

            $.extend(dataDeepReviews, {
                "ajax": {
                    "type": "POST",
                    "url": `{{ route('layaketik.telaah.lanjut.result.ready') }}`,
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
                            return setUsulan(data.status);
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
                        "sortable": false,
                        "render": function (data, row, type, meta) {
                            
                            let btn = `
                            <div class="btn-group">
                                <button data-id="${ data.rev }" data-lanjut="1" data-table="data_telaahlanjut"
                                    class="btn btn-primary shadow btn-xs px-2"
                                    data-bs-toggle="modal" data-bs-target="#macc_telaahcepat">
                                    <i class="fas fa-file-check me-1"></i> <span class="d-none d-sm-block">Acc</span>
                                </button>
                                <div class="btn-group">
                                    <button id="btnGroupDrop1" type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown"></button>
                                    <div class="dropdown-menu">
                                        <a href="{{ URL::to('/dashboard/layaketik/revision/protocol/view/') }}/${ data.id }/1"
                                            class="dropdown-item" target="_blank">
                                            <i class="fas fa-eye me-1"></i> Detail Revision
                                        </a>
                                        <button class="dropdown-item" data-id="${data.rev}"
                                            data-bs-toggle="modal" data-bs-target="#modal_detailperbaikan">
                                            <i class="fas fa-eye me-1"></i> Catatan
                                        </button>
                                    </div>
                                </div>
                            </div>`;

                            return btn;
                        }
                    }
                ]
            })

            let deepreviews_datatable = $('#data_telaahlanjut').DataTable(dataDeepReviews);

			const reloadData = idTag => {
				let text = '';
				switch(idTag){
					case '#data_telaahcepat': text = "Reload Data Telaah Cepat"; break;
                    case '#data_keputusancepat': text = "Reload Data Hasil Telaah Cepat"; break;
                    case '#data_telaahlanjut': text = "Reload Data Telaah Lanjut"; break;
                    case '#data_keputusanlanjut': text = "Reload Data Hasil Telaah Lanjut"; break;
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
					case 'telaahcepat':
						if(!$.fn.DataTable.isDataTable('#data_telaahcepat')){
							$('#data_telaahcepat').DataTable(dataQuickReviews);
						} else {
							reloadData('#data_telaahcepat')
						}
					break;
                    case 'telaahlanjut':
						if(!$.fn.DataTable.isDataTable('#data_telaahlanjut')){
							$('#data_telaahlanjut').DataTable(dataDeepReviews);
						} else {
							reloadData('#data_telaahlanjut')
						}
					break;
					case 'keputusancepat':
						if(!$.fn.DataTable.isDataTable('#data_keputusancepat')){
							$.extend(dataQuickResults, {
                                "ajax": {
                                    "type": "POST",
                                    "url": `{{ route('layaketik.telaah.cepat.result.all') }}`,
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
										return setUsulan(data.status);
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
										
                                        if(data.status == 'fullboard'){
                                            btn = `
                                            <div class="btn-group">
                                                <button data-id="${ data.id }"
                                                    class="btn btn-primary shadow btn-xs px-2"
                                                    data-bs-toggle="modal" data-bs-target="#modal_fullboard">
                                                    <i class="fas fa-eye me-1"></i> <span class="d-none d-sm-block">Fullboard</span>
                                                </button>
                                                <div class="btn-group">
                                                    <button id="btnGroupDrop1" type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown"></button>
                                                    <div class="dropdown-menu">
                                                        <button data-id="${ data.id }" data-rev="0"
                                                            class="dropdown-item"
                                                            data-bs-toggle="modal" data-bs-target="#modal_detailresult">
                                                            <i class="fas fa-eye me-1"></i> Detail
                                                        </button>
                                                        <a class="dropdown-item" href="{{ URL::to('/dashboard/layaketik/telaah/cepat/result/list/') }}/${ data.id }"
                                                            target="_blank">
                                                            <i class="fas fa-eye me-1"></i> Telaah Cepat
                                                        </a>
                                                        <button data-id="${ data.id }" data-rev="0" data-table="data_keputusancepat"
                                                            class="dropdown-item"
                                                            data-bs-toggle="modal" data-bs-target="#modal_surathasil">
                                                            <i class="fas fa-file-alt me-1"></i> Upload Surat
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>`;
                                        } else {
                                            btn = `
                                            <div class="btn-group">
                                                <button data-id="${ data.id }"
                                                    class="btn btn-primary shadow btn-xs px-2"
                                                    data-bs-toggle="modal" data-bs-target="#modal_detailresult">
                                                    <i class="fas fa-eye me-1"></i> <span class="d-none d-sm-block">Detail</span>
                                                </button>
                                                <div class="btn-group">
                                                    <button id="btnGroupDrop1" type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown"></button>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item" href="{{ URL::to('/dashboard/layaketik/telaah/cepat/result/list/') }}/${ data.id }"
                                                            target="_blank">
                                                            <i class="fas fa-eye me-1"></i> Telaah Cepat
                                                        </a>
                                                        <button data-id="${ data.id }" data-rev="0" data-table="data_keputusancepat"
                                                            class="dropdown-item"
                                                            data-bs-toggle="modal" data-bs-target="#modal_surathasil">
                                                            <i class="fas fa-file-alt me-1"></i> Upload Surat
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

							$('#data_keputusancepat').DataTable(dataQuickResults);
						} else {
							reloadData('#data_keputusancepat')
						}
					break;
                    case 'keputusanlanjut':
						if(!$.fn.DataTable.isDataTable('#data_keputusanlanjut')){
							$.extend(dataDeepResults, {
                                "ajax": {
                                    "type": "POST",
                                    "url": `{{ route('layaketik.telaah.lanjut.result.all') }}`,
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
										return setUsulan(data.status);
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
									"sortable": false,
									"render": function (data, row, type, meta) {
										let btn;
										
                                        if(data.status == 'fullboard'){
                                            btn = `
                                            <div class="btn-group">
                                                <button data-id="${ data.id }"
                                                    class="btn btn-primary shadow btn-xs px-2"
                                                    data-bs-toggle="modal" data-bs-target="#modal_detailfullboard">
                                                    <i class="fas fa-eye me-1"></i> <span class="d-none d-sm-block">Fullboard</span>
                                                </button>
                                                <div class="btn-group">
                                                    <button id="btnGroupDrop1" type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown"></button>
                                                    <div class="dropdown-menu">
                                                        <button data-id="${ data.id }" data-rev="${ data.revision }"
                                                            class="dropdown-item"
                                                            data-bs-toggle="modal" data-bs-target="#modal_detailresult">
                                                            <i class="fas fa-eye me-1"></i> Detail Keputusan
                                                        </button>
                                                        <a href="{{ URL::to('/dashboard/layaketik/revision/protocol/view/') }}/${ data.id }/1"
                                                            class="dropdown-item" target="_blank">
                                                            <i class="fas fa-eye me-1"></i> Detail Revision
                                                        </a>
                                                        <button data-id="${ data.id }" data-rev="${data.revision}" data-lanjut="1" data-table="data_keputusanlanjut"
                                                            class="dropdown-item"
                                                            data-bs-toggle="modal" data-bs-target="#modal_surathasil">
                                                            <i class="fas fa-file-alt me-1"></i> Upload Surat
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>`;
                                        } else {
                                            btn = `
                                            <div class="btn-group">
                                                <button data-id="${ data.id }"
                                                    class="btn btn-primary shadow btn-xs px-2"
                                                    data-bs-toggle="modal" data-bs-target="#modal_detailresult">
                                                    <i class="fas fa-eye me-1"></i> <span class="d-none d-sm-block">Detail</span>
                                                </button>
                                                <div class="btn-group">
                                                    <button id="btnGroupDrop1" type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown"></button>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item" href="{{ URL::to('/dashboard/layaketik/telaah/cepat/result/list/') }}/${ data.id }"
                                                            target="_blank">
                                                            <i class="fas fa-eye me-1"></i> Telaah Cepat
                                                        </a>
                                                        <button data-id="${ data.id }" data-rev="${data.revision}" data-lanjut="1" data-table="data_keputusanlanjut"
                                                            class="dropdown-item"
                                                            data-bs-toggle="modal" data-bs-target="#modal_surathasil">
                                                            <i class="fas fa-file-alt me-1"></i> Upload Surat
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

							$('#data_keputusanlanjut').DataTable(dataDeepResults);
						} else {
							reloadData('#data_keputusanlanjut')
						}
					break;
				}
			}

            $('.nav-table, .nav-lanjut').on('shown.bs.tab', function (event) {
				const active = event.target, // newly activated tab
					previousActive = event.relatedTarget // previous active tab

				let id_active = $(active).attr('href'),
					id_previousActive = $(previousActive).attr('href'),
					data_active = $($(active).attr('href')),
					data_previousActive = $($(previousActive).attr('href'))

				id_active = id_active.split('#')[1],
				id_previousActive = id_previousActive.split('#')[1]
                console.log(id_active)
				checkDatatable(id_active)
			})

            $('.tab-content').on('click', '.btn_refresh', function(e){
				e.preventDefault();
				const id_elm = $(this).data('table');

				reloadData(id_elm);
			})

            $(document).on('change', '.form-daftar', function(e) {
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

            $('#macc_telaahcepat').on('show.bs.modal', function (e) {
                const modal = $(this),
                      id    = $(e.relatedTarget).data('id'),
                      table    = $(e.relatedTarget).data('table'),
                      lanjut = $(e.relatedTarget).data('lanjut');

                console.log(lanjut);

                if(lanjut){
                    modal.find('.lanjut_status').removeClass('d-none')
                    modal.find('.lanjut_revision').removeClass('d-none')

                    modal.find('form').attr('data-table', table);
                    modal.find('form').attr('data-lanjut', lanjut);
                    $.ajax({
                        url: "{{ route('layaketik.telaah.revision.detail') }}",
                        data: {id: id},
                        type: 'POST',
                        async:false,
                        dataType: 'json'
                    }).done(function (data) {
                        if(data.success){
                            const status = ['review', 'pay', 'accept'],
                                btnShowEviden = `
                                    <button class="btn btn-secondary btn-xs" data-fancybox>
                                    </button>`;
                            let check;

                            modal.find('input[name="id"]').val(id)
                        
                            modal.find('#judul_msg').html(data.get.research.judul)
                            modal.find('#ketua_msg').html(data.get.research.ketua)
                            modal.find('#institusi_msg').html(data.get.research.institution? data.get.research.institution.name : "Tidak ada")
                            modal.find('#mail_msg').html(data.get.user.email)
                            modal.find('#status_msg').html(setUsulan(data.get.result_review.status))
                            modal.find('#revision_msg').html(data.get.revision)
                        } else {
                            alertError("Terjadi Kesalahan", data.msg)
                        }
                    }).fail(function(data){
                        resp = JSON.parse(data.responseText)
                        alertError("Terjadi Kesalahan", resp.message)
                        console.log("error");
                    }); 
                } else {
                    modal.find('.lanjut_status').addClass('d-none')
                    modal.find('.lanjut_revision').addClass('d-none')

                    modal.find('form').attr('data-table', table);
                    modal.find('form').removeAttr('data-lanjut');

                    $.ajax({
                        url: "{{ route('layaketik.get') }}",
                        data: {id: id},
                        type: 'POST',
                        async:false,
                        dataType: 'json'
                    }).done(function (data) {
                        if(data.success){
                            const status = ['review', 'pay', 'accept'],
                                btnShowEviden = `
                                    <button class="btn btn-secondary btn-xs" data-fancybox>
                                    </button>`;
                            let check;

                            modal.find('input[name="id"]').val(id)
                        
                            modal.find('#judul_msg').html(data.get.research.judul)
                            modal.find('#ketua_msg').html(data.get.research.ketua)
                            modal.find('#institusi_msg').html(data.get.research.institution? data.get.research.institution.name : "Tidak ada")
                            modal.find('#mail_msg').html(data.get.user.email)
                        } else {
                            alertError("Terjadi Kesalahan", data.msg)
                        }
                    }).fail(function(data){
                        resp = JSON.parse(data.responseText)
                        alertError("Terjadi Kesalahan", resp.message)
                        console.log("error");
                    }); 
                }
            })

            $('#macc_telaahcepat').on('hide.bs.modal', function (e) {
                const modal = $(this);

                modal.find('form')[0].reset()

                modal.find('button[data-fancybox]').prop('disabled', true)
				modal.find('button[data-fancybox]').removeAttr('href')
				modal.find('button[data-fancybox]').removeClass('btn-secondary')
				modal.find('button[data-fancybox]').addClass('btn-dark')
				modal.find('button[data-fancybox]').removeAttr('data-type');
                
                modal.find("select[name=status]").val('').change();
            })

            $('#modal_detailresult').on('show.bs.modal', function (e) {
                const modal = $(this),
                      id    = $(e.relatedTarget).data('id');

                $.ajax({
                    url: "{{ route('layaketik.telaah.result.detail') }}",
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
                        modal.find('#status_view').html(setUsulan(data.get.status))
                        modal.find('#revision_view').html(data.get.revision)
                        modal.find('#created_view').html(data.get.created_at)

                        if(data.get.sertifikat_layaketik){
							htmlBtn = $(btnShow).attr('href', data.get.sertifikat_layaketik)

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

            $('#modal_surathasil').on('show.bs.modal', function (e) {
                const modal = $(this),
                      id    = $(e.relatedTarget).data('id');

                $.ajax({
                    url: "{{ route('layaketik.telaah.result.detail') }}",
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
                                    Buka
                                </button>`;
                        modal.find('input[name=id]').val(id)

                        modal.find('#judul_msg').html(data.get.research.judul)
                        modal.find('#ketua_msg').html(data.get.research.ketua)
                        modal.find('#institusi_msg').html(data.get.institution?data.get.institution.name:"Tidak ada")
                        modal.find('#mail_msg').html(data.get.user.email)
                        modal.find('.revisionstatus_msg').html(`Revisi (${data.get.revision})`)
                        modal.find('.status_msg').html(setUsulan(data.get.status))

                        if(data.get.sertifikat_layaketik){
							htmlBtn = $(btnShow).attr('href', data.get.sertifikat_layaketik)

							modal.find('.btn_surat').html(htmlBtn)
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

            $('#modal_surathasil').on('hide.bs.modal', function (e) {
                const modal = $(this);

                modal.find('form')[0].reset()

                modal.find('button[data-fancybox]').prop('disabled', true)
                modal.find('button[data-fancybox]').removeAttr('href')
                modal.find('button[data-fancybox]').removeClass('btn-secondary')
                modal.find('button[data-fancybox]').addClass('btn-dark')
                modal.find('button[data-fancybox]').removeAttr('data-type');

                modal.find('.btn_surat').html('');
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

            $('#modal_detailfullboard').on('show.bs.modal', function (e) {
                const modal = $(this),
                      id    = $(e.relatedTarget).data('id');

                $.ajax({
                    url: "{{ route('layaketik.telaah.fullboard.detail') }}",
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
                        modal.find('#revision_view').html(data.get.result_review.revision)
                        modal.find('#created_view').html(data.get.created_at)
                        modal.find('#datetime_view').html(`${data.get.tanggal}, ${data.get.jam} WIB`)
                        modal.find('#tempat_view').html(data.get.tempat)

                        if(data.get.surat_pemberitahuan){
							htmlBtn = $(btnShow).attr('href', data.get.surat_pemberitahuan)

							modal.find('#surat_view').html(htmlBtn)
						} else {
							modal.find('#surat_view').html('<p class="font-w600">Tidak Ada Surat</p>')
						}
					} else {
						alertError("Terjadi Kesalahan", data.msg)
                        modal.modal('hide')
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

            $('#acc_telaahcepat').validate({
                ignore : [],
                rules:{
                    status:{ required: true },
                    keterangan:{ required: false, alphanumeric: true },
                    sertifikat_layaketik: { required: false, extension: "pdf", filesize : 1 }
				},
				submitHandler: function (form) {
                    const dataForm = new FormData(form),
                          table = $(form).data('table'),
                          lanjut = $(form).data('lanjut');

                    consoleForm(dataForm)

                    let link_store = lanjut? 
                        "{{ route('layaketik.telaah.lanjut.result.store') }}":
                        "{{ route('layaketik.telaah.cepat.result.store') }}";

                    Swal.fire({
                        title: `Keputusan anda sudah benar?`,
                        text: `Periksa kembali data anda.`,
                        showCancelButton: true,
                        confirmButtonText: `Save`
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $.ajax({
                                url: link_store,
                                method: 'POST',
                                data: dataForm,
                                async: false,
                                processData: false,
                                contentType: false,
                                cache: false,
                                dataType: 'json',
                                enctype: 'multipart/form-data',
                                beforeSend: function(){
                                    $(form).closest('.modal').modal('hide');
                                    $('#preloader').removeClass('d-none');
                                    $('#main-wrapper').removeClass('show');
                                }
                            }).done(function (data) {						
                                if(data.success){
                                    alertSuccess("Berhasil", data.msg)
                                    reloadData(`#${table}`)
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
				}
			})

            $('#upload_surathasil').validate({
                ignore : [],
                rules:{
                    sertifikat_layaketik: { required: true, extension: "pdf", filesize : 1 }
				},
				submitHandler: function (form) {
                    const dataForm = new FormData(form),
                          table = $(form).data('table');

                    Swal.fire({
                        title: `Surat yang anda lampirkan sudah benar?`,
                        text: `Periksa kembali data anda.`,
                        showCancelButton: true,
                        confirmButtonText: `Save`
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $.ajax({
                                url: "{{ route('layaketik.telaah.cepat.result.surat') }}",
                                method: 'POST',
                                data: dataForm,
                                async: false,
                                processData: false,
                                contentType: false,
                                cache: false,
                                dataType: 'json',
                                enctype: 'multipart/form-data',
                                beforeSend: function(){
                                    $(form).closest('.modal').modal('hide');
                                    $('#preloader').removeClass('d-none');
                                    $('#main-wrapper').removeClass('show');
                                }
                            }).done(function (data) {						
                                if(data.success){
                                    alertSuccess("Berhasil", data.msg)
                                    reloadData(`#${table}`)
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
				}
			})
        })
    </script>
@endsection

