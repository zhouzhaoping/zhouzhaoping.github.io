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

	$flag = true;
	$request = "SELECT * FROM guest ";
	if ($_GET["name"] != "")
	{
		if ($flag)
		{$request .= "WHERE ";$flag = false;}
		else 
			$request .= "AND ";
		$request .= "Guest_Name=\"".$_GET["name"]."\" ";
	}
	if ($_GET["age"] != "")
	{
		if ($flag)
		{$request .= "WHERE ";$flag = false;}
		else 
			$request .= "AND ";
		$request .= "Age=\"".$_GET["age"]."\" ";
	}
	if ($_GET["gender"] != "unknown")
	{
		if ($flag)
		{$request .= "WHERE ";$flag = false;}
		else 
			$request .= "AND ";
		$request .= "Gender=\"".$_GET["gender"]."\" ";
	}
	if ($_GET["email"] != "")
	{
		if ($flag)
		{$request .= "WHERE ";$flag = false;}
		else 
			$request .= "AND ";
		$request .= "E_mail=\"".$_GET["email"]."\" ";
	}
	
	$result = mysqli_query($con, $request);
	
	// echo $request;
	echo "<table border='1'>
	<caption>Query Result</caption>
	<tr>
	<th>Guest_ID</th>
	<th>Guest_Name</th>
	<th>Age</th>
	<th>Gender</th>
	<th>E_mail</th>
	<th colspan = '3'>Participating party</th>
	</tr>";
	while($row = mysqli_fetch_array($result))
	{
		$result1 = mysqli_query($con, "SELECT Time, Place, Host_Name FROM guest, party, guest_party WHERE guest.Guest_ID=guest_party.Guest_ID AND party.Party_Num=guest_party.Party_Num AND guest.Guest_ID='".$row['Guest_ID']."'");
		$num = 1;
		if (mysqli_num_rows($result1) > 1)
			$num = mysqli_num_rows($result1);
		
		echo "<tr>";
		echo "<td rowspan='".$num."'>".$row['Guest_ID']."</td>";
		echo "<td rowspan='".$num."'>".$row['Guest_Name']."</td>";
		echo "<td rowspan='".$num."'>".$row['Age']."</td>";
		echo "<td rowspan='".$num."'>".$row['Gender']."</td>";
		echo "<td rowspan='".$num."'>".$row['E_mail']."</td>";
		$row1;
		if ($row1 = mysqli_fetch_array($result1))
		{
			echo "<td>".$row1['Time']."</td>";
			echo "<td>".$row1['Place']."</td>";
			echo "<td>".$row1['Host_Name']."</td>";
			echo "</tr>";
			while ($row1 = mysqli_fetch_array($result1))
			{
				echo "<tr>";
				echo "<td>".$row1['Time']."</td>";
				echo "<td>".$row1['Place']."</td>";
				echo "<td>".$row1['Host_Name']."</td>";
				echo "</tr>";
			}
		}
		else
		{
			echo "<th colspan = '3'>None</th>";
			echo "</tr>";
		}
	}
	echo "</table>";
	
	mysqli_close($con);
	echo "<a href = \"homework4-3.php\"><button style = \"font-size:30px\">Return</button></a>";
	echo "<br />";
	?>
</body>
</html>
