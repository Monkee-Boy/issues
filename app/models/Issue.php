<?php

class Issue extends Eloquent {

  /**
  * The table associated with the model.
  *
  * @var string
  */
  protected $table = 'issues';

  /**
  * The attributes excluded from the model's JSON form.
  *
  * @var array
  */
  protected $fillable = array('title');

}
