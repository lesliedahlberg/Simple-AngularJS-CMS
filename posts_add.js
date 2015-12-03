var app = angular.module('posts_add_app', []);
app.controller('posts_add_control', function($scope, $http) {

  $scope.formData = {};
  getCategories();




  $scope.processForm = function() {
    if(isNumber($scope.formData.id)){
      $http({
            method  : 'POST',
            url     : 'http://localhost/~lesliedahlberg/slovotisk/api/posts_edit.php',
            data    : $.param($scope.formData),
            headers : {'Content-Type': 'application/x-www-form-urlencoded'}
           })
      .success(function(data) {
        $scope.returnData = data;
          if (!data.success) {
            // if not successful, bind errors to error variables
            $scope.errorTitle = data.errors.title;
            $scope.errorText = data.errors.text + data.errors.PARAM;
          } else {
            // if successful, bind success message to message
            $scope.message = data.message;
            $scope.errorTitle = "";
            $scope.errorText = "";
            $scope.formData = "";
          }
        });
    }else{
      $http({
            method  : 'POST',
            url     : 'http://localhost/~lesliedahlberg/slovotisk/api/posts_add.php',
            data    : $.param($scope.formData),
            headers : {'Content-Type': 'application/x-www-form-urlencoded'}
           })
      .success(function(data) {
        $scope.returnData = data;
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
    }

  };

  $scope.getArticle = function (id){
    if(isNumber(id)){
      $http.get("http://localhost/~lesliedahlberg/slovotisk/api/posts.php?id="+id)
      .success(function (response) {
        if(response.success == true){
          $scope.edit_article = response.articles[0];
          $scope.formData.title = $scope.edit_article.title;
          $scope.formData.text = $scope.edit_article.text;
          getCategory(id);
          $scope.formData.id = id;
        }else {
          $scope.error = response;
        }
      });
    }
  }

  function isNumber(n) {
  return !isNaN(parseFloat(n)) && isFinite(n);
}

    function getCategory(id){
      $http.get("http://localhost/~lesliedahlberg/slovotisk/api/post_category.php?id="+id)
      .success(function (response) {
        if(response.success == true){
          $scope.formData.category = response.category;
        }else {
          $scope.error = response;
        }
      });
    }


  function getCategories(){
    $http.get("http://localhost/~lesliedahlberg/slovotisk/api/categories.php")
    .success(function (response) {
      if(response.success == true){
        $scope.categories = response.categories;
      }else {
        $scope.error = response;
      }
    });
  }

});
