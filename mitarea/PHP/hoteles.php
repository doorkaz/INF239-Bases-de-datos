<!DOCTYPE html>

<?php
    include "db_conn.php";
    include "quantityOnCart.php";
	session_start();
    include "obtener_hoteles.php";
	if(!ISSET($_SESSION['Correo'])){
		header('location:login.php');
	}
?>	
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title>PrestigeTravels</title>

	<!-- CSS -->
	<link rel = "stylesheet" type = "text/css" href = "../css/index.css" />
	<link rel = "stylesheet" type = "text/css" href = "../css/navbar.css" />
	<link rel = "stylesheet" type = "text/css" href = "../css/table.css" />
    <link rel = "stylesheet" type = "text/css" href = "..\css\general.css" />
    <!--Jquery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- FONTAWESOME -->
    <script src="https://kit.fontawesome.com/c7128d3718.js" crossorigin="anonymous"></script>
	<!-- BOOTSTRAP -->
  	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
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
            <?php 
			if (ISSET($_POST['wish'])){
				include 'wishlist.php'; 
			}
			if (ISSET($_POST['cart'])){
				include 'cart.php'; 
			} 
		    ?>
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
                            echo '<a href="detalles.php?product='. $hotel['id_hotel'].'&bool=0"><img class="card-img-top img-responsive" src="../images/hoteles/h-id' . $hotel["id_hotel"] . '-1.jpg" alt="imghotel"></a>';
                                echo '<div class="card-body">';
                                    echo '<p class="fs-5">' . $hotel["Nombre_hotel"] . '</p>';
                                    echo '<p class="fs-6">CLP $'. number_format($hotel['Precio_noche'], 0, ",", "."). '</p>';
                                    echo '</br>';
                                    echo '<a class="details-link" role="button" onclick="mostrarDetalles('. $hotel["id_hotel"] .')">Mostrar detalles</a>';
                                    echo '<div id="details-'.$hotel["id_hotel"].'" style="display: none"></div>';
                                    
                                    echo '</br>';
                                    for ($i = 1; $i <= $hotel["Num_estrellas"]; $i++) {
                                        echo '<i class="bi bi-star-fill me-1"></i>'; 
                                    }
                                    for ($i = $hotel["Num_estrellas"] + 1; $i <= 5; $i++) {
                                        echo '<i class="bi bi-star me-1"></i>';
                                    }
                                    
                                    
                                    echo '<form action="#"  method="POST">';
                                        echo '<div class="d-grid mt-2">';
                                           
                                            echo '<input type="hidden"  value="'.$hotel['id_hotel'].'" name= "pid">'; 
                                            echo '<input type="hidden"  value="0" name= "bool">'; 
                                            echo '<button type = "submit" name="cart" class="btn btn-reserve rounded">Agregar al carrito</button>';  
                                            echo '<button type="submit" name="wish" class="btn btn-cart rounded mt-1">Wishlist</button>';
                                            
                                        echo '</div>';
                                    echo '</form>';
                                echo '</div>';
                        echo '</div>';
                    echo '</div>';
                }
                echo '</div>';
            }
            ?>
            
		</div>
	</div>
   

    <footer class="footer row">
    </footer>
    <script>
        function mostrarDetalles(id)
        {
            var details_id = "#details-"+id;


            if ($(details_id).is(":visible")) {
                // Si el texto ya está visible, ocultarlo en el segundo clic
                $(details_id).hide();
            } else {
                $.ajax({
                data: 'id='+id,
                url: 'obtener_detalles_hotel.php',
                type: 'POST',

                success: function(details)
                {
                    $(details_id).html(details).show()
                }
                });
            }
            
        }
    </script>
    
</body>
</html>
