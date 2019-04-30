<?php

    include 'dbconnect.php';   
    
    $saDiceNum = 0;
    $sum = 0;
    $i = 0;
    $saDetail = "";
    $sql = "select saDiceNum from startingArea";
    $result = mysqli_query($connection, $sql);
    $numDoors = 0;
?>

         

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"></meta>
    <title>DungeonGen</title>
</head>
<body>

    <?php
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
    ?>
        <!--    
        <p><//?php echo $rdmGen; ?></p>
        <p><//?php echo $saDiceNum; ?></p>
        <p><//?php echo $sum; ?></p>
        <p><//?php echo $i; ?></p> 
	<p><//?php echo $finalSQL;  ?> </p>
	-->
        <?php
        
            
            while($row = mysqli_fetch_array($finalResult)):{
                $saDetail = $row['saDetail'];
            }endwhile;?>
	 <p><?php echo $saDetail; ?></p>

<!-- get chambers -->

<?php
	$numDoors = $saDetail[strlen($saDetail) - 2];
	//echo $numDoors;
?>
<?php 
    $saDiceNum = 0;
    $sum = 0;
    $i = 0;
    $saDetail = "";
    $sql = "select chamberDiceNum from chamber";
    $result = mysqli_query($connection, $sql);
?>
<?php
    while($numDoors > 0){
	    $saDiceNum = 0;
	    $sum = 0;
	    $i = 0;
	    $saDetail = "";
	    $sql = "select chamberDiceNum from chamber";
	    $result = mysqli_query($connection, $sql);
	    $numDoors = $numDoors -1;
	    while ($row = mysqli_fetch_array($result)): {
		$saDiceNum += $row['chamberDiceNum'];
	    }endwhile; 
		    
	    $rdmGen = rand(1,$saDiceNum);
		
	    mysqli_data_seek($result, 0);
		
	    while ($row = mysqli_fetch_array($result)): {
		if($sum != $rdmGen){
			$sum += $row['chamberDiceNum'];
			$i++;
		    } 
		    else
			break;
	    }endwhile; 
	    $finalSQL = "select chamberDetails from chamber where chamberID = '$i'";
	    $finalResult = mysqli_query($connection, $finalSQL);
    ?>
        <!--    
        <p><//?php echo $rdmGen; ?></p>
        <p><//?php echo $saDiceNum; ?></p>
        <p><//?php echo $sum; ?></p>
        <p><//?php echo $i; ?></p> 
	<p><//?php echo $finalSQL;  ?> </p>
	-->
        <?php    
            
            while($row = mysqli_fetch_array($finalResult)):{
                $saDetail = $row['chamberDetails'];
            }endwhile;?>
	 <p><?php echo $saDetail; ?></p>
<?php
    }
?>
<?php
	/*    
	while($numDoors > 0){
		$numDoors = $numDoors -1;
		getChamber();
		echo "end";
	}
	 */
?>
          
    
</body>
</html>

