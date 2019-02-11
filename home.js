var app = angular.module('myApp', []);
app.controller('myCtrl', function($scope) {
    $scope.dice = true;
    $scope.chara = true;
    $scope.monst = true;
    $scope.story = true;
    $scope.results = 4;

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

    $scope.die20 = function(){
        $scope.results = Math.floor(Math.random() * 20 + 1);
    }
    
    $scope.die12 = function(){
        $scope.results = Math.floor(Math.random() * 12 + 1);
    }
    $scope.die10 = function(){
        $scope.results = Math.floor(Math.random() * 10 + 1);
    }
    $scope.die8 = function(){
        $scope.results = Math.floor(Math.random() * 8 + 1);
    }
    $scope.die6 = function(){
        $scope.results = Math.floor(Math.random() * 6 + 1);
    }
    $scope.die4 = function(){
        $scope.results = Math.floor(Math.random() * 4 + 1);
    }
});