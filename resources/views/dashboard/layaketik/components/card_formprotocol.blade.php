<div class="col-12">
    <div class="card">
        <div class="card-body">
            <div class="custom-tab-1">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a href="#a" data-bs-toggle="tab" class="nav-table nav-link active show">A</a>
                    </li>
                    <li class="nav-item">
                        <a href="#b" data-bs-toggle="tab" class="nav-table nav-link">B</a>
                    </li>
                    <li class="nav-item">
                        <a href="#c" data-bs-toggle="tab" class="nav-table nav-link">C</a>
                    </li>
                    <li class="nav-item">
                        <a href="#d" data-bs-toggle="tab" class="nav-table nav-link">D</a>
                    </li>
                    <li class="nav-item">
                        <a href="#e" data-bs-toggle="tab" class="nav-table nav-link">E</a>
                    </li>
                    <li class="nav-item">
                        <a href="#f" data-bs-toggle="tab" class="nav-table nav-link">F</a>
                    </li>
                    <li class="nav-item">
                        <a href="#g" data-bs-toggle="tab" class="nav-table nav-link">G</a>
                    </li>
                    <li class="nav-item">
                        <a href="#h" data-bs-toggle="tab" class="nav-table nav-link">H</a>
                    </li>
                    <li class="nav-item">
                        <a href="#i" data-bs-toggle="tab" class="nav-table nav-link">I</a>
                    </li>
                    <li class="nav-item">
                        <a href="#j" data-bs-toggle="tab" class="nav-table nav-link">J</a>
                    </li>
                    <li class="nav-item">
                        <a href="#k" data-bs-toggle="tab" class="nav-table nav-link">K</a>
                    </li>
                    <li class="nav-item">
                        <a href="#l" data-bs-toggle="tab" class="nav-table nav-link">L</a>
                    </li>
                    <li class="nav-item">
                        <a href="#m" data-bs-toggle="tab" class="nav-table nav-link">M</a>
                    </li>
                    <li class="nav-item">
                        <a href="#n" data-bs-toggle="tab" class="nav-table nav-link">N</a>
                    </li>
                    <li class="nav-item">
                        <a href="#o" data-bs-toggle="tab" class="nav-table nav-link">O</a>
                    </li>
                    <li class="nav-item">
                        <a href="#p" data-bs-toggle="tab" class="nav-table nav-link">P</a>
                    </li>
                    <li class="nav-item">
                        <a href="#q" data-bs-toggle="tab" class="nav-table nav-link">Q</a>
                    </li>
                    <li class="nav-item">
                        <a href="#r" data-bs-toggle="tab" class="nav-table nav-link">R</a>
                    </li>
                    <li class="nav-item">
                        <a href="#s" data-bs-toggle="tab" class="nav-table nav-link">S</a>
                    </li>
                    <li class="nav-item">
                        <a href="#t" data-bs-toggle="tab" class="nav-table nav-link">T</a>
                    </li>
                    <li class="nav-item">
                        <a href="#u" data-bs-toggle="tab" class="nav-table nav-link">U</a>
                    </li>
                    <li class="nav-item">
                        <a href="#v" data-bs-toggle="tab" class="nav-table nav-link">V</a>
                    </li>
                    <li class="nav-item">
                        <a href="#w" data-bs-toggle="tab" class="nav-table nav-link">W</a>
                    </li>
                    <li class="nav-item">
                        <a href="#x" data-bs-toggle="tab" class="nav-table nav-link">X</a>
                    </li>
                    <li class="nav-item">
                        <a href="#y" data-bs-toggle="tab" class="nav-table nav-link">Y</a>
                    </li>
                    <li class="nav-item">
                        <a href="#z" data-bs-toggle="tab" class="nav-table nav-link">Z</a>
                    </li>
                    <li class="nav-item">
                        <a href="#aa" data-bs-toggle="tab" class="nav-table nav-link">AA</a>
                    </li>
                    <li class="nav-item">
                        <a href="#bb" data-bs-toggle="tab" class="nav-table nav-link">BB</a>
                    </li>
                    <li class="nav-item">
                        <a href="#cc" data-bs-toggle="tab" class="nav-table nav-link">CC</a>
                    </li>

                </ul>
                <div class="tab-content pt-4">
                    <div id="a" class="tab-pane fade active show">
                        <div class="row">
                            <div class="col-12">
                                <h4 class="text-primary">A. Judul Penelitian (p-protokol no 1)</h4>
                                <hr>

                                <p class="font-w600 judul_penelitian">
                                    {{ isset($protocol)? $protocol->research_ethic->research->judul: "-" }}
                                </p>

                                <h5>1. Lokasi Penelitian</h5>
                                <p class="font-w600 lokasi_penelitian">
                                    {{ isset($protocol)? $protocol->research_ethic->research->tempat: "-" }}
                                </p>

                                <h5>2. Apakah penelitian ini multi-senter?</h5>
                                <p class="font-w600 is_multisenter">
                                    {{ 
                                        isset($protocol)? 
                                            ($protocol->research_ethic->is_multisenter? "Ya" : "Tidak")
                                            : "-" 
                                    }}
                                </p>

                                <h5>3. Jika multi-senter apakah sudah mendapatkan persetujuan etik dari senter/institusi yang lain?</h5>
                                <p class="font-w600 acc_multisenter">
                                    {{ 
                                        isset($protocol)? 
                                            ($protocol->research_ethic->acc_multisenter? "Ya" : "Tidak")
                                            : "-" 
                                    }}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div id="b" class="tab-pane fade">
                        <div class="row">
                            <div class="col-12">
                                <h4 class="text-primary">B. Identifikasi (p10)</h4>
                                <hr>

                                <h5 class="text-dark">1. Peneliti Utama (CV dilampirkan di Tab CC)</h5>
                                <h5 class="text-dark">2. Anggota Peneliti (CV dilampirkan di Tab CC)</h5>
                                <h5 class="text-dark">3. Lembaga Sponsor (Nama Lembaga dan Alamat dilampirkan di Tab CC)</h5>
                            </div>
                        </div>
                    </div>
                    <div id="c" class="tab-pane fade">
                        <div class="row">
                            <div class="col-12">
                                <h4 class="text-primary">C. Ringkasan Protokol Penelitian</h4>
                                <hr>

                                <h5 class="mb-2">1. Ringkasan dalam 200 kata, (ditulis dalam bahasa yang mudah dipahami oleh "awam" bukan dokter/profesional kesehatan)</h5>
                                <textarea class="ringkasan_protocol_a" name="ringkasan_protocol_a">
                                    {{ isset($protocol)? $protocol->ringkasan_protokol->ringkasan_protocol_a: "" }}
                                </textarea>
                                <hr>

                                <h5 class="mb-2">2. Tuliskan mengapa penelitian ini harus dilakukan, manfaatnya untuk penduduk di wilayah penelitian ini dilakukan (Negara, wilayah, lokal) - <i class="small">Justifikasi Penelitian (p3) Standar 2/A (Adil)</i></h5>
                                <textarea class="ringkasan_protocol_b" name="ringkasan_protocol_b">
                                    {{ isset($protocol)? $protocol->ringkasan_protokol->ringkasan_protocol_b: "" }}
                                </textarea>
                            </div>
                        </div>
                    </div>
                    <div id="d" class="tab-pane fade">
                        <div class="row">
                            <div class="col-12">
                                <h4 class="text-primary">D. Isu Etik yang mungkin dihadapi</h4>
                                <hr>

                                <h5 class="mb-2">1. Pendapat peneliti tentang isyu etik yang mungkin dihadapi dalam penelitian ini, dan bagaimana cara menanganinya <i>(p4)</i> .</h5>
                                <textarea class="isu_etik" name="isu_etik">
                                    {{ isset($protocol)? $protocol->isu_etik: "" }}
                                </textarea>
                            </div>
                        </div>
                    </div>
                    <div id="e" class="tab-pane fade">
                        <div class="row">
                            <div class="col-12">
                                <h4 class="text-primary">E. Ringkasan Kajian Pustaka</h4>
                                <hr>

                                <h5 class="mb-2">1. Ringkasan hasil-hasil studi sebelumnya yang sesuai topik penelitian, baik yang sudah maupun yang sudah dipublikasikan, termasuk jika ada kajian-kajian pada hewan. Maksimum 1 hal <i>(p5)- G 4, S</i> ?</h5>
                                <textarea class="ringkasan_kajianpustaka" name="ringkasan_kajianpustaka">
                                    {{ isset($protocol)? $protocol->ringkasan_kajianpustaka: "" }}
                                </textarea>
                            </div>
                        </div>
                    </div>
                    <div id="f" class="tab-pane fade">
                        <div class="row">
                            <div class="col-12">
                                <h4 class="text-primary">F. Kondisi Lapangan</h4>
                                <hr>

                                <h5 class="mb-2">1. Gambaran singkat tentang lokasi penelitian <i>(p8)</i></h5>
                                <textarea class="kondisi_lapangan_a" name="kondisi_lapangan_a">
                                    {{ isset($protocol)? $protocol->kondisi_lapangan->kondisi_lapangan_a: "" }}
                                </textarea>
                                <hr>

                                <h5 class="mb-2">2. Informasi ketersediaan fasilitas yang tersedia di lapangan yang menunjang penelitian</h5>
                                <textarea class="kondisi_lapangan_b" name="kondisi_lapangan_b">
                                    {{ isset($protocol)? $protocol->kondisi_lapangan->kondisi_lapangan_b: "" }}
                                </textarea>
                                <hr>

                                <h5 class="mb-2">3. Informasi demografis / epidemiologis yang relevan tentang daerah penelitian</h5>
                                <textarea class="kondisi_lapangan_c" name="kondisi_lapangan_c">
                                    {{ isset($protocol)? $protocol->kondisi_lapangan->kondisi_lapangan_c: "" }}
                                </textarea>
                            </div>
                        </div>
                    </div>
                    <div id="g" class="tab-pane fade">
                        <div class="row">
                            <div class="col-12">
                                <h4 class="text-primary">G. Disain Penelitian</h4>
                                <hr>

                                <h5 class="mb-2">1. Tujuan penelitian, hipotesa, pertanyaan penelitian, asumsi dan variabel penelitian <i>(p11)</i></h5>
                                <textarea class="disain_penelitian_a" name="disain_penelitian_a">
                                    {{ isset($protocol)? $protocol->disain_penelitian->disain_penelitian_a: "" }}
                                </textarea>
                                <hr>

                                <h5 class="mb-2">2. Deskipsi detil tentang desain penelitian. <i>(p12)</i></h5>
                                <textarea class="disain_penelitian_b" name="disain_penelitian_b">
                                    {{ isset($protocol)? $protocol->disain_penelitian->disain_penelitian_b: "" }}
                                </textarea>
                                <hr>

                                <h5 class="mb-2">3. Bila ujicoba klinis, deskripsikan tentang apakah kelompok treatmen ditentukan secara random, (termasuk bagaimana metodenya), dan apakah blinded atau terbuka. <i>(Bila bukan ujicoba klinis cukup tulis: tidak relevan) (p12)</i></h5>
                                <textarea class="disain_penelitian_c" name="disain_penelitian_c">
                                    {{ isset($protocol)? $protocol->disain_penelitian->disain_penelitian_c: "" }}
                                </textarea>
                            </div>
                        </div>
                    </div>
                    <div id="h" class="tab-pane fade">
                        <div class="row">
                            <div class="col-12">
                                <h4 class="text-primary">H. Sampling</h4>
                                <hr>

                                <h5 class="mb-2">1. Jumlah subyek yang dibutuhkan dan bagaimana penentuannya secara statistik <i>(p13)</i></h5>
                                <textarea class="sampling_a" name="sampling_a">
                                    {{ isset($protocol)? $protocol->sampling->sampling_a: "" }}
                                </textarea>
                                <hr>

                                <h5 class="mb-2">2. Kriteria partisipan atau subyek dan justifikasi exclude/include-nya. <i>(Guideline 3) (p12)</i> </h5>
                                <textarea class="sampling_b" name="sampling_b">
                                    {{ isset($protocol)? $protocol->sampling->sampling_b: "" }}
                                </textarea>
                                <hr>

                                <h5 class="mb-2">3. <strong>Sampling kelompok rentan</strong>: alasan melibatkan anak anak atau orang dewasa yang tidak mampu memberikan persetujuan setelah penjelasan, atau kelompok rentan, serta langkah langkah bagaimana meminimalisir bila terjadi resiko <i>(tulis <strong>"tidak relevan"</strong> bila penelitian tidak mengikutsertakan kelompok rentan)(Guidelines 15, 16 and 17) (p15)</i></h5>
                                <textarea class="sampling_c" name="sampling_c">
                                    {{ isset($protocol)? $protocol->sampling->sampling_c: "" }}
                                </textarea>
                            </div>
                        </div>
                    </div>
                    <div id="i" class="tab-pane fade">
                        <div class="row">
                            <div class="col-12">
                                <h4 class="text-primary">I. Intervensi</h4>
                                <hr>

                                <h5 class="mb-2">1. Deskripsi dan penjelasan semua intervensi (metode administrasi treatmen, termasuk rute administrasi, dosis, interval dosis, dan masa treatmen produk yang digunakan <i>(tulis <strong>"Tidak relevan"</strong> bila bukan penelitian intervensi) (investigasi dan komparator (p17)</i></h5>
                                <textarea class="intervensi_a" name="intervensi_a">
                                    {{ isset($protocol)? $protocol->intervensi->intervensi_a: "" }}
                                </textarea>
                                <hr>

                                <h5 class="mb-2">2. Rencana dan jastifikasi untuk meneruskan atau menghentikan standar terapi/terapi baku selama penelitian <i>(p 4 and 5) (p18)</i></h5>
                                <textarea class="intervensi_b" name="intervensi_b">
                                    {{ isset($protocol)? $protocol->intervensi->intervensi_b: "" }}
                                </textarea>
                                <hr>

                                <h5 class="mb-2">3. Treatmen/Pengobatan lain yang mungkin diberikan atau diperbolehkan, atau menjadi kontraindikasi, selama penelitian <i>(p 6) (p19)</i></h5>
                                <textarea class="intervensi_c" name="intervensi_c">
                                    {{ isset($protocol)? $protocol->intervensi->intervensi_c: "" }}
                                </textarea>
                                <hr>

                                <h5 class="mb-2">4. Test klinis atau lab atau test lain yang harus dilakukan <i>(p20)</i></h5>
                                <textarea class="intervensi_d" name="intervensi_d">
                                    {{ isset($protocol)? $protocol->intervensi->intervensi_d: "" }}
                                </textarea>
                            </div>
                        </div>
                    </div>
                    <div id="j" class="tab-pane fade">
                        <div class="row">
                            <div class="col-12">
                                <h4 class="text-primary">J. Monitoring Penelitian</h4>
                                <hr>

                                <h5 class="mb-2">1. Sampel dari form laporan kasus yang sudah distandarisir, metode pencataran respon teraputik (deskripsi dan evaluasi metode dan frekuensi pengukuran), prosedur follow-up, dan, bila mungkin, ukuran yang diusulkan untuk menentukan tingkat kepatuhan subyek yang menerima treatmen <i>(lihat lampiran) (p17)</i></h5>
                                <textarea class="monitoring_penelitian" name="monitoring_penelitian">
                                    {{ isset($protocol)? $protocol->monitoring_penelitian: "" }}
                                </textarea>
                            </div>
                        </div>
                    </div>
                    <div id="k" class="tab-pane fade">
                        <div class="row">
                            <div class="col-12">
                                <h4 class="text-primary">K. Penghentian Penelitian dan Alasannya</h4>
                                <hr>

                                <h5 class="mb-2">1. Aturan atau kriteria kapan subyek bisa diberhentikan dari penelitian atau uji klinis, atau, dalam hal studi multi senter, kapan sebuah pusat/lembaga di non aktipkan, dan kapan penelitian bisa dihentikan <i>(tidak lagi dilanjutkan) (p22)</i></h5>
                                <textarea class="penghentian_penelitian" name="penghentian_penelitian">
                                    {{ isset($protocol)? $protocol->penghentian_penelitian: "" }}
                                </textarea>
                            </div>
                        </div>
                    </div>
                    <div id="l" class="tab-pane fade">
                        <div class="row">
                            <div class="col-12">
                                <h4 class="text-primary">L. Adverse Event dan Komplikasi (Kejadian Yang Tidak Diharapkan)</h4>
                                <hr>

                                <h5 class="mb-2">1. Metode pencatatan dan pelaporan adverse events atau reaksi, dan syarat penanganan komplikasi <i>(Guideline 4 dan 23) (p23)</i></h5>
                                <textarea class="adverse_penelitian_a" name="adverse_penelitian_a">
                                    {{ isset($protocol)? $protocol->adverse_penelitian->adverse_penelitian_a: "" }}
                                </textarea>
                                <hr>

                                <h5 class="mb-2">2. Resiko-resiko yang diketahui dari adverse events, termasuk resiko yang terkait dengan masing masing rencana intervensi, dan terkait dengan obat, vaksin, atau terhadap prosudur yang akan diuji cobakan <i>(Guideline 4) (p24)</i></h5>
                                <textarea class="adverse_penelitian_b" name="adverse_penelitian_b">
                                    {{ isset($protocol)? $protocol->adverse_penelitian->adverse_penelitian_b: "" }}
                                </textarea>
                            </div>
                        </div>
                    </div>
                    <div id="m" class="tab-pane fade">
                        <div class="row">
                            <div class="col-12">
                                <h4 class="text-primary">M. Penanganan Komplikasi <span class="small">(p27)</span></h4>
                                <hr>

                                <h5 class="mb-2">
                                    1. Rencana detil bila ada resiko lebih dari minimal/ luka fisik, membuat rencana detil <br>
                                    2. Adanya asuransi <br>
                                    3. Adanya fasilitas pengobatan / biaya pengobatan <br>
                                    4. Kompensasi jika terjadi disabilitas atau kematian <i>(Guideline 14)</i>
                                </h5>
                                <textarea class="penanganan_komplikasi" name="penanganan_komplikasi">
                                    {{ isset($protocol)? $protocol->penanganan_komplikasi: "" }}
                                </textarea>
                            </div>
                        </div>
                    </div>
                    <div id="n" class="tab-pane fade">
                        <div class="row">
                            <div class="col-12">
                                <h4 class="text-primary">N. Manfaat</h4>
                                <hr>

                                <h5 class="mb-2">1. Manfaat penelitian secara pribadi bagi subyek dan bagi yang lainnya <i>(Guideline 4) (p25)</i></h5>
                                <textarea class="manfaat_a" name="manfaat_a">
                                    {{ isset($protocol)? $protocol->manfaat->manfaat_a: "" }}
                                </textarea>
                                <hr>

                                <h5 class="mb-2">2. Manfaat penelitian bagi penduduk, termasuk pengetahuan baru yang kemungkinan dihasilkan oleh penelitian <i>(Guidelines 1 and 4) (p26)</i></h5>
                                <textarea class="manfaat_b" name="manfaat_b">
                                    {{ isset($protocol)? $protocol->manfaat->manfaat_b: "" }}
                                </textarea>
                            </div>
                        </div>
                    </div>
                    <div id="o" class="tab-pane fade">
                        <div class="row">
                            <div class="col-12">
                                <h4 class="text-primary">O. Jaminan Keberlanjutan Manfaat <i class="small">(p28)</i></h4>
                                <hr>

                                <h5 class="mb-2">
                                    1. Kemungkinan keberlanjutan akses bila hasil intervensi menghasilkan manfaat yang signifikan, <br>
                                    2. Modalitas yang tersedia, <br>
                                    3. Pihak pihak yang akan mendapatkan keberlansungan pengobatan, organisasi yang akan membayar, <br>
                                    4. Berapa lama <i>(Guideline 6)</i>
                                </h5>
                                <textarea class="keberlanjutan_manfaat" name="keberlanjutan_manfaat">
                                    {{ isset($protocol)? $protocol->keberlanjutan_manfaat: "" }}
                                </textarea>
                            </div>
                        </div>
                    </div>
                    <div id="p" class="tab-pane fade">
                        <div class="row">
                            <div class="col-12">
                                <h4 class="text-primary">P. Informed Consent <i class="small">(Upload IC 35 butir di Tab CC)</i></h4>
                                <hr>

                                <h5 class="mb-2">1. Cara untuk mendapatkan informed consent dan prosudur yang direncanakan untuk mengkomunikasikan informasi penelitian(Persetujuan Setelah Penjelasan/PSP) kepada calon subyek, termasuk nama dan posisi wali bagi yang tidak bisa memberikannya. <i>(Guideline 9) (p30)</i></h5>
                                <textarea class="informed_consent_a" name="informed_consent_a">
                                    {{ isset($protocol)? $protocol->informed_consent->informed_consent_a: "" }}
                                </textarea>
                                <hr>

                                <h5 class="mb-2">2. Khusus Ibu Hamil: adanya perencanaan untuk memonitor kesehatan ibu dan kesehatan anak jangka pendek maupun jangka panjang <i>(Guideline 19) (p29)</i></h5>
                                <textarea class="informed_consent_b" name="informed_consent_b">
                                    {{ isset($protocol)? $protocol->informed_consent->informed_consent_b: "" }}
                                </textarea>
                            </div>
                        </div>
                    </div>
                    <div id="q" class="tab-pane fade">
                        <div class="row">
                            <div class="col-12">
                                <h4 class="text-primary">Q. Wali <i class="small">(p31)</i></h4>
                                <hr>

                                <h5 class="mb-2">1. Adanya wali yang berhak bila calon subyek tidak bisa memberikan informed consent <i>(Guidelines 16 and 17)</i></h5>
                                <textarea class="wali_a" name="wali_a">
                                    {{ isset($protocol)? $protocol->wali->wali_a: "" }}
                                </textarea>
                                <hr>

                                <h5 class="mb-2">2. Adanya orang tua atau wali yang berhak bila anak paham tentang informed consent tapi belum cukup umur <i>(Guidelines 16 and 17)</i></h5>
                                <textarea class="wali_b" name="wali_b">
                                    {{ isset($protocol)? $protocol->wali->wali_b: "" }}
                                </textarea>
                            </div>
                        </div>
                    </div>
                    <div id="r" class="tab-pane fade">
                        <div class="row">
                            <div class="col-12">
                                <h4 class="text-primary">R. Bujukan</h4>
                                <hr>

                                <h5 class="mb-2">1. Deskripsi bujukan atau insentif (bahan kontak) bagi calon subyek untuk ikut berpartisipasi, seperti uang, hadiah, layanan gratis, atau yang lainnya <i>(p32)</i></h5>
                                <textarea class="bujukan_a" name="bujukan_a">
                                    {{ isset($protocol)? $protocol->bujukan->bujukan_a: "" }}
                                </textarea>
                                <hr>

                                <h5 class="mb-2">2. Rencana dan prosedur, dan orang yang betanggung jawab untuk menginformasikan bahaya atau keuntungan peserta, atau tentang riset lain tentang topik yang sama, yang bisa mempengaruhi keberlansungan keterlibatan subyek dalam penelitian <i>(Guideline 9) (p33)</i></h5>
                                <textarea class="bujukan_b" name="bujukan_b">
                                    {{ isset($protocol)? $protocol->bujukan->bujukan_b: "" }}
                                </textarea>
                                <hr>

                                <h5 class="mb-2">3. Perencanaan untuk menginformasikan hasil penelitian pada subyek atau partisipan <i>(p34)</i></h5>
                                <textarea class="bujukan_c" name="bujukan_c">
                                    {{ isset($protocol)? $protocol->bujukan->bujukan_c: "" }}
                                </textarea>
                            </div>
                        </div>
                    </div>
                    <div id="s" class="tab-pane fade">
                        <div class="row">
                            <div class="col-12">
                                <h4 class="text-primary">S. Penjagaan Kerahasiaan</h4>
                                <hr>

                                <h5 class="mb-2">1. Proses rekrutmen subyek (misalnya lewat iklan), serta langkah langkah untuk menjaga privasi dan kerahasiaan selama rekrutmen <i>(Guideline 3) (p16)</i></h5>
                                <textarea class="penjagaan_kerahasiaan_a" name="penjagaan_kerahasiaan_a">
                                    {{ isset($protocol)? $protocol->penjagaan_kerahasiaan->penjagaan_kerahasiaan_a: "" }}
                                </textarea>
                                <hr>

                                <h5 class="mb-2">2. Langkah langkah proteksi kerahasiaan data pribadi, dan penghormatan privasi orang, termasuk kehati-hatian untuk mencegah bocornya rahasia hasil test genetik pada keluarga kecuali atas izin dari yang bersangkutan <i>(Guidelines 4, 11, 12 and 24) (p 35)</i></h5>
                                <textarea class="penjagaan_kerahasiaan_b" name="penjagaan_kerahasiaan_b">
                                    {{ isset($protocol)? $protocol->penjagaan_kerahasiaan->penjagaan_kerahasiaan_b: "" }}
                                </textarea>
                                <hr>

                                <h5 class="mb-2">3. Informasi tentang bagaimana koding; bila ada, untuk identitas subyek, di mana di simpan dan kapan, bagaimana dan oleh siapa bisa dibuka bila terjadi emergensi <i>(Guidelines 11 and 12) (p36)</i></h5>
                                <textarea class="penjagaan_kerahasiaan_c" name="penjagaan_kerahasiaan_c">
                                    {{ isset($protocol)? $protocol->penjagaan_kerahasiaan->penjagaan_kerahasiaan_c: "" }}
                                </textarea>
                                <hr>

                                <h5 class="mb-2">4. Kemungkinan penggunaan lebih jauh dari data personal atau material biologis/BBT <i>(p37)</i></h5>
                                <textarea class="penjagaan_kerahasiaan_d" name="penjagaan_kerahasiaan_d">
                                    {{ isset($protocol)? $protocol->penjagaan_kerahasiaan->penjagaan_kerahasiaan_d: "" }}
                                </textarea>
                            </div>
                        </div>
                    </div>
                    <div id="t" class="tab-pane fade">
                        <div class="row">
                            <div class="col-12">
                                <h4 class="text-primary">T. Rencana Analisis</h4>
                                <hr>

                                <h5 class="mb-2">1. Deskripsi tentang rencana analisa statistik, dan kreteria bila atau dalam kondisi bagaimana akan terjadi penghentian dini keseluruhan penelitian <i>(Guideline 4) (B,S2)</i></h5>
                                <textarea class="rencana_analisis" name="rencana_analisis">
                                    {{ isset($protocol)? $protocol->rencana_analisis: "" }}
                                </textarea>
                            </div>
                        </div>
                    </div>
                    <div id="u" class="tab-pane fade">
                        <div class="row">
                            <div class="col-12">
                                <h4 class="text-primary">U. Monitor Keamanan</h4>
                                <hr>

                                <h5 class="mb-2">1. Rencana untuk memonitor keberlansungan keamanan obat atau intervensi lain yang dilakukan dalam penelitian atau trial, dan, bila diperlukan, pembentukan komite independen untuk data dan safety monitoring <i>(Guideline 4) (B,S3,S7)</i></h5>
                                <textarea class="monitor_keamanan" name="monitor_keamanan">
                                    {{ isset($protocol)? $protocol->monitor_keamanan: "" }}
                                </textarea>
                            </div>
                        </div>
                    </div>
                    <div id="v" class="tab-pane fade">
                        <div class="row">
                            <div class="col-12">
                                <h4 class="text-primary">V. Konflik Kepentingan</h4>
                                <hr>

                                <h5 class="mb-2">1. Pengaturan untuk mengatasi konflik finansial atau yang lainnya yang bisa mempengaruhi keputusan para peneliti atau personil lainya; menginformasikan pada komite lembaga tentang adanya conflict of interest; komite mengkomunikasikannya ke komite etik dan kemudian mengkomunikasikan pada para peneliti tentang langkah langkah berikutnya yang harus dilakukan <i>(Guideline 25) (p42)</i></h5>
                                <textarea class="konflik_kepentingan" name="konflik_kepentingan">
                                    {{ isset($protocol)? $protocol->konflik_kepentingan: "" }}
                                </textarea>
                            </div>
                        </div>
                    </div>
                    <div id="w" class="tab-pane fade">
                        <div class="row">
                            <div class="col-12">
                                <h4 class="text-primary">W. Manfaat Sosial</h4>
                                <hr>

                                <h5 class="mb-2">1. Untuk penelitian yang dilakukan pada seting sumberdaya lemah, kontribusi yang dilakukan sponsor untuk capacity building untuk review ilmiah dan etika dan untuk riset-riset kesehatan di negara tersebut; dan jaminan bahwa tujuan capacity building adalah agar sesuai nilai dan harapan para partisipan dan komunitas tempat penelitian <i>(Guideline 8) (p43)</i></h5>
                                <textarea class="manfaat_sosial_a" name="manfaat_sosial_a">
                                    {{ isset($protocol)? $protocol->manfaat_sosial->manfaat_sosial_a: "" }}
                                </textarea>
                                <hr>
                                
                                <h5 class="mb-2">2. Protokol penelitian (dokumen) yang dikirim ke komite etik harus meliputi deskripsi rencana pelibatan komunitas, dan menunjukkan sumber-sumber yang dialokasikan untuk aktivitas aktivitas pelibatan tersebut. Dokumen ini menjelaskan apa yang sudah dan yang akan dilakukan, kapan dan oleh siapa, untuk memastikan bahwa masyarakat dengan jelas terpetakan untuk memudahkan pelibatan mereka selama riset, untuk memastikan bahwa tujuan riset sesuai kebutuhan masyarakat dan diterima oleh mereka. Bila perlu masyarakat harus dilibatkan dalam penyusunan protokol atau dokumen ini <i>(Guideline 7) (p44)</i></h5>
                                <textarea class="manfaat_sosial_b" name="manfaat_sosial_b">
                                    {{ isset($protocol)? $protocol->manfaat_sosial->manfaat_sosial_b: "" }}
                                </textarea>
                            </div>
                        </div>
                    </div>
                    <div id="x" class="tab-pane fade">
                        <div class="row">
                            <div class="col-12">
                                <h4 class="text-primary">X. Hak atas Data</h4>
                                <hr>

                                <h5 class="mb-2">1. Terutama bila sponsor adalah industri, kontrak yang menyatakan siapa pemilik hak publiksi hasil riset, dan kewajiban untuk menyiapkan bersama dan diberikan pada para PI draft laporan hasil riset <i>(Guideline 24) (B dan H, S1,S7)</i></h5>
                                <textarea class="hakatas_data" name="hakatas_data">
                                    {{ isset($protocol)? $protocol->hakatas_data: "" }}
                                </textarea>
                            </div>
                        </div>
                    </div>
                    <div id="y" class="tab-pane fade">
                        <div class="row">
                            <div class="col-12">
                                <h4 class="text-primary">Y. Publikasi</h4>
                                <hr>

                                <h5 class="mb-2">Rencana publikasi hasil pada bidang tertentu (seperti epidemiology, generik, sosiologi) yang bisa beresiko berlawanan dengan kemaslahatan komunitas, masyarakat, keluarga, etnik tertentu, dan meminimalisir resiko kemudharatan kelompok ini dengan selalu mempertahankan kerahasiaan data selama dan setelah penelitian, dan mempublikasi hasil hasil penelitian sedemikian rupa dengan selalu mempertimbangkan martabat dan kemulyaan mereka <i>(Guideline 4) (p47)</i></h5>
                                <textarea class="publikasi_a" name="publikasi_a">
                                    {{ isset($protocol)? $protocol->publikasi->publikasi_a: "" }}
                                </textarea>
                                <hr>

                                <h5 class="mb-2">Bagaimana publikasi bila hasil riset negatip. <i>(Guideline 24) (p46)</i></h5>
                                <textarea class="publikasi_b" name="publikasi_b">
                                    {{ isset($protocol)? $protocol->publikasi->publikasi_b: "" }}
                                </textarea>
                            </div>
                        </div>
                    </div>
                    <div id="z" class="tab-pane fade">
                        <div class="row">
                            <div class="col-12">
                                <h4 class="text-primary">Z. Pendanaan</h4>
                                <hr>

                                <h5 class="mb-2">Sumber dan jumlah dana riset; lembaga funding/sponsor, dan deskripsi komitmen finansial sponsor pada kelembagaan penelitian, pada para peneliti, para subyek riset, dan, bila ada, pada komunitas <i>(Guideline 25) (B, S2); (p41)</i></h5>
                                <textarea class="pendanaan" name="pendanaan">
                                    {{ isset($protocol)? $protocol->pendanaan: "" }}
                                </textarea>
                            </div>
                        </div>
                    </div>
                    <div id="aa" class="tab-pane fade">
                        <div class="row">
                            <div class="col-12">
                                <h4 class="text-primary">AA. Komitmen Etik</h4>
                                <hr>

                                <h5 class="mb-2">1. Pernyataan peneliti utama bahwa prinsip-prinsip yang tertuang dalam pedoman ini akan dipatuhi <i>(lampirkan scan Surat Pernyataan) (p6)</i></h5>
                                <textarea class="komitmen_etik_a" name="komitmen_etik_a">
                                    {{ isset($protocol)? $protocol->komitmen_etik->komitmen_etik_a: "" }}
                                </textarea>
                                <hr>

                                <h5 class="mb-2">2. (Track Record) Riwayat usulan review protokol etik sebelumnya dan hasilnya <i>(isi dengan judul da tanggal penelitian, dan hasil review Komite Etik) (lampirkan Daftar Riwayat Usulan Kaji Etiknya) (p7)</i></h5>
                                <textarea class="komitmen_etik_b" name="komitmen_etik_b">
                                    {{ isset($protocol)? $protocol->komitmen_etik->komitmen_etik_b: "" }}
                                </textarea>
                                <hr>

                                <h5 class="mb-2">3. Pernyataan bahwa bila terdapat bukti adanya pemalsuan data akan ditangani sesuai peraturan /ketentuan yang berlaku <i>(p48)</i></h5>
                                <textarea class="komitmen_etik_c" name="komitmen_etik_c">
                                    {{ isset($protocol)? $protocol->komitmen_etik->komitmen_etik_c: "" }}
                                </textarea>
                            </div>
                        </div>
                    </div>
                    <div id="bb" class="tab-pane fade">
                        <div class="row">
                            <div class="col-12">
                                <h4 class="text-primary">BB. Daftar Pustaka</h4>
                                <hr>

                                <h5 class="mb-2">Daftar referensi yang dirujuk dalam protokol <i>(p40)</i></h5>
                                <textarea class="daftar_pustaka" name="daftar_pustaka">
                                    {{ isset($protocol)? $protocol->daftar_pustaka: "" }}
                                </textarea>
                            </div>
                        </div>
                    </div>
                    <div id="cc" class="tab-pane fade">
                        <div class="row">
                            <div class="col-12">
                                <h4 class="text-primary">CC. Lampiran</h4>
                                <hr>

                                <h5 class="mb-2">1. CV Peneliti Utama</h5>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="form-file">
                                            <input type="file" class="form-file-input form-daftar form-control" id="cv_ketua" name="cv_ketua">
                                        </div>
                                        <button class="btn btn-dark" type="button" data-fancybox disabled>Preview</button>
                                    </div>
                                    <span class="small text-light">*File berbentuk .pdf</span>
                                </div>
                                <hr>

                                <h5 class="mb-2">2. CV Anggota Peneliti</h5>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="form-file">
                                            <input type="file" class="form-file-input form-daftar form-control" id="cv_anggota" name="cv_anggota">
                                        </div>
                                        <button class="btn btn-dark" type="button" data-fancybox disabled>Preview</button>
                                    </div>
                                    <span class="small text-light">*File berbentuk .pdf</span>
                                </div>
                                <hr>

                                <h5 class="mb-2">3. Daftar Lembaga Sponsor</h5>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="form-file">
                                            <input type="file" class="form-file-input form-daftar form-control" id="lembaga_sponsor" name="lembaga_sponsor">
                                        </div>
                                        <button class="btn btn-dark" type="button" data-fancybox disabled>Preview</button>
                                    </div>
                                    <span class="small text-light">*File berbentuk .pdf</span>
                                </div>
                                <hr>

                                <h5 class="mb-2">4. Surat-surat pernyataan</h5>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="form-file">
                                            <input type="file" class="form-file-input form-daftar form-control" id="surat_pernyataan" name="surat_pernyataan">
                                        </div>
                                        <button class="btn btn-dark" type="button" data-fancybox disabled>Preview</button>
                                    </div>
                                    <span class="small text-light">*File berbentuk .pdf</span>
                                </div>
                                <hr>

                                <h5 class="mb-2">5. Instrumen/Kuesioner, dll</h5>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="form-file">
                                            <input type="file" class="form-file-input form-daftar form-control" id="kuesioner" name="kuesioner">
                                        </div>
                                        <button class="btn btn-dark" type="button" data-fancybox disabled>Preview</button>
                                    </div>
                                    <span class="small text-light">*File berbentuk .pdf</span>
                                </div>
                                <hr>

                                <h5 class="mb-2">6. Informed Consent 35 butir</h5>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="form-file">
                                            <input type="file" class="form-file-input form-daftar form-control" id="file_informedconsent" name="file_informedconsent">
                                        </div>
                                        <button class="btn btn-dark" type="button" data-fancybox disabled>Preview</button>
                                    </div>
                                    <span class="small text-light">*File berbentuk .pdf</span>
                                </div>
                                <hr>

                                <h5 class="mb-2">7. Halaman Pengesahan</h5>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="form-file">
                                            <input type="file" class="form-file-input form-daftar form-control" id="halaman_pengesahan" name="halaman_pengesahan">
                                        </div>
                                        <button class="btn btn-dark" type="button" data-fancybox disabled>Preview</button>
                                    </div>
                                    <span class="small text-light">*File berbentuk .pdf</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @if(isset($is_edit) || isset($ethics))
                <button type="submit" class="btn btn-primary mt-4">Simpan</button>
            @endif
            <a href="{{ route('layaketik.protocol') }}" class="btn btn-dark mt-4">Kembali</a>
        </div>
    </div>
</div>