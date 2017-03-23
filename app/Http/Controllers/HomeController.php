<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
      
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $article = DB::table('articles')->where('id',1)->first();
        $comment = DB::table('comments')->where('id',1)->first();
        return view('home')->with(array('article'=>$article,'comment'=>$comment));
    }

    public function test()
    {
        return $_SERVER['HTTP_REFERER'];
    }
}
