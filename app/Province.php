<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    protected $table = 'provinces';
    protected $fillable = [
        'id', 'name', 'code',
    ];

    public function district(){
        return $this->hasMany('App\District');
    }

    public function ward(){
        return $this->hasMany('App\Ward');
    }
    public $timestamps = true;
}
