<!DOCTYPE html>
<?php
	session_start();
	if(!ISSET($_SESSION['Correo'])){
		header('location:login.php');
	}
	/*
	if(ISSET($_POST['actualizacion'])){
			header('location:login.php');
			$actual = $_POST['actualizacion'];
			include "db_conn.php";
			$nombre = $_POST['nombre'];
			$_SESSION['Nombre']=$nombre;
			$fechanac = $_POST['fechanac'];
			$_SESSION['Fecha_Nacimiento']=$fechanac;
		}
	*/
?>
<html lang="en">
<head>
   
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    
    <title>Cuenta</title>
    <!-- CSS -->
    <link rel = "stylesheet" type = "text/css" href = "../css/index.css">
	<link rel = "stylesheet" type = "text/css" href = "../css/navbar.css">
    <!-- BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<!-- BOOTSTRAP FONT ICON -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
</head>

<body class="index">
    <nav class="navbar navbar-expand-lg navbar-light shadow" style="background-color: #1b3039">
		<div class="container-fluid">
			<a class="navbar-brand fs-4" style="color: white" href="index.php">PrestigeTravels</a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav me-auto mb-2 mb-lg-0">
					<li class="nav-item">
						<a class="nav-link active fs-6" style="color: white" href="paquetes.php">Paquetes</a>
					</li>
					<li class="nav-item">
						<a class="nav-link active fs-6" style="color: white" href="hoteles.php">Hoteles</a>
					</li>
					<li class="nav-item">
						<a class="nav-link active fs-6" style="color: white" href="cart.php">Carrito</a>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle fs-6 txt-shadow" style="color: white" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
							Cuenta
						</a>
						<ul class="dropdown-menu" aria-labelledby="navbarDropdown">
							<li><a class="dropdown-item" href="cuenta.php">Mi perfil</a></li>
							<li><a class="dropdown-item" href="reviews.php">Reseñas</a></li>
							<li><hr class="dropdown-divider"></li>
							<li><a class="dropdown-item" href="logout.php">Cerrar sesión</a></li>
						</ul>
					</li>
					
				</ul>
				<span class="navbar-text me-2" style="color: white">
					<i class="bi bi-person-circle"></i> Cuenta activa en @<?=$_SESSION['Nombre']?>
				</span>	
				<form class="d-flex">
					<input class="form-control me-2" style="color: #1b3039" type="search" placeholder="Buscar" aria-label="Search">
					<button class="btn btn-outline-light btn-light" style="color: black" type="submit">Buscar</button>
				</form>
			</div>
		</div>
	</nav>
	</br>
	</br>
	<div>
		<div class="container">
			<div class="row">
				<h1>¿Deseas cambiar tus datos personales?</h1>
				<form class="col-md-6" method="POST" action="">
					<table class= "table table-condensed">
						<tbody>
							<tr>
								<td>Nombre</td>
								<td><input type="text" class="form-control input-sm" name="nombre" value="<?=$_SESSION['Nombre']?>" required></td>
							</tr>
							<tr>
								<td>Fecha de nacimiento</td>
								<!-- TRANSFORMAR FECHA EN DIA MES AÑO -->
								<?php $date = $_SESSION['Fecha_Nacimiento'];
								$newDate= date("Y-m-d", strtotime($date)); ?>
								<td><input type="date" class="form-control input-sm" name="fechanac" value="<?=$newDate?>"></td>
							</tr>
							<tr>
								<td>Correo electrónico/Email</td>
								<td><input type="email" class="form-control input-sm" name="correo" value="<?=$_SESSION['Correo']?>" readonly></td>
							</tr>
							
						</tbody>
					</table>
					<div class="d-grid form-group mt-2">
                        <button class = "btn btn-success" type =  "submit" name="actualizacion" id = "actualizacion">Actualizar datos</button>
                    </div>
				</div>

				<div class="col-md-6">
					<img src="../images/jpcover.jpg" class="d-block w-50">
				</div>
				
			</div>
		</div>
	</div>



    

    <footer class="footer row">
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>
