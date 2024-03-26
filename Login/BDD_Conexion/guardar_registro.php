<?php
include("Conexion.php");

// Obtener los datos del formulario
$nombre = $_POST['nameR'];
$correo = $_POST['emailR'];
$contraseña = $_POST['passwordR'];
$cifrado = password_hash($contraseña, PASSWORD_BCRYPT);

// Verificar si el correo ya está en uso
$sql_verificar_correo = "SELECT * FROM $tabla WHERE correo = ?";
$stmt_verificar_correo = $conn->prepare($sql_verificar_correo);
$stmt_verificar_correo->bind_param("s", $correo);
$stmt_verificar_correo->execute();
$result_verificar_correo = $stmt_verificar_correo->get_result();

if ($result_verificar_correo->num_rows > 0) {
    echo "Correo ya en uso";
} else {
    // Insertar el nuevo usuario
    $sql_insertar_usuario = "INSERT INTO usuarios(nombre, correo, contraseña) VALUES (?, ?, ?)";
    $stmt_insertar_usuario = $conn->prepare($sql_insertar_usuario);
    $stmt_insertar_usuario->bind_param("sss", $nombre, $correo, $cifrado);

    if ($stmt_insertar_usuario->execute()) {
        echo "Registro exitoso";
    } else {
        echo "Registro fallido";
    }
}

$stmt_verificar_correo->close();
$stmt_insertar_usuario->close();
$conn->close();
