<?php
include('Conexion.php');

// Verifica si el usuario está autenticado
session_start();
if (!isset($_SESSION['id_usuario'])) {
    echo "Error: Usuario no autenticado.";
    exit;
}

// Verifica si se ha enviado una imagen
if ($_FILES['image']) {
    $target_dir = "../rsc/uploads/";
    $random_name = generateRandomName($target_dir, $_FILES["image"]["name"], $conn);
    $target_file = $target_dir . $random_name;

    // Verifica si se ha movido la imagen al servidor correctamente
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
        // Inserta la imagen en la base de datos
        $query = "INSERT INTO imagenes (imagen) VALUES (?)";
        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt, "s", $random_name);
        $resultado = mysqli_stmt_execute($stmt);

        // Verifica si la inserción de la imagen fue exitosa
        if ($resultado) {
            // Obtiene el ID de la imagen recién insertada
            $id_imagen = mysqli_insert_id($conn);

            // Actualiza el ID de la imagen en el registro del usuario
            $id_usuario = $_SESSION['id_usuario'];
            $query_update = "UPDATE usuarios SET fk_id_imagen = ? WHERE id_usuario = ?";
            $stmt_update = mysqli_prepare($conn, $query_update);
            mysqli_stmt_bind_param($stmt_update, "ii", $id_imagen, $id_usuario);
            $resultado_update = mysqli_stmt_execute($stmt_update);

            // Verifica si la actualización fue exitosa
            if ($resultado_update) {
                echo "Imagen subida y asignada al usuario correctamente.";
            } else {
                echo "Error al asignar la imagen al usuario.";
            }
        } else {
            echo "Error al guardar la imagen en la base de datos.";
        }
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
    } else {
        echo "Error al subir la imagen al servidor.";
    }
} else {
    echo "No se ha enviado ninguna imagen.";
}

// Función para generar un nombre aleatorio para la imagen
function generateRandomName($target_dir, $original_name, $conn)
{
    $random_name = "";
    do {
        $random_name = generateRandomString() . "_" . $original_name;
    } while (file_exists($target_dir . $random_name) || checkExistingNameInDatabase($random_name, $conn));
    return $random_name;
}

// Función para generar una cadena aleatoria
function generateRandomString($length = 10)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, strlen($characters) - 1)];
    }
    return $randomString;
}

// Función para verificar si el nombre de la imagen ya existe en la base de datos
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
