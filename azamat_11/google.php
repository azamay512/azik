<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "profill";

$conn = new mysqli($servername,$username,$password,$dbname);

if ($conn->connect_error) {
    die("connect file" . $conn->connect_error);
}

$sql = "UPDATE user SET firstname='john' WHERE id=2";

if ($conn->query($sql) === TRUE) {
    echo "qabul qilindi";
} else {
    echo "xatolik" . $conn->error;
}

$conn->close();
?>