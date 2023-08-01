<?php
// Datos base de datos
$servername = 'localhost';
$username = 'admin';
$password = '';
$dbName = '';

// establecer la conexión
$conn = new mysqli($servername, $username, $password, $dbName);

// errores en la conexión
if ($conn->connect_error) {
    die('Error al conectar a la base de datos: ' . $conn->connect_error);
}
?>