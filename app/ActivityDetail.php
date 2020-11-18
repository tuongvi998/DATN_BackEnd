<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ActivityDetail extends Model
{
    protected $table='activity_details';
    protected $fillable =[
        'id', 'group_id', 'title', 'start_date', 'end_date', 'address', 'content',
        'image', 'max_register', 'min_register', 'donate', 'cost'
    ];

    public function register_profile(){
        return $this->hasMany('App\RegisterProfile');
    }

    public function group(){
        return $this->belongsTo('App\Group','group_id');
    }

    public $timestamps = true;
}
