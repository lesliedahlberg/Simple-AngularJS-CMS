<?
  require_once '../lib/php/meekrodb.class.php';
  DB::$user = 'root';
  DB::$password = 'root';
  DB::$dbName = 'slovotisk';

  if(isset($action)){
    //...
  }else {
    $results = DB::query("SELECT * FROM posts ORDER BY date DESC");
    echo json_encode($results);
  }


?>
