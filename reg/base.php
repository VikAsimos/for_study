<?php  
session_start(); 
setcookie(session_name(),session_id(),time()+24*3600);
$dbhost = "localhost"; 
$dbname = "reg";
$dbuser = "root";
$dbpass = ""; 
 
/*mysql_connect($dbhost, $dbuser, $dbpass) or die("Ошибка MySQL: " . mysql_error()); 
mysql_query ("set character_set_client='cp1251'"); 
mysql_query ("set character_set_results='cp1251'"); 
mysql_query ("set collation_connection='cp1251_general_ci'"); 
mysql_select_db($dbname) or die("Ошибка MySQL: " . mysql_error());  */

$pdo = new PDO('mysql:host=localhost;dbname=reg', $dbuser, $dbpass);
?>