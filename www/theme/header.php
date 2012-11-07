<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>GitHub Tycoon</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="bootstrap/css/bootstrap-responsive.css" rel="stylesheet">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Fav and touch icons -->
    <link rel="shortcut icon" href="bootstrap/ico/favicon.ico">
  </head>

  <body>
    <div id="wrap">
      <div class="navbar navbar-inverse navbar-fixed-top">
        <div class="navbar-inner">
          <div class="container">
            <a class="brand" href="."><img src="bootstrap/ico/header.png" alt="GitHub Tycoon" /> GitHub Tycoon</a>
            <ul class="nav">
  <?php foreach($header_pages as $rawp => $prettyp){ ?>
              <li><a href="?page=<?php echo $rawp; ?>"><?php echo $prettyp; ?></a></li>
  <?php } ?>
            </ul>
          </div>
        </div>
      </div>

    <!-- <a href="https://github.com/asswb/game-off-2012"><img style="position: absolute; top: 0; right: 0; border: 0; z-index:1030" src="https://s3.amazonaws.com/github/ribbons/forkme_right_darkblue_121621.png" alt="Fork me on GitHub"></a> -->

      <div class="container">
        <div class="row">