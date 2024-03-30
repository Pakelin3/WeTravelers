<?php
// Iniciar o reanudar la sesion
session_start();

// Destruir todas las variables de sesion
$_SESSION = array();

// Diske borra los datos de las cookies, (cierra la sesion mas no los datos (algo asi funciona))
if (isset($_COOKIE[session_name()])) {
    setcookie(session_name(), '', time() - 42000, '/');
}

// Finalmente, destruir la sesion
session_destroy();

// Redirigir al usuario a la página de inicio o a donde desees
header('Location: ../index.php');
exit;
