@extends('dashboard.layouts.app')

@section('title', "Jadwal Fullboard")

@section('style')
	<link rel="stylesheet" href="{{ asset('assets/vendor/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/pickadate/themes/default.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/pickadate/themes/default.date.css') }}">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" href="{{ asset('assets/vendor/fancyapps/fancy.css') }}">
    <link href="{{ asset('assets/vendor/datetimepicker/css/bootstrap-material-datetimepicker.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="d-block d-md-none col-12">
        <div class="card px-4 py-3">
            <h3 class="text-secondary mb-0"><i class="fas fa-calendar-alt me-2"></i> @yield('title')</h3>
        </div>
    </div>

    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="custom-tab-1">
					<ul class="nav nav-tabs">
						<li class="nav-item">
							<a href="#waiting" data-bs-toggle="tab" class="nav-table nav-link active show">Menunggu</a>
						</li>
						<li class="nav-item">
							<a href="#schedule" data-bs-toggle="tab" class="nav-table nav-link">Terjadwal</a>
						</li>
					</ul>
					<div class="tab-content pt-4">
						<div id="waiting" class="tab-pane fade active show">
                            <div class="row">
                                <div class="col-12">
                                    <div class="d-flex justify-content-between mb-4">
                                        <h3 class="font-weight-bold">Penjadwalan Fullboard</h3>
                                        <button type="button" data-table="#data_waiting" class="btn btn-primary btn_refresh">
                                            <i class="fas fa-sync-alt"></i> Refresh Data
                                        </button>
                                    </div>
                                    <div class="table-responsive">
                                        <table id="data_waiting" class="display" style="width: 100%">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Judul</th>
                                                    <th>Tanggal Keputusan</th>
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
                        <div id="schedule" class="tab-pane fade">
                            <div class="row">
                                <div class="col-12">
                                    <div class="d-flex justify-content-between mb-4">
                                        <h3 class="font-weight-bold">Fullboard Terjadwal</h3>
                                        <button type="button" data-table="#data_schedule" class="btn btn-primary btn_refresh">
                                            <i class="fas fa-sync-alt"></i> Refresh Data
                                        </button>
                                    </div>
                                    <div class="table-responsive">
                                        <table id="data_schedule" class="display" style="width: 100%">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Judul</th>
                                                    <th>Perbaikan Ke</th>
                                                    <th>Tanggal Pertemuan</th>
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
    @include('dashboard.layaketik.components.modal_fullboard')
    @include('dashboard.layaketik.components.modal_detailfullboard')
@endsection

@section('script')
	<script src="{{ asset('assets/vendor/fancyapps/fancybox.umd.js') }}"></script>
    <script src="{{ asset('assets/vendor/pickadate/picker.js') }}"></script>
    <script src="{{ asset('assets/vendor/pickadate/picker.date.js') }}"></script>
    <script src="{{ asset('assets/vendor/moment/moment.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/datetimepicker/js/bootstrap-material-datetimepicker.js') }}"></script>

    <script>
        $(document).ready(function(){

            $('.datepicker-default').pickadate({
                format: 'd mmmm yyyy',
                formatSubmit: 'yyyy-mm-dd'
            })

            $('.date_fullboard').pickadate('picker').set("min", "{{ date('Y-m-d') }}")
            $('.time_fullboard').bootstrapMaterialDatePicker({
                format: 'HH:mm',
                time: true,
                date: false
            });

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

			const dataWaitings = setDatatables,
                  dataSchedules = setDatatables;

            $.extend(dataWaitings, {
                "ajax": {
                    "type": "POST",
                    "url": `{{ route('layaketik.telaah.fullboard.ready') }}`,
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
                            return data.revision;
                        }
                    },
                    {
                        "mData": null,
                        "sortable": false,
                        "render": function (data, row, type, meta) {
                            
                            let btn = `
                            <button data-id="${ data.id }"
                                class="btn btn-primary shadow btn-xs px-2"
                                data-bs-toggle="modal" data-bs-target="#modal_setfullboard">
                                <i class="fas fa-calendar-alt me-1"></i> <span class="d-none d-sm-block">Buat Jadwal</span>
                            </button>`;

                            return btn;
                        }
                    }
                ]
            })

			let waitings_datatable = $('#data_waiting').DataTable(dataWaitings);

			const reloadData = idTag => {
				let text = '';
				switch(idTag){
					case '#data_waiting': text = "Reload Data Waiting"; break;
                    case '#data_schedule': text = "Reload Data Schedule"; break;
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
					case 'waiting':
						if(!$.fn.DataTable.isDataTable('#data_waiting')){
							$('#data_waiting').DataTable(dataWaitings);
						} else {
							reloadData('#data_waiting')
						}
					break;
					case 'schedule':
						if(!$.fn.DataTable.isDataTable('#data_schedule')){
							$.extend(dataSchedules, {
                                "ajax": {
                                    "type": "POST",
                                    "url": `{{ route('layaketik.telaah.fullboard.ready', 1) }}`,
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
										return data.pertemuan;
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
                                                data-bs-toggle="modal" data-bs-target="#modal_detailfullboard">
                                                <i class="fas fa-eye me-1"></i> <span class="d-none d-sm-block">Detail</span>
                                            </button>
                                            <button data-id="${ data.id }" data-edit="1"
                                                class="btn btn-primary shadow btn-xs px-2"
                                                data-bs-toggle="modal" data-bs-target="#modal_setfullboard">
                                                <i class="fas fa-cog me-1"></i> <span class="d-none d-sm-block">Edit</span>
                                            </button>
                                        </div>`;

										return btn;
									}
								}
							]
                            })

							$('#data_schedule').DataTable(dataSchedules);
						} else {
							reloadData('#data_schedule')
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

            $('#modal_setfullboard').on('show.bs.modal', function (e) {
                const modal = $(this),
                      id    = $(e.relatedTarget).data('id'),
                      edited    = $(e.relatedTarget).data('edit');

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
                    if(edited){
                        modal.find('form').attr('data-edit', 1);

                        $.ajax({
                            url: "{{ route('layaketik.telaah.fullboard.detail') }}",
                            data: {id: id},
                            type: 'POST',
                            async:false,
                            dataType: 'json'
                        }).done(function (data) {
                            if(data.success){
                                const btnShow = `
                                    <button class="btn btn-secondary btn-xs" data-type="pdf" data-fancybox>
                                        Buka
                                    </button>`;

                                modal.find('input[name="tempat"]').val(data.get.tempat)
                                modal.find('input[name="tanggal"]').pickadate('picker').set('select', data.get.tanggal, { format: 'yyyy-mm-dd' })
                                modal.find('input[name="jam"]').bootstrapMaterialDatePicker('setDate', moment(data.get.jam, "hh:mm:ss"));

                                if(data.get.surat_pemberitahuan){
                                    htmlBtn = $(btnShow).attr('href', data.get.surat_pemberitahuan)

                                    modal.find('#surat_view').html(htmlBtn)
                                } 
                            } else {
                                alertError("Terjadi Kesalahan", data.msg)
                            }
                        }).fail(function(data){
                            resp = JSON.parse(data.responseText)
                            alertError("Terjadi Kesalahan", resp.message)
                            console.log("error");
                        }); 
                    } else {
                        modal.find('form').removeAttr('data-edit');
                    }

                    if(data.success){
                        modal.find('input[name=id]').val(id)

                        modal.find('#judul_msg').html(data.get.research.judul)
                        modal.find('#ketua_msg').html(data.get.research.ketua)
                        modal.find('#institusi_msg').html(data.get.institution?data.get.institution.name:"Tidak ada")
                        modal.find('#mail_msg').html(data.get.user.email)
                        modal.find('.revisionstatus_msg').html(`Revisi (${data.get.revision})`)
                        modal.find('.status_msg').html(setUsulan(data.get.status))
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

            $('#modal_setfullboard').on('hide.bs.modal', function (e) {
                const modal = $(this);

                modal.find('form')[0].reset()

                modal.find('button[data-fancybox]').prop('disabled', true)
                modal.find('button[data-fancybox]').removeAttr('href')
                modal.find('button[data-fancybox]').removeClass('btn-secondary')
                modal.find('button[data-fancybox]').addClass('btn-dark')
                modal.find('button[data-fancybox]').removeAttr('data-type');

                modal.find('.btn_surat').html('');
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

            $('#set_fullboard').validate({
                ignore : [],
                rules:{
                    tempat:{ required: true, alphanumeric: true },
                    tanggal: { required: true, date: true },
                    jam:{ required: true },
                    surat_pemberitahuan: { required: false, extension: "pdf", filesize : 1 }
				},
				submitHandler: function (form) {
                    const dataForm = new FormData(form),    
                          is_edit = $(form).attr('data-edit'),
                          wording = is_edit? `Anda yakin ingin mengupdate fullboard?`: `Keputusan anda sudah benar?`;

                    dataForm.set('tanggal', dataForm.get('tanggal_submit'))
                    dataForm.delete('tanggal_submit')

                    Swal.fire({
                        title: wording,
                        text: `Periksa kembali data anda.`,
                        showCancelButton: true,
                        confirmButtonText: `Save`
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $.ajax({
                                url: "{{ route('layaketik.telaah.fullboard.set') }}",
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
                                    reloadData('#data_waiting')
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
