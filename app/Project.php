<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;

class Project extends Model implements SluggableInterface {
	use SoftDeletes;

  protected $dates = ['deleted_at'];

	use SluggableTrait;

  protected $sluggable = array(
		'build_from' => 'title',
		'save_to'    => 'slug',
  );

	/**
  * Users Relationship
  *
  * @return Relationship
  */
  public function users()
  {
    return $this->belongsToMany('App\User', 'user_projects');
  }
}
