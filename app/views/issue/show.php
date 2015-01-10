<div class="row">
  <div class="large-8 columns">
    <h1>issues/show</h1>
  </div>

  <div class="large-4 columns">
    <?= link_to_route('issues.index', 'View Issues', array(), array('class' => 'button small right')); ?>
  </div>
</div>

<ul>
  <li><strong>id</strong>: <?= $issue->id; ?></li>
  <li><strong>title</strong>: <?= $issue->title; ?></li>
  <li><strong>content</strong>: <?= $issue->content; ?></li>
  <li><strong>link</strong>: <?= $issue->link; ?></li>
  <li><strong>status</strong>: <?= $issue->status->name; ?></li>
  <li><strong>priority</strong>: <?= $issue->priority->name; ?></li>
  <li><strong>created by</strong>: <?= $issue->user->name; ?></li>
  <li><strong>created at</strong>: <?= $issue->created_at; ?></li>
  <li><strong>updated at</strong>: <?= $issue->updated_at; ?></li>
</ul>
