<?php
session_start();

    $file = "data.json";
    $nameErr = $emailErr =  "";
    $name = $email = "";
    
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
      if (empty($_POST['name'])) {
       $nameErr = "name is required";
      } else {
        $name = test_input($_POST["name"]);
      } 
          if (empty($_POST["email"])) {
        $emailErr = "email is required";
    } else {
        $email = test_input($_POST["email"]);
    }
  
      
        if ($name && $email) {
            $newData = [
        "name" => $name,
        "email" => $email
            ];
        }

       if (file_exists(($file))) {
        $data = json_decode(file_get_contents($file),true);
       } else {
        $data = [];
       }
        $data[] = $newData;
        file_put_contents($file,json_encode($data,JSON_PRETTY_PRINT));
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
    header("Location: shift.php");
    exit;
}
      
     function test_input($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
     }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    .error{color: red;}
    table{border-collapse: collapse; width: 100%;}
    table, th, td{border: 1px solid black; padding: 8px; text-align: left;}
</style>
<body>
<p><span class="error">* required field</span></p>

<form method="post" action="shift.php">
    Name: <input type="text" name="name">
    <span class="error">* <?php echo $nameErr; ?></span>
    <br><br>
    E-mail: <input type="text" name="email">
    <span class="error"><?php echo $emailErr; ?></span>
    <br><br>
    Website: <input type="text" name="website">
    <br><br>
    Comment: <textarea name="comment" rows="5" cols="40"></textarea>
    <br><br>
    Gender:
    <input type="radio" name="gender">Female
    <input type="radio" name="gender">Male
    <input type="radio" name="gender">Others
    <span class="error"><?php echo $genderErr ?></span>
    <br><br>
    <input type="submit" name="submit" value="Submit">
</form>

 <hr>

 <h2>All saved data</h2>
 <?php
  if (file_exists($file)) {
   $allData = json_decode(file_get_contents($file),true);
   if (!empty($allData)) {
    echo "<table>";
    echo "<tr><th>#</th><th>Name</th><th>Email</th><th>Websayt</th><th>Comment</th><th>Gender</th><th>Action</th></tr>";
    foreach ($allData as $i => $data) {
        echo "<tr>";
        echo "<td>".($i+1)."</td>";
         echo "<td>".$data['name']."</td>";
            echo "<td>".$data['email']."</td>";
            echo "<td>".$data['website']."</td>";
            echo "<td>".$data['comment']."</td>";
            echo "<td>".$data['gender']."</td>";
            echo "<td><a href='?delete=$i' onclick='return confirm(\"Delete this record?\")'>Delete</a></td>";
            echo "</tr>";
    }
    echo "</table>";
   } else {
    echo "Hali hech qanday ma'lumot kiritilmagan";
   } 
  }else{
    echo "Hali hech qanday ma'lumot kiritilmagan";
  }
 ?>
</body>
</html>
