var app = angular.module('myApp', []);
app.controller('myCtrl', function($scope, $http) {
    $scope.dice = true;
    $scope.chara = true;
    $scope.monst = true;
    $scope.story = true;
    $scope.test = retString();
    $scope.results = 0;

    $scope.toggle = function (name) {
        $scope.dice = true;
        $scope.chara = true;
        $scope.monst = true;
        $scope.story = true;
        if (name === 'dice') {
            $scope.dice = false;
        } else if(name === 'chara'){
            $scope.chara = false;
        } else if(name === 'monst'){
            $scope.monst = false;
        } else if(name === 'story'){
            $scope.story = false;
        }
    }
    $scope.dieRoll = function(diceValue) {
        $scope.results = Math.floor(Math.random() * diceValue + 1);
    }
});
