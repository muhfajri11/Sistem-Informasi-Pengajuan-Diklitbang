<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = ['user_id', 'table_id', 'from', 'email', 'title', 'body', 'is_read'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public static function getData($from, $id = null){
        /**
         * get data with from relation
         * $from = relation ('internship', 'comparative')
         * $id = id relation table
         */

        $msg = Message::where('from', $from);

        if($id) $msg->where('table_id', $id)->get();

        $msg->get();

        if(!$msg) return false;

        return $msg;
    }
}
