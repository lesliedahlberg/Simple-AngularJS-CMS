<?
  require_once '../lib/php/meekrodb.class.php';
  DB::$user = 'root';
  DB::$password = 'root';
  DB::$dbName = 'slovotisk';

  if(is_numeric($_GET["id"])){
    //$results = DB::query("SELECT * FROM posts ORDER BY date DESC");
    $category_id = DB::queryFirstField("SELECT category_id FROM rel_post_categories WHERE post_id=%i LIMIT 1",$_GET["id"]);
    $results = DB::queryFirstField("SELECT name FROM categories WHERE id = %i", $category_id);
  }else {
    $errors["category"] = "Category not found";

  }

  if(empty($error)){
    $data["category"] = $results;
    $data["success"] = true;
  }else {
    $data["error"] = $errors;
    $data["success"] = false;
  }


  echo json_encode($data);

?>
