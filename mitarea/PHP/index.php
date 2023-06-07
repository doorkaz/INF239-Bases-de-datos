<!DOCTYPE html>
<?php
	session_start();
	include "db_conn.php";
	include "quantityOnCart.php";
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
	<link rel = "stylesheet" type = "text/css" href = "../css/index.css">
	<link rel = "stylesheet" type = "text/css" href = "../css/navbar.css">
	<link rel = "stylesheet" type = "text/css" href = "../css/table.css">
	<link rel = "stylesheet" type = "text/css" href = "../css/general.css">
	<link rel = "stylesheet" type = "text/css" href = "../css/star.css">
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

<body>
	<?php 
	include "Navbar.php";
	?>

	<div class="container">
		<div class="row mt-3">
			<h1>¡Bienvenido a PrestigeTravels!</h1>
			<h4>Arma tu panorama con nosotros</h4>
			
			</div>
			<form class="col-md-6" method="GET" action="index.php">

					<tbody>
						<tr>
							<td>Nombre hotel/paquete</td>
							<td><input type="text" class="form-control input-sm" type="search" name="Nombre" placeholder="¡Busca tu hotel o paquete!" ></td>
						</tr>
						<tr>
							Fecha salida
							<?php  $newDate= date("Y-m-d"); ?>
							<input type="date" class="form-control input-sm" name="fecha_salida" value="<?=$newDate?>">
						</tr>
						<tr>
							Fecha llegada
								<?php  $newDate= date("Y-m-d"); ?>
								<input type="date" class="form-control input-sm" name="fecha_llegada" value="<?=$newDate?>">	
						</tr>
						<tr>
						
							¿Es un Hotel? 
							<input type="checkbox" id="hotel" name="hotel" >
						</tr>
						<tr>
						
							¿Es un Paquete? 
							<input type="checkbox" id="pack" name="pack" >
						</tr>
						<tr>
							<input type="text" class="form-control input-sm" name="ciudad" placeholder="¡Encuentra la ciudad que deseas ir!">
						</tr>
						Indique el precio
						<tr>
							<input type="number" class="form-control input-sm" name="precio" placeholder="¿A que precio desea su reserva?">
						</tr>
						Calificación preferida:
						<div>
							<div class="star belowchecked">
									<input type="radio" name="rating" value="1">
								</div>
							<div class="star">
									<input type="radio" name="rating" value="2">
								</div>
							<div class="star">
									<input type="radio" name="rating" value="3">
								</div>
							<div class="star">
									<input type="radio" name="rating" value="4">
								</div>
							<div class="star">
									<input type="radio" name="rating" value="5">
								</div>
						</div>
					</tbody>
				<div class="d-grid form-group mt-2">
					<button class = "btn btn-success" type =  "submit" name="search" id = "search">Busca ya</button>
				</div>
		</div>
	</div>
	<div class = "shadow-sm py-3 rounded" style="background-color: #fafafb">

		<div class="container">

			<div class="row">

				<div class="col-sm-6">

					<div id="carouselExampleCaptions" class="carousel slide">

						<div class="carousel-indicators">
							
							<?php
							$sql = "SELECT * FROM top_hoteles";
							$result = mysqli_query($conn, $sql);
							$numero = mysqli_num_rows($result);
							for($i = 0; $i < $numero; $i++){
								if ($i == 0){
									echo '<button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>';
								} else {
									echo '<button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="'. $i.'" aria-label="Slide ' . $i+1 .'"></button>';
								}
							}
							?>
						</div>

						<div class="carousel-inner">

							<?php
							// Consulta la view
							$sql = "SELECT * FROM top_hoteles";
							$hoteles = mysqli_query($conn, $sql);
							
							// Itera hotel por hotel de la view
							$first = false;
							foreach ($hoteles as $hotel) {
								// Primer item del carousel active
								if ($first == false){
									echo '<div class="carousel-item active">';
										echo '<img src="../images/hoteles/h-id'. $hotel['id_hotel'].'-1.jpg" class="d-block w-100" alt="firstSlide">';
										echo '<div class="carousel-caption d-none d-md-block rounded glass-efect">';
											echo '<h5 class="carousel-color">'.$hotel['Nombre_hotel'].'</h5>';
											for ($i = 1; $i <= $hotel["Num_estrellas"]; $i++) {
												echo '<i class="bi bi-star-fill me-1"></i>'; 
											}
											for ($i = $hotel["Num_estrellas"] + 1; $i <= 5; $i++) {
												echo '<i class="bi bi-star me-1"></i>';
											}
										echo '</div>';
									echo '</div>';
									$first = true;
								} else {
									echo '<div class="carousel-item">';
										echo '<img src="../images/hoteles/h-id'. $hotel['id_hotel'].'-1.jpg" class="d-block w-100" alt="second">';
										echo '<div class="carousel-caption d-none d-md-block glass-efect">';
											echo '<h5>'. $hotel['Nombre_hotel'].'</h5>';
											for ($i = 1; $i <= $hotel["Num_estrellas"]; $i++) {
												echo '<i class="bi bi-star-fill me-1"></i>'; 
											}
											for ($i = $hotel["Num_estrellas"] + 1; $i <= 5; $i++) {
												echo '<i class="bi bi-star me-1"></i>';
											}
										echo '</div>';
									echo '</div>';
								}
							}
							?>
						</div>

						<button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">

							<span class="carousel-control-prev-icon" aria-hidden="true"></span>

							<span class="visually-hidden">Previous</span>

						</button>
						<button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">

							<span class="carousel-control-next-icon" aria-hidden="true"></span>

							<span class="visually-hidden">Next</span>

						</button>
					</div>
				</div>
				<div class="col-sm-6">

					</br></br></br></br>
					<h2>Recorrer Chile ahora es más facil</h2>
					<h4>con variedad de opciones y...</h4>
					
					<h1>¡Precios accesibles!</h1>
					
					
				</div>

			</div>

			<?php
			include 'search.php';
			?>

		</div>

	</div>
    
    
    <footer class="footer row">
    </footer>
	<script>
		function mostrarDetallesHotel(id)
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
		$(function () {

		$(".star").click(function(){
			var x = $(this).find("input[type='radio']");
			var val = x.val();
			x.attr("checked",true);
			$(".star input[type='radio']").each(function(){
				if ($(this).val()<=val){
					$(this).parent().addClass("belowchecked");
				} else {
					$(this).parent().removeClass("belowchecked");
				}
			});
		});

		});
	</script>
</body>
</html>
