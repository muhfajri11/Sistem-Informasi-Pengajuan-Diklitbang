<div class="modal fade" id="macc_telaahcepat" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <form class="modal-content" id="acc_telaahcepat" enctype="multipart/form-data" novalidate>
            <div class="modal-header">
                <h3 class="modal-title text-secondary"><i class="fas fa-check-circle me-2"></i> Keputusan Telaah Cepat</h3>
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
                    <div class="col-12 col-sm-6 mb-3 d-flex align-items-center lanjut_status d-none">
                        <i class="fas fa-check-circle fa-2x me-4 text-primary"></i>
                        <div>
                            <p class="small text-right mb-0">Klasifikasi Sementara</p>
                            <div class="text-right font-w700" id="status_msg">Test</div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 mb-3 d-flex align-items-center lanjut_revision d-none">
                        <i class="fas fa-edit fa-2x me-4 text-primary"></i>
                        <div>
                            <p class="small text-right mb-0">Perbaikan Ke</p>
                            <div class="text-right font-w700" id="revision_msg">Test</div>
                        </div>
                    </div>
                    <div class="col-12"><hr></div>
                    <div class="col-12 mb-3">
                        <div class="form-group">
                            <label for="set_status">Status</label>
                            <select id="set_status" class="select2_" name="status" required>
                                <option value="">Pilih Status</option>
                                <option value="exempted">Exempted</option>
                                <option value="expedited">Expedited</option>
                                <option value="fullboard">Fullboard</option>
                                <option value="ditolak">Tidak bisa ditelaah</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-12 mb-3">
                        <div class="form-group">
                            <label for="keterangan_">Keterangan</label>
                            <textarea class="form-control" id="keterangan_" name="keterangan"></textarea>
                        </div>
                    </div>
                    <div class="col-12 mb-3">
                        <div class="form-group">
                            <label>Surat Hasil Telaah</label>
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