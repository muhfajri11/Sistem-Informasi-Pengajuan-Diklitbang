<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comparative extends Model
{
    protected $fillable = ['user_id', 'institution_id', 
        'title', 'questions', 'members', 'visit', 'status', 'total_paid', 'paid', 
        'eviden_paid', 'attach', 'updated_at'];

    public function rooms(){
        return $this->belongsToMany(Room::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function institution(){
        return $this->belongsTo(Institution::class);
    }
}
