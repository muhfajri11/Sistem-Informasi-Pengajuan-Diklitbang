<div class="modal fade" id="modal_uploadpembayaran" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <form class="modal-content" id="upload_bukti" enctype="multipart/form-data" novalidate>
            <div class="modal-header">
                <h3 class="modal-title text-secondary"><i class="fas fa-receipt me-2"></i> Upload Pembayaran</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal">
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12 col-sm-6 mb-2 d-flex align-items-center">
                        <i class="fas fa-file fa-2x me-4 text-primary"></i>
                        <div>
                            <p class="small text-right mb-0">Memiliki Dokumen MOU</p>
                            <h4 class="text-right docmou" id="docmou_view">Tidak Punya</h4>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 mb-2 d-flex align-items-center">
                        <i class="fas fa-wallet fa-2x me-4 text-primary"></i>
                        <div>
                            <p class="small text-right mb-0">Biaya Pendaftaran</p>
                            <h4 class="text-right pay" id="pay_view">Rp 300.000</h4>
                        </div>
                    </div>
                    <input type="hidden" name="id" id="id_bukti" required>
                    <div class="col-12 mt-2">
                        <div class="form-group">
                            <label for="eviden_daftar">Bukti Pembayaran Biaya Studi Banding <span id="btn_evidenview"></span></label>
                            <div class="form-file">
                                <input type="file" class="form-file-input form-control" name="eviden_paid" id="eviden_upload" required>
                            </div>
                            <span class="small text-light">*File berbentuk .pdf, .jpeg, .jpg, atau .png</span>
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