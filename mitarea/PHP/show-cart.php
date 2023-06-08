<!DOCTYPE html>
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
<?php
include "db_conn.php";

if(!ISSET($_SESSION['Correo'])){
    header('location:login.php');
} else { 
    $sql = "SELECT * FROM cart JOIN paquetes ON paquetes.id_pack = cart.pid WHERE cart.bool = '1'";
    $result = mysqli_query($conn, $sql);
    $precio = 0;
    if (mysqli_num_rows($result) > 0){
    ?>
    <table class="table table-bordered bg-white">
            <tr>
				<th>Imagen</th>
                <th>Paquete</th>
                <th>Precio por persona</th>
                <th>Total</th>
                
                
            </tr>
		
    <?php
    $uid = $_SESSION['id_usuario'];

   
    
    

        while ($row = mysqli_fetch_assoc($result)){      
            ?>
            <tr>
                <td>
                    <?php echo '<img class="card-img-top img-responsive" src="../images/paquetes/p-id' . $row["id_pack"] . '-1.jpg" alt="imgpaquete">'?>
                </td>
                <td>
                    <?php echo $row["Nombre_pack"]?>
                </td>
                <td>

                    <?php
                    $precio += $row["precio_persona"];
                    echo $row["precio_persona"];
                     ?>
                </td>
                <td>
                    <?php echo  $row["precio_persona"]?>
                </td>

            </tr>
<?php
        }  
    }
    ?>
    </table>
    <table class="table table-bordered bg-white">   
        <tr>
            <th>Imagen</th>
            <th>Hotel</th>
            <th>Precio por noche</th>
            <th>Total</th>
            
            
        </tr>
        
    <?php
    $sql = "SELECT * FROM cart JOIN hoteles ON hoteles.id_hotel = cart.pid WHERE cart.bool = '0'";
    $result = mysqli_query($conn, $sql);
    
    if (mysqli_num_rows($result) > 0){

        while ($row = mysqli_fetch_assoc($result)){
            if ($row["cant"] == 0){
                $cant = 1;
            }
            else{
                $cant = $row["cant"];
            }
?>
            <tr>
                <td>
                    <div class="card" style="width: 250px;">
                        <?php echo '<img class="card-img-top" src="../images/hoteles/h-id' . $row["id_hotel"] . '-1.jpg" alt="imghotel">'?>
                    </div>
                </td>
                <td>
                    <?php echo $row["Nombre_hotel"]?>
                </td>
                <form action="GET">
                    <?php
                    $precioFechaPairs = array("precio" => $row["Precio_noche"]);
                        // Add more precio-fecha pairs as needed
                    ?>
                    <td>
                    <?php  echo $row["Precio_noche"]?>
                    <input type="hidden" class="form-control input-sm" name="precio" id="precio"  value="<?php echo $cant; ?>"
                    </td>
                <td>
                    <p id="resultado"> <?php 
                    $precio += $cant*$row["Precio_noche"];
                    echo  $cant*$row["Precio_noche"];?></p>

                </td>
                </form>
            </tr>
        <?php 
        }      
        ?>
        <tr>
            <td style="border: none"></td>
            <td style="border: none"></td>
            <td style="border: none"></td>
        <td colspan=4 aria-posinset="right">
            Precio total = <?php echo $precio?> <br>
            <form method="POST" >
            <button type="submit" name="Comprar" id ="Comprar" class="btn btn-cart rounded mt-1"> Compra boludo </button>
            </form>
        </td>
        
        </tr>

    <?php 
    }
    if (ISSET($_POST['Comprar'])){
        $sql="DROP TRIGGER IF EXISTS resena CREATE TRIGGER resena AFTER DELETE on cart
        FOR EACH ROW
        BEGIN
            IF OLD.bool = 0 THEN
                INSERT INTO resena_hotel (id_resenia, id_usuario)
                VALUES (OLD.pid, OLD.uid);
            ELSE
                INSERT INTO resena_(id_resenia, id_usuario)
                VALUES (OLD.pid, OLD.uid);
            END IF;
        END
        ";
        $result= mysqli_query($conn,$sql);

    }
    ?>
    </table>
    <?php
}
?>
