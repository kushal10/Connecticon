<?php



if(!isset($_COOKIE['user']))
  {
   header("Location: index.php");
  }

?>




<!DOCTYPE html>
<html >
<head>
<meta charset="UTF-8">
<title>Channels</title>


<link rel="stylesheet" href="resettry.css">


<link rel="stylesheet" href="styletry.css">
<link rel="stylesheet" href="style.css">




</head>
<body>

<!--for demo wrap-->
<h1>CHANNELS</h1>  


<div  class="tbl-header">
<table cellpadding="0" cellspacing="0" border="0">
<tr>
<td>CHANNEL</td>
<td>LET'S GO</td>
</tr>
</div>



<?php

require('database.php');


$result = mysql_query("SELECT * FROM channels") or die(mysql_error());

while($row = mysql_fetch_array( $result ))
{

$tmp=$row['channel'];
echo "<tr><td>";
echo $row['channel'];
echo "<td>";

?>

<form name="form" method="POST" action="chatdup.php">
<input value="<?php echo $tmp;?>" type="hidden" name="search">
<input type="submit" class="btn_login" value="CHAT">
</form>

<?php
}
echo "</td></tr>";
echo "</table>";
?>

</div>

<!--<a href="http://codepen.io/nikhil8krishnan/" class="copy-right" target="_blank">Follow Me</a>
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

<script src="try.js"></script>-->


<form action="channel.php">
<div style="text-align:center">
<input  type="submit" align="middle" value="Create Channel">
</div>
    
    
  </body>
</html>
