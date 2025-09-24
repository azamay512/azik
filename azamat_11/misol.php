<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "php";

$conn = mysqli_connect($servername,$username,$password,$dbname);

if (!$conn) {
    die("connect file" . mysqli_connect_error());
}
  
$sql = "INSERT INTO tictoc (firstname,lastname,email)
VALUES  ('ulugbek','Nabijonov','lugbek@gmail.com')";

if (mysqli_query($conn , $sql)) {
    $last_id = mysqli_insert_id($conn);
    echo "malumot tablega qushildi" . $last_id;
} else {
    echo "Error" . $sql . "<br>" . mysqli_connect_error($conn);
}
mysqli_close($conn);
?>