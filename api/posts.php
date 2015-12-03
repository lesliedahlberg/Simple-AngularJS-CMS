<?
  require_once '../lib/php/meekrodb.class.php';
  DB::$user = 'root';
  DB::$password = 'root';
  DB::$dbName = 'slovotisk';

  if(is_numeric($_GET["id"])){
    //$results = DB::query("SELECT * FROM posts ORDER BY date DESC");
    $results = DB::query("SELECT * FROM posts WHERE id=%i ORDER BY date DESC",$_GET["id"]);
  }else {
    if(is_numeric($_GET["category"])){
      $results = DB::query("SELECT * FROM posts, rel_post_categories WHERE posts.id = rel_post_categories.post_id AND rel_post_categories.category_id = %i ORDER BY date DESC", $_GET["category"]);
    }else{
      $results = DB::query("SELECT * FROM posts ORDER BY date DESC");
    }

  }

  $data["articles"] = $results;
  $data["success"] = true;
  echo json_encode($data);

?>
