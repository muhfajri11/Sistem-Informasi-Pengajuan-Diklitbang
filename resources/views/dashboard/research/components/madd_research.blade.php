<div class="modal fade" id="modal_addresearch" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <form class="modal-content" id="tambah_research" enctype="multipart/form-data" novalidate>
            <div class="modal-header">
                <h3 class="modal-title text-secondary"><i class="fas fa-atom me-2"></i> Ajukan Penelitian</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal">
                </button>
            </div>
            <div class="modal-body">
                <div class="custom-tab-1">
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a href="#biodata" data-bs-toggle="tab" class="nav-daftar nav-link active show">Data Lengkap</a>
                        </li>
                        <li class="nav-item">
                            <a href="#invoice" data-bs-toggle="tab" class="nav-daftar nav-link">Biaya</a>
                        </li>
                    </ul>
                    <div class="tab-content pt-4">
                        <div id="biodata" class="tab-pane fade active show">
                            <div class="row">                                
                                <div class="col-12 mb-2">
                                    <div class="form-group">
                                        <label for="judul_daftar">Judul <span class="small text-light">(Bahasa Indonesia)</span></label>
                                        <input type="text" name="judul" class="form-control mb-2" id="judul_daftar" required>
                                    </div>
                                </div>
                                <div class="col-12 mb-2">
                                    <div class="form-group">
                                        <label for="title_daftar">Title <span class="small text-light">(Bahasa Inggris)</span></label>
                                        <input type="text" name="title" class="form-control mb-2" id="title_daftar" required>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 mb-2">
                                    <div class="form-group">
                                        <label for="tiperesearch_daftar">Tipe Penelitian</label>
                                        <select id="tiperesearch_daftar" class="select2_ mb-2" name="tipe_penelitian" required>
                                            <option value="kesehatan">Kesehatan</option>
                                            <option value="umum">Umum</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 mb-2">
                                    <div class="form-group">
                                        <label for="institusi_daftar">Pilih Institusi <button class="btn btn-dark btn-xs ms-2" id="btn_addinstitusi" type="button">Tambah Institusi</button></label>
                                        <select class="select2_ mb-2" name="institusi" required>
                                        </select>
                                        <span class="small text-light">*Klik tambah institusi jika institusi tidak ada</span>
                                    </div>
                                </div>
                                <div class="col-12 mb-2"><hr></div>
                                <div class="col-12 col-md-6 mb-2">
                                    <div class="form-group">
                                        <label for="ketua_daftar">Peneliti Utama <span class="small text-light">(Nama + Gelar)</span></label>
                                        <input type="text" name="ketua" class="form-control mb-2" id="ketua_daftar" required>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 mb-2">
                                    <div class="form-group">
                                        <label for="nim_daftar">NIK</label>
                                        <input type="number" name="nik" class="form-control mb-2" id="nik_daftar" required>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 mb-2">
                                    <div class="form-group">
                                        <label for="jenjang_daftar">Jenjang Pendidikan</label>
                                        <select class="select2_ mb-2" name="jenjang" id="jenjang_daftar" required>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 mb-2">
                                    <div class="form-group">
                                        <label for="phone_daftar">No. Handphone</label>
                                        <input type="number" name="phone" class="form-control mb-2" id="phone_daftar" required>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 mb-2">
                                    <div class="form-group">
                                        <label for="province_daftar">Asal Provinsi</label>
                                        <select id="province_daftar" class="select2_ mb-2" name="province" required>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 mb-2">
                                    <div class="form-group">
                                        <label for="city_daftar">Asal Kota</label>
                                        <select id="city_daftar" class="select2_ mb-2" name="city" required>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 mb-2">
                                    <div class="form-group">
                                        <label for="address_daftar">Alamat</label>
                                        <textarea name="address" id="address_daftar" class="form-control" rows="1" required></textarea>
                                    </div>
                                </div>
                                <div class="col-12 mt-3">
                                    <div class="accordion accordion-primary" id="member_daftar">
                                        <div class="accordion-item">
                                            <div class="accordion-header  rounded-lg" id="memberDaftarAccordion" data-bs-toggle="collapse" data-bs-target="#memberDaftar" aria-controls="memberDaftar"   aria-expanded="true" role="button">
                                                <span class="accordion-header-icon"></span>
                                                <span class="accordion-header-text">Anggota Penelitian</span>
                                                <span class="accordion-header-indicator"></span>
                                            </div>
                                            <div id="memberDaftar" class="collapse show" aria-labelledby="memberDaftarAccordion" data-bs-parent="#member_daftar">
                                                <div class="accordion-body-text">
                                                    <div class="row mt-1">
                                                        <div class="col-12 mb-2 list_member">
                                                            <p class="empty_member text-center">Tidak ada anggota</p>
                                                        </div>
                                                        <button class="btn col-6 mx-auto btn-dark btn-sm add_member" type="button">Tambah Anggota</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 mb-2"><hr></div>
                                <div class="col-12 mb-2">
                                    <div class="form-group">
                                        <label for="tempat_daftar">Tempat Penelitian</label>
                                        <input type="text" name="tempat" class="form-control mb-2" id="tempat_daftar" required>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 mb-2">
                                    <div class="form-group">
                                        <label for="start_date">Mulai Penelitian</label>
                                        <input name="start_date" class="datepicker-default form-control mb-2" id="start_date">
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 mb-2">
                                    <div class="form-group">
                                        <label for="end_date">Selesai Penelitian</label>
                                        <input name="end_date" class="datepicker-default form-control mb-2" id="end_date">
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6 mb-2">
                                    <div class="form-group">
                                        <label for="permohonan_daftar">Surat Permohonan Penelitian (Dari Institusi)</label>
                                        <div class="input-group">
                                            <div class="form-file">
                                                <input type="file" class="form-file-input form-daftar form-control" name="permohonan" required>
                                            </div>
                                            <button class="btn btn-dark" type="button" data-fancybox disabled>Preview</button>
                                        </div>
                                        <p class="small text-light mb-0">*File berbentuk .pdf, .jpeg, .jpg, atau .png</p>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6 mb-2">
                                    <div class="form-group">
                                        <label for="proposal_daftar">Proposal Penelitian</label>
                                        <div class="input-group">
                                            <div class="form-file">
                                                <input type="file" class="form-file-input form-daftar form-control" name="proposal" required>
                                            </div>
                                            <button class="btn btn-dark" type="button" data-fancybox disabled>Preview</button>
                                        </div>
                                        <p class="small text-light mb-0">*File berbentuk .pdf, .jpeg, .jpg, atau .png</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="invoice" class="tab-pane fade">
                            <div class="row">
                                <div class="col-xl-12">
                                    <div>
                                        <div class="rekening-slider owl-carousel owl-loaded owl-drag"></div>
                                    </div>
                                </div>
                                <div class="col-12 mx-auto mb-2 d-flex align-items-center">
                                    <i class="fas fa-wallet fa-2x me-4 text-primary"></i>
                                    <div>
                                        <p class="small text-right mb-0">Biaya Pendaftaran</p>
                                        <h4 class="text-right pay" id="pay_daftar">Rp 300.000 <span class="small text-light">/ Proposal</span></h4>
                                    </div>
                                </div>
                                <div class="col-12 mb-2">
                                    <div class="form-group">
                                        <label for="ktm_daftar">Bukti Pembayaran <span class="small text-light">(opsional)</span></label>
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
                <button type="button" id="btnresearch_submit" data-next="invoice" class="btn btn-primary">Lanjut</button>
            </div>
        </form>
    </div>
</div>