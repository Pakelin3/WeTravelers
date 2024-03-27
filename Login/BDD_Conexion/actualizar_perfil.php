<?php
include('Conexion.php');

if (isset($_POST['nombrePerfil']) && isset($_POST['idImagen'])) {
    $nombrePerfil = $_POST['nombrePerfil'];
    $idImagen = $_POST['idImagen'];

    // Actualizar el campo nombre_perfil y fk_id_imagen en la tabla usuarios
    $query = "INSERT INTO usuarios (nombre_usuario, fk_id_imagen) VALUES (?, ?)";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "si", $nombrePerfil, $idImagen);
    $resultado = mysqli_stmt_execute($stmt);

    if ($resultado) {
        echo "success";
    } else {
        echo "error";
    }

    // Cerrar la declaración y la conexión
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
} else {
    echo "error";
}
