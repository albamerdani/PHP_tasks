<!DOCTYPE html>
<html>
<head>
<title>Flower album</title>
<meta charset="utf-8">
 
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!--
<style type="text/css">
body{background-color:lightblue;}
#album{align:center; margin:30px;}
a{padding:30px; margin:20px;}
a img{width:200px; height:150px;}
h1{text-align:center; font-family:Times New Roman; color:navy; top:10px;}
</style>

<script type="text/javascript">

$(window).load(function(){
	$('img').animate({
		class:'slide'
	});
	
});

</script>
-->
</head>

<body>

<?php
	$files = scandir("foto/lule/");
?>

<div id="myCarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators-->
	<ol class="carousel-indicators">
	<?php
		$i=0;
		for($a=2; $a < count($files); $a++):
	?>
		<li data-target="#myCarousel" data-slide-to="<?php echo $i;?>" class="<?php echo $i == 0 ? 'active': '';?>"></li>
	<?php
		$i++;
		endfor;
	?>
	</ol> 
	

  <!-- Wrapper for slides -->
	<div class="carousel-inner" >
		<?php
			$i=0;
			for($a=2; $a < count($files); $a++):
		?>
			<div class="item <?php echo $i == 0 ? 'active': '';?>" align="center">
				<img src="foto/lule/<?php echo $files[$a];?>" style="width:600px; height:500px;">
			</div>
		<?php
			$i++;
			endfor;
		?>

	  <!-- Left and right controls -->
		<a class="left carousel-control" href="#myCarousel" data-slide="prev">
			<span class="glyphicon glyphicon-chevron-left"></span>
			<span class="sr-only">Previous</span>
		</a>
		<a class="right carousel-control" href="#myCarousel" data-slide="next">
			<span class="glyphicon glyphicon-chevron-right"></span>
			<span class="sr-only">Next</span>
		</a>
	</div>
</div>

<br/>
<a href="album.html"><input type="button" id="album" class="btn btn-primary" value="Album Gallery"></a>

<!--
$query = mysql_query("SELECT ID_album FROM albume WHERE titull_album ='lule'");
	$numrows = mysql_num_rows($query);

	if($numrows != 0)
	{
		$row = mysql_fetch_array($query);
		$id_album = $row['ID_album'];
		
		$lule = mysql_query("SELECT Foto FROM foto WHERE ID_album ='$id_album'");
		
		while($row_foto = mysql_fetch_array($lule)){
			echo "<img src='data:foto/jpeg;base64,'".base64_encode($row_foto['Foto'])."' class='img-rounded'>";
			
		}

	}
	
mysql_close($connection);*/
-->

</body>
</html>