<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SuperadminController extends Controller
{
    public function __construct()
    {   
        $this->middleware('lever', ['middleware' => 'lever']);
    }
    public function index()
    {
    	return view('app/admins/dashboard');
    }
}
