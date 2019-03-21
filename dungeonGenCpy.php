<?php

    include 'dbconnect.php';   
    
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

	
	$numDoors = $saDetail[strlen($saDetail) - 2];
	//echo $numDoors;
?>
