<?php

$database = "task1";
$host = "localhost";
$user = "root";
$password = "";

$connection = mysql_connect('localhost', 'root', '');
if(!$connection)
	die("Nuk mund te lidhesh me databazen");
$db = mysql_select_db($database, $connection);
if(!($db)) 
	die("Nuk mund te lidhesh me databazen");

?>