/*global angular*/
var app = angular.module('myApp', []);
app.controller('myCtrl', function($scope, $http) {
    $scope.dice = true;
    $scope.chara = true;
    $scope.monst = true;
    $scope.story = true;
    $scope.nameGen = true;
    $scope.dungeon = true;
    $scope.results = 0;
    $scope.postResults = "nothing";
    $scope.noteText = "aString";

    $scope.toggle = function (name) {
        $scope.dice = true;
        $scope.chara = true;
        $scope.monst = true;
        $scope.story = true;
        $scope.nameGen = true;
        $scope.dungeon = true;
        if (name === 'dice') {
            $scope.dice = false;
        } else if(name === 'chara'){
            $scope.chara = false;
        } else if(name === 'monst'){
            $scope.monst = false;
        } else if(name === 'story'){
            $scope.story = false;
        } else if(name ==='nameGen'){
            $scope.nameGen = false;
        } else if(name === 'dungeon'){
            $scope.dungeon = false;
        }
    }
});
