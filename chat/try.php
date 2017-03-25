<?php

require('database.php');


$result = mysql_query("SELECT * FROM channels") 
or die(mysql_error());  


echo "<table border='1'>";
echo "<tr> <th>ID</th> 
  <th>Name</th> 
  </tr>";

while($row = mysql_fetch_array( $result )) 
{

$tmp=$row['channel'];
echo "<tr><td>"; 
echo $row['channel'];
echo "<td>"; 
?>

   <form name="form" method="POST" action="chatdup.php">
     <input value="<?php echo $tmp;?>" type="hidden" name="search">
     <input type="submit"  value="CHAT">
   </form>

<?php
}
   echo "</td></tr>";
echo "</table>";
?>


