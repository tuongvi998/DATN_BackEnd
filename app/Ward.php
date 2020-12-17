<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ward extends Model
{
    protected $table = 'wards';
    protected $fillable = [
        'id', 'name', 'province_id', 'prefix', 'district_id'
    ];
    public function province(){
        return $this->belongsTo('App\Province','province_id');
    }
    public function district(){
        return $this->belongsTo('App\District','district_id');
    }
}
