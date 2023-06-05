<?php

if(!ISSET($_SESSION['Correo'])){
    header('location:login.php');
} else {
    $user_id = $_SESSION['id_usuario'];
    $pid = $_GET['pid'];
    $bool = $_GET['bool'];
}
?>