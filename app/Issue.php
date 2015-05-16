<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Issue extends Model {

	/**
  * Project Relationship
  *
  * @return Relationship
  */
  public function project()
  {
    return $this->belongsTo('App\Project');
  }

	/**
  * Status Relationship
  *
  * @return Relationship
  */
  public function status()
  {
    return $this->belongsTo('App\Status');
  }

	/**
  * Priority Relationship
  *
  * @return Relationship
  */
  public function priority()
  {
    return $this->belongsTo('App\Priority');
  }

  /**
  * User relationship
  *
  * @return Relationship
  */
  public function createdby()
  {
    return $this->belongsTo('App\User', 'createdby_id');
  }

  /**
  * User relationship
  *
  * @return Relationship
  */
  public function assignedto()
  {
    return $this->belongsTo('App\User', 'assignedto_id');
  }

}
