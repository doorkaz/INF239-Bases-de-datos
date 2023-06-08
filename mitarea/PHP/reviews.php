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
	<link rel = "stylesheet" type = "text/css" href = "../css/star2.css">
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
<div class="row rounded mt-5 p-3 border border shadow">
<table class="table table-bordered bg-white">   
	<tr>
		<td>
		Imagen paquete
		</td>
		<td>
		Nombre paquete
		</td>
		<td>
		Calidad Hotel
		</td>
		<td>
		Transporte
		</td>
		<td>
		Servicio
		</td>
		<td>
		Relación cálidad y Precio
		</td>
		<td>
		Texto
		</td>	
	</tr>
<?php
    
        $query = 'SELECT * FROM resena_pack';
		
        $result = mysqli_query($conn,$query);

        while ($row = mysqli_fetch_assoc($result)){	
			$idpack = $row["id_pack"];	
			$query = 'SELECT * FROM paquetes where id_pack = '.$idpack.'';
        	$result2 = mysqli_query($conn,$query); 
			$a = $result2->fetch_assoc();
			?>
            <div class="col-6" style="width: 38rem;">
			<tr>
                <td style="width: 300px">
                <img class="card-img-top" src="../images/paquetes/p-id<?php echo $row["id_pack"]?>-1.jpg" alt="imghotel"> 
				</td>
				<td>
                	<?php echo $a["Nombre_pack"]; ?>
				</td>
				
				
				<form method="GET" action="#">
					<input type="hidden" name="pid" value=<?php echo $row["id_pack"] ?>>
				<td>
				<input type="number" name="calidadhotel" min=1 max=5 value=1 />
				</td>

				<td>
				<input type="number" name="transport" min=1 max=5 value=1 />
				</td>
				<td>
				<input type="number" name="servicio" min=1 max=5 value=1 />
				</td>
				<td>
				<input type="number" name="calprecio" min=1 max=5 value=1 />
				</td>
				<td input>
				<input type="text"style= " width: 100%; max-width: 100%; height: 255px; box-sizing: border-box;" name="resena" placeholder="Escriba">
				</td>
				<td>
				<button style= "height: 255px" stype = "submit" name="resenapack" class="btn btn-reserve rounded">Escribir</button>
				</td>
				</form>	
			</tr>
			
                
        <?php
        }
		if(ISSET($_GET['resenapack'])){
			$calhotel = $_GET['calidadhotel'];
			$transport = $_GET['transport'];
			$servicio = $_GET['servicio'];
			$calprecio = $_GET['calprecio'];
			$resena = $_GET['resena'];
			$pid =  $_GET['pid'];
			$sql = "UPDATE resena_pack SET calidad_hoteles = ".$calhotel.", transporte = ".$transport.", servicio = ".$servicio.", rel_cal_precio = ".$calprecio.", texto_resena = '".$resena."' WHERE id_pack = ".$pid."";
			$result = mysqli_query($conn,$sql);
		}
    ?>

	</table>        
	<table class="table table-bordered bg-white">   
	<tr>
		<td>
		Imagen hotel
		</td>
		<td>
		Nombre hotel
		</td>
		<td>
		Limpieza
		</td>
		<td>
		Servicio
		</td>
		<td>
		Decoracion
		</td>
		<td>
		Calidad de las camas
		</td>
		<td>
		Texto
		</td>	
	</tr>
	<?php
    
        $query = 'SELECT * FROM resena_hotel';
		
        $result = mysqli_query($conn,$query);

        while ($row = mysqli_fetch_assoc($result)){	
			$idpack = $row["id_hotel"];	
			$query = 'SELECT Nombre_hotel FROM hoteles where id_hotel = '.$idpack.'';
        	$result2 = mysqli_query($conn,$query); 
			$a = $result2->fetch_assoc();
			?>
            <div class="col-6" style="width: 38rem;">
			<tr>
                <td style="width: 300px">
                <img class="card-img-top" src="../images/hoteles/h-id<?php echo $row["id_hotel"]?>-1.jpg" alt="imghotel"> 
				</td>
				<td>
                	<?php echo $a["Nombre_hotel"]; ?>
				</td>
				
				
				<form method="GET" action="#">
					<input type="hidden" name="pid" value=<?php echo $row["id_hotel"] ?>>
				<td>
				<input type="number" name="limpieza" min=1 max=5 value=1 />
				</td>

				<td>
				<input type="number" name="servicio" min=1 max=5 value=1 />
				</td>
				<td>
				<input type="number" name="decoracion" min=1 max=5 value=1 />
				</td>
				<td>
				<input type="number" name="calcama" min=1 max=5 value=1 />
				</td>
				<td input>
				<input type="text"style= " width: 100%; max-width: 100%; height: 255px; box-sizing: border-box;" name="resena" placeholder="Escriba">
				</td>
				<td>
				<button style= "height: 255px" stype = "submit" name="resenahotel" class="btn btn-reserve rounded">Escribir</button>
				</td>
				</form>	
			</tr>
			
                
        <?php
        }
		if(ISSET($_GET['resenahotel'])){
			$limpieza = $_GET['limpieza'];
			$servicio = $_GET['servicio'];
			$decoracion = $_GET['decoracion'];
			$calcama = $_GET['calcama'];
			$resena = $_GET['resena'];
			$pid =  $_GET['pid'];
			$sql = "UPDATE resena_hotel SET limpieza = ".$limpieza.", servicio = ".$servicio.", decoracion = ".$decoracion.", Calidad_cama = ".$calcama.", texto_resena = '".$resena."' WHERE id_hotel= ".$pid."";
			$result = mysqli_query($conn,$sql);
		}
    ?>

	</table>        
    
    </div>
	<script>
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