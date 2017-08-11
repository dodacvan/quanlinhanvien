<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class useradmin extends Model {

	protected $table = 'useradmins';
	protected $fillable = ['username','email'];
	public $timestamps = false;
	protected $hidden = ['password'];

}
