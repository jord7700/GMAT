<?php

    $servername = "localhost";
    $username = "root";
    $password = "gmatroot123";
    $dbname = "gmat";
    
    
    //connecting to db
    $connection = new mysqli($servername, $username, $password, $dbname);
    
    if (!$connection) {
        die("connectionection Failed: Aborting..." . mysqli_connect_error());
    } else {
        echo "Connection Successful </br>";
    }

$characterData = "drop table characterData";
$monsterData = "drop table monsterData";
$smw = "drop table simpleMeleeWeapons";
$srw = "drop table simpleRangedWeapons";
$mmw = "drop table martialMeleeWeapons";
$mrw = "drop table martialRangedWeapons";
$startingArea = "drop table startingArea";
$passageWidth = "drop table passageWidth";
$passage = "drop table passage";
    
$tables = [$characterData, $monsterData, $smw, $srw, $mmw, $mrw, $startingArea, $passageWidth, $passage];
$count = 1;    
 foreach($tables as $x => $sql){
    if(mysqli_query($connection, $sql)) {
        echo "Table $count Dropped <br>";
    } else {
        echo "Error Dropping Table $x <br>";
    }
    $count++;
 }
    mysqli_close($connection);
?>