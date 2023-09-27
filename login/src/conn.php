<?php
require_once 'config.php';
function conn(){
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    return $conn;
    
    if ($conn->connect_error) {
        die('Error al conectar a la base de datos: ' . $conn->connect_error);
    }
}

?>