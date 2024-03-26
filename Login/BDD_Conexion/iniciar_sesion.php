<?php
// Iniciar la sesion
session_start();

include('Conexion.php');

$correo = $_POST['email_L'];
$contraseña = $_POST['password_L'];

// Preparar la consulta con marcadores de posicion
$stmt = $conn->prepare("SELECT * FROM $tabla WHERE correo = ?");
$stmt->bind_param("s", $correo);
$stmt->execute();
$resultado = $stmt->get_result();

// Verificar si se encontraron resultados
if ($resultado->num_rows >= 1) {
    // Obtener el primer resultado
    $consulta = $resultado->fetch_assoc();

    // Verificar la contraseña
    if (password_verify($contraseña, $consulta['contraseña'])) {
        // Almacenar la identificación del usuario en la sesion
        $_SESSION['user_id'] = $consulta['id_usuario'];
        // Otros datos del usuario que desees almacenar en la sesion
        $_SESSION['username'] = $consulta['nombre_usuario'];

        echo 'Inicio de sesión exitoso';
    } else {
        echo 'Contraseña incorrecta';
    }
} else {
    echo 'Correo inválido o inexistente';
}

// Cerrar la consulta y la conexion
$stmt->close();
$conn->close();
