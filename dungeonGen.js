angular.module('myApp').controller('dungeonCtrl', function($scope,fileReader, $http){
    $scope.postResults = "nothing";
    var userParams = {};
    $scope.prePostResults = "";
    $scope.names = ["Small", "Medium", "Large"];

    $scope.genDungeon = function(){
        var notes = {notes : 123}
        console.log($scope.noteText);
        $http.post('dungeonScript.php', userParams)
            .then(function(response){              
		$scope.prePostResults = response.data;
		    console.log($scope.prePostResults);
		$scope.postResults = $scope.prePostResults;
                //$scope.postResults  += parseInt(response.data) + 3;
            });
    };

    $scope.justChanged = function(){
        $scope.postResults = $scope.selected;
        console.log($scope.selected);
        userParams.dungeonSize = $scope.selected;
    };
});