<?php
// Iniciar la sesión si aún no se ha iniciado
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Verificar si se ha recibido el ID de la publicación
if (isset($_POST['publicacionId'])) {
    // Obtener el ID de la publicación desde la solicitud POST
    $publicacionId = $_POST['publicacionId'];

    // Verificar si se pudo obtener el ID de usuario de la sesión
    if (isset($_SESSION['id_usuario'])) {
        // Obtener el ID de usuario desde la sesión
        $usuarioId = $_SESSION['id_usuario'];

        // Conectar a la base de datos (debes incluir tu archivo de conexión aquí)
        include('Conexion.php');

        // Query para insertar el registro del like en la tabla me_gusta_publicaciones
        $query = "INSERT INTO me_gusta_publicaciones (fk_id_usuario, fk_id_publicacion) VALUES (?, ?)";

        // Preparar la consulta
        $stmt = mysqli_prepare($conn, $query);

        // Verificar si la consulta se preparó correctamente
        if ($stmt) {
            // Vincular parámetros
            mysqli_stmt_bind_param($stmt, "ii", $usuarioId, $publicacionId);

            // Ejecutar la consulta
            $resultado = mysqli_stmt_execute($stmt);

            // Verificar si la consulta se ejecutó correctamente
            if ($resultado) {
                // Si se guardó el like correctamente, enviar una respuesta JSON con éxito
                echo json_encode(array('success' => true));
            } else {
                // Si ocurrió un error al guardar el like, enviar una respuesta JSON con el mensaje de error
                echo json_encode(array('error' => 'Error al guardar el like en la base de datos.'));
            }

            // Cerrar la declaración
            mysqli_stmt_close($stmt);
        } else {
            // Si la consulta no se preparó correctamente, enviar una respuesta JSON con el mensaje de error
            echo json_encode(array('error' => 'Error al preparar la consulta.'));
        }

        // Cerrar la conexión a la base de datos
        mysqli_close($conn);
    } else {
        // Si no se pudo obtener el ID de usuario de la sesión, enviar una respuesta JSON con un mensaje de error
        echo json_encode(array('error' => 'No se pudo obtener el ID de usuario.'));
    }
} else {
    // Si no se recibió el ID de la publicación, enviar una respuesta JSON con un mensaje de error
    echo json_encode(array('error' => 'No se recibio el ID de la publicacion.'));
}
