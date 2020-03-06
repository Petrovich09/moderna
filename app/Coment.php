<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coment extends Model
{
    protected $fillable = ['post_id','user_id','name', 'email','website','comment'];
    public function post() {

        return $this->belongsTo('App\Post');

    }
}
