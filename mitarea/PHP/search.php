<?php 

session_start(); 

include "db_conn.php";

if (isset($_POST['Nombre']) && isset($_POST['fecha'])) {

    function validate($data){

       $data = trim($data);

       $data = stripslashes($data);

       $data = htmlspecialchars($data);

       return $data;

    }

    $Nombre = validate($_POST['Nombre']);

    $fecha = validate($_POST['fecha']);

    if (empty($Nombre)) {

        header("Location: index.php?error=Nombre vacio");

        exit();

    }else if(empty($fecha)){

        header("Location: index.php?error=Fecha vacia");

        exit();

    }else{
        
        $sql = "SELECT * FROM paquetes,hoteles WHERE Nombre LIKE '$Nombre'";

        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) === 1) {

            $row = mysqli_fetch_assoc($result);

            if ($row['Nombre'] === $username && $row['Contrasena'] === $password) {

                echo "Logged in!";

                $_SESSION['Nombre'] = $row['Nombre'];

                $_SESSION['Correo'] = $row['Correo'];

                header("Location: index.php");

                exit();

            }else{

                header("Location: index.php?error=Incorect User name or password");

                exit();

            }

        }else{

            header("Location: index.php?error=Incorect User name or password");

            exit();

        }

    }

}else{

    header("Location: index.php");

    exit();

}