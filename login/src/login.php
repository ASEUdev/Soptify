<?php
require_once('conn.php');
// Iniciar o reanudar la sesión
session_start();

// Verificar si el usuario ya ha iniciado sesión
if (isset($_SESSION["user_id"])) {
    // Redirigir al usuario si ya ha iniciado sesión
    header("Location: ../../relaxis/index.php");
    exit();
}

// Procesar el formulario de inicio de sesión
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener datos del formulario
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Crear conexión
    $conn = conn();

    // Verificar la conexión
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Consulta preparada para buscar el usuario en la base de datos
    $sql = "SELECT id, username, password FROM user WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();

    // Verificar si se encontró el usuario
    if ($stmt->num_rows == 1) {
        // Vincular las columnas del resultado
        $stmt->bind_result($user_id, $found_username, $hashed_password);
        $stmt->fetch();

        // Verificar la contraseña usando password_verify
        if (password_verify($password, $hashed_password)) {
            // Inicio de sesión exitoso
            $_SESSION["user_id"] = $user_id;
            echo "<meta http-equiv='refresh' content='0;url=../../'>";
        } else {
            // Contraseña incorrecta
            $error_message = "Nombre de usuario o contraseña incorrectos.";
        }
    } else {
        // Usuario no encontrado
        $error_message = "Nombre de usuario o contraseña incorrectos.";
    }

    // Cerrar la conexión
    $stmt->close();
    $conn->close();
}
?>