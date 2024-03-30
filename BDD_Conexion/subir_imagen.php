<?php
include('Conexion.php');

// Verifica si el usuario esta autenticedo
session_start();
if (!isset($_SESSION['id_usuario'])) {
    echo "Error: Usuario no autenticado.";
    exit;
}

if ($_FILES['image']) {
    $target_dir = "../rsc/uploads/";
    $random_name = generateRandomName($target_dir, $_FILES["image"]["name"], $conn);
    $target_file = $target_dir . $random_name;

    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
        // Insertar la imagen en la base de datos
        $query = "INSERT INTO imagenes (imagen) VALUES (?)";
        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt, "s", $random_name);
        $resultado = mysqli_stmt_execute($stmt);

        if ($resultado) {
            // Obtener el ID de la imagen recien insertada
            $id_imagen = mysqli_insert_id($conn);

            // Obtener el ID de usuario de la sesion actual
            $id_usuario = $_SESSION['id_usuario'];

            // Obtener la ubicacion actual (aqui deberias incluir tu logica para obtener la ubicacion)
            $ubicacion = "Ubicacion actual"; // Debes reemplazar esto con tu logica para obtener la ubicacion

            // Obtener la fecha actual
            $fecha = date("Y-m-d H:i:s");

            // Obtener los otros datos del formulario
            $titulo = $_POST['titulo'];
            $descripcion = $_POST['descripcion'];
            $ubicacion = $_POST['ubicacion'];

            // Insertar los datos en la tabla de publicaciones
            $query_publicacion = "INSERT INTO publicaciones (fk_id_usuario, fk_id_imagen, titulo, descripcion, fecha, ubicacion) VALUES (?, ?, ?, ?, ?, ?)";
            $stmt_publicacion = mysqli_prepare($conn, $query_publicacion);
            mysqli_stmt_bind_param($stmt_publicacion, "iissss", $id_usuario, $id_imagen, $titulo, $descripcion, $fecha, $ubicacion);
            $resultado_publicacion = mysqli_stmt_execute($stmt_publicacion);

            if ($resultado_publicacion) {
                echo "Publicacion creada exitosamente.";
            } else {
                echo "Error al crear la publicacion.";
            }
        } else {
            echo "Error al guardar la imagen en la base de datos.";
        }
        mysqli_stmt_close($stmt);
    } else {
        echo "Error al subir la imagen al servidor.";
    }
} else {
    echo "No se ha enviado ninguna imagen.";
}

// Funcion para generar un nombre aleatorio para la imagen
function generateRandomName($target_dir, $original_name, $conn)
{
    $random_name = "";
    do {
        $random_name = generateRandomString() . "_" . $original_name;
    } while (file_exists($target_dir . $random_name) || checkExistingNameInDatabase($random_name, $conn));
    return $random_name;
}

// Funcion para generar una cadena aleatoria
function generateRandomString($length = 10)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, strlen($characters) - 1)];
    }
    return $randomString;
}

// Funcion para verificar si el nombre de la imagen ya existe en la base de datos
function checkExistingNameInDatabase($random_name, $conn)
{
    $query = "SELECT * FROM imagenes WHERE imagen = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "s", $random_name);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);
    $rows = mysqli_stmt_num_rows($stmt);
    mysqli_stmt_close($stmt);
    return $rows > 0;
}
