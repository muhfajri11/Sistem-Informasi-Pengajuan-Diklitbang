@extends('dashboard.layouts.app')

@section('title', "Form Self Assesment")

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
    </style>
@endsection

@section('content')
    <div class="d-block d-md-none col-12">
        <div class="card px-4 py-3">
            <h3 class="text-secondary mb-0"><i class="fas fa-atom me-2"></i> @yield('title')</h3>
        </div>
    </div>

    <form id="tambah_selfassesment" enctype="multipart/form-data" novalidate>
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
                                @foreach ($result as $data)
                                    <option value="{{ $data->id }}">{{ $data->research->ketua }} - {{ $data->research->judul }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('dashboard.layaketik.components.card_formselfassesment')

    </form>
@endsection

@section('script')
	<script src="{{ asset('assets/vendor/fancyapps/fancybox.umd.js') }}"></script>
    <script src="{{ asset('assets/vendor/jquery-steps/build/jquery.steps.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/jquery-smartwizard/dist/js/jquery.smartWizard.js') }}"></script>

    <script>
        $(document).ready(function(){
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

            // $('.tab-pane').on('change', '.child_1', function(e){
            //     const tab = $(this).closest('.tab-pane');
            //     change_dot(tab, 'parent_1', 'child_1')
            // })
            $('#tambah_selfassesment').validate({
                ignore : [],
				submitHandler: function (form) {
                    const dataForm = $(form).serializeObject(),
                          _radio = $('input:radio:disabled').filter(':checked')
                          results = {
                            nilai_sosial: {},
                            nilai_ilmiah: {},
                            pemerataan: {},
                            potensi: {},
                            bujukan: {},
                            privacy: {},
                          };
                    
                    $.each(_radio, function(i, val){
                        dataForm[$(val).attr('name')] = $(val).val()
                    });

                    for(const data in dataForm){
                        let _data = data.split('_');
                        switch(_data[0]){
                            case 'sosial':
                                results['nilai_sosial'][data] = dataForm[data];
                                break;
                            case 'ilmiah':
                                results['nilai_ilmiah'][data] = dataForm[data];
                                break;
                            case 'pemerataan':
                                results['pemerataan'][data] = dataForm[data];
                                break;
                            case 'potensi':
                                results['potensi'][data] = dataForm[data];
                                break;
                            case 'bujukan':
                                results['bujukan'][data] = dataForm[data];
                                break;
                            case 'privacy':
                                results['privacy'][data] = dataForm[data];
                                break;
                            default:
                                results[data] = dataForm[data];
                                break;
                        }
                    }

                    Swal.fire({
                        title: `Apakah yakin ingin menyimpan?`,
                        showCancelButton: true,
                        confirmButtonText: `Save`
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $.ajax({
                                url: "{{ route('layaketik.protocol.selfassesment.store') }}",
                                method: 'POST',
                                data: results,
                                async: false,
                                dataType: 'json',
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