   <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "mydb";

    $conn = new mysqli($servername, $username , $password, $dbname);

    if (!$conn->connect_error) {
       die("Faculedin connection" . $conn->connect_error ); 
    }

    $sql = "INSERT INTO my(firstname,lastname,email)
    VALUES  ('Sardor', 'Valijonoiv', 'Sardror@gmail.com')  ";

    if ($conn->query($sql) === TRUE) {
      $last_id = $conn->insert_id  ;
      echo ("Natija Chiqdi" . $last_id);
    } else {
        echo "Xato  " .  $conn->error;
    };

                                            
$conn->close();
?>    