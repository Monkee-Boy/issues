<?php
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class User extends Eloquent implements UserInterface, RemindableInterface {
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
  protected $hidden = array('password', 'remember_token');

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

  public function getAuthIdentifier()
  {
    return $this->getKey();
  }

  public function getAuthPassword()
  {
    return $this->password;
  }

  public function getRememberToken()
  {
    return $this->remember_token;
  }

  public function setRememberToken($value)
  {
    $this->remember_token = $value;
  }

  public function getRememberTokenName()
  {
    return "remember_token";
  }
  
  public function getReminderEmail()
  {
    return $this->email;
  }

}
