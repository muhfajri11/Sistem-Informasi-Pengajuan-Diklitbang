<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Revision extends Model
{
    protected $fillable = ['research_ethic_id', 'result_review_id', 'user_id', 'revision', 'resume_catatan', 'surat_pemberitahuan'];

    public function research_ethic(){
        return $this->belongsTo(ResearchEthic::class);
    }

    public function result_review(){
        return $this->belongsTo(ResultReview::class);
    }
}
