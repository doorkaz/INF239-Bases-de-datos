<?php
if (ISSET($_POST['Wish'])){
    $id = $_SESSION['id_usuario'];
    $query="CALL add_wishlist($hotel,$id)";
    echo $query;
    mysqli_query($conn,$query);
    if (mysqli_query($conn,$query)){
        echo 'Funciono?';
    }
}?>