<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DeepReview extends Model
{
    protected $fillable = [
        'research_ethic_id', 'user_id', 'revision', 'nilai_sosial', 'catatan_nilaisosial', 'nilai_ilmiah',
        'catatan_nilaiilmiah', 'pemerataan', 'catatan_pemerataan', 'potensi', 'catatan_potensi',
        'bujukan', 'catatan_bujukan', 'privacy', 'catatan_privacy', 'informed_consent',
        'catatan_informedconsent', 'status', 'kesimpulan'
    ];

    public function research_ethic(){
        return $this->belongsTo(ResearchEthic::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
