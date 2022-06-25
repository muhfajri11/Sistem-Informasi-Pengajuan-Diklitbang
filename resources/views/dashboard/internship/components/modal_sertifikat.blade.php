<div class="modal fade" id="modal_sertifikat" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <form class="modal-content" id="tambah_sertifikat" enctype="multipart/form-data" novalidate>
            <div class="modal-header">
                <h3 class="modal-title text-secondary"><i class="fas fa-user-check me-2"></i> Sertifikat Kelulusan</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal">
                </button>
            </div>
            <div class="modal-body py-3">
                <input type="hidden" name="id" id="id_bukti" required>
                <div class="row">
                    <div class="col-12 col-sm-6 mb-3 d-flex align-items-center">
                        <i class="fas fa-users-class fa-2x me-4 text-primary"></i>
                        <div>
                            <p class="small text-right mb-0">Nama Lengkap</p>
                            <h4 class="text-right" id="name_status">Lorem ipsum dolor sit amet lorem ipsum dolor sit amet</h4>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 mb-3 d-flex align-items-center">
                        <i class="fas fa-users-class fa-2x me-4 text-primary"></i>
                        <div>
                            <p class="small text-right mb-0">Jurusan</p>
                            <h4 class="text-right" id="jurusan_status">Lorem ipsum dolor sit amet lorem ipsum dolor sit amet</h4>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 mb-3 d-flex align-items-center">
                        <i class="fas fa-university fa-2x me-4 text-primary"></i>
                        <div>
                            <p class="small text-right mb-0">Institusi</p>
                            <div class="text-right font-w700" id="institusi_status">Test</div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 mb-3 d-flex align-items-center">
                        <i class="fas fa-check-circle fa-2x me-4 text-primary"></i>
                        <div>
                            <p class="small text-right mb-0">Status</p>
                            <div class="text-right" id="status_status">Test</div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 mb-3 d-flex align-items-center">
                        <i class="fas fa-receipt fa-2x me-4 text-primary"></i>
                        <div>
                            <p class="small text-right mb-0">Bukti Pembayaran</p>
                            <div class="text-right" id="eviden_status"><strong>Tidak ada bukti</strong></div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 mb-3 d-flex align-items-center">
                        <i class="fas fa-money-check-alt fa-2x me-4 text-primary"></i>
                        <div>
                            <p class="small text-right mb-0">Status Pembayaran</p>
                            <div class="text-right" id="statuspay_status">Test</div>
                        </div>
                    </div>
                    <div class="col-12"><hr></div>
                    <div class="col-12 mb-2">
                        <div class="form-group">
                            <label>Sertifikat Kelulusan <span id="btn_sertifikatview"></span></label>
                            <div class="input-group">
                                <div class="form-file">
                                    <input type="file" class="form-file-input form-daftar form-control" name="sertifikat" required>
                                </div>
                                <button class="btn btn-dark" type="button" data-fancybox disabled>Preview</button>
                            </div>
                            <span class="small text-light">*File berbentuk .pdf</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Simpan Data</button>
            </div>
        </form>
    </div>
</div>