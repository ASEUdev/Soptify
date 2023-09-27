<?php
session_start();
require_once "../../../login/src/conn.php";

$category = $_POST['category'];
$sound = $_POST['sound'];
$userID = obtenerUserID();

$conn = conn();

if ($conn->connect_error) {
    die("Error en la conexión a la base de datos: " . $conn->connect_error);
}

$query = "SELECT COUNT(*) AS count FROM favorites WHERE category = ? AND sound = ? AND id_user = ?";
if ($stmt = $conn->prepare($query)) {
    $stmt->bind_param("ssi", $category, $sound, $userID);
    $stmt->execute();
    $stmt->bind_result($count);
    $stmt->fetch();
    $stmt->close();

    if ($count > 0) {
        $deleteQuery = "DELETE FROM favorites WHERE category = ? AND sound = ? AND id_user = ?";
        if ($deleteStmt = $conn->prepare($deleteQuery)) {
            $deleteStmt->bind_param("ssi", $category, $sound, $userID);
            if ($deleteStmt->execute()) {
                echo "Registro existente eliminado.";
            } else {
                echo "Error al eliminar el registro existente: " . $deleteStmt->error;
            }
            $deleteStmt->close();
        } else {
            echo "Error en la preparación de la declaración de eliminación: " . $conn->error;
        }
    } else {
        
        $insertQuery = "INSERT INTO favorites (category, sound, id_user) VALUES (?, ?, ?)";
        if ($insertStmt = $conn->prepare($insertQuery)) {
            $insertStmt->bind_param("ssi", $category, $sound, $userID);
            if ($insertStmt->execute()) {
                echo "Inserción exitosa en la tabla de favoritos";
            } else {
                echo "Error en la inserción: " . $insertStmt->error;
            }
            $insertStmt->close();
        } else {
            echo "Error en la preparación de la declaración de inserción: " . $conn->error;
        }
    }
} else {
    echo "Error en la preparación de la declaración de verificación: " . $conn->error;
}

$conn->close();

function obtenerUserID()
{
    return $_SESSION["user_id"];
}
?>