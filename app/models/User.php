<?php
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class User extends Eloquent {
  use SoftDeletingTrait;

  protected $dates = ['deleted_at'];

  /**
  * The table associated with the model.
  *
  * @var string
  */
  protected $table = 'users';

  /**
  * The attributes excluded from the model's JSON form.
  *
  * @var array
  */
  protected $fillable = array('name');

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
  * Projects Relationship
  *
  * @return Relationship
  */
  public function projects()
  {
    return $this->belongsToMany('Project', 'user_projects');
  }

}
