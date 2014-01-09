<!DOCTYPE html>
<html lang="<?php echo LANG; ?>">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php echo PAGE_DESC; ?>">
    <meta name="author" content="TuaTim">
    <link rel="shortcut icon" href="assets/ico/favicon.png">

    <title><?php echo PAGE_NAME; ?></title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">

  </head>

  <body>

    <div class="container">

      <!-- Static navbar -->
      <div class="navbar navbar-default" role="navigation">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
          </button>
          <a class="navbar-brand" href="index.php?p=index"><?php echo PAGE_NAME; ?></a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li><a href="index.php?p=index"><?php echo NAV_INDEX; ?></a></li>
            <li><a href="index.php?p=add"><?php echo NAV_ADD; ?></a></li>
            <?
            if($user[$_SESSION["user"]]["permission"] == "-1") {
              ?>
              <li><a href="index.php?p=userlist"><?php echo NAV_ADMIN_USER; ?></a></li>
              <?php
            }
            ?>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
