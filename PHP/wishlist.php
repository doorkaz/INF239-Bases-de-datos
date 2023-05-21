<?php
$my_array = array("Dog","Cat","Horse");

list($a, $b, $c) = $my_array;
echo "I have several animals, a $a, a $b and a $c.";
echo count($my_array);

if (isset($_POST['uname']) && isset($_POST['password'])) {

    function validate($data){

       $data = trim($data);

       $data = stripslashes($data);

       $data = htmlspecialchars($data);

       return $data;

    }

    $uname = validate($_POST['uname']);

    $pass = validate($_POST['password']);

    if (empty($uname)) {

        header("Location: ../login.html?error=User Name is required");

        exit();

    }else if(empty($pass)){

        header("Location: ../login.html?error=Password is required");

        exit();

    }else{

        $sql = "SELECT * FROM usuarios WHERE Nombre='$uname' AND Contrasena='$pass'";

        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) === 1) {

            $row = mysqli_fetch_assoc($result);

            if ($row['Nombre'] === $uname && $row['Contrasena'] === $pass) {

                echo "Logged in!";

                $_SESSION['Correo'] = $row['Correo'];

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

    header("Location: ../login.html");

    exit();

}
?>