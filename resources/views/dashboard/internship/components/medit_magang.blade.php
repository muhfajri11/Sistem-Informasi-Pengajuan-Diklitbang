<div class="modal fade" id="modal_editmagang" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <form class="modal-content" id="edit_magang" enctype="multipart/form-data" novalidate>
            <div class="modal-header">
                <h3 class="modal-title text-secondary"><i class="fas fa-file-alt me-2"></i> Ajukan Magang</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal">
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="id" id="id_bukti" required>
                <div class="col-12">
                    <div class="alert alert-secondary alert-alt fade show">
                        <h5>Aturan Biaya Magang (Pendaftaran)</h5>
                        <p class="mb-1">Memiliki dokumen MOU dikenakan biaya <span class="badge badge-pill badge-secondary">Rp 150.000</span></p>
                        <p class="mb-1">Tidak memiliki dokumen MOU dikenakan biaya <span class="badge badge-pill badge-secondary">Rp 300.000</span></p>
                    </div>
                </div>
                <div class="custom-tab-1">
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a href="#biodata_edit" data-bs-toggle="tab" class="nav-edit nav-link active show">Biodata</a>
                        </li>
                        <li class="nav-item">
                            <a href="#berkas_edit" data-bs-toggle="tab" class="nav-edit nav-link">Berkas</a>
                        </li>
                        <li class="nav-item">
                            <a href="#invoice_edit" data-bs-toggle="tab" class="nav-edit nav-link">Biaya</a>
                        </li>
                    </ul>
                    <div class="tab-content pt-4">
                        <div id="biodata_edit" class="tab-pane fade active show">
                            <div class="row">                                
                                <div class="col-12 mb-2">
                                    <div class="form-group">
                                        <label for="nama_daftar">Nama Lengkap</label>
                                        <input type="text" name="name" class="form-control mb-2" id="nama_daftar" required>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 mb-2">
                                    <div class="form-group">
                                        <label for="nim_daftar">NIM</label>
                                        <input type="number" name="nim" class="form-control mb-2" id="nim_daftar" required>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 mb-2">
                                    <div class="form-group">
                                        <label for="jurusan_daftar">Jurusan</label>
                                        <input type="text" name="jurusan" class="form-control mb-2" id="jurusan_daftar" required>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 mb-2">
                                    <div class="form-group">
                                        <label for="institusi_daftar">Pilih Institusi <button class="btn btn-dark btn-xs ms-2" id="btn_addinstitusi" type="button">Tambah Institusi</button></label>
                                        <select id="institusi_daftar" class="select2_ mb-2" name="institusi" required>
                                        </select>
                                        <span class="small text-light">*Klik tambah institusi jika institusi tidak ada</span>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 mb-2">
                                    <div class="form-group">
                                        <label for="semester_daftar">Semester</label>
                                        <div class="input-group mb-2">
                                            <button class="btn btn-primary min_members" type="button">-</button>
                                            <input type="number" name="semester" class="form-control text-center" id="semester_daftar" value="1" readonly required>
                                            <button class="btn btn-primary add_members" type="button">+</button>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="col-12 col-md-4 mb-2">
                                    <div class="form-group">
                                        <label for="type_daftar">Tipe Magang</label>
                                        <select class="select2_ mb-2" name="type" required>
                                            <option value="medic">Medis</option>
                                            <option value="non-medic">Non Medis</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-md-4 mb-2">
                                    <div class="form-group">
                                        <label for="start_date">Tanggal Mulai</label>
                                        <input name="start_date" class="datepicker-default form-control mb-2" id="start_date">
                                    </div>
                                </div>
                                <div class="col-12 col-md-4 mb-2">
                                    <div class="form-group">
                                        <label for="end_date">Tanggal Selesai</label>
                                        <input name="end_date" class="datepicker-default form-control mb-2" id="end_date">
                                    </div>
                                </div>
                                <hr>
                                <div class="col-12 mb-2">
                                    <div class="form-group">
                                        <label for="phone_daftar">No. Handphone</label>
                                        <input type="number" name="phone" class="form-control mb-2" id="phone_daftar" required>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 mb-2">
                                    <div class="form-group">
                                        <label for="province_daftar">Pilih Asal Provinsi</label>
                                        <select id="province_daftar" class="select2_ mb-2" name="province" required>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 mb-2">
                                    <div class="form-group">
                                        <label for="city_daftar">Pilih Asal Kota</label>
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
                            </div>
                        </div>
                        <div id="berkas_edit" class="tab-pane fade">
                            <div class="row">
                                <div class="col-12">
                                    <div class="alert alert-warning alert-alt fade show">
                                        <p class="mb-0">Kosongkan kolom input jika tidak ada perubahan berkas</p>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6 mb-2">
                                    <div class="form-group">
                                        <label for="ktm_daftar">KTM</label>
                                        <div class="input-group">
                                            <div class="form-file">
                                                <input type="file" class="form-file-input form-daftar form-control" name="ktm" required>
                                            </div>
                                            <button class="btn btn-dark" type="button" data-fancybox disabled>Preview</button>
                                        </div>
                                        <p class="small text-light mb-0">*File berbentuk .pdf, .jpeg, .jpg, atau .png</p>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6 mb-2">
                                    <div class="form-group">
                                        <label for="proposal_daftar">Proposal Magang</label>
                                        <div class="input-group">
                                            <div class="form-file">
                                                <input type="file" class="form-file-input form-daftar form-control" name="proposal" required>
                                            </div>
                                            <button class="btn btn-dark" type="button" data-fancybox disabled>Preview</button>
                                        </div>
                                        <span class="small text-light">*File berbentuk .pdf</span>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6 mb-2">
                                    <div class="form-group">
                                        <label for="antigen_daftar">Bukti Antigen</label>
                                        <div class="input-group">
                                            <div class="form-file">
                                                <input type="file" class="form-file-input form-daftar form-control" name="antigen" required>
                                            </div>
                                            <button class="btn btn-dark" type="button" data-fancybox disabled>Preview</button>
                                        </div>
                                        <span class="small text-light">*File berbentuk .pdf</span>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6 mb-2">
                                    <div class="form-group">
                                        <label for="izinortu_daftar">Surat Izin Orang Tua (Materai)</label>
                                        <div class="input-group">
                                            <div class="form-file">
                                                <input type="file" class="form-file-input form-daftar form-control" name="izin_ortu" required>
                                            </div>
                                            <button class="btn btn-dark" type="button" data-fancybox disabled>Preview</button>
                                        </div>
                                        <span class="small text-light">*File berbentuk .pdf, .jpeg, .jpg, atau .png</span>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6 mb-2">
                                    <div class="form-group">
                                        <label for="proposal_daftar">Transkrip Kuliah</label>
                                        <div class="input-group">
                                            <div class="form-file">
                                                <input type="file" class="form-file-input form-daftar form-control" name="transkrip" required>
                                            </div>
                                            <button class="btn btn-dark" type="button" data-fancybox disabled>Preview</button>
                                        </div>
                                        <span class="small text-light">*File berbentuk .pdf</span>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6 mb-2">
                                    <div class="form-group">
                                        <label for="proposal_daftar">Panduan Praktek</label>
                                        <div class="input-group">
                                            <div class="form-file">
                                                <input type="file" class="form-file-input form-daftar form-control" name="panduan_praktek" required>
                                            </div>
                                            <button class="btn btn-dark" type="button" data-fancybox disabled>Preview</button>
                                        </div>
                                        <span class="small text-light">*File berbentuk .pdf</span>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6 mb-2">
                                    <div class="form-group">
                                        <label for="proposal_daftar">Surat Izin Magang (dari Institusi)</label>
                                        <div class="input-group">
                                            <div class="form-file">
                                                <input type="file" class="form-file-input form-daftar form-control" name="izin_pkl" required>
                                            </div>
                                            <button class="btn btn-dark" type="button" data-fancybox disabled>Preview</button>
                                        </div>
                                        <span class="small text-light">*File berbentuk .pdf</span>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6 mb-2">
                                    <div class="form-group">
                                        <label for="akreditasi_daftar">Bukti Akreditasi Institusi</label>
                                        <div class="input-group">
                                            <div class="form-file">
                                                <input type="file" class="form-file-input form-daftar form-control" name="akreditasi" required>
                                            </div>
                                            <button class="btn btn-dark" type="button" data-fancybox disabled>Preview</button>
                                        </div>
                                        <span class="small text-light">*File berbentuk .pdf</span>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6 mb-2">
                                    <div class="form-group">
                                        <label for="mou_daftar">MOU (Institusi dengan RS) <span class="text-light">(opsional)</span></label>
                                        <div class="input-group">
                                            <div class="form-file">
                                                <input type="file" class="form-file-input form-daftar form-control" name="mou" required>
                                            </div>
                                            <button class="btn btn-dark" type="button" data-fancybox disabled>Preview</button>
                                        </div>
                                        <span class="small text-light">*File berbentuk .pdf</span>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6 mb-2">
                                    <div class="form-group">
                                        <label for="buktipkl_daftar">Pengalaman Magang Sebelumnya <span class="text-light">(opsional)</span></label>
                                        <div class="input-group">
                                            <div class="form-file">
                                                <input type="file" class="form-file-input form-daftar form-control" name="bukti_pkl" required>
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
                                <div class="col-12 col-sm-6 mb-2 d-flex align-items-center">
                                    <i class="fas fa-file fa-2x me-4 text-primary"></i>
                                    <div>
                                        <p class="small text-right mb-0">Memiliki Dokumen MOU</p>
                                        <h4 class="text-right docmou" id="docmou_daftar">Tidak Punya</h4>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6 mb-2 d-flex align-items-center">
                                    <i class="fas fa-wallet fa-2x me-4 text-primary"></i>
                                    <div>
                                        <p class="small text-right mb-0">Biaya Pendaftaran</p>
                                        <h4 class="text-right pay" id="pay_daftar">Rp 300.000</h4>
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
                <button type="button" id="btnmagang_submit" data-next="berkas_edit" class="btn btn-primary">Lanjut</button>
            </div>
        </form>
    </div>
</div>