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
	echo "idNumber = ".$_POST["idNumber"]."<br />";
	echo "firstName = ".$_POST["firstName"]."<br />";
	echo "lastName = ".$_POST["lastName"]."<br />";
	echo "age = ".$_POST["age"]."<br />";
	echo "gender = ".$_POST["gender"]."<br />";
	echo "watch = ".$_POST["watch"]."<br />";
	echo "holiday = ".$_POST["holiday"]."<br />";
	echo "knowledge = ".$_POST["knowledge"]."<br />";
	echo "email = ".$_POST["email"]."<br />";
	
	$request = "INSERT INTO tourist (First_Name, Last_Name, ID_Number, Age, Gender, Watch, Holiday, Knowledge, E_mail)
				VALUES (\"".$_POST["firstName"]."\",\"".$_POST["lastName"]."\",\"".$_POST["idNumber"]."\",\"".$_POST["age"]."\",\"".$_POST["gender"]."\",\"".$_POST["watch"]."\",\"".$_POST["holiday"]."\",\"".$_POST["knowledge"]."\",\"".$_POST["email"]."\")";
	mysqli_query($con, $request);
	
	mysqli_close($con);
	
	$page="wizardForm.html";
	echo "<script>alert('Thank you for doing the survey!'); window.location = \"".$page."\";</script>";
?>
</body>
</html>