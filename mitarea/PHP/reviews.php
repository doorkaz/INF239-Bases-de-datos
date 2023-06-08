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
<div class="row rounded mt-5 p-3 border border shadow">
<?php
    
        $query = 'SELECT * FROM resena_hotel';
        $result = mysqli_query($conn,$query);
        while ($row = mysqli_fetch_assoc($result)){ ?>
            <div class="col-6" style="width: 38rem;">
                <img class="card-img-top" src="../images/hoteles/h-id<?php echo $row["id_hotel"]?>-1.jpg" alt="imghotel">
                	
        <?php
        }

    ?>

        
    
    </div>
    
</body>