<?php
require_once "../../login/src/conn.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $conn = conn();
    $comment = $_POST["comment"];
    $currentDate = date("Y-m-d H:i:s");

    $stmt = $conn->prepare("INSERT INTO comments (comment, created_at) VALUES (?,?)");
    $stmt->bind_param("ss", $comment, $currentDate);
    if ($stmt->execute()) {
        echo "Comentario guardado exitosamente.";
    } else {
        echo "Error al guardar el comentario: " . $stmt->error;
    }

    $stmt->close();
}

// Cerrar la conexión
$conn->close();
?>