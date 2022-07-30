@extends('dashboard.layouts.app')

@php
$title = is_null($view)? "Form Telaah Cepat Protokol" : "Detail Telaah Cepat Protokol";
@endphp
@section('title', $title)

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
                <div class="col-12">
                    <h4>{{ $protocol->research_ethic->research->judul? $protocol->research_ethic->research->judul: "" }}</h4>
                    <p class="mb-0">Peneliti Utama: {{ $protocol->research_ethic->research->ketua? $protocol->research_ethic->research->ketua: "" }}</p>
                    <a href="{{ route('layaketik.protocol.print', ['hash'=>$hashids->encode($protocol->id)]) }}" class="btn btn-primary mt-4"><i class="fas fa-print me-2"></i> Print Protokol</a>
                    <button data-id="{{ $protocol->research_ethic->id }}" data-bs-toggle="modal" data-bs-target="#modal_detailresearch" class="btn btn-primary mt-4"><i class="fas fa-info me-2"></i> Lihat Detail</button>
                </div>
                @if(!is_null($view))
                <div class="col-12 mb-3">
                    <hr>
                    <p class="mb-0"><strong>Penelaah: </strong>{{ $quick_review->user->name }}</p>
                    <p class="mb-0"><strong>Ditelaah pada: </strong> {{ $quick_review->created_at }}</p>
                </div>
                @endif
            </div>
        </div>
    </div>

    <div class="col-12">
        <div class="card">
            <div class="card-body">
				<div class="custom-tab-1">
					<ul class="nav nav-tabs">
                        <li class="nav-item">
							<a href="#resume" data-bs-toggle="tab" class="nav-parent nav-link active show">Resume</a>
						</li>
						<li class="nav-item">
							<a href="#protocol" data-bs-toggle="tab" class="nav-parent nav-link">Protokol</a>
						</li>
						<li class="nav-item">
							<a href="#selfassesment" data-bs-toggle="tab" class="nav-parent nav-link">Self Assesment</a>
						</li>
                        <li class="nav-item">
							<a href="#kesimpulan" data-bs-toggle="tab" class="nav-parent nav-link">Kesimpulan</a>
						</li>
					</ul>
					<div class="tab-content pt-4">
                        <div id="resume" class="tab-pane fade active show">
                            <div class="row">
                                <div class="col-12">
                                    <h4 class="text-secondary font-w600">Resume Sekretaris</h4>
                                    <hr>
                                    {!! $resume_review->resume !!}
                                </div>
                            </div>
                        </div>
						<div id="protocol" class="tab-pane fade">
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
                        @if(is_null($view)) 
                        <form id="kesimpulan" class="tab-pane fade">
                            <input type="hidden" name="id" value="{{ $protocol->research_ethic->id }}" required>
                        @else
                        <div id="kesimpulan" class="tab-pane fade">
                        @endif
							<div class="row">
                                <div class="col-12">
                                    <h4 class="text-secondary">Klasifikasi Usulan Penelaah Etik</h4>
                                    <hr>
                                    <div class="col-12">
                                        <div class="form-check form-check-inline">
                                            <label class="form-check-label font-w600">
                                                <input class="form-check-input" type="radio" name="status" value="exempted"> Exempted
                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <label class="form-check-label font-w600">
                                                <input class="form-check-input" type="radio" name="status" value="expedited"> Expedited
                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <label class="form-check-label font-w600">
                                                <input class="form-check-input" type="radio" name="status" value="fullboard"> Fullboard
                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <label class="form-check-label font-w600">
                                                <input class="form-check-input" type="radio" name="status" value="ditolak"> Tidak bisa ditelaah
                                            </label>
                                        </div>
                                    </div>
                                    <h4 class="text-secondary mt-2">Kesimpulan:</h4>
                                    <hr>
                                    <div class="col-12">
                                        <textarea name="kesimpulan" class="form-control" required>{{ !is_null($quick_review)?$quick_review->kesimpulan: "" }}</textarea>
                                    </div>
                                    @if(is_null($view))
                                    <button type="submit" class="btn btn-primary mt-4">Simpan</button>
                                    @endif
                                </div>
							</div>
                        @if(is_null($view)) 
                        </form>
                        @else
                        </div>
                        @endif
					</div>
				</div>
            </div>
        </div>
    </div>    

    @include('dashboard.layaketik.components.mdetail_research')
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

                const radio_ = $('#smartwizard input:radio:not(.telaah_assesment)'), textarea_ = $('#smartwizard textarea:not(.telaah_assesment)');

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
            })
        </script>
    @endif

    @if(isset($quick_review))
        <script>
            $(document).ready(function(){
                const radio_usulan = $('input:radio[name=status]');
                
                radio_usulan.filter('[value={{ $quick_review->status }}]').prop('checked', true).change();

                const data_quickreview = {
                    'sosial': JSON.parse('{!! json_encode($quick_review->nilai_sosial) !!}'),
                    'ilmiah': JSON.parse('{!! json_encode($quick_review->nilai_ilmiah) !!}'),
                    'pemerataan': JSON.parse('{!! json_encode($quick_review->pemerataan) !!}'),
                    'potensi': JSON.parse('{!! json_encode($quick_review->potensi) !!}'),
                    'bujukan': JSON.parse('{!! json_encode($quick_review->bujukan) !!}'),
                    'privacy': JSON.parse('{!! json_encode($quick_review->privacy) !!}'),
                    'informed_consent': JSON.parse('{!! json_encode($quick_review->informed_consent) !!}'),
                    'catatan_nilaisosial': JSON.parse('{!! json_encode($quick_review->catatan_nilaisosial) !!}'),
                    'catatan_nilaiilmiah': JSON.parse('{!! json_encode($quick_review->catatan_nilaiilmiah) !!}'),
                    'catatan_pemerataan': JSON.parse('{!! json_encode($quick_review->catatan_pemerataan) !!}'),
                    'catatan_potensi': JSON.parse('{!! json_encode($quick_review->catatan_potensi) !!}'),
                    'catatan_bujukan': JSON.parse('{!! json_encode($quick_review->catatan_bujukan) !!}'),
                    'catatan_privacy': JSON.parse('{!! json_encode($quick_review->catatan_privacy) !!}'),
                    'catatan_informedconsent': JSON.parse('{!! json_encode($quick_review->catatan_informedconsent) !!}')
                }

                const radio_ = $('#smartwizard input:radio.telaah_assesment'), textarea_ = $('#smartwizard textarea.telaah_assesment');

                $.each(radio_, (i, val) => {
                    let name_parent = $(val).attr('name').slice(7).split("_")[0],
                        name_child = $(val).attr('name').slice(7)

                    console.log(name_parent + ", " + name_child)

                    if(data_quickreview[name_parent]){
                        if(data_quickreview[name_parent][name_child]){
                            $(val).filter('[value='+data_quickreview[name_parent][name_child]+']').prop('checked', true).change();
                        }
                    }

                    if(name_child == 'informed_consent'){
                        if(data_quickreview[name_child]){
                            $(val).filter('[value='+data_quickreview[name_child]+']').prop('checked', true).change();
                        }   
                    }
                })

                $.each(textarea_, (i, val) => {
                    $(val).val(data_quickreview[$(val).attr('name').slice(7)])
                })
            })
        </script>
    @endif

    @if(!is_null($view))
        <script>
            $(document).ready(function(){
                const form_peneliti = $('#smartwizard input:radio, #smartwizard textarea, #kesimpulan textarea, #kesimpulan input:radio');
                $.each(form_peneliti, (i, val) => $(val).prop('disabled', true))
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
                    editors[ elementId ] = editor;
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

            const setBadgeStatus = status => {
				switch(status){
					case "propose":
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

			const setBadge = value => {
				switch(value){
					case 1:
						return `
						<span class="badge mx-auto badge-pill badge-secondary">
							Iya
						</span>`;
						break;
					case 0:
						return `
						<span class="badge mx-auto badge-pill badge-dark">
							Tidak
						</span>`;
						break;
                    default: 
                        return '';
                        break;
				}
			}

			const setKerjasama = value => {
				switch(value){
					case 'bukan_kerjasama':
						return `
						<span class="badge mx-auto badge-pill badge-dark">
							Bukan Kerjasama
						</span>`;
						break;
					case 'nasional':
						return `
						<span class="badge mx-auto badge-pill badge-secondary">
							Nasional
						</span>`;
						break;
					case 'internasional':
						return `
						<span class="badge mx-auto badge-pill badge-secondary">
							Internasional
						</span>`;
						break;
					case 'peneliti_asing':
						return `
						<span class="badge mx-auto badge-pill badge-secondary">
							Melibatkan peneliti asing
						</span>`;
						break;
                    default: 
						return ``;
                        break;
				}
			}

            const form_peneliti = $('#smartwizard input:radio:not(.telaah_assesment), #smartwizard textarea:not(.telaah_assesment)');
            $.each(form_peneliti, (i, val) => $(val).prop('disabled', true))
            
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

            $('.tab-pane').on('click', '.clear_dot', function(e){
                e.preventDefault();
                const tab = $(this).closest('.tab-pane'),
                      radio = tab.find('input:radio:checked.telaah_assesment');
                
                radio.prop('checked', false);
            })

            const change_dot = function(tab, parent, child){
                const checked = tab.find(`.${child}`).filter('input:radio:checked');
                let result = [];

                $.each(checked, (i, val) => result.push($(val).val()))
                result = result.filter(data => data == 1);

                tab.find(`.${parent}`).prop('checked', false);
                if(result.length > 0)
                    tab.find(`.${parent}`).filter(`[value=1]`).prop('checked', true).change();

                if(result.length == 0)
                    tab.find(`.${parent}`).filter(`[value=0]`).prop('checked', true).change();
            }

            $('.tab-pane').on('change', 
            '.telaah_child_1, .telaah_child_1_1, .telaah_child_2, .telaah_child_2_1, .telaah_child_2_1_, .telaah_child_2_2, .telaah_child_2_2_, .telaah_child_3, .telaah_child_3_11, .telaah_child_4, .telaah_child_5, .telaah_child_6, .telaah_child_6_4',
            function(e){
                const tab = $(this).closest('.tab-pane'),
                    data_child = $(this).attr('data-child'),
                    dots = [
                        {parent: "telaah_parent_1", child: "telaah_child_1"},
                        {parent: "telaah_parent_1_1", child: "telaah_child_1_1"},
                        {parent: "telaah_parent_2", child: "telaah_child_2"},
                        {parent: "telaah_parent_2_1", child: "telaah_child_2_1"},
                        {parent: "telaah_parent_2_1_", child: "telaah_child_2_1_"},
                        {parent: "telaah_parent_2_2", child: "telaah_child_2_2"},
                        {parent: "telaah_parent_2_2_", child: "telaah_child_2_2_"},
                        {parent: "telaah_parent_3", child: "telaah_child_3"},
                        {parent: "telaah_parent_3_11", child: "telaah_child_3_11"},
                        {parent: "telaah_parent_4", child: "telaah_child_4"},
                        {parent: "telaah_parent_5", child: "telaah_child_5"},
                        {parent: "telaah_parent_6", child: "telaah_child_6"},
                        {parent: "telaah_parent_6_4", child: "telaah_child_6_4"},
                    ];
                let result;
                
                $.each(dots, function(i, val){
                    if(val.child == data_child){
                        result = val;
                        return false;
                    }
                })

                change_dot(tab, result.parent, result.child)
            })

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

            $('#modal_detailresearch').on('show.bs.modal', function (e) {
				const modal = $(this),
					  data_id = $(e.relatedTarget).data('id');

				$.ajax({
					url: "{{ route('layaketik.get') }}",
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

						modal.find('#judul_view').html(data.get.research.judul);
						modal.find('#title_view').html(data.get.research.title);
						modal.find('#tipe_view').html(data.get.research.tipe_penelitian);
						modal.find('#institusi_view').html(data.get.research.institution ? data.get.research.institution.name : "Tidak ada");

						modal.find('#ketua_view').html(data.get.research.ketua);
						modal.find('#nik_view').html(data.get.research.nik);
						modal.find('#jenjang_view').html(data.get.research.education_level ? data.get.research.education_level.name : "Tidak ada");
						modal.find('#jenis_view').html(data.get.research_type ? data.get.research_type.name : "Tidak ada");
						modal.find('#asal_view').html(data.get.origin_proposer ? data.get.origin_proposer.name : "Tidak ada");
						modal.find('#lembaga_view').html(data.get.institution_proposer ? data.get.institution_proposer.name : "Tidak ada");
						modal.find('#_status_view').html(data.get.status_proposer ? data.get.status_proposer.name : "Tidak ada");

						modal.find('#phone_view').html(data.get.research.phone);
						modal.find('#address_view').html(data.get.research.address);
						if(data.get.research.anggota.length > 0){
							let anggota = ``;
							$.each(data.get.research.anggota, (i, val) => {
								anggota += val + ", ";
							})
							modal.find('#anggota_view').html(anggota)
							modal.find('.is_anggota').removeClass('d-none')
						} else {
							modal.find('.is_anggota').addClass('d-none')
							modal.find('#anggota_view').html('')
						}

						modal.find('#tempat_view').html(data.get.research.tempat);
						modal.find('#start_view').html(data.get.research.start_date);
						modal.find('#end_view').html(data.get.research.end_date);
						
						if(Number.isInteger(data.get.research.is_layaketik)){
							modal.find('#layaketik_view').html(setBadgeEtik(data.get.research.is_layaketik))
							modal.find('.is_layaketik').removeClass('d-none')
						} else {
							modal.find('#layaketik_view').html('')
							modal.find('.is_layaketik').addClass('d-none')
						}

						modal.find('#sumberdana_view').html(data.get.sumber_dana);
						modal.find('#totaldana_view').html(`Rp ${currency.format(data.get.total_dana)}`);

						modal.find('#kerjasama_view').html(setKerjasama(data.get.kerjasama));

						switch(data.get.kerjasama){
							case 'internasional': 
								modal.find('.is_internasional').removeClass('d-none');
								modal.find('.is_asing').addClass('d-none');

								modal.find('#negara_view').html(data.get.jumlah_negara + " Negara");
								modal.find('.table-asing').html('');
								break;
							case 'peneliti_asing': 
								modal.find('.is_internasional').addClass('d-none');
								modal.find('.is_asing').removeClass('d-none');

								modal.find('#negara_view').html('');
								
								let data_asing = ``;
								$.each(data.get.peneliti_asing, function(i, val){
									data_asing += `
										<tr>
											<td>${val.nama}</td>
											<td>${val.institution}</td>
											<td>${val.job}</td>
											<td>${val.phone}</td>
										</tr>
									`;
								});
								modal.find('.table-asing').html(data_asing);
							break;
							default: 
								modal.find('.is_internasional').addClass('d-none');
								modal.find('.is_asing').addClass('d-none');
								modal.find('#negara_view').html('');
								modal.find('.table-asing').html('');
								break;
						}

						modal.find('#multisenter_view').html(setBadge(data.get.is_multisenter));

						if(data.get.is_multisenter){
							modal.find('.is_tempatmultisenter').removeClass('d-none');
							modal.find('.is_accmultisenter').removeClass('d-none');

							modal.find('#tempatmultisenter_view').html(data.get.tempat_multisenter);
							modal.find('#accmultisenter_view').html(setBadge(data.get.acc_multisenter));
						} else {
							modal.find('.is_tempatmultisenter').addClass('d-none');
							modal.find('.is_accmultisenter').addClass('d-none');

							modal.find('#tempatmultisenter_view').html('');
							modal.find('#accmultisenter_view').html('');
						}

						modal.find('#pay_view').html(`Rp ${currency.format(data.get.research.total_paid)}`)
						modal.find('#status_view').html(setBadgeStatus(data.get.research.status));
						modal.find('#statuspay_view').html(setBadgePay(data.get.research.paid));

						modal.find('#payetik_view').html(data.get.research_fee?`Rp ${currency.format(data.get.research_fee.fee)}`:"Tidak terdefinisi")
						modal.find('#statusetik_view').html(setBadgeStatus(data.get.status));
						modal.find('#statuspayetik_view').html(setBadgePay(data.get.paid));

						htmlBtn = $(htmlBtnShow).attr({
							href: data.get.research.permohonan,
							"data-type": 'pdf'
						})
						modal.find('#permohonan_view').html(htmlBtn)

						htmlBtn = $(htmlBtnShow).attr({
							href: data.get.research.proposal,
							"data-type": 'pdf'
						})
						modal.find('#proposal_view').html(htmlBtn)

						htmlBtn = $(htmlBtnShow).attr({
							href: data.get.surat_pengantar,
							"data-type": 'pdf'
						})
						modal.find('#pengantar_view').html(htmlBtn)

						if(data.get.research.eviden_paid){
							htmlBtn = $(htmlBtnShow).attr('href', data.get.research.eviden_paid)
							check = data.get.research.eviden_paid.split('.')[1];
							if(check == 'pdf') htmlBtn.attr('data-type', 'pdf');

							modal.find('#evidenpaid_view').html(htmlBtn)
						} else {
							modal.find('#evidenpaid_view').html('<p class="font-w600">Tidak Ada Bukti</p>')
						}

						if(data.get.eviden_paid){
							htmlBtn = $(htmlBtnShow).attr('href', data.get.eviden_paid)
							check = data.get.eviden_paid.split('.')[1];
							if(check == 'pdf') htmlBtn.attr('data-type', 'pdf');

							modal.find('#evidenpaidetik_view').html(htmlBtn)
						} else {
							modal.find('#evidenpaidetik_view').html(btnEviden)
						}

						if(data.get.research.izin_penelitian){
							htmlBtn = $(htmlBtnShow).attr({
								href: data.get.research.izin_penelitian,
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
								url: 'https://dev.farizdotid.com/api/daerahindonesia/provinsi/' + data.get.research.province,
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
								url: 'https://dev.farizdotid.com/api/daerahindonesia/kota/' + data.get.research.city,
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
						alertError("Terjadi Kesalahan", data.msg)
					}

					$('#preloader').addClass('d-none');
					$('#main-wrapper').addClass('show');
				}).fail(function(data){
					console.log(data.responseText)
				});
			})

            $('#kesimpulan').validate({
                ignore : [],
                rules:{
                    usulan:{ required: true },
                    kesimpulan:{ required: true, alphanumeric: true },
				},
				submitHandler: function (form) {
                    const dataForm = $(form).serializeObject(),
                          radio_telaah = $('#smartwizard input:radio:checked.telaah_assesment'),
                          text_telaah = $('#smartwizard textarea.telaah_assesment');

                    dataForm['nilai_sosial'] = {};
                    dataForm['nilai_ilmiah'] = {};
                    dataForm['pemerataan'] = {};
                    dataForm['potensi'] = {};
                    dataForm['bujukan'] = {};
                    dataForm['privacy'] = {};

                    $.each(text_telaah, function(i, val){
                        let text_ = $(val).attr('name').slice(7);
                        dataForm[text_] = $(val).val()
                    });

                    $.each(radio_telaah, function(i, val){
                        let text_ = $(val).attr('name').slice(7),
                            splited = text_.split('_')[0];
                        
                        switch(splited){
                            case "sosial": 
                                dataForm['nilai_sosial'][text_] = $(val).filter(':checked').val();
                                break;
                            case "ilmiah":
                                dataForm['nilai_ilmiah'][text_] = $(val).filter(':checked').val();
                                break;
                            case "pemerataan":
                            case "potensi":
                            case "bujukan":
                            case "privacy":
                                dataForm[splited][text_] = $(val).filter(':checked').val();
                                break;
                        }

                        if(text_ == 'informed_consent') dataForm[text_] = $(val).filter(':checked').val();
                    })

                    console.log(dataForm)
                    Swal.fire({
                        title: `Apakah yakin ingin menyimpan resume?`,
                        text: `Periksa kembali self assesment penelaah, klasifikasi, dan kesimpulan anda.`,
                        showCancelButton: true,
                        confirmButtonText: `Save`
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $.ajax({
                                url: "{{ route('layaketik.telaah.cepat.store') }}",
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
                                    window.location.href = "{{ route('layaketik.telaah.cepat') }}";
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