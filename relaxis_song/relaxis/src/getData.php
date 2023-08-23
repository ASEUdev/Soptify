<?php
// ARREGLAR ESTO 
require_once 'C:\xampp\htdocs\relaxis_song\login\src\conn.php';
function getUser($id){
    
    $conn = conn();
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
    $conn = conn();
    
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