<div class="modal fade" id="modal_editresearch" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <form class="modal-content" id="edit_research" enctype="multipart/form-data" novalidate>
            <input type="hidden" name="id" id="id_bukti" required>
            <div class="modal-header">
                <h3 class="modal-title text-secondary"><i class="fas fa-cog me-2"></i> Edit Pengajuan</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal">
                </button>
            </div>
            <div class="modal-body">
                <div class="custom-tab-1">
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a href="#biodata_edit" data-bs-toggle="tab" class="nav-edit nav-link active show">Data Lengkap</a>
                        </li>
                        <li class="nav-item">
                            <a href="#invoice_edit" data-bs-toggle="tab" class="nav-edit nav-link">Biaya</a>
                        </li>
                    </ul>
                    <div class="tab-content pt-4">
                        <div id="biodata_edit" class="tab-pane fade active show">
                            <div class="row">                                
                                <div class="col-12 mb-3">
                                    <p class="mb-0">Judul Penelitian</p>
                                    <p class="font-w600 mb-0 judul_edit">Test</p>
                                </div>
                                <div class="col-12 col-md-6 mb-3">
                                    <div class="form-group">
                                        <label for="jenis_daftar">Jenis Penelitian</label>
                                        <select class="select2_ mb-2" name="jenis" required>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 mb-3">
                                    <div class="form-group">
                                        <label for="asal_daftar">Asal Pengusul</label>
                                        <select class="select2_ mb-2" name="asal" required>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 mb-3">
                                    <div class="form-group">
                                        <label for="lembaga_daftar">Lembaga Asal</label>
                                        <select class="select2_ mb-2" name="lembaga" required>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 mb-3">
                                    <div class="form-group">
                                        <label for="status_daftar">Status Pengusul</label>
                                        <select class="select2_ mb-2" name="status" required>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 mb-2">
                                    <div class="form-group">
                                        <label for="sumberdana_daftar">Sumber Dana</label>
                                        <input type="text" name="sumber_dana" class="form-control mb-2" id="sumberdana_daftar" required>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 mb-2">
                                    <div class="form-group">
                                        <label for="totaldana_daftar">Total Dana</label>
                                        <input type="number" name="total_dana" class="form-control mb-2" id="totaldana_daftar" required>
                                    </div>
                                </div>
                                <div class="col-12 mb-3">
                                    <div class="form-group">
                                        <label for="kerjasama_daftar">Kerjasama</label>
                                        <select class="select2_ mb-2" name="kerjasama" required>
                                            <option value="bukan_kerjasama">Bukan Kerjasama</option>
                                            <option value="nasional">Kerjasama Nasional</option>
                                            <option value="internasional">Kerjasama Internasional</option>
                                            <option value="peneliti_asing">Melibatkan Peneliti Asing</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 mb-2 d-none set_negara">
                                    <div class="form-group">
                                        <label for="negara_daftar">Jumlah negara yg terlibat</label>
                                        <div class="input-group">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 mt-2 d-none set_asing">
                                    <div class="accordion accordion-primary" id="member_daftar">
                                        <div class="accordion-item">
                                            <div class="accordion-header  rounded-lg" id="memberDaftarAccordion" data-bs-toggle="collapse" data-bs-target="#memberDaftar" aria-controls="memberDaftar"   aria-expanded="true" role="button">
                                                <span class="accordion-header-icon"></span>
                                                <span class="accordion-header-text">Peneliti Asing</span>
                                                <span class="accordion-header-indicator"></span>
                                            </div>
                                            <div id="memberDaftar" class="collapse show" aria-labelledby="memberDaftarAccordion" data-bs-parent="#member_daftar">
                                                <div class="accordion-body-text">
                                                    <div class="row mt-1">
                                                        <div class="col-12 mb-2 list_member">
                                                            <p class="empty_member text-center">Tidak ada anggota</p>
                                                        </div>
                                                        <button class="btn col-6 mx-auto btn-dark btn-sm add_member" type="button">Tambah Peneliti</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 mx-auto mb-3">
                                    <div class="form-group">
                                        <label>Apakah penelitian multi-senter?</label>
                                        <div class="d-flex flex-row mt-2">
                                            <strong class="small">Tidak</strong>
                                            <div class="checkbox mx-2">
                                                <input type="checkbox" id="ismultisenter_edit" name="is_multisenter" class="switchbox" style="display:none">
                                                <label for="ismultisenter_edit" class="toggle"><span></span></label>
                                            </div>
                                            <strong class="small">Ya</strong>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 mb-2 show_multisenter d-none">
                                    <div class="form-group">
                                        <label for="tempatmultisenter_daftar">Tempat Multi Senter</label>
                                        <div class="set_tempat"></div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 mb-3 show_multisenter d-none">
                                    <div class="form-group">
                                        <label>Apakah sudah mendapatkan persetujuan etik dari senter/institusi yang lain?</label>
                                        <div class="set_acc"></div>
                                    </div>
                                </div>
                                <div class="col-12 mb-2">
                                    <div class="form-group">
                                        <label for="suratpengantar_daftar">Surat Pengantar <span id="btnedit_suratpengantar"></span></label>
                                        <div class="input-group">
                                            <div class="form-file">
                                                <input type="file" class="form-file-input form-daftar form-control" id="suratpengantar_daftar" name="surat_pengantar">
                                            </div>
                                            <button class="btn btn-dark" type="button" data-fancybox disabled>Preview</button>
                                        </div>
                                        <span class="small text-light">*File berbentuk .pdf</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="invoice_edit" class="tab-pane fade">
                            <div class="row">
                                <div class="col-xl-12">
                                    <div>
                                        <div class="rekening-slider owl-carousel owl-loaded owl-drag"></div>
                                    </div>
                                </div>
                                <div class="col-12 mx-auto mb-2 d-flex align-items-center">
                                    <i class="fas fa-wallet fa-2x me-4 text-primary"></i>
                                    <div>
                                        <p class="small text-right mb-0">Biaya Pendaftaran <button class="btn btn-dark btn-xs ms-2" id="btn_checkfee" type="button">Check Biaya</button></p>
                                        <h4 class="text-right"><span class="pay" id="pay_daftar">Rp -</span> <span class="small text-light">/ Protokol</span></h4>
                                    </div>
                                </div>
                                <div class="col-12 mb-2">
                                    <div class="form-group">
                                        <label for="ktm_daftar">Bukti Pembayaran <span class="small text-light">(opsional)</span> <span id="btnedit_evidenpaid"></span></label>
                                        <div class="input-group">
                                            <div class="form-file">
                                                <input type="file" class="form-file-input form-daftar form-control" name="eviden_paid" required>
                                            </div>
                                            <button class="btn btn-dark" type="button" data-fancybox disabled>Preview</button>
                                        </div>
                                        <p class="small text-light mb-0">*File berbentuk .pdf, .jpeg, .jpg, atau .png</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div id="html_back"></div>
                <button type="button" id="btnresearch_submit" data-next="invoice_edit" class="btn btn-primary">Lanjut</button>
            </div>
        </form>
    </div>
</div>