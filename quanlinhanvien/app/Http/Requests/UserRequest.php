<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class UserRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			'txtUser'=>'required|unique:users,name',
			'txtPass'=>'required',
			'txtRePass'=>'required|same:txtPass',
			'txtEmail'=>'required|email'

		];
	}
	public function messages(){
		return [
			'txtUser.required'=>'please enter your username',
			'txtUser.unique'=>'user name is exist',
			'txtPass.required'=>'please enter your password',
			'txtRePass.required'=>'plesase confirm your password',
			'txtRePass.same'=>'confirm password not match',
			'txtEmail.required'=>'please enter your email',
			'txtEmail.email'=>'email incorrect'


		];

	}

}
