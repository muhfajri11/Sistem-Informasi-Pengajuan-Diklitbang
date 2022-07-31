@extends('dashboard.layouts.app')

@section('title', "Form Perbaikan Protokol")

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
                    <h4>{{ $revision->research_ethic->research->judul }}</h4>
                    <p class="mb-0">Peneliti Utama: {{ $revision->research_ethic->research->ketua }}</p>
                    <a href="" class="btn btn-primary mt-4"><i class="fas fa-print me-2"></i> Print Protokol</a>
                    <button data-id="{{ $revision->research_ethic->id }}" data-bs-toggle="modal" data-bs-target="#modal_detailresearch" class="btn btn-primary mt-4"><i class="fas fa-info me-2"></i> Lihat Detail</button>
                </div>
                <div class="col-12 mb-3">
                    <hr>
                    <p class="mb-0">
                        <strong>Perbaikan Ke: </strong>
                        <span class="badge badge-warning">
                            {{ $revision->result_review->revision }}
                        </span> || 
                        <strong>Klasifikasi: </strong>
                        <span class="badge badge-dark">
                            {{ $revision->result_review->status }}
                        </span>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="col-12 mb-3">
        <div class="accordion accordion-primary-solid" id="accordion-two">
            <div class="accordion-item">
                <div class="accordion-header  rounded-lg" id="accord-2One" data-bs-toggle="collapse" data-bs-target="#collapse2One" aria-controls="collapse2One" aria-expanded="true" role="button">
                    <span class="accordion-header-text">Catatan Perbaikan</span>
                    <span class="accordion-header-indicator"></span>
                </div>
                <div id="collapse2One" class="collapse accordion__body show" aria-labelledby="accord-2One" data-bs-parent="#accordion-two">
                    <div class="accordion-body-text">
                        {{ $revision->resume_catatan }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-12">
        <div class="card">
            <div class="card-body">
                @if(!isset($view))
                <form id="tambah_revisionprotocol" enctype="multipart/form-data" @if(isset($protocol)) data-edit="1" @endif  novalidate>
                    <input type="hidden" name="id" value="{{ $revision->research_ethic->id }}" required>
                    <input type="hidden" name="revision" value="{{ $revision->revision }}" required>
                @endif
                    <div class="custom-tab-1">
                        <ul class="nav nav-tabs">
                            <li class="nav-item">
                                <a href="#protocol" data-bs-toggle="tab" class="nav-parent nav-link active show">Protokol</a>
                            </li>
                            <li class="nav-item">
                                <a href="#selfassesment" data-bs-toggle="tab" class="nav-parent nav-link">Self Assesment</a>
                            </li>
                        </ul>
                        <div class="tab-content pt-4">
                            <div id="protocol" class="tab-pane fade active show">
                                <div class="row">
                                    <div class="col-12">
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
                        </div>
                    </div>
                @if(!isset($view))
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary mt-4">Simpan</button>
                        <a href="{{ route('layaketik.revision.protocol') }}" class="btn btn-dark mt-4">Kembali</a>
                    </div>
                </form>
                @endif
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

                const radio_ = $('#smartwizard input:radio'), textarea_ = $('#smartwizard textarea');

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

            // $.validator.addMethod('ckrequired', function (value, element, params) {
            //     var idname = $(element).attr('class');
            //     var messageLength =  getDataFromTheEditor(idname)? $.trim ( getDataFromTheEditor(idname) ) : $(element).val();
            //     return !params  || messageLength.length !== 0;
            // }, "This field is required.");
            
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
                            createEditor(_class)
                            console.log(`${_class}, created`)
                        }
                    })
                }
			})

            $('.tab-pane').on('click', '.clear_dot', function(e){
                e.preventDefault();
                const tab = $(this).closest('.tab-pane'),
                      radio = tab.find('input:radio:checked');
                
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
            '.child_1, .child_1_1, .child_2, .child_2_1, .child_2_1_, .child_2_2, .child_2_2_, .child_3, .child_3_11, .child_4, .child_5, .child_6, .child_6_4',
            function(e){
                const tab = $(this).closest('.tab-pane'),
                    data_child = $(this).attr('data-child'),
                    dots = [
                        {parent: "parent_1", child: "child_1"},
                        {parent: "parent_1_1", child: "child_1_1"},
                        {parent: "parent_2", child: "child_2"},
                        {parent: "parent_2_1", child: "child_2_1"},
                        {parent: "parent_2_1_", child: "child_2_1_"},
                        {parent: "parent_2_2", child: "child_2_2"},
                        {parent: "parent_2_2_", child: "child_2_2_"},
                        {parent: "parent_3", child: "child_3"},
                        {parent: "parent_3_11", child: "child_3_11"},
                        {parent: "parent_4", child: "child_4"},
                        {parent: "parent_5", child: "child_5"},
                        {parent: "parent_6", child: "child_6"},
                        {parent: "parent_6_4", child: "child_6_4"},
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

            $('#tambah_revisionprotocol').validate({
                ignore : [],
				rules:{
                    judul:{ required: true },
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
                        textarea_ = $('textarea'),
                        is_edit = $(form).data('edit');

                    $.each(textarea_, function(i, val){
                        if(getDataFromTheEditor($(val).attr('name')))
                            dataForm.set($(val).attr('name'), getDataFromTheEditor($(val).attr('name')))
                    })

                    const radio_choose = $('input:radio').filter(':checked'),
                          _radio = $('input:radio:disabled').filter(':checked')
                          results = {
                            nilai_sosial: {},
                            nilai_ilmiah: {},
                            pemerataan: {},
                            potensi: {},
                            bujukan: {},
                            privacy: {},
                          };
                    let serialized = {};
                    
                    $.each(radio_choose, function(i, val){
                        serialized[$(val).attr('name')] = $(val).val()
                        if($(val).attr('name') != 'informed_consent'){
                            dataForm.delete($(val).attr('name'))
                        }
                    });

                    $.each(_radio, function(i, val){
                        serialized[$(val).attr('name')] = $(val).val()
                    });

                    for(const data in serialized){
                        let _data = data.split('_');
                        switch(_data[0]){
                            case 'sosial':
                                results['nilai_sosial'][data] = serialized[data];
                                break;
                            case 'ilmiah':
                                results['nilai_ilmiah'][data] = serialized[data];
                                break;
                            case 'pemerataan':
                                results['pemerataan'][data] = serialized[data];
                                break;
                            case 'potensi':
                                results['potensi'][data] = serialized[data];
                                break;
                            case 'bujukan':
                                results['bujukan'][data] = serialized[data];
                                break;
                            case 'privacy':
                                results['privacy'][data] = serialized[data];
                                break;
                            default:
                                results[data] = serialized[data];
                                break;
                        }
                    }

                    dataForm.set('self_assesment', JSON.stringify(results));
                    if(is_edit) dataForm.set('is_edit', 1);

                    consoleForm(dataForm)

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
                                url: "{{ route('layaketik.revision.protocol.store') }}",
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
                                    window.location.href = "{{ route('layaketik.revision.protocol') }}";
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