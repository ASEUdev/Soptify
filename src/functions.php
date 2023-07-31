<?php
require_once 'config.php';

function conectar_db() {
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    return $conn;
}

// Función para verificar si un correo electrónico ya está registrado en la base de datos
function checkEmail($email) {
    $conn = conectar_db();
  
    // Escapamos los caracteres especiales en el correo electrónico
    $email = mysqli_real_escape_string($conn, $email);
  
    $sql = "SELECT * FROM usuarios WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);
  
    if(mysqli_num_rows($result) > 0) {
      // El correo electrónico ya está registrado
      $conn->close();
      return true;
    } else {
      // El correo electrónico no está registrado
      $conn->close();
      return false;
    }
  }
?><?php
require_once 'config.php';

function conectar_db() {
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    return $conn;
}

// Función para verificar si un correo electrónico ya está registrado en la base de datos
function checkEmail($email) {
    $conn = conectar_db();
  
    // Escapamos los caracteres especiales en el correo electrónico
    $email = mysqli_real_escape_string($conn, $email);
  
    $sql = "SELECT * FROM usuarios WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);
  
    if(mysqli_num_rows($result) > 0) {
      // El correo electrónico ya está registrado
      $conn->close();
      return true;
    } else {
      // El correo electrónico no está registrado
      $conn->close();
      return false;
    }
  }
?>
