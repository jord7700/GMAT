angular.module('myApp').controller('newCtrl', function($scope, fileReader, $http){
    $scope.noteText = 'tis new controller';
    $scope.postResults = "nothing";
    $scope.notesPost = function(){
        var notes = {notes : String($scope.noteText)}
        console.log($scope.noteText);
        $http.post('hello', notes)
            .then(function(response){
                $scope.postResults = response.data;
            });
    }

    console.log(fileReader)
    $scope.getFile = function () {
        $scope.progress = 0;
        fileReader.readAsText($scope.file, $scope)
            .then(function(result) {
                $scope.noteText = result;
            });
    };
});

app.directive("ngFile",function(){
    return {
        link: function($scope,el){
            el.bind("change", function(e){
                $scope.file = (e.srcElement || e.target).files[0];
                $scope.getFile();
            })
        }
    }
});

app.factory("fileReader", ["$q", "$log", function($q, $log){
    var factory = {};
    factory.readAsText = function (file, scope) {
        var deferred = $q.defer();
        var reader = getReader(deferred, scope);
        reader.readAsText(file);
        return deferred.promise;
    };

    var onLoad = function(reader, deferred, scope) {
        return function () {
            scope.$apply(function () {
                deferred.resolve(reader.result);
            });
        };
    };

    var onError = function (reader, deferred, scope) {
        return function () {
            scope.$apply(function () {
                deferred.reject(reader.result);
            });
        };
    };

    var getReader = function(deferred, scope) {
        var reader = new FileReader();
        reader.onload = onLoad(reader, deferred, scope);
        reader.onerror = onError(reader, deferred, scope);
        return reader;
    };

    return factory;
}]);