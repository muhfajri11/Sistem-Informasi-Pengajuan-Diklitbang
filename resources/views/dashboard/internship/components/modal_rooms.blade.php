<div class="modal fade" id="modal_setruangan" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <form class="modal-content" id="set_ruangan" novalidate>
            <div class="modal-header">
                <h3 class="modal-title text-secondary"><i class="fas fa-hospital-alt me-2"></i> Atur Ruangan</h3>
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
                            <h4 class="text-right" id="name_room">Lorem ipsum dolor sit amet lorem ipsum dolor sit amet</h4>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 mb-3 d-flex align-items-center">
                        <i class="fas fa-users-class fa-2x me-4 text-primary"></i>
                        <div>
                            <p class="small text-right mb-0">Jurusan</p>
                            <h4 class="text-right" id="jurusan_room">Lorem ipsum dolor sit amet lorem ipsum dolor sit amet</h4>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 mb-3 d-flex align-items-center">
                        <i class="fas fa-university fa-2x me-4 text-primary"></i>
                        <div>
                            <p class="small text-right mb-0">Institusi</p>
                            <div class="text-right font-w700" id="institusi_room">Test</div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 mb-3 d-flex align-items-center">
                        <i class="fas fa-receipt fa-2x me-4 text-primary"></i>
                        <div>
                            <p class="small text-right mb-0">Pengalaman Magang</p>
                            <div class="text-right" id="exp_room"><strong>Tidak ada bukti</strong></div>
                        </div>
                    </div>
                    <div class="col-12"><hr></div>
                    <div class="col-12 mb-3">
                        <div class="form-group">
                            <label for="set_room">Pilih Ruangan</label>
                            <select id="set_room" class="multi-select select2_" name="rooms[]" multiple="multiple" required>
                            </select>
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