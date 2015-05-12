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
    <?php foreach($teams as $team) { ?>
      <div class="col s12 m6 l4">
        <div class="card">
          <div class="card-content">
            <span class="card-title black-text"><?= $team->name; ?></span>
          </div>

          <div class="card-action">
            <?= link_to_route('teams.edit', 'Edit Team', array($team->id)) ?>
          </div>
        </div> <!-- /.card -->
      </div> <!-- /.col -->
    <?php } ?>
  <?php } else { ?>
    <div class="col s12">
      <p>There are currently no teams.</p>
    </div>
  <?php } ?>
</div> <!-- /.row -->
@endsection
