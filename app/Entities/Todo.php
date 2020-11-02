<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    protected $table = 'blogs';

    protected $guarded = [];

    public $timestamps =false;

    public function user() {
    	return $this->belongsTo('App\User', 'user_id');
    }
}