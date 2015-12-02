<? require_once "inc/settings.php"; ?>
<? $ng_app = "posts_app"; $ng_control = "posts_control"; ?>
<? require $SETTINGS_php_include["header"]; ?>

<section class="container">
  <article ng-repeat="article in articles">
    <h2>{{ article.title }}</h2>
    <p>{{ article.text }}</p>
  </article>
</section>
<script src="posts.js"></script>
<? require $SETTINGS_php_include["footer"]; ?>
