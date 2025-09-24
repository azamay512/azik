<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "web";



if ($conn->connect_error) {
    die("connect file" . $conn->connect_error);
}
       
$sql = "INSERT INTO webtable (firstname,lastname,email)
VALUES  ('Azamat','asqaraliyev','azamat@gmail.com)";

if ($conn->query($sql) === TRUE) {
    echo "Malumotlar bazasi qushildi";
}else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
?>