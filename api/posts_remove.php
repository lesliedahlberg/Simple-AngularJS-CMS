<?
  require_once '../lib/php/meekrodb.class.php';
  DB::$user = 'root';
  DB::$password = 'root';
  DB::$dbName = 'slovotisk';

  $errors = array();  // array to hold validation errors
  $data = array();        // array to pass back data

  if(is_numeric($_GET["id"])){
    DB::query("DELETE FROM posts WHERE id = %i",$_GET["id"]);
    $data['success'] = true;
  }else {
    $erros['id'] = "ID must be specified.";
  }


  if (!empty($errors)) {
    // if there are items in our errors array, return those errors
    $data['success'] = false;
    $data['errors']  = $errors;
  } else {
    // if there are no errors, return a message
    $data['success'] = true;
    $data['message'] = 'Article removed!';
  }

  // return all our data to an AJAX call
  echo json_encode($data);
?>
