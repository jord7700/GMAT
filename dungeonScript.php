<?php
    include 'dungeonGenCpy.php';
    $post = file_get_contents('php://input');
    $message = json_decode($post, true);
    //$environ = $message["dungeonEnvironment"];
    //calls dungeon generator, returns dungeon in json format
    $startingArea = getStartingArea();
    echo json_encode($startingArea);
?>
