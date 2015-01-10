<?php

class Priority extends Eloquent {

  /**
  * The table associated with the model.
  *
  * @var string
  */
  protected $table = 'priorities';

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

}
