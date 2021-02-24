<!DOCTYPE html>
<html>
<head>
<title>Check in</title>
<meta charset="utf8">
<link rel="stylesheet" type="text/css" href="style.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
<script type = "text/javascript">

$(document).ready(function(){

	$("input[name='check']").click(function(){
		var btn_id = $(this).attr("id");

		var status = 1;
		
	//	var row_p = $(this):parent:parent;
	//	var row_id = row_p.attr("id");
		
	
		$.ajax({
			url:"status.php",
			method:"POST",
			data:{vlera_status:status, id:btn_id},
			success:function(data){
				$('#'+btn_id).css("background-color","#00FFFF");
				alert('Are you sure you want to check in?');
				$('#'+btn_id+':parent:parent').remove();
				$('#rezultat').html(data);
			}
		});

	/*
		$.post('status.php', {vlera_status:status, id:btn_id}, function(data){
			alert('Are you sure you want to check in?');
			$('#'+btn_id+':parent:parent').remove();
			$('#rezultat').html(data);
		});
	*/
		
	});
});
	load_data();
	
	function load_data(page){
		$.ajax({
			
			url:"hyrje.php",
			method:"POST",
			data:{page:page},
			success:function(data){
			}
		});
	}
	
$(document).on('click', function(){
	var page = $(this).attr("id");
	load_data(page);
});

</script>

<!--<script type = "text/javascript">

function remove(){
var currentNode = document.getElementById('checkin');
var current_parent = currentNode.parentNode;
var parent_tr = current_parent.parentNode;
var parent = parent_tr.parentNode;
	if(parent == document.body.p.form.table.tbody){
		parent.removeChild(parent_tr);
	}
}
function start(){
	window.alert("Are you sure you want to check in?");
	if(window.alert.value == "ok"){
		remove();
	}
}
</script>
-->

</head>
<body>

<header id = "header">
<link rel="stylesheet" type="text/css" href="header.css">
<h1>International Conference</h1><image src='Tirana_International_Conference.jpg' id = "logo">
<a href ="statistika.php"><input type ="button" value = "Statistic" id = "statistika" name="statistika"/></a>
</header>

<p>
<form method = "POST" action="">
<input type ="text" name = "name" id= "name"/>
<input type ="submit" value = "Search" name = "submit" id="search"/>
<p><caption><h2>Rezultate:</h2></caption>
<table border = "2">
<thead>
<tr>
<th>Name</th>
<th>Lastname</th>
<th>Gift</th>
<th>Status</th>
</tr>
</thead>
<tbody>

<?php
include('login.php');
/*
$list = mysql_query("SELECT * FROM members WHERE status = '0' ");
$numrows = mysql_num_rows($list);

if(isset($_POST['submit']))
	{
		$name = $_POST['name'];
		
		if($name == null)
		{
			$query = mysql_query("SELECT * FROM members WHERE status ='0'");
			$numrows = mysql_num_rows($query);

			if($numrows != 0)
			{
				
				while($row = mysql_fetch_array($query))
				{
					echo "<tr id = '".$row['ID']."'><td>".$row['FirstName']."</td>";
					echo "<td>".$row['Lastname']."</td>";
					echo "<td>".$row['Gift']."</td>";
					echo "<td><input type = 'submit' name = 'check' value = 'Check in' id = '".$row['ID']."'/></td></tr>";
					
					
				}
			}
		}
		else
		{
			$find = mysql_query("SELECT * from members WHERE FirstName = '$name' ");
			if(!$find)
			{
				echo "Vendos nje emer per te kerkuar";
				
			}
			
			while ($row2 = mysql_fetch_array($find))
			{
				echo "<tr id = '".$row2['ID']."'><td>".$row2['FirstName']."</td>";
				echo "<td>".$row2['Lastname']."</td>";
				echo "<td>".$row2['Gift']."</td>";
				echo "<td><input type = 'submit' name = 'check' value = 'Check in' id = '".$row2['ID']."'/></td></tr>";
			
			}
		}
	}
	
*/
	
$pagerows = 4;

$page = '';


/*
	if (isset($_GET['p']) && is_numeric($_GET['p'])) {
		$pages=$_GET['p'];
	}
	else{
		$q = "SELECT COUNT(ID) FROM members WHERE Status = '0'";
		$result = @mysqli_query ($connection, $q);
		$row = @mysqli_fetch_array ($result, MYSQLI_NUM);
		$records = $row[0];

		if ($records > $pagerows){
			$pages = ceil ($records/$pagerows);
		}
		else{
			$pages = 1;
		}
	}
	if (isset($_GET['s']) && is_numeric($_GET['s'])) {
		$start = $_GET['s'];
	}
	else{
		$start = 0;
	}
*/
	
if(isset($_POST['submit']))
{
	
	$name = $_POST['name'];
	
	if($name != ""){
		
		$find = mysql_query("SELECT * from members WHERE Status = '0' AND FirstName = '$name' ");
		
		if(!$find)
		{
			echo "Vendos nje emer per te kerkuar";
		
		}

		while ($row2 = mysql_fetch_array($find))
		{
			echo "<tr name = 'record' id = '".$row2['ID']."'><td>".$row2['FirstName']."</td>";
			echo "<td>".$row2['Lastname']."</td>";
			echo "<td>".$row2['Gift']."</td>";
			echo "<td><input type = 'button' name = 'check' value = 'Check in' id = '".$row2['ID']."'/></td></tr>";
	
		}
	}
	
	if($name == ""){
		
		$result = mysql_query ("SELECT ID, FirstName, Lastname, Gift FROM members WHERE Status = '0' ORDER BY FirstName ASC"); 
		$members = mysql_num_rows($result);
		if($result){

			while ($row = mysql_fetch_array($result)){
				echo '<tr name = "record" id = "'.$row['ID'].'">
				<td>' . $row['FirstName'] . '</td>
				<td>' . $row['Lastname'] . '</td>
				<td>' . $row['Gift'] . '</td>
				<td><input type = "button" name = "check" value = "Check in" id = "'.$row['ID'].'"></td></tr>';
			}
			mysql_free_result($result); 
		}
		
		else
		{ 
			echo '<p class="error">The current users could not be retrieved. We apologize forany inconvenience.</p>';
		}
	}
	
}

else{
	
	if(isset($_POST["page"])){
		$page = $_POST["page"];
	}
	else{
		$page = 1;
	}
	
	$start = ($page - 1)*$pagerows;

	$result = mysql_query ("SELECT ID, FirstName, Lastname, Gift FROM members WHERE Status = '0' ORDER BY FirstName ASC LIMIT $start, $pagerows"); 
	$members = mysql_num_rows($result);
	if($result){

		while ($row = mysql_fetch_array($result)){
			echo '<tr name = "record" id = "'.$row['ID'].'">
			<td>' . $row['FirstName'] . '</td>
			<td>' . $row['Lastname'] . '</td>
			<td>' . $row['Gift'] . '</td>
			<td><input type = "button" name = "check" value = "Check in" id = "'.$row['ID'].'"></td></tr>';
		}
		
		mysql_free_result($result); 
	}
	
	else
	{ 	
		echo '<p class="error">The current users could not be retrieved. We apologize for any inconvenience.</p>';
	}
	
	$result = mysql_query ("SELECT COUNT(ID) FROM members WHERE Status = '0'");
	$row = mysql_fetch_array ($result);
	$members = $row[0];
	
	echo "<p>Total members that are not checked in:".$members."</p>";

	$total_pages = ceil($members/$pagerows);
	
	if ($page > 1) { 
		echo "<p>";
		$previous = $page - 1;
		echo "<a href = 'hyrje.php?p='".$previous."'> Previous </a>";
	}

	$current_page = ($start/$pagerows) + 1;
	
	if ($current_page != 1) {
		$next = $current_page + 1;
		echo "<a href = 'hyrje.php?p='".$next."'> Next </a>";
	}
	echo "</p>";

}
	
mysql_close($connection);

?>

</tbody></table></p>
<p id = "rezultat"></p>
</form></p>
<footer id = "footer"></footer>
</body>
</html>
