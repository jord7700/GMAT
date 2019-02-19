/*global angular*/
var app = angular.module('myApp', []);
app.controller('myCtrl', function($scope, $http) {
var diceResults = [];	//DICE: used to store the results from the dice roll.
var numDiceRolled = 0;	//DICE: used to count how many dice have been rolled.
var customDieMaximum = [];
var customDieNumber = [];
var customDiceSplit = false;
var customDiceTotal = 0;
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
	
	$scope.customDieRoll = function(customDiceValue) {
		/*  Takes a custom input from the user, parses it, and rolls dice to fit
		 * the specifications of the user.  
		 */ 
		var customInput = customDiceValue.split('');		//Used to store the user's input

		// Loops through customInput, storing the initial string of numbers as the number of dice
		//to roll. It does this until it finds something that is not a number. Afterwards, it splices out
		//the character, and adds any remaining values into the "type of dice".
			//Ex. 1. An input of 12d8 would begin looping and store '12' as the number of dice to roll.
			//    2. It would hit the 'd' and splice it out.
			//    3. Any remaining values, in this case, '8' get stored as the 'type of dice'.
		for(var i = 0; i < customInput.length; i++) {
			if(isNaN(customInput[i])) {
				customInput.splice(i, 0);
				customDiceSplit = true;
			}
			else if(customDiceSplit == true) {
				customDieMaximum.push(customInput[i]);
			}
			else {
				customDieNumber.push(customInput[i]);
			}
		}

		// Turning the character arrays we got from the loop into strings, and converting the strings to Integers.
		customDieNumber = customDieNumber.join("");
		customDieMaximum = customDieMaximum.join("");
		customDieNumber = parseInt(customDieNumber, 10);
		customDieMaximum = parseInt(customDieMaximum, 10);
	
		// Rolling the dice based on the values we've gotten from the user.
		for(var i = 0; i < customDieNumber; i++) {
			customDiceTotal += (Math.floor(Math.random() * customDieMaximum + 1));	
		}
		
		// Appending the values to the results scope.
		if(numDiceRolled > 0) {
        	diceResults.push(", ");
	    	diceResults.push(customDiceTotal);
		}
		else {
	    	diceResults.push(customDiceTotal);
		}
        numDiceRolled++;
		$scope.results = diceResults.join("");
		
		// Clearing out the variables we use, so that we may use them again.
		customDiceSplit = false;
		customDieNumber = [];
		customDieMaximum = [];
		customDiceTotal = 0;
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
