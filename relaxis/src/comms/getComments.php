<?php
require_once "../../../login/src/conn.php";



$conn = conn();
$sql = "SELECT comment, created_at FROM comments ORDER BY created_at DESC";
$result = $conn->query($sql);


if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $comment = $row["comment"];
        $created_at = $row["created_at"];
        
        echo "<div class='comment'>";
        echo "<p><strong>Usuario Anonimo, Fecha:</strong> $created_at</p>";
        echo "<p>&ensp;&ensp;$comment</p>";
        echo "</div>";
    }
} else {
    echo "¡Sé el primero en comentar!";
}


$conn->close();
?>
