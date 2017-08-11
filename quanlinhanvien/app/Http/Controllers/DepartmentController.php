<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Http\Requests\DepartmentRequest;
use App\department;
use App\employee;
class DepartmentController extends Controller {
	public function getlist(){
		$data=department::select('id','name','officephone','manager')->orderBy('id','DESC')->get()->toArray();
		return view('admin.department.listdepartment',compact('data'));
	}
	public function getadd(){
		$manager=employee::select('id','name')->get()->toArray();
		return view('admin.department.adddepartment',compact('manager'));
	}
	public function postadd(DepartmentRequest $request){
		$depart=new department;
		$depart->name=$request->txtDepartmentName;
		$depart->officephone=$request->txtphone;
		$depart->manager=$request->txtmanager;
		$depart->save();
		return redirect()->route('admin.department.list')->with(['flash_message'=>'success add a new department']);
	}
	public function getdelete($id){
		$depart=department::find($id);
		$depart->delete();
		return redirect()->route('admin.department.list')->with(['flash_message'=>'success delete a department']);

	}
	public function getedit($id){
		$data=department::findOrFail($id)->toArray();
		$manager=employee::select('id','name')->get()->toArray();
		return view('admin.department.editdepartment',compact('data','manager'));
	}
	public function postedit(Request $request,$id){
		$this->validate($request,[
			'txtDepartmentName'=>'required|unique:departments,name,'.$id,
			'txtphone'=>'required|numeric'],[
			'txtDepartmentName.required'=>'Please enter a name of department',
			'txtDepartmentName.unique'=>'This name department is exist',
			'txtphone.required'=>'Please enter a number phone of department',
			'txtphone.nummeric'=>'number phone not correct'
		]);
		$depart=department::find($id);
		$depart->name=$request->txtDepartmentName;
		$depart->officephone=$request->txtphone;
		$depart->manager=$request->txtmanager;
		$depart->save();
		return redirect()->route('admin.department.list')->with(['flash_message'=>'success edit a department']);

		
	}
	public function getlistofdepart($id){
		$data=employee::select('id','name','email','jobtitle','id_depart')->where('id_depart',$id)->orderBy('id','DESC')->get()->toArray();
		return view('admin.employee.listemployee',compact('data'));

	}
	public function getinfodepart($id){
		$data=department::select('name','officephone','manager')->where('id',$id)->get()->first();
		$manager=employee::select('id','name')->where('id',$data['manager'])->get()->first();
				return view('admin.department.infodepart',compact('data','manager'));
		/* khi dung kieu mang toarray ko the co data['manager'] neu ko dung vong lap ta phai dung where('id',$data[0]['manager']) */
	}
	


}
