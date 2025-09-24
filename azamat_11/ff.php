<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
   
   .body{
    background-color: #ccc;
   }

    .col{
        width: 900px;
        margin: 250px auto;
        background-color: white;
        border-radius: 5px;
        box-shadow: 0px 0px 10px rgb(0,0,0,0.1);
    }

   .w3{
    width: 860px;
    height: 60px;
     background-color: #2d3e8b; 
     color: white;
     font-size: 24px;
     padding: 15px 20px;
     border-top-left-radius: 5px;
     border-top-right-radius: 5px;
   }

   input{
  width: 500px;
  height: 40px;
  margin-bottom: 20px;
  padding: 10px;
  font-size: 16px;
  border: 1px solid #ccc;
  border-radius: 4px;
  transform: translateX(40px);
   }

.non{
    width: 250px;
  height: 45px;
  background-color: #a6d64c; 
  color: white;
  font-size: 18px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}
h2{
    transform: translateY(-20px);
}
.ff{
    text-align: center;
    transform: translateY(150px);
}
</style>
<body>

     <div class="col">
          <div class="w3">
             <h2>Kirish eMaktab</h2>
          </div>
          <br><br><br>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <input type="text" name="email" placeholder="Login">
        <br><br>
        <input type="text" name="pasword" placeholder="pasword">    
        <br><br>
            <div class="h">
                 <input class="non" type="submit" name="submit" value="Kirish">
            </div>
    <div class="lol">

 
    <?php
        $email = $pasword = "";

     if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = test_input($_POST["email"]);
        $pasword = test_input($_POST["pasword"]);
     }

     function test_input($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
     }
    ?>
     <div class="ff">
          <?php
          echo "<h1>Malumotlar</h1>";
      echo $email;
      echo "<br>";
      echo $pasword;
    ?>  
     </div>
</body>
</html>