@extends('app')

@section('content')
<div class="row">
  <div class="col s10">
      <h5><?= $issue->project->title; ?><?php if(!empty($issue->project->url)) { ?> &raquo; <small><a href="<?= $issue->project->url; ?>"><?= $issue->project->url; ?></a></small><?php } ?></h5>

      <h3><small class="grey-text">#<?= $issue->id; ?></small> <?= $issue->title; ?></h3>
      <p><span class="issue-status" style="background-color: <?= $issue->status->color; ?>;"><?= $issue->status->name; ?></span> <strong><?= $issue->createdby->name; ?></strong> opened this issue <?= $issue->created_at_formatted; ?> &bull; <?= $issue->comment_count; ?> comment<?php if($issue->comment_count !== 1) { ?>s<?php } ?></p>
  </div>

  <div class="col s2 right-align">
    <a href="/projects/<?= $issue->project->id; ?>/issues/create" title="Create Issue" class="btn-floating btn-large waves-effect waves-light"><i class="mdi-content-add"></i></a>
  </div>
</div>

<div class="row">
  <div class="col s8">
    <div class="row">
      <div class="card-panel">
        <?= $issue->content; ?>
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
        <div class="input-field">
          <?= Form::textarea('comment', '', array('class' => 'materialize-textarea')); ?>
          <?= Form::label('comment', 'Leave a comment'); ?>
        </div>
      </div>
    </div>
  </div> <!-- /.col.s8 -->

  <div class="col s4">
    <div class="row">
      <div class="col s12">
        <div class="input-field-off"> <!-- TODO: Hook up reassign issue dropdown. -->
          <?= Form::label('assignedto', 'Reassign this issue'); ?>
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
      </div> <!-- /.col-s12 -->
    </div> <!-- /.row -->

    <div class="row">
      <div class="col s12">
        <?php if(!empty($priorities)) { ?>
          <div class="input-field-off">
            <?= Form::label('priority_id', 'Priority'); ?>
            <select name="priority_id" id="priority_id" class="browser-default">
              <?php foreach($priorities as $priority) { ?>
                <option value="<?= $priority->id; ?>"<?php if($issue->priority->id === $priority->id) { ?> selected<?php } ?>><?= $priority->name; ?></option>
              <?php } ?>
            </select>
          </div>
        <?php } ?>
      </div>
    </div> <!-- /.row -->

    <div class="row">
      <div class="col s12">
        <?php if(!empty($statuses)) { ?>
          <div class="input-field-off">
            <?= Form::label('status_id', 'Status'); ?>
            <select name="status_id" id="status_id" class="browser-default">
              <?php foreach($statuses as $status) { ?>
                <option value="<?= $status->id; ?>"<?php if($issue->status->id === $status->id) { ?> selected<?php } ?>><?= $status->name; ?></option>
              <?php } ?>
            </select>
          </div>
        <?php } ?>
      </div>
    </div> <!-- /.row -->
  </div> <!-- /.col.s4 -->
</div>
@endsection
