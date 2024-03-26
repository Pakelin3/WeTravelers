<?php
include('Conexion.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $correo = $_POST['email'];

    $sql = "SELECT * FROM usuarios WHERE email = '$correo'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo 'existente'; // Correo existente
    } else {
        // El correo no está registrado, puedes dejarlo vacío o devolver cualquier otro mensaje si lo deseas
    }
}
