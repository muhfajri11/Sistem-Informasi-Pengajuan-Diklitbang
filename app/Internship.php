<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Internship extends Model
{
    protected $fillable = [
        'user_id', 'file_internship_id', 'institution_id', 'name', 'nim', 'jurusan', 'semester', 'jenjang', 'address',
        'province', 'city', 'phone', 'start_date', 'end_date', 'type', 'jenjang_price', 'type_price', 'mou_price',
        'status', 'paid', 'total_paid'
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

    public static function is_load(){
        $kuota = Setting::byName(['kuota']);
        $kuota = $kuota->value->internship;

        $interns = self::whereIn('status', ['review', 'pay', 'accept'])->get();

        if(count($interns) == $kuota) return false; // load kuota penuh

        return true;
    }

    public static function deleteMessage($user_id, $id){
        $messages = DB::table('messages')->where('user_id', $user_id)->where('table_id', $id)->where('from', 'internship')->get();
        
        if(count($messages) > 0){
            $delete = DB::table('messages')->where('user_id', $user_id)->where('table_id', $id)->where('from', 'internship')->delete();
            if(!$delete) return false;
        } else {
            return true;
        }

        return true;
    }
}
