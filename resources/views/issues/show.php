<div class="row">
  <div class="large-8 columns">
    <h1><?= $issue->title; ?></h1>
  </div>

  <div class="large-4 columns">
    <?= link_to_route('project_issues', 'View Issues', $project->id, array('class' => 'button small right')); ?>
  </div>
</div>

<div class="row">
  <div class="large-1 columns">
    <img src="https://avatars3.githubusercontent.com/u/23062?v=3&s=96">
  </div>

  <div class="large-11 columns">
    <ul>
      <li><strong>id</strong>: <?= $issue->id; ?></li>
      <li><strong>title</strong>: <?= $issue->title; ?></li>
      <li><strong>content</strong>: <?= $issue->content; ?></li>
      <li><strong>link</strong>: <?= $issue->link; ?></li>
      <li><strong>status</strong>: <?= $issue->status->name; ?></li>
      <li><strong>priority</strong>: <?= $issue->priority->name; ?></li>
      <li><strong>created by</strong>: <?= $issue->createdby->name; ?></li>
      <li><strong>created at</strong>: <?= $issue->created_at; ?></li>
      <li><strong>updated at</strong>: <?= $issue->updated_at; ?></li>
    </ul>
  </div>
</div>
