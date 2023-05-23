<!DOCTYPE html>
<?php
	session_start();
	if(!ISSET($_SESSION['Correo'])){
		header('location:login.php');
	}
?>
<html lang="en">
<head>
   
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    
    <title>Cuenta</title>
    <!-- CSS -->
    <link rel = "stylesheet" type = "text/css" href = "../css/index.css">
    <!-- BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body class="index">
    <nav class="d-flex navbar navbar-expand-lg navbar-light bg-primary">
        <a class="indexbar ms-3 fs-4 fw-" href="#">PrestigeTravels</a>
        <a class="indexbar m-3" href="#">Hoteles</a>
        <a class="indexbar m-3" href="#">Paquetes</a>
        <a class="indexbar m-3" href="#">Carrito</a>
        <a class="indexbar m-3 align-items-end justify-content-end" href="cuenta.php">Usuario < <?=$_SESSION['Nombre']?> ></a>
    </nav>

    <div class="row">
        <div class="large-12 columns">
            <h2>Bienvenido <?=$_SESSION['Nombre']?>, ¡esta es tu pagina!</h2>
        </div>
    </div>
    <div class="row">
        <div class="large-12 columns">
            <p>Tu nombre es: <?=$_SESSION['Nombre']?></p>
            <p>Tu correo es: <?=$_SESSION['Correo']?></p>
            <p>Esta es su lista:</p>
        </div>
    </div>



    </div>

    <footer class="footer row">
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>
