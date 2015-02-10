<div class="row">
  <div class="large-8 columns">
    <h1>projects/edit</h1>
  </div>

  <div class="large-4 columns">
    <?= link_to_route('projects.index', 'View Projects', array(), array('class' => 'button small right')); ?>
  </div>
</div>

<?php if($errors->all()) { ?>
  <div class="row">
    <div class="large-12 columns">
      <?= HTML::ul($errors->all()); ?>
    </div>
  </div>
<?php } ?>

<?= Form::model($project, array('route' => array('projects.update', $project->id), 'method' => 'PUT')); ?>
  <?= '<p>'.Form::label('title', 'Title'); ?>
  <?= Form::text('title').'</p>'; ?>

  <?= '<p>'.Form::submit('Save Project', array('class' => 'button tiny')).'</p>'; ?>
<?= Form::close(); ?>
