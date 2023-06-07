<?php
include "db_conn.php";
if(!ISSET($_SESSION['Correo'])){
    header('location:login.php');
} else {
    ?>
    <table class="table table-bordered bg-white">
            <tr>
				<th>Imagen</th>
                <th>Paquete/Hotel</th>
                <th>Precio</th>
                <th>Total</th>
                
                
            </tr>
		
    <?php
    $uid = $_SESSION['id_usuario'];

    $sql = "SELECT * FROM cart JOIN paquetes ON paquetes.id_pack = cart.pid WHERE cart.bool = '1'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0){

        while ($row = mysqli_fetch_assoc($result)){      
            ?>
            <tr>
                <td>
                    <?php echo '<img class="card-img-top img-responsive" src="../images/paquetes/p-id' . $row["id_pack"] . '-1.jpg" alt="imgpaquete">'?>
                </td>
                <td>
                    <?php echo $row["Nombre_paquete"]?>
                </td>
                <td>
                    <?php echo $row["Precio_persona"]?>
                </td>
                <td>
                    <?php echo $row["Nombre_paquete"]?>
                </td>

            </tr>
<?php
        }  
    }
    ?>
    </table>
    <table class="table table-bordered bg-white mt-5">
        <tr>
            <th>Imagen</th>
            <th>Hotel</th>
            <th>Precio por noche</th>
            <th>Fecha de llegada</th>
            <th>Fecha de salida</th>
            <th>Total</th>
            
            
        </tr>
    <?php
    $sql = "SELECT * FROM cart JOIN hoteles ON hoteles.id_hotel = cart.pid WHERE cart.bool = '0'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0){

        while ($row = mysqli_fetch_assoc($result)){
?>
            <tr>
                <td>
                    <div class="card" style="width: 250px;">
                        <?php echo '<img class="card-img-top" src="../images/hoteles/h-id' . $row["id_hotel"] . '-1.jpg" alt="imgpaquete">'?>
                    </div>
                </td>
                <td>
                    <?php echo $row["Nombre_hotel"]?>
                </td>
                <td>
                    <?php echo $row["Precio_noche"]?>
                </td>
                
                <td>
                    <?php  $newDate= date("Y-m-d"); ?>
                    <input type="date" class="form-control input-sm" name="fecha"  value="<?=$newDate?>"
                </td>
                <td>
                    <?php  $newDate= date("Y-m-d"); ?>
                    <input type="date" class="form-control input-sm" name="fecha"   value="<?=$newDate?>">
                </td>
                <td>
                    <p id="resultado"></p>
                    
                </td>
            </tr>
    
<?php 
        }       
    }
    ?>
    </table>
    <?php
}
?>
