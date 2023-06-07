<?php
if(!ISSET($_SESSION['Correo'])){
    header('location:login.php');
} else {
    $uid = $_SESSION['id_usuario'];
    $pid = $_POST['pid'];
    $bool = $_POST['bool'];
    $cant =  $_POST['cant'];

    $sql_check = "SELECT * FROM cart WHERE uid = $uid AND pid = $pid AND bool = $bool AND cant= $cant";
    $result_check = mysqli_query($conn, $sql_check);
    if(mysqli_num_rows($result_check) == 1){
        echo 'Producto ya existe en el carrito';
    } else {
        $query = "INSERT INTO `cart`(`pid`, `uid`, `bool`, `cant`) VALUES ('$pid','$uid','$bool','$cant')";   
        $result = mysqli_query($conn, $query);
    }
}
?> 