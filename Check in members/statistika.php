<!DOCTYPE html>
<html>
<head>
<title>Check in</title>
<meta charset="utf8">
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<header id = "header">
<link rel="stylesheet" type="text/css" href="header.css">
<h1>International Conference</h1><image src='Tirana_International_Conference.jpg' id = "logo">
<a href ="home.php"><input type ="button" value = "Home" id = "home" name="home"/></a>
</header>

<p><h2>Rezultate:</h2>

<?php
include("login.php");

$check_member = mysql_query("SELECT COUNT('ID') FROM members WHERE Status = '1'");

if(!$check_member)
	{
		echo "Nuk mund te nxirren statistikat!";
	}
while($result = mysql_fetch_array($check_member)){
	$nr_check = $result[0];
	echo "<p><h2>Number of members that are checked in: ".$nr_check."</h2></p>";
}

$uncheck_member = mysql_query("SELECT COUNT('ID') FROM members WHERE Status ='0'");
if(!$uncheck_member)
	{
		echo "Nuk mund te nxirren statistikat!";
	}
while($row = mysql_fetch_array($uncheck_member)){
	$nr_uncheck = $row[0];
	echo "<p><h2>Number of members that are not checked in: ".$nr_uncheck."</h2></p>";
}
mysql_close($connection);
?>

</p>
</body>
</html>