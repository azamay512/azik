<?php
include 'db.php';

$id = $_GET['id'] ?? null;

if (!$id) {
    die("ID parametri kiritilmadi");
}

$stmt = $conn->prepare("SELECT * FROM user WHERE id = :id");
$stmt->execute(['id' => $id]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$user) {
    die("Foydalanuvchi topilmadi");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];

    $sql = "UPDATE user SET name = :name, email = :email WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->execute([
        'name' => $name,
        'email' => $email,
        'id' => $id
    ]);
    echo "Ma'lumot yangilandi";
}
?>

<form method="post">
    <input type="text" name="name" value="<?= htmlspecialchars($user['name']); ?>" required>
    <input type="email" name="email" value="<?= htmlspecialchars($user['email']); ?>" required>
    <button type="submit">Yangilash</button>
</form>