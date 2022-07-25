<!DOCTYPE html>
<html>
<head>
	<title>Protokol Penelitian</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <style>
        .page-break { page-break-after: always; }
        .font-bold { font-weight: bold; }
        .small { font-size: .7em; }

        .image.image_resized { display: block; box-sizing: border-box; }
        .image.image_resized img { width: 100%; }
        .image.image_resized > figcaption { display: block; }
    </style>
</head>
<body>
	<h2>A. Judul Penelitian (p-protokol no 1)</h2>

    <p>Judul:</p>
    <p>{{ $protocol->research_ethic->research->judul }}</p>

    <p>Lokasi Penelitian:</p>
    <p>{{ $protocol->research_ethic->research->tempat }}</p>

    <p>Apakah penelitian ini multi-senter?</p>
    <p>{{ $protocol->research_ethic->is_multisenter? "Ya" : "Tidak" }}</p>

    <p>Jika multi-senter apakah sudah mendapatkan persetujuan etik dari senter/institusi yang lain?</p>
    <p>{{ $protocol->research_ethic->acc_multisenter? "Ya" : "Tidak" }}</p>

    <div class="page-break"></div>

    <h2>C. Ringkasan Protokol Penelitian</h2>

    <p>
        1. Ringkasan dalam 200 kata, (ditulis dalam bahasa yang mudah dipahami oleh "awam" bukan dokter/profesional kesehatan)
    </p>
    {!! $protocol->ringkasan_protokol->ringkasan_protocol_a !!}

    <p>
        2. Tuliskan mengapa penelitian ini harus dilakukan, manfaatnya untuk penduduk di wilayah penelitian ini dilakukan (Negara, wilayah, lokal) - <i class="small">Justifikasi Penelitian (p3) Standar 2/A (Adil)</i>
    </p>
    {!! $protocol->ringkasan_protokol->ringkasan_protocol_b !!}

    <div class="page-break"></div>

    <h2>D. Isu Etik yang mungkin dihadapi</h2>

    <p>
        1. Pendapat peneliti tentang isyu etik yang mungkin dihadapi dalam penelitian ini, dan bagaimana cara menanganinya <i class="small">(p4)</i>.
    </p>
    {!! $protocol->isu_etik !!}

    <div class="page-break"></div>

    <h2>E. Ringkasan Kajian Pustaka</h2>

    <p>
        1. Ringkasan hasil-hasil studi sebelumnya yang sesuai topik penelitian, baik yang sudah maupun yang sudah dipublikasikan, termasuk jika ada kajian-kajian pada hewan. Maksimum 1 hal <i class="small">(p5)- G 4, S</i> ?
    </p>
    {!! $protocol->ringkasan_kajianpustaka !!}

    <div class="page-break"></div>

    <h2>F. Kondisi Lapangan</h2>

    <p>
        1. Gambaran singkat tentang lokasi penelitian <i class="small">(p8)</i>
    </p>
    {!! $protocol->kondisi_lapangan->kondisi_lapangan_a !!}
    
    <p>
        2. Informasi ketersediaan fasilitas yang tersedia di lapangan yang menunjang penelitian
    </p>
    {!! $protocol->kondisi_lapangan->kondisi_lapangan_b !!}

    <p>
        3. Informasi demografis / epidemiologis yang relevan tentang daerah penelitian
    </p>
    {!! $protocol->kondisi_lapangan->kondisi_lapangan_c !!}

    <div class="page-break"></div>

    <h2>G. Disain Penelitian</h2>

    <p>
        1. Tujuan penelitian, hipotesa, pertanyaan penelitian, asumsi dan variabel penelitian <i class="small">(p11)</i>
    </p>
    {!! $protocol->disain_penelitian->disain_penelitian_a !!}
    
    <p>
        2. Deskipsi detil tentang desain penelitian. <i class="small">(p12)</i>
    </p>
    {!! $protocol->disain_penelitian->disain_penelitian_b !!}

    <p>
        3. Bila ujicoba klinis, deskripsikan tentang apakah kelompok treatmen ditentukan secara random, (termasuk bagaimana metodenya), dan apakah blinded atau terbuka. <i class="small">(Bila bukan ujicoba klinis cukup tulis: tidak relevan) (p12)</i>
    </p>
    {!! $protocol->disain_penelitian->disain_penelitian_c !!}

    <div class="page-break"></div>

    <h2>H. Sampling</h2>

    <p>
        1. Jumlah subyek yang dibutuhkan dan bagaimana penentuannya secara statistik <i class="small">(p13)</i>
    </p>
    {!! $protocol->sampling->sampling_a !!}
    
    <p>
        2. Kriteria partisipan atau subyek dan justifikasi exclude/include-nya. <i class="small">(Guideline 3) (p12)</i>
    </p>
    {!! $protocol->sampling->sampling_b !!}

    <p>
        3. <strong>Sampling kelompok rentan</strong>: alasan melibatkan anak anak atau orang dewasa yang tidak mampu memberikan persetujuan setelah penjelasan, atau kelompok rentan, serta langkah langkah bagaimana meminimalisir bila terjadi resiko <i class="small">(tulis “<strong>tidak relevan</strong>” bila penelitian tidak mengikutsertakan kelompok rentan) (Guidelines 15, 16 and 17) (p15)</i>
    </p>
    {!! $protocol->sampling->sampling_c !!}

    <div class="page-break"></div>

    <h2>I. Intervensi</h2>

    <p>
        1. Desripsi dan penjelasan semua intervensi (metode administrasi treatmen, termasuk rute administrasi, dosis, interval dosis, dan masa treatmen produk yang digunakan <i class="small">(tulis “<strong>Tidak relevan</strong>” bila bukan penelitian intervensi) (investigasi dan komparator (p17)</i>
    </p>
    {!! $protocol->intervensi->intervensi_a !!}
    
    <p>
        2. Rencana dan jastifikasi untuk meneruskan atau menghentikan standar terapi/terapi baku selama penelitian <i class="small">(p 4 and 5) (p18)</i>
    </p>
    {!! $protocol->intervensi->intervensi_b !!}

    <p>
        3. Treatmen/Pengobatan lain yang mungkin diberikan atau diperbolehkan, atau menjadi kontraindikasi, selama penelitian <i class="small">(p 6) (p19)</i>
    </p>
    {!! $protocol->intervensi->intervensi_c !!}

    <p>
        4. Test klinis atau lab atau test lain yang harus dilakukan <i class="small">(p20)</i>
    </p>
    {!! $protocol->intervensi->intervensi_d !!}
    
    <div class="page-break"></div>

    <h2>J. Monitoring Penelitian</h2>

    <p>
        1. Sampel dari form laporan kasus yang sudah distandarisir, metode pencataran respon teraputik (deskripsi dan evaluasi metode dan frekuensi pengukuran), prosedur follow-up, dan, bila mungkin, ukuran yang diusulkan untuk menentukan tingkat kepatuhan subyek yang menerima treatmen <i class="small">(lihat lampiran) (p17)</i>
    </p>
    {!! $protocol->monitoring_penelitian !!}

    <div class="page-break"></div>

    <h2>K. Penghentian Penelitian dan Alasannya</h2>

    <p>
        1. Aturan atau kriteria kapan subyek bisa diberhentikan dari penelitian atau uji klinis, atau, dalam hal studi multi senter, kapan sebuah pusat/lembaga di non aktipkan, dan kapan penelitian bisa dihentikan <i class="small">(tidak lagi dilanjutkan) (p22)</i>
    </p>
    {!! $protocol->penghentian_penelitian !!}

    <div class="page-break"></div>

    <h2>L. Adverse Event dan Komplikasi (Kejadian Yang Tidak Diharapkan)</h2>

    <p>
        1. Metode pencatatan dan pelaporan adverse events atau reaksi, dan syarat penanganan komplikasi <i class="small">(Guideline 4 dan 23) (p23)</i>
    </p>
    {!! $protocol->adverse_penelitian->adverse_penelitian_a !!}

    <p>
        2. Resiko-resiko yang diketahui dari adverse events, termasuk resiko yang terkait dengan masing masing rencana intervensi, dan terkait dengan obat, vaksin, atau terhadap prosudur yang akan diuji cobakan <i class="small">(Guideline 4) (p24)</i>
    </p>
    {!! $protocol->adverse_penelitian->adverse_penelitian_b !!}

    <div class="page-break"></div>

    <h2>M. Penanganan Komplikasi <span class="small">(p27)</span></h2>

    <p>
        <ol>
            <li>Rencana detil bila ada resiko lebih dari minimal/ luka fisik, membuat rencana detil</li>
            <li>Adanya asuransi</li>
            <li>Adanya fasilitas pengobatan / biaya pengobatan</li>
            <li>Kompensasi jika terjadi disabilitas atau kematian <i class="small">(Guideline 14)</i></li>
        </ol>
    </p>
    {!! $protocol->penanganan_komplikasi !!}

    <div class="page-break"></div>

    <h2>N. Manfaat</h2>

    <p>
        1. Manfaat penelitian secara pribadi bagi subyek dan bagi yang lainnya <i class="small">(Guideline 4) (p25)</i>
    </p>
    {!! $protocol->manfaat->manfaat_a !!}

    <p>
        2. Manfaat penelitian bagi penduduk, termasuk pengetahuan baru yang kemungkinan dihasilkan oleh penelitian <i class="small">(Guidelines 1 and 4) (p26)</i>
    </p>
    {!! $protocol->manfaat->manfaat_b !!}

    <div class="page-break"></div>

    <h2>O. Jaminan Keberlanjutan Manfaat <i class="small">(p28)</i></h2>

    <p>
        <ol>
            <li>Kemungkinan keberlanjutan akses bila hasil intervensi menghasilkan manfaat yang signifikan,</li>
            <li>Modalitas yang tersedia,</li>
            <li>Pihak pihak yang akan mendapatkan keberlansungan pengobatan, organisasi yang akan membayar,</li>
            <li>Berapa lama <i class="small">(Guideline 6)</i></li>
        </ol>
    </p>
    {!! $protocol->keberlanjutan_manfaat !!}

    <div class="page-break"></div>

    <h2>P. Informed Consent</h2>

    <p>
        1. Cara untuk mendapatkan informed consent dan prosudur yang direncanakan untuk mengkomunikasikan informasi penelitian(Penjelasan Sebelum Persetujuan/PSP) kepada calon subyek, termasuk nama dan posisi wali bagi yang tidak bisa memberikannya. <i class="small">(Guideline 9) (p30)</i>
    </p>
    {!! $protocol->informed_consent->informed_consent_a !!}

    <p>
        2. Khusus Ibu Hamil: adanya perencanaan untuk memonitor kesehatan ibu dan kesehatan anak jangka pendek maupun jangka panjang <i class="small">(Guideline 19) (p29)</i>
    </p>
    {!! $protocol->informed_consent->informed_consent_b !!}

    <div class="page-break"></div>

    <h2>Q. Wali <i class="small">(p31)</i></h2>

    <p>
        1. Adanya wali yang berhak bila calon subyek tidak bisa memberikan informed consent <i class="small">(Guidelines 16 and 17)</i>
    </p>
    {!! $protocol->wali->wali_a !!}

    <p>
        2. Adanya orang tua atau wali yang berhak bila anak paham tentang informed consent tapi belum cukup umur <i class="small">(Guidelines 16 and 17)</i>
    </p>
    {!! $protocol->wali->wali_b !!}

    <div class="page-break"></div>

    <h2>R. Bujukan</h2>

    <p>
        1. Deskripsi bujukan atau insentif (bahan kontak) bagi calon subyek untuk ikut berpartisipasi, seperti uang, hadiah, layanan gratis, atau yang lainnya <i class="small">(p32)</i>
    </p>
    {!! $protocol->bujukan->bujukan_a !!}

    <p>
        2. Rencana dan prosedur, dan orang yang betanggung jawab untuk menginformasikan bahaya atau keuntungan peserta, atau tentang riset lain tentang topik yang sama, yang bisa mempengaruhi keberlansungan keterlibatan subyek dalam penelitian <i class="small">(Guideline 9) (p33)</i>
    </p>
    {!! $protocol->bujukan->bujukan_b !!}

    <p>
        3. Perencanaan untuk menginformasikan hasil penelitian pada subyek atau partisipan <i class="small">(p34)</i>
    </p>
    {!! $protocol->bujukan->bujukan_c !!}

    <div class="page-break"></div>

    <h2>S. Penjagaan Kerahasiaan</h2>

    <p>
        1. Proses rekrutmen subyek (misalnya lewat iklan), serta langkah langkah untuk menjaga privasi dan kerahasiaan selama rekrutmen <i class="small">(Guideline 3) (p16)</i>
    </p>
    {!! $protocol->penjagaan_kerahasiaan->penjagaan_kerahasiaan_a !!}

    <p>
        2. Langkah langkah proteksi kerahasiaan data pribadi, dan penghormatan privasi orang, termasuk kehatihatian untuk mencegah bocornya rahasia hasil test genetik pada keluarga kecuali atas izin dari yang bersangkutan <i class="small">(Guidelines 4, 11, 12 and 24) (p 35)</i>
    </p>
    {!! $protocol->penjagaan_kerahasiaan->penjagaan_kerahasiaan_b !!}

    <p>
        3. Informasi tentang bagaimana koding; bila ada, untuk identitas subyek, di mana di simpan dan kapan, bagaimana dan oleh siapa bisa dibuka bila terjadi emergensi <i class="small">(Guidelines 11 and 12) (p36)</i>
    </p>
    {!! $protocol->penjagaan_kerahasiaan->penjagaan_kerahasiaan_c !!}

    <p>
        4. Kemungkinan penggunaan lebih jauh dari data personal atau material biologis/BBT <i class="small">(p37)</i>
    </p>
    {!! $protocol->penjagaan_kerahasiaan->penjagaan_kerahasiaan_d !!}

    <div class="page-break"></div>

    <h2>T. Rencana Analisis</h2>

    <p>
        1. Deskripsi tentang rencana analisa statistik, dan kreteria bila atau dalam kondisi bagaimana akan terjadi penghentian dini keseluruhan penelitian <i class="small">(Guideline 4) (B,S2)</i>
    </p>
    {!! $protocol->rencana_analisis !!}

    <div class="page-break"></div>

    <h2>U. Monitor Keamanan</h2>

    <p>
        1. Rencana untuk memonitor keberlansungan keamanan obat atau intervensi lain yang dilakukan dalam penelitian atau trial, dan, bila diperlukan, pembentukan komite independen untuk data dan safety monitoring <i class="small">(Guideline 4) (B,S3,S7)</i>
    </p>
    {!! $protocol->monitor_keamanan !!}

    <div class="page-break"></div>

    <h2>V. Konflik Kepentingan</h2>

    <p>
        1. Pengaturan untuk mengatasi konflik finansial atau yang lainnya yang bisa mempengaruhi keputusan para peneliti atau personil lainya; menginformasikan pada komite lembaga tentang adanya conflict of interest; komite mengkomunikasikannya ke komite etik dan kemudian mengkomunikasikan pada para peneliti tentang langkah langkah berikutnya yang harus dilakukan <i class="small">(Guideline 25) (p42)</i>
    </p>
    {!! $protocol->konflik_kepentingan !!}

    <div class="page-break"></div>

    <h2>W. Manfaat Sosial</h2>

    <p>
        1. Untuk penelitian yang dilakukan pada seting sumberdaya lemah, kontribusi yang dilakukan sponsor untuk capacity building untuk review ilmiah dan etika dan untuk riset-riset kesehatan di negara tersebut; dan jaminan bahwa tujuan capacity building adalah agar sesuai nilai dan harapan para partisipan dan komunitas tempat penelitian <i class="small">(Guideline 8) (p43)</i>
    </p>
    {!! $protocol->manfaat_sosial->manfaat_sosial_a !!}

    <p>
        2. Protokol penelitian (dokumen) yang dikirim ke komite etik harus meliputi deskripsi rencana pelibatan komunitas, dan menunjukkan sumber-sumber yang dialokasikan untuk aktivitas aktivitas pelibatan tersebut. Dokumen ini menjelaskan apa yang sudah dan yang akan dilakukan, kapan dan oleh siapa, untuk memastikan bahwa masyarakat dengan jelas terpetakan untuk memudahkan pelibatan mereka selama riset, untuk memastikan bahwa tujuan riset sesuai kebutuhan masyarakat dan diterima oleh mereka. Bila perlu masyarakat harus dilibatkan dalam penyusunan protokol atau dokumen ini <i class="small">(Guideline 7) (p44)</i>
    </p>
    {!! $protocol->manfaat_sosial->manfaat_sosial_b !!}

    <div class="page-break"></div>

    <h2>X. Hak atas Data</h2>

    <p>
        1. Terutama bila sponsor adalah industri, kontrak yang menyatakan siapa pemilik hak publiksi hasil riset, dan kewajiban untuk menyiapkan bersama dan diberikan pada para PI draft laporan hasil riset <i class="small">(Guideline 24) (B dan H, S1,S7)</i>
    </p>
    {!! $protocol->hakatas_data !!}

    <div class="page-break"></div>

    <h2>Y. Publikasi</h2>

    <p>
        Rencana publikasi hasil pada bidang tertentu (seperti epidemiology, generik, sosiologi) yang bisa beresiko berlawanan dengan kemaslahatan komunitas, masyarakat, keluarga, etnik tertentu, dan meminimalisir resiko kemudharatan kelompok ini dengan selalu mempertahankan kerahasiaan data selama dan setelah penelitian, dan mempublikasi hasil hasil penelitian sedemikian rupa dengan selalu mempertimbangkan martabat dan kemulyaan mereka <i class="small">(Guideline 4) (p47)</i>
    </p>
    {!! $protocol->publikasi->publikasi_a !!}

    <p>
        Bagaimana publikasi bila hasil riset negatip. <i class="small">(Guideline 24) (p46)</i>
    </p>
    {!! $protocol->publikasi->publikasi_b !!}

    <div class="page-break"></div>

    <h2>Z. Pendanaan</h2>

    <p>
        Sumber dan jumlah dana riset; lembaga funding/sponsor, dan deskripsi komitmen finansial sponsor pada kelembagaan penelitian, pada para peneliti, para subyek riset, dan, bila ada, pada komunitas <i class="small">(Guideline 25) (B, S2); (p41)</i>
    </p>
    {!! $protocol->pendanaan !!}

    <div class="page-break"></div>

    <h2>AA. Komitmen Etik</h2>

    <p>
        1. Pernyataan peneliti utama bahwa prinsip-prinsip yang tertuang dalam pedoman ini akan dipatuhi <i class="small">(lampirkan scan Surat Pernyataan) (p6)</i>
    </p>
    {!! $protocol->komitmen_etik->komitmen_etik_a !!}
    
    <p>
        2. (Track Record) Riwayat usulan review protokol etik sebelumnya dan hasilnya (isi dengan judul da tanggal penelitian, dan hasil review Komite Etik) (lampirkan Daftar Riwayat Usulan Kaji Etiknya) <i class="small">(p7)</i>
    </p>
    {!! $protocol->komitmen_etik->komitmen_etik_b !!}

    <p>
        3. Pernyataan bahwa bila terdapat bukti adanya pemalsuan data akan ditangani sesuai peraturan/ketentuan yang berlaku <i class="small">(p48)</i>
    </p>
    {!! $protocol->komitmen_etik->komitmen_etik_c !!}

    <div class="page-break"></div>

    <h2>BB. Daftar Pustaka</h2>

    <p>
        Daftar referensi yang dirujuk dalam protokol <i class="small">(p40)</i>
    </p>
    {!! $protocol->daftar_pustaka !!}
</body>
</html>