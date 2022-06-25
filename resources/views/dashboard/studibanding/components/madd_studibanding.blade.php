<div class="modal fade" id="modal_addstudibanding" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <form class="modal-content" id="tambah_studibanding" enctype="multipart/form-data" novalidate>
            <div class="modal-header">
                <h3 class="modal-title text-secondary"><i class="fas fa-file-alt me-2"></i> Ajukan Studi Banding</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal">
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="alert alert-secondary alert-alt fade show">
                            <h5>Aturan Biaya Studi Banding</h5>
                            <p class="mb-1">Untuk pengunjung yang <span class="badge badge-pill badge-dark">< 10</span> dikenakan biaya <span class="badge badge-pill badge-secondary">Rp 300.000</span></p>
                            <p class="mb-0">Untuk pengunjung yang <span class="badge badge-pill badge-dark">> 10</span> dikenakan biaya <span class="badge badge-pill badge-secondary">Rp 240.000</span></p>
                        </div>
                    </div>
                    <div class="col-12 mb-4">
                        <div class="form-group">
                            <label for="judul_daftar">Topik Pertemuan</label>
                            <input type="text" name="title" class="form-control mb-2" id="judul_daftar" required>
                            <span class="small text-light">*Apa yang akan dibahas dalam kunjungan</span>
                        </div>
                    </div>
                    <div class="col-12 mb-4">
                        <div class="form-group">
                            <label for="institusi_daftar">Pilih Institusi <button class="btn btn-dark btn-xs ms-2" id="btn_addinstitusi" type="button">Tambah Institusi</button></label>
                            <select id="institusi_daftar" class="select2_" name="institution" required>
                            </select>
                            <span class="small text-light">*Klik tambah institusi jika institusi tidak ada</span>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 mb-4">
                        <div class="form-group">
                            <label for="kunjungan_daftar">Tanggal Kunjungan</label>
                            <input name="visit" class="datepicker-default form-control" id="kunjungan_daftar" required>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 mb-4">
                        <div class="form-group">
                            <label for="pengunjung_daftar">Peserta <span class="small text-light">/orang</span></label>
                            <div class="input-group">
                                <button class="btn btn-primary min_members" type="button">-</button>
                                <input type="number" name="members" class="form-control text-center" id="pengunjung_daftar" value="1" readonly required>
                                <button class="btn btn-primary add_members" type="button">+</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 mb-4">
                        <div class="form-group">
                            <label for="rooms_daftar">Pilih Ruangan</label>
                            <select id="rooms_daftar" class="multi-select select2_" name="rooms[]" multiple="multiple" required>
                            </select>
                        </div>
                    </div>
                    <div class="col-12 mb-4">
                        <div class="form-group">
                            <label for="lampiran_daftar">Surat Permohonan Studi Banding</label>
                            <div class="input-group">
                                <div class="form-file">
                                    <input type="file" class="form-file-input form-daftar form-control" name="permohonan" required>
                                </div>
                                <button class="btn btn-dark" type="button" data-fancybox disabled>Preview</button>
                            </div>
                            <span class="small text-light">*File berbentuk .pdf</span>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="accordion accordion-primary" id="name_daftar">
                            <div class="accordion-item">
                                <div class="accordion-header  rounded-lg" id="nameDaftarAccordion" data-bs-toggle="collapse" data-bs-target="#nameDaftar" aria-controls="nameDaftar"   aria-expanded="true" role="button">
                                    <span class="accordion-header-icon"></span>
                                    <span class="accordion-header-text">Daftar Nama Peserta</span>
                                    <span class="accordion-header-indicator"></span>
                                </div>
                                <div id="nameDaftar" class="collapse show" aria-labelledby="nameDaftarAccordion" data-bs-parent="#name_daftar">
                                    <div class="accordion-body-text">
                                        <div class="row mt-1">
                                            <div class="col-12 mb-2 list_name">
                                                <div class="form-group form_name mb-2">
                                                    <div class="input-group">
                                                        <button class="btn btn-dark btn-disabled" type="button" disabled>1</button>
                                                        <input type="text" name="names[]" class="form-control" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="accordion accordion-primary" id="question_daftar">
                            <div class="accordion-item">
                                <div class="accordion-header  rounded-lg" id="questionDaftarAccordion" data-bs-toggle="collapse" data-bs-target="#questionDaftar" aria-controls="questionDaftar"   aria-expanded="true" role="button">
                                    <span class="accordion-header-icon"></span>
                                    <span class="accordion-header-text">Daftar Pertanyaan</span>
                                    <span class="accordion-header-indicator"></span>
                                </div>
                                <div id="questionDaftar" class="collapse show" aria-labelledby="questionDaftarAccordion" data-bs-parent="#question_daftar">
                                    <div class="accordion-body-text">
                                        <div class="row mt-1">
                                            <div class="col-12 mb-2 list_question">
                                                <div class="form-group form_question mb-2">
                                                    <div class="input-group">
                                                        <input type="text" name="questions[]" class="form-control" required>
                                                        <button class="btn btn-danger delete_question" disabled type="button">-</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <button class="btn col-6 mx-auto btn-dark btn-sm add_question" type="button">Tambah Pertanyaan</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="accordion accordion-primary" id="doc_daftar">
                            <div class="accordion-item">
                                <div class="accordion-header  rounded-lg" id="docDaftarAccordion" data-bs-toggle="collapse" data-bs-target="#docDaftar" aria-controls="docDaftar"   aria-expanded="true" role="button">
                                    <span class="accordion-header-icon"></span>
                                    <span class="accordion-header-text">Daftar Dokumen yang dibutuhkan</span>
                                    <span class="accordion-header-indicator"></span>
                                </div>
                                <div id="docDaftar" class="collapse show" aria-labelledby="docDaftarAccordion" data-bs-parent="#doc_daftar">
                                    <div class="accordion-body-text">
                                        <div class="row mt-1">
                                            <div class="col-12 mb-2 list_doc">
                                                <div class="form-group form_doc mb-2">
                                                    <div class="input-group">
                                                        <input type="text" name="docs[]" class="form-control" required>
                                                        <button class="btn btn-danger delete_doc" disabled type="button">-</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <button class="btn col-10 col-md-8 col-lg-6 mx-auto btn-dark btn-sm add_doc" type="button">Tambah Dokumen yang diperlukan</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="accordion accordion-primary" id="pay_daftar">
                            <div class="accordion-item">
                                <div class="accordion-header  rounded-lg" id="payDaftarAccordion" data-bs-toggle="collapse" data-bs-target="#payDaftar" aria-controls="payDaftar"   aria-expanded="true" role="button">
                                    <span class="accordion-header-icon"></span>
                                    <span class="accordion-header-text">Biaya Pendaftaran</span>
                                    <span class="accordion-header-indicator"></span>
                                </div>  
                                <div id="payDaftar" class="collapse show" aria-labelledby="payDaftarAccordion" data-bs-parent="#pay_daftar">
                                    <div class="accordion-body-text">
                                        <div class="row mt-1">
                                            <div class="col-12 col-md-6 d-flex align-items-center">
                                                <i class="fas fa-users fa-3x me-2"></i>
                                                <div>
                                                    <p class="small mb-0">Total Pengunjung</p>
                                                    <h4 id="totalmember">1 Orang</h4>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6 d-flex align-items-center">
                                                <i class="fas fa-wallet fa-3x me-4"></i>
                                                <div>
                                                    <p class="small text-right mb-0">Total Biaya</p>
                                                    <h4 class="text-right" id="biaya">Rp 300.000</h4>
                                                </div>
                                            </div>
                                            <div class="col-12 mt-2">
                                                <div class="form-group">
                                                    <label for="eviden_daftar">Bukti Pembayaran <span class="small text-light">(opsional)</span></label>
                                                    <div class="input-group">
                                                        <div class="form-file">
                                                            <input type="file" class="form-file-input form-daftar form-control" name="eviden_paid">
                                                        </div>
                                                        <button class="btn btn-dark" type="button" data-fancybox disabled>Preview</button>
                                                    </div>
                                                    <span class="small text-light">*File berbentuk .pdf, .jpeg, .jpg, atau .png</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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