<div class="row">
  <div class="large-8 columns">
    <h1>issues/index</h1>
  </div>

  <div class="large-4 columns">
    <?php //link_to_route('issues.create', 'Create Issue', array(), array('class' => 'button small right')); ?>
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
      <td><?= link_to_route('issues.show', $issue->title, $issue->id); ?></td>
      <td><span class="label<?php if($issue->status->name == 'new') { ?> alert<?php } elseif($issue->status->name == 'complete') { ?> success<?php } else { ?> secondary<?php } ?>"><?= $issue->status->name; ?></span></td>
      <td><?= $issue->priority->name; ?></td>
      <td>
        <?php foreach($issue->labels as $label) { ?>
          <?= $label->name; ?>,
        <?php } ?>
      </td>
      <td><?= $issue->user->name; ?></td>
      <td>
        <?= link_to_route('issues.edit', 'Edit &bull;', $issue->id); ?>
        <?= link_to_route('issues.show', 'View', $issue->id); ?>
      </td>
    </tr>
  <?php } ?>
  </tbody>
</table>
