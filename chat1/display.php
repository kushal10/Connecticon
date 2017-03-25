
<?php
mysql_connect("localhost","root","spiderman");
mysql_select_db("project");
//$image = stripslashes($_REQUEST[imname]);
$rs = mysql_query("select * from tbl where filename=\"".
        addslashes($image).".jpg\"");
$row = mysql_fetch_assoc($rs);
$imagebytes = $row[imgdata];
header("Content-type: image/jpeg");
print $imagebytes;
?>

