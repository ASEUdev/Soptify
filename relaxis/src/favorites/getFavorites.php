<?php
session_start();
require_once "../../../login/src/conn.php";

$userID = obtenerUserID();
$conn = conn();


if ($conn->connect_error) {
    die("Error en la conexión a la base de datos: " . $conn->connect_error);
}


$query = "SELECT * FROM favorites WHERE id_user = ?";
if ($stmt = $conn->prepare($query)) {
    $stmt->bind_param("i", $userID);
    $stmt->execute();
    $result = $stmt->get_result();

    
    $resultados = array();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $resultados[] = $row;
        }
    }

    
    echo json_encode($resultados);

    $stmt->close();
} else {
    echo "Error en la preparación de la consulta: " . $conn->error;
}

$conn->close();

function obtenerUserID()
{
    return $_SESSION["user_id"];
}
?>