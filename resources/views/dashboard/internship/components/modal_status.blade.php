<div class="modal fade" id="modal_ubahstatus" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <form class="modal-content" id="ubah_status" novalidate>
            <div class="modal-header">
                <h3 class="modal-title text-secondary"><i class="fas fa-user-check me-2"></i> Ubah Status</h3>
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
                    <div class="col-12 col-sm-6 mb-3">
                        <div class="form-group">
                            <label for="set_status">Status</label>
                            <select id="set_status" class="multi-select select2_" name="status" required>
                            </select>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 mb-3">
                        <div class="form-group">
                            <label>Status Pembayaran</label>
                            <div class="d-flex flex-row mt-2">
                                <strong class="small">Belum</strong>
                                <div class="checkbox mx-2">
                                    <input type="checkbox" id="switch" name="switch_pay" class="switchbox" style="display:none" checked>
                                    <label for="switch" class="toggle"><span></span></label>
                                </div>
                                <strong class="small">Lunas</strong>
                            </div>
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