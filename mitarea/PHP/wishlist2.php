<?php
include "db_conn.php";  
$result = mysqli_query($conn,"DROP PROCEDURE IF EXISTS leave_wishlist;");
$query = "CREATE PROCEDURE leave_wishlist(IN productid int(11)) 
BEGIN 
    DELETE FROM wishlist
    WHERE pid = productid;
END;";
$result = mysqli_query($conn,$query) 
    // str_replace($search, $replace, $subject)


?>