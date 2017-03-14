<?php

namespace App\Http\Controllers;

use DB;
use Auth;
use Session;
use App\Articles;
use Illuminate\Http\Request;

class ArticlesController extends Controller
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


	public function show($id)
	{

	}

	public function edit($id)
	{

	}

	public function update($id,Request $request)
	{
	    $user = Articles::find($id);
        $user->update($request->all());
	    return back()->withInput()->with('text', 'Offer created!');
	}

	public function destroy($id)
	{

	}

	public function starts(Request $request)
	{
		DB::table('articles')->where('id',$request->article_id)->increment('start_'.$request->start);
		session::put('start'.$request->article_id,'ON');
   		return back()->with('text', 'start');
	}
}
