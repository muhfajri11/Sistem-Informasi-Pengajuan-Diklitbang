@extends('dashboard.layouts.app')

@section('title', "Keputusan Perbaikan Protokol")

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
							<a href="#telaahlanjut" data-bs-toggle="tab" class="nav-table nav-link active show">Telaah Lanjut</a>
						</li>
						<li class="nav-item">
							<a href="#keputusanperbaikan" data-bs-toggle="tab" class="nav-table nav-link">Keputusan Perbaikan</a>
						</li>
					</ul>
					<div class="tab-content pt-4">
						<div id="telaahlanjut" class="tab-pane fade active show">
                            <div class="row">
                                <div class="col-12">
                                    <div class="d-flex justify-content-between mb-4">
                                        <h3 class="font-weight-bold">Protokol Telaah Lanjut</h3>
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
                                                    <th>Perbaikan Ke</th>
                                                    <th>Klasifikasi</th>
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
                        <div id="keputusanperbaikan" class="tab-pane fade">
                            <div class="row">
                                <div class="col-12">
                                    <div class="d-flex justify-content-between mb-4">
                                        <h3 class="font-weight-bold">Keputusan Perbaikan</h3>
                                        <button type="button" data-table="#data_keputusanperbaikan" class="btn btn-primary btn_refresh">
                                            <i class="fas fa-sync-alt"></i> Refresh Data
                                        </button>
                                    </div>
                                    <div class="table-responsive">
                                        <table id="data_keputusanperbaikan" class="display" style="width: 100%">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Judul</th>
                                                    <th>Perbaikan Ke</th>
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

    @include('dashboard.layaketik.components.modal_setperbaikan')

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

			const dataDeepReviews = setDatatables,
                  dataRevisions = setDatatables;

            $.extend(dataDeepReviews, {
                "ajax": {
                    "type": "POST",
                    "url": `{{ route('layaketik.telaah.revision.ready') }}`,
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
                                <button data-id="${ data.id }"
                                    class="btn btn-primary shadow btn-xs px-2"
                                    data-bs-toggle="modal" data-bs-target="#modal_setperbaikan">
                                    <i class="fas fa-file-check me-1"></i> <span class="d-none d-sm-block">Revision</span>
                                </button>
                                <div class="btn-group">
                                    <button id="btnGroupDrop1" type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown"></button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="{{ URL::to('/dashboard/layaketik/telaah/lanjut/list/') }}/${ data.id }"
                                            target="_blank">
                                            <i class="fas fa-eye me-1"></i> Telaah Lanjut
                                        </a>
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
					case '#data_telaahlanjut': text = "Reload Data Telaah Lanjut"; break;
                    case '#data_keputusanperbaikan': text = "Reload Data Keputusan Perbaikan"; break;
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
					case 'telaahlanjut':
						if(!$.fn.DataTable.isDataTable('#data_telaahlanjut')){
							$('#data_telaahlanjut').DataTable(dataDeepReviews);
						} else {
							reloadData('#data_telaahlanjut')
						}
					break;
					case 'keputusanperbaikan':
						if(!$.fn.DataTable.isDataTable('#data_keputusanperbaikan')){
							$.extend(dataRevisions, {
                                "ajax": {
                                    "type": "POST",
                                    "url": `{{ route('layaketik.telaah.revision.all') }}`,
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
										
                                        let btn = `
                                            <div class="btn-group">
                                                <button data-id="${ data.id }" data-rev="${ data.rev }"
                                                    class="btn btn-primary shadow btn-xs px-2"
                                                    data-bs-toggle="modal" data-bs-target="#modal_setperbaikan">
                                                    <i class="fas fa-cog me-1"></i> <span class="d-none d-sm-block">Edit</span>
                                                </button>
                                                <div class="btn-group">
                                                    <button id="btnGroupDrop1" type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown"></button>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item" data-id="${data.rev}"
                                                            data-bs-toggle="modal" data-bs-target="#modal_detailperbaikan"
                                                            target="_blank">
                                                            <i class="fas fa-eye me-1"></i> Detail
                                                        </a>
                                                        <a class="dropdown-item" href="{{ URL::to('/dashboard/layaketik/telaah/cepat/result/list/') }}/${ data.id }"
                                                            target="_blank">
                                                            <i class="fas fa-eye me-1"></i> Telaah Lanjut
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>`;

										return btn;
									}
								}
							]
                            })

							$('#data_keputusanperbaikan').DataTable(dataRevisions);
						} else {
							reloadData('#data_keputusanperbaikan')
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

            $('#modal_setperbaikan').on('show.bs.modal', function (e) {
                const modal = $(this),
                      id    = $(e.relatedTarget).data('id'),
                      rev = $(e.relatedTarget).data('rev');

                $.ajax({
                    url: "{{ route('layaketik.telaah.result.detail') }}",
                    data: {id: id},
                    type: 'POST',
                    async:false,
                    dataType: 'json'
                }).done(function (data) {
                    if(data.success){
                        let check;

                        if(rev){
                            $.ajax({
                                url: "{{ route('layaketik.telaah.revision.detail') }}",
                                data: {id: rev},
                                type: 'POST',
                                async:false,
                                dataType: 'json'
                            }).done(function (data) {
                                if(data.success){
                                    const btnShow = `
                                        <button class="btn btn-secondary btn-xs" data-type="pdf" data-fancybox>
                                            Buka
                                        </button>`;

                                    modal.find('textarea[name="resume_catatan"]').val(data.get.resume_catatan)

                                    if(data.get.surat_perbaikan){
                                        htmlBtn = $(btnShow).attr('href', data.get.surat_perbaikan)

                                        modal.find('.surat_view').html(htmlBtn)
                                    }
                                } else {
                                    alertError("Terjadi Kesalahan", data.msg)
                                }
                            }).fail(function(data){
                                resp = JSON.parse(data.responseText)
                                alertError("Terjadi Kesalahan", resp.message)
                                console.log("error");
                            }); 
                        }

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
            })

            $('#modal_setperbaikan').on('hide.bs.modal', function (e) {
                const modal = $(this);

                modal.find('form')[0].reset()

                modal.find('button[data-fancybox]').prop('disabled', true)
				modal.find('button[data-fancybox]').removeAttr('href')
				modal.find('button[data-fancybox]').removeClass('btn-secondary')
				modal.find('button[data-fancybox]').addClass('btn-dark')
				modal.find('button[data-fancybox]').removeAttr('data-type');

                modal.find('.surat_view').html('')
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

            $('#set_perbaikan').validate({
                ignore : [],
                rules:{
                    resume:{ required: true, alphanumeric: true },
                    surat_perbaikan: { required: false, extension: "pdf", filesize : 1 }
				},
				submitHandler: function (form) {
                    const dataForm = new FormData(form);

                    consoleForm(dataForm)

                    Swal.fire({
                        title: `Keputusan anda sudah benar?`,
                        text: `Periksa kembali data anda.`,
                        showCancelButton: true,
                        confirmButtonText: `Save`
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $.ajax({
                                url: "{{ route('layaketik.telaah.revision.set') }}",
                                method: 'POST',
                                data: dataForm,
                                async: false,
                                processData: false,
                                contentType: false,
                                cache: false,
                                dataType: 'json',
                                enctype: 'multipart/form-data',
                                beforeSend: function(){
                                    $('#preloader').removeClass('d-none');
                                    $('#main-wrapper').removeClass('show');
                                }
                            }).done(function (data) {						
                                if(data.success){
                                    alertSuccess("Berhasil", data.msg)
                                    reloadData('#data_telaahcepat')
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

