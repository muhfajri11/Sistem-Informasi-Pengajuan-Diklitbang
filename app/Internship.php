<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Internship extends Model
{
    protected $fillable = [
        'user_id', 'file_internship_id', 'institution_id', 'name', 'nim', 'jurusan', 'address',
        'city', 'phone', 'start_date', 'end_date', 'type', 'status', 'paid', 'total_paid'
    ];

    public function fileinternship(){
        return $this->belongsTo(FileInternship::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
    
    public function institution(){
        return $this->belongsTo(Institution::class);
    }

    public function rooms(){
        return $this->belongsToMany(Room::class);
    }
}
