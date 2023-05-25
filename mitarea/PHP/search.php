<?php 
include "db_conn.php";
if(ISSET($_POST['text'])){
    $search = $_POST['text'];
}
$sql = "SELECT * FROM hoteles WHERE Nombre_hotel LIKE '$search'";
$result = mysqli_query($conn,$sql);
while ($row = mysqli_fetch_assoc($result)) {
    echo "<div id='link' onClick='addText(\"".$row['Nombre_hotel']."\");'>" . $row['Nombre_hotel'] . "</div>";  
     }
?>