<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    protected $table = 'districts';
    protected $fillable = [
        'id', 'name', 'province_id', 'prefix'
    ];
    public function province(){
        return $this->belongsTo('App\Province','province_id');
    }
    public function ward(){
        return $this->hasMany('App\Ward');
    }
    public $timestamps = true;
}
