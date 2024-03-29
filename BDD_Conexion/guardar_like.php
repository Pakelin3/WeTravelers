<?php
// Iniciar la sesión si aún no se ha iniciado
session_start();

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

        // Verificar si ya existe un registro de 'me gusta' para esta publicación y usuario
        $query_verificar = "SELECT id_me_gusta_publicacion FROM me_gusta_publicaciones WHERE fk_id_usuario = ? AND fk_id_publicacion = ?";
        $stmt_verificar = mysqli_prepare($conn, $query_verificar);
        mysqli_stmt_bind_param($stmt_verificar, "ii", $usuarioId, $publicacionId);
        mysqli_stmt_execute($stmt_verificar);
        mysqli_stmt_store_result($stmt_verificar);

        // Si ya existe un registro, eliminarlo
        if (mysqli_stmt_num_rows($stmt_verificar) > 0) {
            $query_eliminar = "DELETE FROM me_gusta_publicaciones WHERE fk_id_usuario = ? AND fk_id_publicacion = ?";
            $stmt_eliminar = mysqli_prepare($conn, $query_eliminar);
            mysqli_stmt_bind_param($stmt_eliminar, "ii", $usuarioId, $publicacionId);
            $resultado_eliminar = mysqli_stmt_execute($stmt_eliminar);

            if ($resultado_eliminar) {
                // Si se eliminó correctamente, enviar una respuesta JSON con éxito
                echo json_encode(array('success' => true, 'action' => 'unlike'));
            } else {
                // Si ocurrió un error al eliminar el like, enviar una respuesta JSON con el mensaje de error
                echo json_encode(array('error' => 'Error al eliminar el like en la base de datos.'));
            }
        } else {
            // Si no existe un registro, insertarlo
            $query_insertar = "INSERT INTO me_gusta_publicaciones (fk_id_usuario, fk_id_publicacion) VALUES (?, ?)";
            $stmt_insertar = mysqli_prepare($conn, $query_insertar);
            mysqli_stmt_bind_param($stmt_insertar, "ii", $usuarioId, $publicacionId);
            $resultado_insertar = mysqli_stmt_execute($stmt_insertar);

            if ($resultado_insertar) {
                // Si se insertó correctamente, enviar una respuesta JSON con éxito
                echo json_encode(array('success' => true, 'action' => 'like'));
            } else {
                // Si ocurrió un error al insertar el like, enviar una respuesta JSON con el mensaje de error
                echo json_encode(array('error' => 'Error al guardar el like en la base de datos.'));
            }
        }

        // Cerrar las declaraciones
        mysqli_stmt_close($stmt_verificar);
        mysqli_stmt_close($stmt_insertar);
        mysqli_stmt_close($stmt_eliminar);

        // Cerrar la conexión a la base de datos
        mysqli_close($conn);
    } else {
        // Si no se pudo obtener el ID de usuario de la sesión, enviar una respuesta JSON con un mensaje de error
        echo json_encode(array('error' => 'No se pudo obtener el ID de usuario.'));
    }
} else {
    // Si no se recibió el ID de la publicación, enviar una respuesta JSON con un mensaje de error
    echo json_encode(array('error' => 'No se recibió el ID de la publicación.'));
}
