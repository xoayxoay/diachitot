<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SuperadminController extends Controller
{
	protected    $num_admin = "";
    protected    $num_customer = "";
    protected    $num_member = "";
    protected    $num_article_ON = "";
    protected    $num_article_DEL = "";
    protected    $num_request_ON = "";
    protected    $num_request_DEL = "";

    public function __construct()
    {   
        $this->num_admin = DB::select('SELECT COUNT(*) AS num FROM users WHERE lever = ?', [2]);
        $this->num_customer = DB::select('SELECT COUNT(*) AS num FROM users WHERE lever = ?', [1]);
        $this->num_member = DB::select('SELECT COUNT(*) AS num FROM users WHERE lever = ?', [0]);
        $this->num_article_ON = DB::select('SELECT COUNT(*) AS num FROM articles WHERE status = ?', [1]);
        $this->num_article_DEL = DB::select('SELECT COUNT(*) AS num FROM articles WHERE status = ?', [0]);
        $this->num_request_ON = DB::select('SELECT COUNT(*) AS num FROM requests WHERE pay != ?', [0]);
        $this->num_request_DEL = DB::select('SELECT COUNT(*) AS num FROM requests WHERE pay = ?', [0]);
    }
// INDEX
    public function index()
    {
    	return view('app/admins/dashboard',
    		array(
    			'num_admin'=>$this->num_admin[0]->num,
    			'num_customer'=>$this->num_customer[0]->num,
    			'num_member'=>$this->num_member[0]->num,
    			'num_article_ON'=>$this->num_article_ON[0]->num,
                'num_article_DEL'=>$this->num_article_DEL[0]->num,
                'num_request_ON'=>$this->num_request_ON[0]->num,
                'num_request_DEL'=>$this->num_request_DEL[0]->num,
    			)
    	);    		
    }
// USER
    public function users(Request $request,$lever)
    {   
        $sort_value = $request->input('sort_value','id');
        $sort = $request->input('sort','desc');
        $show_table = $request->input('show_table',10);
        $search = $request->input('search','');
       	$page = $request->input('page');
        $users = DB::table('users')->where('lever', '=', $lever)
        	->where(function ($query) use ($search)
        		{
            	$query->where('id', 'like', "%".$search."%")
                	->orwhere('username', 'like', "%".$search."%")
                	->orwhere('email', 'like', "%".$search."%")
                	->orwhere('name', 'like', "%".$search."%")
                	->orwhere('address', 'like', "%".$search."%")
                	->orwhere('bank', 'like', "%".$search."%")
                	->orwhere('created_at', 'like', "%".$search."%");
                })
        	->orderBy($sort_value,$sort)->paginate($show_table);
        if(isset($page))
        {
            foreach ($users as $row) {
            	$verify = url('img/')."/".($row->verify==1 ? 'tick': 'untick');
                echo 
<<<EX
      <tr>
        <td>{$row->id}</td>
        <td>{$row->username}</td>
        <td>{$row->email}</td>
        <td>{$row->name}</td>
        <td>{$row->address}</td>
        <td>{$row->bank}</td>
        <td>{$row->created_at}</td>
        <td><img src="$verify.png" alt="check"></td>
      </tr>
EX;
            }
            exit();
        }
        return view('app/admins/users',
            array(
    			'num_admin'=>$this->num_admin[0]->num,
    			'num_customer'=>$this->num_customer[0]->num,
    			'num_member'=>$this->num_member[0]->num,
    			'num_article_ON'=>$this->num_article_ON[0]->num,
                'num_article_DEL'=>$this->num_article_DEL[0]->num,
                'num_request_ON'=>$this->num_request_ON[0]->num,
                'num_request_DEL'=>$this->num_request_DEL[0]->num,
                'users'=>$users,
                'lever'=>$lever,
                )
        );
    }
}
