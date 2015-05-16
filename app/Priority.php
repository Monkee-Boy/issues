<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Priority extends Model {

	/**
  * Issues Relationship
  *
  * @return Relationship
  */
  public function issues()
  {
    return $this->hasMany('App\Issue');
  }

}
