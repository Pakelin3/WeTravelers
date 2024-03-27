<?php
include('Conexion.php'); // Asegúrate de incluir el archivo de conexión

// Iniciar sesión si no está iniciada
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Verificar si el usuario ha iniciado sesión y tiene un ID de usuario almacenado en la sesión
if (isset($_SESSION['id_usuario'])) {
    // Obtener el ID de usuario de la sesión
    $id_usuario = $_SESSION['id_usuario'];

    // Consulta SQL para obtener la información del usuario
    $query = "SELECT nombre, correo, continente, pais, estado FROM usuarios WHERE id_usuario = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "i", $id_usuario);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);

    // Vincula las columnas del resultado
    mysqli_stmt_bind_result($stmt, $nombre, $correo, $continente, $pais, $estado);

    // Recorre los resultados
    if (mysqli_stmt_fetch($stmt)) {
        // Aquí tienes los datos del usuario en un array asociativo
        $data = array(
            'nombre' => $nombre,
            'correo' => $correo,
            'continente' => $continente,
            'pais' => $pais,
            'estado' => $estado
        );

        // Devuelve los datos del usuario como JSON
        echo json_encode($data);
    } else {
        // El usuario no fue encontrado
        echo json_encode(array('error' => 'Usuario no encontrado'));
    }

    // Cierra la conexión y la declaración
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
} else {
    // Usuario no identificado
    echo json_encode(array('error' => 'Usuario no identificado'));
}
