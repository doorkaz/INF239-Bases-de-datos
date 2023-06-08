<?php
include "db_conn.php";
if(!ISSET($_SESSION['Correo'])){
    header('location:login.php');
} else {
    $uid = $_SESSION['id_usuario'];
    $pid = $_POST['pid'];
    $bool = $_POST['bool'];
    $cant = $_POST['cant'];

    $sql = "UPDATE cart SET cant = $cant WHERE pid = $pid AND bool = $bool AND uid = $uid";
    $result = mysqli_query($conn, $sql);
   
}
?> 
