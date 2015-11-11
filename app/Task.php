<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
	/**
	 * The database table used by the model
	 *
	 * @var string
	 */
	protected $table = "tasks";

	/**
	 * The attributes excluded from the model's JSON form
	 *
	 * @var array
	 */
	protected $hidden = ["created_at", "updated_at"];

	/*
	 * Many to many relationship to User(s)
	 */
	public function user()
	{
		return $this->belongsTo('App\User');
	}

	/*
	 * Many to one relationship to a Project
	 */
	public function project()
	{
		return $this->belongsTo('App\Project');
	}
}
