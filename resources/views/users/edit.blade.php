@extends('app')

@section('content')
<div class="row">
  <div class="col s12">
    <h3>Edit User</h3>
  </div>
</div>

<div class="row">
  <?= Form::model($user, array('route' => array('users.update', $user->id), 'method' => 'put', 'class' => 'col s12 m8 l8')) ?>
    <div class="row">
      <div class="input-field col s12">
        <?= Form::text('name'); ?>
        <?= Form::label('name'); ?>
      </div>
    </div>

    <div class="row">
      <div class="input-field col s12">
        <?= Form::text('email'); ?>
        <?= Form::label('email'); ?>
      </div>
    </div>

    <!-- TODO: Add ability to change password. -->

    <?php if(!empty($teams)) { ?>
      <div class="row">
        <div class="col s12">
          <h5>Select Teams</h5>
          <?php foreach($teams as $team) { ?>
            <p>
              <input type="checkbox" name="teams[]" id="team-<?= $team->id; ?>" value="<?= $team->id; ?>"<?php if(in_array($team->id, $user_team_ids)) { ?> checked<?php } ?>>
              <label for="team-<?= $team->id; ?>"><?= $team->name; ?></label>
            </p>
          <?php } ?>
        </div>
      </div>
    <?php } ?>

    <div class="row">
      <button class="btn waves-effect waves-light" type="submit" name="action">Save User</button>
    </div>
  <?= Form::close() ?>
</div> <!-- /.row -->
@endsection
