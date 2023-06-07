<?php 
    include "db_conn.php";

    if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['correo'])  && isset($_POST['fechanac'])) {
    
        function validate($data){
    
           $data = trim($data);
    
           $data = stripslashes($data);
    
           $data = htmlspecialchars($data);
    
           return $data;
    
        }
    
        $username = validate($_POST['username']);
    
        $password = validate($_POST['password']);
        $correo = validate($_POST['correo']);
        $fechanac = validate($_POST['fechanac']);
        if (empty($username)) {
    
            header("Location: login.php?error=User Name is required");

        }else if(empty($password)){
    
            header("Location: login.php?error=Password is required");
    

        }else if(empty($correo)){
    
            header("Location: login.php?error=correo is required");
    
        }else if(empty($fechanac)){
    
            header("Location: login.php?error=fecha is required");
    
        }
        else{
            
            $sql = "INSERT INTO `usuarios` (Correo, Nombre, Fecha_Nacimiento, Contrasena) VALUES ('$correo','$username','$fechanac','$password')";
    
            $result = mysqli_query($conn,$sql);
            if ($result) {

                header("Location: login.php?exito=exito");
            }else{
    
                header("Location: index.php?error=Incorect User name or password");

    
            }
    
        }
    
    }else{
    
        header("Location: login.php");
    

    
    }
?>