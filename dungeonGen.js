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
			//console.log((obj.id).length);
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


		//where graphics start
		var height = 300;
		var width  = 700;
		var objHeight = height/2;
		var objWidth = 0;
		var newNode = document.getElementById('graphics');
		var message2 = '<canvas id="myCanvas" width="' + width + 
			'" height="' + height + '"style="border:1px solid;">';
		message2 = message2 + 'abba</canvas>';
		console.log(message2);
		newNode.insertAdjacentHTML('afterend', message2);
		newNode = document.getElementById("myCanvas");
		var c = newNode.getContext("2d");
		var img = new Image();
		var images = [];
		var iNum=0;
		img.onload = function(){
			//c.fillRect(50, 50, 50, 50);
			c.drawImage(img, objWidth, 150);
		};
		img.src= './png/chambers/chamber1.png';
		for(var i=1; i < roomData.length; i++){
			var img1 = new Image();
			images.push(img1);
			var obj=roomData[i];
			switch(obj.gid){
				case 1:
					img1.src = './png/chambers/chamber1.png';
				default:
					img1.src = './png/chambers/chamber1.png';

			}
		}
		
		img1.onload = function(){
				for(var n=1; n<roomData.length; n++){
					var obj=roomData[n];
					console.log(obj.id);
					if((obj.id).length != 3){
						objWidth+=60;
						c.drawImage(images[iNum], objWidth, objHeight);
						iNum++;
					} else{
						c.drawImage(images[iNum], objWidth, objHeight+60);
						objWidth+=60;
						iNum++;
					}
						
				}
			};
		
		};
});

/*
This is stuff we should add

<option value="dungSize">Dungeon Size</option>
<option value="dungEnvironment">Dungeon Environment</option>
<option value="dungMonster">Dungeon Monsters</option>
<option value="dungItems">Dungeon Items</option>
*/
