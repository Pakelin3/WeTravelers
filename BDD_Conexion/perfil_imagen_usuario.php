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
    // Generar un nombre aleatorio para la imagen
    $random_name = generateRandomName("../rsc/uploads/", $_FILES["image"]["name"]);

    // Directorio donde se guardará la imagen
    $target_dir = "../rsc/uploads/";
    $target_file = $target_dir . $random_name;

    // Verifica si la inserción de la imagen fue exitosa
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
        // Inserta la imagen en la base de datos
        $query = "INSERT INTO imagenes (imagen) VALUES (?)";
        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt, "s", $random_name);
        $resultado = mysqli_stmt_execute($stmt);

        // Verifica si la inserción en la base de datos fue exitosa
        if ($resultado) {
            // Obtener el ID de la imagen recién insertada
            $id_imagen = mysqli_insert_id($conn);

            // Actualiza el ID de la imagen en el registro del usuario
            $id_usuario = $_SESSION['id_usuario'];
            $query_update = "UPDATE usuarios SET fk_id_imagen = ? WHERE id_usuario = ?";
            $stmt_update = mysqli_prepare($conn, $query_update);
            mysqli_stmt_bind_param($stmt_update, "ii", $id_imagen, $id_usuario);
            $resultado_update = mysqli_stmt_execute($stmt_update);

            // Verifica si la actualización fue exitosa
            if ($resultado_update) {
                // Obtener el tipo de viajero seleccionado
                if (isset($_POST['tipo_viajero'])) {
                    $tipo_viajero = $_POST['tipo_viajero'];

                    // Actualiza el tipo de viajero del usuario
                    $query_tipo_viajero = "UPDATE usuarios SET fk_id_tipo_viajero = ? WHERE id_usuario = ?";
                    $stmt_tipo_viajero = mysqli_prepare($conn, $query_tipo_viajero);
                    mysqli_stmt_bind_param($stmt_tipo_viajero, "ii", $tipo_viajero, $id_usuario);
                    $resultado_tipo_viajero = mysqli_stmt_execute($stmt_tipo_viajero);

                    if ($resultado_tipo_viajero) {
                        echo "Imagen subida, asignada al usuario y tipo de viajero actualizado correctamente.";
                    } else {
                        echo "Error al actualizar el tipo de viajero del usuario.";
                    }
                } else {
                    echo "Error: No se ha seleccionado ningún tipo de viajero.";
                }
            } else {
                echo "Error al asignar la imagen al usuario.";
            }
        } else {
            echo "Error al guardar la imagen en la base de datos.";
        }
        mysqli_stmt_close($stmt);
    } else {
        echo "Error al subir la imagen al servidor.";
    }
    mysqli_close($conn);
} else {
    echo "No se ha enviado ninguna imagen.";
}

// Función para generar un nombre aleatorio para la imagen
function generateRandomName($target_dir, $original_name)
{
    $random_name = "";
    do {
        $random_name = generateRandomString() . "_" . $original_name;
    } while (file_exists($target_dir . $random_name));
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
