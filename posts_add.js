var app = angular.module('posts_add_app', []);
app.controller('posts_add_control', function($scope, $http) {

  $scope.formData = {};

  $scope.processForm = function() {
    $http({
          method  : 'POST',
          url     : 'http://localhost/~lesliedahlberg/slovotisk/api/posts_add.php',
          data    : $.param($scope.formData),
          headers : {'Content-Type': 'application/x-www-form-urlencoded'}
         })
    .success(function(data) {
        if (!data.success) {
          // if not successful, bind errors to error variables
          $scope.errorTitle = data.errors.title;
          $scope.errorText = data.errors.text;
        } else {
          // if successful, bind success message to message
          $scope.message = data.message;
          $scope.errorTitle = "";
          $scope.errorText = "";
          $scope.formData = "";
        }
      });
  };

});
