@extends('app')

@section('content')
<div class="row">
  <div class="col s10">
      <h5><?= $issue->project->title; ?><?php if(!empty($issue->project->url)) { ?> &raquo; <small><a href="<?= $issue->project->url; ?>"><?= $issue->project->url; ?></a></small><?php } ?></h5>

      <h3><small class="grey-text">#<?= $issue->id; ?></small> <?= $issue->title; ?></h3>
  </div>

  <div class="col s2 right-align">
    <a href="/projects/<?= $issue->project->id; ?>/issues/create" class="btn-floating btn-large waves-effect waves-light"><i class="mdi-content-add"></i></a>
  </div>
</div>

<div class="row">
  <div class="col s12">
    <div class="card-panel">
      <?= $issue->content; ?>
      </span>
    </div>
  </div>
</div>

<div class="row">
  <div class="col s12">

    <?php echo '<pre>'; print_r($issue); echo '</pre>'; ?>
  </div>
</div> <!-- /.row -->
@endsection
