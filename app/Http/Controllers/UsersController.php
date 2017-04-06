<?php

namespace App\Http\Controllers;

use DB;
use Auth;
use Hash;
use Mail;
use Validator;
use App\User;
use App\Users;
use Illuminate\Http\Request;
use App\Mail\EmailVerification;
use Symfony\Component\HttpFoundation\File\UploadedFile;


class UsersController extends Controller
{

	public function update($id,Request $request)
	{
	    $user = Users::find($id);
        $user->update($request->all());
	    return back()->withInput()->with('text', 'User was edited!');
	}

	public function avatar(Request $request)
	{
		$time = time();
		$request->file('avatar-file')->move('img/avatar/', $time.'.jpg');
		DB::table('users')->where('id',$request->userid)->update([
      		'avatar'=> '["1","'.$time.'"]',
      		'updated_at'=> date('Y-m-d H:i:s'),
   		]);
   		return back()->with('text', 'Avatar changed!');
	}

	// RESET PASSWORD
	public function password(Request $request)
	{
	    if(Auth::Check())
	    {
	      $request_data = $request->All();
	      $validator = $this->admin_credential_rules($request_data);
	    if($validator->fails())
	    {
	        return redirect()->back()->with('errors' , $validator->getMessageBag()) ;
	    }
	    else
	    {  
	        $current_password = Auth::User()->password;           
	        if(Hash::check($request_data['current_password'], $current_password))
	        {           
	          	$user_id = Auth::User()->id;                       
	          	$obj_user = User::find($user_id);
	          	$obj_user->password = Hash::make($request_data['password']);
	          	$obj_user->updated_at = date('Y-m-d H:i:s');
	          	$obj_user->save(); 
	          	return redirect()->back()->with('text', 'Password changed!');
	        }
	        else
	        {        
	          	return redirect()->back()->with('errors' , $validator->getMessageBag()->add('current_password', 'Please enter correct current password')) ;  
	        }
	    }        
	}
	    else
	    {
	      return redirect("admin/setting");
	    }    
	}

	public function admin_credential_rules(array $data)
	{
	    $messages = [
	      	'current_password.required' => 'Please enter current password',
	      	'password.required' => 'Please enter password',
	    ];

	    $validator = Validator::make($data, [
	      	'current_password' => 'required',
	      	'password' => 'required|same:password',
	      	'password_confirmation' => 'required|same:password',     
	    ], $messages);
	    return $validator;
	}  

	// VERIFY EMAIL
	public function sendemailverification(Request $request)
    {
        DB::table('users')->where('id',$request->id)->update([
          'email_token'=> str_random(30),
        ]);
        $user = DB::table('users')->where('id',$request->id)->first();
        $email = new EmailVerification(new User(['email_token' => $user->email_token, 'name' => $user->name]));
        Mail::to($user->email)->send($email);
        DB::commit();
        return view('home');
    }


    public function verify($token)
    {
        // The verified method has been added to the user model and chained here
        // for better readability
        $user = User::where('email_token',$token)->firstOrFail();
        $this->verified($user->id);
        return redirect('login');
    }

    public function verified($id)
    {
        DB::table('users')->where('id',$id)->update([
          'verify'=> 1,
          'email_token'=> null,
        ]);
        return redirect('login');
    }
}
