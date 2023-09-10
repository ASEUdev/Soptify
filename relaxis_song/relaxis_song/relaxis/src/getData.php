<?php
// ARREGLAR ESTO 
require_once 'config.php'; 
function conn1(){
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    return $conn;
    
    if ($conn->connect_error) {
        die('Error al conectar a la base de datos: ' . $conn->connect_error);
    }
}
function getUser($id){
    
    $conn = conn1();
    $query = "SELECT username FROM user WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->bind_result($username);
    $stmt->fetch();
    $stmt->close();

    return $username;
}
function confirmPass($id, $password){
    $conn = conn1();
    
    $sql = "SELECT id, username, password FROM user WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->store_result();
    if ($stmt->num_rows == 1) {
        $stmt->bind_result($user_id, $found_username, $hashed_password);
        $stmt->fetch();
        if (password_verify($password, $hashed_password)) {
            return true;
        } else {
           return false;
        }
    }
}
?>