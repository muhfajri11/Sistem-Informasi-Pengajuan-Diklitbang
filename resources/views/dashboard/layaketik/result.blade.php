@extends('dashboard.layouts.app')

@section('title', "Hasil Telaah")

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
				<div class="row">
                    <div class="col-12">
                        <div class="d-flex justify-content-between mb-4">
                            <h3 class="font-weight-bold">Semua Hasil Telaah</h3>
                            <button type="button" data-table="#data_result" class="btn btn-primary btn_refresh">
                                <i class="fas fa-sync-alt"></i> Refresh Data
                            </button>
                        </div>
                        <div class="table-responsive">
                            <table id="data_result" class="display" style="width: 100%">
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

    @include('dashboard.layaketik.components.modal_detailresult')
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

			const dataResults = setDatatables;

            $.extend(dataResults, {
                "ajax": {
                    "type": "POST",
                    "url": `{{ route('layaketik.telaah.result.all') }}`,
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
                            <button data-id="${ data.id }"
                                class="btn btn-primary shadow btn-xs px-2"
                                data-bs-toggle="modal" data-bs-target="#modal_detailresult">
                                <i class="fas fa-eye me-1"></i> <span class="d-none d-sm-block">Detail</span>
                            </button>`;

                            return btn;
                        }
                    }
                ]
            })

			let result_datatable = $('#data_result').DataTable(dataResults);

			const reloadData = idTag => {
				let text = '';
				switch(idTag){
					case '#data_result': text = "Reload Data Hasil Telaah"; break;
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
        })
    </script>
@endsection