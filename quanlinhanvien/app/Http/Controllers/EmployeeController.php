<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\department;
use App\employee;

class EmployeeController extends Controller {

	public function getadd(){
		$depart=department::select('id','name')->get()->toArray();
		return view('admin.employee.addemployee',compact('depart'));
	}
	public function postadd(Request $request){
		$this->validate($request,[
			'txtName'=>'required',
			'txtemail'=>'required|email',
			'txtJobtitle'=>'required',
			'fPhotos'=>'image',
			'txtCellphone'=>'required|numeric'
			],[
			'txtName.required'=>'Please enter a name of employee',
			'txtemail.required'=>'Please enter email',
			'txtCellphone.required'=>'Please enter a number phone',
			'txtCellphone.numeric'=>'number phone not correct',
			'txtJobtitle.required'=>'Please enter a jobtitle',
			'fPhotos.image'=>'this is not a image',
			'txtemail.email'=>'Email is not valid'
		]);

		$emp=new employee;
		$emp->name=$request->txtName;
		$emp->email=$request->txtemail;
		$emp->jobtitle=$request->txtJobtitle;
		$emp->cellphone=$request->txtCellphone;
		$emp->id_depart=$request->belong_department;
		if($request->hasFile('fPhotos')) {
		$photoname=$request->file('fPhotos')->getClientOriginalName();
		$emp->photo=$photoname;
		$request->file('fPhotos')->move(base_path().'/public/admin/images/',$photoname);
		}else{
			$emp->photo="hai.jpg";
		}
		$emp->save();
		return redirect()->route('admin.employee.list')->with(['flash_message'=>'success add a new employee']);
	
	}
	public function getlist(){
		$data=employee::select('id','name','email','jobtitle','id_depart')->orderBy('id','DESC')->get()->toArray();
		return view('admin.employee.listemployee',compact('data'));
	}
	public function getdelete($id){
		$emp=employee::find($id);
		$emp->delete();
		return redirect()->route('admin.employee.list')->with(['flash_message'=>'success delete employee']);
	}
	public function getedit($id){
		$data=employee::findOrFail($id)->toArray();
		$depart=department::select('id','name')->get()->toArray();
		return view('admin.employee.editemployee',compact('data','depart'));
	}
	public function postedit(Request $request,$id){
		$this->validate($request,[
			'txtName'=>'required',
			'txtemail'=>'required|email',
			'txtJobtitle'=>'required',
			'fPhotos'=>'image',
			'txtCellphone'=>'required|numeric'],[
			'txtName.required'=>'Please enter a name of employee',
			'txtemail.required'=>'Please enter email',
			'txtCellphone.required'=>'Please enter a number phone',
			'txtCellphone.numeric'=>'number phone not correct',
			'txtJobtitle.required'=>'Please enter a jobtitle',
			'fPhotos.image'=>'this is not a image',
			'txtemail.email'=>'Email is not valid'
		]);
		$emp=employee::find($id);
		$emp->name=$request->txtName;
		$emp->email=$request->txtemail;
		$emp->jobtitle=$request->txtJobtitle;
		$emp->cellphone=$request->txtCellphone;
		$emp->id_depart=$request->belong_department;
		if($request->hasFile('fPhotos')) {
		$photoname=$request->file('fPhotos')->getClientOriginalName();
		$emp->photo=$photoname;
		$request->file('fPhotos')->move(base_path().'/public/admin/images/',$photoname);}
		$emp->save();
		return redirect()->route('admin.employee.list')->with(['flash_message'=>'success edit employee']);		
	}
	public function getinfoemployee($id){
		$data=employee::select('id','name','email','jobtitle','cellphone','id_depart','photo')->where('id',$id)->get()->first();
		$department=department::select('id','name')->where('id',$data['id_depart'])->get()->first();
		return view('admin.employee.infoemployee',compact('data','department'));
	}
}
