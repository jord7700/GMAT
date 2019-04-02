<?php

    include 'dbconnect.php';   



	$numDoors = 1;
//generates dungeon, formats message in object array
	function getStartingArea() {
	global $connection;
	    $saDiceNum = 0;
        $sum = 0;
        $i = 1;
        $saDetail = "";
        $sql = "select saDiceNum from startingArea";
        $result = mysqli_query($connection, $sql);
        $numDoors = 0;
            while ($row = mysqli_fetch_array($result)): {
                $saDiceNum += $row['saDiceNum'];
            }endwhile;

            $rdmGen = rand(1,$saDiceNum);

            mysqli_data_seek($result, 0);

            while($row = mysqli_fetch_array($result)): {
                $sum += $row['saDiceNum'];
                //echo "sum= " . $sum . "\n";
                if ($sum >= $rdmGen){
                    break;
                }
                $i++;
            }endwhile;

/*
            while ($row = mysqli_fetch_array($result)): {
                if($sum != $rdmGen){
                    $sum += $row['saDiceNum'];
                    $i++;
                }
                else
                    break;
            }endwhile;
*/
            $finalSQL = "select saDetail from startingArea where saID = '$i'";
            $finalResult = mysqli_query($connection, $finalSQL);
                while($row = mysqli_fetch_array($finalResult)):{
                    $saDetail = $row['saDetail'];
                }endwhile;
         $numDoors = $saDetail[strlen($saDetail) - 2];
    	 //echo $saDetail;

$id = 1;
    $array = array(
        array(
            "id" => $id,
            "roomType" => "Starting Room",
            "data"=> $saDetail,
        )
    );
    $id++;
    //$numDoors = 1;
    for( $i = 0; $i < $numDoors; $i++ ){
        array_push($array, array(
                "id" => $id,
                "roomType" => "chamber",
                "data" => getChamber(),
                "chamberExits" => getChamberExits(),
         ));
         $id++;
    }

//todo: other dungeon elements

        return $array;
    }


    function getChamber(){
            global $connection;
    	    $saDiceNum = 0;
    	    $sum = 0;
    	    $i = 1;
    	    $saDetail = "";
    	    $sql = "select chamberDiceNum from chamber";
    	    $result = mysqli_query($connection, $sql);
    	    while ($row = mysqli_fetch_array($result)): {
    		$saDiceNum += $row['chamberDiceNum'];
    	    }endwhile;

    	    $rdmGen = rand(1,$saDiceNum);

    	    mysqli_data_seek($result, 0);

            while($row = mysqli_fetch_array($result)): {
                $sum += $row['chamberDiceNum'];
                //echo "sum= " . $sum . "\n";
                if ($sum >= $rdmGen){
                    break;
                }
                $i++;
            }endwhile;

/*
    	    while ($row = mysqli_fetch_array($result)): {
    		if($sum != $rdmGen){
    			$sum += $row['chamberDiceNum'];
    			$i++;
    		    }
    		    else
    			break;
    	    }endwhile;
*/
    	    $finalSQL = "select chamberDetails from chamber where chamberID = '$i'";
    	    $finalResult = mysqli_query($connection, $finalSQL);

    	    while($row = mysqli_fetch_array($finalResult)):{
                $saDetail = $row['chamberDetails'];
            }endwhile;
            return $saDetail;
    }

    function getChamberExits(){
            global $connection;
    	    $saDiceNum = 0;
    	    $sum = 0;
    	    $i = 1;
    	    $saDetail = "";
    	    $sql = "select cExitDiceNum from chamberExits";
    	    $result = mysqli_query($connection, $sql);
    	    while ($row = mysqli_fetch_array($result)): {
    		    $saDiceNum += $row['cExitDiceNum'];
    	    }endwhile;
    	    $rdmGen = rand(1,$saDiceNum);
            //echo $rdmGen . "\n" ;
    	    mysqli_data_seek($result, 0);

            while($row = mysqli_fetch_array($result)): {
                $sum += $row['cExitDiceNum'];
                //echo "sum= " . $sum . "\n";
                if ($sum >= $rdmGen){
                    break;
                }
                $i++;
            }endwhile;
            //echo "END WIHLE\n";

/*
    	    while ($row = mysqli_fetch_array($result)): {
    		if($sum != $rdmGen){
    			$sum += $row['cExitDiceNum'];
    			$i++;
    		    }
    		    else
    			break;
    	    }endwhile;
*/
    	    $finalSQL = "select cExitCount from chamberExits where cExitID = '$i'";
    	    $finalResult = mysqli_query($connection, $finalSQL);
    	    while($row = mysqli_fetch_array($finalResult)):{
                $saDetail = $row['cExitCount'];
            }endwhile;
            return $saDetail;
    }
