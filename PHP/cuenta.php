<script src="//code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="/dashboard/javascripts/all.js" type="text/javascript"></script>
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


    <link href="/dashboard/stylesheets/normalize.css" rel="stylesheet" type="text/css" /><link href="/dashboard/stylesheets/all.css" rel="stylesheet" type="text/css" />
    <link href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/3.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />

    <script src="/dashboard/javascripts/modernizr.js" type="text/javascript"></script>




  </head>

  <body class="index">
  
    <header class="header contain-to-grid">
      <nav class="top-bar" data-topbar>
        <ul class="title-area">
          <li class="name">
            <h1><a href="/mitarea/index.html">Cuenta</a></h1>
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
              <li class="item "><a href="/mitarea/PHP/index.php">Index</a></li>
              <li class="item "><a href="/mitarea/index.html">HOW-TO Guides</a></li>
              <li class="item "><a target="_blank" href="/dashboard/phpinfo.php">PHPInfo</a></li>
              <li class="item "><a href="/mitarea/index.html">phpMyAdmin</a></li>
          </ul>
          <ul class="right">
            <li class="item "><a href="/mitarea/cuenta.html"><?=$_SESSION['Nombre']?></a></li>>
          </ul>
        </section>
      </nav>
    </header>

    <div class="wrapper">
      <div class="hero">
  <div class="row">
    <div class="large-12 columns">
      <h1>
        Cuenta <span><?=$_SESSION['Nombre']?></span></h1>
    </div>
    
  </div>
</div>
<div class="row">
  <div class="large-12 columns">
    <h2>Bienvenido <?=$_SESSION['Nombre']?>, ¡esta es tu pagina!</h2>
  </div>
</div>
<div class="row">
  <div class="large-12 columns">
    <p>
      Tu nombre es: <?=$_SESSION['Nombre']?>
    </p>
    <p>
      Tu correo es: <?=$_SESSION['Correo']?>
    </p>
    <p>
    Esta es su lista:
    </p>
  </div>
</div>



    </div>

    <footer class="footer row">
    </footer>

  </body>
</html>
