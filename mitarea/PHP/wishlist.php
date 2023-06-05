<?php
include "db_conn.php";  
$result = mysqli_query($conn,"DROP PROCEDURE IF EXISTS add_wishlist;");
$query = "CREATE PROCEDURE add_wishlist(IN val VARCHAR(200),IN id int(11)) 
BEGIN 
    UPDATE usuarios
    SET wishlist=(
        CASE WHEN wishlist=''
            THEN val
            ELSE concat_WS('\,',wishlist, val)
        END
    )
    WHERE id_usuario = id;
END;";
$result = mysqli_query($conn,$query) 
    // str_replace($search, $replace, $subject)

?>