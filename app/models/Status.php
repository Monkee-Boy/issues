<?php
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Status extends Eloquent {
  use SoftDeletingTrait;

  protected $dates = ['deleted_at'];

  /**
  * The table associated with the model.
  *
  * @var string
  */
  protected $table = 'statuses';

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
