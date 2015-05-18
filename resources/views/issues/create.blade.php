@extends('app')

@section('content')
<div class="row">
  <div class="col s12">
    <h3><?= $project->title; ?> - Create Issue</h3>
  </div>
</div>

<div class="row">
  <?= Form::open(array('route' => 'issues.store', 'class' => 'col s12 m10')) ?>
    <?= Form::hidden('project_id', $project->id); ?>
    <?= Form::hidden('createdby_id', Auth::user()->id); ?>

    <div class="row">
      <div class="col s12">
        <p>Please be as descriptive as possible with your details. Try to include an example link, what browser and OS you are using, and steps to recreate the issue if needed. A screenshot of the issue is extremely helpful.</p>
      </div>
    </div>

    <div class="row">
      <div class="col s12 m8">
        <div class="row">
          <div class="input-field col s12">
            <?= Form::text('title'); ?>
            <?= Form::label('title'); ?>
          </div>
        </div>

        <div class="row">
          <div class="input-field col s12">
            <?= Form::textarea('content', '', array('class' => 'materialize-textarea')); ?>
            <?= Form::label('content', 'Description'); ?>
          </div>
        </div>

        <div class="row">
          <div class="input-field col s12">
            <?= Form::text('link'); ?>
            <?= Form::label('link', 'Please provide a link where we can see this issue.'); ?>
          </div>
        </div>
      </div> <!-- /.col.s12.m8 -->

      <div class="col s12 m4">
        <?php if(!empty($priorities)) { ?>
          <div class="row">
            <div class="input-field col s12">
              <select name="priority_id" id="priority_id">
                <?php foreach($priorities as $priority) { ?>
                  <option value="<?= $priority->id; ?>"><?= $priority->name; ?></option>
                <?php } ?>
              </select>
              <?= Form::label('priority_id', 'Priority'); ?>
            </div>
          </div>
        <?php } ?>

        <?php if(!empty($statuses)) { ?>
          <div class="row">
            <div class="input-field col s12">
              <select name="status_id" id="status_id" disabled>
                <option value="0">New</option>
              </select>
              <?= Form::label('status_id', 'Status'); ?>
            </div>
          </div>
        <?php } ?>

        <?php if(!empty($users)) { ?>
          <div class="row">
            <div class="input-field-off col s12">
              <?= Form::label('assignedto', 'Assign To'); ?>
              <select name="assignedto" id="assignedto" class="browser-default">
                <optgroup label="Teams">
                  <?php foreach($teams as $team) { ?>
                    <option value="team-<?= $team->id; ?>"><?= $team->name; ?></option>
                  <?php } ?>
                </optgroup>

                <optgroup label="Users">
                  <?php foreach($users as $user) { ?>
                    <option value="user-<?= $user->id; ?>"><?= $user->name; ?></option>
                  <?php } ?>
                </optgroup>
              </select>
            </div>
          </div>
        <?php } ?>
      </div> <!-- /.col.s12.m8 -->
    </div> <!-- /.row -->

    <div class="row">
      <button class="btn waves-effect waves-light" type="submit" name="action">Create Issue</button>
    </div>
  <?= Form::close() ?>
</div> <!-- /.row -->
@endsection
