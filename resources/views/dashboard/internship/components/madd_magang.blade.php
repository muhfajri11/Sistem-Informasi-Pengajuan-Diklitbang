<div class="modal fade" id="modal_addmagang" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <form class="modal-content" id="tambah_magang" enctype="multipart/form-data" novalidate>
            <div class="modal-header">
                <h3 class="modal-title text-secondary"><i class="fas fa-file-alt me-2"></i> Ajukan PKL</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal">
                </button>
            </div>
            <div class="modal-body">
                <div class="custom-tab-1">
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a href="#biodata" data-bs-toggle="tab" class="nav-daftar nav-link active show">Biodata</a>
                        </li>
                        <li class="nav-item">
                            <a href="#berkas" data-bs-toggle="tab" class="nav-daftar nav-link">Berkas</a>
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
                                <div class="col-12 col-md-6 mb-2">
                                    <div class="form-group">
                                        <label for="type_daftar">Tipe PKL</label>
                                        <select class="select2_ mb-2" name="type" id="type_daftar" required>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 mb-2">
                                    <div class="form-group">
                                        <label for="jenjangan_daftar">Jenjang Pendidikan</label>
                                        <select class="select2_ mb-2" name="jenjang" id="jenjang_daftar" required>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 mb-2">
                                    <div class="form-group">
                                        <label for="start_date">Tanggal Mulai</label>
                                        <input name="start_date" class="datepicker-default form-control mb-2" id="start_date">
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 mb-2">
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
                        <div id="berkas" class="tab-pane fade">
                            <div class="row">
                                <div class="col-12 col-lg-6 mb-2">
                                    <div class="form-group">
                                        <label for="ktm_daftar">KTP/KTM</label>
                                        <div class="input-group">
                                            <div class="form-file">
                                                <input type="file" class="form-file-input form-daftar form-control" name="ktm_ktp" required>
                                            </div>
                                            <button class="btn btn-dark" type="button" data-fancybox disabled>Preview</button>
                                        </div>
                                        <p class="small text-light mb-0">*File berbentuk .pdf, .jpeg, .jpg, atau .png</p>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6 mb-2">
                                    <div class="form-group">
                                        <label for="proposal_daftar">Proposal PKL</label>
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
                                        <label for="proposal_daftar">Jadwal Praktek</label>
                                        <div class="input-group">
                                            <div class="form-file">
                                                <input type="file" class="form-file-input form-daftar form-control" name="jadwal" required>
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
                                        <label for="proposal_daftar">Surat Izin PKL (dari Institusi)</label>
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
                                        <label for="buktipkl_daftar">Pengalaman PKL <span class="text-light">(opsional)</span></label>
                                        <div class="input-group">
                                            <div class="form-file">
                                                <input type="file" class="form-file-input form-daftar form-control" name="bukti_pkl" required>
                                            </div>
                                            <button class="btn btn-dark" type="button" data-fancybox disabled>Preview</button>
                                        </div>
                                        <span class="small text-light">*File berbentuk .pdf</span>
                                    </div>
                                </div>
                                <div class="col-12 mb-2">
                                    <div class="form-group">
                                        <label for="mou_daftar">MOU (Institusi dengan RS) <span class="text-light">(opsional)</span></label>
                                        <div class="input-group">
                                            <div class="form-file">
                                                <input type="file" class="form-file-input form-daftar form-control" id="mou_daftar" name="mou" data-from="add" required>
                                            </div>
                                            <button class="btn btn-dark" type="button" data-fancybox disabled>Preview</button>
                                        </div>
                                        <span class="small text-light">*File berbentuk .pdf</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="invoice" class="tab-pane fade">
                            <div class="row">
                                <div class="col-12 mb-2">
                                    <div class="accordion accordion-primary" id="invoice_daftar">
                                        <div class="accordion-item">
                                            <div class="accordion-header  rounded-lg" id="invoiceDaftarAccordion" data-bs-toggle="collapse" data-bs-target="#invoiceDaftar" aria-controls="invoiceDaftar"   aria-expanded="true" role="button">
                                                <span class="accordion-header-icon"></span>
                                                <span class="accordion-header-text">Rincian Biaya PKL</span>
                                                <span class="accordion-header-indicator"></span>
                                            </div>
                                            <div id="invoiceDaftar" class="collapse" aria-labelledby="invoiceDaftarAccordion" data-bs-parent="#invoice_daftar">
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
                                <div class="col-xl-12">
                                    <div>
                                        <div class="rekening-slider owl-carousel owl-loaded owl-drag"></div>
                                    </div>
                                </div>
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
                <button type="button" id="btnmagang_submit" data-next="berkas" class="btn btn-primary">Lanjut</button>
            </div>
        </form>
    </div>
</div>