@extends('dashboard.layouts.app')

@section('title', "Pengajuan Magang")

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
            <h3 class="text-secondary mb-0"><i class="fas fa-graduation-cap me-2"></i> @yield('title')</h3>
        </div>
    </div>

    <div class="col-12">
        <div class="card">
            <div class="card-body">
				<div class="profile-tab">
					<div class="custom-tab-1">
						<ul class="nav nav-tabs">
							<li class="nav-item">
								<a href="#reviews" data-bs-toggle="tab" class="nav-table nav-link active show">Review</a>
							</li>
							<li class="nav-item">
								<a href="#pembayaran" data-bs-toggle="tab" class="nav-table nav-link">Pembayaran</a>
							</li>
                            <li class="nav-item">
								<a href="#accept" data-bs-toggle="tab" class="nav-table nav-link">Diterima</a>
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
											<h3 class="font-weight-bold">Data Pengajuan <span class="small text-light">(Review)</span></h3>
											<div class="btn-group">
												<button type="button" data-table="#data_reviews" class="btn btn-primary btn_refresh">
													<i class="fas fa-sync-alt"></i> Refresh Data
												</button>
												<div class="btn-group">
													<button id="btnGroupDrop1" type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown"></button>
													<div class="dropdown-menu">
														<a class="dropdown-item" data-bs-toggle="modal" href="#modal_addmagang">
															<i class="fas fa-file-alt me-2"></i> Ajukan
														</a>
													</div>
												</div>
											</div>
										</div>
										<div class="table-responsive">
											<table id="data_reviews" class="display dt-responsive">
												<thead>
													<tr>
														<th>#</th>
														<th>Nama</th>
														<th>Jurusan</th>
														<th>Mulai Magang</th>
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
							<div id="pembayaran" class="tab-pane fade">
                                <div class="row">
									<div class="col-12">
										<div class="d-flex justify-content-between mb-4">
											<h3 class="font-weight-bold">Data Pengajuan <span class="small text-light">(Pembayaran)</span></h3>
											<button type="button" data-table="#data_payments" class="btn btn-rounded btn-primary btn_refresh">
												<span class="btn-icon-start text-primary">
													<i class="fas fa-sync-alt"></i>
												</span> Refresh Data
											</button>
										</div>
										<div class="table-responsive">
											<table id="data_payments" class="display dt-responsive">
												<thead>
													<tr>
														<th>#</th>
														<th>Nama</th>
														<th>Jurusan</th>
														<th>Mulai Magang</th>
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
											<h3 class="font-weight-bold">Data Pengajuan <span class="small text-light">(Diterima)</span></h3>
											<button type="button" data-table="#data_accepts" class="btn btn-rounded btn-primary btn_refresh">
												<span class="btn-icon-start text-primary">
													<i class="fas fa-sync-alt"></i>
												</span> Refresh Data
											</button>
										</div>
										<div class="table-responsive">
											<table id="data_accepts" class="display dt-responsive">
												<thead>
													<tr>
														<th>#</th>
														<th>Nama</th>
														<th>Jurusan</th>
														<th>Selesai Magang</th>
														<th>Tipe Magang</th>
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
											<h3 class="font-weight-bold">Data Pengajuan <span class="small text-light">(Selesai)</span></h3>
											<button type="button" data-table="#data_dones" class="btn btn-rounded btn-primary btn_refresh">
												<span class="btn-icon-start text-primary">
													<i class="fas fa-sync-alt"></i>
												</span> Refresh Data
											</button>
										</div>
										<div class="table-responsive">
											<table id="data_dones" class="display dt-responsive">
												<thead>
													<tr>
														<th>#</th>
														<th>Nama</th>
														<th>Jurusan</th>
														<th>Institusi</th>
														<th>Tipe Magang</th>
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
    </div>

	@include('dashboard.internship.components.madd_magang')
@endsection

@section('script')
	<script src="{{ asset('assets/vendor/select2/js/select2.full.min.js') }}"></script>
	<script src="{{ asset('assets/js/jquery.validate.min.js') }}"></script>

    <script src="{{ asset('assets/vendor/pickadate/picker.js') }}"></script>
    <script src="{{ asset('assets/vendor/pickadate/picker.date.js') }}"></script>

	<script src="{{ asset('assets/vendor/fancyapps/fancybox.umd.js') }}"></script>

    <script>
        $(document).ready(function(){
            var currency = new Intl.NumberFormat('id-ID');

			$.validator.setDefaults({
				highlight: function(element) {
					$(element).closest('.form-group').addClass('has-error');
				},
				unhighlight: function(element) {
					$(element).closest('.form-group').removeClass('has-error');
				},
				errorElement: 'span',
				errorClass: 'text-danger',
				errorPlacement: function(error, element) {
					if(element.parent('.input-group').length) {
						error.insertAfter(element.parent());
					} else {
						element.closest('.form-group').append(error)
					}
				}
			});

			$.validator.addMethod("alphanumeric", function(value, element) {
				return this.optional(element) || /^[a-z\d\-\s\?]+$/i.test(value);
			}, "Letters and numbers only please");

			$.validator.addMethod('filesize', function (value, element, param) {
				return this.optional(element) || (element.files[0].size <= param * 1000000)
			}, 'File size must be less than {0} MB');

			$.validator.addMethod("extension", function(value, element, param) {
				param = typeof param === "string" ? param.replace(/,/g, '|') : "png|jpe?g|gif";
				return this.optional(element) || value.match(new RegExp(".(" + param + ")$", "i"));
			},  "Please enter a value with a valid extension.");

            $(".select2_").select2();
            $('.datepicker-default').pickadate({
                format: 'd mmmm yyyy',
                formatSubmit: 'yyyy-mm-dd'
            })

			$('#start_date').pickadate('picker').set("min", "{{ date('Y-m-d') }}")
			$('#end_date').pickadate('picker').set("disable", true)

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

			$('.nav-daftar').on('shown.bs.tab', function (event) {
				const active = event.target, // newly activated tab
					previousActive = event.relatedTarget,	// previous active tab
					btnSubmit = $('#btnmagang_submit');

				let id_active = $(active).attr('href'),
					id_previousActive = $(previousActive).attr('href');

				id_active = id_active.split('#')[1],
				id_previousActive = id_previousActive.split('#')[1]

				if(id_active == 'berkas'){
					const htmlBack = `<button 
						type="button" 
						id="btnmagang_back" 
					class="btn btn-secondary">Kembali</button>`;

					$('#html_back').append($(htmlBack));
					btnSubmit.prop('type', 'submit');
					btnSubmit.html('Simpan Data');
				} else {
					$('#html_back').html('');
					btnSubmit.prop('type', 'button');
					btnSubmit.html('Lanjut');
				}
			})

			$('#btnmagang_submit').click(function(e){
				const type = $(this).prop('type')

				if(type == 'button') $('a[href="#berkas"]').tab('show')
			})

			$('#modal_addmagang').on('click', '#btnmagang_back', 
				() => $('a[href="#biodata"]').tab('show'))

			$('#modal_addmagang').on('change', '.form-daftar', function(e) {
				const btn_preview = $(this).parent().parent(),
					  form_file = $(this),
					  reader = new FileReader();

				if(this.files[0]){
					reader.onload = function(e) {
						btn_preview.find('button').prop('disabled', false)
						btn_preview.find('button').removeClass('btn-dark')
						btn_preview.find('button').addClass('btn-secondary')
						btn_preview.find('button').attr('href', e.target.result);
					}
					reader.readAsDataURL(this.files[0]);
				} else {
					btn_preview.find('button').prop('disabled', true)
					btn_preview.find('button').addClass('btn-dark')
					btn_preview.find('button').removeClass('btn-secondary')
					btn_preview.find('button').removeAttr('href');
				}

			});

			$('#modal_addmagang').on('change', 'input[name="start_date"]', function(e) {
				const modal = $(this).closest('.modal')
					  minDate = new Date($(this).val());

				minDate.setMonth(minDate.getMonth()+1);
				modal.find('input[name="end_date"]').val('')
				modal.find('input[name="end_date"]').pickadate('picker').set({
					disable: false,
					min: minDate // +1 Month
				})
			});

			$('#modal_addmagang').on('click', '.min_members', function(e){
                e.preventDefault();
                const members = $(this).parent().find('input'),
                      membersNow = parseInt(members.val())

                if(membersNow > 1) members.val(membersNow - 1)
            })

            $('#modal_addmagang').on('click', '.add_members', function(e){
                e.preventDefault();
                const members = $(this).parent().find('input'),
                      membersNow = parseInt(members.val())

                if(membersNow > 0) members.val(membersNow + 1)
            })

			$('#modal_addmagang').on('show.bs.modal', function (e) {
                const modal = $(this);
				let institutions, province, city;

                $.when(
					$.ajax({
						url: '{{ route('get_institutions') }}',
						type: 'POST',
						dataType: 'json',
						cache: false
					}).done(function (data) {
						if(data.success){
							institutions = data.get
						} else {
							alertError("Terjadi Kesalahan", data.msg)
						}
					}).fail(function(data){
						resp = JSON.parse(data.responseText)
						alertError("Terjadi Kesalahan", resp.message)
						console.log("error");
					}),
					$.ajax({
						url: 'https://dev.farizdotid.com/api/daerahindonesia/provinsi',
						type: 'GET',
						dataType: 'json',
						headers: '',
						cache: false
					}).done(function (data) {
						province = data.provinsi
					}).fail(function(data){
						console.log(data)
						console.log("error");
					}),
					$.ajax({
						url: 'https://dev.farizdotid.com/api/daerahindonesia/kota?id_provinsi=32',
						type: 'GET',
						dataType: 'json',
						headers: '',
						cache: false
					}).done(function (data) {
						city = data.kota_kabupaten
					}).fail(function(data){
						console.log(data)
						console.log("error");
					})
				).then(function(){
					let html_ = [];

					$.each(institutions, function(i, val) {
						html_.push({id: val.id, text: val.name});
					})
					modal.find("select[name='institusi']").html('').select2({data: html_});

					html_ = [];
					$.each(province, function(i, val) {
						html_.push({id: val.id, text: val.nama});
					})
					modal.find("select[name='province']").html('').select2({data: html_});
					modal.find("select[name='province']").val(32).change();

					html_ = [];
					$.each(city, function(i, val) {
						html_.push({id: val.id, text: val.nama});
					})
					modal.find("select[name='city']").html('').select2({data: html_});
					modal.find("select[name='city']").val(3209).change();
				})
            })

			$('#modal_addmagang').on('change', 'select[name="province"]', function(e){
				const modal = $(this).closest('.modal'),
					  id 	= $(this).val();

				$.ajax({
					url: `https://dev.farizdotid.com/api/daerahindonesia/kota?id_provinsi=${id}`,
					type: 'GET',
					dataType: 'json',
					headers: '',
					cache: false,
					beforeSend: function(){
						modal.find("select[name='city']").html('').select2({data: []});
					}
				}).done(function (data) {
					let city = data.kota_kabupaten, html_ = [];
					$.each(city, function(i, val) {
						html_.push({id: val.id, text: val.nama});
					})

					modal.find("select[name='city']").html('').select2({data: html_});
				}).fail(function(data){
					console.log(data)
					console.log("error");
				})
			});

			$('#modal_addmagang').on('hide.bs.modal', function (e) {
                const modal = $(this);

				$('#tambah_magang')[0].reset();
				$("#institusi_daftar").html('').select2({data: []});
				$("#province_daftar").html('').select2({data: []});
				$("#city_daftar").html('').select2({data: []});

				$('#modal_addmagang').find('button[data-fancybox]').removeAttr('href')
				$('#modal_addmagang').find('button[data-fancybox]').removeClass('btn-secondary')
				$('#modal_addmagang').find('button[data-fancybox]').addClass('btn-dark')
			})

			$('#tambah_magang').validate({
				ignore: [],
				rules:{
					name: { required: true, alphanumeric: true },
					nim: { required: true, digits: true },
					date: { required: true, date: true },
					jurusan: { required: true, alphanumeric: true },
					institusi: { required: true },
					semester: { required: true, digits: true, min: 1 },
					type: { required: true },
					start_date: { required: true, date: true }, end_date: { required: true, date: true },
					phone: { required: true, digits: true, minlength: 11, maxlength: 14 },
					city: { required: true }, province: { required: true },
					address: { required: true },
					ktm: { required: true, extension: "pdf|jpeg|jpg|png", filesize : 1 },
					proposal: { required: true, extension: "pdf", filesize : 2 },
					antigen: { required: true, extension: "pdf", filesize : 1 },
					izin_ortu: { required: true, extension: "pdf|jpeg|jpg|png", filesize : 1 },
					transkrip: { required: true, extension: "pdf", filesize : 1 },
					panduan_praktek: { required: true, extension: "pdf", filesize : 1 },
					izin_pkl: { required: true, extension: "pdf", filesize : 1 },
					akreditasi: { required: true, extension: "pdf", filesize : 1 },
					mou: { required: false, extension: "pdf", filesize : 1 },
					bukti_pkl: { required: false, extension: "pdf", filesize : 1 }
				},
				submitHandler: function (form) {
					let data_daftar = $(form).serializeObject();

					console.log(data_daftar)
				}
			})

        });
    </script>
@endsection