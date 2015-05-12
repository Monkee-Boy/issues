@extends('app')

@section('content')
<div class="row">
  <div class="col s12">
    <h3>Create Team</h3>
  </div>
</div>

<div class="row">
  <?= Form::open(array('route' => 'teams.store', 'class' => 'col s12 m8 l8')) ?>
    <div class="row">
      <div class="input-field col s12">
        <?= Form::text('name'); ?>
        <?= Form::label('name'); ?>
      </div>
    </div>

    <div class="row">
      <div class="input-field col s12">
        <?= Form::text('color'); ?>
        <?= Form::label('color', 'Color (HEX Value)'); ?>
      </div>
    </div>

    <div class="row">
      <button class="btn waves-effect waves-light" type="submit" name="action">Create Team</button>
    </div>
  <?= Form::close() ?>
</div> <!-- /.row -->
@endsection
