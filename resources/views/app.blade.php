<!doctype html>
<html class="no-js" lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>mBoy Issues</title>

  <link rel="stylesheet" href="/css/app.min.css">
  <script src="/js/modernizr.min.js"></script>
</head>
<body>
  <div class="row">
    <nav>
      <div class="nav-wrapper">
        <div class="col s12">
          <a href="#" class="brand-logo waves-effect waves-light"><img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/93/mboy-new-monkeehead.png" style="height: 50px; vertical-align: middle;"> mBoy Issues</a>

          <ul id="nav-mobile" class="right hide-on-med-and-down">
            <li><a href="#" title="Notifications" class="waves-effect waves-light"><i class="mdi-action-announcement"></i></a></li>
            <li><a href="/projects" title="View All Projects" class="waves-effect waves-light"><i class="mdi-action-view-list"></i></a></li>
            <li><a class="dropdown-button waves-effect waves-light" href="#" data-activates="user-dropdown"><?= Auth::user()->email; ?><i class="mdi-navigation-arrow-drop-down right"></i></a></li>
          </ul>

          <!-- Dropdown Structure -->
          <ul id="user-dropdown" class="dropdown-content">
            <li><a href="#">Edit Profile</a></li>
            <li class="divider"></li>
            <li><a href="/logout">Log Out</a></li>
          </ul>
        </div>
      </div>
    </nav>
  </div> <!-- /.row -->

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

  @yield('content')

  <div class="row">
    <footer class="page-footer" style="padding-top: 0;">
      <div class="footer-copyright">
        <div class="col s12">
          &copy; <?= date('Y'); ?> Monkee-Boy Web Design, Inc
          <a class="grey-text text-lighten-4 waves-effect waves-light right" href="https://github.com/Monkee-Boy/issues/issues">Submit a mBoy Issues Bug</a>
        </div>
      </div>
    </footer>
  </div> <!-- /.row -->

  <script src="//code.jquery.com/jquery-2.1.4.min.js"></script>
  <script src="/js/materialize.min.js"></script>
</body>
</html>
