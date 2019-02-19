/*
angular.module('myApp').controller('diceCtrl', function($scope, []){
    var diceResults = 0;	//DICE: used to store the results from the dice roll.
    var numDiceRolled = 0;	//DICE: used to count how many dice have been rolled.
    $scope.results = 0;
    $scope.dieRoll = function(diceValue) {
        /*Gets dice value, then checks to see if there have already been any dice rolled.
         * if there HAVE been dice rolled, it appends a ', ' to the previous value and then
         * rolls again.
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
});
*/
angular.module('myApp').controller('diceCtrl', function($scope, fileReader, $http){
    var diceResults = [];	//DICE: used to store the results from the dice roll.
    var numDiceRolled = 0;	//DICE: used to count how many dice have been rolled.
    console.log('here!');
    $scope.results = 0;
    $scope.dieRoll = function(diceValue) {
/*Gets dice value, then checks to see if there have already been any dice rolled.
 * if there HAVE been dice rolled, it appends a ', ' to the previous value and then
 * rolls again.
*/
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
});