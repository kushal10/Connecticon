<?php
$connection = mysql_connect('localhost', 'root', 'spiderman');

if (!$connection){
    die("Database Connection Failed" . mysql_error());
}

$select_db = mysql_select_db('issues');
if (!$select_db){
    die("Database Selection Failed" . mysql_error());
}
$sql = "SELECT * from public";
$result = mysql_query($sql);
?>

<table>
<tr><td>S.No</td>
    <td>Username</td>
    <td>Issue</td>
    <td>Date</td>
    <td>Number of Days</td>
    <td>Description</td>
</tr>

    
<?php

for($i = 0;$i < mysql_num_rows($result);$i++){
	$res = mysql_fetch_array($result);
        echo "<tr><td>";
	echo $res[0];
        echo "</td><td>";
        echo "$res[1]";
        echo "</td><td>";
        echo  "$res[2]";
        echo "</td><td>";
        echo "$res[3]";
        echo "</td><td>";
        echo "$res[4]";
        echo "</td><td>";
        echo  "$res[5]";
	echo "</tr>";
}
?>

</table>
