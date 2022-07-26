@extends('dashboard.layouts.app')

@php
    if(isset($ethics)){
        $title = "Form Protokol Etik Penelitian";
    } else if(isset($protocol)) {
        if(isset($is_edit)){
            $title = "Edit Protokol Etik Penelitian";
        } else {
            $title = "Protokol Etik Penelitian";
        }
    }
@endphp

@section('title', $title)

@section('style')
	<link rel="stylesheet" href="{{ asset('assets/vendor/select2/css/select2.min.css') }}">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" href="{{ asset('assets/vendor/fancyapps/fancy.css') }}">
    <style>
        .ck-balloon-panel{z-index:9999 !important}
    </style>
@endsection

@section('content')
    <div class="d-block d-md-none col-12">
        <div class="card px-4 py-3">
            <h3 class="text-secondary mb-0"><i class="fas fa-atom me-2"></i> @yield('title')</h3>
        </div>
    </div>

    @if(isset($ethics))
    <form id="tambah_protocol" enctype="multipart/form-data" novalidate>
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title text-primary">Judul Penelitian</h5>
                </div>
                <div class="card-body">
                    <div class="col-12 mb-3">
                        <div class="form-group">
                            <label>Pilih Judul Penelitian</label>
                            <select class="select2_ mb-2" name="judul" required>
                                <option value="">-</option>
                                @foreach ($ethics as $data)
                                    <option value="{{ $data->id }}">{{ $data->research->ketua }} - {{ $data->research->judul }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @elseif(isset($protocol))
    @if(isset($is_edit))
    <form id="edit_protocol" enctype="multipart/form-data" novalidate>
        <input type="hidden" name="judul" value="{{ $protocol->id }}" required>
    @endif
    @endif
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    @include('dashboard.layaketik.components.card_formprotocol')
                </div>
            </div>
        </div>
        
    @if(isset($ethics))
    </form>
    @elseif(isset($protocol))
        @if(isset($is_edit))
    </form>
        @endif
    @endif
@endsection

@section('script')
	<script src="{{ asset('assets/vendor/fancyapps/fancybox.umd.js') }}"></script>
    <script src="{{ asset('assets/vendor/ckeditor5/build/ckeditor.js') }}"></script>
    <script>
        let editors = [];   

        function createEditor( elementId ) {
            return ClassicEditor
                .create( document.querySelector( '.' + elementId ), {
                    extraPlugins: [ MyCustomUploadAdapterPlugin ],  
                } )
                .then( editor => { 
                    editors[ elementId ] = editor 
                } )
                .catch( err => console.error( err ) );
        }

        function getDataFromTheEditor(elm) {
            return editors[elm]? editors[elm].getData() : false;
        }

        function setDataFromTheEditor(elm, text) {
            return editors[elm].setData(text);
        }

        $(document).ready(function(){
            
            $.validator.addMethod('ckrequired', function (value, element, params) {
                var idname = $(element).attr('class');
                var messageLength =  getDataFromTheEditor(idname)? $.trim ( getDataFromTheEditor(idname) ) : $(element).val();
                return !params  || messageLength.length !== 0;
            }, "This field is required.");
            

            $('.nav-table').on('shown.bs.tab', function (event) {
				const active = event.target, // newly activated tab
					previousActive = event.relatedTarget // previous active tab

				let id_active = $(active).attr('href'),
					id_previousActive = $(previousActive).attr('href'),
					data_active = $($(active).attr('href')),
					data_previousActive = $($(previousActive).attr('href')),
                    textarea = $(id_active).find('textarea');

				id_active = id_active.split('#')[1],
				id_previousActive = id_previousActive.split('#')[1]

                if(textarea.length > 0){
                    let _class;
                    $.each(textarea, function(i, val){
                        _class = $(val).attr('class');

                        if(!editors[_class]){
                            createEditor(_class)
                            console.log(`${_class}, created`)
                        }
                    })
                }
			})

            // const editor_form = [
            //     'ringkasan_protocol_a', 'ringkasan_protocol_b', 'isu_etik', 'ringkasan_kajianpustaka',
            //     'kondisi_lapangan_a', 'kondisi_lapangan_b', 'kondisi_lapangan_c', 'disain_penelitian_a',
            //     'disain_penelitian_b', 'disain_penelitian_c', 'sampling_a', 'sampling_b', 'sampling_c',
            //     'intervensi_a', 'intervensi_b', 'intervensi_c', 'intervensi_d', 'monitoring_penelitian',
            //     'penghentian_penelitian', 'adverse_penelitian_a', 'adverse_penelitian_b', 'penanganan_komplikasi',
            //     'manfaat_a', 'manfaat_b', 'keberlanjutan_manfaat', 'informed_consent_a', 'informed_consent_b',
            //     'wali_a', 'wali_b', 'bujukan_a', 'bujukan_b', 'bujukan_c', 'penjagaan_kerahasiaan_a',
            //     'penjagaan_kerahasiaan_b', 'penjagaan_kerahasiaan_c', 'penjagaan_kerahasiaan_d',
            //     'rencana_analisis', 'monitor_keamanan', 'konflik_kepentingan', 'manfaat_sosial_a', 
            //     'manfaat_sosial_b', 'hakatas_data', 'publikasi_a', 'publikasi_b', 'pendanaan',
            //     'komitmen_etik_a', 'komitmen_etik_b', 'komitmen_etik_c', 'daftar_pustaka'
            // ];

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

            $(document).on('change', 'select[name="judul"]', function(e) {
                const judul = $(this).val();

                if(judul){
                    $.ajax({
                        url: "{{ route('layaketik.get') }}",
                        method: 'POST',
                        data: {id: judul},
                        beforeSend: function(){
                            $('#preloader').removeClass('d-none');
                            $('#main-wrapper').removeClass('show');
                        }
                    }).done(function (data) {						
                        if(data.success){
                            $('.judul_penelitian').html(data.get.research.judul)
                            $('.lokasi_penelitian').html(data.get.research.tempat)
                            $('.is_multisenter').html(data.get.research.is_multisenter? "Iya" : "Tidak")
                            $('.acc_multisenter').html(data.get.research.acc_multisenter? "Iya" : "Tidak")
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
                } else {
                    $('.judul_penelitian').html('-')
                    $('.lokasi_penelitian').html('-')
                    $('.is_multisenter').html('-')
                    $('.acc_multisenter').html('-')
                }
            })

            $('#tambah_protocol').validate({
                ignore : [],
				rules:{
                    judul:{ required: true },
                    ringkasan_protocol_a: { ckrequired: true }, ringkasan_protocol_b: { ckrequired: true },
                    cv_ketua: { required: false, extension: "pdf", filesize : 1 },
                    cv_anggota: { required: false, extension: "pdf", filesize : 1 },
                    lembaga_sponsor: { required: false, extension: "pdf", filesize : 1 },
                    surat_pernyataan: { required: false, extension: "pdf", filesize : 1 },
                    kuesioner: { required: false, extension: "pdf", filesize : 1 },
                    file_informedconsent: { required: false, extension: "pdf", filesize : 1 },
                    halaman_pengesahan: { required: false, extension: "pdf", filesize : 1 },
				},
				submitHandler: function (form) {
                    let dataForm = new FormData(form),
                        textarea_ = $('textarea');

                    $.each(textarea_, function(i, val){
                        if(getDataFromTheEditor($(val).attr('name')))
                            dataForm.set($(val).attr('name'), getDataFromTheEditor($(val).attr('name')))
                    })

                    // for (var key of Object.keys(serialized)){
                    //     console.log(key, serialized[key])
                    // }

                    // for (var pair of dataForm.entries()) {
                    //     console.log(pair[0]+ ', ' + pair[1]); 
                    // }

                    Swal.fire({
                        title: `Apakah yakin ingin menyimpan?`,
                        showCancelButton: true,
                        confirmButtonText: `Save`
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $.ajax({
                                url: "{{ route('layaketik.protocol.store') }}",
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
                                    window.location.href = "{{ route('layaketik.protocol') }}";
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

            $('#edit_protocol').validate({
                ignore : [],
				rules:{
                    judul:{ required: true },
                    ringkasan_protocol_a: { ckrequired: false }, ringkasan_protocol_b: { ckrequired: false },
                    cv_ketua: { required: false, extension: "pdf", filesize : 1 },
                    cv_anggota: { required: false, extension: "pdf", filesize : 1 },
                    lembaga_sponsor: { required: false, extension: "pdf", filesize : 1 },
                    surat_pernyataan: { required: false, extension: "pdf", filesize : 1 },
                    kuesioner: { required: false, extension: "pdf", filesize : 1 },
                    file_informedconsent: { required: false, extension: "pdf", filesize : 1 },
                    halaman_pengesahan: { required: false, extension: "pdf", filesize : 1 },
				},
				submitHandler: function (form) {
                    const dataForm = new FormData(form),
                          textarea_ = $('textarea');

                    $.each(textarea_, function(i, val){
                        if(getDataFromTheEditor($(val).attr('name')))
                            dataForm.set($(val).attr('name'), getDataFromTheEditor($(val).attr('name')))
                    })

                    // for (var pair of dataForm.entries()) {
                    //     console.log(pair[0]+ ', ' + pair[1]); 
                    // }

                    Swal.fire({
                        title: `Apakah yakin ingin mengupdate?`,
                        text: "Periksa kembali data anda apakah sudah sesuai.",
                        showCancelButton: true,
                        confirmButtonText: `Save`
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $.ajax({
                                url: "{{ route('layaketik.protocol.update') }}",
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
                                    window.location.href = "{{ route('layaketik.protocol') }}";
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