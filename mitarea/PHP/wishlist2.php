<?php
include "db_conn.php";  
$result = mysqli_query($conn,"DROP PROCEDURE IF EXISTS leave_wishlist;");
$query = "CREATE PROCEDURE leave_wishlist(IN productid int(11)) 
BEGIN 
SELECT DATEDIFF(year, '2017/08/25', '2011/08/25') AS DateDiff;  
END;";
$result = mysqli_query($conn,$query) 
    // str_replace($search, $replace, $subject)


?>