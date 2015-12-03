var app = angular.module('posts_app', []);

app.controller('posts_control', function($scope, $http) {
$scope.singlePostId = 11;
  getArticles();
  getCategories();
  $scope.title = "All posts";

  $scope.post = function (id) {
    $scope.singlePost = true;
    $scope.singlePostId = id;
    getArticles(id);
  }

  $scope.posts = function () {
    $scope.singlePost = false;
    getArticles();
  }

  $scope.setCategory = function (category_id, category_name) {
    $scope.category_id = category_id;
    $scope.category_name = category_name;
    $scope.title = $scope.category_name;
    $scope.posts();
  }

  $scope.clearCategory = function () {
    delete $scope.category_id;
    delete $scope.category_name;
    $scope.title = "All posts";
    $scope.posts();
  }

  function getArticles(id){
    $http.get("http://localhost/~lesliedahlberg/slovotisk/api/posts.php?id="+id+"&category="+$scope.category_id)
    .success(function (response) {
      if(response.success == true){
        $scope.articles = response.articles;
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
