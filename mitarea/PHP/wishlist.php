<?php
if(!ISSET($_SESSION['Correo'])){
    header('location:login.php');
} else {
    $uid = $_SESSION['id_usuario'];
    $pid = $_POST['pid'];
    $bool = $_POST['bool'];

    $sql_check = "SELECT * FROM wishlist WHERE uid = $uid AND pid = $pid AND bool = $bool";
    $result_check = mysqli_query($conn, $sql_check);
    if(mysqli_num_rows($result_check) == 1){
        echo '<p class="fs-3">¡Producto ya existe en la wishlist!</p>';
    } else {
        $query = "INSERT INTO `wishlist`(`pid`, `uid`, `bool`) VALUES ('$pid','$uid','$bool')";   
        $result = mysqli_query($conn, $query);
    }
}
?> 