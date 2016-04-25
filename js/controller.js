var app = angular.module('app', []);
app.controller('dos', function($scope) {
    $scope.showMe1 = false;
    $scope.showMe2= false;
    $scope.showMe3 = false;

    $scope.func1 = function() {
        $scope.showMe1 = !$scope.showMe1;
    }
     $scope.func2 = function() {
        $scope.showMe2 = !$scope.showMe2;
    }
     $scope.func3 = function() {
        $scope.showMe3 = !$scope.showMe3;
    }
});