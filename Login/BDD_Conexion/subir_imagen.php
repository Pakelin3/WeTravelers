<?php
include('Conexion.php');

if ($_FILES['image']) {
    $target_dir = "../../rsc/uploads/";
    $random_name = generateRandomName($target_dir, $_FILES["image"]["name"], $conn);
    $target_file = $target_dir . $random_name;

    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
        $query = "INSERT INTO imagenes (imagen) VALUES (?)";
        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt, "s", $random_name);
        $resultado = mysqli_stmt_execute($stmt);

        if ($resultado) {
            echo "Imagen guardada correctamente en la base de datos.";
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

function generateRandomName($target_dir, $original_name, $conn)
{
    $random_name = "";
    do {
        $random_name = generateRandomString() . "_" . $original_name;
    } while (file_exists($target_dir . $random_name) || checkExistingNameInDatabase($random_name, $conn));
    return $random_name;
}

function generateRandomString($length = 10)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, strlen($characters) - 1)];
    }
    return $randomString;
}

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
