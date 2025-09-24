<?php
require 'google.php';

$name = $email = $phone = "";
$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name'] ?? "");
    $email = trim($_POST['email'] ?? "");
    $phone = trim($_POST['phone'] ?? "");
}
if($name === '') $errors['name'] = "ism kiritilishi shart";
if($email === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) $errors["email"] = 'Togri email kirit';
if (empty($errors)) {
    $sql = "INSERT INTO users (name,email,phone) VALUES (?,?,?)";
    $stmt = mysqli_prepare($conn,$sql);
    if ($stmt) {
        mysqli_stmt_bind_param($stmt,"sss",$name,$email,$phone);
        $exec = mysqli_stmt_execute($stmt);
        if ($exec) {
            mysqli_stmt_execute($stmt);
            header('Location: list.php?seccess=1');
            exit;
        } else {
            $errors['general'] = 'db xatosi' . mysqli_error($conn);
        }
    } else {
      $errors['general'] = 'db xatosi' . mysqli_error($conn);
    }
} 
?> 