<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
	/**
	 * The database table used by the model
	 *
	 * @var string
	 */
	protected $table = "projects";

	/**
	 * The attributes excluded from the model's JSON form
	 *
	 * @var array
	 */
	protected $hidden = ["created_at", "updated_at"];

	/*
	 * One to many to Task(s)
	 */
	public function tasks()
	{
		return $this->hasMany('App\Task');
	}

	/*
	 * One to many relationship to User(s)
	 */
	public function user()
	{
		return $this->belongsTo('App\User');
	}
}
