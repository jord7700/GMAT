<?php 

    include 'dbconnect.php';   
    
    $sql = mysqli_query($connection,"Select * from monsterData");
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>monsterGen</title>
    <link rel="stylesheet" type="text/css" href="MonsterGen.css"/>
</head>
<body>
    <table class = "monsTable">
    
        <tr>    
            <th>ID</th>
            <th>Name</th>
            <th>HP</th>
            <th>Armor</th>
            <th>CR</th>
            <th>Experience</th>
        </tr>
    
       <?php while ($row = mysqli_fetch_array($sql)): {
            $monstID = $row['monstID']; 
            $monstName = $row['monstName'];
            $monstHP = $row['monstHP']; 
            $monstArmor = $row['monstArmor']; 
            $monstCR = $row['monstCR']; 
            $monstExp4CR = $row['monstExp4CR']; }?>
        
        
        <tr>
            <td><?php echo $monstID?></td>
            <td><?php echo $monstName?></td>
            <td><?php echo $monstHP?></td>
            <td><?php echo $monstArmor?></td>
            <td><?php echo $monstCR?></td>
            <td><?php echo $monstExp4CR?></td>
        
        </tr>
       <?php endwhile; ?>
    </table>
    
</body>
</html>