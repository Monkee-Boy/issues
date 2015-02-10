<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Issue extends Model {
  use SoftDeletes;

  protected $dates = ['deleted_at'];

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
  * Project relationship
  *
  * @return Relationship
  */
  public function project()
  {
    return $this->belongsTo('Project');
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
  public function createdby()
  {
    return $this->belongsTo('User', 'created_by');
  }

}
