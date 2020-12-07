<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Field extends Model
{
    protected $table = 'fields';
    protected $fillable = [
        'id', 'name'
    ];

    public function groups(){
        return $this->hasMany('App\Group');
    }

    public $timestamps = true;
}
