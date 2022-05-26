<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Room extends Model
{
    protected $fillable = [
        'name', 'rate'
    ];

    public function comparatives(){
        return $this->belongsToMany(Comparative::class);
    }
}
