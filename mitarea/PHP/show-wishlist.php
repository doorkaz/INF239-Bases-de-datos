<?php
include "db_conn.php";
if(!ISSET($_SESSION['Correo'])){
    header('location:login.php');
} else {
    $uid = $_SESSION['id_usuario'];

    $sql = "SELECT * FROM wishlist JOIN paquetes ON paquetes.id_pack = wishlist.pid WHERE wishlist.bool = '1' AND uid = $uid";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0){

        while ($row = mysqli_fetch_assoc($result)){?>
            <tr>
                <td>
                    <?php echo '<img class="card-img-top img-responsive" src="../images/paquetes/p-id' . $row["id_pack"] . '-1.jpg" alt="imgpaquete">'?>
                </td>
                <td>
                    <?php echo $row["Nombre_paquete"]?>
                </td>
                <td>
                    <?php echo $row["Num_estrellas"]?>
                </td>
                <td>
                    <a href="delete-wishlist.php?pid=<?php echo $row['pid'] ?>&bool=1">Eliminar</a>
                </td>

            </tr>
        
<?php
        }  
    }
    $sql = "SELECT * FROM wishlist JOIN hoteles ON hoteles.id_hotel = wishlist.pid WHERE wishlist.bool = '0' AND uid = $uid";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0){

        while ($row = mysqli_fetch_assoc($result)){?>
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
                    <?php echo $row["Num_estrellas"]?>
                </td>
                <td method="POST">
                    <a name="details" class="btn btn-reserve rounded" href="Detalles.php?product=<?php echo $row['id_hotel'] ?>&bool=0" onclick="">Ver</a> 
                    <input type="hidden" class="form-control input-sm" name="bool" value="0">	
                    <input type="hidden" class="form-control input-sm" name="id" value="0">	
                    <?php include 'Detalles.php';  ?>
                    <a href="delete-wishlist.php?pid=<?php echo $row['pid']?>&bool=0" style="text-decoration: none">Eliminar</a>
                </td>

            </tr>
<?php 
        }       
    }
}
?>
