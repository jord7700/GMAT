<?php


    $startingArea = "insert into startingArea (saDiceNum, saDetail) values 
                    (1,'Square, 20 x 20ft.; passage on each wall (2)'),
                    (1,'Square, 20 x 20ft.; door on two walls, passage in third wall (3)'),
                    (1,'Square, 40 x 40 ft.; doors on three walls (3)'),
                    (1,'Rectangle, 80 x 20ft., with row of pillars down the middle; two passages leading from each long wall, doors on each short wall (2)'),
                    (1,'Rectangle, 20 x 40ft.; passage on each wall (4)'),
                    (1,'Circle, 40ft. diameter; one passage at each cardinal direction (4)'),
                    (1,'Circle, 40ft. diameter; one passage in each cardinal direction; well in middle of room might lead down to lower level (4)'),
                    (1,'Square, 20 x 20ft.; door on two walls, passage on third wall, secret door on fourth wall (4)'),
                    (1,'Passage, 10 ft. wide; T intersection (2)'),
                    (1,'Passage , 10ft. wide; four-way intersection (4)')";
                    
    $passage = "insert into passage (passageDiceNum, passageDetails) values
                    (2, 'Continue straight 30ft., no doors or side passages'),
                    (1, 'Continue straight 20ft., door to the right, then an additional 10 ft. ahead'),
                    (1, 'Continue straight 20ft., door to the left, then an additional 10 ft. ahead'),
                    (1, 'Continue straight 20ft.; passage ends in a door'),
                    (2, 'Continue straight 20ft., side passage to the right. then an additional 10ft. ahead'),
                    (2, 'Continue straight 20ft., side passage to the left, then an additionallO ft. ahead'),
                    (1, 'Continue straight 20ft., comes to a dead end; 10 percent chance of a secret door'),
                    (2, 'Continue straight 20ft., then the passage turns left and continues 10 ft.'),
                    (2, 'Continue straight 20ft., then the passage turns right and continues 10ft.'),
                    (5, 'Chamber (roll on the Chamber table'),
                    (1, 'Stairs* (roll on the Stairs table)')";
                    
    $doorType = "insert into doorType (dTypeDiceNum, dTypeDetail) values
                    (10, 'Wooden'),
                    (2, 'Wooden , barred or locked'),
                    (1, 'Stone'),
                    (1, 'Stone, barred or locked'),
                    (1, 'Iron'),
                    (1, 'Iron , barred or locked'),
                    (1, 'Portcullis'),
                    (1, 'Portcullis, locked in place'),
                    (1, 'Secret door'),
                    (1, 'Secret door, barred or locked')";
                    
    $chamber = "insert into chamber (chamberDiceNum, chamberDetails) values
                   (2, 'Square, 20 x 20ft.'),
                   (2, 'Square, 30 x 30 ft.'), 
                   (2, 'Square, 40 x 40 ft.'),
                   (3, 'Rectangle, 20 x 30 ft.'),
                   (3, 'Rectangle, 30 x 40 ft.'),
                   (2, 'Rectangle, 40 x 50 ft.'),
                   (1, 'Rectangle, 50 x 80ft.'),
                   (1, 'Circle, 30ft. diameter'),
                   (1, 'Circle, 50 ft. diameter'),
                   (1, 'Octagon, 40 x 40 ft.'),
                   (1, 'Octagon, 60 x 60ft.'),
                   (1, 'Trapezoid , roughly 40 x 60ft.')";
                   
    $chamberExits = "insert into chamberExits (cExitDiceNum, cExitCount) values 
                        (3, 0),
                        (2, 0),
                        (3, 1),
                        (3, 1),
                        (2, 2),
                        (2, 2),
                        (2, 3),
                        (1, 3),
                        (1, 4),
                        (1, 4)";
                                                
    $tables = [$startingArea, $passage, $doorType, $chamber, $chamberExits];
    
    $count = 1;
    
    foreach($tables as $x => $sql){
        if(mysqli_query($connection, $sql)) {
            echo "Table $count: Successfully Inserted Data! <br>";
        } else {
            echo "Table $count: Error Inserting Data! <br>";
        }
        
    $count++;
    }

    
?>
