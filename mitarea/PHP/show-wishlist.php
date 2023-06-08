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
                <td style="width: 250px;">
                    <div class="card" style="width: 250px;">
                        <?php echo '<img class="card-img-top img-responsive" src="../images/paquetes/p-id' . $row["id_pack"] . '-1.jpg" alt="imgpaquete">'?>
                    </div>
                </td>
                <td>
                    <?php echo $row["Nombre_pack"]?>
                </td>
                <td>
                    <?php echo $row["Num_estrellas"]?>
                </td>
                <td> 
                    <a name="details" class="btn btn-reserve rounded" href="detalles.php?product=<?php echo $row['id_pack'] ?>&bool=1">Ver</a>
                    <a class="btn btn-danger rounded" href="delete-wishlist.php?pid=<?php echo $row['pid'] ?>&bool=1">Eliminar</a>        
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
                <td style="width: 250px;">
                    <div class="card" style="width: 250px;">
                        <?php echo '<img class="card-img-top img-responsive" src="../images/hoteles/h-id' . $row["id_hotel"] . '-1.jpg" alt="imgpaquete">'?>
                    </div>
                </td>
                <td>
                    <?php echo $row["Nombre_hotel"]?>
                </td>
                <td>
                    <p><?php echo $row["Num_estrellas"]?>/5</p>
                </td>
                <td>
                    <a name="details" class="btn btn-reserve rounded" href="detalles.php?product=<?php echo $row['id_hotel'] ?>&bool=0">Ver</a> 
                    <a class="btn btn-danger rounded" href="delete-wishlist.php?pid=<?php echo $row['pid']?>&bool=0">Eliminar</a>
                </td>

            </tr>
<?php 
        }       
    }
}
?>
