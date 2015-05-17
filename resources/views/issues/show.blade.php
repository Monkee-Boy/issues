@extends('app')

@section('content')
<div class="row">
  <div class="col s10">
      <h5><?= $issue->project->title; ?><?php if(!empty($issue->project->url)) { ?> &raquo; <small><a href="<?= $issue->project->url; ?>"><?= $issue->project->url; ?></a></small><?php } ?></h5>

      <h3><small class="grey-text">#<?= $issue->id; ?></small> <?= $issue->title; ?></h3>
  </div>

  <div class="col s2 right-align">
    <a href="/projects/<?= $issue->project->id; ?>/issues/create" class="btn-floating btn-large waves-effect waves-light"><i class="mdi-content-add"></i></a>
  </div>
</div>

<div class="row">
  <div class="col s12">
    <div class="card-panel">
      <?= $issue->content; ?>
      </span>
    </div>
  </div>
</div>

<?php if(!empty($issue->activity)) { ?>
  <div class="row">
    <div class="col s12">
      <ul class="collection issue-activity">
        <?php foreach($issue->activity as $activity): ?>
          <?php if($activity->type === 'comment') { ?>
            <li class="collection-item avatar activity-comment">
              <i class="mdi-communication-comment circle teal"></i>
              <span class="title"><strong><?= $activity->user->name; ?></strong> commented <?= $activity->created_at_formatted; ?></span>

              <?= $activity->data; ?>
            </li>
          <?php } elseif($activity->type === 'status') { ?>
            <li class="collection-item avatar activity-status">
              <i class="mdi-action-info circle grey darken-2"></i>
              <p><strong><?= $activity->user->name; ?></strong> changed status to <strong><?= $activity->status->name; ?></strong> <?= $activity->created_at_formatted; ?></p>
            </li>
          <?php } elseif($activity->type === 'priority') { ?>
            <li class="collection-item avatar activity-priority">
              <i class="mdi-action-info circle grey darken-2"></i>
              <p><strong><?= $activity->user->name; ?></strong> changed priority to <strong><?= $activity->priority->name; ?></strong> <?= $activity->created_at_formatted; ?></p>
            </li>
          <?php } elseif($activity->type === 'assignment') { ?>
            <li class="collection-item avatar activity-assignment">
              <i class="mdi-action-account-child circle grey darken-2"></i>
              <?php if($activity->user->id === $activity->assignment->id) { ?>
                <p><strong><?= $activity->user->name; ?></strong> self-assigned this <?= $activity->created_at_formatted; ?></p>
              <?php } else { ?>
                <p><strong><?= $activity->user->name; ?></strong> assigned this to <strong><?= $activity->assignment->name; ?></strong> <?= $activity->created_at_formatted; ?></p>
              <?php } ?>
            </li>
          <?php } ?>
        <?php endforeach; ?>
       </ul>
    </div>
  </div>
<?php } ?>

<div class="row">
  <div class="col s12">
    <?php echo '<pre>'; print_r($issue); echo '</pre>'; ?>
  </div>
</div> <!-- /.row -->
@endsection
