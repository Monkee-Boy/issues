@extends('app')

@section('content')
<div class="row">
  <div class="col s12">
    <h3>Create Project</h3>
  </div>
</div>

<div class="row">
  <?= Form::open(array('route' => 'projects.store', 'class' => 'col s12 m8 l8')) ?>
    <div class="row">
      <div class="input-field col s12">
        <?= Form::text('title'); ?>
        <?= Form::label('title'); ?>
      </div>
    </div>

    <div class="row">
      <div class="input-field col s12">
        <?= Form::text('url'); ?>
        <?= Form::label('url', 'Development URL'); ?>
      </div>
    </div>

    <div class="row">
      <div class="input-field col s12 m6">
        <?= Form::text('designed_by'); ?>
        <?= Form::label('designed_by', 'Designed By'); ?>
      </div>

      <div class="input-field col s12 m6">
        <?= Form::text('developed_by'); ?>
        <?= Form::label('developed_by', 'Developed By'); ?>
      </div>
    </div>

    <div class="row">
      <button class="btn waves-effect waves-light" type="submit" name="action">Create Project</button>
    </div>
  <?= Form::close() ?>
</div> <!-- /.row -->
@endsection
