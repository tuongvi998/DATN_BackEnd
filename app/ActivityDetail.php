<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class ActivityDetail extends Model
{
    public $timestamps = true;
    protected $table='activity_details';

    protected $fillable =[
        'id', 'group_id', 'title', 'start_date', 'end_date', 'address', 'content',
        'image', 'max_register', 'min_register', 'donate', 'cost', 'donate', 'cost', 'benefit',
        'require', 'require', 'close_date'
    ];

    protected $appends = ['image_url'];


    public function getImageUrlAttribute()
    {
        return Storage::disk('s3')->temporaryUrl($this->image, now()->addHours(3));
    }

    public function register_profile(){
        return $this->hasMany('App\RegisterProfile');
    }

    public function group(){
        return $this->belongsTo('App\Group','group_id');
    }
}
