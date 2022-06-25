<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FileInternship extends Model
{
    protected $fillable = [
        'proposal', 'panduan_praktek', 'ktm_ktp', 'jadwal', 'izin_pkl',
        'izin_ortu', 'antigen', 'mou', 'bukti_pkl', 'sertifikat', 'eviden_paid'
    ];

    public function internships(){
        return $this->hasMany(Internship::class);
    }
}
