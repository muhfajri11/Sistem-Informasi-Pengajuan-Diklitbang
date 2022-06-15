<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = ['user_id', 'table_id', 'from', 'email', 'title', 'body', 'is_read'];

    public function user(){
        return $this->belongsTo(User::class);
    }
}