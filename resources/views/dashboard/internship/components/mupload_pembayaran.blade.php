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
                    <div class="col-12 mb-2">
                        <div class="accordion accordion-primary" id="invoice_upload">
                            <div class="accordion-item">
                                <div class="accordion-header  rounded-lg" id="invoiceUploadAccordion" data-bs-toggle="collapse" data-bs-target="#invoiceUpload" aria-controls="invoiceUpload" aria-expanded="true" role="button">
                                    <span class="accordion-header-icon"></span>
                                    <span class="accordion-header-text">Rincian Biaya PKL</span>
                                    <span class="accordion-header-indicator"></span>
                                </div>
                                <div id="invoiceUpload" class="collapse" aria-labelledby="invoiceUploadAccordion" data-bs-parent="#invoice_upload">
                                    <div class="accordion-body-text">
                                        <div class="row mt-1">
                                            <div class="col-12">
                                                <div class="table-responsive">
                                                    <table class="table table-hover">
                                                        <tbody>
                                                            <tr>
                                                                <th>Memiliki MOU</th>
                                                                <td class="have_mou">Tidak Punya</td>
                                                                <td class="price_havemou">Rp 0</td>
                                                            </tr>
                                                            <tr>
                                                                <th>Tipe PKL</th>
                                                                <td class="tipe_pkl">Medis</td>
                                                                <td class="price_tipepkl">Rp 0</td>
                                                            </tr>
                                                            <tr>
                                                                <th>Jenjang Pend.</th>
                                                                <td class="jenjang">D3</td>
                                                                <td class="price_jenjang">Rp 0</td>
                                                            </tr>
                                                            <tr>
                                                                <th colspan="2">Total Biaya</th>
                                                                <th class="price_total">Rp 0</th>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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
                            <div class="input-group">
                                <div class="form-file">
                                    <input type="file" class="form-file-input form-daftar form-control" name="eviden_paid" required>
                                </div>
                                <button class="btn btn-dark" type="button" data-fancybox disabled>Preview</button>
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