<?php
include("Conexion.php");

// Obtener los datos del formulario
$nombre = $_POST['name_R'];
$username = $_POST['username_R'];
$correo = $_POST['email_R'];
$contraseña = $_POST['password_R'];
$continente = $_POST['continent']; // Asegúrate de que estos valores se estén enviando desde el formulario
$pais = $_POST['country']; // Asegúrate de que estos valores se estén enviando desde el formulario
$estado = $_POST['state']; // Asegúrate de que estos valores se estén enviando desde el formulario
$cifrado = password_hash($contraseña, PASSWORD_BCRYPT);

// Verificar si el correo y el nombre de usuario ya están en uso
$sql_verificar_datos = "SELECT * FROM $tabla WHERE correo = ? OR nombre_usuario = ?";
$stmt_verificar_datos = $conn->prepare($sql_verificar_datos);
$stmt_verificar_datos->bind_param("ss", $correo, $username);
$stmt_verificar_datos->execute();
$result_verificar_datos = $stmt_verificar_datos->get_result();

if ($result_verificar_datos->num_rows > 0) {
    echo "Correo o nombre de usuario ya en uso";
} else {
    // Insertar el nuevo usuario
    $sql_insertar_usuario = "INSERT INTO usuarios(nombre, nombre_usuario, correo, contraseña, continente, pais, estado) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt_insertar_usuario = $conn->prepare($sql_insertar_usuario);
    $stmt_insertar_usuario->bind_param("sssssss", $nombre, $username, $correo, $cifrado, $continente, $pais, $estado);

    if ($stmt_insertar_usuario->execute()) {
        echo "Registro exitoso";
        $stmt_verificar_datos->close();
        $stmt_insertar_usuario->close();
        $conn->close();
    } else {
        echo "Registro fallido";
    }
}
