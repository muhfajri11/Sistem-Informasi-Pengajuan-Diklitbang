@extends('dashboard.layouts.app')

@section('title', "Form Resume Protokol")

@section('style')
	<link rel="stylesheet" href="{{ asset('assets/vendor/select2/css/select2.min.css') }}">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" href="{{ asset('assets/vendor/fancyapps/fancy.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/jquery-smartwizard/dist/css/smart_wizard.min.css') }}">
    <style>
        .center-wizard_ {
            position:absolute;margin-left: auto;margin-right: auto;
            left: 0;right: 0;text-align: center;
        }

        table thead th { font-size: 1rem !important; }
        table tbody td { vertical-align: top !important;text-align: left !important; }
        .numb_right { vertical-align: top !important;text-align: right !important; }
        .custom-tab-1 .nav-wizard .nav-link { border-bottom: 0; }
        .custom-tab-1 .nav-wizard .nav-link.active { background: none; }
        .custom-tab-1 .nav-wizard .nav-link:hover { background: none; }
        .tab-content { height: auto !important; }
    </style>
@endsection

@section('content')
    @php
        $hide_it = 1;
        $hashids = new Hashids\Hashids();
    @endphp
    <div class="d-block d-md-none col-12">
        <div class="card px-4 py-3">
            <h3 class="text-secondary mb-0"><i class="fas fa-atom me-2"></i> @yield('title')</h3>
        </div>
    </div>

    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title text-primary">Judul Penelitian</h5>
            </div>
            <div class="card-body">
                <div class="col-12 mb-3">
                    <h4>{{ $protocol->research_ethic->research->judul? $protocol->research_ethic->research->judul: "" }}</h4>
                    <p class="mb-0">Peneliti Utama: {{ $protocol->research_ethic->research->ketua? $protocol->research_ethic->research->ketua: "" }}</p>
                    <a href="{{ route('layaketik.protocol.print', ['hash'=>$hashids->encode($protocol->id)]) }}" class="btn btn-primary mt-4"><i class="fas fa-print me-2"></i> Print Protokol</a>
                </div>
            </div>
        </div>
    </div>

    <div class="col-12">
        <div class="card">
            <div class="card-body">
				<div class="custom-tab-1">
					<ul class="nav nav-tabs">
						<li class="nav-item">
							<a href="#protocol" data-bs-toggle="tab" class="nav-parent nav-link active show">Protokol</a>
						</li>
						<li class="nav-item">
							<a href="#selfassesment" data-bs-toggle="tab" class="nav-parent nav-link">Self Assesment</a>
						</li>
                        <li class="nav-item">
							<a href="#resume" data-bs-toggle="tab" class="nav-parent nav-link">Resume</a>
						</li>
					</ul>
					<div class="tab-content pt-4">
						<div id="protocol" class="tab-pane fade active show">
							<div class="row">
								<div class="col-12">
                                    <div class="row">
                                        <div class="col-12 col-md-6">
                                            <h4 class="text-secondary"><i class="fas fa-file me-2"></i> Surat Pengantar Protokol</h4>
                                            <hr>
                                            @isset($protocol)
                                                @if(!is_null($protocol->research_ethic->surat_pengantar))
                                                <button class="btn btn-secondary mb-2" type="button"                         
                                                    href="{{ $protocol->research_ethic->surat_pengantar }}"
                                                    data-fancybox>Lihat Dokumen</button>
                                                @else
                                                <p>Tidak ada dokumen</p>
                                                @endif
                                            @endisset
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <h4 class="text-secondary"><i class="fas fa-file me-2"></i> Bukti Pembayaran Uji Layak Etik</h4>
                                            <hr>
                                            @isset($protocol)
                                                @if(!is_null($protocol->research_ethic->eviden_paid))
                                                <button class="btn btn-secondary mb-2" type="button"                         
                                                    href="{{ $protocol->research_ethic->eviden_paid }}"
                                                    data-fancybox>Lihat Dokumen</button>
                                                @else
                                                <p>Tidak ada dokumen</p>
                                                @endif
                                            @endisset
                                        </div>
                                    </div>
                                    @include('dashboard.layaketik.components.card_formprotocol')
                                </div>
							</div>
						</div>
						<div id="selfassesment" class="tab-pane fade">
							<div class="row">
								<div class="col-12">
                                    @include('dashboard.layaketik.components.card_formselfassesment')
                                </div>
							</div>
						</div>
                        <div id="resume" class="tab-pane fade">
							<div class="row">
								<form id="tambah_resume" class="col-12">
                                    <input type="hidden" name="id" value="{{ $protocol->research_ethic->id }}" required>
                                    <h4 class="text-secondary">Resume Sekretaris</h4>
                                    <hr>
                                    <textarea name="resume" class="resume">
                                        {{ isset($resume_review)? $resume_review->resume: "" }}
                                    </textarea>
                                    <button type="submit" class="btn btn-primary mt-4">Simpan</button>
                                </form>
							</div>
						</div>
					</div>
				</div>
            </div>
        </div>
    </div>    
@endsection
@section('script')
	<script src="{{ asset('assets/vendor/fancyapps/fancybox.umd.js') }}"></script>
    <script src="{{ asset('assets/vendor/ckeditor5/build/ckeditor.js') }}"></script>
    <script src="{{ asset('assets/vendor/jquery-steps/build/jquery.steps.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/jquery-smartwizard/dist/js/jquery.smartWizard.js') }}"></script>

    @if(isset($self_assesment))
        <script>
            $(document).ready(function(){
                const data_selfassesment = {
                    'sosial': JSON.parse('{!! json_encode($self_assesment->nilai_sosial) !!}'),
                    'ilmiah': JSON.parse('{!! json_encode($self_assesment->nilai_ilmiah) !!}'),
                    'pemerataan': JSON.parse('{!! json_encode($self_assesment->pemerataan) !!}'),
                    'potensi': JSON.parse('{!! json_encode($self_assesment->potensi) !!}'),
                    'bujukan': JSON.parse('{!! json_encode($self_assesment->bujukan) !!}'),
                    'privacy': JSON.parse('{!! json_encode($self_assesment->privacy) !!}'),
                    'informed_consent': JSON.parse('{!! json_encode($self_assesment->informed_consent) !!}'),
                    'catatan_nilaisosial': JSON.parse('{!! json_encode($self_assesment->catatan_nilaisosial) !!}'),
                    'catatan_nilaiilmiah': JSON.parse('{!! json_encode($self_assesment->catatan_nilaiilmiah) !!}'),
                    'catatan_pemerataan': JSON.parse('{!! json_encode($self_assesment->catatan_pemerataan) !!}'),
                    'catatan_potensi': JSON.parse('{!! json_encode($self_assesment->catatan_potensi) !!}'),
                    'catatan_bujukan': JSON.parse('{!! json_encode($self_assesment->catatan_bujukan) !!}'),
                    'catatan_privacy': JSON.parse('{!! json_encode($self_assesment->catatan_privacy) !!}'),
                    'catatan_informedconsent': JSON.parse('{!! json_encode($self_assesment->catatan_informedconsent) !!}')
                }

                const radio_ = $('input:radio'), textarea_ = $('#smartwizard textarea');

                $.each(radio_, (i, val) => {
                    let name_parent = $(val).attr('name').split("_")[0],
                        name_child = $(val).attr('name')

                    if(data_selfassesment[name_parent]){
                        if(data_selfassesment[name_parent][name_child]){
                            $(val).filter('[value='+data_selfassesment[name_parent][name_child]+']').prop('checked', true).change();
                        }
                    }

                    if(name_child == 'informed_consent'){
                        if(data_selfassesment[name_child]){
                            $(val).filter('[value='+data_selfassesment[name_child]+']').prop('checked', true).change();
                        }   
                    }
                })

                $.each(textarea_, (i, val) => $(val).val(data_selfassesment[$(val).attr('name')]))
                
                $('#selfassesment input:radio,#selfassesment textarea').prop('disabled', true)
            })
        </script>
    @endif

    <script>
        let editors = [];   

        function createEditor( elementId, from = null) {
            return ClassicEditor
                .create( document.querySelector( '.' + elementId ), {
                    extraPlugins: [ MyCustomUploadAdapterPlugin ],  
                } )
                .then( editor => { 
                    editors[ elementId ] = editor 
                    if(from) editor.enableReadOnlyMode(elementId)
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

            createEditor('resume')
            
            $.validator.addMethod('ckrequired', function (value, element, params) {
                var idname = $(element).attr('class');
                var messageLength =  getDataFromTheEditor(idname)? $.trim ( getDataFromTheEditor(idname) ) : $(element).val();
                return !params  || messageLength.length !== 0;
            }, "This field is required.");
            
            $('#smartwizard').smartWizard({
                anchor: {
                    markDoneStep: true,
                    markAllPreviousStepsAsDone: true, // When a step selected by url hash, all previous steps are marked done
                    removeDoneStepOnNavigateBack: false,
                }
            });

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
                            createEditor(_class, 1)
                            console.log(`${_class}, created`)
                        }
                    })
                }

			})

            $('#tambah_resume').validate({
                ignore : [],
                rules:{
                    resume:{ ckrequired: true }
				},
				submitHandler: function (form) {
                    const dataForm = $(form).serializeObject();

                    Swal.fire({
                        title: `Apakah yakin ingin menyimpan resume?`,
                        showCancelButton: true,
                        confirmButtonText: `Save`
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $.ajax({
                                url: "{{ route('layaketik.protocol.resume.store') }}",
                                method: 'POST',
                                data: dataForm,
                                async: false,
                                dataType: 'json',
                                beforeSend: function(){
                                    $('#preloader').removeClass('d-none');
                                    $('#main-wrapper').removeClass('show');
                                }
                            }).done(function (data) {						
                                if(data.success){
                                    alertSuccess("Berhasil", data.msg)
                                    window.location.href = "{{ route('layaketik.protocol.resume') }}";
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