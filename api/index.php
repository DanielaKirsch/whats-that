<?php
require '../vendor/autoload.php'; 

require '../vendor/slim/slim/Slim/Slim.php';


$app = new \Slim\Slim();

$app->get('/pictures', 'getPictures');
$app->post('/createUser', 'createUser');

$app->post('/upload', 'uploadFile');

$app->run();

function getPictures() {
	$sql = "select * FROM pictures ORDER BY timestamp";
	try {
		$db = getConnection();
		$stmt = $db->query($sql);  
		$pictures = $stmt->fetchAll(PDO::FETCH_OBJ);
		$db = null;
		echo '{"pictures": ' . json_encode($pictures) . '}';
		


	} catch(PDOException $e) {
		echo '{"error":{"text":'. $e->getMessage() .'}}'; 
	}
}


function createUser() {

   $app1 = \Slim\Slim::getInstance();
   $request = $app1->request();
   
   
  	$name = $request->post('name');
  	$email = $request->post('email');
  	$password = $request->post('password');

  $sql = "insert into user (uid, name, email, password) values (NULL, '".$name."', '".$email."', '".$password."')";
  

  try {
    $db = getConnection();
    $stmt = $db->prepare($sql);  
    $stmt->execute();
    $db = null;
    $app1->redirect('/');

  } catch(PDOException $e) {
    
    echo '{"error":{"text":'. $e->getMessage() .'}}'; 
  }
}

function uploadFile() {

  $app1 = \Slim\Slim::getInstance();
  $request = $app1->request();

  move_uploaded_file($_FILES['uploadfile']['tmp_name'], "/var/www/dev-whats-that.de/upload/".$_FILES['uploadfile']['name']);

  $title = "";
  $url = $_FILES['uploadfile']['name'];
  $category = $request->post('category');

  $sql = "insert into pictures (pid, title, url, category) values (NULL, '".$title."', '".$url."', '".$category."')";
  
  
  try {
    $db = getConnection();
    $stmt = $db->prepare($sql);  
    $stmt->execute();
    $db = null;
    $app1->redirect('/');

  } catch(PDOException $e) {
    
    echo '{"error":{"text":'. $e->getMessage() .'}}'; 
  }
}





function getConnection() {
	$dbhost="127.0.0.1";
	$dbuser="root";
	$dbpass="honiym40";
	$dbname="whatsthat";
	$dbh = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);	
	$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	return $dbh;
}

?>
