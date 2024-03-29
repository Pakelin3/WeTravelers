<?php
// Incluir el archivo de conexión a la base de datos
include('Conexion.php');

// Consultar las publicaciones ordenadas por fecha (de la más reciente a la más antigua)
$query = "SELECT 
    p.*, 
    u.nombre_usuario AS nombreUsuario, 
    i.imagen AS imagenPublicacion, 
    i2.imagen AS imagenUsuario 
FROM 
    publicaciones p
INNER JOIN 
    usuarios u ON p.fk_id_usuario = u.id_usuario
INNER JOIN 
    imagenes i ON i.id_imagen = p.fk_id_imagen
INNER JOIN 
    imagenes i2 ON i2.id_imagen = u.fk_id_imagen 
ORDER BY 
    p.fecha DESC
";
$resultado = mysqli_query($conn, $query);

// Verificar si hay resultados
if ($resultado) {
    // Array para almacenar las publicaciones
    $publicaciones = array();

    // Iterar sobre los resultados y guardar cada publicación en el array
    // Iterar sobre los resultados y guardar cada publicación en el array
    while ($fila = mysqli_fetch_assoc($resultado)) {
        $publicacion = array(
            'id_publicacion' => $fila['id_publicacion'],
            'titulo' => $fila['titulo'],
            'descripcion' => $fila['descripcion'],
            'imagenPublicacion' => '../rsc/uploads/' . $fila['imagenPublicacion'], // Usa el alias correcto para la imagen de la publicación
            'ubicacion' => $fila['ubicacion'],
            'nombreUsuario' => $fila['nombreUsuario'],
            'imagenUsuario' => '../rsc/uploads/' . $fila['imagenUsuario'] // Ajusta la ruta de la imagen del usuario
        );
        // Agregar la publicación al array de publicaciones
        $publicaciones[] = $publicacion;
    }


    // Devolver las publicaciones en formato JSON
    echo json_encode($publicaciones);
} else {
    // Enviar un mensaje de error si no se pueden obtener las publicaciones
    echo json_encode(array('error' => 'No se pudieron obtener las publicaciones.'));
}

// Cerrar la conexión a la base de datos
mysqli_close($conn);
