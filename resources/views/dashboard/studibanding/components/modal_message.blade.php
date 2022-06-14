<div class="modal fade" id="modal_sendmsg" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <form class="modal-content" id="send_msg" novalidate>
            <div class="modal-header">
                <h3 class="modal-title text-secondary"><i class="fas fa-paper-plane me-2"></i> Kirim Pesan</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal">
                </button>
            </div>
            <div class="modal-body py-3">
                <input type="hidden" name="id" id="id_bukti" required>
                <div class="row">
                    <div class="col-12 mb-3 d-flex align-items-center">
                        <i class="fas fa-users-class fa-2x me-4 text-primary"></i>
                        <div>
                            <p class="small text-right mb-0">Tema Pertemuan</p>
                            <h4 class="text-right" id="title_msg">Lorem ipsum dolor sit amet lorem ipsum dolor sit amet</h4>
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
                            <label for="subject_msg">Subject</label>
                            <input type="text" name="title" class="form-control mb-2" id="subject_msg" required>
                        </div>
                    </div>
                    <div class="col-12 mb-3 custom-ekeditor">
                        <textarea id="editor" name="body"></textarea>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Simpan Data</button>
            </div>
        </form>
    </div>
</div>