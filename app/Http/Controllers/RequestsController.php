<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;

class RequestsController extends Controller
{
	public function index()
	{

	}

	public function create()
	{

	}

	public function store(Request $request)
  	{
	    DB::table('articles')->insert([
	      	'user_id'=> Auth::User()->id,
	      	'category'=> $request->category,
	      	'image'=> $request->image,
	      	'phone'=> $request->phone,
	      	'address'=> $request->address,
	      	'description'=> $request->description,
	      	'price'=> $request->price,
	      	'coordinates'=> $request->coordinates,
	      	'created_at'=> date('Y-m-d H:i:s'),
	      	'updated_at'=> date('Y-m-d H:i:s'),
	    ]);
	    return back()->with('text', 'Articles created!');
  	}
}
