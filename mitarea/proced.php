<?php
$server= "localhost";
$username = "root";
$password = "";
$database = "lab2";


try {
  $conn = new PDO("mysql:host=$server;dbname=$database;", $username, $password);
} catch (PDOException $e) {
  die('Connection Failed: ' . $e->getMessage());
}



$records = $conn->prepare('CREATE PROCEDURE proced (IN num INT, IN a VARCHAR(10)) BEGIN SELECT ProductDescription FROM ProductDesc WHERE ProductID >= num AND ProductDescription LIKE CONCAT("%", a, "%"); END');#$records->execute();
$records = $conn->prepare('CALL proced(5, " ")');
$records->execute();
$resultado=$records ->fetchAll();

?>

<!DOCTYPE html>
<html>
  <head>
  <meta charset="utf-8">
    <title>Ejemplo de procedimientos</title>
  </head>
  <body>  

  <h1>Este es el resultado de tu procedimiento!</h1>
  <?php
    for ($i=0; $i < count($resultado); $i++) { 
      echo $resultado[$i]['ProductDescription'];
      echo "<br>";
    }
    ?>
<h3>Este es un vinculo a otro archivo .php</h3>
<a href="ejemplo.php">Primer ejemplo</a>
  
  </body>
</html>