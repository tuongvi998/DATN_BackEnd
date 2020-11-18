<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Volunteer extends Model
{
    protected $table = 'volunteers';

    protected $fillable = [
        'user_id', 'address', 'phone', 'avatar', 'gender', 'birthday'
    ];

    public $timestamps = true;

    public function user(){
        return $this->belongsTo('App\User','user_id');
    }

    public function register_profile(){
        return $this->hasMany('App\RegisterProfile');
    }
}
