<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "myphp";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['password'])) {
        $name = $conn->real_escape_string($_POST['name']);
        $email = $conn->real_escape_string($_POST['email']);
        $password = $conn->real_escape_string($_POST['password']);

        $sql = "INSERT INTO col (name, email, password) VALUES ('$name', '$email', '$password')";

        if ($conn->query($sql) === TRUE) {
          echo "New record created successfully";
        } else {
          echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Iltimos, barcha maydonlarni to'ldiring.";
    }
}
  
$conn->close();
?>
<form method="POST" action="">
  <input type="text" name="name" placeholder="Ism">
  <input type="email" name="email" placeholder="Email">
  <input type="password" name="password" placeholder="Parol">
  <input type="submit" value="Yuborish">
</form>
