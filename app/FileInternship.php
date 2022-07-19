<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FileInternship extends Model
{
    protected $fillable = [
        'internship_id', 'proposal', 'panduan_praktek', 'ktm_ktp', 'jadwal', 'izin_pkl',
        'izin_ortu', 'antigen', 'mou', 'bukti_pkl', 'sertifikat', 'eviden_paid'
    ];

    public function internship(){
        return $this->belongsTo(Internship::class);
    }
}
