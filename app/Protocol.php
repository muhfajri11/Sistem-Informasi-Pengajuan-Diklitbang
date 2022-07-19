<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Protocol extends Model
{
    protected $fillable = [
        'research_ethic_id', 'is_ready', 'ringkasan_protokol', 'isu_etik', 
        'ringkasan_kajianpustaka', 'kondisi_lapangan', 'disain_penelitian', 'sampling',
        'intervensi', 'monitoring_penelitian', 'penghentian_penelitian',
        'adverse_penelitian', 'penanganan_komplikasi', 'manfaat', 'keberlanjutan_manfaat',
        'informed_consent', 'wali', 'bujukan', 'penjagaan_kerahasiaan', 'rencana_analisis',
        'monitor_keamanan', 'konflik_keamanan', 'manfaat_sosial', 'hakatas_data', 'publikasi',
        'pendanaan', 'komitmen_etik', 'daftar_pustaka', 'cv_ketua', 'cv_anggota', 
        'lembaga_sponsor', 'surat_pernyataan', 'kuesioner', 'file_informedconsent', 
        'halaman_pengesahan'
    ];

    public function research_ethic(){
        return $this->belongsTo(ResearchEthic::class);
    }

    public function revision_protocols(){
        return $this->hasMany(RevisionProtocol::class);
    }
}
