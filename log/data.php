<?php
error_reporting(E_ALL ^ E_DEPRECATED);
$user="root";
$pass="12345";
$host="localhost";
$db="login";

$con=mysql_connect($host,$user,$pass);
mysql_select_db($db,$con);
?>