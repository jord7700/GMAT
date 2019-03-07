<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"></meta>
    <link rel="stylesheet" type="text/css" href="dungeonGen.css"/>
    <title>dice</title>
</head>
<body>
  <div ng-controller="dungeonCtrl">
    <button ng-click="generateDung()">Generate Dungeon</button>
    <div>
        <p ng-bind="dungeonButton"></p>
    </div>
  </div>
</body>
</html>
