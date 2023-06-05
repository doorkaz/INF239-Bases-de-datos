<?php
echo "yAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA";
if (ISSET($_POST['Wish'])){
    $id = $_SESSION['id_usuario'];
    $hotel = $_POST['hotel'];
    $query="CALL add_wishlist('$hotel',$id)";
    echo $query;
    
    if (mysqli_query($conn,$query)){
        echo 'Funciono?';
    }
}?>