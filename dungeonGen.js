angular.module('myApp').controller('dungeonCtrl', function($scope,fileReader, $http){
    $scope.dungeonButton = "";
    $scope.generateDung = function () {
        $scope.dungeonButton="this will be a dungeon but right now it is just a blank disappointment";
        var tableJson = {"tableName":"chamber"};
        console.log($scope.noteText);
        $http.post('grabTable', tableJson)
            .then(function(response){
                $scope.dungeonButton = response.data;
            });
    }
})

/*
testTable = ''
var RNG = function(SQLTableinJSON){
    var obj = JSON.parse(SQLTableinJSON);
    return obj['age'];
}
*/