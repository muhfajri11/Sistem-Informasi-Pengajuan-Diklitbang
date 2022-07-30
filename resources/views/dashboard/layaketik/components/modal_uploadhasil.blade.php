<div class="modal fade" id="modal_surathasil" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <form class="modal-content" id="upload_surathasil" enctype="multipart/form-data" novalidate>
            <div class="modal-header">
                <h3 class="modal-title text-secondary"><i class="fas fa-file-alt me-2"></i> Upload Surat Hasil Telaah</h3>
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
                    <div class="col-12 col-sm-6 mb-3">
                        <p class="small text-right mb-0">Status Uji Layak Etik</p>
                        <div class="text-right font-w700 parent_status"><span class="revisionstatus_msg"></span>: <span class="status_msg"></span></div>
                    </div>
                    <div class="col-12"><hr></div>
                    <div class="col-12 mb-3 input_rev">
                        <div class="form-group">
                            <label>Surat Hasil Telaah <span class="btn_surat"></span></label>
                            <div class="input-group">
                                <div class="form-file">
                                    <input type="file" class="form-file-input form-daftar form-control" name="sertifikat_layaketik" required>
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