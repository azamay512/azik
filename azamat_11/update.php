<?php
include 'db.php';

$id = $_GET['id'] ?? null;

if (!$id) {
    die("ID topilmadi");
}

$stmt = $conn->prepare("SELECT * FROM sos WHERE id = :id");
$stmt->execute(['id' => $id]);
$data = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$data) {
    die("Foydalanuvchi topilmadi");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
 $fullname = $_POST['fullname'];
$email    = $_POST['email'];
$password = $_POST['password'];
$location = $_POST['location'];
$date     = $_POST['date'];
$tell     = $_POST['tell'];


$sql = "UPDATE sos SET
    fullname = :fullname,
    email = :email,
    password = :password,
    location = :location,
    date = :date,
    tell = :tell
    WHERE id = :id";

$stmt = $conn->prepare($sql);
$stmt->execute([
    ':fullname' => $fullname,
    ':email'    => $email,
    ':password' => $password,
    ':location' => $location,
    ':date'     => $date,
    ':tell'     => $tell,
    ':id'       => $id
]);

    header("Location: select.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Document</title>
</head>
<body>
    <h2>Foydalanuvchini tahrirlash</h2>
<form method="post">
    <input type="text" name="fullname" value="<?= htmlspecialchars($data['fullname']) ?>" required>
    <input type="email" name="email" value="<?= htmlspecialchars($data['email']) ?>" required>
    <input type="text" name="password" value="<?= htmlspecialchars($data['password']) ?>" required>
    <input type="text" name="location" value="<?= htmlspecialchars($data['location']) ?>" required>
    <input type="date" name="date" value="<?= htmlspecialchars($data['date']) ?>" required>
    <input type="text" name="tell" value="<?= htmlspecialchars($data['tell']) ?>" required>
    <button type="submit">Yangilash</button>
</form>

</body>
</html>
