<?php
// iniciar la sesion si no esta iniciada
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// incluir el archivo de conexion a la base de datos
include('Conexion.php');

// verificar si el usuario es administrador
function esAdministrador($conn, $id_usuario)
{
    $query = "SELECT * FROM administradores WHERE fk_id_usuario = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id_usuario);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->num_rows > 0; // devuelve true si el usuario es administrador, false si no lo es
}

// verificar si hay una sesión de usuario activa
if (isset($_SESSION['id_usuario'])) {
    $id_usuario = $_SESSION['id_usuario'];
    // verificar si el usuario es administrador
    if (esAdministrador($conn, $id_usuario)) {
        // el usuario es administrador, devuelve el codigo HTML del boton de administrador
        echo '<a class="btn btn-outline-warning" href="../AdminLTE/index.html" type="button">Panel de Administrador</a>';
    }
}
