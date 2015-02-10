<?php if($errors->all()) { ?>
  <div class="row">
    <div class="large-5 large-centered columns">
      <?= HTML::ul($errors->all()); ?>
    </div>
  </div>
<?php } ?>

<div class="row">
  <div class="large-5 large-centered columns">
    <h1>/login</h1>

    <?= Form::open(); ?>
      <?= '<p>'.Form::label("username", "Username"); ?>
      <?= Form::text("username").'</p>'; ?>

      <?= '<p>'.Form::label("password", "Password"); ?>
      <?= Form::password("password").'</p>'; ?>

      <?= '<p>'.Form::submit('Login', array('class' => 'button right')).'</p>'; ?>
    <?= Form::close(); ?>
  </div>
</div>
