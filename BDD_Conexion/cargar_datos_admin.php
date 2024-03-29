<?php
// Iniciar sesión si no esta iniciada
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}


// Incluir el archivo de conexion a la base de datos
include('Conexion.php');

// Verificar si el usuario es administrador
function esAdministrador($conn, $id_usuario)
{
    $query = "SELECT * FROM administradores WHERE fk_id_usuario = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id_usuario);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->num_rows > 0; // Devuelve true si el usuario es administrador, false si no lo es
}

// Verificar si hay una sesión de usuario activa
if (isset($_SESSION['id_usuario'])) {
    $id_usuario = $_SESSION['id_usuario'];
    // Verificar si el usuario es administrador
    if (esAdministrador($conn, $id_usuario)) {
        // El usuario es administrador, devuelve el código HTML del botón de administrador
        echo '<a class="btn btn-outline-warning" href="../AdminLTE/index.html" type="button">Panel de Administrador</a>';
    }
}
