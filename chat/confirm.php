<html>
<body>
<?php

$connection = mysql_connect('localhost', 'root', 'spiderman');

if (!$connection){
    die("Database Connection Failed" . mysql_error());
}

$select_db = mysql_select_db('project');
if (!$select_db){
    die("Database Selection Failed" . mysql_error());
}?>
<?php
if( isset($_GET['activate']))
{
$activate=$_GET['activate'];
$query=mysql_query("select * from users where activation='$activate'");
$row=mysql_num_rows($query);
if($row == 1)
{
$query1=mysql_query("update users set activation='1' where activation='$activate'");
if($query1)
{
echo "You have verified your mail ID";
}
}
}
?>
</body>
</html>
