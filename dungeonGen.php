<?php 

    include 'dbconnect.php';   
    
    $saDiceNum = 0;
    $sum = 0;
    $i = 0;
    $saDetail = "";
    $sql = "select saDiceNum from startingArea";
    $result = mysqli_query($connection, $sql);
    

    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
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
            
        <p><?php echo $rdmGen; ?></p>
        <p><?php echo $saDiceNum; ?></p>
        <p><?php echo $sum; ?></p>
        <p><?php echo $i; ?></p> 
        <p><?php echo $finalSQL;  ?> </p>
        <?php
        
            
            while($row = mysqli_fetch_array($finalResult)):{
                $saDetail = $row['saDetail'];
            }endwhile;?>
         <p><?php echo $saDetail; ?></p>
       
       
       
       
    
</body>
</html>