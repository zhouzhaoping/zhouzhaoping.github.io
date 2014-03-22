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
	echo "Your Information:"."<br />";
	echo "name = ".$_GET["name"]."<br />";
	echo "age = ".$_GET["age"]."<br />";
	echo "gender = ".$_GET["gender"]."<br />";
	echo "email = ".$_GET["email"]."<br />";
	echo "partyid = ".$_GET["select"]."<br />";
	
	$request = "INSERT INTO guest (Guest_Name, Age, Gender, E_mail)
				VALUES (\"".$_GET["name"]."\",\"".$_GET["age"]."\",\"".$_GET["gender"]."\",\"".$_GET["email"]."\")";
	mysqli_query($con, $request);
	
	if ($_GET['select'] != 0){
		$request = "SELECT Guest_ID FROM guest WHERE Guest_Name=\"".$_GET['name']."\" AND Age=\"".$_GET['age']."\" AND Gender=\"".$_GET['gender']."\" AND E_mail=\"".$_GET['email']."\"";
		$result = mysqli_query($con, $request);
		$row = mysqli_fetch_array($result);
		mysqli_query($con,"INSERT INTO guest_party (Guest_ID, Party_Num) VALUES (\"".$row['Guest_ID']."\",\"".$_GET["select"]."\")");
	}
	
	mysqli_close($con);
	
	$page="homework4-3.php";
	echo "<script>alert('Thank you for doing the survey!'); window.location = \"".$page."\";</script>";
?>
</body>
</html>