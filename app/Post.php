<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';
    protected $fillable = [
        'id', 'group_id', 'title', 'content', 'post_date', 'status'
    ];

    public function group(){
        return $this->belongsTo('App\Group','group_id');
    }
    public $timestamps = true;
}
