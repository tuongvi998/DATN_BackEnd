<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GroupMember extends Model
{
    protected $table = 'group_members';
    protected $fillable = [
        'member_id', 'group_id', 'join_date', 'description', 'position'
    ];

    public function group(){
        return $this->belongsTo('App\Group','group_id');
    }

    public function member(){
        return $this->belongsTo('App\Member','member_id');
    }

    public $timestamps=true;
}
