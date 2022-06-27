@extends('dashboard.layouts.app')

@section('title', "Manage Rooms")

@section('style')
	<link rel="stylesheet" href="{{ asset('assets/vendor/select2/css/select2.min.css') }}">
@endsection

@section('content')
    <div class="d-block d-md-none col-12">
		<div class="card px-4 py-3">
			<h3 class="text-secondary mb-0"><i class="fas fa-hospital-alt me-2"></i> @yield('title')</h3>
		</div>
	</div>

    <div class="col-12">
		<div class="card">
			<div class="card-body">
                <div class="d-flex justify-content-between mb-4">
                    <button type="button" class="btn btn-rounded btn-primary" 
                        data-bs-toggle="modal" href="#modal_addruangan">
                        <span class="btn-icon-start text-primary">
                            <i class="fas fa-hospital-alt"></i>
                        </span> Tambah Ruangan
                    </button>

                    <button type="button" class="btn btn-rounded btn-primary btn_refresh">
                        <span class="btn-icon-start text-primary">
                            <i class="fas fa-sync-alt"></i>
                        </span> Refresh Data
                    </button>
                </div>
                <div class="table-responsive">
                    <table id="data_rooms" class="display" style="width: 100%">
                        <thead>
                            <tr>
                                <th>Ruangan</th>
                                <th>Rating</th>
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

    @include('dashboard.masteradmin.components.ruangan.madd_ruangan')

	@include('dashboard.masteradmin.components.ruangan.medit_ruangan')

@endsection

@section('script')
    <script>
        $(document).ready(function(){

            const setBadgeRooms = rate => {
				switch(rate){
					case 1:
						return `
						<span class="badge mx-auto badge-pill badge-primary">
							Beginner
						</span>`;
						break;
					case 2:
						return `
						<span class="badge mx-auto badge-pill badge-warning">
							Intermediate
						</span>`;
						break;
					case 3:
						return `
						<span class="badge badge-pill badge-danger">
							Expert
						</span>`;
						break;
				}
			}
			
			const dataRooms = {
				searching: true,
				paging:true,
				select: true,
				info: true,         
				language: {
					paginate: {
						next: '<i class="fa fa-angle-double-right" aria-hidden="true"></i>',
						previous: '<i class="fa fa-angle-double-left" aria-hidden="true"></i>' 
					},
					searchPlaceholder: "Cari Sesuatu ..."
				},
				lengthChange: true,
				"sAjaxDataProp": "",
                "ajax": {
					"type": "POST",
					"url": `{{ route('manage_room.rooms') }}`,
					"timeout": 120000
				},
				"aoColumns": [
					{
						"mData": null,
						"render": function (data, row, type, meta) {
							return data.name;
						}
					},
					{
						"mData": null,
						"render": function (data, row, type, meta) {
							return setBadgeRooms(data.rate);
						}
					},
					{
						"mData": null,
						"sortable": false,
						"render": function (data, row, type, meta) {
							
							let btn = `
							<div class="btn-group">
								<button data-id="${ data.id }"
									class="btn btn-warning shadow btn-xs px-2"
									data-bs-toggle="modal" data-bs-target="#modal_editruangan">
									<i class="fas fa-cog me-1"></i><span class="d-none d-sm-block">Edit</span>
								</button>
                                <button data-id="${ data.id }" data-name="${data.name}"
									class="btn btn-danger shadow btn-xs px-2 delete_ruangan">
									<i class="fas fa-trash me-1"></i><span class="d-none d-sm-block">Hapus</span>
								</button>
							</div>`;

							return btn;
						}
					}
				]
			}

            const reloadData = () => {
				$('#data_rooms').DataTable().ajax.reload(function(){
					toastr.success("Berhasil refresh data", "Reload Data Ruangan", {
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

            let rooms_datatable = $('#data_rooms').DataTable(dataRooms);

            $('.btn_refresh').click(function(e){
                e.preventDefault();
                reloadData();
            })

            $('#tambah_ruangan').validate({
				rules:{
					name: { 
						required: true, 
                        alphanumeric: true,
						remote: {
							url: '{{ route("manage_room.check") }}',
							type: 'POST',
							data: {
								name: function(){
									return $('#nama_tambah').val();
								}
							}
						}
					},
                    rate: { required: true }
				},
				submitHandler: function (form) {
					let data_tambah = $(form).serializeArray(),
						dataTambah  = {};

					$.each(data_tambah, function(i, val){
						dataTambah[val.name] = val.value
					})
					
					$.ajax({
						url: '{{ route('manage_room.add_room') }}',
						method: 'POST',
						data: dataTambah,
						beforeSend: function(){
							$('#modal_addruangan').modal('hide')
							$('#tambah_ruangan')[0].reset();
							$('#preloader').removeClass('d-none');
							$('#main-wrapper').removeClass('show');
						}
					}).done(function (data) {						
						$('#preloader').addClass('d-none');
						$('#main-wrapper').addClass('show');
						
						if(data.success){
							alertSuccess("Berhasil Tambah Ruangan", data.msg)
							reloadData()
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

            $('#edit_ruangan').validate({
				rules:{
					name: { 
						required: true, 
                        alphanumeric: true,
						remote: {
							url: '{{ route("manage_room.check") }}',
							type: 'POST',
							data: {
								name: function(){
									return $('#nama_tambah').val();
								}
							}
						}
					},
                    rate: { required: true }
				},
				submitHandler: function (form) {
					let data_edit = $(form).serializeArray(),
						dataEdit  = {};

					$.each(data_edit, function(i, val){
						dataEdit[val.name] = val.value
					})

                    dataEdit._method = "PATCH";
					
					$.ajax({
						url: '{{ route('manage_room.update_room') }}',
						type: 'PATCH',
						data: dataEdit,
						beforeSend: function(){
							$('#modal_addruangan').modal('hide')
							$('#edit_ruangan')[0].reset();
							$('#preloader').removeClass('d-none');
							$('#main-wrapper').removeClass('show');
						}
					}).done(function (data) {						
						$('#preloader').addClass('d-none');
						$('#main-wrapper').addClass('show');
						
						if(data.success){
							alertSuccess("Berhasil Tambah Ruangan", data.msg)
							reloadData()
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

            $('#modal_editruangan').on('show.bs.modal', function (e) {
				const modal = $(this),
					  data_id = $(e.relatedTarget).data('id');

				$.ajax({
					url: "{{ route('manage_room.get_room') }}",
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
						console.log(data)
						modal.find('#id_edit').val(data_id);
						modal.find('#nama_edit').val(data.get.name);
						modal.find('#rate_edit').val(data.get.rate).change()
					} else {
						alertError('Terjadi Kesalahan', data.msg)
					}

				}).fail(function(data){
					resp = JSON.parse(data.responseText)
					alertError("Terjadi Kesalahan", resp.message)
					console.log("error");
				});
			})

			$('#data_rooms').on('click', ".delete_ruangan", function(e){
				e.preventDefault();
				const id = $(this).data('id'),
					  name = $(this).data('name');

				Swal.fire({
					title: `Apakah kamu yakin ingin menghapus ${name}?`,
					showDenyButton: true,
					showConfirmButton: false,
					showCancelButton: true,
					denyButtonText: `Hapus`
				}).then((result) => {
					if (result.isDenied) {
						$.ajax({
							url: "{{ route('manage_room.delete_room') }}",
							data: {id: id},
							type: 'DELETE',
							async:false,
							dataType: 'json',
							beforeSend: function(){
								$('#preloader').removeClass('d-none');
								$('#main-wrapper').removeClass('show');
							}
						}).done(function(data){
							if(data.success){
								alertWarning("Berhasil Hapus Pengguna", data.msg)
								reloadData('#data_users')
							} else {
								alertError("Terjadi Kesalahan", data.msg)
							}

							$('#preloader').addClass('d-none');
							$('#main-wrapper').addClass('show');
						}).fail(function(data){
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