<!DOCTYPE html>

<?php
    include "db_conn.php";
	session_start();
    include "obtener_hoteles.php";
	if(!ISSET($_SESSION['Correo'])){
		header('location:login.php');
	}
?>	
<?php
	if(ISSET($_POST['search'])){
		$keyword = $_POST['keyword'];
	include "db_conn.php";
	$sql = "SELECT * FROM hoteles WHERE Nombre_hotel LIKE '%$keyword%'";
	$result = mysqli_query($conn,$sql);
	}
?>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title>PrestigeTravels</title>

	<!-- CSS -->
	<link rel = "stylesheet" type = "text/css" href = "../css/index.css">
	<link rel = "stylesheet" type = "text/css" href = "../css/navbar.css">
	<link rel = "stylesheet" type = "text/css" href = "../css/table.css">
    <link rel = "stylesheet" type = "text/css" href = "../css/general.css">
    <!-- FONTAWESOME -->
    <script src="https://kit.fontawesome.com/c7128d3718.js" crossorigin="anonymous"></script>
	<!-- BOOTSTRAP -->
  	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<!-- BOOTSTRAP FONT ICON -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
</head>

<body style="background-color: #fafafb">
	<nav class="navbar navbar-expand-lg navbar-light shadow" style="background-color: #1b3039">
		<div class="container-fluid">
			<a class="navbar-brand fs-4" style="color: white" href="index.php">PrestigeTravels</a>
			<button class="navbar-toggler btn btn-light" style="background-color: #e8eaeb" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav me-auto mb-2 mb-lg-0">
					<li class="nav-item">
						<a class="nav-link active fs-6" style="color: white" href="paquetes.php">Paquetes</a>
					</li>
					<li class="nav-item">
						<a class="nav-link active fs-6 txt-shadow" style="color: white" href="hoteles.php">Hoteles</a>
					</li>
					<li class="nav-item">
						<a class="nav-link active fs-6" style="color: white" href="cart.php">Carrito</a>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle fs-6" style="color: white" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
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
					<i class="bi bi-person-circle"></i> Cuenta activa en <?=$_SESSION['Nombre']?>
				</span>	
				<form class="d-flex" method="POST" action= "">
					<input class="form-control me-2" style="color: #1b3039" type="search" name="keyword" placeholder="Buscar" aria-label="Search">
					<button class="btn btn-outline-light btn-light" style="color: black" name="search" type="submit">Buscar</button>
				</form>
			</div>
		</div>
	</nav>
	

	<div class="container">
		<div class="row mt-3">
			<h1>¡Bienvenido a PrestigeTravels!</h1>
			<h4>Arma tu panorama con nosotros</h4>
			
		</div>
	</div>
	<div class = "py-3 rounded">
		<div class="container">
            <?php
            
            $datosHoteles = obtener_hoteles(); 

            // Divide los hoteles en grupos de 3
            $gruposHoteles = array_chunk($datosHoteles, 4);

            // Generar filas con tres hoteles cada una
            foreach ($gruposHoteles as $grupo) {
                echo '<div class="row mb-5" >';
                foreach ($grupo as $hotel) {
                    echo '<div class="col-sm-6 col-md-3 col-lg-3">';
                        echo '<div class="card shadow-sm" style="width: 18rem;">';
                            echo '<img class="card-img-top img-responsive" src="../images/hoteles/h-id' . $hotel["id_hotel"] . '-1.jpg" alt="imghotel">';
                                echo '<div class="card-body">';
                                    echo '<p class="fs-5">' . $hotel["Nombre_hotel"] . '</p>';
                                    echo '<p class="fs-6">CLP $'. number_format($hotel['Precio_noche'], 0, ",", "."). '</p>';
                                    echo '</br>';
                                    if (isset($_GET['hotel']) && $_GET['hotel'] === $hotel["id_hotel"]){
                                        echo '<a href="hoteles.php" class="details-link">Mostrar detalles</a>';
                                        if ($hotel["estacionamiento"] == 1){
                                            echo '<p><i class="fa-solid fa-car"></i> Estacionamiento';
                                            echo '<i class="bi bi-check"></i>';
                                        } else{
                                            echo '<p><i class="fa-solid fa-car"></i> Estacionamiento';
                                            echo '<i class="bi bi-x"></i>';
                                        }
                                        echo '</p>';

                                        
                                        if ($hotel["piscina"] == 1){
                                            echo '<p><i class="fa-solid fa-person-swimming"></i> Piscina';
                                            echo '<i class="bi bi-check"></i>';
                                        } else{
                                            echo '<p><i class="fa-solid fa-person-swimming"></i> Piscina';
                                            echo '<i class="bi bi-x"></i>';
                                        }
                                        echo '</p>';

                                        
                                        if ($hotel["serv_lavanderia"]==1){
                                            echo '<p><img src="../images/washing.png" width="16" height="14"> Servicio de lavanderia';
                                            echo '<i class="bi bi-check"></i>';
                                        } else{
                                            echo '<p><img src="../images/washing.png" width="16" height="14"> Servicio de lavanderia';
                                            echo '<i class="bi bi-x"></i>';
                                        }
                                        echo '</p>';
                                        
                                        if ($hotel["pet_friend"]){
                                            echo '<p><img src="../images/paw.png" width="16" height="14"> Pet Friendly';
                                            echo '<i class="bi bi-check"></i>';
                                        } else{
                                            echo '<p><img src="../images/paw.png" width="16" height="14"> Pet Friendly';
                                            echo '<i class="bi bi-x"></i>';
                                        }
                                        echo '</p>';

                                    
                                        if ($hotel["serv_desayuno"]){
                                            echo '<p><i class="fa-solid fa-utensils"></i> Servicio de desayuno';
                                            echo '<i class="bi bi-check"></i>';
                                        } else{
                                            echo '<p><i class="fa-solid fa-utensils"></i> Servicio de desayuno';
                                            echo '<i class="bi bi-x"></i>';
                                        }
                                        echo '</p>';
                                    } else {
                                        echo '<a href="?hotel='.$hotel["id_hotel"].'" class="details-link">Mostrar detalles</a>';
                                    }
                                    echo '</br>';
                                    for ($i = 1; $i <= $hotel["Num_estrellas"]; $i++) {
                                        echo '<i class="bi bi-star-fill me-1"></i>'; 
                                    }
                                    for ($i = $hotel["Num_estrellas"] + 1; $i <= 5; $i++) {
                                        echo '<i class="bi bi-star me-1"></i>';
                                    }
                                    
                                    echo '<form action=""  method="POST">';
                                        echo '<div class="d-grid mt-2">';
                                           
                                            echo '<input type="hidden"  value="'.$hotel['Nombre_hotel'].'" name= "hotel">'; 
                                            echo '<button type = "submit" name="Wish" id = "Wish" class="btn btn-reserve rounded">Reservar</button>';
                                            echo $hotel['Nombre_hotel'];
                                            echo '<button type="button" class="btn btn-cart rounded mt-1">Agregar al carrito</button>';
                                            
                                        echo '</div>';
                                    echo '</form>';
                                echo '</div>';
                        echo '</div>';
                    echo '</div>';
                }
                echo '</div>';
            }
            if (ISSET($_POST['Wish'])){
                echo $_POST['hotel'];
            include 'wishfunction.php';
            }
            ?>
            
		</div>
	</div>
    
    <footer class="footer row">
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>
