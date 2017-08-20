<?php
$dm = 'http://ytsrexliker.ezyro.com';
$host = "sql108.ezyro.com";
$username = "ezyro_20563337";
$password = "9122335311";	
$dbname = "ezyro_20563337_ytsliker";
$connection = mysql_connect($host,$username,$password);
if (!$connection){
die('Could not connect: ' . mysql_error());
}
mysql_select_db($dbname) or die(mysql_error());
mysql_query("SET NAMES utf8");
?>