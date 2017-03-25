<html>
<body background="pine.jpg">
 <link rel="stylesheet" href="style1.css">

        <link rel="stylesheet" href="style.css">

<center>
<form action = "" method = "POST">
<table><tr>
<td>Channel Name : </td><td><input type = "text" name = "channel" required=""></td></tr><br>
<tr><td>Channel Type : </td><td><select name="typechannel">
<option value="1">Public</option>
<option value="2">Private</option>
</select><br></td></tr><tr>
<td>Description : </td><td><input type = "text" name="description" style="width: 300px;height:100px;" required=""></td></tr><br></table>
<input type = "submit" value="Create">
</form>
<form action="check.php">
<input type="submit"value="Back">
</form>
</center>
</body>

<?php

if(!isset($_COOKIE['user'])){

	header("Location: index.php");
}
$connection = mysql_connect('localhost', 'root', 'spiderman');

if (!$connection){
    die("Database Connection Failed" . mysql_error());
}

$select_db = mysql_select_db('project');
if (!$select_db){
    die("Database Selection Failed" . mysql_error());
}
if(isset($_POST['channel']) and isset($_POST['typechannel']) and isset($_POST['description'])){
$username = $_POST["channel"];
$issue = $_POST["typechannel"];
$description = $_POST["description"];

	$query = "INSERT INTO channels (channel,typechannel,description) VALUES ('$username','$issue','$description')";
	$result = mysql_query($query);
        $query2 = "CREATE TABLE `$username` (
  `message_id` INT(11) NOT NULL AUTO_INCREMENT,
  `chat_id` INT(11) NOT NULL DEFAULT '0',
  `user_id` INT(11) NOT NULL DEFAULT '0',
  `user_name` VARCHAR(64) DEFAULT NULL,
  `message` TEXT,
  `post_time` DATETIME DEFAULT NULL,
  PRIMARY KEY  (`message_id`)
) ENGINE=INNODB DEFAULT CHARSET=latin1;";
      $result = mysql_query($query2);
        $userlist = $username."list";
        $query3 = "CREATE TABLE `$userlist` (
                `id` INT(11) NOT NULL AUTO_INCREMENT,
                `username` VARCHAR(64) DEFAULT NULL,
                 PRIMARY KEY (`id`)) ;";
        $res3 = mysql_query($query3);
	echo '<script>alert("Hello From The Other Side");</script>';

}

?>
</html>
