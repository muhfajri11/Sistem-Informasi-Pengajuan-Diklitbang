<div class="modal fade" id="modal_detailmagang" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title text-secondary"><i class="fas fa-atom me-2"></i> Lihat Pengajuan PKL</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal">
                </button>
            </div>
            <div class="modal-body pt-2">
                <div class="custom-tab-1">
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a href="#biodata_view" data-bs-toggle="tab" class="nav-daftar nav-link active show">Biodata</a>
                        </li>
                        <li class="nav-item">
                            <a href="#berkas_view" data-bs-toggle="tab" class="nav-daftar nav-link">Berkas</a>
                        </li>
                    </ul>
                    <div class="tab-content pt-4">
                        <div id="biodata_view" class="tab-pane fade active show">
                            <div class="row">
                                <div class="col-12 mb-2 d-flex align-items-center">
                                    <i class="fas fa-user fa-2x me-4 text-primary"></i>
                                    <div>
                                        <p class="small text-right mb-0">Nama Lengkap</p>
                                        <h4 class="text-right" id="name_view">Test</h4>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6 mb-2 d-flex align-items-center">
                                    <i class="fas fa-id-card fa-2x me-4 text-primary"></i>
                                    <div>
                                        <p class="small text-right mb-0">No. Induk Mahasiswa</p>
                                        <h4 class="text-right" id="nim_view">Test</h4>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6 mb-2 d-flex align-items-center">
                                    <i class="fas fa-university fa-2x me-4 text-primary"></i>
                                    <div>
                                        <p class="small text-right mb-0">Intitusi Asal</p>
                                        <h4 class="text-right" id="institusi_view">Test</h4>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6 mb-2 d-flex align-items-center">
                                    <i class="fas fa-sitemap fa-2x me-4 text-primary"></i>
                                    <div>
                                        <p class="small text-right mb-0">Semester</p>
                                        <h4 class="text-right" id="semester_view">Test</h4>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6 mb-2 d-flex align-items-center">
                                    <i class="fas fa-atom fa-2x me-4 text-primary"></i>
                                    <div>
                                        <p class="small text-right mb-0">Jurusan</p>
                                        <h4 class="text-right" id="jurusan_view">Test</h4>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6 mb-2 d-flex align-items-center">
                                    <i class="fas fa-graduation-cap fa-2x me-4 text-primary"></i>
                                    <div>
                                        <p class="small text-right mb-0">Jenjang Pendidikan</p>
                                        <h4 class="text-right" id="jenjang_view">Test</h4>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6 mb-2 d-flex align-items-center">
                                    <i class="fas fa-graduation-cap fa-2x me-4 text-primary"></i>
                                    <div>
                                        <p class="small text-right mb-0">Tipe PKL</p>
                                        <h4 class="text-right" id="type_view">Test</h4>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6 mb-2 d-flex align-items-center">
                                    <i class="fas fa-hourglass-start fa-2x me-4 text-primary"></i>
                                    <div>
                                        <p class="small text-right mb-0">Mulai PKL</p>
                                        <h4 class="text-right" id="start_view">Test</h4>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6 mb-2 d-flex align-items-center">
                                    <i class="fas fa-hourglass-end fa-2x me-4 text-primary"></i>
                                    <div>
                                        <p class="small text-right mb-0">Selesai PKL</p>
                                        <h4 class="text-right" id="end_view">Test</h4>
                                    </div>
                                </div>
                                <div class="col-12"><hr></div>
                                <div class="col-12 col-sm-6 mb-2 d-flex align-items-center">
                                    <i class="fas fa-map-marked-alt fa-2x me-4 text-primary"></i>
                                    <div>
                                        <p class="small text-right mb-0">Asal Provinsi</p>
                                        <h4 class="text-right" id="province_view">Test</h4>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6 mb-2 d-flex align-items-center">
                                    <i class="fas fa-map-marked-alt fa-2x me-4 text-primary"></i>
                                    <div>
                                        <p class="small text-right mb-0">Asal Kota</p>
                                        <h4 class="text-right" id="city_view">Test</h4>
                                    </div>
                                </div>
                                <div class="col-12 d-flex align-items-center">
                                    <i class="fas fa-map-marker-alt fa-2x me-4 text-primary"></i>
                                    <div>
                                        <p class="small text-right mb-0">Alamat Lengkap</p>
                                        <h4 class="text-right" id="address_view">Test</h4>
                                    </div>
                                </div>
                                <div class="col-12"><hr></div>
                                <div class="col-12 mb-2">
                                    <div class="accordion accordion-primary" id="invoice_detail">
                                        <div class="accordion-item">
                                            <div class="accordion-header  rounded-lg" id="invoiceDetailAccordion" data-bs-toggle="collapse" data-bs-target="#invoiceDetail" aria-controls="invoiceDetail" aria-expanded="true" role="button">
                                                <span class="accordion-header-icon"></span>
                                                <span class="accordion-header-text">Rincian Biaya PKL</span>
                                                <span class="accordion-header-indicator"></span>
                                            </div>
                                            <div id="invoiceDetail" class="collapse" aria-labelledby="invoiceDetailAccordion" data-bs-parent="#invoice_detail">
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
                                <div class="col-12 col-sm-6 mb-2 col-sm-6 mb-2 d-flex align-items-center">
                                    <i class="fas fa-wallet fa-2x me-4 text-primary"></i>
                                    <div>
                                        <p class="small text-right mb-0">Biaya Pendaftaran</p>
                                        <h4 class="text-right pay" id="pay_view">Rp 300.000</h4>
                                    </div>
                                </div>
                                <div class="col-12"><hr></div>
                                <div class="col-12 col-sm-6 mb-2 d-flex align-items-center">
                                    <i class="fas fa-check-circle fa-2x me-4 text-primary"></i>
                                    <div>
                                        <p class="small text-right mb-0">Status</p>
                                        <div class="text-right" id="status_view"></div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6 mb-2 d-flex align-items-center">
                                    <i class="fas fa-money-check-alt fa-2x me-4 text-primary"></i>
                                    <div>
                                        <p class="small text-right mb-0">Status Pembayaran</p>
                                        <div class="text-right" id="statuspay_view"></div>
                                    </div>
                                </div>
                                <div class="col-12 is_rooms d-none"><hr></div>
                                <div class="col-12 mb-2 d-flex align-items-center is_rooms d-none">
                                    <i class="fas fa-hospital-alt fa-2x me-4 text-primary"></i>
                                    <div>
                                        <p class="small text-right mb-0">Penempatan Ruangan</p>
                                        <div class="text-right font-w700" id="rooms_view"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="berkas_view" class="tab-pane fade">
                            <div class="row">
                                <div class="col-6 mb-2">
                                    <p class="small text-right mb-0">KTM/KTP</p>
                                    <div class="text-right" id="ktm_view"></div>
                                </div>
                                <div class="col-6 mb-2">
                                    <p class="small text-right mb-0">Proposal</p>
                                    <div class="text-right" id="proposal_view"></div>
                                </div>
                                <div class="col-6 mb-2">
                                    <p class="small text-right mb-0">Bukti Antigen</p>
                                    <div class="text-right" id="antigen_view"></div>
                                </div>
                                <div class="col-6 mb-2">
                                    <p class="small text-right mb-0">Surat Izin Orang Tua (Materai)</p>
                                    <div class="text-right" id="izinortu_view"></div>
                                </div>
                                <div class="col-6 mb-2">
                                    <p class="small text-right mb-0">Jadwal Praktek</p>
                                    <div class="text-right" id="jadwal_view"></div>
                                </div>
                                <div class="col-6 mb-2">
                                    <p class="small text-right mb-0">Panduan Praktek</p>
                                    <div class="text-right" id="panduanpraktek_view"></div>
                                </div>
                                <div class="col-6 mb-2">
                                    <p class="small text-right mb-0">Surat Izin Pengajuan PKL (dari Institusi)</p>
                                    <div class="text-right" id="izinpkl_view"></div>
                                </div>
                                <div class="col-6 mb-2">
                                    <p class="small text-right mb-0">MOU (Institusi dengan RS)</p>
                                    <div class="text-right" id="mou_view"></div>
                                </div>
                                <div class="col-6 mb-2">
                                    <p class="small text-right mb-0">Pengalaman PKL</p>
                                    <div class="text-right" id="buktipkl_view"></div>
                                </div>
                                <div class="col-6 mb-2">
                                    <p class="small text-right mb-0">Bukti Pembayaran</p>
                                    <div class="text-right" id="evidenpaid_view"></div>
                                </div>
                                <div class="col-6 mb-2">
                                    <p class="small text-right mb-0 is_sertifikat d-none">Sertifikat Kelulusan</p>
                                    <div class="text-right" id="sertifikat_view"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>