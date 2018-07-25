<?php
  isset($pageTitle) ? $pageTitle : '';
  isset($pageSubtitle) ? $pageSubtitle : '';
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Area | <?php echo $pageTitle; ?></title>
    <!-- Bootstrap core CSS -->
    <link href="<?php echo WWW_ROOT . '/css/bootstrap.min.css'; ?>" rel="stylesheet">
    <link href="<?php echo WWW_ROOT . '/css/style.css'; ?>" rel="stylesheet">
    
  </head>
  <body>
    <nav class="navbar navbar-default">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        <a class="navbar-brand" href="<?php echo WWW_ROOT; ?>">Arbor TM Database</a>
      </div>
      <div id="navbar" class="collapse navbar-collapse">
        <ul class="nav navbar-nav">
          <li><a href="<?php echo WWW_ROOT . '/agendas'; ?>">Agendas</a></li>
          <li><a href="<?php echo WWW_ROOT . '/members'; ?>">Members</a></li>
          <li><a href="<?php echo WWW_ROOT . '/admins'; ?>">Administrators</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li><a href="<?php echo WWW_ROOT . '/admins/show.php?admin_id=' . htmlspecialchars(urlencode($_SESSION['admin_id'])); ?>">Welcome, <?php echo $_SESSION['username']; ?></a></li>
          <li><a href="<?php echo WWW_ROOT . '/logout.php'; ?>">Logout</a></li>

        </ul>
      </div>
    </div>
    </nav>

    <header id="header">
    <div class="container">
      <div class="row">

      </div>
      <div class="col-md-10">
        <h1><span class="fas fa-database"> </span> <?php echo $pageTitle; ?> <small><?php echo $pageSubtitle; ?></small></h1>
      </div>
      <div class="col-md-2">
        <div class="dropdown create">
          <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
            Create Content
            <span class="caret"></span>
          </button>
          <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
            <li><a href="<?php echo WWW_ROOT . '/agendas/new.php'; ?>">Add Agenda</a></li>
            <li><a href="<?php echo WWW_ROOT . '/members/new.php'; ?>">Add Member</a></li>
            <li><a href="<?php echo WWW_ROOT . '/admins/new.php'; ?>">Add Administrator</a></li>
          </ul>
        </div>
      </div>
    </div>
    </header>
