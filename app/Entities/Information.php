<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Information extends Model
{
    protected $table = 'informations';
    public $timestamps = true;
    protected $guarded = [];
}