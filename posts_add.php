<? require_once "inc/settings.php"; ?>
<? $ng_app = "posts_add_app"; $ng_control = "posts_add_control"; ?>
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
          <li><a href="posts.php">Posts</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li><a class="active" href="posts_add.php">Add Post</a></li>
        </ul>
      </div><!--/.nav-collapse -->
    </div><!--/.container-fluid -->
  </nav>


<script src="posts_add.js"></script>
<h1>Add Post</h1>
<p>{{ message }}</p>

  <form role="form" ng-submit="processForm()">

    <div id="title-group" class="form-group">
      <label for="title">Title:</label>
      <input type="text" class="form-control" name="title" id="title" ng-model="formData.title">
      <span class="help-block" ng-show="errorTitle">{{ errorTitle }}</span>
    </div>

    <div id="text-group" class="form-group">
      <label for="text">Text:</label>
      <textarea class="form-control" name="text" id="text" rows="10" ng-model="formData.text"></textarea>
      <span class="help-block" ng-show="errorText">{{ errorText }}</span>
    </div>

    <button type="submit" class="btn btn-default">Publish</button>

  </form>
</section>


<? require $SETTINGS_php_include["footer"]; ?>
