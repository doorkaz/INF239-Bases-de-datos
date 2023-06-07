<!DOCTYPE html>
<?php
	session_start();
	include "quantityOnCart.php";
	if(ISSET($_POST['actualizacion'])){
			$actual = $_POST['actualizacion'];
			include "db_conn.php";
			$nombre = $_POST['nombre'];
			$_SESSION['Nombre']=$nombre;
			$fechanac = $_POST['fechanac'];
			$_SESSION['Fecha_Nacimiento']=$fechanac;
			$id = $_SESSION['id_usuario'];
			$sql = "UPDATE usuarios SET Nombre='$nombre' , Fecha_Nacimiento = '$fechanac' WHERE id_usuario = $id ";
			mysqli_query($conn, $sql);
		}
	if(ISSET($_POST['delete'])){
		$id = $_SESSION['id_usuario'];
		$sql = "DELETE 'usuarios' WHERE id_usuario = $id ";
		mysqli_query($conn, $sql);
		echo 'Cuenta eliminada correctamente';
		header('location:login.php');
		
	}
		
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
	<link rel = "stylesheet" type = "text/css" href = "../css/navbar.css">
    <!-- BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
	<!-- BOOTSTRAP FONT ICON -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
</head>

<body class="index">
<?php 
	include "Navbar.php";
	?>
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
				<form method="POST" action="">
					<button class = "btn btn-danger" type =  "submit" name="delete" id = "delete">Delete datos</button>
				</form>
				<div class="col-md-6">
					<img src="../images/jpcover.jpg" class="d-block w-50">
				</div>
				
			</div>
		</div>
	</div>



    

    <footer class="footer row">
    </footer>
</body>
</html>
