<div class="col-12">
    <div class="card">
        <div class="card-body">
            <div id="smartwizard" class="form-wizard order-create">
                <ul class="nav nav-wizard">
                    <li><a class="nav-link" href="#nilai_sosial"> 
                        <span>1</span> 
                        <p class="center-wizard_ d-none d-lg-block">Nilai Sosial/Klinis</p>
                    </a></li>
                    <li><a class="nav-link" href="#nilai_ilmiah">
                        <span>2</span>
                        <p class="center-wizard_ d-none d-lg-block">Nilai Ilmiah</p>
                    </a></li>
                    <li><a class="nav-link" href="#pemerataan">
                        <span>3</span>
                        <p class="center-wizard_ d-none d-lg-block">Pemerataan Beban dan Manfaat</p>
                    </a></li>
                    <li><a class="nav-link" href="#potensi">
                        <span>4</span>
                        <p class="center-wizard_ d-none d-lg-block">Potensi Manfaat dan Resiko</p>
                    </a></li>
                    <li><a class="nav-link" href="#bujukan">
                        <span>5</span>
                        <p class="center-wizard_ d-none d-lg-block">Bujukan/Eksploitasi/Iducement</p>
                    </a></li>
                    <li><a class="nav-link" href="#privacy">
                        <span>6</span>
                        <p class="center-wizard_ d-none d-lg-block">Rahasia dan Privacy</p>
                    </a></li>
                    <li><a class="nav-link" href="#informedconsent">
                        <span>7</span>
                        <p class="center-wizard_ d-none d-lg-block">Informed Consent</p>
                    </a></li>
                </ul>
                <div class="tab-content">
                    <div id="nilai_sosial" class="tab-pane pt-4" role="tabpanel">
                        <div class="row">
                            <h4 class="text-primary">Nilai Sosial/Klinis</h4>
                            <hr>

                            @if(isset($is_edit) || !(isset($self_assesment)))
                            <div class="col-12 d-flex justify-content-end">
                                <button type="button" class="btn btn-dark mt-4 clear_dot"><i class="fas fa-dot-circle me-2"></i> Kosongkan</button>
                            </div>
                            @endif
                            <div class="col-12 mt-2">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-responsive-sm">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>7-Standar Kelayakan Etik Penelitian</th>
                                                <th style="width: 7em">Pilihan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th>1</th>
                                                <td>
                                                    <strong>Nilai Sosial / Klinis</strong><br>
                                                    <i>Penelitian ini memenuhi standar Nilai Sosial/ Klinis,<u>minimal terdapat satu diantara 7 (tujuh) nilai berikut ini :</u></i>
                                                </td>
                                                <td>
                                                    <div class="form-check disabled">
                                                        <input class="form-check-input parent_1" type="radio" name="sosial_1" value="1" disabled>
                                                        <label class="form-check-label">
                                                            Ya
                                                        </label>
                                                    </div>
                                                    <div class="form-check disabled">
                                                        <input class="form-check-input parent_1" type="radio" name="sosial_1" value="0" disabled>
                                                        <label class="form-check-label">
                                                            Tidak
                                                        </label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="numb_right">1.1</th>
                                                <td>
                                                    <strong>Terdapat Novelty (kebaruan).</strong><br>
                                                    Dalam penelitian ini terdapat nilai kebaruan, yaitu terdapat minimal satu dari 3 sifat berikut :
                                                </td>
                                                <td>
                                                    <div class="form-check disabled">
                                                        <input class="form-check-input parent_1_1 child_1" data-child="child_1" type="radio" name="sosial_1_1" value="1" disabled>
                                                        <label class="form-check-label">
                                                            Ya
                                                        </label>
                                                    </div>
                                                    <div class="form-check disabled">
                                                        <input class="form-check-input parent_1_1 child_1" data-child="child_1" type="radio" name="sosial_1_1" value="0" disabled>
                                                        <label class="form-check-label">
                                                            Tidak
                                                        </label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="numb_right"></th>
                                                <td>a. Potensi menghasilkan informasi yang validsesuai dengan tujuan yang dinyatakan dalam protokol penelitian.</td>
                                                <td>
                                                    <div class="form-check form-check-inline">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input child_1_1" data-child="child_1_1" type="radio" name="sosial_1_1a" value="1"> Ya
                                                        </label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input child_1_1" data-child="child_1_1" type="radio" name="sosial_1_1a" value="0"> Tidak
                                                        </label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="numb_right"></th>
                                                <td>	
                                                    b. Memiliki relevansi bermakna dengan masalah kesehatan</td>
                                                <td>
                                                    <div class="form-check form-check-inline">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input child_1_1" data-child="child_1_1" type="radio" name="sosial_1_1b" value="1"> Ya
                                                        </label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input child_1_1" data-child="child_1_1" type="radio" name="sosial_1_1b" value="0"> Tidak
                                                        </label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="numb_right"></th>
                                                <td>	
                                                    c. Memiliki kontribusi terhadap suatu penciptaan/ kebermanfaatan dalam melakukan evaluasi intervensi kebijakan, atau sebagai bagian dari pelaksanaan kegiatan yang mempromosikan kesehatan individu atau masyarakat</td>
                                                <td>
                                                    <div class="form-check form-check-inline">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input child_1_1" data-child="child_1_1" type="radio" name="sosial_1_1c" value="1"> Ya
                                                        </label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input child_1_1" data-child="child_1_1" type="radio" name="sosial_1_1c" value="0"> Tidak
                                                        </label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="numb_right">1.2</th>
                                                <td>Sebagai upaya mendesiminasikan hasil</td>
                                                <td>
                                                    <div class="form-check form-check-inline">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input child_1" data-child="child_1" type="radio" name="sosial_1_2" value="1"> Ya
                                                        </label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input child_1" data-child="child_1" type="radio" name="sosial_1_2" value="0"> Tidak
                                                        </label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="numb_right">1.3</th>
                                                <td>Relevansinya bermanfaat dengan masalah kesehatan</td>
                                                <td>
                                                    <div class="form-check form-check-inline">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input child_1" data-child="child_1" type="radio" name="sosial_1_3" value="1"> Ya
                                                        </label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input child_1" data-child="child_1" type="radio" name="sosial_1_3" value="0"> Tidak
                                                        </label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="numb_right">1.4</th>
                                                <td>Memberikan kontribusi promosi kesehatan</td>
                                                <td>
                                                    <div class="form-check form-check-inline">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input child_1" data-child="child_1" type="radio" name="sosial_1_4" value="1"> Ya
                                                        </label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input child_1" data-child="child_1" type="radio" name="sosial_1_4" value="0"> Tidak
                                                        </label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="numb_right">1.5</th>
                                                <td>Menghasilkan alternatif cara mengatasi masalah</td>
                                                <td>
                                                    <div class="form-check form-check-inline">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input child_1" data-child="child_1" type="radio" name="sosial_1_5" value="1"> Ya
                                                        </label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input child_1" data-child="child_1" type="radio" name="sosial_1_5" value="0"> Tidak
                                                        </label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="numb_right">1.6</th>
                                                <td>Menghasilkan data & informasi yang dapat dimanfaatkan untuk pengambilan keputusan klinis/sosial</td>
                                                <td>
                                                    <div class="form-check form-check-inline">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input child_1" data-child="child_1" type="radio" name="sosial_1_6" value="1"> Ya
                                                        </label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input child_1" data-child="child_1" type="radio" name="sosial_1_6" value="0"> Tidak
                                                        </label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="numb_right">1.7</th>
                                                <td>Terdapat uraian tentang penelitian lanjutan yang dapat dilakukan dari hasil penelitian yang sekarang</td>
                                                <td>
                                                    <div class="form-check form-check-inline">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input child_1" data-child="child_1" type="radio" name="sosial_1_7" value="1"> Ya
                                                        </label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input child_1" data-child="child_1" type="radio" name="sosial_1_7" value="0"> Tidak
                                                        </label>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <h4 class="text-dark">Justifikasi Nilai Sosial/Klinis:</h4>
                            <hr>
                            <div class="col-12">
                                <textarea name="catatan_nilaisosial" class="form-control"></textarea>
                            </div>
                        </div>
                    </div>
                    <div id="nilai_ilmiah" class="tab-pane pt-4" role="tabpanel">
                        <div class="row">
                            <h4 class="text-primary">Nilai Ilmiah</h4>
                            <hr>

                            @if(isset($is_edit) || !(isset($self_assesment)))
                            <div class="col-12 d-flex justify-content-end">
                                <button type="button" class="btn btn-dark mt-4 clear_dot"><i class="fas fa-dot-circle me-2"></i> Kosongkan</button>
                            </div>
                            @endif
                            <div class="col-12 mt-2">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-responsive-sm">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>7-Standar Kelayakan Etik Penelitian</th>
                                                <th style="width: 7em">Pilihan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th>2</th>
                                                <td>
                                                    <strong>Nilai Ilmiah</strong><br>
                                                    <i>Penelitian ini memenuhi standar nilai ilmiah</i>
                                                </td>
                                                <td>
                                                    <div class="form-check disabled">
                                                        <input class="form-check-input parent_2" type="radio" name="ilmiah_2" value="1" disabled>
                                                        <label class="form-check-label">
                                                            Ya
                                                        </label>
                                                    </div>
                                                    <div class="form-check disabled">
                                                        <input class="form-check-input parent_2" type="radio" name="ilmiah_2" value="0" disabled>
                                                        <label class="form-check-label">
                                                            Tidak
                                                        </label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="numb_right"></th>
                                                <td><strong>Memenuhi beberapa parameter butir 2.1 antara lain:</strong></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <th class="numb_right">2.1</th>
                                                <td>Disain penelitian mengikuti kaidah ilmiah, yang menjelaskan secara rinci meliputi :</td>
                                                <td>
                                                    <div class="form-check disabled">
                                                        <input class="form-check-input parent_2_1 child_2" data-child="child_2" type="radio" name="ilmiah_2_1" value="1" disabled>
                                                        <label class="form-check-label">
                                                            Ya
                                                        </label>
                                                    </div>
                                                    <div class="form-check disabled">
                                                        <input class="form-check-input parent_2_1 child_2" data-child="child_2" type="radio" name="ilmiah_2_1" value="0" disabled>
                                                        <label class="form-check-label">
                                                            Tidak
                                                        </label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="numb_right"></th>
                                                <td>	
                                                    a. Desain penelitian;<br>
                                                    Terdapat deskipsi detil tentang desain penelitian, untuk berbagai jenis penelitian.<br>
                                                    <i>
                                                    1) Bila berupa kuesioner, terdapat uraian mengenai tatacara kuesioner, kartu buku harian dan bahan lain yang relevan digunakan untuk menjawab pertanyaan penelitian <br>
                                                    2) Bila penelitian klinis dan atau ujicoba klinis, deskripsi harus meliputi apakah kelompok intervensi ditentukan secara non-random, random, (termasuk bagaimana metodenya), dan apakah blinded (single/double) atau terbuka (open-label)
                                                    </i>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input child_2_1" data-child="child_2_1" type="radio" name="ilmiah_2_1a" value="1"> Ya
                                                        </label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input child_2_1" data-child="child_2_1" type="radio" name="ilmiah_2_1a" value="0"> Tidak
                                                        </label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="numb_right"></th>
                                                <td>b. Tempat dan waktu penelitian</td>
                                                <td>
                                                    <div class="form-check form-check-inline">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input child_2_1" data-child="child_2_1" type="radio" name="ilmiah_2_1b" value="1"> Ya
                                                        </label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input child_2_1" data-child="child_2_1" type="radio" name="ilmiah_2_1b" value="0"> Tidak
                                                        </label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="numb_right"></th>
                                                <td>
                                                    c. Jenis sampel, besar sampel, kriteria inklusi dan eksklusi; teknik sampling <br>
                                                    <i>Terdapat uraian tentang jumlah subjek yang dibutuhkan sesuai tujuan penelitian dan bagaimana penentuannya secara statistik (tergantung relevansi)</i>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input child_2_1" data-child="child_2_1" type="radio" name="ilmiah_2_1c" value="1"> Ya
                                                        </label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input child_2_1" data-child="child_2_1" type="radio" name="ilmiah_2_1c" value="0"> Tidak
                                                        </label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="numb_right"></th>
                                                <td>d. Variabel penelitian dan definisi operasional;</td>
                                                <td>
                                                    <div class="form-check form-check-inline">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input child_2_1" data-child="child_2_1" type="radio" name="ilmiah_2_1d" value="1"> Ya
                                                        </label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input child_2_1" data-child="child_2_1" type="radio" name="ilmiah_2_1d" value="0"> Tidak
                                                        </label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="numb_right"></th>
                                                <td>e. Instrument penelitian/alat untuk mengambil data/bahan penelitian ;</td>
                                                <td>
                                                    <div class="form-check form-check-inline">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input child_2_1" data-child="child_2_1" type="radio" name="ilmiah_2_1e" value="1"> Ya
                                                        </label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input child_2_1" data-child="child_2_1" type="radio" name="ilmiah_2_1e" value="0"> Tidak
                                                        </label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="numb_right"></th>
                                                <td>f. Prosedur penelitian dan keterlibatan subjek, serta dalam protokol menggambarkan peran dan tanggung jawab masing-masing anggota tim</td>
                                                <td>
                                                    <div class="form-check form-check-inline">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input child_2_1" data-child="child_2_1" type="radio" name="ilmiah_2_1f" value="1"> Ya
                                                        </label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input child_2_1" data-child="child_2_1" type="radio" name="ilmiah_2_1f" value="0"> Tidak
                                                        </label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="numb_right"></th>
                                                <td>g. Intervensi/cara pengumpulan data (uraikan secara detail langkah-langkah yang akan dilakukan)</td>
                                                <td>
                                                    <div class="form-check form-check-inline">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input child_2_1" data-child="child_2_1" type="radio" name="ilmiah_2_1g" value="1"> Ya
                                                        </label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input child_2_1" data-child="child_2_1" type="radio" name="ilmiah_2_1g" value="0"> Tidak
                                                        </label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="numb_right"></th>
                                                <td>h. Tata cara pencatatan selama penelitian, termasuk efek samping dan komplikasi bila ada;</td>
                                                <td>
                                                    <div class="form-check form-check-inline">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input child_2_1" data-child="child_2_1" type="radio" name="ilmiah_2_1h" value="1"> Ya
                                                        </label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input child_2_1" data-child="child_2_1" type="radio" name="ilmiah_2_1h" value="0"> Tidak
                                                        </label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="numb_right"></th>
                                                <td>i. Rencana analisis data, jaminan kualitas pengumpulan, penyimpanan dan analisis data</td>
                                                <td>
                                                    <div class="form-check form-check-inline">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input child_2_1" data-child="child_2_1" type="radio" name="ilmiah_2_1i" value="1"> Ya
                                                        </label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input child_2_1" data-child="child_2_1" type="radio" name="ilmiah_2_1i" value="0"> Tidak
                                                        </label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="numb_right"></th>
                                                <td>j. Penjelasan mengenai tes laboratorium dan prosedur diagnostik</td>
                                                <td>
                                                    <div class="form-check form-check-inline">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input child_2_1" data-child="child_2_1" type="radio" name="ilmiah_2_1j" value="1"> Ya
                                                        </label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input child_2_1" data-child="child_2_1" type="radio" name="ilmiah_2_1j" value="0"> Tidak
                                                        </label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="numb_right"></th>
                                                <td>k. Gambaran protokol mengenai pengkodean spesimen dan /atau data</td>
                                                <td>
                                                    <div class="form-check form-check-inline">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input child_2_1" data-child="child_2_1" type="radio" name="ilmiah_2_1k" value="1"> Ya
                                                        </label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input child_2_1" data-child="child_2_1" type="radio" name="ilmiah_2_1k" value="0"> Tidak
                                                        </label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="numb_right"></th>
                                                <td>Jika merupakan <u>bahan biologis/spesimen</u> sebagai subyek:</td>
                                                <td>
                                                    <div class="form-check disabled">
                                                        <input class="form-check-input parent_2_1_ child_2" data-child="child_2" type="radio" name="ilmiah_2_1_" value="1" disabled>
                                                        <label class="form-check-label">
                                                            Ya
                                                        </label>
                                                    </div>
                                                    <div class="form-check disabled">
                                                        <input class="form-check-input parent_2_1_ child_2" data-child="child_2" type="radio" name="ilmiah_2_1_" value="0" disabled>
                                                        <label class="form-check-label">
                                                            Tidak
                                                        </label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="numb_right"></th>
                                                <td>a. Uraian mengenai penggunaan sampel spesimen yang akan dimasukkan, baik dalam penelitian saat ini dan dalam jangka panjang</td>
                                                <td>
                                                    <div class="form-check form-check-inline">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input child_2_1_" data-child="child_2_1_" type="radio" name="ilmiah_2_1_a" value="1"> Ya
                                                        </label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input child_2_1_" data-child="child_2_1_" type="radio" name="ilmiah_2_1_a" value="0"> Tidak
                                                        </label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="numb_right"></th>
                                                <td>b. Penjelasan apabila spesimen akan dikirimkan ke luar negeri atau berpindah dan dimanfaatkan oleh peneliti/pihak lain</td>
                                                <td>
                                                    <div class="form-check form-check-inline">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input child_2_1_" data-child="child_2_1_" type="radio" name="ilmiah_2_1_b" value="1"> Ya
                                                        </label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input child_2_1_" data-child="child_2_1_" type="radio" name="ilmiah_2_1_b" value="0"> Tidak
                                                        </label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="numb_right"></th>
                                                <td>c. Penjelasan lama spesimen akan disimpan dan cara spesimen akan dihancurkan; termasuk ketentuan untuk subjek dalam memutuskan penggunaan sisa spesimen dalam penelitian masa depan yang bersifat terbatas atau tidak spesifik</td>
                                                <td>
                                                    <div class="form-check form-check-inline">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input child_2_1_" data-child="child_2_1_" type="radio" name="ilmiah_2_1_c" value="1"> Ya
                                                        </label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input child_2_1_" data-child="child_2_1_" type="radio" name="ilmiah_2_1_c" value="0"> Tidak
                                                        </label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="numb_right"></th>
                                                <td>d. Penjelasan mengenai pengujian genetik / analisis genom yang akan dilakukan pada bahan biologis manusia</td>
                                                <td>
                                                    <div class="form-check form-check-inline">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input child_2_1_" data-child="child_2_1_" type="radio" name="ilmiah_2_1_d" value="1"> Ya
                                                        </label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input child_2_1_" data-child="child_2_1_" type="radio" name="ilmiah_2_1_d" value="0"> Tidak
                                                        </label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="numb_right"></th>
                                                <td>e. Terdapat penjelasan mengenai prosedur untuk mendapatkan sampel, baik rutin atau intervensi. Jika rutin, terdapat penjelasan bila prosedur merupakan perosedur yang lebih invasif daripada biasanya</td>
                                                <td>
                                                    <div class="form-check form-check-inline">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input child_2_1_" data-child="child_2_1_" type="radio" name="ilmiah_2_1_e" value="1"> Ya
                                                        </label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input child_2_1_" data-child="child_2_1_" type="radio" name="ilmiah_2_1_e" value="0"> Tidak
                                                        </label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="numb_right"></th>
                                                <td><strong>Jika Intervensi/Penelitian uji klinik, maka:</strong></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <th class="numb_right">2.2</th>
                                                <td>Peneliti peneliti harus memahami sepenuhnya kewajiban dan tanggung jawab yang dipersyaratkan dengan:</td>
                                                <td>
                                                    <div class="form-check disabled">
                                                        <input class="form-check-input parent_2_2 child_2" data-child="child_2" type="radio" name="ilmiah_2_2" value="1" disabled>
                                                        <label class="form-check-label">
                                                            Ya
                                                        </label>
                                                    </div>
                                                    <div class="form-check disabled">
                                                        <input class="form-check-input parent_2_2 child_2" data-child="child_2" type="radio" name="ilmiah_2_2" value="0" disabled>
                                                        <label class="form-check-label">
                                                            Tidak
                                                        </label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="numb_right"></th>
                                                <td>a. Memiliki sertifikat Etik Dasar Lanjut dan GCP</td>
                                                <td>
                                                    <div class="form-check form-check-inline">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input child_2_2" data-child="child_2_2" type="radio" name="ilmiah_2_2a" value="1"> Ya
                                                        </label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input child_2_2" data-child="child_2_2" type="radio" name="ilmiah_2_2a" value="0"> Tidak
                                                        </label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="numb_right"></th>
                                                <td>b. Mengisi dan menyerahkan daftar tilik GCP E6.4.1-13 yang telah di tandatangani peneliti tentang ringkasan tanggung jawab peneliti yang berkaitan dengan uji klinik kepada KEPK (tersedia di web sim-epk.keppkn.kemkes.go.id)</td>
                                                <td>
                                                    <div class="form-check form-check-inline">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input child_2_2" data-child="child_2_2" type="radio" name="ilmiah_2_2b" value="1"> Ya
                                                        </label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input child_2_2" data-child="child_2_2" type="radio" name="ilmiah_2_2b" value="0"> Tidak
                                                        </label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="numb_right"></th>
                                                <td>Kontribusinya terhadap penciptaan atau evaluasi intervensi, harus memenuhi: <i>semua atau antara lain</i></td>
                                                <td>
                                                    <div class="form-check disabled">
                                                        <input class="form-check-input parent_2_2_ child_2" data-child="child_2" type="radio" name="ilmiah_2_2_" value="1" disabled>
                                                        <label class="form-check-label">
                                                            Ya
                                                        </label>
                                                    </div>
                                                    <div class="form-check disabled">
                                                        <input class="form-check-input parent_2_2_ child_2" data-child="child_2" type="radio" name="ilmiah_2_2_" value="0" disabled>
                                                        <label class="form-check-label">
                                                            Tidak
                                                        </label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="numb_right"></th>
                                                <td>a. Terdapat ringkasan hasil penelitian sebelumnya sesuai topik penelitian yang diusulkan, baik yang belum dipublikasi/diketahui peneliti dan sponsor, dan sudah dipublikasi, termasuk kajian-kajian pada hewan</td>
                                                <td>
                                                    <div class="form-check form-check-inline">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input child_2_2_" data-child="child_2_2_" type="radio" name="ilmiah_2_2_a" value="1"> Ya
                                                        </label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input child_2_2_" data-child="child_2_2_" type="radio" name="ilmiah_2_2_a" value="0"> Tidak
                                                        </label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="numb_right"></th>
                                                <td>b. Terdapat gambaran singkat tentang lokasi penelitian,informasi demografis dan epedemiologis yang relevan tentang daerah penelitian, termasuk informasi ketersediaan fasilitas yang laik untuk keamanan dan ketepatan penelitian.</td>
                                                <td>
                                                    <div class="form-check form-check-inline">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input child_2_2_" data-child="child_2_2_" type="radio" name="ilmiah_2_2_b" value="1"> Ya
                                                        </label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input child_2_2_" data-child="child_2_2_" type="radio" name="ilmiah_2_2_b" value="0"> Tidak
                                                        </label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="numb_right"></th>
                                                <td>c. Terdapat deskripsi dan penjelasan semua intervensi (metode perlakuan), termasuk rute pemberian, dosis, interval dosis, dan masa perlakuan produk yang digunakan (investigasi dan pembanding)</td>
                                                <td>
                                                    <div class="form-check form-check-inline">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input child_2_2_" data-child="child_2_2_" type="radio" name="ilmiah_2_2_c" value="1"> Ya
                                                        </label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input child_2_2_" data-child="child_2_2_" type="radio" name="ilmiah_2_2_c" value="0"> Tidak
                                                        </label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="numb_right"></th>
                                                <td>d. Terdapat rencana dan justifikasi untuk meneruskan atau menghentikan standar terapi selama penelitian</td>
                                                <td>
                                                    <div class="form-check form-check-inline">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input child_2_2_" data-child="child_2_2_" type="radio" name="ilmiah_2_2_d" value="1"> Ya
                                                        </label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input child_2_2_" data-child="child_2_2_" type="radio" name="ilmiah_2_2_d" value="0"> Tidak
                                                        </label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="numb_right"></th>
                                                <td>e. Terdapat uraian jenis perlakuan/pengobatan lain yang mungkin diberikan atau diperbolehkan, atau menjadi kontraindikasi, selama penelitian</td>
                                                <td>
                                                    <div class="form-check form-check-inline">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input child_2_2_" data-child="child_2_2_" type="radio" name="ilmiah_2_2_e" value="1"> Ya
                                                        </label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input child_2_2_" data-child="child_2_2_" type="radio" name="ilmiah_2_2_e" value="0"> Tidak
                                                        </label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="numb_right"></th>
                                                <td>f. Terdapat penjelasan tentang pemeriksaan klinis/ non klinis yang harus dilakukan;</td>
                                                <td>
                                                    <div class="form-check form-check-inline">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input child_2_2_" data-child="child_2_2_" type="radio" name="ilmiah_2_2_f" value="1"> Ya
                                                        </label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input child_2_2_" data-child="child_2_2_" type="radio" name="ilmiah_2_2_f" value="0"> Tidak
                                                        </label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="numb_right"></th>
                                                <td><strong>dan beberapa kriteria ini harus ada :</strong></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <th class="numb_right"></th>
                                                <td>g. Terdapat format laporan kasus yang sudah terstandar, metode pencatatan respon terapetik (deskripsi dan evaluasi metode dan frekuensi pengukuran), prosedur tindak lanjut, dan, bila mungkin, ukuran yang diusulkan untuk mentukan tingkat kepatuhan subjek yang menerima perlakuan.</td>
                                                <td>
                                                    <div class="form-check form-check-inline">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input child_2_2_" data-child="child_2_2_" type="radio" name="ilmiah_2_2_g" value="1"> Ya
                                                        </label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input child_2_2_" data-child="child_2_2_" type="radio" name="ilmiah_2_2_g" value="0"> Tidak
                                                        </label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="numb_right"></th>
                                                <td>h. Terdapat aturan atau kriteria kapan subjek bisa diberhentikan dari penelitian atau uji klinis, atau, dalam hal studi multi senter, kapan sebuah pusat/lembaga di non-aktifkan, dan kapan penelitian bisa dihentikan (tidak lagi dilanjutkan)</td>
                                                <td>
                                                    <div class="form-check form-check-inline">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input child_2_2_" data-child="child_2_2_" type="radio" name="ilmiah_2_2_h" value="1"> Ya
                                                        </label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input child_2_2_" data-child="child_2_2_" type="radio" name="ilmiah_2_2_h" value="0"> Tidak
                                                        </label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="numb_right"></th>
                                                <td>i. Terdapat uraian tentang metode pencatatan dan pelaporan <i>Adverse Events</i> atau reaksi, dan syarat penanganan (jika terjadi) komplikasi</td>
                                                <td>
                                                    <div class="form-check form-check-inline">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input child_2_2_" data-child="child_2_2_" type="radio" name="ilmiah_2_2_i" value="1"> Ya
                                                        </label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input child_2_2_" data-child="child_2_2_" type="radio" name="ilmiah_2_2_i" value="0"> Tidak
                                                        </label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="numb_right"></th>
                                                <td>j. Terdapat uraian tentang risiko yang diketahui dari <i>Adverse Events</i>, termasuk risiko yang terkait dengan masing masing rencana intervensi, dan terkait dengan obat, vaksin, atau terhadap prosedur yang akan diujicobakan</td>
                                                <td>
                                                    <div class="form-check form-check-inline">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input child_2_2_" data-child="child_2_2_" type="radio" name="ilmiah_2_2_j" value="1"> Ya
                                                        </label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input child_2_2_" data-child="child_2_2_" type="radio" name="ilmiah_2_2_j" value="0"> Tidak
                                                        </label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="numb_right"></th>
                                                <td>k. Terdapat deskripsi tentang rencana analisis statistik, termasuk rencana analisis interim bila diperlukan, dan kreteria bila atau dalam kondisi bagaimana akan terjadi penghentian prematur keseluruhan penelitian</td>
                                                <td>
                                                    <div class="form-check form-check-inline">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input child_2_2_" data-child="child_2_2_" type="radio" name="ilmiah_2_2_k" value="1"> Ya
                                                        </label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input child_2_2_" data-child="child_2_2_" type="radio" name="ilmiah_2_2_k" value="0"> Tidak
                                                        </label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="numb_right"></th>
                                                <td>l. Terdapat rincian sumber dan jumlah dana riset; lembaga penyandang dana, dan pernyataan komitmen finansial sponsor pada kelembagaan penelitian, para peneliti, para subjek riset, dan, bila ada, pada komunitas</td>
                                                <td>
                                                    <div class="form-check form-check-inline">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input child_2_2_" data-child="child_2_2_" type="radio" name="ilmiah_2_2_l" value="1"> Ya
                                                        </label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input child_2_2_" data-child="child_2_2_" type="radio" name="ilmiah_2_2_l" value="0"> Tidak
                                                        </label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="numb_right"></th>
                                                <td>	
                                                    m. Terdapat dokumen pengaturan ( <i>financial disclosure</i> )untuk mengatasi konflik finansial atau yang lainnya yang bisa mempengaruhi keputusan para peneliti atau personil lainya; peluang adanya konflik kepentingan ( <i>conflict of interest</i> ); dan langkah langkah berikutnya yang harus dilakukan</td>
                                                <td>
                                                    <div class="form-check form-check-inline">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input child_2_2_" data-child="child_2_2_" type="radio" name="ilmiah_2_2_m" value="1"> Ya
                                                        </label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input child_2_2_" data-child="child_2_2_" type="radio" name="ilmiah_2_2_m" value="0"> Tidak
                                                        </label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="numb_right"></th>
                                                <td>	
                                                    n. Terdapat penjelasan jika hasil riset negatif dan memastikan bahwa hasilnya tersedia melalui publikasi atau dengan melaporkan ke otoritas pencatatan obat obatan (regulator)</td>
                                                <td>
                                                    <div class="form-check form-check-inline">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input child_2_2_" data-child="child_2_2_" type="radio" name="ilmiah_2_2_n" value="1"> Ya
                                                        </label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input child_2_2_" data-child="child_2_2_" type="radio" name="ilmiah_2_2_n" value="0"> Tidak
                                                        </label>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <h4 class="text-dark">Justifikasi Nilai Ilmiah:</h4>
                            <hr>
                            <div class="col-12">
                                <textarea name="catatan_nilaiilmiah" class="form-control"></textarea>
                            </div>
                        </div>
                    </div>
                    <div id="pemerataan" class="tab-pane pt-4" role="tabpanel">
                        <div class="row">
                            <h4 class="text-primary">Pemerataan Beban dan Manfaat</h4>
                            <hr>

                            @if(isset($is_edit) || !(isset($self_assesment)))
                            <div class="col-12 d-flex justify-content-end">
                                <button type="button" class="btn btn-dark mt-4 clear_dot"><i class="fas fa-dot-circle me-2"></i> Kosongkan</button>
                            </div>
                            @endif
                            <div class="col-12 mt-2">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-responsive-sm">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>7-Standar Kelayakan Etik Penelitian</th>
                                                <th style="width: 7em">Pilihan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th>3</th>
                                                <td>
                                                    <strong>Pemerataan Beban dan Manfaat</strong><br>
                                                    <i>Pemerataan beban dan manfaat mengharuskan peserta/ subjek diambil dari kualifikasi populasi di wilayah geografis di mana hasilnya dapat diterapkan</i>.Protokol suatu penelitian mencerminkan adanya perhatian atas <i>minimal <u>satu</u></i> diantara butir-butir di bawah ini:
                                                </td>
                                                <td>
                                                    <div class="form-check disabled">
                                                        <input class="form-check-input parent_3" type="radio" name="pemerataan_3" value="1" disabled>
                                                        <label class="form-check-label">
                                                            Ya
                                                        </label>
                                                    </div>
                                                    <div class="form-check disabled">
                                                        <input class="form-check-input parent_3" type="radio" name="pemerataan_3" value="0" disabled>
                                                        <label class="form-check-label">
                                                            Tidak
                                                        </label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="numb_right">3.1</th>
                                                <td>
                                                    Tercantum uraian bahwa manfaat dan beban didistribusikan secara merata
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input child_3" data-child="child_3" type="radio" name="pemerataan_3_1" value="1"> Ya
                                                        </label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input child_3" data-child="child_3" type="radio" name="pemerataan_3_1" value="0"> Tidak
                                                        </label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="numb_right">3.2</th>
                                                <td>Rekrutmen subjek dilakukan berdasarkan pertimbangan ilmiah, dan tidak berdasarkan status sosial ekonomi, atau karena mudahnya subjek dimanipulasi atau dipengaruhi untuk mempermudah proses maupun pencapaian tujuan penelitian. <br>
                                                    Bila pemilihan berdasarkan pada sosial ekonomi, harus atas dasar pertimbangan etik dan ilmiah <br>
                                                    - <i>Terdapat rincian kriteria subjek dan alasan penentuan yang tidak masuk kriteria dari kelompok kelompok berdasarkan umur, sex, faktor sosial atau ekonomi, atau alasan alasan lainnya</i></td>
                                                <td>
                                                    <div class="form-check form-check-inline">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input child_3" data-child="child_3" type="radio" name="pemerataan_3_2" value="1"> Ya
                                                        </label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input child_3" data-child="child_3" type="radio" name="pemerataan_3_2" value="0"> Tidak
                                                        </label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="numb_right">3.3</th>
                                                <td>	
                                                    Informasi dalam “media” perekrutan peserta (misalnya iklan, pemberitahuan, artikel media transkrip pesan radio) disediakan dalam bahasa Inggris atau bahasa lokal</td>
                                                <td>
                                                    <div class="form-check form-check-inline">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input child_3" data-child="child_3" type="radio" name="pemerataan_3_3" value="1"> Ya
                                                        </label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input child_3" data-child="child_3" type="radio" name="pemerataan_3_3" value="0"> Tidak
                                                        </label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="numb_right">3.4</th>
                                                <td>	
                                                    Dalam memilih atau tidak memilih subjek tertentu, pertimbangkan kekhususan subjek sehingga perlu perlindungan khusus selama menjadi subjek; hal ini dapat dibenarkan karena peneliti mempertimbangkan kemungkinan memburuknya kesenjangan kesehatan</td>
                                                <td>
                                                    <div class="form-check form-check-inline">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input child_3" data-child="child_3" type="radio" name="pemerataan_3_4" value="1"> Ya
                                                        </label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input child_3" data-child="child_3" type="radio" name="pemerataan_3_4" value="0"> Tidak
                                                        </label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="numb_right">3.5</th>
                                                <td>Kelompok subjek yang tidak mungkin memperoleh manfaat dari penelitian ini, dapat dipisahkan dari subjek lain, agar terhindar dari risiko dan beban yang sama</td>
                                                <td>
                                                    <div class="form-check form-check-inline">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input child_3" data-child="child_3" type="radio" name="pemerataan_3_5" value="1"> Ya
                                                        </label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input child_3" data-child="child_3" type="radio" name="pemerataan_3_5" value="0"> Tidak
                                                        </label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="numb_right">3.6</th>
                                                <td>Kelompok yang kurang terwakili dalam penelitian medis harus diberikan akses yg tepat untuk berpartisipasi, selain sebagai subjek/ sampel penelitian</td>
                                                <td>
                                                    <div class="form-check form-check-inline">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input child_3" data-child="child_3" type="radio" name="pemerataan_3_6" value="1"> Ya
                                                        </label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input child_3" data-child="child_3" type="radio" name="pemerataan_3_6" value="0"> Tidak
                                                        </label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="numb_right">3.7</th>
                                                <td>Pembedaan distribusi beban dan manfaat juga dapat dipertimbangkan untuk dilakukan jika berkait dengan lokasi populasi</td>
                                                <td>
                                                    <div class="form-check form-check-inline">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input child_3" data-child="child_3" type="radio" name="pemerataan_3_7" value="1"> Ya
                                                        </label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input child_3" data-child="child_3" type="radio" name="pemerataan_3_7" value="0"> Tidak
                                                        </label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="numb_right">3.8</th>
                                                <td>Jumlah/proporsi subjek terpinggirkan dalam penelitian ini terwakili secara seimbang dengan kelompok lain</td>
                                                <td>
                                                    <div class="form-check form-check-inline">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input child_3" data-child="child_3" type="radio" name="pemerataan_3_8" value="1"> Ya
                                                        </label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input child_3" data-child="child_3" type="radio" name="pemerataan_3_8" value="0"> Tidak
                                                        </label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="numb_right">3.9</th>
                                                <td>Subjek terpilih menerima beban keikutsertaan dalam penelitian lebih besar (>) dibanding dengan peluang menikmati manfaat pengetahuan dan hasil dari penelitian</td>
                                                <td>
                                                    <div class="form-check form-check-inline">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input child_3" data-child="child_3" type="radio" name="pemerataan_3_9" value="1"> Ya
                                                        </label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input child_3" data-child="child_3" type="radio" name="pemerataan_3_9" value="0"> Tidak
                                                        </label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="numb_right">3.10</th>
                                                <td>Kelompok rentan tidak dikeluarkan dari partisipasi dalam penelitian, meski bermaksud melindunginya; tetap diikutsertakan agar memperoleh manfaat secara proporsional sebagaimana subjek dari kelompok lainnya</td>
                                                <td>
                                                    <div class="form-check form-check-inline">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input child_3" data-child="child_3" type="radio" name="pemerataan_3_10" value="1"> Ya
                                                        </label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input child_3" data-child="child_3" type="radio" name="pemerataan_3_10" value="0"> Tidak
                                                        </label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="numb_right">3.11</th>
                                                <td>Penelitian tidak memanfaatkan subjek secara berlebihan karena kemudahan memperoleh subjek, misalnya tahanan, mahasiswa peneliti, bawahan peneliti; juga karena dekatnya dengan lokasi penelitian, kompensasi utk subjek kecil, dan sejenisnya</td>
                                                <td>
                                                    <div class="form-check disabled">
                                                        <input class="form-check-input parent_3_11 child_3" data-child="child_3" type="radio" name="pemerataan_3_11" value="1" disabled>
                                                        <label class="form-check-label">
                                                            Ya
                                                        </label>
                                                    </div>
                                                    <div class="form-check disabled">
                                                        <input class="form-check-input parent_3_11 child_3" data-child="child_3" type="radio" name="pemerataan_3_11" value="0" disabled>
                                                        <label class="form-check-label">
                                                            Tidak
                                                        </label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="numb_right"></th>
                                                <td>a. Terdapat pernyataan yang jelas tentang pentingnya penelitian, pentingnya untuk pembangunan dan untuk memenuhi kebutuhan bangsa, khususnya penduduk/komunitas di lokasi penelitian</td>
                                                <td>
                                                    <div class="form-check form-check-inline">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input child_3_11" data-child="child_3_11" type="radio" name="pemerataan_3_11a" value="1"> Ya
                                                        </label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input child_3_11" data-child="child_3_11" type="radio" name="pemerataan_3_11a" value="0"> Tidak
                                                        </label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="numb_right"></th>
                                                <td>b. Kriteria subjek dan alasan penentuan yang tidak masuk kriteria dari kelompok kelompok berdasarkan umur, sex, faktor sosial atau ekonomi, atau alasan alasan lainnya</td>
                                                <td>
                                                    <div class="form-check form-check-inline">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input child_3_11" data-child="child_3_11" type="radio" name="pemerataan_3_11b" value="1"> Ya
                                                        </label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input child_3_11" data-child="child_3_11" type="radio" name="pemerataan_3_11b" value="0"> Tidak
                                                        </label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="numb_right"></th>
                                                <td>c. Terdapat alasan melibatkan anak atau orang dewasa yang tidak bisa mandiri, atau kelompok rentan, serta langkah langkah bagaimana memaksimalkan manfaat penelitian bagi mereka</td>
                                                <td>
                                                    <div class="form-check form-check-inline">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input child_3_11" data-child="child_3_11" type="radio" name="pemerataan_3_11c" value="1"> Ya
                                                        </label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input child_3_11" data-child="child_3_11" type="radio" name="pemerataan_3_11c" value="0"> Tidak
                                                        </label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="numb_right"></th>
                                                <td>d. Terdapat rencana dan alasan untuk meneruskan atau menghentikan standar terapi selama penelitian, jika diperlukan termasuk jika tidak memberi manfaat kepada subjek dan populasi</td>
                                                <td>
                                                    <div class="form-check form-check-inline">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input child_3_11" data-child="child_3_11" type="radio" name="pemerataan_3_11d" value="1"> Ya
                                                        </label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input child_3_11" data-child="child_3_11" type="radio" name="pemerataan_3_11d" value="0"> Tidak
                                                        </label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="numb_right"></th>
                                                <td>e. Terdapat penjelasan tentang perlakuan lain yang mungkin diberikan atau diperbolehkan, atau menjadi kontraindikasi, selama penelitian, sekaligus memberi manfaat bagi subjek karena adanya pengetahuan dan pengalaman itu</td>
                                                <td>
                                                    <div class="form-check form-check-inline">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input child_3_11" data-child="child_3_11" type="radio" name="pemerataan_3_11e" value="1"> Ya
                                                        </label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input child_3_11" data-child="child_3_11" type="radio" name="pemerataan_3_11e" value="0"> Tidak
                                                        </label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="numb_right"></th>
                                                <td>f. Terdapat penjelasan tentang rencana pemeriksaan klinis atau pemeriksaan laboratorium lain yang harus dilakukan untuk mencapai tujuan penelitian sekaligus memberikan manfaat karena subjek memperoleh informasi kemajuan penyakit/ kesehatannya</td>
                                                <td>
                                                    <div class="form-check form-check-inline">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input child_3_11" data-child="child_3_11" type="radio" name="pemerataan_3_11f" value="1"> Ya
                                                        </label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input child_3_11" data-child="child_3_11" type="radio" name="pemerataan_3_11f" value="0"> Tidak
                                                        </label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="numb_right"></th>
                                                <td>g. Disertakan format laporan kasus yang sudah distandarisasi, metode pencataran respon terapetik (deskripsi dan evaluasi metode dan frekuensi pengukuran), prosedur tindak lanjut, dan, bila mungkin, ukuran yang diusulkan untuk menentukan tingkat kepatuhan subjek yang menerima perlakuan; lengkap dengan manfaat yg diperoleh subjek karena dapat dipantaunya kemajuan kesehatan/ penyakitnya</td>
                                                <td>
                                                    <div class="form-check form-check-inline">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input child_3_11" data-child="child_3_11" type="radio" name="pemerataan_3_11g" value="1"> Ya
                                                        </label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input child_3_11" data-child="child_3_11" type="radio" name="pemerataan_3_11g" value="0"> Tidak
                                                        </label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="numb_right"></th>
                                                <td>h. Terdapat uraian tentang potensi manfaat/keuntungan dengan keikutsertaan dalam penelitian secara pribadi bagi subjek dan bagi yang lainnya</td>
                                                <td>
                                                    <div class="form-check form-check-inline">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input child_3_11" data-child="child_3_11" type="radio" name="pemerataan_3_11h" value="1"> Ya
                                                        </label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input child_3_11" data-child="child_3_11" type="radio" name="pemerataan_3_11h" value="0"> Tidak
                                                        </label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="numb_right"></th>
                                                <td>i. Terdapai uraian keuntungan yang dapat diharapkan dari penelitian ini bagi penduduk, termasuk pengetahuan baru yang dapat dihasilkan</td>
                                                <td>
                                                    <div class="form-check form-check-inline">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input child_3_11" data-child="child_3_11" type="radio" name="pemerataan_3_11i" value="1"> Ya
                                                        </label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input child_3_11" data-child="child_3_11" type="radio" name="pemerataan_3_11i" value="0"> Tidak
                                                        </label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="numb_right"></th>
                                                <td>j. Terdapat uraian kemungkinan dapat diberikan kelanjutan akses bila hasil intervensi menghasilkan manfaat yang signifikan, modalitas yang tersedia, pihak-pihak yang akan mendapatkan keberlangsungan pengobatan, organisasi yang akan membayar, dan untuk berapa lama</td>
                                                <td>
                                                    <div class="form-check form-check-inline">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input child_3_11" data-child="child_3_11" type="radio" name="pemerataan_3_11j" value="1"> Ya
                                                        </label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input child_3_11" data-child="child_3_11" type="radio" name="pemerataan_3_11j" value="0"> Tidak
                                                        </label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="numb_right"></th>
                                                <td>k. Ketika penelitian melibatkan ibu hamil, ada penjelasan tentang adanya rencana untuk memonitor kesehatan ibu dan kesehatan anak dalam jangka pendek maupun jangka panjang</td>
                                                <td>
                                                    <div class="form-check form-check-inline">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input child_3_11" data-child="child_3_11" type="radio" name="pemerataan_3_11k" value="1"> Ya
                                                        </label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input child_3_11" data-child="child_3_11" type="radio" name="pemerataan_3_11k" value="0"> Tidak
                                                        </label>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <h4 class="text-dark">Justifikasi Pemerataan Beban dan Manfaat:</h4>
                            <hr>
                            <div class="col-12">
                                <textarea name="catatan_pemerataan" class="form-control"></textarea>
                            </div>
                        </div>
                    </div>
                    <div id="potensi" class="tab-pane pt-4" role="tabpanel">
                        <div class="row">
                            <h4 class="text-primary">Potensi Manfaat dan Resiko</h4>
                            <hr>

                            @if(isset($is_edit) || !(isset($self_assesment)))
                            <div class="col-12 d-flex justify-content-end">
                                <button type="button" class="btn btn-dark mt-4 clear_dot"><i class="fas fa-dot-circle me-2"></i> Kosongkan</button>
                            </div>
                            @endif
                            <div class="col-12 mt-2">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-responsive-sm">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>7-Standar Kelayakan Etik Penelitian</th>
                                                <th style="width: 7em">Pilihan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th>4</th>
                                                <td>
                                                    <strong>Potensi Manfaat dan Resiko</strong><br>
                                                    Risiko kepada subjek seminimal mungkin dengan keseimbangan memadai/tepat dalam kaitannya dengan prospek potensial manfaat terhadap individu, nilai sosial dan ilmiah suatu penelitian.
                                                    <ul>
                                                        <li>menyiratkan ketidaknyamanan, atau beban yang merugikan mulai dari yang amat kecil dan hampir pasti terjadi.</li>
                                                        <li>potensi subjek mengalami kerugian fisik, psikis, sosial, material</li>
                                                        <li>kerugian yang besar dan atau bermakna.</li>
                                                        <li>risiko kematian sangat tinggi, belum/tidak adanya perawatan yang efektif</li>
                                                    </ul>
                                                </td>
                                                <td>
                                                    <div class="form-check disabled">
                                                        <input class="form-check-input parent_4" type="radio" name="potensi_4" value="1" disabled>
                                                        <label class="form-check-label">
                                                            Ya
                                                        </label>
                                                    </div>
                                                    <div class="form-check disabled">
                                                        <input class="form-check-input parent_4" type="radio" name="potensi_4" value="0" disabled>
                                                        <label class="form-check-label">
                                                            Tidak
                                                        </label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="numb_right">4.1</th>
                                                <td>
                                                    Terdapat uraian potensi manfaat penelitian yang lebih besar bagi individu/subjek
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input child_4" data-child="child_4" type="radio" name="potensi_4_1" value="1"> Ya
                                                        </label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input child_4" data-child="child_4" type="radio" name="potensi_4_1" value="0"> Tidak
                                                        </label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="numb_right">4.2</th>
                                                <td>Terdapat uraian risiko bahwa risiko sangat minimal yang didukung bukti intervensi setidaknya menguntungkan;</td>
                                                <td>
                                                    <div class="form-check form-check-inline">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input child_4" data-child="child_4" type="radio" name="potensi_4_2" value="1"> Ya
                                                        </label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input child_4" data-child="child_4" type="radio" name="potensi_4_2" value="0"> Tidak
                                                        </label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="numb_right">4.3</th>
                                                <td>Tersedia uraian intervensi efektif (sesuai dengan <i>golden standard</i>) yang harus diberikan kepada kelompok intervensi dan kontrol;</td>
                                                <td>
                                                    <div class="form-check form-check-inline">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input child_4" data-child="child_4" type="radio" name="potensi_4_3" value="1"> Ya
                                                        </label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input child_4" data-child="child_4" type="radio" name="potensi_4_3" value="0"> Tidak
                                                        </label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="numb_right">4.4</th>
                                                <td>Terdapat uraian tentang kerugian yang dapat dialami oleh subjek, tetapi hanya <i>sedikit</i> di atas ambang risiko minimal</td>
                                                <td>
                                                    <div class="form-check form-check-inline">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input child_4" data-child="child_4" type="radio" name="potensi_4_4" value="1"> Ya
                                                        </label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input child_4" data-child="child_4" type="radio" name="potensi_4_4" value="0"> Tidak
                                                        </label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="numb_right">4.5</th>
                                                <td>Terdapat uraian tentang tinggi rendahnya potensi risiko penelitian terhadap peneliti</td>
                                                <td>
                                                    <div class="form-check form-check-inline">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input child_4" data-child="child_4" type="radio" name="potensi_4_5" value="1"> Ya
                                                        </label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input child_4" data-child="child_4" type="radio" name="potensi_4_5" value="0"> Tidak
                                                        </label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="numb_right">4.6</th>
                                                <td>Terdapat uraian tentang kerugian yang dapat dialami oleh subjek; fisik, sosial, emosional, stigmatisasi, kehilangan privasi, berbagi informasi rahasia, pelecehan gender</td>
                                                <td>
                                                    <div class="form-check form-check-inline">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input child_4" data-child="child_4" type="radio" name="potensi_4_6" value="1"> Ya
                                                        </label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input child_4" data-child="child_4" type="radio" name="potensi_4_6" value="0"> Tidak
                                                        </label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="numb_right">4.7</th>
                                                <td>Terdapat uraian tentang tinggi rendahnya risiko penelitian terhadap kelompok/ masyarakat</td>
                                                <td>
                                                    <div class="form-check form-check-inline">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input child_4" data-child="child_4" type="radio" name="potensi_4_7" value="1"> Ya
                                                        </label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input child_4" data-child="child_4" type="radio" name="potensi_4_7" value="0"> Tidak
                                                        </label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="numb_right">4.8</th>
                                                <td>Terdapat simpulan agregat risiko dan manfaat dari keseluruhan penelitian</td>
                                                <td>
                                                    <div class="form-check form-check-inline">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input child_4" data-child="child_4" type="radio" name="potensi_4_8" value="1"> Ya
                                                        </label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input child_4" data-child="child_4" type="radio" name="potensi_4_8" value="0"> Tidak
                                                        </label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="numb_right">4.9</th>
                                                <td>Terdapat uraian tentang <i>potensi risiko</i> terhadap subjek, mengalami kerugian fisik, psikis, dan sosial yang lebih besar (>) diatasrisiko minimal, <i>selama atau bahkan setelah penelitian berakhir</i>.</td>
                                                <td>
                                                    <div class="form-check form-check-inline">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input child_4" data-child="child_4" type="radio" name="potensi_4_9" value="1"> Ya
                                                        </label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input child_4" data-child="child_4" type="radio" name="potensi_4_9" value="0"> Tidak
                                                        </label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="numb_right">4.10</th>
                                                <td>Terdapat penjelasan tentang keuntungan yang diperoleh secara sosial dan ilmiah; yaitu prospek dan potensi dari hasil penelitian yang menghasilkan ilmu pengetahuan baru sebagai media yang diperlukan untuk melindungi dan meningkatkan kesehatan masyarakat; dibandingkan dengan potensi kerugian /risiko yang dapat terjadi kepada subjek</td>
                                                <td>
                                                    <div class="form-check form-check-inline">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input child_4" data-child="child_4" type="radio" name="potensi_4_10" value="1"> Ya
                                                        </label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input child_4" data-child="child_4" type="radio" name="potensi_4_10" value="0"> Tidak
                                                        </label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="numb_right">4.11</th>
                                                <td>Terdapat brosur peneliti (termasuk informasi keselamatan) saat melibatkan obat-obatan baru atau vaksin</td>
                                                <td>
                                                    <div class="form-check form-check-inline">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input child_4" data-child="child_4" type="radio" name="potensi_4_11" value="1"> Ya
                                                        </label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input child_4" data-child="child_4" type="radio" name="potensi_4_11" value="0"> Tidak
                                                        </label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="numb_right">4.12</th>
                                                <td>Protokol mendeskripsikan manfaat yang diterima oleh komunitas asal subyek, selama dan paska penelitian (berakhir) termasuk deskripsi bahwa penelitian menguntungkan bagi masyarakat di luar populasi penelitian</td>
                                                <td>
                                                    <div class="form-check form-check-inline">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input child_4" data-child="child_4" type="radio" name="potensi_4_12" value="1"> Ya
                                                        </label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input child_4" data-child="child_4" type="radio" name="potensi_4_12" value="0"> Tidak
                                                        </label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="numb_right">4.13</th>
                                                <td>Pada penelitian intervensi, terdapat informasi mengenai perlunya Komite Pemantauan Keamanan Data (DSMB/DMC)</td>
                                                <td>
                                                    <div class="form-check form-check-inline">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input child_4" data-child="child_4" type="radio" name="potensi_4_13" value="1"> Ya
                                                        </label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input child_4" data-child="child_4" type="radio" name="potensi_4_13" value="0"> Tidak
                                                        </label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="numb_right">4.14</th>
                                                <td>Protokol menjelaskan mengenai kemungkinan adanya kejadian buruk serius (Serious Adverse Event/SAE) dan mekanisme pelaoran</td>
                                                <td>
                                                    <div class="form-check form-check-inline">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input child_4" data-child="child_4" type="radio" name="potensi_4_14" value="1"> Ya
                                                        </label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input child_4" data-child="child_4" type="radio" name="potensi_4_14" value="0"> Tidak
                                                        </label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="numb_right">4.15</th>
                                                <td>Deskripsi mengenai ketentuan untuk menangani reaksi negatif yang terkait dengan penelitian (medis/fisik /emosional/ psikologis/sosial) serta temuan kebetulan selama penelitian (misalnya melalui tes darah dll)</td>
                                                <td>
                                                    <div class="form-check form-check-inline">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input child_4" data-child="child_4" type="radio" name="potensi_4_15" value="1"> Ya
                                                        </label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input child_4" data-child="child_4" type="radio" name="potensi_4_15" value="0"> Tidak
                                                        </label>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <h4 class="text-dark">Justifikasi Potensi Manfaat dan Resiko:</h4>
                            <hr>
                            <div class="col-12">
                                <textarea name="catatan_potensi" class="form-control"></textarea>
                            </div>
                        </div>
                    </div>
                    <div id="bujukan" class="tab-pane pt-4" role="tabpanel">
                        <div class="row">
                            <h4 class="text-primary">Bujukan/ Eksploitasi/ Inducement</h4>
                            <hr>

                            @if(isset($is_edit) || !(isset($self_assesment)))
                            <div class="col-12 d-flex justify-content-end">
                                <button type="button" class="btn btn-dark mt-4 clear_dot"><i class="fas fa-dot-circle me-2"></i> Kosongkan</button>
                            </div>
                            @endif
                            <div class="col-12 mt-2">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-responsive-sm">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>7-Standar Kelayakan Etik Penelitian</th>
                                                <th style="width: 7em">Pilihan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th>5</th>
                                                <td>
                                                    <strong>Bujukan/ Eksploitasi/ Inducement (undue)</strong>
                                                </td>
                                                <td>
                                                    <div class="form-check disabled">
                                                        <input class="form-check-input parent_5" type="radio" name="bujukan_5" value="1" disabled>
                                                        <label class="form-check-label">
                                                            Ya
                                                        </label>
                                                    </div>
                                                    <div class="form-check disabled">
                                                        <input class="form-check-input parent_5" type="radio" name="bujukan_5" value="0" disabled>
                                                        <label class="form-check-label">
                                                            Tidak
                                                        </label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="numb_right">5.1</th>
                                                <td>
                                                    Terdapat penjelasan tentang insentif bagi subjek, dapat berupa material seperti uang, hadiah, layanan gratis jika diperlukan, atau lainnya, berupa non material: uraian mengenai kompensasi atau penggantian yang akan diberikan (dalam hal waktu, perjalanan, hari-hari yang hilang dari pekerjaan, dll)
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input child_5" data-child="child_5" type="radio" name="bujukan_5_1" value="1"> Ya
                                                        </label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input child_5" data-child="child_5" type="radio" name="bujukan_5_1" value="0"> Tidak
                                                        </label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="numb_right">5.2</th>
                                                <td>Insentif pada penelitian yang berisiko luka fisik, atau lebih berat dari itu, diuraikan insentif yg lebih detail, pemberian pengobatan bebas biaya termasuk asuransi, bahkan kompensasi jika terjadi disabilitas, bahkan kematian.</td>
                                                <td>
                                                    <div class="form-check form-check-inline">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input child_5" data-child="child_5" type="radio" name="bujukan_5_2" value="1"> Ya
                                                        </label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input child_5" data-child="child_5" type="radio" name="bujukan_5_2" value="0"> Tidak
                                                        </label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="numb_right">5.3</th>
                                                <td>Terdapat uraian yang mengindikasikan adanya bujukan yang tidak semestinya, dan atau eksploitasi terhadap subyek.</td>
                                                <td>
                                                    <div class="form-check form-check-inline">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input child_5" data-child="child_5" type="radio" name="bujukan_5_3" value="1"> Ya
                                                        </label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input child_5" data-child="child_5" type="radio" name="bujukan_5_3" value="0"> Tidak
                                                        </label>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <h4 class="text-dark">Justifikasi Bujukan/ Eksploitasi/ Inducement:</h4>
                            <hr>
                            <div class="col-12">
                                <textarea name="catatan_bujukan" class="form-control"></textarea>
                            </div>
                        </div>
                    </div>
                    <div id="privacy" class="tab-pane pt-4" role="tabpanel">
                        <div class="row">
                            <h4 class="text-primary">Rahasia dan Privacy</h4>
                            <hr>

                            @if(isset($is_edit) || !(isset($self_assesment)))
                            <div class="col-12 d-flex justify-content-end">
                                <button type="button" class="btn btn-dark mt-4 clear_dot"><i class="fas fa-dot-circle me-2"></i> Kosongkan</button>
                            </div>
                            @endif
                            <div class="col-12 mt-2">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-responsive-sm">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>7-Standar Kelayakan Etik Penelitian</th>
                                                <th style="width: 7em">Pilihan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th>6</th>
                                                <td>
                                                    <strong>Rahasia dan Privacy</strong>
                                                </td>
                                                <td>
                                                    <div class="form-check disabled">
                                                        <input class="form-check-input parent_6" type="radio" name="privacy_6" value="1" disabled>
                                                        <label class="form-check-label">
                                                            Ya
                                                        </label>
                                                    </div>
                                                    <div class="form-check disabled">
                                                        <input class="form-check-input parent_6" type="radio" name="privacy_6" value="0" disabled>
                                                        <label class="form-check-label">
                                                            Tidak
                                                        </label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="numb_right">6.1</th>
                                                <td>Meminta persetujuan baru ketika ada indikasi munculnya kejadian yang tidak diinginkan selama penelitian (yg sebelumnya tidak ada)
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input child_6" data-child="child_6" type="radio" name="privacy_6_1" value="1"> Ya
                                                        </label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input child_6" data-child="child_6" type="radio" name="privacy_6_1" value="0"> Tidak
                                                        </label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="numb_right">6.2</th>
                                                <td>Peneliti mengharuskan subjek agar melakukan konsultasi lanjutan ketika peneliti menemukan indikasi penyakit serius; dengan tetap menjaga hubungan peneliti-subjek</td>
                                                <td>
                                                    <div class="form-check form-check-inline">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input child_6" data-child="child_6" type="radio" name="privacy_6_2" value="1"> Ya
                                                        </label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input child_6" data-child="child_6" type="radio" name="privacy_6_2" value="0"> Tidak
                                                        </label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="numb_right">6.3</th>
                                                <td>Peneliti harus netral terhadap temuan baru, tidak memberikan pendapat tentang temuannya itu dan menyerahkan kepada ahlinya</td>
                                                <td>
                                                    <div class="form-check form-check-inline">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input child_6" data-child="child_6" type="radio" name="privacy_6_3" value="1"> Ya
                                                        </label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input child_6" data-child="child_6" type="radio" name="privacy_6_3" value="0"> Tidak
                                                        </label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="numb_right">6.4</th>
                                                <td>Peneliti menjaga kerahasiaan temuan tersebut, jika terpaksa maka peneliti membukan rahasia setelah menjelaskan kepada subjek ttg keharusannya peneliti menjaga rahasia dan seberapa besar peneliti telah melakukan pelanggaran atas prinsip ini, dengan membuka rahasia tersebut</td>
                                                <td>
                                                    <div class="form-check disabled">
                                                        <input class="form-check-input parent_6_4 child_6" data-child="child_6" type="radio" name="privacy_6_4" value="1" disabled>
                                                        <label class="form-check-label">
                                                            Ya
                                                        </label>
                                                    </div>
                                                    <div class="form-check disabled">
                                                        <input class="form-check-input parent_6_4 child_6" data-child="child_6" type="radio" name="privacy_6_4" value="0" disabled>
                                                        <label class="form-check-label">
                                                            Tidak
                                                        </label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="numb_right"></th>
                                                <td>a. Terdapat penjelasan bagaimana peneliti menjaga privacy dan kerahasiaan subjek sejak rekruitmen hingga penelitian selesai, bahkan jika terjadi pembatalan subjek karena subjek tidak memenuhi syarat sbg sampel</td>
                                                <td>
                                                    <div class="form-check form-check-inline">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input child_6_4" data-child="child_6_4" type="radio" name="privacy_6_4a" value="1"> Ya
                                                        </label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input child_6_4" data-child="child_6_4" type="radio" name="privacy_6_4a" value="0"> Tidak
                                                        </label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="numb_right"></th>
                                                <td>b. Terdapat penjelasan bagaimana peneliti menjaga privacy subjek ketika harus menjelaskan prosedur penelitian dan keikutsertaan subjek, dimana subjek tidak bisa berada dalam kelompok subjek oleh sebab jadual yg tidak sesuai atau materi penjelasan yang spesifik</td>
                                                <td>
                                                    <div class="form-check form-check-inline">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input child_6_4" data-child="child_6_4" type="radio" name="privacy_6_4b" value="1"> Ya
                                                        </label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input child_6_4" data-child="child_6_4" type="radio" name="privacy_6_4b" value="0"> Tidak
                                                        </label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="numb_right"></th>
                                                <td>c. Terdapat penjelasan bagaimana peneliti akan tetap menjaga kerahasiaan dan privacy subjek meski subjek diwakili, karena alasan usia, alasan budaya (seperti misalnya sekelompok masyarakat cukup diwakili kepala kelompok masyarakat itu, atau anggota keluarga diwakili oleh kepala keluarga)</td>
                                                <td>
                                                    <div class="form-check form-check-inline">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input child_6_4" data-child="child_6_4" type="radio" name="privacy_6_4c" value="1"> Ya
                                                        </label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input child_6_4" data-child="child_6_4" type="radio" name="privacy_6_4c" value="0"> Tidak
                                                        </label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="numb_right"></th>
                                                <td>d. Terdapat penjelasan yang menunjukkan bahwa peneliti memahami terdapat beberapa data/informasi dimana kerahasiaan/privacy merupakan hal yang mutlak dan karenanya harus sangat dijaga; disertai penjelasan detail tentang begaimana menjaganya, misalnya hasil test genetik.</td>
                                                <td>
                                                    <div class="form-check form-check-inline">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input child_6_4" data-child="child_6_4" type="radio" name="privacy_6_4d" value="1"> Ya
                                                        </label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input child_6_4" data-child="child_6_4" type="radio" name="privacy_6_4d" value="0"> Tidak
                                                        </label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="numb_right"></th>
                                                <td>e. Terdapat uraian tentang bagaimana peneliti membuat kodeidentitas subjek, alasan pembuatan kode, di mana di simpan dan kapan, sertabagaimana dan oleh siapa kode identitas subjek bisa dibuka bila terjadi kedaruratan</td>
                                                <td>
                                                    <div class="form-check form-check-inline">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input child_6_4" data-child="child_6_4" type="radio" name="privacy_6_4e" value="1"> Ya
                                                        </label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input child_6_4" data-child="child_6_4" type="radio" name="privacy_6_4e" value="0"> Tidak
                                                        </label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="numb_right"></th>
                                                <td>f. Terdapat penjelasan tentang kemungkinan penggunaan data personal atau material biologis dari subjek untuk penelitian lain/penelitian lanjutan</td>
                                                <td>
                                                    <div class="form-check form-check-inline">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input child_6_4" data-child="child_6_4" type="radio" name="privacy_6_4f" value="1"> Ya
                                                        </label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input child_6_4" data-child="child_6_4" type="radio" name="privacy_6_4f" value="0"> Tidak
                                                        </label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="numb_right"></th>
                                                <td>g. Terdapat penjelasan jika hasil riset negatif dan memastikan bahwa hasilnya tersedia melalui publikasi atau dengan melaporkan ke otoritas/regulator</td>
                                                <td>
                                                    <div class="form-check form-check-inline">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input child_6_4" data-child="child_6_4" type="radio" name="privacy_6_4g" value="1"> Ya
                                                        </label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input child_6_4" data-child="child_6_4" type="radio" name="privacy_6_4g" value="0"> Tidak
                                                        </label>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <h4 class="text-dark">Justifikasi Rahasia dan Privacy:</h4>
                            <hr>
                            <div class="col-12">
                                <textarea name="catatan_privacy" class="form-control"></textarea>
                            </div>
                        </div>
                    </div>
                    <div id="informedconsent" class="tab-pane pt-4" role="tabpanel">
                        <div class="row">
                            <h4 class="text-primary">Informed Consent</h4>
                            <hr>

                            @if(isset($is_edit) || !(isset($self_assesment)))
                            <div class="col-12 d-flex justify-content-end">
                                <button type="button" class="btn btn-dark mt-4 clear_dot"><i class="fas fa-dot-circle me-2"></i> Kosongkan</button>
                            </div>
                            @endif
                            <div class="col-12 mt-2">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-responsive-sm">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>7-Standar Kelayakan Etik Penelitian</th>
                                                <th style="width: 7em">Pilihan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th>7</th>
                                                <td>
                                                    <strong>Informed Consent</strong>
                                                    <i>Penelitian ini dilengkapi dengan Persetujuan Setelah Penjelasan (PSP/Informed Consent-IC), merujuk pada 35 butir IC secara lengkap,termasuk uraian seperti berikut ini</i>
                                                </td>
                                                <td>
                                                    <div class="form-check form-check-inline">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input" type="radio" name="informed_consent" value="1"> Ya
                                                        </label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input" type="radio" name="informed_consent" value="0"> Tidak
                                                        </label>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <h4 class="text-dark">Justifikasi Informed Consent:</h4>
                            <hr>
                            <div class="col-12">
                                <textarea name="catatan_informedconsent" class="form-control"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @if(isset($is_edit) || !(isset($self_assesment)))
                <button type="submit" class="btn btn-primary mt-4">Simpan</button>
            @endif
            <a href="{{ route('layaketik.protocol') }}" class="btn btn-dark mt-4">Kembali</a>
        </div>
    </div>
</div>