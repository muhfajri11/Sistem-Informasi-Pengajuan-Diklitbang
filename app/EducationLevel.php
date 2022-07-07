<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EducationLevel extends Model
{
    protected $fillable = ['name', 'fee'];

    public function research_fees(){
        return $this->hasMany(ResearchFee::class);
    }

    public function researches(){
        return $this->hasMany(Research::class);
    }
}
