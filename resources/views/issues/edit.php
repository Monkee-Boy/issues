<div class="row">
  <div class="large-8 columns">
    <h1>issues/edit</h1>
  </div>

  <div class="large-4 columns">
    <?= link_to_route('project_issues', 'View Issues', $project->id, array('class' => 'button small right')); ?>
  </div>
</div>

<?php if($errors->all()) { ?>
  <div class="row">
    <div class="large-12 columns">
      <?= HTML::ul($errors->all()); ?>
    </div>
  </div>
<?php } ?>

<?= Form::model($issue, array('route' => array('issues.update', $issue->id), 'method' => 'PUT')); ?>
  <?= '<p>'.Form::label('title', 'Title'); ?>
  <?= Form::text('title').'</p>'; ?>

  <?= '<p>'.Form::label('content', 'Content'); ?>
  <?= Form::textarea('content').'</p>'; ?>

  <?= '<p>'.Form::label('link', 'Link'); ?>
  <?= Form::text('link').'</p>'; ?>

  <?= '<p>'.Form::label('status_id', 'Status'); ?>
  <?= Form::select('status_id', $statuses, $issue->status->id).'</p>'; ?>

  <?= '<p>'.Form::label('priority_id', 'Priority'); ?>
  <?= Form::select('priority_id', $priorities, $issue->priority->id).'</p>'; ?>

  <?= '<p>'.Form::submit('Save Issue', array('class' => 'button tiny')).'</p>'; ?>
<?= Form::close(); ?>
