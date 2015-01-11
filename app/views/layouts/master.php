<!doctype html>
<html class="no-js" lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>mBoy Issues</title>

  <link rel="stylesheet" href="/bower_components/foundation/css/foundation.css">
  <script src="/bower_components/modernizr/modernizr.js"></script>
</head>
<body>
  <nav class="top-bar" data-topbar role="navigation">
    <ul class="title-area">
      <li class="name">
        <h1><?= link_to_route('projects.index', 'mBoy Issues'); ?></h1>
      </li>

      <li class="toggle-topbar menu-icon"><a href="#"><span></span></a></li>
    </ul>

    <section class="top-bar-section">
      <!-- Right Nav Section -->
      <ul class="right">
        <li class="active"><?= link_to_route('projects.index', 'View Projects'); ?></li>
        <li><a href="#">Logout</a></li>
      </ul>
    </section>
  </nav>

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

  <div class="row">
    <div class="large-12 columns">
      <?= $content; ?>
    </div> <!-- /.large-12.columns -->
  </div> <!-- /.row -->

  <script src="/bower_components/jquery/dist/jquery.min.js"></script>
  <script src="/bower_components/foundation/js/foundation.min.js"></script>
  </body>
  </html>
