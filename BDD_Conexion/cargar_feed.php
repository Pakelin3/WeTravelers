<?php
// Incluir el archivo de conexion a la base de datos
include('Conexion.php');

// Iniciar la sesion si aun no se ha iniciado
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Consultar las publicaciones ordenadas por fecha (de la mas reciente a la mas antigua)
$query = "SELECT 
    p.*, 
    u.nombre_usuario AS nombreUsuario, 
    i.imagen AS imagenPublicacion, 
    i2.imagen AS imagenUsuario,
    ubicacion,
    COUNT(mg.id_me_gusta_publicacion) AS likes,
    COUNT(CASE WHEN mg.fk_id_usuario = ? THEN 1 END) AS usuario_dio_like
FROM 
    publicaciones p
INNER JOIN 
    usuarios u ON p.fk_id_usuario = u.id_usuario
INNER JOIN 
    imagenes i ON i.id_imagen = p.fk_id_imagen
INNER JOIN 
    imagenes i2 ON i2.id_imagen = u.fk_id_imagen 
LEFT JOIN
    me_gusta_publicaciones mg ON p.id_publicacion = mg.fk_id_publicacion
GROUP BY
    p.id_publicacion
ORDER BY 
    p.fecha DESC

";
$stmt = mysqli_prepare($conn, $query);
if ($stmt) {
    // Obtener el ID de usuario desde la sesion
    $usuarioId = isset($_SESSION['id_usuario']) ? $_SESSION['id_usuario'] : null;
    // Vincular parametros
    mysqli_stmt_bind_param($stmt, "i", $usuarioId);
    // Ejecutar la consulta
    mysqli_stmt_execute($stmt);
    // Obtener el resultado
    $resultado = mysqli_stmt_get_result($stmt);

    // Verificar si hay resultados
    if ($resultado) {
        // Array para almacenar las publicaciones
        $publicaciones = array();

        // Iterar sobre los resultados y guardar cada publicacion en el array
        while ($fila = mysqli_fetch_assoc($resultado)) {
            $publicacion = array(
                'id_publicacion' => $fila['id_publicacion'],
                'titulo' => $fila['titulo'],
                'descripcion' => $fila['descripcion'],
                'imagenPublicacion' => '../rsc/uploads/' . $fila['imagenPublicacion'],
                'ubicacion' => $fila['ubicacion'],
                'nombreUsuario' => $fila['nombreUsuario'],
                'imagenUsuario' => '../rsc/uploads/' . $fila['imagenUsuario'],
                'likes' => $fila['likes'], // Agregar el recuento de likes a la respuesta JSON
                'usuario_dio_like' => $fila['usuario_dio_like'] // Agregar informacion sobre si el usuario dio like
            );
            // Agregar la publicacion al array de publicaciones
            $publicaciones[] = $publicacion;
        }

        // Devolver las publicaciones en formato JSON
        echo json_encode($publicaciones);
    } else {
        // Enviar un mensaje de error si no se pueden obtener las publicaciones
        echo json_encode(array('error' => 'No se pudieron obtener las publicaciones.'));
    }
    // Cerrar la declaracion
    mysqli_stmt_close($stmt);
} else {
    // Si la consulta no se preparo correctamente, enviar una respuesta JSON con el mensaje de error
    echo json_encode(array('error' => 'Error al preparar la consulta.'));
}
// Cerrar la conexion a la base de datos
mysqli_close($conn);
