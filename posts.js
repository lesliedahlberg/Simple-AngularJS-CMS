var app = angular.module('posts_app', []);
app.controller('posts_control', function($scope, $http) {
  $http.get("http://localhost/~lesliedahlberg/slovotisk/api/posts.php").success(function (response) { $scope.articles = response;});


});
