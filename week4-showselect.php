<?php
	// party Table
	$con=mysqli_connect("localhost","usr_2013_61","ak47jay187","db_2013_61");
	if (mysqli_connect_errno($con)){
		echo "Failed to connect to MySQL: ".mysqli_connect_error();
		exit;
	}
	
	$result = mysqli_query($con,"SELECT * FROM party");
	echo "<option value = \"0\">"."None"."</ option>";
	while($row = mysqli_fetch_array($result))
	{
		echo "<option value = \"".$row['Party_Num']."\">";
		echo "by '".$row['Host_Name']."' in '".$row['Place']."' at '".$row['Time']."'";
		echo "</ option>";
	}
	
	mysqli_close($con);
?>