@extends('dashboard.layouts.app')

@section('title', "Persetujuan Studi Banding")

@section('style')
	<link rel="stylesheet" href="{{ asset('assets/vendor/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/pickadate/themes/default.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/pickadate/themes/default.date.css') }}">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" href="{{ asset('assets/vendor/fancyapps/fancy.css') }}">
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
                                                    <th>Judul</th>
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
            </div>
        </div>
    </div>

    @include('dashboard.studibanding.components.mdetail_studibanding')

    @include('dashboard.studibanding.components.modal_status')
@endsection

@section('script')
	<script src="{{ asset('assets/vendor/pickadate/picker.js') }}"></script>
    <script src="{{ asset('assets/vendor/pickadate/picker.date.js') }}"></script>

	<script src="{{ asset('assets/vendor/fancyapps/fancybox.umd.js') }}"></script>

    <script>
        $(document).ready(function(){

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
                            const btnAttach = `
										<button 
                                            class="btn btn-secondary btn-xs ms-2" 
                                            data-fancybox 
                                            href="${data.attach}" data-type="pdf">
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
                    case '#data_reject': text = "Reload Data Rejects"; break;
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

							$('#data_accepts').DataTable(dataAccept);
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

            $('#modal_ubahstatus').on('show.bs.modal', function (e) {
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
                        modal.find('#title_status').html(data.get.title)
                        modal.find('#institusi_status').html(data.get.institution.name)
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
						alertError("Terjadi Kesalahan", data.msg)
					}
                }).fail(function(data){
                    resp = JSON.parse(data.responseText)
                    alertError("Terjadi Kesalahan", resp.message)
                    console.log("error");
                }); 
            })

            $('#ubah_status').validate({
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
                    const dataForm = $(form).serializeObject(),
                          table = $(form).data('table');

                    if(dataForm.switch_pay) delete dataForm.switch_pay;

                    dataForm.paid = $(form).find('input[name="switch_pay"]').prop('checked')? 1 : 0;
					$.ajax({
						url: "{{ route('studi_banding.changestatus') }}",
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

        });
    </script>
@endsection