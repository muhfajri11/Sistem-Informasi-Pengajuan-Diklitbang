<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ResearchType extends Model
{
    protected $fillable = ['name'];

    public function research_fees(){
        return $this->hasMany(ResearchFee::class);
    }
}
