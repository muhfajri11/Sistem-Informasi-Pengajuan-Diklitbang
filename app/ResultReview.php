<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ResultReview extends Model
{
    protected $fillable = ['research_ethic_id', 'status', 'revision', 'keterangan', 'sertifikat_layaketik'];

    public function research_ethic(){
        return $this->belongsTo(ResearchEthic::class);
    }

    public function fullboard(){
        return $this->hasOne(Fullboard::class);
    }

    public function perbaikan(){
        return $this->hasOne(Revision::class);
    }
}
