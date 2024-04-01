<?php
include('Conexion.php'); // Asegurate de incluir el archivo de conexion

// Iniciar sesion si no está iniciada
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Verificar si el usuario ha iniciado sesion y tiene un ID de usuario almacenado en la sesion
if (isset($_SESSION['id_usuario'])) {
    // Obtener el ID de usuario de la sesion
    $id_usuario = $_SESSION['id_usuario'];

    // Consulta SQL para obtener la informacion del usuario
    $query = "SELECT
    u.nombre,
    u.nombre_usuario,
    u.correo,
    u.continente,
    u.pais,
    u.estado,
    i.imagen AS imagen
FROM
    usuarios u
JOIN imagenes i ON
    u.fk_id_imagen = i.id_imagen
WHERE
    u.id_usuario = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "i", $id_usuario);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);

    // Vincula las columnas del resultado
    mysqli_stmt_bind_result($stmt, $nombre, $nombre_usuario, $correo, $continente, $pais, $estado, $imagen);


    // Recorre los resultados
    if (mysqli_stmt_fetch($stmt)) {
        // Aquí tienes los datos del usuario en un array asociativo
        $data = array(
            'nombre' => $nombre,
            'nombre_usuario' => $nombre_usuario,
            'correo' => $correo,
            'continente' => $continente,
            'pais' => $pais,
            'estado' => $estado,
            'imagen' => $imagen
        );

        // Devuelve los datos del usuario como JSON
        echo json_encode($data);
    } else {
        // El usuario no fue encontrado
        echo json_encode(array('error' => 'Usuario no encontrado'));
    }

    // Cierra la conexion y la declaracion
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
} else {
    // Usuario no identificado
    echo json_encode(array('error' => 'Usuario no identificado'));
}
