<?php
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT" ); 
header("Last-Modified: " . gmdate( "D, d M Y H:i:s" ) . "GMT" ); 
header("Cache-Control: no-cache, must-revalidate" ); 
header("Pragma: no-cache" );
header("Content-Type: text/xml; charset=utf-8");
$connection = mysql_connect('localhost', 'root', 'spiderman');

if (!$connection){
    die("Database Connection Failed" . mysql_error());
}

$select_db = mysql_select_db('project');
if (!$select_db){
    die("Database Selection Failed" . mysql_error());
}
$xml = '<?xml version="1.0" ?><root>';
$result = mysql_query("select * from loggedin");
$x = mysql_fetch_assoc($result);
while($x) {
$xml .= '<message>';
$xml .= '<user>' . $x['username']. '</user>';
$xml .= '</message>';
$x = mysql_fetch_assoc($result);
}
$xml .= '</root>';
echo $xml;
?>
