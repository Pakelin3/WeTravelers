<?php
$servername = "localhost";
$database = "wetravelers";
$username = "root";
$password = "";
$tabla = "usuarios";
$conn = new mysqli($servername, $username, $password, $database);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
