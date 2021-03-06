<?php include 'dbconnect.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="home.css"/>
    <title>GMAT</title>
    <script src="//code.jquery.com/jquery-latest.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
    <script type="application/javascript" src="home.js"></script>
    <script type="application/javascript" src="story.js"></script>
    <script type="application/javascript" src="Dice.js"></script>
    <script type="application/javascript" src="nameGen.js"></script>
    <script type="application/javascript" src="nameGenPage.js"></script>
    <script type="application/javascript" src="dungeonGen.js"></script>
</head>
<body class = "outline" ng-app="myApp">

<div class="wrap"  ng-controller="myCtrl">

    <!--<div class="options">
        <select class = "optionsTabs">
            <option value = "file">File</option>
            <option value = "view">View</option>
            <option value = "window">Window</option>
            <option value = "help">Help</option>
            <option value = "exit">Exit</option>
        </select>

    </div>-->
    
    <div class="menu" id = "menuSideNav">
        <table>
            <tr>
                <td>
                    <button class = "icons" ng-click="toggle('dice')"><img src = "png/dice.png" ><span></span></button>
                </td>
            </tr>
            <tr>
                <td>
                    <button ng-app="notesApp" class = "icons" ng-click="toggle('story')"><img src = "png/storyline.png" ><span></span></button>
                </td>
            </tr>
            <tr>
                <td>
                    <button class = "icons" ng-click="toggle('chara')"><img src  = "png/character.png"><span></span></button>
                </td>
            </tr>
            <tr>
                <td>
                    <button class = "icons" ng-click="toggle('monst')"><img src = "png/monster.png"><span></span></button>
                </td>
            </tr>
	        <tr>
                <td>
		            <button class = "icons" ng-click="toggle('nameGen')"><img src = "png/name.png"><span></span></button>
		        </td>
            </tr>
            <tr>
                <td>
		            <button class = "icons" ng-click="toggle('dungeon')"><img src = "png/dungeon.png"><span></span></button>
		        </td>
            </tr>
        </table>
    </div>
    
    <div class="main">
        <div ng-include="'Dice.html'" ng-hide="dice"></div>
        <div ng-include="'Story.html'" ng-hide="story"></div>
        <div ng-include="'CharGen.html'" ng-hide="chara"></div>
        <div ng-include="'MonsterGen.php'" ng-hide="monst"></div>
        <div ng-include="'nameGenIndex.html'" ng-hide="nameGen"></div>
        <div ng-include="'dungeonGen.html'" ng-hide="dungeon"></div>
    </div>

</div>
</body>
</html>

<?php mysqli_close($connection); ?>
