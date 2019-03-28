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
                $scope.postResults = formatOutput(response.data);
                console.log("proof");
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
}).directive("ngPortlet", function($compile){
    return {
        template: sadff,
        restrict: 'E',
            link: function (scope, elm){
                scope.add = function(){
                    console.log(elm);
                    elm.after($compile('<ng-portlet></ng-portlet>')(scope));
                }
            }
    }
});
/*
<option value="dungSize">Dungeon Size</option>
<option value="dungEnvironment">Dungeon Environment</option>
<option value="dungMonster">Dungeon Monsters</option>
<option value="dungItems">Dungeon Items</option>
*/

function formatOutput(output){
    var startingArea = output;
    var message = startingArea["starting"] + startingArea["chamber1"];
    console.log(message);
    return message;
}