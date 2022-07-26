@extends('dashboard.layouts.app')

@section('title', "Resume Protokol")

@section('style')
	<link rel="stylesheet" href="{{ asset('assets/vendor/select2/css/select2.min.css') }}">
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
                <div class="row">
					<div class="col-12">
						<div class="d-flex justify-content-between mb-4">
							<h3 class="font-weight-bold">
								Resume Telaah Cepat
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
										<th>Pengajuan</th>
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
        </div>
    </div>
@endsection

@section('script')
	<script src="{{ asset('assets/vendor/fancyapps/fancybox.umd.js') }}"></script>

    <script>
        $(document).ready(function(){
			const setBadge = value => {
				if(value){
					return `
						<span class="badge mx-auto badge-pill badge-secondary">
							Siap Ditelaah Cepat
						</span>`;
				} else {
					return `
						<span class="badge mx-auto badge-pill badge-dark">
							Resume Tidak Ada
						</span>`;
				}
			}			

			const dataReviews = setDatatables;

            $.extend(dataReviews, {
                "ajax": {
                    "type": "POST",
                    "url": `{{ route('layaketik.protocol.resume.all_review') }}`,
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
                        "render": function (data, row, type, meta) {
                            return setBadge(data.is_ready);
                        }
                    },
                    {
                        "mData": null,
                        "sortable": false,
                        "render": function (data, row, type, meta) {
                            
                            let btn = `
							<a href="{{ URL::to('/dashboard/layaketik/protocol/resume/form') }}/${data.id}"
								class="btn btn-primary shadow btn-xs px-2">
								<i class="fas fa-cog me-1"></i><span class="d-none d-sm-block">Edit</span>
							</a>`;

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

			
        });
    </script>
@endsection