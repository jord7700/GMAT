<?php
    include 'dungeonGenCpy.php';
    $post = file_get_contents('php://input');
    $message = json_decode($post, true);
    //$message =  (string)$post;
    //echo $message['notes'];
    //echo $saDetail;
    $array = [
    	"starting" => $saDetail,
	"anotherKey" => "moreData",
    ];
    echo json_encode($message);
?>
