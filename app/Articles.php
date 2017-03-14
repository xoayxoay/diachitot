<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Articles extends Model
{
    protected $fillable = [
        'category', 'image','phone','address', 'description','price','coordinates',
    ];
}
