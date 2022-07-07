<div class="col-12">
    <div class="card border-0 pb-0">
        <div class="card-header border-0 pb-0 d-flex justify-content-between">
            <h4 class="card-title text-secondary"><i class="fas fa-envelope me-2"></i> Pesan Semua Akun</h4>
            @if (count($data['message']) > 0)
                <button type="button" class="btn btn-danger btn-sm light sharp" id="delete-all">
                    <i class="fas fa-trash"></i> Delete All
                </button>
            @endif
        </div>
        <div class="card-body px-0"> 
            <div id="DZ_W_Todo3" class="widget-media overflow-auto px-4" style="max-height: 23.5em">
                <ul class="timeline px-2">
                    @if (count($data['message']) == 0)
                        <li class="text-center font-w700">Tidak pesan yang tersimpan</li>
                    @else 
                        @foreach ($data['message'] as $msg)
                            <li>
                                <div class="timeline-panel">
                                    <div class="media-body">
                                        <a class="mb-1 font-w700" data-bs-toggle="modal" href="#modal_pesan" data-id="{{ $msg->id }}">
                                            {{ $msg->title }}
                                        </a>
                                        <p class="mb-1">{{ empty($msg->table->body)? "" : $msg->table->body }}</p>
                                        <small class="text-muted" style="text-transform: capitalize">
                                            {{ $msg->created_at }} &centerdot; {{ $msg->from }} &centerdot; 
                                            @switch($msg->from)
                                                @case('Praktek Kerja Lapangan')
                                                    {{ $msg->table->name }}
                                                @break
                                                @case('Studi Banding')
                                                    {{ $msg->table->title }}
                                                @break
                                            @endswitch
                                        </small>
                                    </div>
                                    <button type="button" class="btn btn-danger light sharp delete-once" data-id="{{ $msg->id }}">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </li>
                        @endforeach
                    @endif
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal_pesan" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title text-secondary"><i class="fas fa-envelope me-2"></i> Lihat Pesan</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal">
                </button>
            </div>
            <div class="modal-body pt-2 pb-0">
                <h4 class="title_contentmsg text-center my-2"></h4>
                <div class="additional_contentmsg"></div>
                <p class="body_contentmsg"></p>
                <p class="date_contentmsg text-center"></p>
            </div>
        </div>
    </div>
</div>