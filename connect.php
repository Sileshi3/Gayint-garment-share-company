<?php
   $dbhost = "localhost";
   $dbname = "lgt";
   $dbusname = "root";
   $dbps = "";
	$link = mysql_connect($dbhost,$dbusname,$dbps,$dbname);
 mysql_select_db('lgt');
if ($link) {
}else{
   echo "failed";
   echo "Error : ".mysql_error();
}
?>