@extends('app')

@section('content')
<div class="row">
  <?php if(!empty($projects)) { ?>
    <?php foreach($projects as $project) { ?>
      <div class="col s12 m4 l3">
        <div class="card">
          <div class="card-content">
            <span class="card-title black-text"><?= $project->title; ?></span>

            <p>Designed by <?= $project->designed_by; ?>.<br />
              Developed by <?= $project->developed_by; ?>.</p>
            <hr>
            <p>21 active issues from 34, <strong>84% complete</strong>.<br />
            Last activity on April 15, 2015 at 9:24pm.</p> <!-- TODO: Pull this info dynamically. -->
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
