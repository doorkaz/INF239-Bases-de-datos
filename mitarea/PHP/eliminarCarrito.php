<?php
include "db_conn.php";
if(!ISSET($_SESSION['Correo'])){
    header('location:login.php');
} else {
    $uid = $_SESSION['id_usuario'];
    $cid = $_POST['cid'];

    $sql = "DELETE FROM cart WHERE id = $cid";
    $result = mysqli_query($conn, $sql);
   
}
?> 
