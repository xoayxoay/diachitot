<?php

namespace App\Http\Controllers;

use DB;
use Auth;
use Session;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
	public function index()
	{

	}

	public function create()
	{

	}

	public function store(Request $request)
  	{
	    DB::table('comments')->insert([
	      	'user_id'=> Auth::User()->id,
	      	'article_id'=> $request->article_id,
	      	'comment'=> $request->comment,
	      	'created_at'=> date('Y-m-d H:i:s'),
	      	'updated_at'=> date('Y-m-d H:i:s'),
	    ]);
	    return back()->with('text', 'Articles created!');
  	}

	public function update($id,Request $request)
	{
	    DB::table('comments')->where('id',$id)->update([
      	'comment'=> $request->comment,
      	'updated_at'=> date('Y-m-d H:i:s'),
   		]);
   		return back()->with('text', '111 created!');
	}

	public function likes(Request $request)
	{
	    DB::table('comments')->where('id',$request->comment_id)->increment('likes');
	    session::put('like'.$request->comment_id,'ON');
   		return back()->with('text', 'Increment');
	}
}
