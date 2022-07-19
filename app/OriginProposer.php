<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OriginProposer extends Model
{
    protected $fillable = ['name'];

    public function research_fees(){
        return $this->hasMany(ResearchFee::class);
    }

    public function research_ethics(){
        return $this->hasMany(ResearchEthic::class);
    }
}
