<!doctype html>
<html class="no-js" lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>mBoy Issues</title>

  <link rel="stylesheet" href="/css/app<?php if(!$app->environment('local', 'dev', 'staging')) { ?>.min<?php } ?>.css">
  <script src="/js/modernizr.min.js"></script>
</head>
<body>
  <div class="row">
    <nav>
      <div class="nav-wrapper container">
        <div class="col s12">
          <a href="#" class="brand-logo waves-effect waves-light"><img src="/images/logo.svg" style="height: 65px; vertical-align: middle;"></a>

          <?php if(Auth::check()) { ?>
            <ul class="right hide-on-med-and-down">
              <li><a href="#" title="Notifications" class="waves-effect waves-light"><i class="mdi-action-announcement"></i></a></li>
              <li><a href="/projects" title="View All Projects" class="waves-effect waves-light"><i class="mdi-action-view-list"></i></a></li>
              <li><a class="dropdown-button waves-effect waves-light" href="#" data-activates="user-dropdown"><?= Auth::user()->email; ?><i class="mdi-navigation-arrow-drop-down right"></i></a></li>
            </ul>

            <!-- Dropdown Structure -->
            <ul id="user-dropdown" class="dropdown-content">
              <li><?= link_to_route('users.edit', 'Edit Profile', array(Auth::user()->id)) ?></li>
              <li class="divider"></li>
              <li><a href="/auth/logout">Log Out</a></li>
            </ul>
          <?php } ?>
        </div>
      </div>
    </nav>
  </div> <!-- /.row -->

  <div class="container">
    <?php if(Session::has('message')) { ?>
      <div class="row">
        <div class="large-12 columns">
          <div data-alert class="alert-box">
            <?= Session::get('message'); ?>
            <a href="#" class="close">&times;</a>
          </div>
        </div>
      </div>
    <?php } ?>

    <?php if(!empty($errors->all())): ?> <!-- TODO: Figure out a better display for errors. -->
      <div class="row">
        <div class="large-12 columns">
          <ul>
            <?php foreach($errors->all() as $error): ?>
              <li class="error">{{ $error }}</li>
            <?php endforeach; ?>
          </ul>
        </div>
      </div>
    <?php endif; ?>

    @yield('content')
  </div> <!-- /.container -->

  <div class="row">
    <footer class="page-footer" style="padding-top: 0;">
      <div class="footer-copyright container">
        <div class="col s12">
          &copy; <?= date('Y'); ?> Monkee-Boy Web Design, Inc
          <a class="grey-text text-lighten-4 waves-effect waves-light right" href="https://github.com/Monkee-Boy/issues/issues">Submit a mBoy Issues Bug</a>
        </div>
      </div>
    </footer>
  </div> <!-- /.row -->

  <script src="//code.jquery.com/jquery-2.1.4.min.js"></script>
  <script src="/js/app<?php if(!$app->environment('local', 'dev', 'staging')) { ?>.min<?php } ?>.js"></script>
</body>
</html>
