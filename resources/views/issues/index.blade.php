@extends('app')

@section('content')
<div class="row">
  <div class="col s6">
    <h3><?= $project->title; ?> Issues</h3>
  </div>

  <div class="col s6 right-align">
    <a href="/projects/<?= $project->id; ?>/issues/create" class="btn-floating btn-large waves-effect waves-light"><i class="mdi-content-add"></i></a>
  </div>
</div>

<div class="row">
  <?php if(!$project->issues->isEmpty()) { ?>
    <table class="striped col s12">
      <thead>
        <tr>
          <th data-field="id">ID</th>
          <th data-field="name">Title</th>
          <th data-field="date">Date Opened</th>
          <th data-field="opened_by">Opened by</th>
          <th data-field="assigned_to">Assigned to</th>
          <th data-field="status">Status</th>
          <th data-field="priority">Priority</th>
          <th data-field="actions"></th>
        </tr>
      </thead>

      <tbody>
        <?php foreach($project->issues as $issue) { ?>
          <tr>
            <td><?= $issue->id; ?></td>
            <td><?= $issue->title; ?></td>
            <td><?= $issue->created_at; ?></td>
            <td><?= $issue->createdby->name; ?></td>
            <td><?= $issue->assignedto->name; ?></td>
            <td><?= $issue->status->name; ?></td>
            <td><?= $issue->priority->name; ?></td>
            <td><?= link_to_route('project_issues_show', 'View Issue', array($project->id, $issue->id)) ?></td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
  <?php } else { ?>
    <div class="col s12">
      <p>You have no active issues on this project.</p>
    </div>
  <?php } ?>
</div> <!-- /.row -->
@endsection
