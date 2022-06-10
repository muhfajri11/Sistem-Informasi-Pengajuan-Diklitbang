<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Institution extends Model
{
    protected $fillable = ['name'];

    public function comparatives(){
        return $this->hasMany(Comparative::class);
    }

    public function internships(){
        return $this->hasMany(Internship::class);
    }
}
