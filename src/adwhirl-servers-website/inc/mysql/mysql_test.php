<?php
  // connect to server  
require_once('myPDO.php');


/**   
$user = 'root';
$pass = 'information';
$dsn = 'mysql:dbname=test;host=127.0.0.1';
try {
  $db = new PDO($dsn, $user, $pass);
}
catch(PDOException $e){
  echo "no.................";
}
*/



//--------------------------------
/**
$table_name = 'test2'; //( int ,varchar)
$input_array = array('name1'=>'2555','name2' =>'2555');


$my_pdo = myPDO::getinstance();
$my_pdo->delete($table_name , "where name1 ='2555'");

var_dump($input_array);
// test some query insertion 
*/
/**
$sgtm = $db->prepare($qry, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
$stm->execute();
$selected_domain = $stm->fetchAll();
var_dump($selected_domain);
*/

?>