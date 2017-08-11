<?php namespace App\Http\Controllers;
use App\department;
use App\employee;
class WelcomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Welcome Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders the "marketing page" for the application and
	| is configured to only allow guests. Like most of the other sample
	| controllers, you are free to modify or remove it as you desire.
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('guest');
	}

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('admin.user.hi');
	}
	public function getlistdepa(){
		$data=department::select('id','name','officephone','manager')->orderBy('id','DESC')->get()->toArray();
		return view('admin.user.depa',compact('data'));

	}
	public function getlistem(){
		$data=employee::select('id','name','email','jobtitle','id_depart')->orderBy('id','DESC')->get()->toArray();
		return view('admin.user.em',compact('data'));
	}
	
}
