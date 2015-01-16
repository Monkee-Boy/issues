<div class="row">
  <div class="large-8 columns">
    <h1>issues/create</h1>
  </div>

  <div class="large-4 columns">
    <?= link_to_route('project_issues', 'View Issues', array('project_id' => $project->id), array('class' => 'button small right')); ?>
  </div>
</div>

<?php if($errors->all()) { ?>
  <div class="row">
    <div class="large-12 columns">
      <?= HTML::ul($errors->all()); ?>
    </div>
  </div>
<?php } ?>

<?= Form::open(array('route' => array('issues.store'))); ?>
  <?= Form::hidden('project_id', $project->id); ?>

  <?= '<p>'.Form::label('title', 'Title'); ?>
  <?= Form::text('title').'</p>'; ?>

  <?= '<p>'.Form::label('content', 'Content'); ?>
  <?= Form::textarea('content').'</p>'; ?>

  <?= '<p>'.Form::label('link', 'Link'); ?>
  <?= Form::text('link').'</p>'; ?>

  <?= '<p>'.Form::label('priority_id', 'Priority'); ?>
  <?= Form::select('priority_id', $priorities, 'normal').'</p>'; ?>

  <?= '<p>'.Form::submit('Create Issue', array('class' => 'button tiny')).'</p>'; ?>
<?= Form::close(); ?>
