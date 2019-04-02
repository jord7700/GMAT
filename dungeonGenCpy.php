<?php

    include 'dbconnect.php';   



	$numDoors = 1;
//generates dungeon, formats message in object array
	function getStartingArea() {
	global $connection;
	    $saDiceNum = 0;
        $sum = 0;
        $i = 0;
        $saDetail = "";
        $sql = "select saDiceNum from startingArea";
        $result = mysqli_query($connection, $sql);
        $numDoors = 0;
            while ($row = mysqli_fetch_array($result)): {
                $saDiceNum += $row['saDiceNum'];
            }endwhile;

            $rdmGen = rand(1,$saDiceNum);

            mysqli_data_seek($result, 0);

            while ($row = mysqli_fetch_array($result)): {
                if($sum != $rdmGen){
                    $sum += $row['saDiceNum'];
                    $i++;
                }
                else
                    break;
            }endwhile;
            $finalSQL = "select saDetail from startingArea where saID = '$i'";
            $finalResult = mysqli_query($connection, $finalSQL);
                while($row = mysqli_fetch_array($finalResult)):{
                    $saDetail = $row['saDetail'];
                }endwhile;
    	 //echo $saDetail;

//todo: change array to more proper json format (add id to simplify processing message)
    $array = array(
        array(
            "id" => 1,
            "roomType" => "Starting Room",
            "data"=> $saDetail,
        )
    );
//todo: create loop to add multiple chambers and other dungeon elements
    array_push($array, array(
        "id" => 2,
        "roomType" => "chamber",
        "data" =>"square room, 10ft wide, 2 way intersection",
    ));
        return $array;
    }