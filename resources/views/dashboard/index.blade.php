@extends('dashboard.layouts.app')

@section('title', "Dashboard")

@section('content')
    @hasanyrole('masteradmin|penelitian|pendidikan')
        <div class="col-xl-3 col-xxl-6 col-lg-6 col-sm-6">
            <div class="widget-stat card bg-secondary">
                <div class="card-body  p-4">
                    <div class="media">
                        <span class="me-3">
                            <i class="far fa-users-class"></i>
                        </span>
                        <div class="media-body text-white">
                            <p class="mb-0">Studi Banding (Diterima)</p>
                            <h3 class="text-white mb-2 mt-1">{{ $data['comparative']['accept'] }}</h3>
                            <div class="progress mb-2 bg-secondary">
                                <div class="progress-bar progress-animated bg-white" style="width: {{ $data['comparative']['presentase'] }}%"></div>
                            </div>
                            <small>{{ $data['comparative']['accept'] }}/{{ $data['comparative']['all'] }} Pengaju</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-xxl-6 col-lg-6 col-sm-6">
            <div class="widget-stat card bg-secondary">
                <div class="card-body  p-4">
                    <div class="media">
                        <span class="me-3">
                            <i class="far fa-graduation-cap"></i>
                        </span>
                        <div class="media-body text-white">
                            <p class="mb-0">PKL (Diterima)</p>
                            <h3 class="text-white mb-2 mt-1">{{ $data['internship']['accept'] }}</h3>
                            <div class="progress mb-2 bg-secondary">
                                <div class="progress-bar progress-animated bg-white" style="width: {{ $data['internship']['presentase'] }}%"></div>
                            </div>
                            <small>{{ $data['internship']['accept'] }}/{{ $data['internship']['all'] }} Pengaju</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endhasanyrole

    <div class="col-xl-3 col-xxl-6 col-lg-6 col-sm-6">
        <div class="widget-stat card">
            <div class="card-body p-4">
                <div class="media ai-icon">
                    <span class="me-3 bgl-primary text-primary">
                        <i class="far fa-users-class"></i>
                    </span>
                    <div class="media-body">
                        <p class="mb-1">Total Pengaju Studi Banding</p>
                        <h4 class="mb-0">{{ $data['comparative']['all'] }}</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-xxl-6 col-lg-6 col-sm-6">
        <div class="widget-stat card">
            <div class="card-body p-4">
                <div class="media ai-icon">
                    <span class="me-3 bgl-primary text-primary">
                        <i class="far fa-graduation-cap"></i>
                    </span>
                    <div class="media-body">
                        <p class="mb-1">Total Pengaju PKL</p>
                        <h4 class="mb-0">{{ $data['internship']['all'] }}</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-xxl-6 col-lg-6 col-sm-6">
        <div class="widget-stat card">
            <div class="card-body p-4">
                <div class="media ai-icon">
                    <span class="me-3 bgl-primary text-primary">
                        <i class="far fa-hospital"></i>
                    </span>
                    <div class="media-body">
                        <p class="mb-1">Total Ruangan Tersedia</p>
                        <h4 class="mb-0">{{ $data['rooms'] }}</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-xxl-6 col-lg-6 col-sm-6">
        <div class="widget-stat card">
            <div class="card-body p-4">
                <div class="media ai-icon">
                    <span class="me-3 bgl-primary text-primary">
                        <i class="far fa-university"></i>
                    </span>
                    <div class="media-body">
                        <p class="mb-1">Total Institusi Terdaftar</p>
                        <h4 class="mb-0">{{ $data['institutions'] }}</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @hasanyrole('masteradmin|penelitian|pendidikan')
        @include('dashboard.layouts.components.message')
    @endhasanyrole
@endsection

@section('script')
    <script>
        $(document).ready(function(){
            $('#modal_pesan').on('show.bs.modal', function (e) {
                const modal = $(this),
					  id = $(e.relatedTarget).data('id');
				
                $.ajax({
                    url: "{{ route('messages.read', 1) }}",
                    data: {id: id},
                    type: 'POST',
                    async:false,
                    dataType: 'json'
                }).done(function (data) {
                    if(data.success){
                        const dateCreate = new Date(data.get.updated_at);

                        const ucwords = function(str) {
                            return (str + '').replace(/^([a-z])|\s+([a-z])/g, function ($1) {
                                return $1.toUpperCase();
                            });
                        }

                        if(data.get.internship){
                            modal.find('.additional_contentmsg').html(`
                                <dt>Nama Lengkap</dt>
                                <dd>${data.get.internship.name}</dd>

                                <dt>Jurusan & Tipe Magang</dt>
                                <dd>${data.get.internship.jurusan} &centerdot; ${ucwords(data.get.internship.type)}</dd>
                            `);
                        }

                        if(data.get.comparative){
                            modal.find('.additional_contentmsg').html(`
                                <dt>Tema Pertemuan</dt>
                                <dd>${data.get.comparative.title}</dd>

                                <dt>Insitusi</dt>
                                <dd>${data.get.comparative.institution.name}</dd>
                            `);
                        }

                        modal.find('.title_contentmsg').html(data.get.title);
                        modal.find('.body_contentmsg').html(data.get.body);
                        modal.find('.date_contentmsg').html(`
                                    ${dateCreate.getDay()} 
                                    ${dateCreate.toLocaleString('default', { month: 'short' })} 
                                    ${dateCreate.getFullYear()}`)
                    } else {
                        console.log(data.msg)
                    }

                    jQuery('#contentload_msg').addClass('d-none').fadeOut('slow')
                }).fail(function(data){
                    jQuery('#contentload_msg').addClass('d-none').fadeOut('slow')
                    resp = JSON.parse(data.responseText)
                    console.log(resp.message)
                    console.log("error");
                })
            })

            $('.timeline').on('click', ".delete-once", function(e){
				e.preventDefault();
				const id = $(this).data('id'),
                      elm = $(this);

				Swal.fire({
                    title: `Apakah kamu yakin ingin menghapus pesan ini?`,
                    showDenyButton: true,
                    showConfirmButton: false,
                    showCancelButton: true,
                    denyButtonText: `Hapus`
                }).then((result) => {
                    if (result.isDenied) {
                        $.ajax({
                            url: window.location.origin+"/dashboard/messages/delete/"+id,
                            data: {_method: "DELETE"},
                            method: 'POST',
                            async:false,
                            dataType: 'json',
                            beforeSend: function(){
                                $('#preloader').removeClass('d-none');
                                $('#main-wrapper').removeClass('show');
                            }
                        }).done(function(data){
                            if(data.success){
                                alertWarning("Berhasil", data.msg)
                                elm.parent().parent().remove();
                            } else {
                                alertError("Terjadi Kesalahan", data.msg)
                            }

                            $('#preloader').addClass('d-none');
                            $('#main-wrapper').addClass('show');
                        }).fail(function(data){
                            $('#preloader').addClass('d-none');
                            $('#main-wrapper').addClass('show');
                            console.log(data.responseText)
                        });
                    }
                })
			})

            $('#delete-all').click(function(e){
                e.preventDefault();

                Swal.fire({
                    title: `Apakah kamu yakin ingin menghapus semua pesan?`,
                    showDenyButton: true,
                    showConfirmButton: false,
                    showCancelButton: true,
                    denyButtonText: `Hapus`
                }).then((result) => {
                    if (result.isDenied) {
                        $.ajax({
                            url: "{{ route('messages.delete_all') }}",
                            data: {_method: "DELETE"},
                            method: 'POST',
                            async:false,
                            dataType: 'json',
                            beforeSend: function(){
                                $('#preloader').removeClass('d-none');
                                $('#main-wrapper').removeClass('show');
                            }
                        }).done(function(data){
                            if(data.success){
                                alertWarning("Berhasil Hapus", data.msg)
                                const html = `<li class="text-center font-w700">Tidak pesan yang tersimpan</li>`;

                                $('.timeline').html($(html))
                            } else {
                                alertError("Terjadi Kesalahan", data.msg)
                            }

                            $('#preloader').addClass('d-none');
                            $('#main-wrapper').addClass('show');
                        }).fail(function(data){
                            $('#preloader').addClass('d-none');
                            $('#main-wrapper').addClass('show');
                            console.log(data.responseText)
                        });
                    }
                })
            })
        })
    </script>
@endsection