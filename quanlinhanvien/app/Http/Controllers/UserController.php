<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\User;
use Hash;
use Auth;
use Mail;
class UserController extends Controller {

	public function getlist(){
		$data=User::select('id','name','email','level')->orderBy('id','DESC')->get()->toArray();
		return view('admin.user.listuser',compact('data'));
	}
	public function getadd(){
		$current_user_id=Auth::user()->level;
		if($current_user_id==1){
			return view('admin.user.adduser');
		}
		return redirect()->back()->with(['flash_message'=>'you can\'t add user, you not master admin']);

		
	}
	public function postadd(UserRequest $request){
		$user= new User();
		$user->name=$request->txtUser;
		$user->password=Hash::make($request->txtPass);
		$user->email=$request->txtEmail;
		$user->remember_token=$request->_token;
		$user->level=$request->rdoLevel;
		$user->save();
		$data=['username'=>$request->txtUser,'password'=>$request->txtPass];
		try
  		{
   
			Mail::send('emails.contact',$data, function($msg){
				$msg->from('dodacvan1995@gmail.com','van');
				$msg->to('dodacvan1995@gmail.com','quan tri vien moi')->subject('thong tin tai khoan');

			});

		}
  		catch (Exception $e){
    		$response = $e->getMessage();
 		}
		
		return redirect()->route('admin.user.list')->with(['flash_message'=>'success add user']);
	}
	public function getdelete($id){
		$current_user_level=Auth::user()->level;
		$user=User::find($id);
		if($current_user_level==1 && $user['level']!=1){
			$user->delete($id);
			return redirect()->route('admin.user.list')->with(['flash_message'=>'success delete user']);
		}else{
			return redirect()->route('admin.user.list')->with(['flash_message'=>'you can\'t delete user']);
		}
		
	}
	public function getedit($id){
		$current_user_id=Auth::user()->id;
		if($current_user_id==$id){
			$data=User::find($id);
			return view('admin.user.edituser',compact('data'));
		}
		return redirect()->back()->with(['flash_message'=>'you can\'t edit user']);
	}
	public function postedit(Request $request,$id){
		if($request->txtPass){
			$this->validate($request,['txtRePass'=>'required|same:txtPass'],['txtRePass.same'=>'re password not correct',
			'txtRePass.required'=>'please enter repast',]);
		}
		if($request->txtRePass){
			$this->validate($request,['txtPass'=>'required|same:txtRePass'],['txtPass.same'=>' password not correct',
			'txtPass.required'=>'please enter past',]);
		}

		$this->validate($request,[
			'txtUser'=>'required|unique:users,name,'.$id,	
			'txtEmail'=>'required|email'],[
			'txtUser.required'=>'Please enter a username',
			'txtUser.unique'=>'This user is exist',
			
			'txtEmail.required'=>'please enter your email',
			'txtEmail.email'=>'email not correct'
		]);
		$user=User::find($id);
		$user->name=$request->txtUser;
		if($request->txtPass){
			$user->password=Hash::make($request->txtPass);
		}
		$user->email=$request->txtEmail;
		$user->remember_token=$request->_token;
		$user->save();

		return redirect()->route('admin.user.list')->with(['flash_message'=>'success edit user']);

		
	}


}
