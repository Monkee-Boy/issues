@extends('app')

@section('content')
<div class="row">
  <div class="col s6">
    <h3>Teams</h3>
  </div>

  <div class="col s6 right-align">
    <a href="/teams/create" class="btn-floating btn-large waves-effect waves-light"><i class="mdi-content-add"></i></a>
  </div>
</div>

<div class="row">
  <?php if(!empty($teams)) { ?>
    <table class="striped col s12">
      <thead>
        <tr>
          <th data-field="name">Name</th>
          <th data-field="email">Color</th>
          <th data-field="actions"></th>
        </tr>
      </thead>

      <tbody>
        <?php foreach($teams as $team) { ?>
          <tr>
            <td><?= $team->name; ?></td>
            <td><?= $team->color; ?></td>
            <td><?= link_to_route('teams.edit', 'Edit Team', array($team->id)) ?></td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
  <?php } else { ?>
    <div class="col s12">
      <p>There are currently no teams.</p>
    </div>
  <?php } ?>
</div> <!-- /.row -->
@endsection
