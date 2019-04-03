angular.module('myApp').controller('dungeonCtrl', function($scope,fileReader, $http){
		$scope.postResults = "";
		var userParams = {};
		$scope.prePostResults = "";

/*
This will be used for user params

$scope.sizes = ["Small", "Medium", "Large"];
$scope.environments = ["Grass", "Cave", "Hills"];

*/

	//takes user input if needed, calls php dungeon generator and outputs dungeon
	$scope.genDungeon = function(){
		$http.post('dungeonScript.php', userParams)
			.then(function(response){
				$scope.add(response.data);
			});

		};

		/*
was used for testing, no longer needed but has helpful code for passing userparams
	$scope.justChanged = function(){
		$scope.postResults = $scope.selected;
		console.log($scope.sizes);
		console.log($scope.environments);
		userParams.dungeonSize = $scope.size;
		userParams.dungeonEnvironment = $scope.environment;
	};
	*/

	//takes the dungeon data and adds it into the HTML view as new elements
	$scope.add = function(dungeonData){
		document.getElementById('dungeon').innerHTML = "<ol id=\"add\"></ol>";
		var roomData = dungeonData;
		//console.log(dungeonData);
		var node = document.getElementById('add');
		var message = '<li>' + roomData[0].id + ') ' + roomData[0].data + '</li>';
		message = message + '<ul>';
		
		for (var i=1; i < roomData.length; i++){
			var obj = roomData[i];
			if((obj.id).length != 3){
				message = message + '<li>' + obj.passage + 
					'leads to ' + obj.id +'</li>';//passage
			}
		}

		for(var i=1; i < roomData.length; i++){
			var obj = roomData[i];
			console.log((obj.id).length);
			if((obj.id).length >= 3){
				message = message + '</ul>' + '<ul>' + '<li>' + obj.id + ') ' 
					+ obj.data + '</li>' + '</ul>' + '<ul>';//chamber
			}else {
				message = message + '</ul>' + '<li>' + obj.id + ') ' 
					+ obj.data + '</li>' + '<ul>';//chamber
			}
		}

		message = message + '</ul>';
		node.insertAdjacentHTML('afterend', message);

		};
});

/*
This is stuff we should add

<option value="dungSize">Dungeon Size</option>
<option value="dungEnvironment">Dungeon Environment</option>
<option value="dungMonster">Dungeon Monsters</option>
<option value="dungItems">Dungeon Items</option>
*/
