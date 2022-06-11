<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FileInternship extends Model
{
    protected $fillable = [
        'proposal', 'akreditasi', 'panduan_praktek', 'ktm', 'transkrip', 'izin_pkl',
        'izin_ortu', 'antigen', 'mou', 'bukti_pkl'
    ];

    public function internships(){
        return $this->hasMany(Internship::class);
    }
}
