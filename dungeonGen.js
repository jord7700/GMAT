angular.module('myApp').controller('dungeonCtrl', function($scope,fileReader, $http){
    $scope.postResults = "nothing";
    var userParams = {};
    $scope.prePostResults = "";
    $scope.sizes = ["Small", "Medium", "Large"];
    $scope.environments = ["Grass", "Cave", "Hills"];

    $scope.genDungeon = function(){
        var notes = {notes : 123}
        $http.post('dungeonScript.php', userParams)
            .then(function(response){
                $scope.add(response.data);
		        //$scope.postResults = response.data;
                //$scope.postResults  += parseInt(response.data) + 3;
            });

    };

    $scope.justChanged = function(){
        $scope.postResults = $scope.selected;
        console.log($scope.sizes);
        console.log($scope.environments);
        userParams.dungeonSize = $scope.size;
        userParams.dungeonEnvironment = $scope.environment;
    };

    $scope.add = function(dungeonData){
        var rooms = formatOutput(dungeonData);
        console.log(dungeonData);
        var node = document.getElementById('add');
        var message = "<ul>";
        for(var i=rooms.length-1; i >= 1; i--)
        {
            var message = message +'<li>' + rooms[i] + '</li>';
        }
        var message = message + '</ul>';
        node.insertAdjacentHTML('afterend', message);

        var message = '<li>' + rooms[0] + '</li>';
        node.insertAdjacentHTML('afterend', message);
    }
});

/*
<option value="dungSize">Dungeon Size</option>
<option value="dungEnvironment">Dungeon Environment</option>
<option value="dungMonster">Dungeon Monsters</option>
<option value="dungItems">Dungeon Items</option>
*/

function formatOutput(dungeonData){
    var roomData = dungeonData;
    var rooms = [dungeonData["starting"], dungeonData["chamber1"]];

/*    for (var i = 0; i < roomData.length; i++)
    {
        var obj = roomData[i];
        console.log(obj.id + "hi");
        room.push(obj.id);
    }
*/
    return rooms;
}

