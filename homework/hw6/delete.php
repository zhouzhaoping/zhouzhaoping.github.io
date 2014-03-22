<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Delete Complete!</title>
</head>
<body>
<?php
	$con=mysqli_connect("localhost","usr_2013_61","ak47jay187","db_2013_61");
	if (mysqli_connect_errno($con)){
		echo "Failed to connect to MySQL: ".mysqli_connect_error();
		exit;
	}

	echo "<p>";
	if (isset($_GET["delete"]))	{
		echo "Delete Complete !"."<br />";
		foreach($_GET["delete"] as $item){
			echo "delete tourist ".$item."<br />";
			mysqli_query($con,"DELETE FROM tourist WHERE Tourist_ID=\"".$item."\"");
		}
	}else{
		echo "There is nothing to delete"."<br />";
	}
	echo "</p>";
	
	mysqli_close($con);
	
	$page="result.php";
	echo "<script>alert('Delete Complete!'); window.location = \"".$page."\";</script>";
?>
</body>
</html>
