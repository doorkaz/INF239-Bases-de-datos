<?php

function quantityOnCart($id){
    
    include "db_conn.php";
    $sql = "SELECT * FROM cart WHERE uid = $id";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    
    echo '<span class="rounded-circle ps-1 pe-1 text-center" style="background-color: #629fa5; color: #182c2e">';
    echo $num;
    echo '</span>'; 
    
}
?>