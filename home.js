/*global angular*/
var app = angular.module('myApp', []);
app.controller('myCtrl', function($scope, $http) {
var diceResults = [];	//DICE: used to store the results from the dice roll.
var numDiceRolled = 0;	//DICE: used to count how many dice have been rolled.
    $scope.dice = true;
    $scope.chara = true;
    $scope.monst = true;
    $scope.story = true;
    $scope.nameGen = true;
    $scope.results = 0;
    $scope.postResults = "nothing";
    $scope.noteText = "aString";

    $scope.toggle = function (name) {
        $scope.dice = true;
        $scope.chara = true;
        $scope.monst = true;
        $scope.story = true;
        $scope.nameGen = true;
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
        }
    }
    $scope.dieRoll = function(diceValue) {
	/*Gets dice value, then checks to see if there have already been any dice rolled.
	 * if there HAVE been dice rolled, it appends a ', ' to the previous value and then
	 * rolls again.*/
	if(numDiceRolled > 0) {
        diceResults.push(", ");
	    diceResults.push(Math.floor(Math.random() * diceValue + 1));
	}
	else {
	    diceResults.push(Math.floor(Math.random() * diceValue + 1));
	}
        numDiceRolled++;
	$scope.results = diceResults.join("");
    }

    $scope.notesPost = function(){
        var notes = {notes : String($scope.noteText)}
        console.log($scope.noteText);
        $http.post('hello', notes)
            .then(function(response){
                $scope.postResults = response.data;
            });
    }


});
