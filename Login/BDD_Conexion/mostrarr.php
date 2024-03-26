<?php
include("Conexion.php");

$resultado = mysqli_query($conn, "SELECT * FROM $tabla2 order by $tabla2.nota desc");

while ($consulta = mysqli_fetch_array($resultado)) {


    echo "<h1>" . "Estudiante: " . $consulta["nombre"] . " " . $consulta["apellido"] . " " . $consulta["nota"] . "</h1>";
}
