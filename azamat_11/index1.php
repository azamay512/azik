<?php
include 'db.php'; 

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];

    $sql = "INSERT INTO user (name, email) VALUES (:name, :email)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([
        'name' => $name,
        'email' => $email
    ]);

    echo "Ma'lumot qo'shildi" . "<br>";
    echo "Name: " . htmlspecialchars($name) . "<br>";
    echo "Email: " . htmlspecialchars($email);
}
?>

<form method="post">
    <input type="text" name="name" placeholder="ism" required>
    <input type="email" name="email" placeholder="email" required>
    <button type="submit">qo'shish</button>
</form>