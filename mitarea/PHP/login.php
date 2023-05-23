<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesión</title>
    
    <!-- CSS -->
    <link rel = "stylesheet" type = "text/css" href = "../css/auth.css">
    <!-- BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body class="body-login d-flex justify-content-center align-items-center vh-100">
    <div class ="container justify-content-center align-items-center col-sm-6 col-md-6 col-lg-4 col-xl-4">
        <div class="box-sd bg-light p-4 rounded-2 ">
            <h2 class="text-center fs-2">PrestigeTravels</h2>
            <hr style="height: 3px;">
            <h3 class="text-center fs-3">Iniciar sesión</h3>
           
            <?php if (isset($_GET['error'])){ ?>
                <div class="alert alert-danger" role = "alert"><?php echo "Acceso inválido. Por favor, inténtelo otra vez"; ?></div>
            <?php } ?>
            
            <form name = "f1" action = "auth.php" onsubmit="return validation()" method = "POST">
                <div class="mb-4">
                    <input class = "form-control" type = "text" id ="username" name  = "username" placeholder="Nombre de usuario"/>
                </div>
                <div class="mb-4">
                    <input class = "form-control" type = "password" id ="password" name  = "password" placeholder="Contraseña"/>
                </div>

                <div class="mb-4">
                    <button class = "form-control btn btn-primary" type =  "submit" id = "btn">Iniciar sesión</button>
                </div>
                <div class="register">
                    <p>¿No tienes cuenta? <a class = "check-acc" href="../html/register.html">Registrate</a></p>
                </div>
                
                
            </form>
        </div>
    </div>
    
    <!-- validar campos vacios -->
    <!-- <script>  
        function validation()  
        {  
            var id=document.f1.user.value;  
            var ps=document.f1.pass.value;  
            if(id.length=="" && ps.length=="") {  
                alert("User Name and Password fields are empty");  
                return false;  
            }  
            else  
            {  
                if(id.length=="") {  
                    alert("User Name is empty");  
                    return false;  
                }   
                if (ps.length=="") {  
                alert("Password field is empty");  
                return false;  
                }  
            }                             
        }  
    </script>  -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>