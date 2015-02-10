<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract {
  use SoftDeletes;
  use Authenticatable, CanResetPassword;

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
    return $this->hasMany('App\Issue');
  }

  /**
  * Projects Relationship
  *
  * @return Relationship
  */
  public function projects()
  {
    return $this->belongsToMany('App\Project', 'user_projects');
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
