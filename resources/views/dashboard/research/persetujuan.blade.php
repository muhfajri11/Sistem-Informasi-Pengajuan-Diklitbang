@extends('dashboard.layouts.app')

@section('title', "Persetujuan Penelitian")

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
							<a href="#reviews" data-bs-toggle="tab" class="nav-table nav-link active show">Review</a>
						</li>
						<li class="nav-item">
							<a href="#pembayaran" data-bs-toggle="tab" class="nav-table nav-link">Pembayaran</a>
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
													<th>Judul</th>
													<th>Peneliti Utama</th>
													<th>Mulai</th>
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
													<th>Judul</th>
													<th>Peneliti Utama</th>
													<th>Mulai</th>
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
													<th>Judul</th>
													<th>Peneliti Utama</th>
													<th>Uji Layak Etik</th>
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

    @include('dashboard.research.components.mdetail_research')

    @include('dashboard.research.components.modal_status')

    @include('dashboard.research.components.modal_message')

    @include('dashboard.research.components.modal_izinpenelitian')

@endsection

@section('script')
	<script src="{{ asset('assets/vendor/pickadate/picker.js') }}"></script>
    <script src="{{ asset('assets/vendor/pickadate/picker.date.js') }}"></script>

	<script src="{{ asset('assets/vendor/fancyapps/fancybox.umd.js') }}"></script>
    <script src="{{ asset('assets/vendor/ckeditor/build/ckeditor.js') }}"></script>

    <script>
        let theEditor;

        ClassicEditor
            .create( document.querySelector( '#editor' ), {
				extraPlugins: [ MyCustomUploadAdapterPlugin ]
			} )
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

			const setBadgeEtik = type_ => {
				switch(type_){
					case 1:
						return `
						<span class="badge mx-auto badge-pill badge-warning">
							Perlu
						</span>`;
						break;
					case 0:
						return `
						<span class="badge mx-auto badge-pill badge-primary">
							Tidak Perlu
						</span>`;
						break;
                    default: 
                        return '';
                        break;
				}
			}

			const dataReviews = setDatatables,
                  dataPayments = setDatatables,
				  dataDone = setDatatables;

            $.extend(dataReviews, {
                "ajax": {
                    "type": "POST",
                    "url": `{{ route('research.all', ['type' => 'review', 'admin' => 1]) }}`,
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
                            return data.ketua;
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
                        "sortable": false,
                        "render": function (data, row, type, meta) {
                            
                            let btn = `
                            <div class="btn-group">
                                <button data-id="${ data.id }"
                                    class="btn btn-primary shadow btn-xs px-2"
                                    data-bs-toggle="modal" data-bs-target="#modal_detailresearch">
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
                                        <button class="dropdown-item delete_research" data-id="${ data.id }" data-name="${data.judul}" data-from="#data_reviews">
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
			// $.fn.DataTable.isDataTable('#data_tipepkl')

			const reloadData = idTag => {
				let text = '';
				switch(idTag){
					case '#data_reviews': text = "Reload Data Reviews"; break;
					case '#data_payments': text = "Reload Data Payments"; break;
					case '#data_dones': text = "Reload Data Selesai"; break;
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
                                    "url": `{{ route('research.all', ['type' => 'pay', 'admin' => 1]) }}`,
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
                                            return data.ketua;
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
                                                    data-bs-toggle="modal" data-bs-target="#modal_detailresearch">
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
                                                        <button class="dropdown-item delete_research" data-id="${ data.id }" data-name="${data.judul}" data-from="#data_payments">
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
					case 'done':
						if(!$.fn.DataTable.isDataTable('#data_dones')){
							$.extend(dataDone, {
                                "ajax": {
                                    "type": "POST",
                                    "url": `{{ route('research.all', ['type' => 'accept,reject', 'admin' => 1]) }}`,
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
                                            return data.ketua;
                                        }
                                    },
                                    {
                                        "mData": null,
                                        "render": function (data, row, type, meta) {
                                            return Number.isInteger(data.is_layaketik) ? setBadgeEtik(data.is_layaketik) : "-";
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
                                                        data-bs-toggle="modal" data-bs-target="#modal_detailresearch">
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
															`;

                                            if(data.status == 'accept'){
                                                btn += `<button class="dropdown-item" data-id="${ data.id }" data-status="${data.status}"
                                                            data-table="data_dones" data-bs-toggle="modal" data-bs-target="#modal_izinpenelitian">
                                                            <i class="fas fa-file-check me-1"></i> Izin Penelitian
                                                        </button>`;
                                            }

                                            btn += `
                                                        <button class="dropdown-item delete_research" data-id="${ data.id }" data-name="${data.judul}" data-from="#data_dones">
                                                            <i class="fas fa-trash me-1"></i> Hapus
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>`

                                            return btn;
                                        }
                                    }
                                ]
                            })

							$('#data_dones').DataTable(dataDone);
						} else {
							reloadData('#data_dones')
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

			$('#modal_detailresearch').on('show.bs.modal', function (e) {
				const modal = $(this),
					  data_id = $(e.relatedTarget).data('id');

				$.ajax({
					url: "{{ route('research.get') }}",
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
						let btnEviden = `
							<button class="btn btn-dark btn-xs" data-bs-toggle="modal" href="#modal_uploadpembayaran" data-id="${data.get.id}">
								Upload Bukti Pembayaran
							</button>`, 
							htmlBtnShow = `<button class="btn btn-secondary btn-xs" data-fancybox>Buka</button>`,
							province, city, htmlBtn, check;

						modal.find('#judul_view').html(data.get.judul);
						modal.find('#title_view').html(data.get.title);
						modal.find('#tipe_view').html(data.get.tipe_penelitian);
						modal.find('#institusi_view').html(data.get.institution ? data.get.institution.name : "Tidak ada");

						modal.find('#ketua_view').html(data.get.ketua);
						modal.find('#nik_view').html(data.get.nik);
						modal.find('#jenjang_view').html(data.get.education_level ? data.get.education_level.name : "Tidak ada");
						modal.find('#phone_view').html(data.get.phone);
						modal.find('#address_view').html(data.get.address);
						if(data.get.anggota.length > 0){
							let anggota = ``;
							$.each(data.get.anggota, (i, val) => {
								anggota += val + ", ";
							})
							modal.find('#anggota_view').html(anggota)
							modal.find('.is_anggota').removeClass('d-none')
						} else {
							modal.find('.is_anggota').addClass('d-none')
							modal.find('#anggota_view').html('')
						}

						modal.find('#tempat_view').html(data.get.tempat);
						modal.find('#start_view').html(data.get.start_date);
						modal.find('#end_view').html(data.get.end_date);
						
						if(Number.isInteger(data.get.is_layaketik)){
							modal.find('#layaketik_view').html(setBadgeEtik(data.get.is_layaketik))
							modal.find('.is_layaketik').removeClass('d-none')
						} else {
							modal.find('#layaketik_view').html('')
							modal.find('.is_layaketik').addClass('d-none')
						}

						modal.find('#pay_view').html(`Rp ${currency.format(data.get.total_paid)}`)
						modal.find('#status_view').html(setBadgeStatus(data.get.status));
						modal.find('#statuspay_view').html(setBadgePay(data.get.paid));

						htmlBtn = $(htmlBtnShow).attr({
							href: data.get.permohonan,
							"data-type": 'pdf'
						})
						modal.find('#permohonan_view').html(htmlBtn)

						htmlBtn = $(htmlBtnShow).attr({
							href: data.get.proposal,
							"data-type": 'pdf'
						})
						modal.find('#proposal_view').html(htmlBtn)

						if(data.get.eviden_paid){
							htmlBtn = $(htmlBtnShow).attr('href', data.get.eviden_paid)
							check = data.get.eviden_paid.split('.')[1];
							if(check == 'pdf') htmlBtn.attr('data-type', 'pdf');

							modal.find('#evidenpaid_view').html(htmlBtn)
						} else {
							modal.find('#evidenpaid_view').html("Tidak ada bukti")
						}

						if(data.get.izin_penelitian){
							htmlBtn = $(htmlBtnShow).attr({
								href: data.get.izin_penelitian,
								"data-type": 'pdf'
							})

							modal.find('.is_izin').removeClass('d-none')
							modal.find('#izin_view').html(htmlBtn)
						} else {
							modal.find('.is_izin').addClass('d-none')
							modal.find('#izin_view').html('')
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

            $('#modal_ubahstatus, #modal_sendmsg, #modal_izinpenelitian').on('show.bs.modal', function (e) {
                const modal = $(this),
                      id    = $(e.relatedTarget).data('id'),
                      data_status    = $(e.relatedTarget).data('status'),
                      data_table    = $(e.relatedTarget).data('table');

                $.ajax({
                    url: "{{ route('research.get') }}",
                    data: {id: id},
                    type: 'POST',
                    async:false,
                    dataType: 'json'
                }).done(function (data) {
                    if(data.success){
						const status = ['reject', 'review', 'pay', 'accept'],
                              btnShowEviden = `
                                <button class="btn btn-secondary btn-xs" data-fancybox>
                                </button>`;
                        let check;

                        modal.find('input[name="id"]').val(id)
                        modal.find('form').attr('data-table', data_table)
                    
                        if(modal.attr('id') == 'modal_ubahstatus' || modal.attr('id') == 'modal_izinpenelitian'){
                            modal.find('#judul_status').html(data.get.judul)
                            modal.find('#ketua_status').html(data.get.ketua)
                            modal.find('#institusi_status').html(data.get.institution?data.get.institution.name: "Tidak ada")
                            modal.find('#status_status').html(setBadgeStatus(data.get.status))
                            modal.find('#statuspay_status').html(setBadgePay(data.get.paid))

							check = data.get.eviden_paid? 
									$(btnShowEviden).attr('href', data.get.eviden_paid).html('Lihat Bukti Pembayaran') :
									`<strong>Tidak ada bukti</strong>`;

							modal.find('#eviden_status').html(check)

                            if(modal.attr('id') == 'modal_ubahstatus'){
								check = data.get.paid? true : false;
								modal.find('#switch').prop('checked', check);

								check = data.get.is_layaketik? true : false;
								modal.find('#switch_etik').prop('checked', check);

								modal.find('select[name="status"]').html('').select2({data: status})
								modal.find('select[name="status"]').val(data_status).change();
							} else {
								
								check = data.get.izin_penelitian? 
									$(btnShowEviden).attr({
										href: data.get.izin_penelitian,
										'data-type': 'pdf'
									}).html('Buka') : ``;

								modal.find('#btn_izinview').html(check)
							}

                        } else {
                            modal.find('#judul_msg').html(data.get.judul)
                            modal.find('#ketua_msg').html(data.get.ketua)
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

            $('#modal_ubahstatus, #modal_sendmsg, #modal_izinpenelitian').on('hide.bs.modal', function (e) {
                const modal = $(this);

                modal.find('form')[0].reset()

                modal.find('button[data-fancybox]').prop('disabled', true)
				modal.find('button[data-fancybox]').removeAttr('href')
				modal.find('button[data-fancybox]').removeClass('btn-secondary')
				modal.find('button[data-fancybox]').addClass('btn-dark')
				modal.find('button[data-fancybox]').removeAttr('data-type');
                
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

			$('#data_reviews, #data_payments, #data_dones')
			.on('click', ".delete_research", function(e){
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
							url: "{{ route('research.delete') }}",
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

            $('#modal_izinpenelitian').on('change', '.form-daftar', function(e) {
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

            $('#ubah_status').validate({
				submitHandler: function (form) {
                    const dataForm = $(form).serializeObject(),
                          table = $(form).data('table');

                    if(dataForm.switch_pay) delete dataForm.switch_pay;
                    if(dataForm.switch_etik) delete dataForm.switch_etik;
                    dataForm.from = 'research';

                    dataForm.paid = $(form).find('input[name="switch_pay"]').prop('checked')? 1 : 0;
                    dataForm.is_layaketik = $(form).find('input[name="switch_etik"]').prop('checked')? 1 : 0;

                    console.log(dataForm);
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
                    
                    dataForm.from = 'research';
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

            $('#tambah_izinpenelitian').validate({
				rules: {
					izin_penelitian: { required: true, extension: "pdf", filesize : 1 }
				},
				submitHandler: function (form) {
                    let dataForm = new FormData(form),
						table = $(form).data('table'),
                        modal = $(form).closest('.modal');
					dataForm.append('_method', 'PUT');
                    dataForm.append('from', 'research');

					$.ajax({
						url: "{{ route('research.add_izinpenelitian') }}",
						type: 'POST',
						async: false,
						processData: false,
						contentType: false,
						cache: false,
						dataType: 'json',
						enctype: 'multipart/form-data',
						data: dataForm,
						beforeSend: function(){
							$(modal).modal('hide')
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
        });
    </script>
@endsection