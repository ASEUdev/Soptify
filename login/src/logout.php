<?php
// Iniciar o reanudar la sesión
session_start();

// Destruir todas las variables de sesión
$_SESSION = array();

// Finalizar la sesión
session_destroy();

// Redirigir al usuario a la página de inicio de sesión (ajustar la ubicación según tu aplicación)
echo "<meta http-equiv='refresh' content='0;url=../../'>";
?>
