<?php
$db_server="localhost"
$db_user ="root";
$db_pass ="";
$db_name ="sebi";
 mysql_connect($db_server, $db_user, $db_pass);
mysql_select_db($db_name);
//$db = new mysqli($db_server, $db_user, $db_pass, $db_name);
//if($db-> connect_error){
	//die("connection failed;". $conn-> connect_error);
//}

?>
