<? require_once "inc/settings.php"; ?>
<? $ng_app = "posts_app"; $ng_control = "posts_control"; ?>
<? require $SETTINGS_php_include["header"]; ?>

<section class="container">

<? require "inc/nav.php" ?>

<div class="row">
  <div class="col-md-9">
    <div ng-switch="singlePost">
      <div ng-switch-when="true">
        <a href="#" ng-click="posts()">All Posts</a>
        <article ng-repeat="article in articles">
          <h2>{{ article.title }}</h2>
          <p>{{ article.date }} | {{ article.author }}</p>
          <div class="well">
            <a><span ng-click="postRemove(article.id)" class="glyphicon glyphicon-trash"></span></a>
            <a href="posts_add.php?edit_id={{article.id}}"><span class="glyphicon glyphicon-pencil"></span>
          </div>
          <p>{{ article.text }}</p>
        </article>
      </div>
      <div ng-switch-default>
        <h1>{{title}}</h1>
        <article ng-repeat="article in articles">
          <a ng-click="post(article.id)"><h2>{{ article.title }}</h2></a>
          <p>{{ article.text }}</p>
        </article>
      </div>
    </div>
  </div>
  <div class="col-md-3">
    <h2>Categories</h2>
    <ul>
      <li><a ng-click="clearCategory()">All Posts</a></li>
      <li ng-repeat="category in categories"><a ng-click="setCategory(category.id, category.name)">{{category.name}}</a></li>
    </ul>
  </div>
</div>


</section>
<script src="posts.js"></script>
<? require $SETTINGS_php_include["footer"]; ?>
