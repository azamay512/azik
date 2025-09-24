<?php include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];


    $passwordHash = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (email, password)
            VALUES ('$email', '$passwordHash')";

    if ($conn->query($sql) === TRUE) {
        echo "<p style='color:green;'>Yangi foydalanuvchi ro'yxatdan o'tdi!</p>";
    } else {
        echo "Xatolik: " . $conn->error;
    }
}
?>

<br><br>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    body{
        
    }
</style>
<body>
    <h2>Ro'yxatdan o'tish</h2>
<form method="POST" action="insert.php">
    Email: <input type="email" name="email" required><br><br>
    Parol: <input type="password" name="password" required><br><br>
    <input type="submit" value="Ro'yxatdan o'tish">
</form>
</body>
</html>