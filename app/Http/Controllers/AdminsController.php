<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminsController extends Controller
{
    public function __construct()
    {   
        $this->middleware('lever', ['middleware' => 'lever']);
    }

}
