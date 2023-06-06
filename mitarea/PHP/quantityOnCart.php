<?php

function quantityOnCart($id){
    
    include "db_conn.php";
    $sql = "SELECT * FROM cart WHERE uid = $id";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    if ($num == 0){
        return;
    } else {
        echo $num;      
    }
}
?>