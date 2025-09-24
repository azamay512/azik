<?php
include "db.php";
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

  
    $stmt = $conn->prepare("SELECT * FROM sos WHERE email = ? AND password = ?");
    $stmt->execute([$email, $password]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
    
        header("Location: select.php");
        exit;
    } else {
        $error = "Xato";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <h1>Kirish</h1>

    <?php if (!empty($error)): ?>
        <p style="color: red;"><?= $error ?></p>
    <?php endif; ?>

    
    <form method="POST" action="">
        <input type="text" name="email" placeholder="Email" required>
        <br><br>
        <input type="password" name="password" placeholder="Parol" required>
        <br><br>
        <button type="submit">Kirish</button>
    </form>
</body>
</html>
