<?php

require('database.php');


$result = mysql_query("SELECT * FROM users") 
or die(mysql_error());  


echo "<table border='1'>";
echo "<tr> <th>ID</th> 
  <th>Name</th> 
  <th>Priority</th> 
  <th>Description</th> 
  <th>Location</th> 
  <th>Location2</th> 
  <th>Update this Entry</th></tr>";

while($row = mysql_fetch_array( $result )) 
{

$tmp=$row['username'];
echo "<tr><td>"; 
echo $row['username'];
echo "<td>"; 
?>

   <form name="form" method="POST" action="chat.php">
     <input value="<?php echo $tmp;?>" type="hidden" name="search">
     <input type="submit"  value="Update">
   </form>

<?php
}
   echo "</td></tr>";
echo "</table>";
?>


