<?php
require_once 'functions.php';

// Verificar si el formulario de inicio de sesión fue enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los valores del formulario
    $username = $_POST["username"];
    $password = $_POST["password"];

    try {
        // Conectarse a la base de datos
        $conn = conectar_db();

        // Buscar el usuario en la base de datos
        $sql = "SELECT * FROM usuarios WHERE username='$username' LIMIT 1";
        $result = $conn->query($sql);

        if ($result && $result->num_rows == 1) {
            // Obtener el registro del usuario
            $row = $result->fetch_assoc();

            // Verificar la contraseña
            if (password_verify($password, $row["password"])) {
                // Iniciar sesión
                session_start();
                $_SESSION["username"] = $row["username"];

                // Guardar el usuario
                $_SESSION["username"] = $username;

                // Redirigir al usuario a la página de inicio
                header("Location: spotify.php");
                exit();
            } else {
                // Contraseña incorrecta
                echo "Contraseña incorrecta";
            }
        } else {
            // Usuario no encontrado
            echo "El usuario no existe";
        }
    } catch (Exception $e) {
        // Error al ejecutar la consulta SQL
        echo "Error al buscar el usuario: " . $e->getMessage();
    }

    // Cerrar la conexión a la base de datos
    $conn->close();
} else {
    // Si el usuario ya ha iniciado sesión, redirigir a spotify.php
    session_start();
    if (isset($_SESSION["usuario"])) {
        header("Location: cajero.php");
        exit();
    }
}
?>