<?php
require_once('conn.php');

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = $_POST["username"];
    $password = $_POST["password"];
    $conn = conn();


    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    $sql = "SELECT id, username, password FROM user WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows == 1) {
        $stmt->bind_result($user_id, $found_username, $hashed_password);
        $stmt->fetch();

        if (password_verify($password, $hashed_password)) {
            $_SESSION["user_id"] = $user_id;
            header("Location: ../../relaxis/index.php");
        } else {
            echo "<script>alert('Nombre de usuario o contraseña incorrectos.')</script>";
            echo "<meta http-equiv='refresh' content='0;url=../../'>";
        }
    } else {
        echo "<script>alert('El usuario no se encuentra en nuestra base de datos')</script>";
        echo "<meta http-equiv='refresh' content='0;url=../../'>";
    }

    $stmt->close();
    $conn->close();
}
?>