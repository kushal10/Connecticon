<?php
$connection = mysql_connect('localhost', 'root', 'spiderman');

if (!$connection){
    die("Database Connection Failed" . mysql_error());
}

$select_db = mysql_select_db('project');
if (!$select_db){
    die("Database Selection Failed" . mysql_error());
}
if(isset($_COOKIE['user']))
   {
	$u = $_COOKIE['user'];
	$query = "DELETE from loggedin where username='$u'";
	mysql_query($query);
     setcookie('user',"",1);
     Header("Location: index.php");
   }
?>
