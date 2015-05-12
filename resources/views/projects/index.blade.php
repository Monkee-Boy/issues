@extends('app')

@section('content')
<div class="row">
  <div class="col s6">
    <h3>Your Projects</h3>
  </div>

  <div class="col s6 right-align">
    <a href="/projects/create" class="btn-floating btn-large waves-effect waves-light"><i class="mdi-content-add"></i></a>
  </div>
</div>

<div class="row">
  <?php if(!empty($projects)) { ?>
    <?php foreach($projects as $project) { ?>
      <div class="col s12 m6 l4">
        <div class="card">
          <div class="card-content">
            <span class="card-title black-text"><?= $project->title; ?></span>

            <p>Designed by <?= $project->designed_by; ?>.<br />
              Developed by <?= $project->developed_by; ?>.</p>
            <hr>
            <ul> <!-- TODO: Remove the debug links. Only here for some quick testing. -->
              <li><strong>Debug Links</strong></li>
              <li><?= link_to_route('projects.edit', 'Edit', array($project->id)) ?></li>
              <li>
                <?= Form::open(array('method' => 'DELETE', 'route' => array('projects.destroy', $project->id))) ?>
                  <?= Form::submit('Delete', array('class' => '')) ?>
                <?= Form::close() ?>
              </li>
            </ul>

            <!-- <p>21 active issues from 34, <strong>84% complete</strong>.<br />
            Last activity on April 15, 2015 at 9:24pm.</p> --> <!-- TODO: Pull this info dynamically. -->
          </div>

          <div class="card-action">
            <a href="/projects/<?= $project->id; ?>/issues">View Issues</a>
            <a href='/projects/<?= $project->id; ?>/issues/create'>Submit Issue</a>
          </div>
        </div> <!-- /.card -->
      </div> <!-- /.col -->
    <?php } ?>
  <?php } else { ?>
    <div class="col s12">
      <p>You have no active projects.</p>
    </div>
  <?php } ?>
</div> <!-- /.row -->
@endsection
