<div class="row">
  <div class="large-8 columns">
    <h1>projects/index</h1>
  </div>

  <div class="large-4 columns">
    <?= link_to_route('projects.create', 'Create Project', array(), array('class' => 'button small right')); ?>
  </div>
</div>

<ul class="large-block-grid-2">
  <?php foreach($projects as $project) { ?>
    <li>
      <div class="panel">
        <h5><?= link_to_route('project_issues', $project->title, $project->id); ?></h5>
        <p>21 active issues from 34, 84% complete.<br />
          Last activity on January 12, 2015.<br />
          <?= link_to_route('projects.edit', 'Edit &bull;', $project->id); ?></p>
      </div>
    </li>
  <?php } ?>
</ul>
