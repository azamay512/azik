<?php
include 'db.php';

if (isset($_GET['id'])){
    $sql = "DELETE FROM user WHERE id = :id";
    $stmt = $conn -> prepare($sql);
    $stmt->execute(['id' => $_GET['id']]);
    echo "o'chirish";
}
?>
<a href="select.php">ro'yhatga qaytish</a>