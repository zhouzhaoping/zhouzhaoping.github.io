<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Join Complete!</title>
</head>
<body>
<?php
	$con=mysqli_connect("localhost","usr_2013_61","ak47jay187","db_2013_61");
	if (mysqli_connect_errno($con)){
		echo "Failed to connect to MySQL: ".mysqli_connect_error();
		exit;
	}

	echo "<p>";
	$result = mysqli_query($con,"SELECT Guest_ID FROM guest WHERE Guest_ID=\"".$_GET['id']."\"");
	if (mysqli_num_rows($result) == 0) {
		echo "Guest_ID error !"."<br />";
		mysqli_close($con);
		$page="homework4-3.php";
		echo "<script>alert('Join Error!'); window.location = \"".$page."\";</script>";
		exit;
	}else if (isset($_GET["join"]))	{
		$row = mysqli_fetch_array($result);
		echo "Join Party Complete !"."<br />";
		foreach($_GET["join"] as $item){
			mysqli_query($con,"INSERT INTO guest_party (Guest_ID, Party_Num) VALUES (\"".$row['Guest_ID']."\",\"".$item."\")");
		}
	}else{
		echo "There is nothing to join"."<br />";
	}
	echo "</p>";
	
	mysqli_close($con);
	
	$page="homework4-3.php";
	echo "<script>alert('Join Complete!'); window.location = \"".$page."\";</script>";
?>
</body>
</html>
