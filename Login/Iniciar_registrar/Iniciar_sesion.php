<?php

include("../../Conexion/db.php");   //Llama a la conexion (db.php)


    $email = $_POST['email'];  
    $clave = md5($_POST['password']);
   
    $sql=$conexion->query("SELECT * FROM usuarios where email='$email' AND clave='$clave'"); //Busca si estas registrado en la base de datos


        if($result=$sql->fetch_object()){   //Valida si la base de datos encontro algo

            header("Location: ../../Index/Index.php "); //Pasaste

          }     else{

                $_SESSION['mensaje'] = "Usuario o contraseña invalida";

                header("Location: ../../Login/Login.php");  //No pasaste

                }

    mysqli_close($conexion);


?>