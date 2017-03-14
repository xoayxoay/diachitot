<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    protected $fillable = [
        'email','name', 'avatar','phone','address','bank',
    ];
}
