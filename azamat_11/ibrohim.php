
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    body{
        background-color: #18c29c;

    }
    .col{
        transform: translateY(200px)translateX(700px);
       background-color: #ffffff;
        width: 400px;
        height: 400px;
        text-align: center;
    }

    .lol{
        transform: translateY(50px);     
    }

    input{
        width: 300px;
        height: 30px;
    }

    .non{
        border: none;
        background-color: #009879;
        
    }

    .w3{
       background-color: #009879;
       height: 50px;
       color: #ffffff;
       text-align: center;
    }
    
</style>
<body>
     <div class="col">
          <div class="w3">
             <h2>Login form</h2>
          </div>
          <br><br><br>
    <form method="post" action="/azamat_11/w3school.php">
        <input type="text" name="email" placeholder="e-mail">
        <br><br>
        <input type="text" name="pasword" placeholder="pasword">
        <br><br>
            <input class="non" type="submit" name="submit" value="login">
    <div class="lol">
       <br>   </div>
    </form>
     </div>
</body>
</html>