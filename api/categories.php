<?
  require_once '../lib/php/meekrodb.class.php';
  DB::$user = 'root';
  DB::$password = 'root';
  DB::$dbName = 'slovotisk';

  $results = DB::query("SELECT * FROM categories ORDER BY name ASC");

  $data["categories"] = $results;
  $data["success"] = true;
  echo json_encode($data);

?>
