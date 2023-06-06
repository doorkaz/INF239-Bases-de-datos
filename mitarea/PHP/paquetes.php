<!DOCTYPE html>

<?php
    include "db_conn.php";
	include "quantityOnCart.php";
	session_start();
	if(!ISSET($_SESSION['Correo'])){
		header('location:login.php');
	}
?>	
<?php
	if(ISSET($_POST['search'])){
		$keyword = $_POST['keyword'];
	include "db_conn.php";
	$sql = "SELECT * FROM paquetees WHERE Nombre_paquete LIKE '%$keyword%'";
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
    <!--Jquery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- FONTAWESOME -->
    <script src="https://kit.fontawesome.com/c7128d3718.js" crossorigin="anonymous"></script>
	<!-- BOOTSTRAP -->
  	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<!-- BOOTSTRAP FONT ICON -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
</head>

<body style="background-color: #fafafb">
<?php 
	include "Navbar.php";
	?>
	

	<div class="container">
		<div class="row mt-3">
			<h1>¡Bienvenido a PrestigeTravels!</h1>
			<h4>Arma tu panorama con nosotros</h4>
			
		</div>
	</div>
	<div class = "py-3 rounded">
		<div class="container">
            <?php
            include "obtener_paquetes.php";
            $datosPaquetes = obtener_paquetes(); 

            // Divide los paquetes en grupos de 4
            $gruposPaquetes = array_chunk($datosPaquetes, 3);

            // Generar filas con 4 paquetes cada una
            foreach ($gruposPaquetes as $grupo) {
                echo '<div class="row mb-5" >';
                foreach ($grupo as $paquete) {
                    echo '<div class="col-sm-6 col-md-4 col-lg-4">';
                        echo '<div class="card shadow-sm" style="width: 18rem; height: 100%">';
                            echo '<img class="card-img-top img-responsive" src="../images/paquetes/p-id' . $paquete["id_pack"] . '-1.jpg" alt="imgpaquete">';
                                echo '<div class="card-body">';
                                    echo '<p class="fs-5">' . $paquete["Nombre_pack"] . '</p>';
                                    echo '<p class="fs-6">CLP $'. number_format($paquete['precio_persona'], 0, ",", "."). '</p>';
                                    echo '</br>';
                                    
                                    echo '</br>';
                                    
                                    
                                    echo '<form action=""  method="POST">';
                                        echo '<div class="d-grid mt-2">';
                                        
                                            echo '<input type="hidden"  value="'.$paquete['Nombre_pack'].'" name= "paquete">'; 
                                            echo '<button type = "submit" name="Wish" id = "Wish" class="btn btn-reserve rounded">Reservar</button>';  
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
                include 'wishlist.php';
            }

            ?>
            
		</div>
	</div>
    
    <footer class="footer row">
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>
