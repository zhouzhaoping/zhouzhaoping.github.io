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
			$pieces = explode(" ", $item);
			// echo "|".$pieces[0]."-".$pieces[1]."|";
			// echo "delete guest_party (".$pieces[0].",".$pieces[1].")<br />";
			mysqli_query($con,"DELETE FROM guest_party WHERE Guest_ID=\"".$pieces[0]."\" AND Party_Num=\"".$pieces[1]."\"");
		}
	}else{
		echo "There is nothing to delete"."<br />";
	}
	echo "</p>";
	
	mysqli_close($con);
	
	$page="homework4-3.php";
	echo "<script>alert('Delete Complete!'); window.location = \"".$page."\";</script>";
?>
</body>
</html>
