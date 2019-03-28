<?php
    include 'dungeonGenCpy.php';
    $post = file_get_contents('php://input');
    $message = json_decode($post, true);
    //$message =  (string)$post;
    //echo $message['notes'];
    //echo $saDetail;
    $environ = $message["dungeonEnvironment"];
    $startingArea = getStartingArea();

    echo json_encode($startingArea);
?>
