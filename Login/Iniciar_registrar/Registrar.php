<?php 

include("../../Conexion/db.php"); //Llama a la conexion (db.php)


    $nombre = $_POST['name'];
    $email = $_POST['email'];  
    $clave = md5($_POST['password']);


    $email_consulta="SELECT email FROM usuarios WHERE email='$email'";  //Revisa si el email ya estaba guardado.

    $verificar_email=mysqli_query($conexion,$email_consulta);  //Valida para permitir o denegar la entrada de datos


        if(mysqli_num_rows($verificar_email) > 0) {

            $_SESSION['mensaje2'] = "Este correo ya esta en uso, escoja otro";
            header("Location: ../../Login/Login.php");

            exit();  //Si se activa todo lo que le siga despues no se hace.
            
        }

 
    $consulta= "INSERT INTO usuarios(nombre, email, clave) VALUES ('$nombre','$email','$clave')"; //Guarda los datos en la base de datos.
    
    mysqli_query($conexion,$consulta);
    mysqli_close($conexion);
    
    header("Location: ../../Login/Login.php");  //Regresa al login

?>