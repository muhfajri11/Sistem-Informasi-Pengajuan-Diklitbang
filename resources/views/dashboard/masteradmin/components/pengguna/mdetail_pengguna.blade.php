<div class="modal fade" id="modal_detailpengguna" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title text-secondary"><i class="fas fa-user me-2"></i> Lihat Pengguna</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal">
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12 mb-4">
                        <div class="form-group">
                            <label for="nama_view">Nama Lengkap</label>
                            <div class="input-group mb-2">
                                <div class="input-group-text"><i class="fas fa-user"></i></div>
                                <input type="text" class="form-control" id="nama_view" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 mb-4">
                        <div class="form-group">
                            <label for="email_view">Email</label>
                            <div class="input-group mb-2">
                                <div class="input-group-text" id="email_check"><i class="fas fa-envelope"></i></div>
                                <input type="text" class="form-control" id="email_view" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 mb-4">
                        <div class="form-group">
                            <label for="phone_view">No. Handphone</label>
                            <div class="input-group mb-2">
                                <div class="input-group-text"><i class="fas fa-phone"></i></div>
                                <input type="text" class="form-control" id="phone_view" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 mb-4">
                        <h4 class="text-primary mb-4">
                            <i class="fas fa-user-tag me-2"></i>
                            Role User (<span id="role_view"></span>)
                        </h4>
                        <h4 class="text-secondary">Permissions</h4>
                        <div id="permissions_view"></div>
                    </div>
                    <p class="text-center" id="created_view"></p>
                </div>						
            </div>
        </div>
    </div>
</div>