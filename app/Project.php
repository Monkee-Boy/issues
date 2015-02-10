<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model {
  use SoftDeletes;

  protected $dates = ['deleted_at'];

  /**
  * The table associated with the model.
  *
  * @var string
  */
  protected $table = 'projects';

  /**
  * The attributes excluded from the model's JSON form.
  *
  * @var array
  */
  protected $fillable = array('title');

  /**
  * Issues Relationship
  *
  * @return Relationship
  */
  public function issues()
  {
    return $this->hasMany('Issue');
  }

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
