<?php

$servername= "localhost";

$username= "root";

$database = "lab2";

$password = "";

$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {

    echo "Connection failed!";

}
?>
