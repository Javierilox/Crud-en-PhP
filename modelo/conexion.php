<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "usuarios";

$conn = new mysqli($host, $user, $password, $database);
if ($conn->connect_errno) {
    die("Error al conectar a la base de datos: " . $conn->connect_error);
}
$conn->set_charset("utf8");
?>