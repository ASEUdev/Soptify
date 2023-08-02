<?php
require_once 'conn.php';

// Verificamos si se ha enviado el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtenemos los datos ingresados por el usuario
    $nombre = $_POST['username'];
    $password = $_POST['password'];
    try {
        // Conectamos a la base de datos
        $mysqli = conn();

        // Verificamos si el usuario ya existe en la base de datos
        $stmt = $mysqli->prepare("SELECT * FROM users WHERE user = ?");
        $stmt->bind_param('s', $nombre);
        $stmt->execute();

        if ($stmt->fetch()) {
            // El usuario ya existe en la base de datos
            echo "El usuario ya existe en la base de datos.";
        } else {
            // Insertamos el usuario en la base de datos
            $stmt = $mysqli->prepare("INSERT INTO users (user, password) VALUES (?, ?)");
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $stmt->bind_param('ss', $nombre, $hashed_password);
            $stmt->execute();

            // El usuario fue insertado correctamente en la base de datos
            echo "El usuario fue registrado correctamente.";
            header("Location: index.php");
            exit();
        }

        // Cerramos la conexión a la base de datos
        $mysqli->close();
    } catch (Exception $e) {
        // Hubo un error al conectarse a la base de datos o al realizar la consulta
        echo "Hubo un error al registrar el usuario: " . $e->getMessage();
    }
}
?>