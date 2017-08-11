<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class DepartmentRequest extends Request {

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
			'txtDepartmentName'=>'required|unique:departments,name',
			'txtphone'=>'required|numeric',	
		];
	}
	public function messages(){
		return [
			'txtDepartmentName.required'=>'Please enter a name of department',
			'txtDepartmentName.unique'=>'This name department is exist',
			'txtphone.required'=>'Please enter a number phone of department',
			'txtphone.numeric'=>'Please enter a number phone of department in conrect'
			];
	}

}
