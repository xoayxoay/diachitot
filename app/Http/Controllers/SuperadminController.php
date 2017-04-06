<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SuperadminController extends Controller
{
    protected $data = array();


    public function __construct()
    {   
        $this->middleware('lever', ['lever' => 'superadmin']);

        $num_admin = DB::select('SELECT COUNT(*) AS num FROM users WHERE lever = 1');
        $num_member_active = DB::select('SELECT COUNT(*) AS num FROM users WHERE lever = 0 AND status = 1');
        $num_member_banned = DB::select('SELECT COUNT(*) AS num FROM users WHERE lever = 0 AND status = 0');
        $num_article_discount_ON = DB::select('SELECT COUNT(*) AS num FROM articles WHERE status = 1 AND discount = 1');
        $num_article_discount_OFF = DB::select('SELECT COUNT(*) AS num FROM articles WHERE status = 1 AND discount = 0');
        $num_article_DEL = DB::select('SELECT COUNT(*) AS num FROM articles WHERE status = 0');
        $num_promotion_codes = DB::select('SELECT COUNT(*) AS num FROM promotion_codes');
        $num_view_discounts = DB::select('SELECT COUNT(*) AS num FROM view_discounts');
        $num_comments = DB::select('SELECT COUNT(*) AS num FROM comments');

        $this->data['num_admin'] = $num_admin[0]->num;
        $this->data['num_member_active'] = $num_member_active[0]->num;
        $this->data['num_member_banned'] = $num_member_banned[0]->num;
        $this->data['num_article_discount_ON'] = $num_article_discount_ON[0]->num;
        $this->data['num_article_discount_OFF'] = $num_article_discount_OFF[0]->num;
        $this->data['num_article_DEL'] = $num_article_DEL[0]->num;
        $this->data['num_promotion_codes'] = $num_promotion_codes[0]->num;
        $this->data['num_view_discounts'] = $num_view_discounts[0]->num;
        $this->data['num_comments'] = $num_comments[0]->num;

    }
// INDEX
    public function index()
    {
        $this->data['sidebar'] = 'dashboard';
    	return view('app/admins/dashboard',$this->data);
    }

// USERS
    public function users(Request $request,$lever)
    {   
        $sort_value = $request->input('sort_value','id');
        $sort = $request->input('sort','desc');
        $show_table = $request->input('show_table',10);
        $search = $request->input('search','');
       	$page = $request->input('page');
        $database = DB::table('users')->where('lever', '=', $lever)
        	->where(function ($query) use ($search)
        		{
            	$query->where('id', 'like', "%".$search."%")
                	->orwhere('username', 'like', "%".$search."%")
                	->orwhere('email', 'like', "%".$search."%")
                    ->orwhere('name', 'like', "%".$search."%")
                	->orwhere('created_at', 'like', "%".$search."%");
                })
        	->orderBy($sort_value,$sort)->paginate($show_table);
        if(isset($page))
        {
            $td = url('img/')."/".($row->verify==1 ? 'tick': 'untick');
            foreach ($database as $row) {
                echo 
<<<EX
      <tr>
        <td>{$row->id}</td>
        <td>{$row->username}</td>
        <td>{$row->email}</td>
        <td>{$row->name}</td>
        <td>{$row->created_at}</td>
        <td>
            <form action="{ url('/superadmin/user')}/{$row->id}">
                <button class="btn btn-info">View</button>
            </form>
        </td>
        <td><img src="{$td}.png" alt="check"></td>
      </tr>
EX;
            }
            exit();
        }

        $this->data['database'] = $database;
        $this->data['lever'] = $lever;
        $this->data['sidebar'] = 'users';     
        return view('app/admins/users',$this->data);
    }

// USER
    public function user($id)
    {   
        $database = DB::table('users')->where('id', '=', $id)->first();
        $this->data['database'] = $database;
        $this->data['sidebar'] = 'users';     
        return view('app/admins/user',$this->data);
    }

// ARTICLES
    public function articles(Request $request,$discount)
    {   
        $sort_value = $request->input('sort_value','id');
        $sort = $request->input('sort','desc');
        $show_table = $request->input('show_table',10);
        $search = $request->input('search','');
        $page = $request->input('page');

        $where = ($discount == 1 ? 'general_code':'status');
        $database = DB::table('articles')->where('discount', '=', $discount)
            ->where(function ($query) use ($search,$where)
                {
                $query->where('id', 'like', "%".$search."%")
                    ->orwhere('name', 'like', "%".$search."%")
                    ->orwhere('user_id', 'like', "%".$search."%")
                    ->orwhere('category', 'like', "%".$search."%")
                    ->orwhere($where, 'like', "%".$search."%")
                    ->orwhere('created_at', 'like', "%".$search."%");
                })
            ->orderBy($sort_value,$sort)->paginate($show_table);
        if(isset($page))
        {
            foreach ($database as $row) {
                if($discount == 1)
                    $td = '<td>'.$row->general_code.'</td>';
                else
                    $td = '<td class="'.($row->status == 1 ? 'text-success':'text-danger').'"><strong>'.($row->status == 1 ? 'ON':'DEL').'</strong></td>';
                $start = ( ($row->start_1==0) && ($row->start_2==0) && ($row->start_3==0) && ($row->start_4==0) && ($row->start_5==0) )? 0 : ( ($row->start_1 + $row->start_2*2 + $row->start_3*3 + $row->start_4*4 + $row->start_5*5) / ($row->start_1 + $row->start_2 + $row->start_3 + $row->start_4 + $row->start_5) );
                $starts = '';
                for($i = 1; $i <= 5; $i++)
                {
                    if($i <= $start) $starts .= ' <i class="fa fa-star" style="color: #FF8C00" aria-hidden="true"></i>';
                    elseif($i - $start < 1) $starts .= ' <i class="fa fa-star-half-o"  style="color: #FF8C00" aria-hidden="true"></i>';
                    else $starts .= ' <i class="fa fa-star-o"  style="color: #FF8C00" aria-hidden="true"></i>';
                }

                echo 
<<<EX
      <tr>
        <td>{$row->id}</td>
        <td>{$row->name}</td>
        <td>{$row->user_id}</td>
        <td>{$row->category}</td>
        {$td}
        <td>
            {$starts} {$start}
        </td>
        <td>{$row->created_at}</td>
        <td>
            <form>
                <button class="btn btn-info">View</button>
            </form>
        </td>
      </tr>
EX;
            }
            exit();
        }

        $this->data['database'] = $database;
        $this->data['discount'] = $discount;
        $this->data['sidebar'] = 'articles';     
        return view('app/admins/articles',$this->data);
    }


// COMMENTS
    public function comments(Request $request)
    {   
        $sort_value = $request->input('sort_value','id');
        $sort = $request->input('sort','desc');
        $show_table = $request->input('show_table',10);
        $search = $request->input('search','');
        $page = $request->input('page');
        $database = DB::table('comments')
            ->join('articles', 'comments.article_id', '=', 'articles.id')
            ->join('users', 'comments.user_id', '=', 'users.id')
            ->select('comments.*','articles.name','users.username')
            ->where(function ($query) use ($search)
                {
                $query->where('comments.id', 'like', "%".$search."%")
                    ->orwhere('comments.user_id', 'like', "%".$search."%")
                    ->orwhere('username', 'like', "%".$search."%")
                    ->orwhere('article_id', 'like', "%".$search."%")
                    ->orwhere('articles.name', 'like', "%".$search."%")
                    ->orwhere('comment', 'like', "%".$search."%")
                    ->orwhere('likes', 'like', "%".$search."%")
                    ->orwhere('comments.updated_at', 'like', "%".$search."%")
                    ->orwhere('comments.created_at', 'like', "%".$search."%");
                })
            ->orderBy($sort_value,$sort)->paginate($show_table);
        if(isset($page))
        {
            foreach ($database as $row) {
                echo 
<<<EX
      <tr>
        <td>{$row->id}</td>
        <td>{$row->username}[{$row->user_id}]</td>
        <td>{$row->name}[{$row->article_id}]</td>
        <td>{$row->comment}</td>
        <td>{$row->likes} <i class="fa fa-heart text-red" aria-hidden="true"></i></td>
        <td>{$row->updated_at}</td>
        <td>{$row->created_at}</td>
      </tr>
EX;
            }
            exit();
        }

        $this->data['database'] = $database;
        $this->data['sidebar'] = 'comments';     
        return view('app/admins/comments',$this->data);
    }   


// PROMOTION CODES
    public function promotion_codes(Request $request)
    {   
        $sort_value = $request->input('sort_value','general_code');
        $sort = $request->input('sort','desc');
        $show_table = $request->input('show_table',10);
        $search = $request->input('search','');
        $page = $request->input('page');
        $database = DB::table('promotion_codes')
            ->join('articles', 'promotion_codes.article_id', '=', 'articles.id')
            ->join('users', 'promotion_codes.user_id', '=', 'users.id')
            ->select('promotion_codes.*','articles.name','users.username')
            ->where(function ($query) use ($search)
                {
                $query->where('promotion_codes.general_code', 'like', "%".$search."%")
                    ->orwhere('article_id', 'like', "%".$search."%")
                    ->orwhere('articles.name', 'like', "%".$search."%")
                    ->orwhere('promotion_codes.user_id', 'like', "%".$search."%")
                    ->orwhere('username', 'like', "%".$search."%")
                    ->orwhere('code', 'like', "%".$search."%")
                    ->orwhere('rate', 'like', "%".$search."%")
                    ->orwhere('promotion_codes.created_at', 'like', "%".$search."%");
                })
            ->orderBy($sort_value,$sort)->paginate($show_table);
        if(isset($page))
        {
            foreach ($database as $row) {
                $td = url('img/')."/".($row->rate == 10 ? 'tick': 'untick');
                echo 
<<<EX
      <tr>
        <td>{$row->general_code}</td>
        <td>{$row->name}[{$row->article_id}]</td>
        <td>{$row->username}[{$row->user_id}]</td>
        <td>{$row->code}</td>
        <td>{$row->rate} %</td>
        <td>{$row->created_at}</td>
        <td><img src="{$td}.png" alt="check"></td>
      </tr>
EX;
            }
            exit();
        }

        $this->data['database'] = $database;
        $this->data['sidebar'] = 'promotion_codes';     
        return view('app/admins/promotion_codes',$this->data);
    }


// VIEW DISCOUNTS
    public function view_discounts(Request $request)
    {   
        $sort_value = $request->input('sort_value','id');
        $sort = $request->input('sort','desc');
        $show_table = $request->input('show_table',10);
        $search = $request->input('search','');
        $page = $request->input('page');
        $database = DB::table('view_discounts')
            ->join('articles', 'view_discounts.article_id', '=', 'articles.id')
            ->join('users', 'view_discounts.user_id', '=', 'users.id')
            ->select('view_discounts.*','articles.name','users.username')
            ->where(function ($query) use ($search)
                {
                $query->where('view_discounts.id', 'like', "%".$search."%")
                    ->orwhere('article_id', 'like', "%".$search."%")
                    ->orwhere('articles.name', 'like', "%".$search."%")
                    ->orwhere('view_discounts.user_id', 'like', "%".$search."%")
                    ->orwhere('username', 'like', "%".$search."%")
                    ->orwhere('user_ip', 'like', "%".$search."%")
                    ->orwhere('reference_link', 'like', "%".$search."%")
                    ->orwhere('view_discounts.created_at', 'like', "%".$search."%");
                })
            ->orderBy($sort_value,$sort)->paginate($show_table);
        if(isset($page))
        {
            foreach ($database as $row) {
                echo 
<<<EX
      <tr>
        <td>{$row->id}</td>
        <td>{$row->name}[{$row->article_id}]</td>
        <td>{$row->username}[{$row->user_id}]</td>
        <td>{$row->user_ip}</td>
        <td><a href="{$row->reference_link}" target="_blank">{$row->reference_link}</a></td>
        <td>{$row->created_at}</td>
      </tr>
EX;
            }
            exit();
        }

        $this->data['database'] = $database;
        $this->data['sidebar'] = 'view_discounts';     
        return view('app/admins/view_discounts',$this->data);
    }    


// SETTING
    public function setting(Request $request)
    {   
        $this->data['sidebar'] = 'setting';     
        $this->data['title'] = 'Setting';     
        return view('app/admins/setting',$this->data);
    }        
}
