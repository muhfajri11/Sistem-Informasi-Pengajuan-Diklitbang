<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comparative extends Model
{
    protected $fillable = ['user_id', 'institution_id', 
        'title', 'members', 'visit', 'status', 'names', 'questions', 'docs', 'total_paid',
        'paid', 'eviden_paid', 'permohonan', 'updated_at'];

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
