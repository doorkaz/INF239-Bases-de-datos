<!doctype html>
<?php
	session_start();
	if(!ISSET($_SESSION['Correo'])){
		header('location:login.php');
	}
?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <!-- Always force latest IE rendering engine or request Chrome Frame -->
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Use title if it's in the page YAML frontmatter -->
    <title>Tarea</title>

    <meta name="description" content="XAMPP is an easy to install Apache distribution containing MariaDB, PHP and Perl." />
    <meta name="keywords" content="xampp, apache, php, perl, mariadb, open source distribution" />

    <link href="/dashboard/stylesheets/normalize.css" rel="stylesheet" type="text/css" /><link href="/dashboard/stylesheets/all.css" rel="stylesheet" type="text/css" />
    <link href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/3.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />

    <script src="/dashboard/javascripts/modernizr.js" type="text/javascript"></script>


    <link href="/dashboard/images/favicon.png" rel="icon" type="image/png" />


  </head>

  <body class="index">
  
    <header class="header contain-to-grid">
      <nav class="top-bar" data-topbar>
        <ul class="title-area">
          <li class="name">
            <h1><a href="/mitarea/index.html">Index</a></h1>
          </li>
          <li class="toggle-topbar menu-icon">
            <a href="#">
              <span>Menu</span>
            </a>
          </li>
        </ul>

        <section class="top-bar-section">
          <!-- Left Nav Section -->
          <ul class="left">
              <li class="item "><a href="/mitarea/index.html">FAQs</a></li>
              <li class="item "><a href="/mitarea/index.html">HOW-TO Guides</a></li>
              <li class="item "><a target="_blank" href="/dashboard/phpinfo.php">PHPInfo</a></li>
              <li class="item "><a href="/mitarea/index.html">phpMyAdmin</a></li>
          </ul>
          <ul class="right">
            <li class="item "><a href="/mitarea/PHP/cuenta.php"><?=$_SESSION['Nombre']?></a></li>>
          </ul>
        </section>
      </nav>
    </header>

    <div class="wrapper">
      <div class="hero">
  <div class="row">
    <div class="large-12 columns">
      <img src="/mitarea/images/logo.png"   
        width="1000" 
        height="500" />
      <h1>
        XAMPP <span>Apache + MariaDB + PHP + Perl</span></h1>
    </div>
    
  </div>
</div>
<div class="row">
  <div class="large-12 columns">
    <h2>Welcome to XAMPP for Windows 8.2.4</h2>
  </div>
</div>
<div class="row">
  <div class="large-12 columns">
    <p>
      Ho
    </p>
    <p>
      XAMPP is meant only for development purposes. It has certain configuration settings that make it easy to develop locally but that are insecure if you want to have your installation accessible to others.
    </p>
    <p>
      Start the XAMPP Control Panel to check the server status.
    </p>
  </div>
</div>
<div class="row">
  <div class="large-12 columns">
    <h3>Community</h3>
  </div>
</div>
<div class="row">
  <div class="large-12 columns">
    <p>
      XAMPP has been around for more than 10 years &ndash; there is a huge community behind it. You can get involved by joining our <a href="https://community.apachefriends.org">Forums</a>, liking us on <a href="https://www.facebook.com/we.are.xampp">Facebook</a>, or following our exploits on <a href="https://twitter.com/apachefriends">Twitter</a>.
    </p>
  </div>
</div>


    </div>

    <footer class="footer row">
    </footer>

    <!-- JS Libraries -->
    <script src="//code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="/dashboard/javascripts/all.js" type="text/javascript"></script>
  </body>
</html>
