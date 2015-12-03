<? require_once "inc/settings.php"; ?>
<? $ng_app = "posts_app"; $ng_control = "posts_control"; ?>
<? require $SETTINGS_php_include["header"]; ?>

<section class="container">

  <!-- Static navbar -->
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">Project name</a>
      </div>
      <div id="navbar" class="navbar-collapse collapse">
        <ul class="nav navbar-nav">
          <li><a class="active" href="posts.php">Posts</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li><a href="posts_add.php">Add Post</a></li>
        </ul>
      </div><!--/.nav-collapse -->
    </div><!--/.container-fluid -->
  </nav>

<div class="row">
  <div class="col-md-9">
    <div ng-switch="singlePost">
      <div ng-switch-when="true">
        <a ng-click="posts()">All Posts</a>
        <article ng-repeat="article in articles">
          <h2>{{ article.title }}</h2>
          <p>{{ article.date }} | {{ article.author }}</p>
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
