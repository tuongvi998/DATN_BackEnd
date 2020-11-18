<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $table = 'members';
    protected $fillable = [
      'name', 'id', 'email', 'phone', 'address', 'gender'
    ];
    public $timestamps = true;
    public function group_members(){
        return $this->hasMany('App\GroupMember');
    }
}
