<?php
require_once 'conn.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener datos del formulario
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Crear conexión a la base de datos (ajustar según tus credenciales)
    $conn = conn();

    // Verificar la conexión
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Verificar si el nombre de usuario ya existe
    $sqlCheckUser = "SELECT * FROM user WHERE username=?";
    $stmt = $conn->prepare($sqlCheckUser);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // El nombre de usuario ya existe
        $text = "El nombre de usuario ya está en uso. Por favor, elige otro.";
        echo "<script>alert('$text')</script>";
        echo "<meta http-equiv='refresh' content='0;url=../../'>";
    } else {
        // Insertar el nuevo usuario en la base de datos
        $sqlInsertUser = "INSERT INTO user (username, password) VALUES (?, ?)";
        $stmt = $conn->prepare($sqlInsertUser);
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT); // Hash de la contraseña
        $stmt->bind_param("ss", $username, $hashedPassword);
        if ($stmt->execute()) {
            echo "<meta http-equiv='refresh' content='0;url=../../'>";
            echo "<script>alert('Usuario creado correctamente')</script>";
        } else {
            $text = "Error al crear la sesión: " . $stmt->error;
            echo "<script>alert('$text')</script>";
            echo "<meta http-equiv='refresh' content='0;url=../../'>";
        }
    }
    // Cerrar conexión
    $stmt->close();
    $conn->close();
}
?>