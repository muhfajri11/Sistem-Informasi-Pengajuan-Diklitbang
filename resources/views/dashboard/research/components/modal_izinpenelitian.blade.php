<div class="modal fade" id="modal_izinpenelitian" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <form class="modal-content" id="tambah_izinpenelitian" enctype="multipart/form-data" novalidate>
            <div class="modal-header">
                <h3 class="modal-title text-secondary"><i class="fas fa-file-check me-2"></i> Surat Izin Penelitian</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal">
                </button>
            </div>
            <div class="modal-body py-3">
                <input type="hidden" name="id" id="id_bukti" required>
                <div class="row">
                    <div class="col-12 mb-3 d-flex align-items-center">
                        <i class="fas fa-book fa-2x me-4 text-primary"></i>
                        <div>
                            <p class="small text-right mb-0">Judul Penelitian</p>
                            <h4 class="text-right" id="judul_status">Lorem ipsum dolor sit amet lorem ipsum dolor sit amet</h4>
                        </div>
                    </div>
                    <div class="col-12 mb-3 d-flex align-items-center">
                        <i class="fas fa-users-class fa-2x me-4 text-primary"></i>
                        <div>
                            <p class="small text-right mb-0">Peneliti Utama</p>
                            <h4 class="text-right" id="ketua_status">Lorem ipsum dolor sit amet lorem ipsum dolor sit amet</h4>
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
                            <label>Surat Izin Penelitian RSUD Gunung Jati <span id="btn_izinview"></span></label>
                            <div class="input-group">
                                <div class="form-file">
                                    <input type="file" class="form-file-input form-daftar form-control" name="izin_penelitian" required>
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