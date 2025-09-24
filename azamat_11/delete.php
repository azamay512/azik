<?php
include 'db.php';

if (isset($_GET['id'])) {
    $sql = "DELETE FROM sos WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->execute(['id' => $_GET['id']]);
}

header("Location: select.php");
exit;
?>
