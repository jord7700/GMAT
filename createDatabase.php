<?php

    include 'dbconnect.php';
    include 'createTables.php';
    include 'fillDatabase.php';
    
    mysqli_close($connection);
    
?>