<?php
require_once 'class.user.php';
$user = new USER();

mysql_connect("localhost","root","spiderman");
mysql_select_db("project");
if(empty($_GET["id"]) && empty($_GET["code"]))
{
 $user->redirect('index.php');
}

if(isset($_GET["id"]) && isset($_GET["code"]))
{
$id = $_GET["id"];
$code = $_GET["code"];
//echo $id.$code;
$query = "SELECT * from users where username='$id' AND activation='$code'";
 $result = mysql_query($query);
 $count = mysql_num_rows($result);
 if( $count) { 
 $query2 = "UPDATE users SET code='Y' WHERE username='$id'";
 echo "Your account has been activated, click the link to go to login page<br>";
 echo "<a href='index.php'>CLICK HERE</a>";
 
// echo "<br>".$query2;
 $res2 = mysql_query($query2) or die(mysql_error());
 $query3 = "CREATE TABLE `$id` ( `id` int(11) NOT NULL AUTO_INCREMENT,
`mychan` varchar(255) NOT NULL, PRIMARY KEY (`id`) ) ";
 $res3 = mysql_query($query3) or die(mysql_error());

              }
}

?>


