<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class department extends Model {
	protected $table = 'departments';
	protected $fillable = ['name','officephone','manager'];
	public $timestamps = false;
public function employee(){
return $this->hasMany('app\employee','id_depart');
}

	
}
