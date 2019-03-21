<?php

    include 'dbconnect.php';

$characterData = "drop table characterData";
$monsterData = "drop table monsterData";
$smw = "drop table simpleMeleeWeapons";
$srw = "drop table simpleRangedWeapons";
$mmw = "drop table martialMeleeWeapons";
$mrw = "drop table martialRangedWeapons";
$startingArea = "drop table startingArea";
$passageWidth = "drop table passageWidth";
$passage = "drop table passage";
$doorType = "drop table doorType";
$chamber = "drop table chamber";
$chamberExits = "drop table chamberExits";
    
$tables = [$characterData, $monsterData, $smw, $srw, $mmw, $mrw, $startingArea, $passageWidth, $passage, $doorType, $chamber, $chamberExits];
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