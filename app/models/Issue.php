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

  /**
  * Labels Relationship
  *
  * @return Relationship
  */
  public function labels()
  {
    return $this->belongsToMany('Label');
  }

  /**
  * Status relationship
  *
  * @return Relationship
  */
  public function status()
  {
    return $this->belongsTo('Status');
  }

  /**
  * Priority relationship
  *
  * @return Relationship
  */
  public function priority()
  {
    return $this->belongsTo('Priority');
  }

  /**
  * User relationship
  *
  * @return Relationship
  */
  public function user()
  {
    return $this->belongsTo('User', 'created_by');
  }

}
