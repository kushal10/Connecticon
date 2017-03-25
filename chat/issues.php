<html>
<body background="pine.jpg">
<center>
<form action = "" method = "POST">
<table><tr><td>Username : </td><td><input type = "text" name = "username" required=""></td></tr><br>
<td>Issue Name : </td><td><input type = "text" name = "issue" required=""></td></tr><br>
<td>Issue Type : </td><td><select name="typechannel">
<option value="1">Public</option>
<option value="2">Private</option>
</select><br></td></tr>
<td>Date : </td><td><input type = "text" name = "date" required=""></td></tr><br>
<td> Issue Since : </td><td><input type = "text" name = "since" required=""></td></tr><br>
<td>Description : </td><td><input type = "text" name="description" style="width: 300px;height:100px;" required=""></td></tr><br></table>
<input type = "submit" value="Report">
</center>
</body>
</form>

<?php

$connection = mysql_connect('localhost', 'root', 'spiderman');

if (!$connection){
    die("Database Connection Failed" . mysql_error());
}

$select_db = mysql_select_db('issues');
if (!$select_db){
    die("Database Selection Failed" . mysql_error());
}
if(isset($_POST['username']) and isset($_POST['issue']) and isset($_POST['date']) and isset($_POST['since']) and isset($_POST['description'])){
$username = $_POST["username"];
$issue = $_POST["issue"];
$date = $_POST["date"];
$since = $_POST["since"];
$description = $_POST["description"];
if($_POST['typechannel'] == "1") {
	$tablename = "public";
}
else {
	$tablename = "private";
}
	$query = "INSERT INTO $tablename (username,issue,date,since,description) VALUES ('$username','$issue','$date','$since','$description')";
	$result = mysql_query($query);
	echo '<script>alert("Hello From The Other Side");</script>';

}

?>
</html>
