<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ResultReview extends Model
{
    protected $fillable = ['research_ethic_id', 'status', 'keterangan', 'sertifikat_layaketik'];

    public function research_ethic(){
        return $this->belongsTo(ResearchEthic::class);
    }
}