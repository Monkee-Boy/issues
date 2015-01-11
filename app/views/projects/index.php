<div class="row">
  <div class="large-8 columns">
    <h1>projects/index</h1>
  </div>

  <div class="large-4 columns">
    <?= link_to_route('projects.create', 'Create Project', array(), array('class' => 'button small right')); ?>
  </div>
</div>

<table style="width: 100%;">
  <thead>
    <tr>
      <th>id</th>
      <th>Project</th>
      <th>Actions</th>
    </tr>
  </thead>

  <tbody>
    <?php foreach($projects as $project) { ?>
      <tr>
        <td><?= $project->id; ?></td>
        <td><?= link_to_route('project_issues', $project->title, $project->id); ?></td>
        <td>
          <?= link_to_route('projects.edit', 'Edit &bull;', $project->id); ?>
          <?= link_to_route('project_issues', 'View Issues', $project->id); ?>
        </td>
      </tr>
    <?php } ?>
  </tbody>
</table>
