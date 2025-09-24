<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "web";

$conn = mysqli_connect($servername,$username,$password,$dbname);

if ($conn->connect_error) {
    die("connect file" . $conn->connect_error);
}

$sql = "CREATE table webtabl (
id int(30) AUTO_INCREMENT PRIMARY KEY,
firstname varchar(30) not null,
lastname varchar(30) not null,
email varchar(50),
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
    echo "Malumotlar bazasi qushildi";
}else {
    echo "bunday malumotlar bazasi mavjud" . $conn->error;
}
?>