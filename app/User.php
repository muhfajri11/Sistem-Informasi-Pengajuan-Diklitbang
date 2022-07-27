<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'phone', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function comparatives(){
        return $this->hasMany(Comparative::class);
    }

    public function internships(){
        return $this->hasMany(Internship::class);
    }

    public function messages(){
        return $this->hasMany(Message::class);
    }

    public function researches(){
        return $this->hasMany(Research::class);
    }

    public function research_ethics(){
        return $this->hasMany(ResearchEthic::class);
    }

    public function quick_reviews(){
        return $this->hasMany(QuickReview::class);
    }

    public function settings(){
        return $this->hasMany(Setting::class);
    }
}
