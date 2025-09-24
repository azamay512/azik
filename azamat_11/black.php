<?php

$file = "data.json";

$nameErr = $emailErr = "";
$name = $email = "";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);

    if ($name === "") {
        $nameErr = "Name is required";
    }

    if ($email === "") {
        $emailErr = "Email is required";
    }

    if ($name && $email) {
        $newData = ["name" => $name, "email" => $email];

        $data = file_exists($file) ? json_decode(file_get_contents($file), true) : [];

        $data[] = $newData;
        file_put_contents($file, json_encode($data, JSON_PRETTY_PRINT));
    }
}


if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    if (file_exists($file)) {
        $data = json_decode(file_get_contents($file), true);
        if (isset($data[$id])) {
            unset($data[$id]);
            $data = array_values($data); 
            file_put_contents($file, json_encode($data, JSON_PRETTY_PRINT));
        }
    }
    header("Location: black.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<style>
    body {
    background-color: #111827;
    font-family: Arial, sans-serif;
    color: #fff;
    margin: 0;
    padding: 0;
    display: flex;
    flex-direction: column;
    align-items: center;
}


.form-container {
    background: #1f2937;
    padding: 30px 40px;
    margin-top: 200px;
    width: 350px;
    height: 300px;
    border-top-left-radius: 50px;
    border-bottom-right-radius: 50px;
}

.table-wrapper {
    margin-top: 40px;
    width: 80%;
    max-width: 800px;
}

table {
    width: 100%;
    border-collapse: collapse;
    background-color: #1f2937;
}

th, td {
    padding: 12px;
    text-align: left;
}
a {
    color: #ff00ff;
    text-decoration: none;
}

input{
    margin: 10px;
    border-radius: 20px;
    border: none;
    height: 40px;
    width: 340px;
}
.non{
    background-color: #00ffff;
    box-shadow: 5px 5px 20px 5px #00ffff;
}

 .i{
    background-color: #1f2937;
     width: 350px;
     height: 300px;
    padding: 30px 40px;
    border-top-left-radius: 50px;
    border-bottom-right-radius: 50px;
    margin-top: 100px;
 }
</style>
<body>

<div class="form-container">
    <h2>Login Form</h2>
    <form method="post" action="black.php">
        <input type="text" name="name" placeholder="User name">
        <span class="error"><?php echo $nameErr; ?></span>

        <input type="text" name="email" placeholder="Enter your email">
        <span class="error"><?php echo $emailErr; ?></span>

        <input class="non" type="submit" name="submit" value="Login">

        <div class="links">
            <p>Forgot password? <a href="#">Click Here</a></p>
            <p>Don't have an account? <a href="#">Click Here</a></p>
        </div>
    </form>
</div>

<div class="i">
    <?php
     if (file_exists($file)) {
    $allData = json_decode(file_get_contents($file), true);
    if (!empty($allData)) {
        echo "<div class='table-wrapper'><table>";
        echo "<tr><th>#</th><th>Name</th><th>Email</th><th>Delete</th></tr>";
        foreach ($allData as $i => $data) {
            if (!empty($data['name']) && !empty($data['email'])) {
                echo "<tr>";
                echo "<td>" . ($i - 3) . "</td>";
                echo "<td>" . htmlspecialchars($data['name']) . "</td>";
                echo "<td>" . htmlspecialchars($data['email']) . "</td>";
                echo "<td><a href='?delete=$i' onclick='return confirm(\"Delete this record?\")'>Delete</a></td>";
                echo "</tr>";
            }
        }
        echo "</table></div>";
    }
}
    ?>
</div>

</body>
</html>
