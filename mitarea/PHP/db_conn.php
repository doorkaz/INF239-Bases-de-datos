<?php

$servername= "localhost";

$username= "root";

$database = "prestigetravels";

$password = "";

$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {

    echo "Connection failed!";

}
?>
