<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Thank you!</title>
</head>
<body>
<?php
	$con=mysqli_connect("localhost","usr_2013_61","ak47jay187","db_2013_61");
	if (mysqli_connect_errno($con)){
		echo "Failed to connect to MySQL: ".mysqli_connect_error();
		exit;
	}
	echo "<p>";
	echo "Add Complete !"."<br />";
	echo "Party Information:"."<br />";
	echo "host = ".$_GET["name"]."<br />";
	echo "place = ".$_GET["place"]."<br />";
	echo "time = ".$_GET["time"]."<br />";
	
	$request = "INSERT INTO party (Time, Place, Host_Name)
				VALUES (\"".$_GET["time"]."\",\"".$_GET["place"]."\",\"".$_GET["name"]."\")";
	mysqli_query($con, $request);
	mysqli_close($con);
	
	$page="homework4-3.php";
	echo "<script>alert('Thank you for hold a party!'); window.location = \"".$page."\";</script>";
?>
</body>
</html>