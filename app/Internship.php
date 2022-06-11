<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Internship extends Model
{
    protected $fillable = [
        'user_id', 'file_internship_id', 'institution_id', 'name', 'nim', 'jurusan', 'semester', 'address',
        'province', 'city', 'phone', 'start_date', 'end_date', 'type', 'status', 'paid', 'total_paid'
    ];

    public function file_internship(){
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

    public static function can_magang($nim){
        $check = self::where('nim', $nim)->get();
        $count = count($check);

        if($count > 0){
            $check = self::where('nim', $nim)->where(function($query){
                $query->where('status', 'reject')->orWhere('status', 'done');
            })->get();
    
            if(count($check) > 0) return true;
            return false;
        } 
        return true;
        
    }
}
