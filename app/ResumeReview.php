<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ResumeReview extends Model
{
    protected $fillable = ['research_ethic_id', 'user_id', 'resume'];

    public function research_ethic(){
        return $this->belongsTo(ResearchEthic::class);
    }
}
