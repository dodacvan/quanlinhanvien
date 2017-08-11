<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class employee extends Model {

	protected $table = 'employees';
	protected $fillable = ['name','photo','jobtitle','cellphone','email','id_depart'];
	public $timestamps = false;

public function department(){
return $this->belongsTo('app\department','id_depart');
}

}
