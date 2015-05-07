<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model {
	use SoftDeletes;

  protected $dates = ['deleted_at'];

	/**
  * Users Relationship
  *
  * @return Relationship
  */
  public function users()
  {
    return $this->belongsToMany('User', 'user_projects');
  }
}
