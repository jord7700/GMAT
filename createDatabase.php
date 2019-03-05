<?php

    $servername = "localhost";
    $username = "root";
    $password = "gmatroot123";
    $dbname = "gmat";
    
    
    //connecting to db
    $connection = new mysqli($servername, $username, $password, $dbname);
    
    if (!$connection) {
        die("connectionection Failed: Aborting..." . mysqli_connect_error());
    } else {
        echo "Connection Successful </br>";
    }

$characterData = "create table characterData (charID int not null auto_increment,
                            charClass varchar(20) not null,             
                            charName varchar(20) not null,              
                            charStrength int not null,                  
                            charDexterity int not null,                 
                            charConstitution int not null,              
                            charIntelligence int not null,              
                            charWisdom int not null,                    
                            charCharisma int not null,                  
                            primary key(charID))";                      

    
$monsterData = "create table monsterData (monstID int not null auto_increment,          
                                            monstName varchar(20) not null,             
                                            monstHP int not null,                          
                                            monstArmor int not null,                       
                                            monstCR int not null,                          
                                            monstExp4CR int not null,                      
                                            primary key(monstID))";                          
                                            
    
$smw = "Create table simpleMeleeWeapons (smwID int not null auto_increment,             
                                                    smwCost int not null,       
                                                    smwDmg varchar(5) not null, 
                                                    smwWeight int not null,                 
                                                    smwProperties varchar(50) not null,     
                                                    primary key(smwID))";                   

    
$srw = "Create table simpleRangedWeapons (srwID int not null auto_increment,            
                                                     srwCost int not null,      
                                                     srwDmg varchar(5) not null,            
                                                     srwWeight int not null,                
                                                     srwProperties varchar(50) not null,    
                                                     primary key (srwID))";                 
                                                     
    
$mmw = "Create table martialMeleeWeapons (mmwID int not null auto_increment,            
                                                     mmwCost int not null,                  
                                                     mmwDmg varchar(5) not null,            
                                                     mmwWeight int not null,                
                                                     mmwProperties varchar(50) not null,    
                                                     primary key (mmwID))";                 
                                                     
    
$mrw = "Create table martialRangedWeapons (mrwID int not null auto_increment,           
                                                     mrwCost int not null,      
                                                     mrwDmg varchar(5) not null,            
                                                     mrwWeight int not null,                
                                                     mrwProperties varchar(50) not null,    
                                                     primary key (mrwID))";      
    
$startingArea = "Create table startingArea (saID int not null auto_increment,
                                            saDiceNum int not null,
                                            saShape varchar(10) not null,
                                            saSize varchar(10) not null,
                                            saDoors int,
                                            saPassages int,
                                            primary key (saID))";
                                            
$passageWidth = "create table passageWidth (pwID int not null auto_increment,
                                            pwDiceNum int not null,
                                            pWidth int not null,
                                            primary key (pwID))";
                                            
$passage = "create table passage (passageID int not null auto_increment,
                                  passageDiceNum int not null,
                                  passageDetails text not null,                   
                                  primary key (passageID))";
                                  
    
    
$tables = [$characterData, $monsterData, $smw, $srw, $mmw, $mrw, $startingArea, $passageWidth, $passage];
$count = 1;
 foreach($tables as $x => $sql){
    if(mysqli_query($connection, $sql)) {
        echo "Table $count Created <br>";
    } else {
        echo "Error Creating Table $x<br>";
    }
    $count++;
 }
    mysqli_close($connection);
?>