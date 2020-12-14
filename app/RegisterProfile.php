<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RegisterProfile extends Model
{
    protected $table = 'register_profiles';
    protected $fillable = [
        'volunteer_id', 'activity_id', 'position_id', 'introduction', 'register_date', 'interest'
    ];

    public function register_position(){
        return $this->hasOne('App\RegisterPosition','position_id');
    }

    public  function activity_detail(){
        return $this->belongsTo('App\ActivityDetail','activity_id');
    }

    public  function volunteer(){
        return $this->belongsTo('App\Volunteer','volunteer_user_id');
    }

    public $timestamps = true;
}
