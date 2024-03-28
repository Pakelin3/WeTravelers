<?php
// Iniciar la sesion
session_start();

include('Conexion.php');

$correo = $_POST['email_L'];
$contraseña = $_POST['password_L'];

// Preparar la consulta con marcadores de posición
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
        // Almacenar la identificación del usuario en la sesión
        $_SESSION['id_usuario'] = $consulta['id_usuario'];

        // Verificar si el campo fk_id_imagen es nulo
        if (is_null($consulta['fk_id_imagen'])) {
            echo 'Redirigir a perfil'; // Redirigir a perfil.php para asignar una imagen
        } else {
            // Otros datos del usuario que desees almacenar en la sesión
            $_SESSION['nombre'] = $consulta['nombre'];

            echo 'Inicio de sesión exitoso';
        }
    } else {
        echo 'Contraseña incorrecta';
    }
} else {
    echo 'Correo inválido o inexistente';
}

// Cerrar la consulta y la conexión
$stmt->close();
$conn->close();
