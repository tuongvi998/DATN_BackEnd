<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RegisterPosition extends Model
{
    protected $table = 'register_positions';
    protected $fillable = [
        'id', 'position_name'
    ];
    public $timestamps=true;

    public  function register_profile(){
        return $this->belongsTo('App\RegisterProfile');
    }
}
