<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Research extends Model
{
    protected $fillable = [
        'user_id', 'institution_id', 'education_level_id', 'judul', 'title', 'tipe_penelitian',
        'ketua', 'nik', 'phone', 'address', 'province', 'city', 'anggota',
        'tempat', 'start_date', 'end_date', 'is_layaketik',
        'status', 'paid', 'total_paid', 'proposal', 'permohonan', 'izin_penelitian', 'eviden_paid'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
    
    public function institution(){
        return $this->belongsTo(Institution::class);
    }

    public function education_level(){
        return $this->belongsTo(EducationLevel::class);
    }

    public function research_ethics(){
        return $this->hasMany(ResearchEthic::class);
    }

    public static function can_research($judul){

        $check = self::where('judul', $judul)->get();
        $count = count($check);

        if($count > 0){
            $check = self::where('judul', $judul)->where(function($query){
                $query->where('status', 'reject');
            })->get();
    
            if(count($check) > 0) return true;
            return false;
        } 
        return true;
    }

    public static function deleteMessage($user_id, $id){
        $messages = DB::table('messages')->where('user_id', $user_id)->where('table_id', $id)->where('from', 'research')->get();
        
        if(count($messages) > 0){
            $delete = DB::table('messages')->where('user_id', $user_id)->where('table_id', $id)->where('from', 'research')->delete();
            if(!$delete) return false;
        } else {
            return true;
        }

        return true;
    }
}
