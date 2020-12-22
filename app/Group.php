<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Group extends Model
{
    protected $table = 'groups';

    protected $fillable =[
        'id', 'address', 'phone', 'user_id', 'field_id', 'avatar', 'name',
        'founded_year', 'introduction', 'problem','result','mission','vision',
        'wish', 'activity'
    ];

    protected $appends = ['group_avatar_url'];

    public function getGroupAvatarUrlAttribute()
    {
        return Storage::disk('s3')->temporaryUrl($this->avatar, now()->addHours(3));
    }

    public function user(){
        return $this->belongsTo('App\User','user_id');
    }

    public function field(){
        return $this->belongsTo('App\Field','field_id');
    }

    public function activity_detail(){
        return $this->hasMany('App\ActivityDetail');
    }

    public function group_member(){
        return $this->hasMany('App\GroupMember');
    }

    public function post(){
        return $this->hasMany('App\Post');
    }

    public $timestamps = true;
}
