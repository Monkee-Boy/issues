<?php
class Team extends Eloquent {
  /**
  * The table associated with the model.
  *
  * @var string
  */
  protected $table = 'teams';

  /**
  * The attributes excluded from the model's JSON form.
  *
  * @var array
  */
  protected $fillable = array('name', 'color');

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
