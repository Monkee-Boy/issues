<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model {

	/**
  * Users Relationship
  *
  * @return Relationship
  */
  public function users()
  {
    return $this->belongsToMany('App\User', 'user_teams');
  }

}
