<?php include 'db.php'; ?>

<h2>Foydalanuvchilar ro'yxati</h2>

<?php
$sql = "SELECT id, email FROM users";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<ul>";
    while($row = $result->fetch_assoc()) {
        echo "<li>ID: " . $row["id"] . " - Email: " . $row["email"] . "</li>";
    }
    echo "</ul>";
} else {
    echo "Hali hech qanday foydalanuvchi yo‘q.";
}

$conn->close();
?>

<br><br>