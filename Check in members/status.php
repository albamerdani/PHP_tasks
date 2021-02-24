<?php
include("login.php");

	if(isset($_POST['vlera_status']) && isset($_POST['id'])){
		
		$status = $_POST['vlera_status'];
		$id = $_POST['id'];
	
		$change_status = mysql_query("UPDATE members SET Status = '$status' WHERE Status = '0' AND ID = '$id'");
		if(!$change_status)
		{
			echo "Statusi nuk mund te ndryshohet";
		}
	}

mysql_close($connection);

?>