<?
  require_once '../lib/php/meekrodb.class.php';
  DB::$user = 'root';
  DB::$password = 'root';
  DB::$dbName = 'slovotisk';

  $errors = array();  // array to hold validation errors
  $data = array();        // array to pass back data

  if (empty($_POST['title']))
    $errors['title'] = 'Title is required.';

  if (empty($_POST['text']))
    $errors['text'] = 'Text is required.';

  if(!empty($_POST['category'])){
    $category_id = DB::queryFirstField("SELECT id FROM categories WHERE name = %s", $_POST['category']);
    if(!is_numeric($category_id)){
      DB::query("INSERT INTO categories (name, slug) VALUES (%s, %s)", $_POST['category'], $_POST['category']);
      $category_id = DB::queryFirstField("SELECT LAST_INSERT_ID()");
    }

  }

  if(!$errors){
    DB::insert('posts', array(
      'title' => $_POST['title'],
      'text' => $_POST['text'],
      'author' => "admin"
    ));
    if(is_numeric($category_id)){
      $post_id = DB::queryFirstField("SELECT LAST_INSERT_ID()");
      DB::insert('rel_post_categories', array(
        'category_id' => $category_id,
        'post_id' => $post_id
      ));
    }
  }

  if (!empty($errors)) {
    // if there are items in our errors array, return those errors
    $data['success'] = false;
    $data['errors']  = $errors;
  } else {
    // if there are no errors, return a message
    $data['success'] = true;
    $data['message'] = 'Article added!';
  }

  // return all our data to an AJAX call
  echo json_encode($data);
?>
