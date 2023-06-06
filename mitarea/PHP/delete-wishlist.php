<?php
include "db_conn.php";
session_start();

if(!ISSET($_SESSION['Correo'])){
    header('location:login.php');
} else {
    $uid = $_SESSION['id_usuario'];
    $pid = $_GET['pid'];
    $bool = $_GET['bool'];
    $sql = "DELETE FROM wishlist WHERE uid = $uid AND pid = $pid AND bool = $bool";
    $result = mysqli_query($conn, $sql);
    header('location:mywishlist.php');
}
?>