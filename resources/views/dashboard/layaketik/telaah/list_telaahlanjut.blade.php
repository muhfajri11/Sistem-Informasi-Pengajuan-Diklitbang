@extends('dashboard.layouts.app')

@section('title', "Daftar Telaah Lanjut")

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
    @php
        $hashids = new Hashids\Hashids();
    @endphp

    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title text-primary">Judul Penelitian</h5>
            </div>
            <div class="card-body">
                <div class="col-12 mb-3">
                    <h4>{{ !empty($result)? $result->research_ethic->research->judul: "" }}</h4>
                    <p class="mb-0">Peneliti Utama: {{ !empty($result)? $result->research_ethic->research->ketua: "" }}</p>
                    @if(!empty($result))
                    <hr>
                    <p class="mb-0">
                        <strong>Perbaikan Ke: </strong>
                        <span class="badge badge-warning">
                            {{ $result->revision }}
                        </span> || 
                        <strong>Klasifikasi: </strong>
                        <span class="badge badge-dark">
                            {{ $result->status }}
                        </span>
                    </p>
                    <a href="{{ route('layaketik.protocol.print', ['hash'=>$hashids->encode($result->research_ethic->protocol->id)]) }}" class="btn btn-primary mt-4"><i class="fas fa-print me-2"></i> Print Protokol</a>
                    <button data-id="{{ $result->research_ethic->id }}" data-bs-toggle="modal" data-bs-target="#modal_detailresearch" class="btn btn-primary mt-4"><i class="fas fa-info me-2"></i> Lihat Detail</button>
                    <hr>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="col-12">
        <div class="card">
            <div class="card-body">
				<div class="row">
                    <div class="col-12">
                        <div class="d-flex justify-content-between mb-4">
                            <h3 class="font-weight-bold">Hasil Telaah Lanjut</h3>
                            <button type="button" data-table="#data_protocol" class="btn btn-primary btn_refresh">
                                <i class="fas fa-sync-alt"></i> Refresh Data
                            </button>
                        </div>
                        <div class="table-responsive">
                            <table id="data_protocol" class="display" style="width: 100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Penelaah</th>
                                        <th>Tanggal Telaah</th>
                                        <th>Klasifikasi Usulan</th>
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

    @include('dashboard.layaketik.components.mdetail_research')
@endsection

@section('script')
	<script src="{{ asset('assets/vendor/fancyapps/fancybox.umd.js') }}"></script>

    <script>
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

            const dataProtocols = setDatatables;

            $.extend(dataProtocols, {
                    "ajax": {
                        "type": "POST",
                        "url": `{{ route('layaketik.telaah.lanjut.reviewed', ['status' => 'expedited', 'admin' => $id]) }}`,
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
                                return data.user;
                            }
                        },
                        {
                            "mData": null,
                            "render": function (data, row, type, meta) {
                                return data.tgl_telaah;
                            }
                        },
                        {
                            "mData": null,
                            "render": function (data, row, type, meta) {
                                return setUsulan(data.usulan);
                            }
                        },
                        {
                            "mData": null,
                            "sortable": false,
                            "render": function (data, row, type, meta) {
                                
                                let btn = `
                                <a href="{{ URL::to('/dashboard/layaketik/telaah/lanjut/') }}/${ data.id }/1"
                                    class="btn btn-primary shadow btn-xs px-2">
                                    <i class="fas fa-eye me-1"></i> <span class="d-none d-sm-block">View</span>
                                </a>`;

                                return btn;
                            }
                        }
                    ]
                })

            let protocol_datatable = $('#data_protocol').DataTable(dataProtocols);

            const reloadData = idTag => {
                let text = '';
                switch(idTag){
                    case '#data_protocol': text = "Reload Data Protokol"; break;
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

            $(document).on('click', '.btn_refresh', function(e){
				e.preventDefault();
				const id_elm = $(this).data('table');

                console.log('test')
				reloadData(id_elm);
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
            })
    </script>
@endsection
