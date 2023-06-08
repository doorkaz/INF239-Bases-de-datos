<?php
include "db_conn.php";
if(!ISSET($_SESSION['Correo'])){
    header('location:login.php');
} else {
    $uid = $_SESSION['id_usuario'];
    $pid = $_POST['pid'];
    $bool = $_POST['bool'];
    
    $sql = "DELETE FROM cart WHERE pid = ".$pid." AND bool = ".$bool." AND uid = ".$uid;
    echo $sql;
    $result = mysqli_query($conn, $sql);
   
}
?> 
