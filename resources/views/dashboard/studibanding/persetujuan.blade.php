@extends('dashboard.layouts.app')

@section('title', "Persetujuan Studi Banding")

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

    <div class="col-12">
        <div class="card">
            <div class="card-body">
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
                        <li class="nav-item">
                            <a href="#reject" data-bs-toggle="tab" class="nav-link">Ditolak</a>
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
                                        <table id="data_reviews" class="display" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Topik</th>
                                                    <th>Kunjungan</th>
                                                    <th>Pengunjung</th>
                                                    <th>Lampiran</th>
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
                                        <table id="data_payments" class="display" style="width:100%">
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
                                        <h3 class="font-weight-bold">
                                            Pengajuan 
                                            <span class="badge badge-pill badge-primary">
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
                                        <table id="data_accepts" class="display" style="width:100%">
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
                        <div id="reject" class="tab-pane fade">
                            <div class="row">
                                <div class="col-12">
                                    <div class="d-flex justify-content-between mb-4">
                                        <h3 class="font-weight-bold">
                                            Pengajuan
                                            <span class="badge badge-pill badge-danger">
                                                Ditolak
                                            </span>
                                        </h3>
                                        <button type="button" data-table="#data_rejects" class="btn btn-rounded btn-primary btn_refresh">
                                            <span class="btn-icon-start text-primary">
                                                <i class="fas fa-sync-alt"></i>
                                            </span> Refresh Data
                                        </button>
                                    </div>
                                    <div class="table-responsive">
                                        <table id="data_rejects" class="display" style="width:100%">
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

    @include('dashboard.studibanding.components.mdetail_studibanding')

    @include('dashboard.studibanding.components.modal_status')

    @include('dashboard.studibanding.components.modal_message')
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

            $('.datepicker-default').pickadate({
                format: 'd mmmm yyyy',
                formatSubmit: 'yyyy-mm-dd'
            })

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
                  dataAccept = setDatatables,
                  dataReject = setDatatables;

            $.extend(dataReviews, {
                "ajax": {
                    "type": "POST",
                    "url": `{{ route('studi_banding.all', ['type' => 'review', 'admin' => 1]) }}`,
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
                            const btnAttach = `
										<button 
                                            class="btn btn-secondary btn-xs ms-2" 
                                            data-fancybox 
                                            href="${data.permohonan}" data-type="pdf">
                                        Lampiran </button>`
                            return btnAttach;
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
                                            data-bs-toggle="modal" data-bs-target="#modal_sendmsg">
                                            <i class="fas fa-paper-plane me-1"></i> Kirim Pesan
                                        </button>
                                        <button class="dropdown-item" data-id="${ data.id }" data-status="${data.status}"
                                            data-table="data_reviews" data-bs-toggle="modal" data-bs-target="#modal_ubahstatus">
                                            <i class="fas fa-user-check me-1"></i> Ubah Status
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
                    case '#data_rejects': text = "Reload Data Rejects"; break;
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
                                    "url": `{{ route('studi_banding.all', ['type' => 'pay', 'admin' => 1]) }}`,
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
                                                            data-bs-toggle="modal" data-bs-target="#modal_sendmsg">
                                                            <i class="fas fa-paper-plane me-1"></i> Kirim Pesan
                                                        </button>
                                                        <button class="dropdown-item" data-id="${ data.id }" data-status="${data.status}"
                                                            data-table="data_payments" data-bs-toggle="modal" data-bs-target="#modal_ubahstatus">
                                                            <i class="fas fa-user-check me-1"></i> Ubah Status
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
                                    "url": `{{ route('studi_banding.all', ['type' => 'accept', 'admin' => 1]) }}`,
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
                                                                data-bs-toggle="modal" data-bs-target="#modal_sendmsg">
                                                                <i class="fas fa-paper-plane me-1"></i> Kirim Pesan
                                                            </button>
                                                            <button class="dropdown-item" data-id="${ data.id }" data-status="${data.status}"
                                                                data-table="data_accepts" data-bs-toggle="modal" data-bs-target="#modal_ubahstatus">
                                                                <i class="fas fa-user-check me-1"></i> Ubah Status
                                                            </button>
                                                            <button class="dropdown-item delete_studibanding" data-id="${ data.id }" data-name="${data.title}" data-from="#data_payments">
                                                                <i class="fas fa-trash me-1"></i> Hapus
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>                                                
                                                `;

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
                    case 'reject':
						if(!$.fn.DataTable.isDataTable('#data_rejects')){
                            $.extend(dataReject, {
                                "ajax": {
                                    "type": "POST",
                                    "url": `{{ route('studi_banding.all', ['type' => 'reject', 'admin' => 1]) }}`,
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
                                                                data-bs-toggle="modal" data-bs-target="#modal_sendmsg">
                                                                <i class="fas fa-paper-plane me-1"></i> Kirim Pesan
                                                            </button>
                                                            <button class="dropdown-item" data-id="${ data.id }" data-status="${data.status}"
                                                                data-table="data_rejects" data-bs-toggle="modal" data-bs-target="#modal_ubahstatus">
                                                                <i class="fas fa-user-check me-1"></i> Ubah Status
                                                            </button>
                                                            <button class="dropdown-item delete_studibanding" data-id="${ data.id }" data-name="${data.title}" data-from="#data_payments">
                                                                <i class="fas fa-trash me-1"></i> Hapus
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>                                                
                                                `;

                                            return btn;
                                        }
                                    }
                                ]
                            })

							$('#data_rejects').DataTable(dataReject);
                        } else {
                            reloadData('#data_rejects')
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

            $('#modal_ubahstatus, #modal_sendmsg').on('show.bs.modal', function (e) {
                const modal = $(this),
                      id    = $(e.relatedTarget).data('id'),
                      data_status    = $(e.relatedTarget).data('status'),
                      data_table    = $(e.relatedTarget).data('table');

                $.ajax({
                    url: "{{ route('studi_banding.get') }}",
                    data: {id: id},
                    type: 'POST',
                    async:false,
                    dataType: 'json'
                }).done(function (data) {
                    if(data.success){
						const status = ['reject', 'review', 'pay', 'accept'],
                              btnShowEviden = `
                                <button class="btn btn-secondary btn-xs" data-fancybox>
                                    Lihat Bukti Pembayaran
                                </button>`;
                        let check;

                        modal.find('input[name="id"]').val(id)
                        modal.find('form').attr('data-table', data_table)
                        
                        if(modal.attr('id') == 'modal_ubahstatus'){
                            modal.find('#title_status').html(data.get.title)
                            modal.find('#institusi_status').html(data.get.institution? data.get.institution.name : "Tidak ada")
                            modal.find('#status_status').html(setBadgeStatus(data.get.status))
                            modal.find('#statuspay_status').html(setBadgePay(data.get.paid))
                            
                            check = data.get.paid? true : false;
                            modal.find('#switch').prop('checked', check);

                            modal.find('select[name="status"]').html('').select2({data: status})
                            modal.find('select[name="status"]').val(data_status).change();

                            check = data.get.eviden_paid? 
                                $(btnShowEviden).attr('href', data.get.eviden_paid) :
                                `<strong>Tidak ada bukti</strong>`;

                            modal.find('#eviden_status').html(check)
                        } else {
                            modal.find('#title_msg').html(data.get.title)
                            modal.find('#institusi_msg').html(data.get.institution ? data.get.institution.name : "Tidak ada")
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
                    $('#preloader').addClass('d-none');
					$('#main-wrapper').addClass('show');

					if(data.success){
						let rooms = ``, questionView = `
							<tr></tr>`, btnLampiran = `
							<button class="btn btn-secondary" data-fancybox data-type="pdf">
								Lihat Lampiran
							</button>`, btnShowEviden = `
							<button class="btn btn-secondary" data-fancybox>
								Lihat Bukti Pembayaran
							</button>`, tableRow = `<tr></tr>`;

						$.each(data.get.rooms, function(i, val){
							rooms += val.name + ", ";
						})

						modal.find('#title_view').html(data.get.title);
						modal.find('#rooms_view').html(rooms? rooms : "Belum memilih");
						modal.find('#institution_view').html(data.get.institution? data.get.institution.name : "Tidak ada");
						modal.find('#visit_view').html(data.get.visit);
						modal.find('#members_view').html(data.get.members);
						modal.find('#pay_view').html("Rp " + currency.format(data.get.total_paid));
						modal.find('#status_view').html(setBadgeStatus(data.get.status));
						modal.find('#statuspay_view').html(setBadgePay(data.get.paid));
						modal.find('#question_view table tbody').html('');
						modal.find('#permohonan_view').html($(btnLampiran).attr('href', data.get.permohonan));
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
							modal.find('#eviden_view').html('<strong>Tidak ada bukti</strong>')
						}

					} else {
						alertError("Berhasil", data.msg)
					}
				}).fail(function(data){
					console.log(data.responseText)
				});
			})

            $('#ubah_status').validate({
				submitHandler: function (form) {
                    const dataForm = $(form).serializeObject(),
                          table = $(form).data('table');

                    dataForm.from = 'comparative';
                    if(dataForm.switch_pay) delete dataForm.switch_pay;

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
                    
                    dataForm.from = 'comparative';
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

        });
    </script>
@endsection