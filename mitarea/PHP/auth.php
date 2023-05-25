<?php 

session_start(); 

include "db_conn.php";

if (isset($_POST['username']) && isset($_POST['password'])) {

    function validate($data){

       $data = trim($data);

       $data = stripslashes($data);

       $data = htmlspecialchars($data);

       return $data;

    }

    $username = validate($_POST['username']);

    $password = validate($_POST['password']);

    if (empty($username)) {

        header("Location: login.php?error=User Name is required");

        exit();

    }else if(empty($password)){

        header("Location: login.php?error=Password is required");

        exit();

    }else{
        
        $sql = "SELECT * FROM usuarios WHERE Nombre='$username' AND Contrasena='$password'";

        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) === 1) {

            $row = mysqli_fetch_assoc($result);

            if ($row['Nombre'] === $username && $row['Contrasena'] === $password) {

                echo "Logged in!";
                $_SESSION['id_usuario'] = $row['id_usuario'];

                $_SESSION['Nombre'] = $row['Nombre'];

                $_SESSION['Correo'] = $row['Correo'];

                $_SESSION['Contrasena'] = $row['Contrasena'];
                
                $_SESSION['Fecha_Nacimiento'] = $row['Fecha_Nacimiento'];

                $_SESSION['wishlist'] = $row['wishlist'];

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

    header("Location: login.php");

    exit();

}