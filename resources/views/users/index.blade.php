@extends('app')

@section('content')
<div class="row">
  <div class="col s6">
    <h3>Users</h3>
  </div>

  <div class="col s6 right-align">
    <a href="/users/create" class="btn-floating btn-large waves-effect waves-light"><i class="mdi-content-add"></i></a>
  </div>
</div>

<div class="row">
  <?php if(!empty($users)) { ?>
    <table class="striped col s12">
      <thead>
        <tr>
          <th data-field="name">Name</th>
          <th data-field="email">Email</th>
          <th data-field="teams">Teams</th>
          <th data-field="actions"></th>
        </tr>
      </thead>

      <tbody>
        <?php foreach($users as $user) { ?>
          <tr>
            <td><?= $user->name; ?></td>
            <td><?= $user->email; ?></td>
            <td></td>
            <td><?= link_to_route('users.edit', 'Edit User', array($user->id)) ?></td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
  <?php } else { ?>
    <div class="col s12">
      <p>There are currently no users.</p>
    </div>
  <?php } ?>
</div> <!-- /.row -->
@endsection
