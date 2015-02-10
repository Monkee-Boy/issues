<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Priority extends Model {
  use SoftDeletes;

  protected $dates = ['deleted_at'];

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
