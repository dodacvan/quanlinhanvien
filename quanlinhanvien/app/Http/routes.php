<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);


Route::get('auth/login', ['as'=>'auth.login','uses'=>'Auth\AuthController@getLogin']);
//Route::group(['prefix'=>'admin','middleware'=>'auth'],function(){
	Route::group(['prefix'=>'department'],function(){
		Route::get('listdepartment',['as'=>'admin.department.list','uses'=>'DepartmentController@getlist']);
		Route::get('adddepartment',['as'=>'admin.department.getadd','uses'=>'DepartmentController@getadd']);
		Route::post('adddepartment',['as'=>'admin.department.postadd','uses'=>'DepartmentController@postadd']);
		Route::get('deletedepartment/{id}',['as'=>'admin.department.getdelete','uses'=>'DepartmentController@getdelete']);
		Route::get('editdepartment/{id}',['as'=>'admin.department.getedit','uses'=>'DepartmentController@getedit']);
		Route::post('editdepartment/{id}',['as'=>'admin.department.postedit','uses'=>'DepartmentController@postedit']);
		Route::get('listofdepart/{id}',['as'=>'admin.employee.getlistofdepart','uses'=>'DepartmentController@getlistofdepart']);
		Route::get('infodepart/{id}',['as'=>'admin.department.infodepart','uses'=>'DepartmentController@getinfodepart']);

	});
	Route::group(['prefix'=>'employee'],function(){
		Route::get('listemployee',['as'=>'admin.employee.list','uses'=>'EmployeeController@getlist']);
		Route::get('addemployee',['as'=>'admin.employee.getadd','uses'=>'EmployeeController@getadd']);
		Route::post('addemployee',['as'=>'admin.employee.postadd','uses'=>'EmployeeController@postadd']);
		Route::get('deleteemployee/{id}',['as'=>'admin.employee.getdelete','uses'=>'EmployeeController@getdelete']);
		Route::get('editemployee/{id}',['as'=>'admin.employee.getedit','uses'=>'EmployeeController@getedit']);
		Route::post('editemployee/{id}',['as'=>'admin.employee.postedit','uses'=>'EmployeeController@postedit']);
		Route::get('infoemployee/{id}',['as'=>'admin.employee.infoemployee','uses'=>'EmployeeController@getinfoemployee']);
	});
	
	Route::group(['prefix'=>'user'],function(){
		Route::get('listuser',['as'=>'admin.user.list','uses'=>'UserController@getlist']);
		Route::get('adduser',['as'=>'admin.user.getadd','uses'=>'UserController@getadd']);
		Route::post('adduser',['as'=>'admin.user.postadd','uses'=>'UserController@postadd']);
		Route::get('deleteuser/{id}',['as'=>'admin.user.getdelete','uses'=>'UserController@getdelete']);
		Route::get('edituser/{id}',['as'=>'admin.user.getedit','uses'=>'UserController@getedit']);
		Route::post('edituser/{id}',['as'=>'admin.user.postedit','uses'=>'UserController@postedit']);
		Route::get('infouser/{id}',['as'=>'admin.user.infouser','uses'=>'UserController@getinfouser']);
	});

//});
Route::get('listdepa',['as'=>'user.depa.list','uses'=>'WelcomeController@getlistdepa']);
Route::get('listem',['as'=>'user.em.list','uses'=>'WelcomeController@getlistem']);



