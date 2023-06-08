<!DOCTYPE html>
<?php
	session_start();
	include "db_conn.php";
	include "quantityOnCart.php";
	include "obtener_paquetes.php";
    include "obtenerHotelesEnPaquete.php";
	
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
	<?php include "Navbar.php"; ?>
	<div class="container">
		<?php 
			if (ISSET($_POST['wish'])){
				include 'wishlist.php'; 
			}
			if (ISSET($_POST['cart'])){
				include 'cart.php'; 
			} 
		?>
		<div class="row rounded mt-5 p-3 border border shadow">
			<?php
			if(ISSET($_GET["bool"]) && ISSET($_GET["product"])){
				
				if ($_GET['bool'] == 0){
					$query = 'SELECT * FROM hoteles WHERE id_hotel = "'.$_GET['product'].'"';
					$result = mysqli_query($conn,$query);
					$row = $result->fetch_assoc();
				?>
				<div class="col-6" style="width: 38rem;">
					<img class="card-img-top" src="../images/hoteles/h-id<?php echo $row["id_hotel"]?>-1.jpg" alt="imghotel">	
					
				
				</div>
				<div class="col-6">
					<p class="fs-2"><?php echo $row['Nombre_hotel'] ?></p>
					<p class="fs-4">CLP $<?php echo number_format($row['Precio_noche'], 0, ",", ".")?></p>
					<p class="fs-5"><?php echo $row['Ciudad']?></p>
					</br>
					
					<?php
					if ($row["estacionamiento"] == 1){
						echo '<p><i class="fa-solid fa-car"></i> Estacionamiento';
						echo '<i class="bi bi-check"></i>';
					} else{
						echo '<p><i class="fa-solid fa-car"></i> Estacionamiento';
						echo '<i class="bi bi-x"></i>';
					}
					echo '</p>';
					
					
					if ($row["piscina"] == 1){
						echo '<p><i class="fa-solid fa-person-swimming"></i> Piscina';
						echo '<i class="bi bi-check"></i>';
					} else{
						echo '<p><i class="fa-solid fa-person-swimming"></i> Piscina';
						echo '<i class="bi bi-x"></i>';
					}
					echo '</p>';
					
					
					if ($row["serv_lavanderia"]==1){
						echo '<p><img src="../images/washing.png" width="16" height="14"> Servicio de lavanderia';
						echo '<i class="bi bi-check"></i>';
					} else{
						echo '<p><img src="../images/washing.png" width="16" height="14"> Servicio de lavanderia';
						echo '<i class="bi bi-x"></i>';
					}
					echo '</p>';
					
					if ($row["pet_friend"]){
						echo '<p><img src="../images/paw.png" width="16" height="14"> Pet Friendly';
						echo '<i class="bi bi-check"></i>';
					} else{
						echo '<p><img src="../images/paw.png" width="16" height="14"> Pet Friendly';
						echo '<i class="bi bi-x"></i>';
					}
					echo '</p>';
					
					
					if ($row["serv_desayuno"]){
						echo '<p><i class="fa-solid fa-utensils"></i> Servicio de desayuno';
						echo '<i class="bi bi-check"></i>';
					} else{
						echo '<p><i class="fa-solid fa-utensils"></i> Servicio de desayuno';
						echo '<i class="bi bi-x"></i>';
					}
					echo '</p>';
					echo '</br>';
					for ($i = 1; $i <= $row['Num_estrellas']; $i++) {
						echo '<i class="bi bi-star-fill me-1"></i>'; 
					}
					for ($i = $row['Num_estrellas'] + 1; $i <= 5; $i++) {
						echo '<i class="bi bi-star me-1"></i>';
					}

					?>
					<form action="#"  method="POST">
						<div class="d-grid mt-2">
							<input type="hidden" value="<?= $row['id_hotel'] ?>" name="pid">
							<input type="hidden" value="0" name="bool">
							<button type="submit" name="cart" class="btn btn-reserve rounded">Agregar al carrito</button>
							<button type="submit" name="wish" class="btn btn-cart rounded mt-1">Wishlist</button>
						</div>
					</form>
				
				</div>
				<?php 
				} elseif($_GET['bool'] == 1){
					$query = 'SELECT * FROM paquetes WHERE id_pack = "'.$_GET['product'].'"';
					$result = mysqli_query($conn,$query);
					$paquete = $result->fetch_assoc();
					?>
					<div class="col-6">
						<img class="card-img-top" height="550px" src="../images/paquetes/p-id<?php echo $paquete["id_pack"]?>-1.jpg" alt="imghotel">	
					</div>
					<div class="col-6">
						<p class="fs-2"><?php echo $paquete['Nombre_pack'] ?></p>
						<p class="fs-4">CLP $<?php echo number_format($paquete['precio_persona'], 0, ",", ".")?></p>
						</br>
						</br>
						</br>
						<div class="row">
							<div class="col-6">
								<h6>Aerolinea de Ida</h6>
								<p><?php echo $paquete["aero_ida"]; ?></p>
							</div>
							<div class="col-6">
								<h6>Aerolinea de Vuelta</h6>
								<p><?php echo $paquete["aero_vuelta"]; ?></p>
							</div>
						</div>
						<br>
						<div class="row">
							<div class="col-12">
								<h6> Hospedajes </h6>
								<?php
								$hoteles = obtenerHotelesEnPaquete($paquete["hid1"], $paquete["hid2"], $paquete["hid3"]);
								foreach($hoteles as $hotel){
									echo "<p>" . $hotel["Nombre_hotel"] . " - " . $hotel["Ciudad"] . "</p>";
								}
								?>
							</div>
						</div>
						<br>
						<div class="row">
							<div class="col-6">
								<h6>Fecha de salida</h6>
								<p><?php echo date("d-m-Y", strtotime($paquete["fecha_salida"])); ?></p>
							</div>
							<div class="col-6">
								<h6>Fecha de llegada</h6>
								<p><?php echo date("d-m-Y", strtotime($paquete["fecha_llegada"])); ?></p>
							</div>
						</div>
						</br>
						<?php
						for ($i = 1; $i <= $paquete['Num_estrellas']; $i++) {
							echo '<i class="bi bi-star-fill me-1"></i>'; 
						}
						for ($i = $paquete['Num_estrellas'] + 1; $i <= 5; $i++) {
							echo '<i class="bi bi-star me-1"></i>';
						}
						?>
								
						<form action="#" method="POST">
							<div class="d-grid mt-2">
								<input type="hidden" value="<?php echo $paquete['id_pack']; ?>" name="pid">
								<input type="hidden" value="1" name="bool">
								<button type="submit" name="cart" class="btn btn-reserve rounded">Agregar al carrito</button>
								<button type="submit" name="wish" class="btn btn-cart rounded mt-1">Wishlist</button>
							</div>
						</form>
						
					</div>
				<?php
				
				}
			} else {
				header('location:index.php');
			}
			?>
			
		</div>
	</div>
</body>
