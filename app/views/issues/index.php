<div class="row">
  <div class="large-8 columns">
    <h1><?= $project->title; ?></h1>
  </div>

  <div class="large-4 columns">
    <ul class="button-group right">
      <li><?= link_to_route('project_issues_create', 'Create Issue', $project->id, array('class' => 'button small')); ?></li>
    </ul>
  </div>
</div>

<table style="width: 100%;">
  <thead>
    <tr>
      <th>id</th>
      <th>Issue</th>
      <th>Status</th>
      <th>Priority</th>
      <th>Labels</th>
      <th>Created By</th>
      <th>Actions</th>
    </tr>
  </thead>

  <tbody>
  <?php foreach($issues as $issue) { ?>
    <tr>
      <td><?= $issue->id; ?></td>
      <td><?= link_to_route('project_issues_show', $issue->title, array('project_id' => $project->id, 'issue_id' => $issue->id)); ?></td>
      <td><span class="label<?php if($issue->status->name == 'new') { ?> alert<?php } elseif($issue->status->name == 'complete') { ?> success<?php } else { ?> secondary<?php } ?>"><?= $issue->status->name; ?></span></td>
      <td><?= $issue->priority->name; ?></td>
      <td>
        <?php foreach($issue->labels as $label) { ?>
          <?= $label->name; ?>,
        <?php } ?>
      </td>
      <td><?= $issue->createdby->name; ?></td>
      <td>
        <?= link_to_route('project_issues_show', 'View', array('project_id' => $project->id, 'issue_id' => $issue->id)); ?>
      </td>
    </tr>
  <?php } ?>
  </tbody>
</table>
