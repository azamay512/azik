<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "profill";

$conn = new mysqli($servername,$username,$password,$dbname);

if ($conn->connect_error) {
   die("Connect file" . $conn->connect_error);
}

$stmt = $conn->prepare("INSERT INTO users (firstname,lastname,email) VALUES (?,?,?)");
$stmt->bind_param("sss", $firstname,$lastname,$email);

$firstname = "Azamat";
$lastname = "Asqaraliyef";
$email = "azamat@example.com";
$stmt->execute();

$firstname = "Abror";
$lastname = "Islomov";
$email = "abror@example.com";
$stmt->execute();

$firstname = "ibrohim";
$lastname = "odiljonov";
$email = "ibrohim@example.com";
$stmt->execute();

echo "qabul qilindi";

$conn->close();
$stmt->close();
?>