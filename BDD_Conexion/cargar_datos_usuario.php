<?php
// iniciar sesion si no esta iniciada
// iniciar sesion si no esta iniciada
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// verificar si el usuario ha iniciado sesion y tiene un ID de usuario almacenado en la sesion
if (isset($_SESSION['id_usuario'])) {
    // Conectar a la base de datos
    include('Conexion.php');

    // obtener el ID de usuario de la sesion
    $id_usuario = $_SESSION['id_usuario'];

    // consulta SQL para obtener el nombre de la imagen del perfil del usuario
    $query = "SELECT i.imagen AS imagen, u.nombre_usuario AS nombre_usuario
            FROM usuarios u
            LEFT JOIN imagenes i ON u.fk_id_imagen = i.id_imagen
            WHERE u.id_usuario = ?";

    // Preparar la consulta
    $stmt = mysqli_prepare($conn, $query);

    // Vincular parametros
    mysqli_stmt_bind_param($stmt, "i", $id_usuario);

    // Ejecutar la consulta
    mysqli_stmt_execute($stmt);

    // Vincular resultados
    mysqli_stmt_bind_result($stmt, $imagen, $nombre_usuario);

    // Obtener el resultado
    mysqli_stmt_fetch($stmt);

    // Cerrar la consulta
    mysqli_stmt_close($stmt);

    // Cerrar la conexion
    mysqli_close($conn);

    // Mostrar la imagen del perfil del usuario y su nombre si se encontraron
    if ($imagen && $nombre_usuario) {
        // Si se encontro una imagen y un nombre de usuario
        $response = '<img src="../rsc/uploads/' . $imagen . '" alt="Foto de perfil del usuario" width="50" height="50" class="rounded-circle me-2" style="margin-left:10px;">';
        $response .= '<ul class="navbar-nav me-1 "><li class="nav-item dropdown">';
        $response .= '<a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">';
        $response .= $nombre_usuario . '</a><ul class="dropdown-menu" style="margin-right: 150px;">';
        $response .= '<li><button data-toggle="modal" data-target="#Ver_perfil" class="dropdown-item" type="button">Ver Perfil</button></li>';
        $response .= '<li><a class="dropdown-item" href="#">Localizacion</a></li>';
        $response .= '<li><hr class="dropdown-divider"></li>';
        $response .= '<li><a class="dropdown-item" href="../BDD_Conexion/Cerrar_sesion.php">Cerrar sesion</a></li>';
        $response .= '</ul></li>';
        // $response .= '<li class="nav-item"><a class="nav-link" href="#">Notificaciones</a></li>';
        // $response .= '<li class="nav-item"><a class="nav-link" href="#">Mensajes</a></li>';
        $response .= '<li class="nav-item"><button data-toggle="modal" data-target="#Crear_publicacion" class="btn btn-success" type="button">Crear nuevo post</button></li>';
        $response .= '</ul>';
        echo $response;
    } else {
        // Si la imagen o el nombre del usuario no se encontraron
        // Mostrar una foto predeterminada y el nombre de usuario como "Usuario Anonimo"
        $response = '<img src="../rsc/uploads/default.jpg" alt="Foto de perfil predeterminada" width="50" height="50" class="rounded-circle me-2" style="margin-left:10px;">';
        $response .= '<ul class="navbar-nav me-1 "><li class="nav-item dropdown">';
        $response .= '<a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">';
        $response .= $nombre_usuario . '</a><ul class="dropdown-menu" style="margin-right: 150px;">';
        $response .= '<li><button data-toggle="modal" data-target="#Ver_perfil" class="dropdown-item" type="button">Ver Perfil</button></li>';
        $response .= '<li><a class="dropdown-item" href="#">Localizacion</a></li>';
        $response .= '<li><hr class="dropdown-divider"></li>';
        $response .= '<li><a class="dropdown-item" href="../BDD_Conexion/Cerrar_sesion.php">Cerrar sesion</a></li>';
        $response .= '</ul></li>';
        // $response .= '<li class="nav-item"><a class="nav-link" href="#">Notificaciones</a></li>';
        // $response .= '<li class="nav-item"><a class="nav-link" href="#">Mensajes</a></li>';
        $response .= '<li class="nav-item"><button data-toggle="modal" data-target="#Crear_publicacion" class="btn btn-success" type="button">Crear nuevo post</button></li>';
        $response .= '</ul>';
        echo $response;
    }
} else {
    echo "Usuario no identificado";
}
