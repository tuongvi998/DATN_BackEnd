<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Volunteer extends Model
{
    protected $table = 'volunteers';

    protected $fillable = [
        'user_id', 'address', 'phone', 'avatar', 'gender', 'birthday'
    ];

    protected $appends = ['user_avatar_url'];
    public function getUserAvatarUrlAttribute()
    {
        return Storage::disk('s3')->temporaryUrl($this->avatar, now()->addHours(3));
    }
    public $timestamps = true;

    public function user(){
        return $this->belongsTo('App\User','user_id');
    }

    public function register_profile(){
        return $this->hasMany('App\RegisterProfile');
    }
}
