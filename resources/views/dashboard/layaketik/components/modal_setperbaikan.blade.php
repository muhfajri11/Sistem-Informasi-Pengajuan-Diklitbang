<div class="modal fade" id="modal_setperbaikan" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <form class="modal-content" id="set_perbaikan" enctype="multipart/form-data" novalidate>
            <div class="modal-header">
                <h3 class="modal-title text-secondary"><i class="fas fa-check-circle me-2"></i> Keputusan Perbaikan</h3>
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
                            <h4 class="text-right" id="judul_msg">Lorem ipsum dolor sit amet lorem ipsum dolor sit amet</h4>
                        </div>
                    </div>
                    <div class="col-12 mb-3 d-flex align-items-center">
                        <i class="fas fa-user-graduate fa-2x me-4 text-primary"></i>
                        <div>
                            <p class="small text-right mb-0">Peneliti Utama</p>
                            <h4 class="text-right" id="ketua_msg">Lorem ipsum dolor sit amet lorem ipsum dolor sit amet</h4>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 mb-3 d-flex align-items-center">
                        <i class="fas fa-university fa-2x me-4 text-primary"></i>
                        <div>
                            <p class="small text-right mb-0">Institusi</p>
                            <div class="text-right font-w700" id="institusi_msg">Test</div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 mb-3 d-flex align-items-center">
                        <i class="fas fa-envelope fa-2x me-4 text-primary"></i>
                        <div>
                            <p class="small text-right mb-0">Email</p>
                            <div class="text-right font-w700" id="mail_msg">Test</div>
                        </div>
                    </div>
                    <div class="col-12"><hr></div>
                    <div class="col-12 mb-3">
                        <div class="form-group">
                            <label for="resume_">Catatan Perbaikan</label>
                            <textarea class="form-control" id="resume_" name="resume_catatan"></textarea>
                        </div>
                    </div>
                    <div class="col-12 mb-3">
                        <div class="form-group">
                            <label>Surat Perbaikan <span class="surat_view"></span></label>
                            <div class="input-group">
                                <div class="form-file">
                                    <input type="file" class="form-file-input form-daftar form-control" name="surat_perbaikan" required>
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