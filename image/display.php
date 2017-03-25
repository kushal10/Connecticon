<?php
          
//require '/var/www/html/chat/PHPMailer/PHPMailerAutoload.php';

$connection = mysql_connect('localhost', 'root', 'spiderman');

if (!$connection){
    die("Database Connection Failed" . mysql_error());
}

$select_db = mysql_select_db('project');
if (!$select_db){
    die("Database Selection Failed" . mysql_error());
}
           
               
                $qry="select * from image";
                $result=mysql_query($qry);
                
                
                    echo $result[2] ;
                
                
            
        ?>

