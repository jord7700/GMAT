<?php

    $servername = "localhost";
    $username = "root";
    $password = "gmatroot123";
    $dbname = "gmat";
    
    
    //connecting to db
    $connection = new mysqli($servername, $username, $password, $dbname);
    
    if (!$connection) {
        die("connectionection Failed: Aborting..." . mysqli_connect_error());
    } 
<<<<<<< HEAD
?>
=======
?>
>>>>>>> 8d6dd593de3e474711af745c194499d414edd258
