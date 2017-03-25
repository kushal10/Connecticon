<html>
<form method = "POST" action = "">
<input type = "text" name = "search">
<input type = "submit">
</form>
<?php

$connection = mysql_connect('localhost', 'root', 'spiderman');

if (!$connection){
    die("Database Connection Failed" . mysql_error());
}

$select_db = mysql_select_db('project');
if (!$select_db){
    die("Database Selection Failed" . mysql_error());
}

	if(isset($_POST['search'])){

		$name = $_POST['search'];
	}
if( $name != "")$sql = "SELECT * from channels where channel LIKE '%".$name."%'";
	$result = mysql_query($sql);


while($row = mysql_fetch_array( $result ))
{

$tmp=$row['channel'];
echo $row['channel'];

?>

   <form name="form" method="POST" action="/chat/chatdup.php">
     <input value="<?php echo $tmp;?>" type="hidden" name="search">
     <input type="submit"  value="CHAT">
   </form>

<?php
}
?>

</html>
